# Core CSS Optimization Progress

## Loop state

- Starting commit: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- Branch: testing
- Current phase: Phase 7 obsolete commented-out CSS cleanup validated; checkpoint documentation in progress
- Last completed implementation phase: Phase 6 explicit intl-tel-input loading, committed and staging-validated
- Next phase: Phase 7 JavaScript/PHP commented-code cleanup after this checkpoint and green staging workflow
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
- Commit SHA: a090a82d2bebfb182da16f8bddf17a192d5a2f5d
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29660863968 succeeded

### Remaining risks

- Candidate approval does not replace exact rule-boundary, keyframe, custom-property, URL and media dependency checks immediately before deletion.
- Phase 3 extraction changes cascade ownership and needs computed-style/browser parity per family checkpoint.
- Known preload warnings remain unrelated to this documentation-only phase.
- The in-app browser bridge was unavailable because required sandbox metadata was not forwarded; the browser skill fallback used the installed Playwright and local Google Chrome without installing dependencies.

## Phase 3 — Home family extraction

Status: implementation and validation complete; checkpoint committed, pushed and green on staging.

### Files changed

- assets/css/src/core.css
- assets/css/src/pages/home.css
- assets/css/bundles/core.min.css
- assets/css/bundles/home.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal CSS rules moved: 86
- Keyframe blocks moved: 2, both hoverShine definitions
- CSS rules deleted: 0
- Selectors or declarations rewritten: 0
- Selectors split: 0
- Remote imports changed: 0

Moved logical groups: Home-only white title modifier, slider navigation/bar pagination, About mask/shape, Core Services item/tab/thumb/content/shine rules, Home Blog card primitives and the mobile Home hero fix. Exact per-group counts are in INVENTORY.md.

### Before and after sizes

| File | Before Home | After Home | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 658,214 | 644,193 | -14,021 |
| assets/css/src/pages/home.css | 13,080 | 27,179 | +14,099 |
| assets/css/bundles/core.min.css | 556,488 | 544,605 | -11,883 |
| assets/css/bundles/home.min.css | 11,472 | 23,415 | +11,943 |
| Home core + family minified | 567,960 | 568,020 | +60 |
| assets/css/main.css | 839,840 | 839,918 | +78 |
| assets/css/main.min.css | 716,409 | 716,469 | +60 |

The active Home payload is effectively unchanged apart from a 60-byte minifier/order difference. Every non-Home route drops the full 11,883 minified core bytes because it does not load home.min.css. Compatibility main CSS remains non-rendered and retains all moved rules.

### Validation performed

- Fresh branch/worktree/remote gate passed at a090a82d2bebfb182da16f8bddf17a192d5a2f5d.
- npm run build:css passed and generated all expected bundles.
- Structural count moved from core 4,643 to 4,557 normal rules and from Home 83 to 169; core keyframes dropped from 30 to 28 and Home gained 2.
- Desktop and mobile computed-style/geometry hashes for 23 affected selectors matched the pre-edit baselines exactly.
- Document widths and heights matched: desktop 1440/1440/6633 and mobile 390/390/10487.
- All 86 sitemap routes plus three invalid probes passed status, exact core/family order and no-compatibility checks; all 17 local stylesheets returned 200.
- A 10-state desktop/mobile smoke covered Home, About, Services, Blog listing and Blog detail with shared navigation and affected interactions. It found no overflow, console errors, page errors or failed resources.

### Checkpoint

- Intended message: Extract Home CSS from core
- Commit SHA: a69a98d7737df2584361ee68ca3c94ba57bb0500
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29661325264 succeeded

### Remaining risks

- Moving rules between bundles can change cascade order; exact computed parity passed for the Home-owned targets, but later family extractions require their own fresh baselines.
- Shared Home/About/Contact/Blog groups remain in core by design.
- Compatibility main.css grew 78 source bytes due ownership separation, but remains non-rendered and preserves all rules.

## Phase 3 — About family extraction

Status: implementation and validation complete; checkpoint committed, pushed and green on staging.

### Files changed

- assets/css/src/core.css
- assets/css/src/pages/about.css
- assets/css/bundles/core.min.css
- assets/css/bundles/about.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal CSS rules moved: 35
- CSS rules/keyframes deleted: 0
- Selectors or declarations rewritten: 0
- Selectors split: 0
- Remote imports changed: 0

Moved groups: About intro image wrapper, intro content/action row, and Virtuo team rules except `.virtuo-team__container`. That rule remains in core because property comparison proved its original position is required for later shared-gutter precedence.

### Before and after sizes

| File | Before About | After About | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 644,193 | 640,224 | -3,969 |
| assets/css/src/pages/about.css | 15,046 | 19,080 | +4,034 |
| assets/css/bundles/core.min.css | 544,605 | 541,369 | -3,236 |
| assets/css/bundles/about.min.css | 12,802 | 16,099 | +3,297 |
| About core + family minified | 557,407 | 557,468 | +61 |
| assets/css/main.css | 839,918 | 839,983 | +65 |
| assets/css/main.min.css | 716,469 | 716,530 | +61 |

Every non-About route drops the 3,236 extracted minified core bytes. The active About payload is unchanged apart from a 61-byte minifier/order difference.

### Validation performed

- Fresh branch/worktree/remote gate passed at a69a98d7737df2584361ee68ca3c94ba57bb0500 after staging run 29661325264 succeeded.
- npm run build:css passed.
- Core normal rules changed 4,557 to 4,522; About rules changed 109 to 144.
- An initial desktop parity difference traced solely to `.virtuo-team__container` overriding the shared gutter. Retaining that rule in core restored exact parity.
- Desktop and mobile computed-style/geometry hashes matched the pre-edit baselines exactly.
- All 89 route probes and all 17 local stylesheet requests passed.
- A 10-state desktop/mobile smoke covered About, Home, Contact, Services and Blog detail with navigation and affected interactions. It found no overflow, console/page errors or failed resources.

### Checkpoint

- Intended message: Extract About CSS from core
- Commit SHA: 1748b250814a2992c3d1e19c7c0e644ca9166f30
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29661588401 succeeded

### Remaining risks

- `.virtuo-team__container` remains core-owned solely for cascade order; moving it would require duplicating or reordering a shared gutter rule and is not justified.
- Shared About/Home/Contact selectors remain in core.
- Each later family needs a fresh property-level cascade comparison.

## Phase 3 — Contact family extraction

Status: implementation and validation complete; checkpoint committed, pushed and green on staging.

### Files changed

- assets/css/src/core.css
- assets/css/src/pages/contact.css
- assets/css/bundles/core.min.css
- assets/css/bundles/contact.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal CSS rules moved: 44
- CSS rules/keyframes deleted: 0
- Selectors or declarations rewritten: 0
- Selectors split: 0
- Remote imports changed: 0

Moved groups: Contact Figma panel/detail/form layout and responsive rules, plus the active Contact map rules. The mixed Contact/footer field-font rule, shared eye selectors, shared form primitives, intl-tel-input states and ajax-response feedback states remain in core.

### Before and after sizes

| File | Before Contact | After Contact | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 640,224 | 634,515 | -5,709 |
| assets/css/src/pages/contact.css | 15,743 | 21,453 | +5,710 |
| assets/css/bundles/core.min.css | 541,369 | 536,344 | -5,025 |
| assets/css/bundles/contact.min.css | 13,516 | 18,541 | +5,025 |
| Contact core + family minified | 554,885 | 554,885 | 0 |
| assets/css/main.css | 839,983 | 839,984 | +1 |
| assets/css/main.min.css | 716,530 | 716,530 | 0 |

