"use strict";

const username = process.env.STAGING_BASIC_AUTH_USERNAME;
const password = process.env.STAGING_BASIC_AUTH_PASSWORD;

if (!username || !password) {
  throw new Error("Missing STAGING_BASIC_AUTH_USERNAME or STAGING_BASIC_AUTH_PASSWORD.");
}

const credentials = Buffer.from(`${username}:${password}`, "utf8").toString("base64");

module.exports = {
  ci: {
    collect: {
      url: ["https://staging.virtuo.ae/"],

      // Run three tests and use median values to reduce fluctuations.
      numberOfRuns: 3,

      settings: {
        chromeFlags: "--no-sandbox",

        // Give Lighthouse access to the protected staging website.
        extraHeaders: JSON.stringify({
          Authorization: `Basic ${credentials}`,
        }),
      },
    },

    assert: {
      assertions: {
        "categories:performance": [
          "warn",
          {
            minScore: 0.55,
            aggregationMethod: "median",
          },
        ],

        "first-contentful-paint": [
          "warn",
          {
            maxNumericValue: 4000,
            aggregationMethod: "median",
          },
        ],

        "largest-contentful-paint": [
          "warn",
          {
            maxNumericValue: 5500,
            aggregationMethod: "median",
          },
        ],

        "total-blocking-time": [
          "warn",
          {
            maxNumericValue: 800,
            aggregationMethod: "median",
          },
        ],

        "cumulative-layout-shift": [
          "warn",
          {
            maxNumericValue: 0.1,
            aggregationMethod: "median",
          },
        ],
      },
    },

    upload: {
      target: "filesystem",
      outputDir: "./lighthouse-results",
    },
  },
};
