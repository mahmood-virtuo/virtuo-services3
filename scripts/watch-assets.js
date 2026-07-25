const path = require("path");
const { spawn } = require("child_process");
const chokidar = require("chokidar");

const projectRoot = path.resolve(__dirname, "..");

const cssSources = [
  path.join(projectRoot, "assets/css/src"),
  path.join(projectRoot, "scripts/css-bundles.js"),
  path.join(projectRoot, "scripts/build-css.js"),
];

const jsSources = [
  "assets/js/ajax-form.js",
  "assets/js/blog-detail-sticky-widgets.js",
  "assets/js/blog-details.js",
  "assets/js/blog-details2.js",
  "assets/js/blog-load-more.js",
  "assets/js/blog-sticky-widgets.js",
  "assets/js/blog-toc.js",
  "assets/js/main.js",
  "assets/js/virtuo-blog-interactives.js",
  "assets/js/virtuo-phone-loader.js",
  "assets/js/virtuo-mega-menu.js",
  "assets/js/virtuo-performance.js",
  "assets/js/virtuo-service-tabs-breadcrumb.js",
].map((file) => path.join(projectRoot, file));

const jobs = {
  css: {
    script: path.join(projectRoot, "scripts/build-css.js"),
    running: false,
    pending: false,
    timer: null,
  },
  js: {
    script: path.join(projectRoot, "scripts/build-js.js"),
    running: false,
    pending: false,
    timer: null,
  },
};

function getTime() {
  return new Date().toLocaleTimeString();
}

function runBuild(type) {
  const job = jobs[type];

  if (job.running) {
    job.pending = true;
    return;
  }

  job.running = true;

  console.log(`\n[${getTime()}] Building ${type.toUpperCase()}...`);

  const child = spawn(process.execPath, [job.script], {
    cwd: projectRoot,
    stdio: "inherit",
  });

  child.on("error", (error) => {
    console.error(
      `[${getTime()}] Could not start the ${type.toUpperCase()} build:`,
      error.message
    );
  });

  child.on("close", (code) => {
    job.running = false;

    if (code === 0) {
      console.log(`[${getTime()}] ${type.toUpperCase()} build completed.`);
    } else {
      console.error(
        `[${getTime()}] ${type.toUpperCase()} build failed with exit code ${code}.`
      );
    }

    if (job.pending) {
      job.pending = false;
      runBuild(type);
    }
  });
}

function scheduleBuild(type, changedFile) {
  const job = jobs[type];

  clearTimeout(job.timer);

  job.timer = setTimeout(() => {
    console.log(
      `[${getTime()}] Change detected: ${path.relative(
        projectRoot,
        changedFile
      )}`
    );

    runBuild(type);
  }, 200);
}

const watcherOptions = {
  ignoreInitial: true,
  awaitWriteFinish: {
    stabilityThreshold: 200,
    pollInterval: 50,
  },
};

const cssWatcher = chokidar.watch(cssSources, watcherOptions);
const jsWatcher = chokidar.watch(jsSources, watcherOptions);

cssWatcher.on("all", (event, filePath) => {
  if (event === "add" || event === "change" || event === "unlink") {
    scheduleBuild("css", filePath);
  }
});

jsWatcher.on("all", (event, filePath) => {
  if (event === "add" || event === "change") {
    scheduleBuild("js", filePath);
  }
});

cssWatcher.on("error", (error) => {
  console.error("CSS watcher error:", error.message);
});

jsWatcher.on("error", (error) => {
  console.error("JavaScript watcher error:", error.message);
});

console.log("Virtuo asset watcher started.");
console.log("Watching: assets/css/src recursively and CSS build configuration");
console.log(`Watching: ${jsSources.length} JavaScript source files`);
console.log("Press Control + C to stop watching.");

runBuild("css");
runBuild("js");

async function stopWatchers() {
  console.log("\nStopping Virtuo asset watcher...");

  await Promise.all([
    cssWatcher.close(),
    jsWatcher.close(),
  ]);

  process.exit(0);
}

process.on("SIGINT", stopWatchers);
process.on("SIGTERM", stopWatchers);