Every non-Contact route drops the 5,025 extracted minified core bytes. The active Contact payload is byte-for-byte unchanged after minification.

### Validation performed

- Fresh branch/worktree/remote gate passed at 1748b250814a2992c3d1e19c7c0e644ca9166f30 after staging run 29661588401 succeeded.
- npm run build:css passed with the unchanged known remote-import notice.
- Core normal rules changed 4,522 to 4,478; Contact rules changed 101 to 145.
- Desktop and mobile computed-style/geometry hashes matched the fresh pre-edit baselines exactly for 31 affected and deliberately shared targets.
- Document geometry matched: desktop 1440px wide / 5,255px high and mobile 390px wide / 7,058px high.
- All 89 route probes and all 17 local stylesheet requests passed; active style attributes and style blocks remained zero.
- A 10-state desktop/mobile smoke covered Contact, Home, About, Services and Blog detail. It exercised navigation, Contact hover/form focus/phone dropdown/FAQ/map, Home tabs, About CTA/team hover, Services tabs/FAQ and the Blog calculator. It found no overflow, console/page errors or failed CSS, image, script, font or iframe resources.

### Checkpoint

- Intended message: Extract Contact CSS from core
- Commit SHA: f26f858fc003744705a80f948f35f6abdda44682
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29662209200 succeeded

### Remaining risks

- The complete mixed Contact/footer field-font rule remains in core to preserve selector-list integrity.
- Shared eye, form-feedback and phone-plugin rules remain core-owned by design.
- Each later family needs a fresh property-level cascade comparison.

## Phase 3 — Services family extraction

Status: implementation and validation complete; checkpoint committed, pushed and green on staging.

### Files changed

- assets/css/src/core.css
- assets/css/src/pages/services.css
- assets/css/bundles/core.min.css
- assets/css/bundles/services.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal CSS rules moved: 214
- Keyframe blocks moved: 2, the prefixed and standard dash_animation definitions
- CSS rules/keyframes deleted: 0
- Selectors or declarations rewritten: 0
- Selectors split: 0
- Remote imports changed: 0

Moved groups: active Services details/content/sidebar/category-list rules; active Services FAQ layout; Services work/process cards, line shape and dash animation; standard service tabs; Digital Marketing main/sub-navigation, API transition states and responsive layers; and late Services-only workflow/gutter/mobile corrections. Shared column, sidebar/form, breadcrumb/marquee and inactive template-variant rules remain in core.

### Before and after sizes

| File | Before Services | After Services | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 634,515 | 592,950 | -41,565 |
| assets/css/src/pages/services.css | 1,024 | 42,537 | +41,513 |
| assets/css/bundles/core.min.css | 536,344 | 500,128 | -36,216 |
| assets/css/bundles/services.min.css | 853 | 37,069 | +36,216 |
| Services core + family minified | 537,197 | 537,197 | 0 |
| assets/css/main.css | 839,984 | 839,932 | -52 |
| assets/css/main.min.css | 716,530 | 716,530 | 0 |

Every non-Services route drops the 36,216 extracted minified core bytes. The combined active Services minified byte count and compatibility main.min.css output are unchanged; the 52-byte source reduction is blank-line normalization between formerly scattered blocks.

### Validation performed

- Fresh branch/worktree/remote gate passed at f26f858fc003744705a80f948f35f6abdda44682 after staging run 29662209200 succeeded.
- npm run build:css passed with the unchanged known remote-import notice.
- Core normal rules changed 4,478 to 4,264; Services rules changed 12 to 226. Core keyframes changed 28 to 26 and Services keyframes changed 0 to 2.
- Same-DOM comparisons switched between committed pre-edit and current core/Services bundles after applying identical animation suppression. Standard and Digital Marketing Services matched exactly at desktop and mobile.
- Standard desktop affected-target SHA-256 before/after: bfdf4d1db61bd4b9c8871e1d1a511a0ae384dbb369c4662272c9e4452906dbf6.
- Standard mobile full-body SHA-256 before/after: f88060dae905cd43872ec46e287ed118ff37fddebed920cec408b77a824777b8; 390px by 9,850px with zero differing elements.
- Digital Marketing desktop SHA-256 before/after: 42b9c543eb0c4eb0a534bd9680cf9ab8345541563a10cdee2d438e6b012b9fb0.
- Digital Marketing mobile SHA-256 before/after: bf59f107258fcec1740cd01d8aaf0728e1b0a485283db6d9cd67d0368fe245e2.
- All 89 route probes passed status, exact family order and compatibility exclusion; all local stylesheet paths returned 200, with zero active style attributes/blocks after comments were excluded.
- A 10-state desktop/mobile smoke covered standard Services, Digital Marketing Services, Home, Contact and Blog detail. It exercised navigation, standard tabs/FAQ, Digital Marketing API sub-navigation/URL/ARIA state, Home tabs, Contact form/phone dropdown and the Blog calculator. It found no overflow, console/page errors or failed application resources.
- The first Contact desktop matrix context closed while its external Google Maps document was still loading. A focused rerun waited for the iframe load and passed with zero failed requests or bad responses; this was test teardown timing, not a product failure.

### Checkpoint

- Intended message: Extract Services CSS from core
- Commit SHA: 4382b8982a533bac3baecfc03ae9ffad65eb918e
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29663231827 succeeded

### Remaining risks

- Generic columns, shared sidebar/form foundations, shared breadcrumb/marquee foundations and inactive Services variants remain core-owned by design.
- Digital Marketing transition states remain dynamic and were validated through the local content API, URL update and ARIA state change.
- Each later family needs a fresh property-level cascade comparison.

## Phase 3 — Blog listing family extraction

Status: implementation and validation complete; checkpoint committed, pushed and green on staging.

### Files changed

- assets/css/src/core.css
- assets/css/src/pages/blog-listing.css
- assets/css/bundles/core.min.css
- assets/css/bundles/blog-listing.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal CSS rules moved: 11
- CSS rules/keyframes deleted: 0
- Selectors or declarations rewritten: 0
- Selectors split: 0
- Remote imports changed: 0

Moved groups: the active `.blog__post-item-five`, `.blog__post-thumb-five` image and `.blog__post-content-five` title/link/paragraph rules, including their existing responsive and hover states. Shared post metadata, author/sidebar/tag primitives, mixed Blog-listing/Blog-details responsive selector lists and inactive legacy Blog variants remain in core.

### Before and after sizes

| File | Before Blog listing | After Blog listing | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 592,950 | 591,594 | -1,356 |
| assets/css/src/pages/blog-listing.css | 12,660 | 14,018 | +1,358 |
| assets/css/bundles/core.min.css | 500,128 | 498,996 | -1,132 |
| assets/css/bundles/blog-listing.min.css | 10,868 | 12,000 | +1,132 |
| Blog listing core + family minified | 510,996 | 510,996 | 0 |
| assets/css/main.css | 839,932 | 839,934 | +2 |
| assets/css/main.min.css | 716,530 | 716,530 | 0 |

Every non-Blog-listing route drops the 1,132 extracted minified core bytes. The combined active Blog-listing minified byte count and compatibility main.min.css output are unchanged; the two source bytes are separation newlines around the relocated blocks.

### Validation performed

