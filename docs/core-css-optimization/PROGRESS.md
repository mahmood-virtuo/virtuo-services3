# Core CSS Optimization Progress

## Loop state

- Starting commit: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- Branch: testing
- Current phase: Phase 2 unused-CSS evidence complete; documentation checkpoint in progress
- Last completed implementation phase: none
- Next phase: Phase 3 Home-family extraction after the Phase 2 checkpoint and green staging workflow
- Main and production: untouched

## Phase 0 — Baseline and inventory

Status: validation passed; no source implementation began.

### Files changed

- docs/core-css-optimization/PLAN.md
- docs/core-css-optimization/INVENTORY.md
- docs/core-css-optimization/PROGRESS.md
- docs/core-css-optimization/VALIDATION.md
- docs/core-css-optimization/EXCEPTIONS.md
- docs/core-css-optimization/RESUME.md

No CSS, PHP, JavaScript, route, server, sitemap, generated asset, dependency, workflow, or deployment file changed in Phase 0.

### Exact rules moved or removed

- CSS rules moved: 0
- CSS rules removed: 0
- Selectors removed: 0
- Declarations consolidated: 0
- Remote imports changed: 0
- Commented code removed: 0

### Before and after sizes

| File | Before | After Phase 0 | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 658,214 bytes | 658,214 bytes | 0 |
| assets/css/bundles/core.min.css | 556,488 bytes | 556,488 bytes | 0 |
| assets/css/main.css | 839,840 bytes | 839,840 bytes | 0 |
| assets/css/main.min.css | 716,409 bytes | 716,409 bytes | 0 |

The existing CSS build reproduced every checked-in generated hash exactly.

### Validation performed

- Required Git safety gate passed: testing branch, clean worktree, HEAD equal to origin/testing.
- Reviewed AGENTS.md, the Virtuo safety skill, current CSS split documentation, inline-style migration documentation, loader, CSS manifest/builder/watcher/extractor, route files, sitemap, and active family assignments.
- npm run build:css passed with the known remote intl-tel-input import notice.
- Generated hashes before and after the build were identical.
- Syntax-aware core inventory recorded 4,643 rules, 5,065 selectors, 1,213 media queries, 30 keyframe blocks, 88 custom-property declarations, zero font-face blocks, and one import.
- Local HTTP checks covered all 86 sitemap URLs plus invalid category, invalid tag, and generic invalid route probes.
- All 89 responses had expected status, vendor CSS, one core bundle, one correct family bundle, correct core-before-family order, and no compatibility CSS.
- All 17 unique local stylesheet requests returned 200.
- All 89 rendered responses had zero active style attributes and zero active style blocks.
- Browser automation was not run because Phase 0 changed documentation only and no cascade ownership.

Full commands and results are in VALIDATION.md.

### Checkpoint

- Intended message: Document core CSS optimization baseline
- Commit SHA: bc8c96789f822bb2b4a7af6ce7769785bcbeb973
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29659795632 succeeded

### Remaining risks

- The current core remains 556,488 minified bytes and includes extensive legacy theme sections plus mixed later override layers.
- Candidate unused prefixes are based only on initial repository evidence and are not deletion-approved.
- Dynamic/plugin selectors and generic state classes can be missed by static searches.
- Seventeen same-context exact duplicate groups still require cascade-position review.
- The remote intl-tel-input import remains in both generated core and compatibility CSS.
- Visual/cascade parity is not established by command-line Phase 0 checks; restricted browser testing is required after implementation starts.
- The large mixed section after the Footer heading must be classified carefully rather than treated as footer-owned.

## Phase 1 — Complete CSS ownership classification

Status: classification complete; no CSS implementation performed.

### Files changed

- docs/core-css-optimization/INVENTORY.md
- docs/core-css-optimization/PROGRESS.md
- docs/core-css-optimization/VALIDATION.md
- docs/core-css-optimization/EXCEPTIONS.md
- docs/core-css-optimization/RESUME.md

### Exact rules moved or removed

- CSS rules moved: 0
- CSS rules removed: 0
- Selectors removed: 0
- Declarations consolidated: 0
- Remote imports changed: 0
- Commented code removed: 0

### Before and after sizes

| File | Before Phase 1 | After Phase 1 | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 658,214 bytes | 658,214 bytes | 0 |
| assets/css/bundles/core.min.css | 556,488 bytes | 556,488 bytes | 0 |
| assets/css/main.css | 839,840 bytes | 839,840 bytes | 0 |
| assets/css/main.min.css | 716,409 bytes | 716,409 bytes | 0 |

