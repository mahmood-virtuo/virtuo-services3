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

## Phase 8 results — Legal

- Safe extraction: none; no legal-specific CSS selector was present, so shared typography/layout stays in core.
- PHP syntax (`privacy-policy.php`, `terms-conditions.php`): passed.
- CSS build and diff check: passed.
- Rendered links: both legal routes load versioned core then legal, no compatibility main.
- HTTP: both legal routes, core, and legal placeholder bundle returned 200.
- Current transfer: 556,139-byte core + 50-byte legal = 556,189 bytes, two requests (21.60% below original main minified).
- Browser smoke: unavailable; legal desktop/mobile visual checks remain manual.

## Phase 9 results — Error

- Safe extraction: 13 repository-proven error-only rules moved with original selectors unchanged.
- PHP syntax (`error.php`) and Node syntax (extractor): passed.
- CSS build and diff check: passed.
- Rendered links/status: invalid route remained 404 and loads versioned core then error, no compatibility main.
- HTTP: core, error bundle, and root-relative 404 button icon returned 200.
- Current transfer: 555,248-byte core + 891-byte error = 556,139 bytes, two requests (21.61% below original main minified).
- Browser smoke: unavailable; 404 desktop/mobile visual check remains manual.

## Phase 10 final audit

- Active template audit: 25/25 explicitly classified; zero active direct main links.
- Link audit: core exactly once, intended family exactly once, correct order, filemtime versions present, compatibility main absent.
- Route audit: all classified/canonical routes 200; generic and taxonomy-invalid routes 404.
- Asset audit: all nine generated bundles and both compatibility assets 200 and non-empty.
- Manifest audit: every editable source and generated output is unique; compatibility order matches bundle source order.
- PHP syntax: all 26 modified PHP files passed.
- Node syntax: manifest, CSS builder, watcher, JS builder, and extractor passed.
- CSS build: passed twice; complete generated SHA-256 sets matched.
- Watcher: one source timestamp event produced one CSS build and no output loop.
- Git checks: `git diff --check` passed; no deployment/routing/server/sitemap/main config changed.
- Testing deployment: all checkpoint GitHub Actions runs through final audit `c69f5d6` succeeded; final run `29614735239` passed and staging unauthenticated response is expected 401.
- Browser smoke: unavailable because the lightweight in-app browser could not initialize. No standalone Playwright fallback was used.

### Manual browser matrix still required

- Home desktop/mobile: header/menu, slider, mobile slider, marquees, About, eye, latest blogs, CTA, footer, forms, scroll-to-top, overflow, images, CSS/network, console.
- About desktop/mobile: hero, mission/vision, story, service-image spacing, eye, stacking, footer, forms.
- Contact desktop/mobile: form, phone field, AJAX states, FAQ, responsive layout, map/CTA overlap, footer.
- Services: representative desktop/mobile route, all sidebar/nested states, breadcrumb, FAQ, forms/CTA, Digital Marketing base and one dynamic tab/History API transition.
- Blog listing desktop/mobile: cards/overlays, taxonomy, sidebars/form, load-more, sticky widgets, columns/overflow.
- Blog details: one standard article, detail 2 interactive article, tax or AI article, and Emirates map across distributed desktop/mobile; verify TOC, sticky widgets, tabs, accordions, charts, tables, overflow, author/CTA/forms.
- Legal desktop/mobile and invalid-route 404 desktop/mobile.

## Phase 11 results — split CSS asset URLs

- URL inventory: all split sources and generated bundles scanned; seven unique local assets found in core, one external CDN URL preserved, one SVG fragment-only URL preserved, and no page-family local asset URL found.
- URL strategy: all 13 local core occurrences now use root-relative `/assets/img/...` paths; selector/declaration order, specificity, responsive rules, and visual declarations are otherwise unchanged.
- Build enforcement: the CSS build rejects relative local source URLs and missing root-relative local targets while preserving external, data, protocol-relative, other-scheme, and fragment-only references.
- CSS build: passed twice; all nine bundle hashes and both compatibility hashes matched between consecutive builds.
- Generated-path audit: no accidental `/assets/css/img/`, `/assets/css/bundles/img/`, `/assets/css/src/img/`, `/assets/css/bundles/fonts/`, relative image/font path, or old about-mask failure path remains.
- Local asset audit: all seven target files exist and all corrected HTTP URLs return 200; the about mask resolves at `/assets/img/images/about_mask_img.svg`.
- Rendered links/status: the ten representative routes returned expected 200/404 statuses and loaded core exactly once followed by the expected family exactly once, with no active compatibility main.
- Bundle HTTP status: core and all eight family bundle files returned 200 with CSS content types.
- Resource crawl: 182 local CSS/image/font resources referenced by representative HTML/CSS were requested. Three pre-existing Government Relations HTML image paths containing spaces returned 404 through the local router despite matching files on disk; they are unrelated to CSS, predate this phase, and were not modified. Every split-CSS-originated resource returned 200.
- Testing deployment: checkpoint `1a68f6c` was pushed only to `origin/testing`; GitHub Actions staging run `29647165392` succeeded.
- Browser automation: not used under the requested lightweight-testing restriction.

Manual checks remaining: verify the representative route matrix on staging at desktop/mobile, confirm the Network panel has no CSS-originated image/font 404s (especially the About mask), confirm no new console errors, and visually check mask/background rendering. Separately verify whether staging serves the three existing space-containing Government Relations image filenames before scoping any follow-up.