- Fresh branch/worktree/remote gate passed at 4382b8982a533bac3baecfc03ae9ffad65eb918e after staging run 29663231827 succeeded.
- npm run build:css passed with the unchanged known remote-import notice.
- Core normal rules changed 4,264 to 4,253; Blog-listing normal rules changed 68 to 79.
- Same-DOM comparisons switched between committed pre-edit and current core/Blog-listing bundles after applying identical animation suppression and one real load-more batch plus title hover.
- Desktop SHA-256 before/after: 58ac5905bbdefc2cb167c8f09ceb21c75e11a5f182a930b3ea48aa6ab9e791a1; document geometry 1,440px by 10,026px.
- Mobile SHA-256 before/after: 142bab4d354ad81d8bfc8dac4b97272875f9ebfac875b82117fcaadafe007cf4; document geometry 390px by 11,525px.
- Both viewports changed from 6 hidden cards to 1 after load more and had zero differing captured targets.
- All 89 route probes passed status, exact family order and compatibility exclusion; all 17 local stylesheet requests returned 200, with zero active style attributes/blocks after comments were excluded.
- The corrected 10-state desktop/mobile smoke covered the base Blog listing, category, tag, interactive Blog detail and Home. It exercised navigation, load more, filter-clear focus, card/title hover, the article calculator and Home tabs with no overflow, console/page errors or failed application resources.
- The first category/tag harness used a strict locator against two intentional Clear links. Selecting the first explicit link made all four focused states pass; this was a test-harness correction, not a product change.

### Checkpoint

- Intended message: Extract Blog listing CSS from core
- Commit SHA: 75418029bb60303588da404bc1d2db486a765891
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29663519655 succeeded

### Remaining risks

- Blog metadata, author, sidebar, tag and recent-post rules remain core-owned because they are shared with Blog details.
- Complete mixed Blog-listing/Blog-details responsive selector lists remain in core; splitting them only for ownership would rewrite selectors without reducing the active listing payload.
- Inactive legacy Blog card variants remain for Phase 4 evidence-driven deletion, not family extraction.

## Phase 3 — Blog details family extraction

Status: implementation and validation complete; checkpoint committed, pushed and green on staging.

### Files changed

- assets/css/src/core.css
- assets/css/src/pages/blog-details.css
- assets/css/bundles/core.min.css
- assets/css/bundles/blog-details.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal CSS rules moved: 303
- Keyframe blocks moved: 1, the `em-map-pulse` definition used only by the Emirates article map
- CSS rules/keyframes deleted: 0
- Selectors or declarations rewritten: 0
- Selectors split: 0
- Remote imports changed: 0

Moved groups: active Blog detail content/inner/bottom/sidebar-two/avatar rules; TOC and generated TOC states; `vt-*` article systems and their interactive states; calculator/market/gap/founder-profile helpers anchored under article/detail selectors; Blog-details body/html scopes; and the three AI article color helpers. Shared listing/detail metadata/sidebar/tag/recent-post/form rules, complete mixed responsive selector lists, generic blockquotes and inactive legacy Blog variants remain in core.

### Before and after sizes

| File | Before Blog details | After Blog details | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 591,594 | 552,449 | -39,145 |
| assets/css/src/pages/blog-details.css | 122,887 | 162,062 | +39,175 |
| assets/css/bundles/core.min.css | 498,996 | 465,901 | -33,095 |
| assets/css/bundles/blog-details.min.css | 109,467 | 142,589 | +33,122 |
| Blog details core + family minified | 608,463 | 608,490 | +27 |
| assets/css/main.css | 839,934 | 839,964 | +30 |
| assets/css/main.min.css | 716,530 | 716,557 | +27 |

Every non-Blog-details route drops the 33,095 extracted minified core bytes. The active Blog-details and compatibility outputs gain 27 minified bytes from changed minifier/order context; selectors, declarations and computed behavior are unchanged.

### Validation performed

- Fresh branch/worktree/remote gate passed at 75418029bb60303588da404bc1d2db486a765891 after staging run 29663519655 succeeded.
- npm run build:css passed with the unchanged known remote-import notice.
- Core normal rules changed 4,253 to 3,950; Blog-details normal rules changed 658 to 961. Core keyframes changed 26 to 25 and Blog-details keyframes changed 0 to 1.
- Same-DOM comparisons switched between committed pre-edit and current bundles after identical animation suppression and representative interactions. They captured 315–697 affected article/detail elements per state.
- Standard desktop/mobile SHA-256: a0e92ab34a75f487ca8d49adddb1532079d369d0532d3299faadb1397c399956 / d879d3330b784f28c066c92ce09ea97100419d4e80188d6755dbbabdf2d44e40.
- Calculator desktop/mobile SHA-256: 7c7c5c444d9db02113f35b0d1199adfc9bc25809ae033b60d01912156573014a / e442aadae3092214bbe5a4ea573a1dc38cae53e2d7959b32e892de413ac1fb49.
- Emirates desktop/mobile SHA-256: f6e001762f49be18e8b42cdc3981cea695f523b7a1bbf15bc86bee3c5ad3f7ff / 20c8a3d803100129bbad2345b5329bef6f350f8fa1f310ecdab3853446aebbd9.
- AI desktop/mobile SHA-256: 9d2df1b5bcce7bc30ccc07f984aaa852ebf764b185eb329ea8354e375f3814c2 / ee31ebc388c0f9913dc7d83922a1e9aabdc3053ea7d7e03d1dd198be7603baa1.
- All eight comparisons had identical document geometry and zero differing targets.
- All 89 route probes passed status, exact family order and compatibility exclusion; all 17 local stylesheet requests returned 200, with zero active style attributes/blocks after comments were excluded.
- The corrected 10-state desktop/mobile smoke covered standard, calculator, Emirates and AI details plus Blog listing. It exercised navigation, TOC/focus, calculator/market controls, the Emirates map, AI accordion and listing load more with no overflow, console/page errors or failed application resources.
- The standard article sidebar TOC is intentionally hidden at mobile. Replacing that one harness action with focus on a visible article link passed; this was a test-harness correction, not a product change.

### Checkpoint

- Intended message: Extract Blog details CSS from core
- Commit SHA: b274be5445a629151c17fb93501d4f7589a61912
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29663903620 succeeded

### Remaining risks

- Shared Blog listing/detail metadata, sidebar, tag, recent-post and sidebar-form rules remain core-owned.
- Complete mixed Blog-listing/Blog-details responsive selector lists remain unsplit in core.
- Generic blockquote/comment rules and inactive Blog variants remain for later ownership/deletion evidence rather than being forced into the family bundle.

## Phase 3 — Legal family ownership review

Status: ownership review and validation complete; no CSS extraction was justified; checkpoint committed, pushed and green on staging.

### Files changed

- docs/core-css-optimization/INVENTORY.md
- docs/core-css-optimization/PROGRESS.md
- docs/core-css-optimization/VALIDATION.md
- docs/core-css-optimization/EXCEPTIONS.md
- docs/core-css-optimization/RESUME.md

No CSS, PHP, JavaScript, route, server, sitemap, loader, generated asset, dependency or workflow file changed.

### Exact rules moved or removed

- CSS rules/keyframes moved: 0
- CSS rules/keyframes deleted: 0
- Selectors or declarations rewritten: 0
- Selectors split: 0
- Remote imports changed: 0

Both Legal routes render the page-specific `legal-content` class, but that token has no rule in core.css. No other Legal-exclusive rendered class token occurs in core. The remaining applicable core rules are shared container, breadcrumb, typography, header and footer foundations, so moving them would violate family ownership and alter other routes.

