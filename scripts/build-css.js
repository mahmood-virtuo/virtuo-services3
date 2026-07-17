const fs = require("fs");
const path = require("path");
const CleanCSS = require("clean-css");
const manifest = require("./css-bundles");

const projectRoot = path.resolve(__dirname, "..");
const projectRootPrefix = `${projectRoot}${path.sep}`;
const emptyBundleComment = "/* No family-specific CSS rules are configured. */";

function resolveProjectPath(relativePath, label) {
  if (typeof relativePath !== "string" || relativePath.trim() === "") {
    throw new Error(`${label} must be a non-empty project-relative path.`);
  }

  const resolvedPath = path.resolve(projectRoot, relativePath);

  if (!resolvedPath.startsWith(projectRootPrefix)) {
    throw new Error(`${label} resolves outside the project: ${relativePath}`);
  }

  return resolvedPath;
}

function validateSource(relativePath) {
  if (relativePath.endsWith(".min.css")) {
    throw new Error(`Generated minified CSS cannot be a source: ${relativePath}`);
  }

  const sourcePath = resolveProjectPath(relativePath, "CSS source");

  if (!fs.existsSync(sourcePath) || !fs.statSync(sourcePath).isFile()) {
    throw new Error(`Configured CSS source does not exist: ${relativePath}`);
  }

  return sourcePath;
}

function validateOutput(relativePath) {
  const outputPath = resolveProjectPath(relativePath, "CSS output");

  for (const bundle of manifest.bundles) {
    if (path.resolve(projectRoot, bundle.source) === outputPath) {
      throw new Error(`CSS output cannot overwrite a source: ${relativePath}`);
    }
  }

  return outputPath;
}

function minify(source, label) {
  const result = new CleanCSS({
    level: 0,
    rebase: false,
    returnPromise: false,
    sourceMap: false,
  }).minify(source);

  if (result.errors && result.errors.length > 0) {
    result.errors.forEach((error) => console.error(`[${label}] ${error}`));
    throw new Error(`CleanCSS failed for ${label}.`);
  }

  if (result.warnings && result.warnings.length > 0) {
    result.warnings.forEach((warning) => console.warn(`[${label}] ${warning}`));
  }

  return result.styles;
}

function writeOutput(relativePath, contents) {
  if (typeof contents !== "string" || contents.length === 0) {
    throw new Error(`Refusing to write empty CSS output: ${relativePath}`);
  }

  const outputPath = validateOutput(relativePath);
  fs.mkdirSync(path.dirname(outputPath), { recursive: true });
  fs.writeFileSync(outputPath, contents, "utf8");

  return Buffer.byteLength(contents, "utf8");
}

function readSources() {
  const sourceContents = new Map();

  for (const bundle of manifest.bundles) {
    if (sourceContents.has(bundle.source)) {
      throw new Error(`CSS source is configured more than once: ${bundle.source}`);
    }

    const sourcePath = validateSource(bundle.source);
    sourceContents.set(bundle.source, fs.readFileSync(sourcePath, "utf8"));
  }

  return sourceContents;
}

function build() {
  const sourceContents = readSources();

  for (const bundle of manifest.bundles) {
    const source = sourceContents.get(bundle.source);
    let styles = minify(source, bundle.name);

    if (styles.length === 0 && bundle.allowEmpty) {
      styles = emptyBundleComment;
    }

    const bytes = writeOutput(bundle.output, styles);
    console.log(`${bundle.source} -> ${bundle.output} (${bytes} bytes)`);
  }

  const compatibilitySources = manifest.compatibility.sources.map((relativePath) => {
    if (!sourceContents.has(relativePath)) {
      throw new Error(`Compatibility source is not a configured bundle source: ${relativePath}`);
    }

    return sourceContents.get(relativePath);
  });

  if (new Set(manifest.compatibility.sources).size !== manifest.compatibility.sources.length) {
    throw new Error("A compatibility source is configured more than once.");
  }

  const aggregate = compatibilitySources.join("");

  const unminifiedBytes = writeOutput(
    manifest.compatibility.unminifiedOutput,
    aggregate
  );
  console.log(
    `${manifest.compatibility.sources.join(" + ")} -> ${manifest.compatibility.unminifiedOutput} (${unminifiedBytes} bytes)`
  );

  const minifiedAggregate = minify(aggregate, "compatibility");
  const minifiedBytes = writeOutput(
    manifest.compatibility.minifiedOutput,
    minifiedAggregate
  );
  console.log(
    `${manifest.compatibility.unminifiedOutput} -> ${manifest.compatibility.minifiedOutput} (${minifiedBytes} bytes)`
  );
}

try {
  build();
} catch (error) {
  console.error(error.message);
  process.exit(1);
}
