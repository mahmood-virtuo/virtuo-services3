# CSS Split Validation

## Baseline environment

- Date: 2026-07-18 (Asia/Dubai)
- Branch/HEAD: `testing` at `a0f754a`
- Existing local server: `http://127.0.0.1:8000` (a new server was not started because port 8000 was already serving this project)
- Baseline stylesheet request count for the site CSS layer: one `main.min.css` request, after the existing vendor stylesheets
- Baseline cache busting: rendered `main.min.css` URL includes `?v=<filemtime>` via `virtuo_asset_url()`

## Baseline representative route results

| Route | Status | Response bytes |
|---|---:|---:|
| `/` | 200 | 116,498 |
| `/about` | 200 | 128,727 |
| `/contact` | 200 | 99,666 |
| `/uae-business-formation-structuring-and-compliance` | 200 | 305,989 |
| `/government-relations-and-pro-services` | 200 | 207,337 |
| `/immigration-and-residency-solutions` | 200 | 225,493 |
| `/digital-marketing-and-brand-development` | 200 | 116,468 |
| `/ai-automation-and-technology-solutions` | 200 | 213,719 |
| `/blog` | 200 | 106,213 |
| `/blog/category/business-setup-structuring` | 200 | 83,973 |
| `/blog/tag/company-formation` | 200 | 77,442 |
| `/blog/mainland-free-zone-or-offshore-the-uae-structuring-decision-serious-us-founders-cannot-afford-to-get-wrong` | 200 | 122,084 |
| `/privacy-policy` | 200 | 71,547 |
| `/terms-conditions` | 200 | 71,717 |
| `/definitely-missing-css-split-baseline` | 404 | 76,727 |
| `/assets/css/main.min.css` | 200 | 709,415 |

Response sizes are diagnostic only and may change with unrelated dynamic content. Status and rendered asset-link checks are the regression contract.

## Baseline rendered stylesheet order

The representative homepage order is:

1. `bootstrap.min.css`
2. `fontawesome-all.min.css`
3. `tg-flaticon.css`
4. conditional page vendor CSS where enabled (for example Swiper)
5. `default.css`
6. `default-icons.css`
7. conditional plugin CSS where enabled
8. `aos.css`
9. `tg-cursor.css`
10. `main.min.css`

Only item 10 will be replaced. Existing vendor order and conditional flags remain untouched.

## Phase validation checklist

For every applicable checkpoint:

- [ ] Confirm branch is `testing` and no main/production target was modified.
- [ ] `npm run build:css` succeeds.
- [ ] `node --check scripts/build-css.js` succeeds.
- [ ] `node --check scripts/watch-assets.js` succeeds.
- [ ] `node --check scripts/build-js.js` succeeds where required.
- [ ] Modified PHP files pass `php -l`.
- [ ] `git diff --check` succeeds.
- [ ] Generated bundles exist and configured non-empty bundles are non-empty.
- [ ] Compatibility output remains complete and deterministic.
- [ ] Representative routes preserve expected status codes.
- [ ] Rendered HTML contains core then exactly one family bundle, with filemtime versions.
- [ ] Every requested local CSS asset returns 200.
- [ ] Required restricted browser smoke checks pass, or remaining human checks are recorded.

## Browser smoke log

No browser automation was used in Phase 0 because no rendering behavior changed.

## Phase 1 results

- Node syntax (`css-bundles.js`, `build-css.js`, `watch-assets.js`, `build-js.js`): passed.
- CSS build: passed twice.
- Determinism: all generated SHA-256 hashes matched between consecutive builds.
- Baseline equivalence: declaration content in both compatibility files matches the originals after comments are removed. Thirty-three inherited section-comment indentations were normalized solely to satisfy `git diff --check`; no selectors or declarations changed.
- Watcher: one deliberate source timestamp event produced one CSS build; no generated-output loop occurred during the observation window.
- Local routes: representative home/about/contact/service/blog listing/category/tag/detail/legal routes returned 200; invalid route returned 404.
- CSS assets: compatibility, core, and representative empty family bundle returned 200.
- Browser smoke: not required because Phase 1 did not change active template links and compatibility output is byte-identical.