### Before and after sizes

| File | Before Legal review | After Legal review | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 552,449 | 552,449 | 0 |
| assets/css/src/pages/legal.css | 0 | 0 | 0 |
| assets/css/bundles/core.min.css | 465,901 | 465,901 | 0 |
| assets/css/bundles/legal.min.css | 50 | 50 | 0 |
| assets/css/main.css | 839,964 | 839,964 | 0 |
| assets/css/main.min.css | 716,557 | 716,557 | 0 |

### Validation performed

- Fresh branch/worktree/remote gate passed at b274be5445a629151c17fb93501d4f7589a61912 after Deploy Virtuo Staging run 29663903620 succeeded.
- Rendered-token ownership covered both `/privacy-policy` and `/terms-conditions`: 153 rendered tokens, one Legal-exclusive token (`legal-content`), and zero Legal-exclusive tokens present in core.css.
- The restricted four-state desktop/mobile Legal smoke passed status, exact core/Legal bundle mapping, navigation/focus, overflow, console/page-error and application-resource checks.
- All 89 route probes passed status, exact family order and compatibility exclusion; all 17 local stylesheet requests returned 200, with zero active style attributes/blocks after comments were excluded.
- Computed-style before/after comparison was not applicable because no CSS source, generated output, cascade order or loader behavior changed.

### Checkpoint

- Intended message: Document Legal CSS ownership review
- Commit SHA: 92b7b3f92ca83014fc5859b0b294121e5be99b88
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29664073969 succeeded

### Remaining risks

- Legal templates have no family body class, so broad element or typography selectors cannot be scoped safely to legal.css without changing markup.
- Generic Legal presentation continues to depend on shared core foundations by design.

## Phase 3 — Error family ownership review

Status: ownership review and validation complete; no additional CSS extraction was justified; checkpoint committed, pushed and green on staging.

### Files changed

- docs/core-css-optimization/INVENTORY.md
- docs/core-css-optimization/PROGRESS.md
- docs/core-css-optimization/VALIDATION.md
- docs/core-css-optimization/EXCEPTIONS.md
- docs/core-css-optimization/RESUME.md

No CSS, PHP, JavaScript, route, server, sitemap, loader, generated asset, dependency or workflow file changed.

### Exact rules moved or removed

- CSS rules/keyframes moved: 0
- CSS rules/keyframes deleted: 0
- Selectors or declarations rewritten: 0
- Selectors split: 0
- Remote imports changed: 0

The three invalid-route renders expose four tokens absent from canonical routes: `error-area`, `error-content`, `error-wrap` and `tg-button-wrap`. The first three have no core selector because their active rules already live in error.css. The only core match, `.tg-button-wrap`, is the complete generic button-layout primitive owned by the shared button component; selector-name and current-route exclusivity do not make that generic helper Error-owned. It therefore remains in core.

### Before and after sizes

| File | Before Error review | After Error review | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 552,449 | 552,449 | 0 |
| assets/css/src/pages/error.css | 1,186 | 1,186 | 0 |
| assets/css/bundles/core.min.css | 465,901 | 465,901 | 0 |
| assets/css/bundles/error.min.css | 943 | 943 | 0 |
| assets/css/main.css | 839,964 | 839,964 | 0 |
| assets/css/main.min.css | 716,557 | 716,557 | 0 |

### Validation performed

- Fresh branch/worktree/remote gate passed at 92b7b3f92ca83014fc5859b0b294121e5be99b88 after Deploy Virtuo Staging run 29664073969 succeeded.
- Ownership evidence compared all 86 canonical routes with invalid category, invalid tag and generic invalid renders: 1,356 canonical tokens, 174 Error tokens and the four Error-exclusive tokens listed above.
- Source search found `tg-button-wrap` only in active error.php, the generic core button rule and its shared SCSS component source; first-party JavaScript does not generate it.
- The corrected six-state desktop/mobile Error smoke passed expected status, exact core/Error bundle mapping, navigation/focus, layout, overflow, unexpected console/page-error and application-resource checks.
- All 89 route probes passed status, exact family order and compatibility exclusion; all 17 local stylesheet requests returned 200, with zero active style attributes/blocks after comments were excluded.
- Computed-style before/after comparison was not applicable because no CSS source, generated output, cascade order or loader behavior changed.

### Checkpoint

- Intended message: Document Error CSS ownership review
- Commit SHA: ad9cb696e8c973fde2e19f8fad6b8f884215df81
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29664258608 succeeded

### Remaining risks

- Error has no family body class; its ownership must remain anchored to template-exclusive component selectors.
- The commented `.error-img` markup and its existing error.css rules are not an extraction concern. Their dead-code disposition remains separated between the approved later CSS/comment-review phases.

## Phase 4 — Challenge and Strategic unused-rule deletion

Status: implementation and validation complete; checkpoint committed, pushed and green on staging.

### Files changed

- assets/css/src/core.css
- assets/css/bundles/core.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No family CSS, PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal CSS rules deleted: 15 (Challenge 9; Strategic 6)
- CSS rules moved: 0
- Keyframes deleted: 0
- Custom-property declarations deleted: 0
- URLs removed: 0
- Selectors/declarations rewritten or split: 0

The deletion removed the two adjacent, complete `21. Challenge` and `21. Strategic` sections. Their media rules were deleted with their base rules; the following Pricing boundary was preserved unchanged.

### Before and after sizes

| File | Before Challenge/Strategic | After | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 552,449 | 551,124 | -1,325 |
| assets/css/bundles/core.min.css | 465,901 | 464,792 | -1,109 |
| assets/css/main.css | 839,964 | 838,639 | -1,325 |
| assets/css/main.min.css | 716,557 | 715,448 | -1,109 |

Every active route drops the same 1,109 minified core bytes.

### Validation performed

- Fresh branch/worktree/remote gate passed at ad9cb696e8c973fde2e19f8fad6b8f884215df81 after Deploy Virtuo Staging run 29664258608 succeeded.
- Requalified the Phase 2 evidence: zero active PHP/JavaScript references, zero initial DOM matches across all 89 probes, and zero candidate-specific covered occurrences in the interaction/Coverage matrix (Challenge 0/9; Strategic 0/6).
- Boundary audit confirmed 15 complete rules, four associated media wrappers, no keyframes, no custom-property declarations, no URLs and no mixed selectors.
- `npm run build:css` passed with the unchanged remote-import notice.
- Same-DOM full computed-style and geometry hashes matched exactly before/after for Home, About, Contact, Digital Marketing Services, Blog listing, Blog details, Legal and Error at desktop/mobile: 16 states, 655–3,107 captured elements, zero candidate matches and zero differing hashes.
- All 89 route probes passed status, family order and compatibility exclusion; all 17 local stylesheet requests returned 200, with zero active inline styles and zero Challenge/Strategic DOM tokens.

The first full-parity harness had a syntax typo, and its corrected version then waited indefinitely for below-the-fold lazy images that had not been requested. That disposable process was stopped; the final harness compared both bundles against the identical already-rendered DOM/asset state and passed all 16 states.

### Checkpoint

- Intended message: Remove unused Challenge and Strategic CSS
- Commit SHA: 8b68892f142a1e49ae53f133bf748559853c5938
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29664620341 succeeded

### Remaining risks

- Phase 2 approvals are candidate-specific; no adjacent Pricing rule was included.
- The other 19 approved unused groups remain unchanged until separately requalified.

