const sourceRoot = "assets/css/src";
const bundleRoot = "assets/css/bundles";

const families = [
  "home",
  "about",
  "contact",
  "services",
  "blog-listing",
  "blog-details",
  "legal",
  "error",
];

const bundles = [
  {
    name: "core",
    source: `${sourceRoot}/core.css`,
    output: `${bundleRoot}/core.min.css`,
    allowEmpty: false,
  },
  {
    name: "home-critical",
    source: `${sourceRoot}/critical/home-critical.css`,
    output: `${bundleRoot}/home-critical.min.css`,
    allowEmpty: false,
  },
  ...families.map((name) => ({
    name,
    source: `${sourceRoot}/pages/${name}.css`,
    output: `${bundleRoot}/${name}.min.css`,
    allowEmpty: true,
  })),
];

module.exports = Object.freeze({
  sourceRoot,
  bundleRoot,
  families: Object.freeze(families),
  bundles: Object.freeze(bundles),
  compatibility: Object.freeze({
    sources: Object.freeze(bundles.map((bundle) => bundle.source)),
    unminifiedOutput: "assets/css/main.css",
    minifiedOutput: "assets/css/main.min.css",
  }),
});
