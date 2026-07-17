# CSS Split Progress

## Baseline

- Branch: `testing`
- Baseline commit: `a0f754a` (`Support Basic Auth in staging health check`)
- Remote tracking branch: `origin/testing`
- Starting worktree: clean
- Original `assets/css/main.css`: 831,837 bytes; SHA-256 `acb749e03607a964f1733b9ae05db7ce56e032bd81df540693293896756a4b6b`
- Original `assets/css/main.min.css`: 709,415 bytes; SHA-256 `19cecf2edf3d0d613a2b92b0524954b5babc2af52aa217d93bac0be621c75b31`

## Current phase

Phase 6 — Blog listing family. Listing/category/tag extraction and command-line validation are complete; commit and push are pending.

## Completed phases

- Phase 0 — baseline and inventory (`5ab29c2`, pushed to `origin/testing`)
- Phase 1 — deterministic multi-bundle build architecture (`bf3a8ff`, pushed to `origin/testing`)
- Phase 2 — home family (`066ddc9`, pushed to `origin/testing`)
- Phase 3 — About family (`aa353e5`, pushed to `origin/testing`)
- Phase 4 — Contact family (`d5141bb`, pushed to `origin/testing`)
- Phase 5 — Services family (`b659810`, pushed to `origin/testing`)

## Pending phases

- Phase 6 blog listing
- Phase 7 blog details
- Phase 8 legal
- Phase 9 error
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

Commit SHA: pending.

Pushed: no.

Remaining risk: listing interaction, sticky, and responsive cascade behavior require human browser verification.

Exact next action: finish deterministic validation, commit/push Phase 6, then audit and migrate all 11 active blog-detail templates together.