## Phase 4 — Benefit, Loan and Features unused-rule deletion

Status: implementation and validation complete; checkpoint committed, pushed and green on staging.

### Files changed

- assets/css/src/core.css
- assets/css/bundles/core.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No family CSS, PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal CSS rules deleted: 80 (Benefit 26; Loan 17; Features 37)
- Associated media wrappers removed: 19
- CSS rules moved: 0
- Keyframes/custom-property declarations/URLs deleted: 0
- Selectors/declarations rewritten or split: 0

The deletion removed the three adjacent complete sections from `25. Benefit` through `27. Features`. Descendant references to shared class names were retained only inside selectors anchored by the absent `features__` component; the following Pricing boundary was preserved.

### Before and after sizes

| File | Before Benefit/Loan/Features | After | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 551,124 | 540,777 | -10,347 |
| assets/css/bundles/core.min.css | 464,792 | 456,053 | -8,739 |
| assets/css/main.css | 838,639 | 828,292 | -10,347 |
| assets/css/main.min.css | 715,448 | 706,709 | -8,739 |

Every active route drops the same 8,739 minified core bytes.

### Validation performed

- Fresh gate passed at 8b68892f142a1e49ae53f133bf748559853c5938 after Deploy Virtuo Staging run 29664620341 succeeded.
- Requalified zero active build-source/JavaScript owners, zero tokens across all 89 rendered probes and Phase 2 candidate Coverage of Benefit 0/26, Loan 0/19 and Features 0/39.
- Boundary audit found 80 complete rules in 19 media wrappers and no keyframe, URL, custom-property declaration or selector branch without a candidate prefix anchor.
- `npm run build:css` passed with the unchanged remote-import notice.
- Same-DOM selected computed-style and geometry hashes matched for all eight route families at desktop/mobile: 16 states, 655–3,107 elements, zero candidate matches and zero differences.
- All 89 route probes retained expected status/family/order/no-compatibility behavior; final unique local stylesheet paths and URLs were 17, all 200, with zero inline styles.

An initial route pass observed 19 full cache-busted stylesheet URLs while rebuilt bundle mtimes were settling. De-duplication by decoded pathname remained 17, and the stable rerun was 17 by both path and full URL; no duplicate link or asset request was present in a rendered page.

### Checkpoint

- Intended message: Remove unused Benefit Loan and Features CSS
- Commit SHA: 68ef25a1a02ed3fe2ca7f4394bf51defe6996ec6
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29664834471 succeeded

### Remaining risks

- Original SCSS theme sources still mention Features, but the active build consumes assets/css/src rather than compiling SCSS; those inactive source archives were not edited.
- The remaining approved groups must still pass their own current boundary and runtime gates.

## Phase 4 — Dormant Preloader and Search-popup deletion

Status: implementation and validation complete; checkpoint committed, pushed and green on staging.

### Files changed

- assets/css/src/core.css
- assets/css/bundles/core.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No family CSS, PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal CSS rules deleted: 21 (Preloader 6; Search popup 15)
- Keyframe blocks deleted: 2 (prefixed and standard `preloader`)
- CSS rules moved: 0
- Custom-property declarations/URLs deleted: 0
- Selectors/declarations rewritten or split: 0

The Preloader markup and invocation remain commented and are reserved for Phase 7 source-comment review. Search event handlers bind only to absent opener/popup nodes. No active shell or Blog search selector was included.

### Before and after sizes

| File | Before dormant shell deletion | After | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 540,777 | 535,651 | -5,126 |
| assets/css/bundles/core.min.css | 456,053 | 451,717 | -4,336 |
| assets/css/main.css | 828,292 | 823,166 | -5,126 |
| assets/css/main.min.css | 706,709 | 702,373 | -4,336 |

Every route drops the same 4,336 minified core bytes.

### Validation performed

- Fresh gate passed at 68ef25a1a02ed3fe2ca7f4394bf51defe6996ec6 after Deploy Virtuo Staging run 29664834471 succeeded.
- Requalified commented/absent markup, uncalled/absent-node JavaScript, zero DOM tokens across all 89 probes and Phase 2 Coverage of Preloader 0/6 and Search 0/15.
- Boundary audit found 21 complete rules plus both exclusively referenced Preloader keyframes, with no URLs, custom-property declarations or mixed active selectors.
- Build passed; core keyframes decreased from 25 to 23.
- Same-DOM desktop/mobile style and geometry parity passed for all eight families: 16 states, matrix SHA-256 `2ebefb75f01980397e229719eaa038f912c3124e1163f62a74649ac80bd37f1f`, 655–3,107 elements, zero candidate matches/failures.
- All 89 route probes and 17 stable stylesheet paths/full URLs passed; zero inline styles or candidate tokens were rendered.

The first immediate route traversal saw cache-buster URL variants while the source watcher completed its rebuild. Path-level uniqueness stayed 17, and the stable rerun returned 17 full URLs.

### Checkpoint

- Intended message: Remove dormant Preloader and Search CSS
- Commit SHA: 5338f1fdce556b671d508db3acd54dfbda1e920f
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29665032564 succeeded

### Remaining risks

- Dormant Preloader JavaScript and commented markup are deliberately deferred to Phase 7 rather than mixed into CSS deletion.
- Search handlers are now harmless no-ops against absent elements; JavaScript comment/dead-code handling remains Phase 7.

## Phase 4 — Callback, Core-value, Pricing and Career deletion

Status: complete; committed and staging-validated.

### Files changed

- assets/css/src/core.css
- assets/css/bundles/core.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No family CSS, PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal rules deleted: 139 (Callback 43; Core Value 19; Pricing 27; Career/apply box 50)
- Associated media wrappers: 39
- Component-local custom-property declarations deleted: 1 (`--bs-gutter-x` under Callback)
- Keyframes/URLs deleted: 0
- Rules moved or selectors/declarations rewritten: 0

The seven `.apply__box` rules inside Career were independently requalified because the original Phase 2 Career token count covered only `career__`. They have no active build-source, JavaScript or DOM owner.

### Before and after sizes

| File | Before advisory deletion | After | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 535,651 | 519,499 | -16,152 |
| assets/css/bundles/core.min.css | 451,717 | 438,152 | -13,565 |
| assets/css/main.css | 823,166 | 807,014 | -16,152 |
| assets/css/main.min.css | 702,373 | 688,808 | -13,565 |

Every route drops the same 13,565 minified core bytes.

### Validation performed

- Fresh gate passed at 5338f1fdce556b671d508db3acd54dfbda1e920f after staging run 29665032564 succeeded.
- Fresh source/runtime/89-route DOM evidence remained zero. Pricing's retained JavaScript handler targets absent markup; `.apply__box` also had zero active ownership evidence.
- Boundary audit covered 139 complete rules/39 media wrappers, one local custom property, no keyframes/URLs and no mixed active selectors.
- Build passed with the known remote-import notice.
- Same-DOM desktop/mobile style/geometry parity passed all eight families: 16 states, matrix SHA-256 `407ff2a7774be57352f4d3b3af4bb7632aac832ccaeb67698be1d0e7587a157c`, 655–3,107 elements, zero candidate matches/failures.
- All 89 probes and 17 local stylesheet paths/full URLs passed with zero inline styles and zero candidate tokens.

### Checkpoint

- Intended message: Remove unused advisory CSS
- Commit SHA: 1d2ff25b33c59ba97174ca29a69ebaab2f5859d0
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29665177543 succeeded

