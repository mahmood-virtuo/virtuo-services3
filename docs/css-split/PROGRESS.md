# CSS Split Progress

## Baseline

- Branch: `testing`
- Baseline commit: `a0f754a` (`Support Basic Auth in staging health check`)
- Remote tracking branch: `origin/testing`
- Starting worktree: clean
- Original `assets/css/main.css`: 831,837 bytes; SHA-256 `acb749e03607a964f1733b9ae05db7ce56e032bd81df540693293896756a4b6b`
- Original `assets/css/main.min.css`: 709,415 bytes; SHA-256 `19cecf2edf3d0d613a2b92b0524954b5babc2af52aa217d93bac0be621c75b31`

## Current phase

Phase 10 — final audit. All command-line, route, asset, build, watcher, syntax, size, and workflow checks are complete; final documentation commit and push are pending.

## Completed phases

- Phase 0 — baseline and inventory (`5ab29c2`, pushed to `origin/testing`)
- Phase 1 — deterministic multi-bundle build architecture (`bf3a8ff`, pushed to `origin/testing`)
- Phase 2 — home family (`066ddc9`, pushed to `origin/testing`)
- Phase 3 — About family (`aa353e5`, pushed to `origin/testing`)
- Phase 4 — Contact family (`d5141bb`, pushed to `origin/testing`)
- Phase 5 — Services family (`b659810`, pushed to `origin/testing`)
- Phase 6 — Blog listing family (`4a0cec4`, pushed to `origin/testing`)
- Phase 7 — Blog-detail family (`84bd724`, pushed to `origin/testing`)
- Phase 8 — Legal family (`4a8df08`, pushed to `origin/testing`)
- Phase 9 — Error family (`1f8cf10`, pushed to `origin/testing`)

## Pending phases

- Phase 10 final audit

## Phase log

### Phase 0 — baseline and inventory

Files changed:

- `docs/css-split/PLAN.md`
- `docs/css-split/PROGRESS.md`
- `docs/css-split/VALIDATION.md`
- `docs/css-split/BUNDLE-MAP.md`

Commands run:

- `git branch --show-current`
- `git status --short`
- `git log -1 --oneline`
- `git remote -v`
- `wc -c assets/css/main.css assets/css/main.min.css`
- `shasum -a 256 assets/css/main.css assets/css/main.min.css`
- Targeted `rg`, `sed`, `find`, and `awk` inventory of active templates, routes, body classes, stylesheet order, build scripts, and CSS sections
- Representative local `curl` route/status and rendered stylesheet checks against the existing server on `127.0.0.1:8000`

Validation results:

- Initial branch/cleanliness safety gate: passed.
- Active route/template/body-class inventory: completed.
- Baseline HTTP status inventory: completed; one intentionally invalid category probe returned 404 and was replaced with the valid category slug `business-setup-structuring`, which returned 200.
- `git diff --check`: passed.

Browser-smoke results: not applicable; Phase 0 made no behavioral or visual changes.

Commit SHA: `5ab29c2`.

Pushed: yes, to `origin/testing`.

Remaining risk: page-exclusive unscoped CSS must not be over-classified; uncertain ownership will remain in core.

Exact next action: create the Phase 1 source tree, manifest-driven builder, generated bundles, and recursive source watcher without changing active template loading.

### Phase 1 — build architecture

Files changed:

- `assets/css/src/core.css` (exact bootstrap copy of baseline `main.css`)
- Eight empty `assets/css/src/pages/*.css` family sources
- Nine generated `assets/css/bundles/*.min.css` outputs
- `scripts/css-bundles.js`
- `scripts/build-css.js`
- `scripts/watch-assets.js`
- CSS-split documentation

Commands run:

- Node syntax checks for `css-bundles.js`, `build-css.js`, `watch-assets.js`, and `build-js.js`
- `npm run build:css` twice with SHA-256 comparison
- `npm run watch`, followed by a harmless timestamp change to `pages/home.css`, observation, and clean SIGINT shutdown
- Representative local `curl` route and CSS asset checks
- Compatibility `wc -c` and SHA-256 comparisons
- `git diff --check`, diff stat, and name-status review

Validation results:

- Compatibility `main.css`: declaration content matches the baseline after comments are removed. Final Phase 1 size is 831,705 bytes; the 132-byte difference is only normalization of inherited space-before-tab indentation in 33 section-heading comments so `git diff --check` passes for the new source.
- Compatibility `main.min.css`: declaration content also matches the baseline after comments are removed. Final Phase 1 size is 709,283 bytes; only the same preserved comment whitespace changed.
- Repeat build: deterministic; all bundle and compatibility hashes matched.
- CleanCSS: succeeded and reported the existing remote `@import` skip as a visible warning for both core and compatibility builds.
- Watcher: initial CSS/JS builds passed; one source timestamp change triggered exactly one CSS rebuild; generated outputs caused no loop.
- Representative page, taxonomy, blog-detail, legal, main CSS, core CSS, and family CSS requests returned expected 200 statuses; invalid route remained 404.
- Active templates remain on compatibility `main.min.css` in this architecture-only phase.
- `git diff --check`: passed after comment-only indentation normalization.
- Browser smoke: not applicable because delivered CSS and template loading are unchanged and compatibility hashes are exact.

Commit SHA: `bf3a8ff`.

Pushed: yes, to `origin/testing`.

Remaining risk: Phase 2 begins the first cascade-sensitive extraction; ambiguous rules will stay in core.

Exact next action: extract only conclusively `body.home-page`-owned rules and introduce the centralized loader for `index.php`.

### Phase 2 — home family

Files changed:

- `assets/css/src/core.css`
- `assets/css/src/pages/home.css`
- Generated `assets/css/bundles/core.min.css`, `home.min.css`, `main.css`, and `main.min.css`
- `partials/main-styles.php`
- `index.php`
- `scripts/extract-family-css.js`
- CSS-split documentation

Commands run:

- Targeted homepage selector/template/JavaScript audit with `rg` and `sed`
- `node --check scripts/extract-family-css.js`
- Dry-run and applied `node scripts/extract-family-css.js home`
- `npm run build:css` twice with generated SHA-256 comparison
- Node syntax checks for bundle, build, watch, JS build, and extractor scripts
- `php -l partials/main-styles.php` and `php -l index.php`
- Local `curl` rendered-link and CSS request checks
- PHP CLI compatibility-fallback and duplicate-loader checks
- `git diff --check`, stat, and name-status review

Validation results:

- Extracted 63 complete rules (11,257 source bytes; 9,926 minified bytes) whose every selector is homepage body-scoped.
- Six mixed home/about/contact selector rules remain in core.
- Core is 699,471 minified bytes; home is 9,926 bytes; current core + home is 709,397 bytes. This is 18 bytes (0.0025%) below the original 709,415-byte baseline. Meaningful homepage reduction will occur only after other family-only rules leave core in later phases.
- Homepage rendered HTML loads versioned `core.min.css` followed by versioned `home.min.css`; it does not load `main.min.css`; both CSS requests return 200.
- Invalid/unclassified loader input falls back to versioned `main.min.css`; including the loader twice emits only the original two family links.
- PHP, Node, deterministic build, and `git diff --check` validations passed.
- Restricted browser smoke could not run because the in-app browser runtime failed to initialize due unavailable runtime metadata. Standalone Playwright was not used under the restricted testing policy.

Browser-smoke results: unavailable; desktop/mobile homepage checks remain manual.

Commit SHA: `066ddc9`.

Pushed: yes, to `origin/testing`.

Remaining risk: desktop/mobile visual cascade, slider, marquee, CTA, footer/form, image, overflow, and console/network checks require human browser verification.

Exact next action: migrate the About family while retaining all mixed/shared selectors in core.

### Phase 3 — About family

Files changed:

- `assets/css/src/core.css`
- `assets/css/src/pages/about.css`
- Generated core/about/compatibility CSS outputs
- `about.php`
- CSS-split documentation

Commands run:

- About selector context audit
- Dry-run and applied `node scripts/extract-family-css.js about`
- `npm run build:css`
- `php -l about.php`
- Local rendered-link and CSS HTTP checks
- `git diff --check`

Validation results:

- Extracted 97 complete About-only rules (13,880 source bytes; 11,798 minified bytes).
- Four mixed About/home/contact/blog or unscoped/shared selector rules remain in core.
- About rendered HTML loads versioned core then about, no compatibility main; page and both bundles return 200.
- Core + about is 699,675 bytes, a 9,740-byte (1.37%) reduction from the original minified baseline.
- PHP syntax and diff checks passed.
- Restricted browser remains unavailable; no Playwright fallback was used.

Browser-smoke results: unavailable; desktop/mobile hero, mission/vision, story, service-image spacing, eye image, stacking, footer, and forms remain manual.

Commit SHA: `aa353e5`.

Pushed: yes, to `origin/testing`.

Remaining risk: About desktop/mobile cascade and responsive visual behavior require human browser verification.

Exact next action: migrate Contact while keeping shared forms and phone-field foundations in core.

### Phase 4 — Contact family

Files changed:

- `assets/css/src/core.css`
- `assets/css/src/pages/contact.css`
- Generated core/contact/compatibility CSS outputs
- `contact.php`
- CSS-split documentation

Commands run:

- Contact selector/form context audit
- Dry-run and applied `node scripts/extract-family-css.js contact`
- `npm run build:css`
- `php -l contact.php`
- Local rendered-link and CSS HTTP checks
- `git diff --check`

Validation results:

- Extracted 92 complete Contact-only rules (14,851 source bytes; 12,750 minified bytes).
- Shared form, phone-field, footer, eye-section, marquee, and mixed selector rules remain in core.
- Contact rendered HTML loads versioned core then contact, no compatibility main; page and both bundles return 200.
- Core + contact is 687,931 bytes, a 21,484-byte (3.03%) reduction from the original minified baseline.
- PHP syntax and diff checks passed.
- Restricted browser remains unavailable; no Playwright fallback was used.

Browser-smoke results: unavailable; desktop/mobile contact form, intl-tel-input, AJAX styling, FAQ, responsive layout, map/CTA overlap, footer, and console/network behavior remain manual.

Commit SHA: `d5141bb`.

Pushed: yes, to `origin/testing`.

Remaining risk: Contact desktop/mobile visual and form-interaction checks require human browser verification.

Exact next action: migrate all five service templates together while keeping reusable service/sidebar primitives in core.

### Phase 5 — Services family

Files changed:

- `assets/css/src/core.css`
- `assets/css/src/pages/services.css`
- Generated core/services/compatibility CSS outputs
- All five active service PHP templates
- CSS-split documentation

Commands run:

- Service template, AJAX partial, and JavaScript-added class audit
- Dry-run and applied `node scripts/extract-family-css.js services`
- `npm run build:css`
- `php -l` on all five templates
- Local rendered-link/status checks on all five routes plus a Digital Marketing tab query
- Dynamic content API status/payload check with a non-default tab
- CSS asset HTTP checks and `git diff --check`

Validation results:

- Extracted two complete service-only responsive image rules (299 source bytes; 231 minified bytes).
- Reusable sidebar tabs, nested tabs, breadcrumb, FAQ, work/process, CTA, forms, and AJAX dynamic-content primitives remain in core because they are unscoped or shared/uncertain.
- All five service routes and a non-default Digital Marketing tab query returned 200 and each rendered exactly one versioned core + services pair with no compatibility main.
- Dynamic content API returned 200 and the requested non-default tab payload.
- Core + services is 675,181 bytes, a 34,234-byte (4.83%) reduction from the original minified baseline.
- PHP syntax and diff checks passed.
- Restricted browser remains unavailable; no Playwright fallback was used.

Browser-smoke results: unavailable; representative desktop/mobile service, sidebar/tab states, Digital Marketing tab transition, breadcrumb, FAQ, CTA/forms, and responsive checks remain manual.

Commit SHA: `b659810`.

Pushed: yes, to `origin/testing`.

Remaining risk: service interaction and responsive cascade behavior require human browser verification.

Exact next action: migrate Blog listing/category/tag together while retaining listing/detail shared components in core.

### Phase 6 — Blog listing family

Files changed:

- `assets/css/src/core.css`
- `assets/css/src/pages/blog-listing.css`
- Generated core/blog-listing/compatibility CSS outputs
- `blog.php`, `blog-category.php`, `blog-tag.php`
- CSS-split documentation

Commands run:

- Listing selector, template, partial, load-more, and sticky-widget audit
- Dry-run and applied `node scripts/extract-family-css.js blog-listing`
- `npm run build:css`
- `php -l` on all three templates
- Local rendered-link/status checks on listing, valid category, and valid tag routes
- CSS asset HTTP checks and `git diff --check`

Validation results:

- Extracted 68 complete listing-only rules (12,660 source bytes; 10,868 minified bytes).
- Thirty-six `body.blog-page` occurrences remain in core because their rules mix listing/detail or other families.
- Listing, category, and tag routes returned 200 and each rendered exactly one versioned core + blog-listing pair with no compatibility main.
- Core + blog listing is 675,271 bytes, a 34,144-byte (4.81%) reduction from the original minified baseline.
- PHP syntax and diff checks passed.
- Restricted browser remains unavailable; no Playwright fallback was used.

Browser-smoke results: unavailable; cards, filters, taxonomy, sidebars/form, load-more, sticky behavior, columns, mobile layout, console/network remain manual.

Commit SHA: `4a0cec4`.

Pushed: yes, to `origin/testing`.

Remaining risk: listing interaction, sticky, and responsive cascade behavior require human browser verification.

Exact next action: audit and migrate all 11 active blog-detail templates together, including subtype and interactive-component scopes.