### Classification result

- Category A: global foundations, active shared header/navigation/mobile/mega menu, off-canvas, breadcrumb, scroll, shared CTA/footer/forms/phone states, common utilities and responsive foundations.
- Category B: proven family-exclusive logical groups for Home, About, Contact, Services, Blog listing and Blog details; no new Legal or Error group proved.
- Category C: Slider, selected About groups, marquee, choose/eye, Blog shared groups, Built for Entrepreneurs and shared sidebar form groups.
- Category D candidates: Preloader, Banner, Brand, History, Counter, Video, Callback, Core value, Shop, Benefit, Loan, Features, Challenge, Strategic, Career, Login and Checkout.
- Category E/D candidates: Search, Project, Testimonial and Pricing due JavaScript references despite no initial rendered DOM match.
- Category E: plugin/runtime/generic state allowlist retained and expanded in EXCEPTIONS.md.

### Validation performed

- Git continuation gate passed at a2f457e8eff221153834145acd09ae7a19948eb2.
- All 86 sitemap routes plus an Error render were inspected for class ownership by family.
- Active PHP templates, shared partials and first-party JavaScript class/query mutations were reviewed.
- Responsive, pseudo-state, plugin, injected markup, sticky, loading, success/error and animation risks were included in the classification.
- No source or generated CSS file changed.

### Checkpoint

- Intended message: Classify core CSS ownership
- Commit SHA: b31857f3febeb04b82053c88e79310d0fad6e0e1
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29660320319 succeeded

### Remaining risks

- Category B entries still require exact per-rule cascade review before movement.
- Category D entries are candidates only until Phase 2 DOM, interaction and Coverage evidence passes.
- Original headings are mixed ownership and cannot be moved/deleted wholesale.
- Generic states and plugin-generated classes remain deliberately retained.

## Phase 2 — Unused CSS evidence checkpoint

Status: evidence complete; no CSS implementation performed.

### Files changed

- docs/core-css-optimization/INVENTORY.md
- docs/core-css-optimization/PROGRESS.md
- docs/core-css-optimization/VALIDATION.md
- docs/core-css-optimization/EXCEPTIONS.md
- docs/core-css-optimization/RESUME.md

### Exact rules moved or removed

- CSS rules moved: 0
- CSS rules removed: 0
- Selectors removed: 0
- Declarations consolidated: 0
- Remote imports changed: 0
- Commented code removed: 0

### Before and after sizes

| File | Before Phase 2 | After Phase 2 | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 658,214 bytes | 658,214 bytes | 0 |
| assets/css/bundles/core.min.css | 556,488 bytes | 556,488 bytes | 0 |
| assets/css/main.css | 839,840 bytes | 839,840 bytes | 0 |
| assets/css/main.min.css | 716,409 bytes | 716,409 bytes | 0 |

### Evidence result

- Combined the exhaustive 86-canonical-route plus Error initial DOM evidence with 24 representative desktop/mobile browser states.
- Exercised shared navigation/off-canvas/phone/form states, Home slider and tabs, Services panels/accordion/Digital Marketing navigation, Blog load-more/TOC/calculator/Emirates interactions, Legal and Error.
- All route/status/family-order checks passed in the browser matrix.
- No candidate group appeared before or after interactions.
- Candidate-specific Chromium Coverage found zero covered token occurrences for all 21 candidate groups.
- Approved only the candidate groups recorded in INVENTORY.md for later small Phase 4 deletion checkpoints; no broad unused-percentage deletion is authorized.

### Checkpoint

- Intended message: Document unused core CSS evidence
- Commit SHA: pending documentation checkpoint
- Push target: origin/testing only
- Staging workflow status: pending checkpoint push

### Remaining risks

- Candidate approval does not replace exact rule-boundary, keyframe, custom-property, URL and media dependency checks immediately before deletion.
- Phase 3 extraction changes cascade ownership and needs computed-style/browser parity per family checkpoint.
- Known preload warnings remain unrelated to this documentation-only phase.
- The in-app browser bridge was unavailable because required sandbox metadata was not forwarded; the browser skill fallback used the installed Playwright and local Google Chrome without installing dependencies.

## Next exact action

After this Phase 2 documentation checkpoint is committed, pushed to origin/testing and its staging workflow succeeds, begin Phase 3 with the Home family only. Move complete Home-exclusive groups into home.css, rebuild, validate the complete route map plus restricted desktop/mobile interaction/computed-style parity, then checkpoint before continuing to About.
