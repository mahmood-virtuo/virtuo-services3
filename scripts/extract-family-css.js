const fs = require("fs");
const path = require("path");

const projectRoot = path.resolve(__dirname, "..");
const corePath = path.join(projectRoot, "assets/css/src/core.css");
const familyConfig = Object.freeze({
  home: { bodyClasses: ["home-page"], output: "home.css" },
  about: { bodyClasses: ["about-page"], output: "about.css" },
  contact: { bodyClasses: ["contact-page"], output: "contact.css" },
  services: {
    bodyClasses: [
      "service-page",
      "uae-business-formation-page",
      "government-relations-page",
      "immigration-residency-page",
      "digital-marketing-page",
      "ai-automation-page",
    ],
    output: "services.css",
  },
  "blog-listing": { bodyClasses: ["blog-page"], output: "blog-listing.css" },
  "blog-details": {
    bodyClasses: [
      "blog-details-page",
      "blog-details2-page",
      "blog-real-estate-brokerage-page",
      "blog-ai-company-page",
      "blog-uae-emirates-page",
    ],
    output: "blog-details.css",
  },
});
const groupAtRulePattern = /^@(media|supports|container|layer|scope|starting-style)\b/i;

function skipComment(source, position, end) {
  const close = source.indexOf("*/", position + 2);

  if (close === -1 || close + 2 > end) {
    throw new Error(`Unclosed CSS comment at byte ${position}.`);
  }

  return close + 2;
}

function skipTrivia(source, position, end) {
  let cursor = position;

  while (cursor < end) {
    if (/\s/.test(source[cursor])) {
      cursor += 1;
    } else if (source.startsWith("/*", cursor)) {
      cursor = skipComment(source, cursor, end);
    } else {
      break;
    }
  }

  return cursor;
}

function findStatementDelimiter(source, position, end) {
  let quote = "";
  let parentheses = 0;
  let brackets = 0;

  for (let cursor = position; cursor < end; cursor += 1) {
    const character = source[cursor];

    if (quote) {
      if (character === "\\") {
        cursor += 1;
      } else if (character === quote) {
        quote = "";
      }
      continue;
    }

    if (source.startsWith("/*", cursor)) {
      cursor = skipComment(source, cursor, end) - 1;
      continue;
    }

    if (character === '"' || character === "'") {
      quote = character;
    } else if (character === "(") {
      parentheses += 1;
    } else if (character === ")") {
      parentheses -= 1;
    } else if (character === "[") {
      brackets += 1;
    } else if (character === "]") {
      brackets -= 1;
    } else if (parentheses === 0 && brackets === 0 && (character === "{" || character === ";")) {
      return cursor;
    }
  }

  throw new Error(`Could not find the end of a CSS statement at byte ${position}.`);
}

function findClosingBrace(source, openPosition, end) {
  let depth = 1;
  let quote = "";

  for (let cursor = openPosition + 1; cursor < end; cursor += 1) {
    const character = source[cursor];

    if (quote) {
      if (character === "\\") {
        cursor += 1;
      } else if (character === quote) {
        quote = "";
      }
      continue;
    }

    if (source.startsWith("/*", cursor)) {
      cursor = skipComment(source, cursor, end) - 1;
      continue;
    }

    if (character === '"' || character === "'") {
      quote = character;
    } else if (character === "{") {
      depth += 1;
    } else if (character === "}") {
      depth -= 1;
      if (depth === 0) {
        return cursor;
      }
    }
  }

  throw new Error(`Unclosed CSS block at byte ${openPosition}.`);
}

function splitSelectors(prelude) {
  const selectors = [];
  let start = 0;
  let quote = "";
  let parentheses = 0;
  let brackets = 0;

  for (let cursor = 0; cursor < prelude.length; cursor += 1) {
    const character = prelude[cursor];

    if (quote) {
      if (character === "\\") {
        cursor += 1;
      } else if (character === quote) {
        quote = "";
      }
      continue;
    }

    if (prelude.startsWith("/*", cursor)) {
      cursor = skipComment(prelude, cursor, prelude.length) - 1;
      continue;
    }

    if (character === '"' || character === "'") {
      quote = character;
    } else if (character === "(") {
      parentheses += 1;
    } else if (character === ")") {
      parentheses -= 1;
    } else if (character === "[") {
      brackets += 1;
    } else if (character === "]") {
      brackets -= 1;
    } else if (character === "," && parentheses === 0 && brackets === 0) {
      selectors.push(prelude.slice(start, cursor).trim());
      start = cursor + 1;
    }
  }

  selectors.push(prelude.slice(start).trim());
  return selectors;
}