### Phase 7 — Blog-detail family

Files changed:

- `assets/css/src/core.css`
- `assets/css/src/pages/blog-details.css`
- Generated core/blog-details/compatibility CSS outputs
- All 11 active `blog-details*.php` templates
- CSS-split documentation

Commands run:

- Router/template, detail subtype, interactive JS, and article-component audit
- Dry-run and applied `node scripts/extract-family-css.js blog-details`
- `npm run build:css`
- `php -l` on all 11 templates
- Local rendered-link/status checks on all 11 canonical blog slugs
- Article-specific markup/script checks for detail 2, tax, AI-company, and Emirates-map articles
- CSS asset HTTP checks and `git diff --check`

Validation results:

- Extracted 647 complete detail-only rules (121,893 source bytes; 108,573 minified bytes), including all configured detail subtype body scopes.
- Thirty-nine detail body-scope occurrences remain in core because their rules mix listing/detail selectors.
- All 11 canonical blog-detail routes returned 200 and each rendered exactly one versioned core + blog-details pair with no compatibility main.
- Specialized representative markup and its existing JS references remain present for detail 2, tax, AI-company, and Emirates-map articles.
- Core + blog details is 664,712 bytes, a 44,703-byte (6.30%) reduction from the original minified baseline.
- PHP syntax and diff checks passed.
- Restricted browser remains unavailable; no Playwright fallback was used.

Browser-smoke results: unavailable; standard, interactive, AI/tax/Emirates components and distributed desktop/mobile behavior remain manual.

Commit SHA: `84bd724`.

Pushed: yes, to `origin/testing`.

Remaining risk: article component cascade, interactive states, tables/overflow, sticky widgets, and responsive behavior require human browser verification.

Exact next action: migrate the two Legal templates, moving no generic typography without conclusive ownership evidence.

### Phase 8 — Legal family

Files changed:

- `privacy-policy.php`
- `terms-conditions.php`
- CSS-split documentation

Commands run:

- Legal wrapper/class and CSS selector audit
- `npm run build:css`
- `php -l` on both templates
- Local rendered-link/status and legal wrapper checks
- CSS asset HTTP checks and `git diff --check`

Validation results:

- No legal-specific rule exists in core; the templates use shared breadcrumb, typography, grid, spacing, header, and footer rules. No generic rule was moved without evidence.
- The generated legal bundle remains the deterministic 50-byte valid placeholder.
- Both legal routes returned 200 and each rendered exactly one versioned core + legal pair with no compatibility main.
- Core + legal is 556,189 bytes, a 153,226-byte (21.60%) reduction from the original minified baseline.
- PHP syntax and diff checks passed.
- Restricted browser remains unavailable; no Playwright fallback was used.

Browser-smoke results: unavailable; shared hero, mobile hero, typography, content width/lists, footer alignment, and responsive behavior remain manual.

Commit SHA: `4a8df08`.

Pushed: yes, to `origin/testing`.

Remaining risk: legal desktop/mobile visual behavior requires human browser verification; no legal-only CSS was isolated because none was conclusively present.

Exact next action: migrate `error.php` without changing routing or 404 status behavior, using repository-proven exclusive error selectors.

### Phase 9 — Error family

Files changed:

- `assets/css/src/core.css`
- `assets/css/src/pages/error.css`
- Generated core/error/compatibility CSS outputs
- `error.php`
- `scripts/extract-family-css.js` (safe allowlisted selector-prefix support for the unscoped error section)
- CSS-split documentation

Commands run:

- Error template/class usage audit across active sources
- Node syntax and dry-run of the extended extractor
- Applied `node scripts/extract-family-css.js error`
- `npm run build:css`
- `php -l error.php`
- Invalid-route rendered-link/status/content checks
- Core/error/icon asset HTTP checks and `git diff --check`

Validation results:

- Repository evidence showed `.error-area`, `.error-img`, and `.error-content` selectors are exclusive to `error.php`; 13 complete rules moved (1,125 source bytes; 891 minified bytes) with selectors unchanged.
- No error selector remains in core.
- A representative invalid route remained HTTP 404, rendered the existing 404 content, and loaded one versioned core + error pair with no compatibility main.
- Core, error bundle, and root-relative button icon returned 200.
- Core + error is 556,139 bytes, a 153,276-byte (21.61%) reduction from the original minified baseline.
- PHP/Node syntax and diff checks passed. No routing file was modified.
- Restricted browser remains unavailable; no Playwright fallback was used.

Browser-smoke results: unavailable; existing 404 design at desktop/mobile remains manual.

Commit SHA: `1f8cf10`.