### Remaining risks

- Pricing's absent-node event handler remains until the Phase 7 JavaScript dead-code review.
- The remaining approved presentation/carousel candidates remain untouched.

## Phase 4 — Shop, Login and Checkout deletion

Status: complete; committed and staging-validated.

### Files changed

- assets/css/src/core.css
- assets/css/bundles/core.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No family CSS, PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal rules deleted: 242 (Shop/product 150; Login/account 28; Checkout/cart 64)
- Associated media wrappers: 37 (Shop 15; Login 6; Checkout 16)
- Keyframes, URLs and custom-property declarations deleted: 0
- Rules moved or selectors/declarations rewritten: 0

The complete Shop span also owned `.product-desc-wrap`, `.show-more`, `.flash-sale`, `.pagination__wrap`, `.cart-plus-minus` and `.related__product-*`. The Checkout span owned `.coupon__*`, `.customer__form-*`, `.order__info-*`, `.cart__*`, product table selectors, `.f-right` and `.update__cart-*`. Separate active-source/runtime and rendered-DOM checks found no owner for these less-specific names.

### Before and after sizes

| File | Before commerce/account deletion | After | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 519,499 | 483,522 | -35,977 |
| assets/css/bundles/core.min.css | 438,152 | 407,845 | -30,307 |
| assets/css/main.css | 807,014 | 771,037 | -35,977 |
| assets/css/main.min.css | 688,808 | 658,501 | -30,307 |

Every route drops the same 30,307 minified core bytes.

### Validation performed

- Fresh gate passed at 1d2ff25b33c59ba97174ca29a69ebaab2f5859d0 after staging run 29665177543 succeeded.
- Active PHP/built family source remained zero. The original SCSS archive is inactive. Guarded Shop Swiper initialization and coupon/quantity handlers target absent nodes.
- Fresh 89-route DOM validation found zero commerce/account tokens, including the generic-looking section-owned selectors.
- Boundary audit covered 242 complete rules/37 media wrappers and no keyframe, URL, custom property or mixed active selector.
- `npm run build:css` passed with the known remote-import notice.
- Same-DOM desktop/mobile style and geometry parity passed all eight families: 16 states, matrix SHA-256 `fb9a1d78059f16e4f83c878ab27d0afe4ef33dba525e4ec098e66e4df324ecc5`, 698–3,151 elements, zero candidate matches/failures/diagnostics.
- All 89 probes and 17 stable local stylesheet paths/full URLs passed with zero inline styles and zero candidate tokens.

### Checkpoint

- Intended message: Remove unused commerce and account CSS
- Commit SHA: e3fa003b88b589495b63c6fdf3c79b84352f1f50
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29665494285 succeeded

### Remaining risks

- Shop, coupon and quantity JavaScript remains as harmless absent-node logic until the Phase 7 dead-code review.
- Project and Testimonial remain for the final Phase 4 checkpoint.

## Phase 4 — Banner, Brand, History, Counter and Video deletion

Status: complete; committed and staging-validated.

### Files changed

- assets/css/src/core.css
- assets/css/bundles/core.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No family CSS, PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal rules deleted: 544 (Banner inactive portion 211; Brand 31; History 138; Counter 89; Video 75)
- Associated media wrappers: 259 (Banner 120; Brand 6; History 56; Counter 40; Video 37)
- URL declarations deleted: 2 for one Banner-only mask asset
- Keyframes and custom-property declarations deleted: 0
- Rules moved or selectors/declarations rewritten: 0

The Banner boundary was split conservatively. Its 17 live `.circle__wrap` rules, seven media wrappers, reduced-motion behavior and standard/prefixed `virtuo-circle-text-rotation` keyframes remain in the same cascade position because Home, About and Contact render four component instances. The inactive Banner rules plus `business-growth-box` and `happy__clients-wrap` were deleted. History's unanchored progress/planning helpers and Video's play-button helpers independently had no active rendered owner.

### Before and after sizes

| File | Before presentation deletion | After | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 483,522 | 414,854 | -68,668 |
| assets/css/bundles/core.min.css | 407,845 | 351,362 | -56,483 |
| assets/css/main.css | 771,037 | 702,369 | -68,668 |
| assets/css/main.min.css | 658,501 | 602,018 | -56,483 |

Every route drops the same 56,483 minified core bytes.

### Validation performed

- Fresh gate passed at e3fa003b88b589495b63c6fdf3c79b84352f1f50 after staging run 29665494285 succeeded.
- Active-source and 89-route token evidence stayed zero for every deleted family/helper. Brand's guarded Swiper initializers return when markup is absent.
- The boundary/dependency audit explicitly retained the active circle component and its two keyframe blocks; the sole deleted URL is Banner-only.
- `npm run build:css` passed with the known remote-import notice.
- Same-DOM desktop/mobile style and geometry parity passed all eight families: 16 states, matrix SHA-256 `87688365f205caa20ee091efcf9f7d7f48290444540f3500b9bc667dd1465dcc`, 698–3,151 elements, zero candidate matches/failures/diagnostics and eight retained circle observations.
- All 89 probes and 17 stable local stylesheet paths/full URLs passed with zero inline styles, zero deleted candidate tokens and four retained circle instances.

### Checkpoint

- Intended message: Remove unused legacy presentation CSS
- Commit SHA: cfaa7bfd90710c77fc26f9db767ad1159fc053a4
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29665767749 succeeded

### Remaining risks

- Brand's absent-node Swiper initialization remains until Phase 7 review.
- Project and Testimonial passed their separate guarded-initializer and mixed-selector audit.

## Phase 4 — Project and Testimonial deletion

Status: complete; committed and staging-validated.

### Files changed

- assets/css/src/core.css
- assets/css/bundles/core.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No family CSS, PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact rules moved or removed

- Normal rules deleted: 409 (Project 270; Testimonial 139)
- Associated media wrappers: 103 (Project 59; Testimonial 44)
- URL declarations deleted: 2 for one Project-only mask asset
- Keyframes and custom-property declarations deleted: 0
- Rules moved or selectors/declarations rewritten: 0

Project contained one unanchored mobile `.section__btn` rule. Separate source and 89-route rendered checks found zero owner, so it was included in the complete-section deletion. Every active-looking Project/Testimonial reference in first-party JavaScript is a guarded Swiper initializer whose root selector is absent; the alternative Testimonial initializer is commented.

### Before and after sizes

| File | Before carousel deletion | After | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 414,854 | 354,393 | -60,461 |
| assets/css/bundles/core.min.css | 351,362 | 300,461 | -50,901 |
| assets/css/main.css | 702,369 | 641,908 | -60,461 |
| assets/css/main.min.css | 602,018 | 551,117 | -50,901 |

Every route drops the same 50,901 minified core bytes.

### Validation performed

- Fresh gate passed at cfaa7bfd90710c77fc26f9db767ad1159fc053a4 after staging run 29665767749 succeeded.
- Active PHP/built family source and all 89 initial DOM responses contained zero Project, Testimonial or `.section__btn` ownership tokens.
- All Project/Testimonial Swiper calls are guarded and no initializer root exists; boundary audit found no mixed active selector.
- `npm run build:css` passed with the known remote-import notice.
- Same-DOM desktop/mobile style and geometry parity passed all eight families: 16 states, matrix SHA-256 `19f311f82e27ec7c5c29728cba502f3b2b12534615b38614a9938b4059f27cc4`, 698–3,151 elements, zero candidate matches/failures/diagnostics.
- All 89 probes and 17 stable local stylesheet paths/full URLs passed with zero inline styles and zero candidate tokens.

