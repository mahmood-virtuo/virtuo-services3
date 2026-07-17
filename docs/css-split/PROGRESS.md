# CSS Split Progress

## Baseline

- Branch: `testing`
- Baseline commit: `a0f754a` (`Support Basic Auth in staging health check`)
- Remote tracking branch: `origin/testing`
- Starting worktree: clean
- Original `assets/css/main.css`: 831,837 bytes; SHA-256 `acb749e03607a964f1733b9ae05db7ce56e032bd81df540693293896756a4b6b`
- Original `assets/css/main.min.css`: 709,415 bytes; SHA-256 `19cecf2edf3d0d613a2b92b0524954b5babc2af52aa217d93bac0be621c75b31`

## Current phase

Phase 1 — deterministic multi-bundle build architecture. Implementation and validation are complete; commit and push are pending. Active template loading remains unchanged.

## Completed phases

- Phase 0 — baseline and inventory (`5ab29c2`, pushed to `origin/testing`)

## Pending phases

- Phase 1 build architecture
- Phase 2 home
- Phase 3 about
- Phase 4 contact
- Phase 5 services
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

Commit SHA: pending.

Pushed: no.

Remaining risk: Phase 2 begins the first cascade-sensitive extraction; ambiguous rules will stay in core.

Exact next action: commit and push Phase 1, then extract only conclusively `body.home-page`-owned rules and introduce the centralized loader for `index.php`.
