const fs = require("fs");
const path = require("path");
const CleanCSS = require("clean-css");

const projectRoot = path.resolve(__dirname, "..");
const sourcePath = path.join(projectRoot, "assets/css/main.css");
const outputPath = path.join(projectRoot, "assets/css/main.min.css");

const source = fs.readFileSync(sourcePath, "utf8");
const result = new CleanCSS({
  level: 0,
  rebase: false,
  returnPromise: false,
  sourceMap: false,
}).minify(source);

if (result.errors && result.errors.length > 0) {
  result.errors.forEach((error) => {
    console.error(error);
  });
  process.exit(1);
}

if (result.warnings && result.warnings.length > 0) {
  result.warnings.forEach((warning) => {
    console.warn(warning);
  });
}

fs.writeFileSync(outputPath, result.styles, "utf8");