### Checkpoint

- Intended message: Remove unused Project and Testimonial CSS
- Commit SHA: 5d00d1aac9aa999c45728219929e575aad52c9f8
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29665925805 succeeded

### Remaining risks

- Absent-node carousel initializers and the commented alternate Testimonial code remain until Phase 7.
- Phase 5 duplicate candidates still require fresh cascade and keyframe dependency proof; no duplicate was changed in Phase 4.

## Phase 5 — Core exact duplicate consolidation

Status: complete; committed and staging-validated.

### Files changed

- assets/css/src/core.css
- assets/css/bundles/core.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

No family CSS, PHP, JavaScript, route, server, sitemap, loader, dependency or workflow file changed.

### Exact duplicate copies removed

- Normal rules: 6
  - `.virtuo-services-mega__divider` under `@media (max-width: 991px)`: 3 earlier copies
  - `.fadeInUp2`: 1 earlier copy
  - hidden mega panel: 1 earlier copy
  - mega category/panel link spacing: 1 earlier copy
- Keyframe blocks: 5
  - `fadeInUp2`: 1 earlier copy
  - `pulse-border`: 1 standard and 1 prefixed earlier copy
  - `digitalPanelFadeIn`: 2 earlier copies
- Selectors/declarations/media conditions/keyframe steps rewritten: 0

Each retained copy is byte-identical and has the same context as the copies removed. Earlier copies were removed and the last cascade definition remains.

### Before and after sizes

| File | Before core duplicate cleanup | After | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 354,393 | 352,390 | -2,003 |
| assets/css/bundles/core.min.css | 300,461 | 298,806 | -1,655 |
| assets/css/main.css | 641,908 | 639,905 | -2,003 |
| assets/css/main.min.css | 551,117 | 549,462 | -1,655 |

Core keyframe blocks changed 23 to 18. Every route drops the same 1,655 minified core bytes.

### Validation performed

- Fresh gate passed at 5d00d1aac9aa999c45728219929e575aad52c9f8 after staging run 29665925805 succeeded.
- Fresh syntax-aware scan found four exact duplicate rule groups and four exact duplicate keyframe groups in core before cleanup; one copy of every group remains.
- `npm run build:css` passed with the known remote-import notice.
- Same-DOM desktop/mobile selected-style and geometry parity passed all eight families: 16 states, matrix SHA-256 `1ceb1c864ef97bfa0eb3e050d1b28db7c5546b96d927056d2a4d922c1504e300`, 698–3,151 elements, zero failures/diagnostics.
- All 89 probes and 17 stable local stylesheet paths/full URLs passed with zero inline styles.

### Checkpoint

- Intended message: Consolidate exact core CSS duplicates
- Commit SHA: 4c9f51a0e15cc392c7bff8268e73dc40ee61ce66
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29666121983 succeeded

### Remaining risks

- Services, Home and Blog-details family sources retain exact duplicate groups for later isolated checkpoints.
- Same-declaration rules with different selectors and non-identical repeated states remain intentionally untouched.

## Phase 5 — Services-family exact duplicate consolidation

Status: complete; committed and staging-validated.

### Files changed

- assets/css/src/pages/services.css
- assets/css/bundles/services.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

Core CSS, other family CSS, PHP, JavaScript, route, server, sitemap, loader, dependency and workflow files did not change.

### Exact duplicate copies removed

- Normal rules: 19 earlier copies from 13 exact groups.
- Groups: normal and `!important` `.service-tab-panel` visibility; Digital Marketing list/item/sub-list/arrow resets; active-panel animation; `digital-panel-changing`; `digital-panel-ready`.
- Selectors/declarations/media conditions rewritten: 0.
- Keyframes changed: 0.

The last byte-identical copy of each group remains. Different `display` importance and different `digitalPanelFadeIn` durations remain separate by design.

### Before and after sizes

| File | Before Services duplicate cleanup | After | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/pages/services.css | 42,537 | 40,597 | -1,940 |
| assets/css/bundles/services.min.css | 37,069 | 35,376 | -1,693 |
| assets/css/main.css | 639,905 | 637,965 | -1,940 |
| assets/css/main.min.css | 549,462 | 547,769 | -1,693 |

Services routes drop 1,693 minified family bytes; other route-family payloads are unchanged.

### Validation performed

- Fresh gate passed at 4c9f51a0e15cc392c7bff8268e73dc40ee61ce66 after staging run 29666121983 succeeded.
- Fresh syntax-aware scan found 13 exact duplicate groups and 19 removable earlier copies in `services.css`.
- `npm run build:css` passed with the known remote-import notice.
- Same-DOM style/geometry parity passed standard and Digital Marketing Services at desktop/mobile in initial, `digital-panel-changing` and `digital-panel-ready` modes: 12 states, matrix SHA-256 `a9eaa5be12ade63a3031fc039ff7146713cae6004c478eb00ca26b116e6d6565`, 986–3,451 elements, zero failures/state failures/diagnostics.
- Captures settled for 400 ms on both sides, exceeding the retained 180/240 ms transitions; an earlier short capture was correctly rejected while interpolation was in flight.
- All 89 probes and 17 stable local stylesheet paths/full URLs passed with zero inline styles.

### Checkpoint

- Intended message: Consolidate exact Services CSS duplicates
- Commit SHA: c5e09ec91522f72be84ed511655a981e398fbed4
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29666471751 succeeded

### Remaining risks

- Home and Blog-details family sources retained seven exact groups for one final isolated Phase 5 checkpoint.
- Non-identical Services state rules remain intentionally layered and must not be normalized without separate behavior proof.

## Phase 5 — Home and Blog-details exact duplicate consolidation

Status: complete; committed and staging-validated.

### Files changed

- assets/css/src/pages/home.css
- assets/css/src/pages/blog-details.css
- assets/css/bundles/home.min.css
- assets/css/bundles/blog-details.min.css
- assets/css/main.css
- assets/css/main.min.css
- Phase documentation under docs/core-css-optimization

Core CSS, other family CSS, PHP, JavaScript, route, server, sitemap, loader, dependency and workflow files did not change.

### Exact duplicate copies removed

- Home: 4 earlier copies under `@media (min-width: 992px)` covering nav-item flex, linked thumbnail sizing, thumbnail object-fit and content flex.
- Blog details: 3 earlier copies covering the Blue Note marker body, its mobile width and the US-relocation warning metric color.
- Selectors/declarations/media conditions rewritten: 0.
- Keyframes changed: 0.

The last byte-identical copy of each group remains at its existing cascade position.

### Before and after sizes

| File | Before final duplicate cleanup | After | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/pages/home.css | 27,179 | 26,686 | -493 |
| assets/css/bundles/home.min.css | 23,415 | 22,996 | -419 |
| assets/css/src/pages/blog-details.css | 162,062 | 161,636 | -426 |
| assets/css/bundles/blog-details.min.css | 142,589 | 142,223 | -366 |
| assets/css/main.css | 637,965 | 637,046 | -919 |
| assets/css/main.min.css | 547,769 | 546,984 | -785 |

Home routes drop 419 minified family bytes and Blog-details routes drop 366; other route-family payloads are unchanged.

### Validation performed

