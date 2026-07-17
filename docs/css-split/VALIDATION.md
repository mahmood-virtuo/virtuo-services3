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
- Browser smoke: not required because Phase 1 did not change active template links and compatibility declaration content remained equivalent.

## Phase 2 results — home

- Safe extraction: 63 complete homepage-only rules moved; six mixed family rules retained in core.
- PHP syntax (`partials/main-styles.php`, `index.php`): passed.
- Node syntax (manifest/build/watch/JS build/extractor): passed.
- CSS build: passed twice; consecutive output hashes matched.
- Rendered links: versioned core then home; no compatibility main link.
- CSS HTTP status: core 200; home 200.
- Loader safety: unknown family produced only versioned compatibility main; duplicate include produced only two links.
- Current transfer: 699,471-byte core + 9,926-byte home = 709,397 bytes, two requests.
- Browser smoke: attempted through the required lightweight in-app browser, but initialization failed because runtime metadata was unavailable. No Playwright fallback was used.
- Manual checks remaining: desktop and mobile header, slider/mobile slider, marquees, About, eye section, latest blogs, CTA, footer, forms, scroll-to-top, horizontal overflow, missing images/CSS, and new console errors.

## Phase 3 results — About

- Safe extraction: 97 About-only rules moved; four mixed/shared selector rules retained in core.
- PHP syntax (`about.php`): passed.
- CSS build and diff check: passed.
- Rendered links: versioned core then about; no compatibility main.
- HTTP: page, core, and about bundle returned 200.
- Current transfer: 687,877-byte core + 11,798-byte about = 699,675 bytes, two requests (1.37% below original main minified).
- Browser smoke: unavailable; required About desktop/mobile visual checks remain manual.

## Phase 4 results — Contact

- Safe extraction: 92 Contact-only rules moved; shared form/phone/footer and mixed family rules retained in core.
- PHP syntax (`contact.php`): passed.
- CSS build and diff check: passed.
- Rendered links: versioned core then contact; no compatibility main.
- HTTP: page, core, and contact bundle returned 200.
- Current transfer: 675,181-byte core + 12,750-byte contact = 687,931 bytes, two requests (3.03% below original main minified).
- Browser smoke: unavailable; contact desktop/mobile layout and functional form checks remain manual.

## Phase 5 results — Services

- Safe extraction: two fully service-body-scoped rules moved; unscoped/shared service components retained in core.
- PHP syntax (all five service templates): passed.
- CSS build and diff check: passed.
- Rendered links: all five routes and a Digital Marketing tab query load versioned core then services, no compatibility main.
- HTTP: all five canonical routes, non-default tab URL, dynamic content API, core, and services bundle returned 200.
- Current transfer: 674,950-byte core + 231-byte services = 675,181 bytes, two requests (4.83% below original main minified).
- Browser smoke: unavailable; representative interactive and responsive checks remain manual.

## Phase 6 results — Blog listing

- Safe extraction: 68 listing-only rules moved; 36 listing body-scope occurrences retained in mixed/shared rules.
- PHP syntax (`blog.php`, `blog-category.php`, `blog-tag.php`): passed.
- CSS build and diff check: passed.
- Rendered links: listing/category/tag load versioned core then blog-listing, no compatibility main.
- HTTP: listing, valid category, valid tag, core, and blog-listing bundle returned 200.
- Current transfer: 664,403-byte core + 10,868-byte blog-listing = 675,271 bytes, two requests (4.81% below original main minified).
- Browser smoke: unavailable; listing interaction/sticky/responsive checks remain manual.

## Phase 7 results — Blog details

- Safe extraction: 647 detail-only rules moved; 39 detail scope occurrences retained in listing/detail mixed rules.
- PHP syntax (all 11 detail templates): passed.
- CSS build and diff check: passed.
- Rendered links: all 11 canonical routes load versioned core then blog-details, no compatibility main.
- HTTP: all 11 canonical routes, core, and blog-details bundle returned 200.
- Representative specialized markup/JS: detail 2, tax, AI-company, and Emirates-map checks passed.
- Current transfer: 556,139-byte core + 108,573-byte blog-details = 664,712 bytes, two requests (6.30% below original main minified).
- Browser smoke: unavailable; representative article interaction and responsive checks remain manual.