function selectorBelongsToFamily(selector, bodyClasses) {
  return bodyClasses.some((bodyClass) => {
    const escapedClass = bodyClass.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
    return new RegExp(`body\\.${escapedClass}(?![a-zA-Z0-9_-])`).test(selector);
  });
}

function transformBlock(source, start, end, bodyClasses, isRoot = false) {
  let cursor = start;
  let core = "";
  let family = "";
  let coreRuleCount = 0;
  let familyRuleCount = 0;
  let movedRuleCount = 0;

  while (cursor < end) {
    const nodeStartWithTrivia = cursor;
    const nodeStart = skipTrivia(source, cursor, end);

    if (nodeStart >= end) {
      const tail = source.slice(nodeStartWithTrivia, end);
      if (coreRuleCount > 0 || isRoot) {
        core += tail;
      } else {
        family += tail;
      }
      break;
    }

    const delimiter = findStatementDelimiter(source, nodeStart, end);

    if (source[delimiter] === ";") {
      core += source.slice(nodeStartWithTrivia, delimiter + 1);
      cursor = delimiter + 1;
      continue;
    }

    const close = findClosingBrace(source, delimiter, end);
    const prelude = source.slice(nodeStart, delimiter).trim();
    const prefix = source.slice(nodeStartWithTrivia, nodeStart);
    const opening = source.slice(nodeStart, delimiter + 1);
    const completeNode = source.slice(nodeStartWithTrivia, close + 1);

    if (groupAtRulePattern.test(prelude)) {
      const nested = transformBlock(source, delimiter + 1, close, bodyClasses);

      if (nested.coreRuleCount > 0) {
        core += prefix + opening + nested.core + "}";
        coreRuleCount += nested.coreRuleCount;
      }

      if (nested.familyRuleCount > 0) {
        family += prefix + opening + nested.family + "}";
        familyRuleCount += nested.familyRuleCount;
        movedRuleCount += nested.movedRuleCount;
      }
    } else if (prelude.startsWith("@")) {
      core += completeNode;
    } else {
      const selectors = splitSelectors(prelude);
      const belongsToFamily = selectors.length > 0 && selectors.every(
        (selector) => selectorBelongsToFamily(selector, bodyClasses)
      );

      if (belongsToFamily) {
        family += completeNode;
        familyRuleCount += 1;
        movedRuleCount += 1;
      } else {
        core += completeNode;
        coreRuleCount += 1;
      }
    }

    cursor = close + 1;
  }

  return { core, family, coreRuleCount, familyRuleCount, movedRuleCount };
}

function main() {
  const familyName = process.argv[2];
  const dryRun = process.argv.includes("--dry-run");
  const config = familyConfig[familyName];

  if (!config) {
    throw new Error(`Unknown family. Expected one of: ${Object.keys(familyConfig).join(", ")}`);
  }

  const familyPath = path.join(projectRoot, "assets/css/src/pages", config.output);
  const coreSource = fs.readFileSync(corePath, "utf8");
  const existingFamilySource = fs.readFileSync(familyPath, "utf8");

  if (existingFamilySource.trim() !== "") {
    throw new Error(`Refusing to overwrite non-empty family source: ${path.relative(projectRoot, familyPath)}`);
  }

  const result = transformBlock(coreSource, 0, coreSource.length, config.bodyClasses, true);

  if (result.movedRuleCount === 0 || result.family.trim() === "" || result.core.trim() === "") {
    throw new Error(`Safe extraction found no movable ${familyName} rules.`);
  }

  const parsedCore = transformBlock(result.core, 0, result.core.length, [], true);
  const parsedFamily = transformBlock(result.family, 0, result.family.length, [], true);
  const totalAfter = parsedCore.coreRuleCount + parsedFamily.coreRuleCount;
  const totalBefore = result.coreRuleCount + result.familyRuleCount;

  if (totalAfter !== totalBefore) {
    throw new Error(`Rule-count validation failed: ${totalBefore} before, ${totalAfter} after.`);
  }

  console.log(`${familyName}: ${result.movedRuleCount} rules selected`);
  console.log(`core: ${Buffer.byteLength(coreSource)} -> ${Buffer.byteLength(result.core)} bytes`);
  console.log(`${config.output}: ${Buffer.byteLength(result.family)} bytes`);

  if (!dryRun) {
    fs.writeFileSync(corePath, result.core, "utf8");
    fs.writeFileSync(familyPath, result.family, "utf8");
  }
}

try {
  main();
} catch (error) {
  console.error(error.message);
  process.exit(1);
}