Pushed: yes, to `origin/testing`.

Remaining risk: 404 visual cascade/responsiveness requires human browser verification; status and asset-path behavior passed command-line checks.

Exact next action: run the final active-template, loader, build, watcher, route, workflow, and size audit.

### Phase 10 — final audit

Files changed:

- CSS-split documentation only; no final code correction was required.

Commands run:

- Active PHP `main.css`/loader/family reference scans
- Manifest source/output uniqueness and compatibility order validation
- Bundle/source sizes and SHA-256 inventory
- All 25 classified template route checks plus generic/invalid category/invalid tag 404 checks
- All generated and compatibility CSS asset HTTP checks
- `php -l` on every PHP file modified since baseline
- Node syntax checks on manifest/build/watch/JS build/extractor scripts
- `npm run build:css` twice with complete generated hash comparison
- `npm run watch`, one harmless `legal.css` timestamp event, observation window, and clean SIGINT shutdown
- `git diff --check`, `git status`, branch/ref, sensitive-config diff, and recent commit review
- GitHub Actions testing-branch run review with existing authenticated CLI
- Unauthenticated staging health probe

Validation results:

- Active direct compatibility references: none. Only `partials/main-styles.php` contains the safe unclassified fallback; `server.php` contains a non-loading comment.
- All 25 active templates explicitly select the correct family through the centralized loader.
- Every checked rendered page contained core first, exactly one intended family second, filemtime versions on both, no duplicate links, and no compatibility main.
- All 25 canonical/classified routes returned 200. Generic missing, invalid category, and invalid tag routes returned 404 and loaded the error family.
- All nine generated bundles plus both compatibility files returned 200 and are non-empty; legal intentionally contains the valid 50-byte placeholder because no legal-only selector was found.
- Every modified PHP file and every relevant Node script passed syntax checks.
- Two consecutive builds produced identical SHA-256 hashes.
- Final watcher test triggered exactly one CSS rebuild from one source timestamp event and did not loop on generated outputs.
- `git diff --check` passed; pre-documentation working tree was clean.
- No `.github`, `.htaccess`, router, server, sitemap, production destination, or main-branch file/reference was modified. The only safety-sensitive template changed was the explicitly authorized `error.php` stylesheet link.
- All ten testing checkpoint workflow runs through `1f8cf10` completed successfully. Unauthenticated `https://staging.virtuo.ae/` returned expected HTTP 401.
- Restricted browser smoke could not run because the in-app browser runtime metadata was unavailable. Standalone Playwright was not used.

Final sizes and transfer totals:

| Family | Family bytes | Core + family | Reduction vs original 709,415 bytes |
|---|---:|---:|---:|
| Home | 9,926 | 565,174 | 144,241 (20.33%) |
| About | 11,798 | 567,046 | 142,369 (20.07%) |
| Contact | 12,750 | 567,998 | 141,417 (19.93%) |
| Services | 231 | 555,479 | 153,936 (21.70%) |
| Blog listing | 10,868 | 566,116 | 143,299 (20.20%) |
| Blog details | 108,573 | 663,821 | 45,594 (6.43%) |
| Legal | 50 | 555,298 | 154,117 (21.72%) |
| Error | 891 | 556,139 | 153,276 (21.61%) |

Final core: 555,248 bytes. Compatibility `main.css`: 832,762 bytes. Compatibility `main.min.css`: 710,285 bytes. Requests change from one compatibility site-CSS request to two versioned site-CSS requests on classified pages.

Rules deliberately retained in core: mixed listing/detail responsive and sidebar rules; mixed home/about/contact eye-section rules; mixed family breadcrumb/marquee spacing; shared header/navigation/mega-menu/mobile-menu/footer/forms/phone-field/CTA/breadcrumb/marquee/scroll/service-sidebar utilities; all unscoped or uncertain ownership. Remaining body-scope occurrence counts are 39 detail, 36 listing, 7 contact, 5 home, 5 About, and 2 service occurrences, all inside mixed/shared rules.

Commit SHA: pending.

Pushed: no.

Remaining risk: loading family CSS after core necessarily changes physical rule position for extracted rules. Classification was restricted to high-confidence scopes and declaration/specificity/query order within each destination was preserved, but command-line checks cannot prove the full visual cascade. All requested desktop/mobile visual, console, network-failure, overflow, image, sticky, slider, form, tab, chart, table, and interaction smoke checks remain manual.

Exact next action: commit and push the Phase 10 documentation checkpoint, confirm its testing workflow succeeds, then record the checkpoint SHA and leave the worktree clean. Do not resume code migration unless a manual browser regression is reported.