- Fresh gate passed at c5e09ec91522f72be84ed511655a981e398fbed4 after staging run 29666471751 succeeded.
- Fresh syntax-aware scans found four exact groups in `home.css` and three in `blog-details.css`; both sources rescan at zero exact groups after removing seven earlier copies.
- `npm run build:css` passed with the known remote-import notice.
- Same-DOM desktop/mobile parity passed Home, a Blue Note article and the US-relocation article: six states, 1,208–3,251 elements and zero browser diagnostics. The one moving Home hero Swiper was stopped for the broad desktop recapture; all 20 elements owned by the changed selectors also matched exact computed styles and geometry.
- All 89 probes and 17 stable local stylesheet paths/full URLs passed with zero inline styles; all 89 still rendered the footer phone field and intl-tel-input script.

### Checkpoint

- Intended message: Consolidate exact Home and Blog CSS duplicates
- Commit SHA: d0a01df2125cbe60aa5d74224c863148d10270c8
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29666760688 succeeded

### Remaining risks

- Phase 5 removes only proven exact copies; intentional same-declaration/different-selector patterns and non-identical cascade layers remain.
- The remote intl-tel-input import remained unchanged until the isolated Phase 6 loader/order audit.

## Phase 6 — Explicit intl-tel-input stylesheet loading

Status: complete; committed and staging-validated.

### Files changed

- assets/css/src/core.css
- assets/css/bundles/core.min.css
- assets/css/main.css
- assets/css/main.min.css
- partials/main-styles.php
- Phase documentation under docs/core-css-optimization

No family CSS, JavaScript, phone initializer, route, server, sitemap, dependency or workflow file changed.

### Exact change

- Removed the version 25.3.1 jsDelivr `@import` from the top of `core.css`.
- Added one synchronous direct `<link>` for the identical URL immediately before core/compatibility CSS in the once-guarded main stylesheet loader.
- The remote URL is not passed through local asset version/path validation.
- Core remains after the library stylesheet, so all existing custom intl-tel-input overrides keep their order.

### Before and after sizes

| File | Before explicit loading | After | Change |
| --- | ---: | ---: | ---: |
| assets/css/src/core.css | 352,390 | 352,295 | -95 |
| assets/css/bundles/core.min.css | 298,806 | 298,715 | -91 |
| assets/css/main.css | 637,046 | 636,951 | -95 |
| assets/css/main.min.css | 546,984 | 546,893 | -91 |

The browser still requests the same third-party stylesheet once; the benefit is direct HTML discovery rather than waiting for core CSS to reveal a nested import.

### Validation performed

- Fresh gate passed at d0a01df2125cbe60aa5d74224c863148d10270c8 after staging run 29666760688 succeeded.
- `npm run build:css` passed without the former CleanCSS remote-import warning; no `@import` remains in core source, core bundle or compatibility outputs.
- `php -l partials/main-styles.php` passed.
- Home, Contact and sidebar-form Services routes passed at desktop/mobile: six states, one CSS request each initiated by `link`, 16×12 AE flags, 244-country desktop/mobile dropdowns, US selection, `+1 2025550123` synchronization, existing validation behavior and zero relevant console/network errors.
- Settled same-DOM import-vs-link comparison matched all computed properties and rectangles for 989 phone/dropdown elements in every state; aggregate matrix SHA-256 `3a615321c1d291d3476212e6ab62358f6cfc1a1aad14d7ae566b618e256e47cf`.
- All 89 probes rendered exactly one versioned intl-tel-input stylesheet immediately before core, one matching script and at least one phone field; all 17 local stylesheet paths/full URLs returned 200 and inline styles remained zero.

### Checkpoint

- Intended message: Load intl-tel-input CSS explicitly
- Commit SHA: 1f69ca7c9f45b57366eba67858b2381f106986f9
- Push target: origin/testing only; push succeeded
- Staging workflow status: Deploy Virtuo Staging run 29667108255 succeeded

### Remaining risks

- The stylesheet and script still depend on the existing pinned jsDelivr availability; Phase 6 changes discovery, not hosting.
- Phase 7 comment candidates require manual context review and syntax-checked small groups.

## Phase 7 — Obsolete commented-out CSS cleanup

Status: implementation and validation complete; checkpoint pending.

### Files changed

- assets/css/src/core.css
- assets/css/src/pages/about.css
- assets/css/src/pages/blog-details.css
- assets/css/src/pages/blog-listing.css
- assets/css/src/pages/contact.css
- assets/css/src/pages/home.css
- assets/css/src/pages/services.css
- Corresponding generated bundles and compatibility CSS
- Phase documentation under docs/core-css-optimization

PHP, JavaScript, HTML markup, routes, loader, server, sitemap, dependency and workflow files did not change.

### Exact cleanup

- Removed 68 disabled first-party CSS comment blocks totaling 292 source lines and 7,402 source bytes.
- The selection required actual declaration terminators or rule braces; license, phase-ownership, section, responsive, compatibility and explanatory prose comments were retained.
- Active selectors, declarations, media blocks, keyframes and URLs changed: 0.

### Before and after sizes

| Source / output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.css | 352,295 | 347,786 | -4,509 |
| core.min.css | 298,715 | 294,299 | -4,416 |
| Home source / min | 26,686 / 22,996 | 26,104 / 22,431 | -582 / -565 |
| About source / min | 19,080 / 16,099 | 18,785 / 15,821 | -295 / -278 |
| Contact source / min | 21,453 / 18,541 | 21,242 / 18,342 | -211 / -199 |
| Services source / min | 40,597 / 35,376 | 40,576 / 35,360 | -21 / -16 |
| Blog-listing source / min | 14,018 / 12,000 | 13,505 / 11,495 | -513 / -505 |
| Blog-details source / min | 161,636 / 142,223 | 160,365 / 140,998 | -1,271 / -1,225 |
| main.css / main.min.css | 636,951 / 546,893 | 629,549 / 539,689 | -7,402 / -7,204 |

CleanCSS had preserved disabled comments and comment-only empty rules, so minified payloads shrink even though CSS semantics do not change.

### Validation performed

- Fresh gate passed at 1f69ca7c9f45b57366eba67858b2381f106986f9 after staging run 29667108255 succeeded.
- Fresh scanner found 68 declaration/rule comments before cleanup and zero afterward.
- `npm run build:css` passed. Canonical re-minification after stripping comments matched the committed version for all nine bundles and compatibility CSS.
- Same-DOM committed-vs-cleaned parity passed all eight families at desktop/mobile: 16 states, 640–3,390 elements, aggregate matrix SHA-256 `2ace9480e7b74fb98ee1f0013c317bea793e8d5be4b93c0d8646ad1d2b287648`, zero failures.
- The corrected parity run used a 500 ms settle; an earlier Contact-mobile short capture was rejected as transient. Expected invalid-route 404 console messages and Analytics unload-beacon aborts were classified separately; first-party/asset diagnostics were zero.
- All 89 probes and 17 stable local stylesheet paths/full URLs passed with expected status/family/order and zero active inline styles.

### Checkpoint

- Intended message: Remove obsolete commented CSS code
- Commit SHA: pending checkpoint
- Push target: origin/testing only
- Staging workflow status: pending checkpoint push

### Remaining risks

- Commented JavaScript and PHP/HTML candidates remain for separate syntax-checked groups.
- License, ownership, responsive, compatibility and active explanatory CSS comments remain intentionally.

## Next exact action

Run final deterministic build/diff checks, commit the CSS-comment cleanup checkpoint, push only to testing and wait for staging. Then review JavaScript and PHP/HTML comment candidates from a clean synchronized gate.
