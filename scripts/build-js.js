const fs = require("fs");
const path = require("path");
const vm = require("vm");
const { minify } = require("terser");

const projectRoot = path.resolve(__dirname, "..");

const files = [
  {
    source: "assets/js/ajax-form.js",
    output: "assets/js/ajax-form.min.js",
  },
  {
    source: "assets/js/blog-detail-sticky-widgets.js",
    output: "assets/js/blog-detail-sticky-widgets.min.js",
  },
  {
    source: "assets/js/blog-details.js",
    output: "assets/js/blog-details.min.js",
  },
  {
    source: "assets/js/blog-details2.js",
    output: "assets/js/blog-details2.min.js",
  },
  {
    source: "assets/js/blog-load-more.js",
    output: "assets/js/blog-load-more.min.js",
  },
  {
    source: "assets/js/blog-sticky-widgets.js",
    output: "assets/js/blog-sticky-widgets.min.js",
  },
  {
    source: "assets/js/blog-toc.js",
    output: "assets/js/blog-toc.min.js",
  },
  {
    source: "assets/js/main.js",
    output: "assets/js/main.min.js",
  },
  {
    source: "assets/js/virtuo-blog-interactives.js",
    output: "assets/js/virtuo-blog-interactives.min.js",
  },
  {
    source: "assets/js/virtuo-footer-phone.js",
    output: "assets/js/virtuo-footer-phone.min.js",
  },
  {
    source: "assets/js/virtuo-home-footer-phone-loader.js",
    output: "assets/js/virtuo-home-footer-phone-loader.min.js",
  },
  {
    source: "assets/js/virtuo-mega-menu.js",
    output: "assets/js/virtuo-mega-menu.min.js",
  },
  {
    source: "assets/js/virtuo-performance.js",
    output: "assets/js/virtuo-performance.min.js",
  },
  {
    source: "assets/js/virtuo-service-tabs-breadcrumb.js",
    output: "assets/js/virtuo-service-tabs-breadcrumb.min.js",
  },
];

const vendorOutputs = new Set([
  "assets/js/aos.js",
  "assets/js/bootstrap.min.js",
  "assets/js/jquery.magnific-popup.min.js",
  "assets/js/jquery.marquee.min.js",
  "assets/js/svg-inject.min.js",
  "assets/js/swiper-bundle.min.js",
  "assets/js/tg-cursor.min.js",
  "assets/js/wow.min.js",
  "assets/js/vendor/jquery-3.6.0.min.js",
]);

const minifierOptions = {
  compress: false,
  mangle: false,
  format: {
    beautify: false,
    comments: false,
  },
  sourceMap: false,
};

function toAbsolute(relativePath) {
  return path.join(projectRoot, relativePath);
}

function assertInsideProject(relativePath) {
  const absolutePath = toAbsolute(relativePath);
  const relativeToProject = path.relative(projectRoot, absolutePath);

  if (relativeToProject.startsWith("..") || path.isAbsolute(relativeToProject)) {
    throw new Error(`Path escapes project root: ${relativePath}`);
  }
}

function assertParsable(code, filePath) {
  try {
    new vm.Script(code, { filename: filePath });
  } catch (error) {
    throw new Error(`${filePath} does not parse: ${error.message}`);
  }
}

async function build() {
  for (const file of files) {
    assertInsideProject(file.source);
    assertInsideProject(file.output);

    if (vendorOutputs.has(file.output)) {
      throw new Error(`Refusing to overwrite vendor asset: ${file.output}`);
    }

    if (file.source.endsWith(".min.js")) {
      throw new Error(`Refusing to use minified source: ${file.source}`);
    }

    const sourcePath = toAbsolute(file.source);
    const outputPath = toAbsolute(file.output);
    const outputDir = path.dirname(outputPath);

    if (!fs.existsSync(sourcePath)) {
      throw new Error(`Missing source file: ${file.source}`);
    }

    fs.mkdirSync(outputDir, { recursive: true });

    const source = fs.readFileSync(sourcePath, "utf8");
    assertParsable(source, file.source);

    const result = await minify(source, minifierOptions);

    if (!result || typeof result.code !== "string" || result.code.trim() === "") {
      throw new Error(`Generated output is empty: ${file.output}`);
    }

    assertParsable(result.code, file.output);

    fs.writeFileSync(outputPath, result.code, "utf8");
    console.log(`${file.source} -> ${file.output}`);
  }
}

build().catch((error) => {
  console.error(error.message);
  process.exit(1);
});
