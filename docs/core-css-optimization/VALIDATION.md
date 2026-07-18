# Core CSS Optimization Validation

## Phase 0 environment

- Date: 2026-07-19, Asia/Dubai
- Repository: Virtuo Services
- Local server reused: http://127.0.0.1:8000
- Existing server process: php PID 8646; not terminated or replaced
- Existing asset watcher: node scripts/watch-assets.js PID 44048; left running
- Browser automation: not used in Phase 0

## Git safety gate

Commands:

    git branch --show-current
    git status --short
    git rev-parse HEAD
    git rev-parse origin/testing

Results:

- Branch: testing
- Worktree: clean at the safety gate
- HEAD: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- origin/testing: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- Gate: passed

## Baseline build

Command:

    npm run build:css

Result: passed. CleanCSS emitted the existing notice that it skipped inlining the remote intl-tel-input import because no callback was supplied. Output sizes were:

    core.min.css           556488
    home.min.css            11472
    about.min.css           12802
    contact.min.css         13516
    services.min.css          853
    blog-listing.min.css    10868
    blog-details.min.css   109467
    legal.min.css               50
    error.min.css              943
    main.css               839840
    main.min.css           716409

The worktree remained clean after the build, proving that the checked-in generated files already matched the builder output.

## Generated hash determinism at baseline

Command before and after the build:

    shasum -a 256 assets/css/bundles/*.min.css assets/css/main.css assets/css/main.min.css

Both sets matched:

| File | SHA-256 |
| --- | --- |
| about.min.css | ce3542443479182a35b51ccb41111864b7588ea6becc1611c4ba1cc98a8e5182 |
| blog-details.min.css | bec6a0c9f37c302371b215917710cbb34458970e1d7d985105215c214e5948ca |
| blog-listing.min.css | 788870e71fbe09139858d32a1b8a3bb208aebbebfe458175cc9b1de1cabe9969 |
| contact.min.css | 34adb8f2b80c07da6a3e39ff0807b3a6d8b8b513bf0d1c884c7d9d26e0ffaff9 |
| core.min.css | 639be506927b9be1aa1c4c4614fd292e8c4e280827aba9c26b80c9541a87eeb4 |
| error.min.css | 55b41e8ccf7c4a8756724a6df2bef5eb0568f1a676f79f1e684354e5f1593750 |
| home.min.css | 931ab5bdcd3776758e2c56c74ea4e6c464a9e13946daf51aec6f03253073da81 |
| legal.min.css | 67b6c5660d2ad0268b2efaa787cf90513d5e472a0ee6c2282bf297013cf8672f |
| services.min.css | 419db313752480a66ee9ee16e34a6835143654fbcdc27be6d87cfb2536771d87 |
| main.css | 6aaaa76c91206918a050807c15aedcf59d1c26eac1a26691c5f2934c02d2e314 |
| main.min.css | 3bd1eaebe9d73f1d5e23e697792112d9f1542fb02cd1962fec033fb8a55a43e3 |

Phase 8 will repeat two consecutive builds after implementation. Phase 0 establishes that one build reproduces the checked-in hashes.

## Size commands

    wc -c assets/css/src/core.css assets/css/src/pages/*.css
    wc -c assets/css/bundles/*.min.css assets/css/main.css assets/css/main.min.css
    gzip -9 -c assets/css/src/core.css | wc -c
    gzip -9 -c assets/css/bundles/core.min.css | wc -c

Results are recorded in INVENTORY.md. The gzip diagnostics were 77,649 and 73,497 bytes respectively.

## Structural inventory method

A comment-aware Node brace scanner was run against every editable CSS source. It:

1. Replaced comment contents with whitespace while preserving line positions.
2. Parsed statements and balanced blocks while respecting quotes, parentheses, and attribute brackets.
3. Recursed into media/support/container/layer/scope contexts.
4. Excluded keyframe step blocks from normal selector counts.
5. Split selector lists only on top-level commas.
6. Recorded media ancestry for duplicate comparisons.

Independent sanity commands:

    rg -o '@media\b' assets/css/src/core.css | wc -l
    rg -o '@(?:-webkit-)?keyframes\b' assets/css/src/core.css | wc -l
    rg -o '@font-face\b' assets/css/src/core.css | wc -l
    rg -n '@import|@font-face|@(?:-webkit-)?keyframes|url\(' assets/css/src/core.css

The raw media search returned 1,217 because four @media strings are inside comments. The comment-aware active count is 1,213. The raw and parsed keyframe count is 30; font-face count is zero.

Core structural result:

- 4,643 normal rules
- 5,065 selectors
- 1,213 media-query blocks / 27 unique query texts
- 30 keyframe blocks / 18 logical names
- 88 active custom-property declarations / 70 unique names
- 0 font-face blocks
- 1 import
- 13 active url() occurrences / 8 unique values

## Loader and route validation

The validator fetched sitemap.xml from the existing local server, converted only the virtuo.ae origin to localhost, added invalid category/tag/generic probes, and for each response verified:

- Expected 200 or 404 status.
- At least one vendor stylesheet.
- Exactly one core.min.css.
- Exactly one expected family bundle.
- Core appears before the family bundle.
- No main.css or main.min.css.

It then de-duplicated local stylesheet URLs and requested each one directly. External stylesheet URLs were inventoried separately and were not rebased to localhost.

Summary:

- sitemap.xml: 200
- Canonical sitemap routes: 86
- Total probes: 89
- Route/status/family/order failures: 0
- Unique local CSS URLs: 17
- Local CSS HTTP failures: 0
- External stylesheet links: one Google Fonts Poppins URL

Family distribution across the 89 probes:

| Family | Probes |
| --- | ---: |
| Home | 1 |
| About | 1 |
| Contact | 1 |
| Services | 27 |
| Blog listing | 43 |
| Blog details | 11 |
| Legal | 2 |
| Error | 3 |

All canonical URLs are enumerated in INVENTORY.md.

## Representative stylesheet order

The homepage rendered:

1. External Poppins stylesheet.
2. bootstrap.min.css.
3. fontawesome-all.min.css.
4. tg-flaticon.css.
5. swiper-bundle.min.css.
6. default.css.
7. default-icons.css.
8. aos.css.
9. tg-cursor.css.
10. bundles/core.min.css.
11. bundles/home.min.css.

Other active routes contained eight local/external vendor styles before core and one family bundle. The homepage contained an additional Swiper vendor stylesheet. No active route rendered compatibility CSS.

## Phone-field and remote import baseline

Commands/checks:

    rg -n '@import|intlTelInput\.css' assets/css/bundles/core.min.css assets/css/main.min.css

Results:

- The remote import is present in core.min.css and main.min.css.
- All 89 route probes rendered a virtuo-footer-phone-input.
- All 89 route probes rendered intlTelInput.min.js.
- No remote import change was made.

## Inline-style baseline

The route validator removed HTML comments, then counted active style attributes and style elements.

Results across 89 responses:

- Active style attributes: 0
- Active style blocks: 0
- Responses with either: 0

## CSS URL validation

The existing build-css.js validates that local source URLs are root-relative and that their decoded target files exist. npm run build:css passed this validation for all editable sources. The route validator also confirmed all 17 rendered local CSS links returned 200.

## Documentation checkpoint validation

Run immediately before commit:

    git diff --stat
    git diff --check
    git status --short
    git diff -- docs/core-css-optimization

Result: passed. Exactly the six files under docs/core-css-optimization were committed, with no whitespace errors.

## Phase 0 checkpoint and staging

- Checkpoint: bc8c96789f822bb2b4a7af6ce7769785bcbeb973
- Commit message: Document core CSS optimization baseline
- Push target: origin/testing only
- Push result: succeeded
- Workflow: Deploy Virtuo Staging
- Run: 29659795632
- Result: success
- Main and production: untouched

## Browser testing

No browser automation, screenshots, Playwright, or visual walkthrough was run in Phase 0. This is intentional because Phase 0 edits documentation only. Command-line checks cannot prove computed-style or interaction parity after future cascade changes.

## Manual browser tests still needed

None are caused by Phase 0 documentation. Before implementation checkpoints can be promoted, the requested restricted desktop/mobile matrix must validate Home, About, Contact, representative Services including Digital Marketing, Blog listing, representative Blog details, Legal, and Error, including interactions, console, failed resources, overflow, and responsive behavior.

## Phase 1 ownership classification validation

Phase 1 was documentation-only. It did not change CSS ownership, specificity, order or cascade, so no browser smoke test was required for the checkpoint.

Safety commands:

    git branch --show-current
    git status --short
    git rev-parse HEAD
    git rev-parse origin/testing

Starting result: testing, clean worktree, and both refs at a2f457e8eff221153834145acd09ae7a19948eb2.

Evidence checks:

- Fetched all 86 sitemap routes plus one invalid Error render from the existing local server.
- Removed inactive HTML comments and collected unique rendered class tokens by family.
- Reviewed active PHP family assignments, shared partial includes, Digital Marketing registry/content routes, and first-party non-minified JavaScript class additions/removals/toggles/queries.
- Cross-checked original core headings and later named correction layers against rendered family ownership.
- Preserved responsive, pseudo, plugin, injected, sticky, animation, loading, form success/error and generic state risks in EXCEPTIONS.md.

Rendered class-token result:

| Family | Unique initial rendered class tokens |
| --- | ---: |
| Home | 267 |
| About | 243 |
| Contact | 217 |
| Services | 249 |
| Blog listing | 209 |
| Blog details | 618 |
| Legal | 153 |
| Error | 170 |

Phase 1 classification limitations:

- Initial DOM absence is not deletion evidence.
- JavaScript/plugin-generated states and interaction-only markup remain allowlisted.
- Coverage and computed DOM matching are deferred to Phase 2 as required.
- No CSS rule was moved, removed or rewritten.

Final documentation checks before checkpoint:

    npm run build:css
    git diff --stat
    git diff --check
    git status --short

Expected CSS sizes remain core.css 658,214 bytes and core.min.css 556,488 bytes.

## Phase 2 unused-CSS evidence validation

Safety gate before evidence collection:

    git branch --show-current
    git status --short
    git rev-parse HEAD
    git rev-parse origin/testing

Result: testing, clean worktree, and both refs at b31857f3febeb04b82053c88e79310d0fad6e0e1. The Phase 1 checkpoint had already passed Deploy Virtuo Staging run 29660320319.

### Repository/runtime-owner audit

A focused active PHP and non-minified first-party JavaScript search found:

- Preloader markup and invocation only in comments; a dormant function remains in main.js.
- Search popup event handlers but no active opener or popup markup.
- Guarded Swiper calls for Brand, Project, Testimonial and Shop. virtuoInitSwiper() returns null before construction when the selector is absent.
- Pricing and coupon handlers bound to absent triggers/targets.
- No active first-party class reference or generator for the other approved legacy groups.
- contact__ and the active form response states remain excluded from deletion because ajax-form.js owns them.

### Browser setup and matrix

The in-app browser skill was selected because the phase required browser evidence. Its required Node bridge rejected the session before navigation because codex/sandbox-state-meta did not include sandboxPolicy, and the nested tool interface did not permit supplying that metadata. Following the skill fallback, the already-installed Playwright package launched the local Google Chrome binary; no package or browser was installed. No screenshot was taken because no regression/correction needed documenting.

The browser tested 12 routes at desktop 1440 x 1000 and mobile 390 x 844, for 24 total route states:

- Home, About, Contact.
- Standard Services and a Digital Marketing query-tab route.
- Blog listing and a category listing.
- Standard, calculator and interactive Emirates Blog details.
- Legal and a generic invalid Error route.

All 22 valid route states returned 200; both invalid states returned 404. Every state loaded core first, exactly one expected family bundle second, and no compatibility main.css/main.min.css.

### Interaction results

- Desktop off-canvas and mobile menu opened and closed.
- Phone-country UI opened; footer inputs received focus.
- Home slide pagination and service tabs changed state where available.
- Standard Services selected the freezone panel and verified both link and panel is-active.
- Digital Marketing changed from paid advertising to analytics/performance marketing and updated both URL and aria-current selection.
- Services FAQ accordion opened.
- Blog load-more reduced blog-load-hidden items from 6 to 1 on both viewports.
- Desktop Blog TOC navigation activated; its mobile sidebar link is intentionally absent at the tested breakpoint.
- The wireless/ITAD calculator revenue input changed from 5,000,000 to 45,000,000 on both viewports.
- The Emirates article Tech/AI/SaaS filter reported aria-selected=true on both viewports.
- Representative links were hovered and article/footer controls focused without an unexpected page error.

### DOM matching and Chromium CSS Coverage

Before and after the interaction pass, no class matching any of the 21 candidate groups appeared on any tested state. This corroborates the Phase 1 exhaustive initial DOM scan of all 86 canonical routes plus Error.

The aggregated core result was:

- Browser-decoded core text: 556,477 characters. The checked-in filesystem asset remains 556,488 bytes.
- Normalized used ranges: 195.
- Used decoded characters: 67,227 / 12.08%.
- Candidate-specific covered occurrences: zero for all groups.

Candidate occurrence totals were Preloader 6, Search 15, Banner 197, Brand 31, History 117, Counter 92, Video 65, Project 297, Testimonial 155, Callback 46, Core value 19, Shop/related product 144, Benefit 26, Loan 19, Features 39, Challenge 9, Strategic 6, Pricing 30, Career 43, Login 19 and Checkout/cart 32.

Generic/shared class tokens were intentionally excluded from the coverage decision. Coverage did not authorize removal of all uncovered CSS; only the selector groups passing the complete evidence standard were dispositioned in INVENTORY.md.

### Console and resource result

- Page errors: 0.
- Unexpected failed asset requests: 0.
- The invalid document produced the expected 404 console resource entry once per viewport.
- Nine preload-unused warnings referenced existing HEADER/HEADER_Mobile or Blog hero images. They predate and are unrelated to this documentation-only phase.
- One initial desktop load-more click became unstable as its IntersectionObserver hid the sentinel during scrolling. A focused follow-up dispatched the real click event before intersection and verified the 6-to-1 state change on both viewports.

### Phase 2 checkpoint validation

Run before commit:

    npm run build:css
    git diff --stat
    git diff --check
    git status --short

Expected result: deterministic CSS outputs remain unchanged and exactly the five Phase 2 documentation files are modified.

## Phase 3 Home-family extraction validation

### Safety and ownership gate

The post-Phase-2 gate passed on testing with a clean worktree and HEAD equal to origin/testing at a090a82d2bebfb182da16f8bddf17a192d5a2f5d. Deploy Virtuo Staging run 29660863968 had succeeded before source editing began.

All 86 canonical rendered routes were rechecked for the candidate component classes. The extracted Core Services item/wrap/thumb/content classes occur only on Home. Home Blog item/thumb/date/content/tag/author primitives occur only on Home. White-title, slider navigation/pagination, About mask/shape, shine helper and the mobile non-Blog slider fix likewise have an applicable active owner only on Home.

home-main-cta was found on Home and About, so it was not moved. The mixed body.home-page/body.contact-page/body.about-page eye rules and Home/Blog-details slider primitives were also retained in core.

### Exact structural movement

- Core normal rules: 4,643 to 4,557.
- Home normal rules: 83 to 169.
- Core keyframes: 30 to 28.
- Home keyframes: 0 to 2.
- Normal rules moved: 86; keyframe blocks moved: 2; rules deleted: 0.

Extracted source spans totaled 14,021 core bytes. The Home source gained 14,099 bytes including review separation and the ownership comment.

### Build and sizes

Command:

    npm run build:css

Result: passed with the unchanged known remote intl-tel-input import notice.

| Output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.min.css | 556,488 | 544,605 | -11,883 |
| home.min.css | 11,472 | 23,415 | +11,943 |
| Home core + family | 567,960 | 568,020 | +60 |
| main.css | 839,840 | 839,918 | +78 |
| main.min.css | 716,409 | 716,469 | +60 |

### Computed-style and geometry parity

Before and after snapshots used installed Playwright/Google Chrome with reduced motion at 1440 x 1000 and 390 x 844. They captured geometry plus display, position, dimensions, spacing, color/background/border, overflow/object-fit, flex alignment, opacity/visibility/transform and typography for 23 affected targets after activating a Home service tab.

- Desktop SHA-256 before/after: 28c6957f3498a1c5aa724bc1b72fe7a0504ce905cd102e913462cbec0eb11efa.
- Mobile SHA-256 before/after: 7f8a38ea17d55d0659d378fc6f3d926ea289219a6e0f404733c3cf2b18e2e61e.
- Desktop document metrics before/after: scrollWidth 1440, clientWidth 1440, body height 6633.
- Mobile document metrics before/after: scrollWidth 390, clientWidth 390, body height 10487.

### Exhaustive route and asset validation

The local validator covered 86 sitemap routes plus invalid category, invalid tag and generic invalid probes:

- Route/status/family/order/compatibility failures: 0.
- Unique local stylesheet URLs: 17.
- Local stylesheet HTTP failures: 0.

### Restricted browser smoke

The final smoke covered Home, About, standard Services, Blog listing and calculator Blog detail at both desktop and mobile, for 10 states. It exercised desktop off-canvas, mobile menu, Home hero pagination, Home service tabs, Home Blog card hover, Services panel and FAQ, Blog load-more and the article calculator.

Results:

- HTTP/status or bundle mapping failures: 0.
- Horizontal-overflow failures: 0.
- Console errors: 0.
- Page errors: 0.
- Failed resource responses: 0.
- Blog load-more hidden count: 6 to 1 on both viewports.
- Calculator value: 45,000,000 on both viewports.

No screenshots were taken because no regression or correction required documentation.

### Final checkpoint checks

    git diff --stat
    git diff --check
    git status --short

These must pass immediately before committing the Home checkpoint.

## Phase 3 About-family extraction validation

### Safety and ownership gate

The About gate passed on testing with a clean worktree and HEAD equal to origin/testing at a69a98d7737df2584361ee68ca3c94ba57bb0500. Deploy Virtuo Staging run 29661325264 succeeded before About editing began.

Rendered ownership across all 86 canonical routes proved the base about__img-wrap, about__content/about__content-bottom and virtuo-team groups are About-only. home-main-cta occurs on Home and About; about__area-four/image/content occurs on both; and eye rules combine About with Home/Contact. Those shared groups remained in core.

### Exact structural movement and correction

The first pass selected 36 complete rules / 4,057 bytes. Desktop property comparison detected that moving `.virtuo-team__container` caused its padding-left/right: 0 declarations to outrank a later shared site-content-gutter rule. The observed differences were container padding 80px to 0, grid width 990px to 1,150px and consequent team vertical geometry changes.

That 88-byte complete rule was restored to core at its original position and removed from about.css. The final movement is:

- Core normal rules: 4,557 to 4,522.
- About normal rules: 109 to 144.
- Rules moved: 35.
- Rules/keyframes deleted: 0.
- Selector/declaration/media rewrites: 0.

### Build and sizes

    npm run build:css

Result: passed with the unchanged remote import notice.

| Output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.min.css | 544,605 | 541,369 | -3,236 |
| about.min.css | 12,802 | 16,099 | +3,297 |
| About core + family | 557,407 | 557,468 | +61 |
| main.css | 839,918 | 839,983 | +65 |
| main.min.css | 716,469 | 716,530 | +61 |

### Computed-style and geometry parity

Snapshots at 1440 x 1000 and 390 x 844 captured 21 affected and deliberately shared selectors, including team grid placement/social hover and About intro/CTA/eye elements.

- Desktop SHA-256 before/after: adf0f24301c6fdb849c42f9385ebf809c918e516e170bacfce641c1c618be17d.
- Mobile SHA-256 before/after: 071f1e8b4e58e10d005ef3d3bfb4730054dcb03568edda1dbf34c13f5d8c3fb2.
- Desktop document metrics: 1440 / 1440 / 8606 before and after.
- Mobile document metrics: 390 / 390 / 12590 before and after.

The comparison used the committed pre-edit bundles through browser request interception, so the cascade correction was verified property-by-property without changing checkout files to reconstruct baseline state.

### Route and restricted browser results

- Canonical routes: 86; total probes: 89; route/status/family/order failures: 0.
- Local stylesheet URLs: 17; HTTP failures: 0.
- Browser states: 10 across About, Home, Contact, Services and Blog detail at desktop/mobile.
- Interactions: off-canvas/mobile menu, About intro CTA focus, team social hover, Home tab, Contact form focus, Services tab and Blog calculator.
- Horizontal overflow: 0 states.
- Console errors: 0; page errors: 0; failed resources: 0.

No screenshots were taken because the detected cascade difference was corrected and verified numerically without a remaining visual regression.

### Final checkpoint checks

    git diff --stat
    git diff --check
    git status --short

These must pass immediately before committing the About checkpoint.

The About checkpoint was committed as 1748b250814a2992c3d1e19c7c0e644ca9166f30, pushed only to origin/testing, and Deploy Virtuo Staging run 29661588401 succeeded before the Contact safety gate.

## Phase 3 Contact-family extraction validation

### Safety and ownership gate

The Contact gate passed on testing with a clean worktree and HEAD equal to origin/testing at 1748b250814a2992c3d1e19c7c0e644ca9166f30. Deploy Virtuo Staging run 29661588401 succeeded before Contact editing began.

Rendered ownership across all 86 canonical routes proved the active `.contact-page-form-section`, Contact Figma panel/detail/form-layout and `.contact-map` groups are Contact-only. The field-font rule combines Contact selectors with the global footer in one complete selector list, and the eye, form-feedback and phone-plugin states are shared or dynamic; all of those remained in core.

### Exact structural movement

- Core normal rules: 4,522 to 4,478.
- Contact normal rules: 101 to 145.
- Complete normal rules moved: 44.
- Rules/keyframes deleted: 0.
- Selector/declaration/media rewrites: 0.

The Contact Figma and responsive form-layout group accounts for 41 moved rules / 5,502 bytes. The map group accounts for 3 moved rules / 207 bytes. The exact removed core spans total 5,709 bytes; contact.css gained 5,710 bytes including one separation newline.

### Build and sizes

    npm run build:css

Result: passed with the unchanged CleanCSS notice that the remote intl-tel-input import was not inlined.

| Output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.min.css | 541,369 | 536,344 | -5,025 |
| contact.min.css | 13,516 | 18,541 | +5,025 |
| Contact core + family | 554,885 | 554,885 | 0 |
| main.css | 839,983 | 839,984 | +1 |
| main.min.css | 716,530 | 716,530 | 0 |

### Computed-style and geometry parity

Fresh before and after snapshots used installed Playwright/Google Chrome with reduced motion at 1440 x 1000 and 390 x 844. They captured 31 affected and deliberately shared targets: the Contact section/panel/grid/details, field/card/form/plugin wrappers, the retained footer field rule and the map/iframe.

- Desktop SHA-256 before/after: 2ac7ee0c6ad985fa9ea0ed1a1063814ee4cb361574fa3433fd75565baddbfd3c.
- Mobile SHA-256 before/after: a1fedd501a0a0186ceb27b14e3205e689c6ae625041c07e5073807a0543acfcb.
- Desktop document metrics before/after: scrollWidth 1,440 and height 5,255.
- Mobile document metrics before/after: scrollWidth 390 and height 7,058.
- Two consecutive pre-edit snapshots and two consecutive post-edit snapshots produced the same viewport hashes.

### Exhaustive route and asset validation

The local validator covered all 86 sitemap routes plus invalid category, invalid tag and generic invalid probes:

- Canonical routes: 86; total probes: 89.
- Family distribution: Home 1, About 1, Contact 1, Services 27, Blog listing 43, Blog details 11, Legal 2 and Error 3.
- Route/status/family/order/compatibility failures: 0.
- Unique local stylesheet URLs: 17; HTTP failures: 0.
- Active style attributes: 0; active style blocks: 0.

The CSS builder's root-relative URL and local-target validation also passed for every editable source.

### Restricted browser smoke

The final evidence covered Contact, Home, About, standard Services and the calculator Blog detail at desktop and mobile, for 10 states. It exercised:

- Desktop off-canvas and mobile navigation open/close.
- Contact detail hover, form focus, intl-tel-input country dropdown, FAQ expansion and map geometry.
- Home service-tab activation.
- About CTA focus and team-social hover.
- Services freezone-tab activation and FAQ expansion.
- Blog calculator input at 45,000,000, whose current display contract is `$45.00M`.

Results:

- HTTP/status or bundle mapping failures: 0.
- Horizontal-overflow failures: 0.
- Console errors: 0; page errors: 0.
- Failed CSS, image, script, font or iframe resources: 0.
- The first calculator assertion expected an obsolete comma-formatted label; inspecting its unchanged JavaScript established the current `$45.00M` contract, and the focused desktop/mobile rerun passed. This was a test-harness correction, not a product change.
- Google Analytics collect beacons aborted when isolated browser contexts closed; they were classified separately as out-of-scope telemetry and were not counted as asset failures.

No screenshots were taken because exact computed parity passed and no regression required documentation.

### Final checkpoint checks

    npm run build:css
    git diff --stat
    git diff --check
    git status --short

These must pass immediately before committing the Contact checkpoint.

The Contact checkpoint was committed as f26f858fc003744705a80f948f35f6abdda44682, pushed only to origin/testing, and Deploy Virtuo Staging run 29662209200 succeeded before the Services safety gate.

## Phase 3 Services-family extraction validation

### Safety and ownership gate

The Services gate passed on testing with a clean worktree and HEAD equal to origin/testing at f26f858fc003744705a80f948f35f6abdda44682. Deploy Virtuo Staging run 29662209200 succeeded before Services editing began.

The 86-route rendered-ownership evidence proved the active details/sidebar, FAQ, work/process, standard tab and Digital Marketing nested-tab groups are Services-only. Generic column/sidebar/form primitives, shared breadcrumb/marquee foundations and inactive Services template variants remain in core.

### Exact structural movement

- Core normal rules: 4,478 to 4,264.
- Services normal rules: 12 to 226.
- Complete normal rules moved: 214.
- Keyframe blocks moved: 2, the prefixed and standard dash_animation definitions.
- Rules/keyframes deleted: 0.
- Selector/declaration/media rewrites: 0.

The move preserved complete rules and media ownership. The automated selector gate accepted a rule only when every selector branch began with a proven Services-only class anchor, with a narrow exception for the Services-only work-line animation state.

### Build and sizes

    npm run build:css

Result: passed with the unchanged CleanCSS notice that the remote intl-tel-input import was not inlined.

| Output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.min.css | 536,344 | 500,128 | -36,216 |
| services.min.css | 853 | 37,069 | +36,216 |
| Services core + family | 537,197 | 537,197 | 0 |
| main.css | 839,984 | 839,932 | -52 |
| main.min.css | 716,530 | 716,530 | 0 |

### Computed-style and geometry parity

Installed Playwright/Google Chrome compared the committed pre-edit core/Services bundles with the current bundles in the same DOM. Both stylesheet pairs saw the same interaction state and the same animation/transition suppression. Below-fold lazy images were requested and decoded before the final mobile standard comparison.

- Standard desktop affected-target SHA-256 before/after: bfdf4d1db61bd4b9c8871e1d1a511a0ae384dbb369c4662272c9e4452906dbf6.
- Standard mobile full-body SHA-256 before/after: f88060dae905cd43872ec46e287ed118ff37fddebed920cec408b77a824777b8.
- Standard mobile document metrics before/after: 390px wide and 9,850px high; differing elements: 0.
- Digital Marketing desktop SHA-256 before/after: 42b9c543eb0c4eb0a534bd9680cf9ab8345541563a10cdee2d438e6b012b9fb0.
- Digital Marketing mobile SHA-256 before/after: bf59f107258fcec1740cd01d8aaf0728e1b0a485283db6d9cd67d0368fe245e2.

An earlier mobile standard height difference was isolated to an image decoding between the two captures. Traversing the page once and decoding requested images before both captures produced the exact full-body result above; no CSS correction was required.

### Exhaustive route and asset validation

- Canonical routes: 86; total probes: 89.
- Family distribution: Home 1, About 1, Contact 1, Services 27, Blog listing 43, Blog details 11, Legal 2 and Error 3.
- Route/status/family/order/compatibility failures: 0.
- Unique local stylesheet URLs: 17; HTTP failures: 0.
- Active style attributes: 0; active style blocks: 0 after HTML comments were removed.

### Restricted browser smoke

The final matrix covered standard Services, Digital Marketing Services, Home, Contact and the calculator Blog detail at desktop and mobile, for 10 states. It exercised desktop off-canvas/mobile navigation, freezone tab and FAQ expansion, Digital Marketing API sub-navigation plus URL/ARIA state, Home tabs, Contact form/phone country dropdown and Blog calculator input at 45,000,000 (`$45.00M`).

Results:

- HTTP/status or bundle mapping failures: 0.
- Horizontal-overflow failures: 0.
- Console errors: 0; page errors: 0.
- Failed application resource responses: 0.
- One external Google Maps document was aborted when the first Contact desktop context closed. A focused rerun explicitly waited for its load and passed with zero failed requests and zero bad responses, confirming context teardown timing rather than an application failure.

No screenshots were taken because exact computed parity passed and no regression required documentation.

### Final checkpoint checks

    npm run build:css
    git diff --stat
    git diff --check
    git status --short

These must pass immediately before committing the Services checkpoint.

The Services checkpoint was committed as 4382b8982a533bac3baecfc03ae9ffad65eb918e, pushed only to origin/testing, and Deploy Virtuo Staging run 29663231827 succeeded before the Blog-listing safety gate.

## Phase 3 Blog-listing-family extraction validation

### Safety and ownership gate

The Blog-listing gate passed on testing with a clean worktree and HEAD equal to origin/testing at 4382b8982a533bac3baecfc03ae9ffad65eb918e. Deploy Virtuo Staging run 29663231827 succeeded before Blog-listing editing began.

Rendered class ownership across the base listing, category and tag routes proved `.blog__post-item-five`, `.blog__post-thumb-five` and `.blog__post-content-five` are listing-exclusive. Shared metadata/sidebar/tag/recent-post groups and mixed Blog-listing/Blog-details responsive rules remain complete in core.

### Exact structural movement

- Core normal rules: 4,264 to 4,253.
- Blog-listing normal rules: 68 to 79.
- Complete normal rules moved: 11.
- Rules/keyframes deleted: 0.
- Selector/declaration/media rewrites: 0.

The move preserved the active card's base, hover and responsive rules without moving any inactive legacy variant or splitting a mixed selector list.

### Build and sizes

    npm run build:css

Result: passed with the unchanged CleanCSS notice that the remote intl-tel-input import was not inlined.

| Output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.min.css | 500,128 | 498,996 | -1,132 |
| blog-listing.min.css | 10,868 | 12,000 | +1,132 |
| Blog listing core + family | 510,996 | 510,996 | 0 |
| main.css | 839,932 | 839,934 | +2 |
| main.min.css | 716,530 | 716,530 | 0 |

### Computed-style and geometry parity

Installed Playwright/Google Chrome compared the committed pre-edit core/Blog-listing bundles with the current bundles in the same DOM. Both stylesheet pairs saw identical animation suppression, one load-more batch and a title-link hover.

- Desktop SHA-256 before/after: 58ac5905bbdefc2cb167c8f09ceb21c75e11a5f182a930b3ea48aa6ab9e791a1.
- Desktop document metrics before/after: 1,440px wide and 10,026px high.
- Mobile SHA-256 before/after: 142bab4d354ad81d8bfc8dac4b97272875f9ebfac875b82117fcaadafe007cf4.
- Mobile document metrics before/after: 390px wide and 11,525px high.
- Load-more state before/after interaction: 6 hidden cards to 1 at both viewports.
- Differing captured targets: 0 at both viewports.

### Exhaustive route and asset validation

- Canonical routes: 86; total probes: 89.
- Family distribution: Home 1, About 1, Contact 1, Services 27, Blog listing 43, Blog details 11, Legal 2 and Error 3.
- Route/status/family/order/compatibility failures: 0.
- Unique local stylesheet URLs: 17; HTTP failures: 0.
- Active style attributes: 0; active style blocks: 0 after HTML comments were removed.

### Restricted browser smoke

The corrected final evidence covered the base listing, a category, a tag, the interactive calculator Blog detail and Home at desktop and mobile, for 10 states. It exercised desktop off-canvas/mobile navigation, listing load more, category/tag filter-clear focus, card/title hover, the article calculator and Home service tabs.

Results:

- HTTP/status or bundle mapping failures: 0.
- Horizontal-overflow failures: 0.
- Console errors: 0; page errors: 0.
- Failed application resource responses: 0.
- The first category/tag checks used a strict locator that matched two intentional Clear links. The focused rerun selected the first explicit link and all four states passed; this was a harness correction only.

No screenshots were taken because exact computed parity passed and no regression required documentation.

### Final checkpoint checks

    npm run build:css
    git diff --stat
    git diff --check
    git status --short

These must pass immediately before committing the Blog-listing checkpoint.

The Blog-listing checkpoint was committed as 75418029bb60303588da404bc1d2db486a765891, pushed only to origin/testing, and Deploy Virtuo Staging run 29663519655 succeeded before the Blog-details safety gate.

## Phase 3 Blog-details-family extraction validation

### Safety and ownership gate

The Blog-details gate passed on testing with a clean worktree and HEAD equal to origin/testing at 75418029bb60303588da404bc1d2db486a765891. Deploy Virtuo Staging run 29663519655 succeeded before Blog-details editing began.

The rendered-token audit covered all 11 article routes. It selected only complete rules whose selector branches begin with proven detail/article anchors, while retaining shared listing/detail and broad generic rules in core.

### Exact structural movement

- Core normal rules: 4,253 to 3,950.
- Blog-details normal rules: 658 to 961.
- Complete normal rules moved: 303.
- Keyframe blocks moved: 1, `em-map-pulse`.
- Rules/keyframes deleted: 0.
- Selector/declaration/media rewrites: 0.

### Build and sizes

    npm run build:css

Result: passed with the unchanged CleanCSS notice that the remote intl-tel-input import was not inlined.

| Output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.min.css | 498,996 | 465,901 | -33,095 |
| blog-details.min.css | 109,467 | 142,589 | +33,122 |
| Blog details core + family | 608,463 | 608,490 | +27 |
| main.css | 839,934 | 839,964 | +30 |
| main.min.css | 716,530 | 716,557 | +27 |

### Computed-style and geometry parity

Installed Playwright/Google Chrome compared the committed pre-edit bundles with the current bundles in the same DOM at 1,440 x 1,000 and 390 x 844. Both stylesheet pairs saw identical motion suppression and route-specific interactions.

| Article state | Desktop SHA-256 | Mobile SHA-256 | Captured targets |
| --- | --- | --- | ---: |
| Standard structure chooser | a0e92ab34a75f487ca8d49adddb1532079d369d0532d3299faadb1397c399956 | d879d3330b784f28c066c92ce09ea97100419d4e80188d6755dbbabdf2d44e40 | 457 |
| Calculator and market selector | 7c7c5c444d9db02113f35b0d1199adfc9bc25809ae033b60d01912156573014a | e442aadae3092214bbe5a4ea573a1dc38cae53e2d7959b32e892de413ac1fb49 | 315 |
| Emirates interactive map | f6e001762f49be18e8b42cdc3981cea695f523b7a1bbf15bc86bee3c5ad3f7ff | 20c8a3d803100129bbad2345b5329bef6f350f8fa1f310ecdab3853446aebbd9 | 697 |
| AI article accordion | 9d2df1b5bcce7bc30ccc07f984aaa852ebf764b185eb329ea8354e375f3814c2 | ee31ebc388c0f9913dc7d83922a1e9aabdc3053ea7d7e03d1dd198be7603baa1 | 633 |

Every before/after hash and document geometry pair matched exactly; differing captured targets: 0 in all eight states.

### Exhaustive route and asset validation

- Canonical routes: 86; total probes: 89.
- Family distribution: Home 1, About 1, Contact 1, Services 27, Blog listing 43, Blog details 11, Legal 2 and Error 3.
- Route/status/family/order/compatibility failures: 0.
- Unique local stylesheet URLs: 17; HTTP failures: 0.
- Active style attributes: 0; active style blocks: 0 after HTML comments were removed.

### Restricted browser smoke

The corrected final evidence covered standard, calculator, Emirates and AI Blog details plus Blog listing at desktop and mobile, for 10 states. It exercised desktop off-canvas/mobile navigation, TOC or visible-link focus, calculator and market controls, Emirates selection, AI accordion and listing load more.

Results:

- HTTP/status or bundle mapping failures: 0.
- Horizontal-overflow failures: 0.
- Console errors: 0; page errors: 0.
- Failed application resource responses: 0.
- The standard article TOC is deliberately not visible in the mobile sidebar. Its focused rerun used a visible article link and passed; this corrected the harness without changing product code.

No screenshots were taken because exact computed parity passed and no regression required documentation.

### Final checkpoint checks

    npm run build:css
    git diff --stat
    git diff --check
    git status --short

These must pass immediately before committing the Blog-details checkpoint.

The Blog-details checkpoint was committed as b274be5445a629151c17fb93501d4f7589a61912, pushed only to origin/testing, and Deploy Virtuo Staging run 29663903620 succeeded before the Legal safety gate.

## Phase 3 Legal-family ownership-review validation

### Safety and ownership gate

The Legal gate passed on testing with a clean worktree and HEAD equal to origin/testing at b274be5445a629151c17fb93501d4f7589a61912. Deploy Virtuo Staging run 29663903620 succeeded before the review began.

Both Legal templates load the Legal family bundle and render without a body class. Their combined rendered-token set contains 153 tokens. Only `legal-content` is exclusive to Legal, and that token has no selector in core.css. No Legal-exclusive rendered token therefore identifies a movable core rule. Shared container, breadcrumb, typography, header and footer rules remained in core.

### Exact structural movement and sizes

- Normal rules/keyframes moved: 0.
- Rules/keyframes deleted: 0.
- Selector/declaration/media rewrites: 0.
- core.css: 552,449 bytes before and after.
- legal.css: 0 bytes before and after.
- core.min.css: 465,901 bytes before and after.
- legal.min.css: 50 bytes before and after.
- main.css: 839,964 bytes before and after.
- main.min.css: 716,557 bytes before and after.

Computed-style and geometry parity was not applicable because the review changed no CSS source, generated bundle, cascade order or loader behavior.

### Exhaustive route and asset validation

- Canonical routes: 86; total probes: 89.
- Family distribution: Home 1, About 1, Contact 1, Services 27, Blog listing 43, Blog details 11, Legal 2 and Error 3.
- Route/status/family/order/compatibility failures: 0.
- Unique local stylesheet URLs: 17; HTTP failures: 0.
- Active style attributes: 0; active style blocks: 0 after HTML comments were removed.

The first exhaustive validator invocation declared its mutable style counters with `const` and stopped locally with `TypeError: Assignment to constant variable`. Correcting those harness counters to `let` produced the clean result above; no product file or response caused the harness error.

### Restricted browser smoke

Installed Playwright/local Chrome covered `/privacy-policy` and `/terms-conditions` at 1,440 x 1,000 and 390 x 844, for four states. It exercised desktop off-canvas/mobile navigation and keyboard focus on visible Legal content links.

Results:

- HTTP/status or bundle mapping failures: 0.
- Horizontal-overflow failures: 0.
- Console errors: 0; page errors: 0.
- Failed application resource responses: 0.

No screenshots were taken because the review changed no CSS and no regression required documentation.

### Final checkpoint checks

    npm run build:css
    git diff --stat
    git diff --check
    git status --short

These must pass immediately before committing the Legal documentation checkpoint.

The Legal checkpoint was committed as 92b7b3f92ca83014fc5859b0b294121e5be99b88, pushed only to origin/testing, and Deploy Virtuo Staging run 29664073969 succeeded before the Error safety gate.

## Phase 3 Error-family ownership-review validation

### Safety and ownership gate

The Error gate passed on testing with a clean worktree and HEAD equal to origin/testing at 92b7b3f92ca83014fc5859b0b294121e5be99b88. Deploy Virtuo Staging run 29664073969 succeeded before the review began.

The rendered audit compared all 86 canonical routes with invalid category, invalid tag and generic invalid renders. Canonical routes contained 1,356 distinct class/id tokens; Error contained 174. Four tokens occurred only on Error: `error-area`, `error-content`, `error-wrap` and `tg-button-wrap`.

The first three have no core selector because their active rules already live in error.css. Core's sole match is `.tg-button-wrap`, the complete generic flex-layout rule under the shared Button component. Active PHP uses that helper only in error.php today, first-party JavaScript does not generate it, and the SCSS source retains it as a generic component primitive. Consistent with the Phase 1 Category A classification, current-route exclusivity alone was insufficient to reclassify this broad helper as Error-owned.

The first ownership-script invocation mixed CommonJS `require()` with top-level `await` under Node 24 and stopped with an ambiguous-module-format error. Wrapping the harness in an async CommonJS function produced the evidence above; no project file caused the harness error.

### Exact structural movement and sizes

- Normal rules/keyframes moved: 0.
- Rules/keyframes deleted: 0.
- Selector/declaration/media rewrites: 0.
- core.css: 552,449 bytes before and after.
- error.css: 1,186 bytes before and after.
- core.min.css: 465,901 bytes before and after.
- error.min.css: 943 bytes before and after.
- main.css: 839,964 bytes before and after.
- main.min.css: 716,557 bytes before and after.

Computed-style and geometry parity was not applicable because the review changed no CSS source, generated bundle, cascade order or loader behavior.

### Exhaustive route and asset validation

- Canonical routes: 86; total probes: 89.
- Family distribution: Home 1, About 1, Contact 1, Services 27, Blog listing 43, Blog details 11, Legal 2 and Error 3.
- Route/status/family/order/compatibility failures: 0.
- Unique local stylesheet URLs: 17; HTTP failures: 0.
- Active style attributes: 0; active style blocks: 0 after HTML comments were removed.

### Restricted browser smoke

Installed Playwright/local Chrome covered invalid category, invalid tag and generic invalid routes at 1,440 x 1,000 and 390 x 844, for six states. It exercised desktop off-canvas/mobile navigation, keyboard focus on the home CTA, the Error content layout and the generic button-wrap flex foundation.

Results:

- All six main documents returned the expected 404.
- HTTP/status or bundle mapping failures: 0.
- Horizontal-overflow failures: 0.
- Unexpected console errors: 0; page errors: 0.
- Failed application resource responses: 0.
- Chromium emitted one expected main-document `Failed to load resource` console diagnostic per state because the requested document correctly returned 404. The initial harness counted those required document diagnostics as failures; the corrected pass excluded only that exact expected diagnostic and continued to track every subresource response/request failure separately.
- One corrected rerun also fixed a local evidence-output variable name; it changed no test condition or product file.

No screenshots were taken because the review changed no CSS and no regression required documentation.

### Final checkpoint checks

    npm run build:css
    git diff --stat
    git diff --check
    git status --short

These must pass immediately before committing the Error documentation checkpoint.

The Error checkpoint was committed as ad9cb696e8c973fde2e19f8fad6b8f884215df81, pushed only to origin/testing, and Deploy Virtuo Staging run 29664258608 succeeded before the Phase 4 safety gate.

## Phase 4 Challenge/Strategic deletion validation

### Safety and evidence gate

The gate passed on testing with a clean worktree and HEAD equal to origin/testing at ad9cb696e8c973fde2e19f8fad6b8f884215df81. Deploy Virtuo Staging run 29664258608 succeeded before source editing began.

Fresh source searches found no active `challenge__` or `strategic__` reference outside core.css. First-party JavaScript does not query, generate or mutate either prefix. The exhaustive rendered check found zero candidate tokens across all 86 canonical and three invalid-route responses. Phase 2 interaction/Coverage evidence remained zero for all 9 Challenge and 6 Strategic candidate occurrences.

The exact current boundary contained 15 complete normal rules: nine Challenge and six Strategic, including four media-contained rules. It defined no keyframe, custom property or URL and contained no selector mixed with a retained component. The edit deleted the two adjacent named sections and preserved the following Pricing heading/rules.

### Build and size result

    npm run build:css

Result: passed with the unchanged CleanCSS notice that the remote intl-tel-input import was not inlined.

| Output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.css | 552,449 | 551,124 | -1,325 |
| core.min.css | 465,901 | 464,792 | -1,109 |
| main.css | 839,964 | 838,639 | -1,325 |
| main.min.css | 716,557 | 715,448 | -1,109 |

### Full computed-style and geometry parity

Installed Playwright/local Chrome replaced the current core link in place with a style element, preserving core-before-family order. In each same-DOM state it captured every rendered element's full computed-style property set, bounding rectangle and document geometry with the committed core bundle, then with the deletion bundle. Identical motion suppression applied to both states.

| Family state | Desktop SHA-256 | Mobile SHA-256 |
| --- | --- | --- |
| Home | 64bfe4c621fc6b658bc370104103d596c4145eeadaae1d0490294b233afdfad0 | d956770143330b3595cdc66f6dd15e6a35cd3cfe23dc0c682208b2743c724ddd |
| About | 80a40870c7fab731ec170e8d8467150215e08fbb24315f008584a5c73c86896f | 93ac6a3df300590ef3f9a509945229595bce63ba2713c38bcc1b0cf854f4f1d2 |
| Contact | 95ca19d5a173dae25be60917f6324c251389f3c983fc54fe5b810b5611effe21 | cf15d6c178a02d35eeabe78cbba0da4105ce2b514aa9f398cd8c546387d36577 |
| Digital Marketing Services | 59f52643ee8995c29675d1496d6645f924116449a0c2f0e1c493538a919cf5cd | a2ef6c2caab13721378f74d290c4836cf160b40b4b3059bf5a2e3235430b4072 |
| Blog listing | d0cc049bfb97d41044374e0d19bab3e6cb6a386504fb46d3ece924b6fdb63b41 | 7552b6b477fabe6b298b2f2ed6f28125d7db511fbc5607a2da08925fd08a2884 |
| Blog details | 2912695743d6d1d702c62b45617b0516839c4e2fd7c3a9cb87e71534329de853 | 3567a06ff6007373e1216cc9f7f8b2ea4e28ba6ad98c3ad18f39dc13db15d93a |
| Legal | 6e25570c595c87c7673d4b126d71ba7393d56a8fc6aad4b5e9c64f9cd504bd19 | b299635345b2678c148302c21952401d044c477a0e0f083769756b5e8351f16b |
| Error | 5548549e42eeb6d33c3d582dc4118012d31413fd7632f97b7f7df43cf0078482 | b39fd3e46ce9585cf5cae731e7e847c627a500687fbdd6f4722d7d3448b2bcf0 |

Before/after hashes and geometry matched in all 16 states. Captured element counts ranged from 655 to 3,107; candidate matches and differing hashes were zero.

The first inline comparison script contained a syntax typo. After correction it waited on `decode()` for intentionally lazy images outside the viewport, so that disposable run was stopped. The final comparison did not force lazy images and gave both bundle states the same rendered DOM and asset state; no product code was implicated.

### Exhaustive route and asset validation

- Canonical routes: 86; total probes: 89.
- Family distribution: Home 1, About 1, Contact 1, Services 27, Blog listing 43, Blog details 11, Legal 2 and Error 3.
- Route/status/family/order/compatibility failures: 0.
- Unique local stylesheet URLs: 17; HTTP failures: 0.
- Active style attributes: 0; active style blocks: 0 after HTML comments were removed.
- Rendered `challenge__`/`strategic__` matches: 0.

No screenshots were taken because exact full-style/geometry parity passed.

### Final checkpoint checks

    npm run build:css
    git diff --stat
    git diff --check
    git status --short

These must pass immediately before committing the Challenge/Strategic checkpoint.

The Challenge/Strategic checkpoint was committed as 8b68892f142a1e49ae53f133bf748559853c5938, pushed only to origin/testing, and Deploy Virtuo Staging run 29664620341 succeeded before the next Phase 4 gate.

## Phase 4 Benefit/Loan/Features deletion validation

### Safety, source and boundary gate

The gate passed on testing with a clean worktree and HEAD equal to origin/testing at 8b68892f142a1e49ae53f133bf748559853c5938. Deploy Virtuo Staging run 29664620341 succeeded before editing.

No active PHP, assets/css/src family source or first-party JavaScript owns `benefit__`, `loan__` or `features__`. The original non-built SCSS archive contains Features source, but package scripts build only assets/css/src through scripts/build-css.js. All 89 rendered responses contained zero candidate tokens. Phase 2 interaction/Coverage results were Benefit 0/26, Loan 0/19 and Features 0/39 candidate occurrences.

The current boundary audit resolved:

| Group | Normal rules | Media wrappers | Source bytes |
| --- | ---: | ---: | ---: |
| Benefit | 26 | 7 | 3,078 |
| Loan | 17 | 3 | 2,492 |
| Features | 37 | 9 | 4,780 |

The original three spans totaled 10,350 bytes including inter-section whitespace. The boundary-safe edit retained one separator at each mechanical removal, so the net core/source reduction is 10,347 bytes. No block contained a keyframe, URL or custom-property declaration. Every selector branch remained candidate-anchored, including Features descendants that name shared Services/client primitives.

### Build and size result

    npm run build:css

Result: passed with the unchanged remote intl-tel-input notice.

| Output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.css | 551,124 | 540,777 | -10,347 |
| core.min.css | 464,792 | 456,053 | -8,739 |
| main.css | 838,639 | 828,292 | -10,347 |
| main.min.css | 715,448 | 706,709 | -8,739 |

### Same-DOM style and geometry parity

Installed Playwright/local Chrome compared committed and deletion core bundles in place before the unchanged family bundle. It captured bounding rectangles, document geometry and a selected comprehensive set of layout, box, flex/grid, typography, color, background, border, transform, visibility and overflow properties for every element.

| Family state | Desktop SHA-256 | Mobile SHA-256 |
| --- | --- | --- |
| Home | 1e8877052eccb7aa3faab865ccbc89cd035cf585d1ae7b8012b34559bd902b84 | 322cdcadfd6288b0d56d58777dfc4d6e59c55c0768a243029ae8fcbb515d7f4b |
| About | 16b0db4a6c42c8c7894dfea78d3670c25626cdb5c5df7967f08b1cc83d362a54 | 02204e79222581245ffd7b21f7f87b35b775df8c52d857c75978052033631d5d |
| Contact | 8edfada637777522560853a322d0008cb42cbc1d1c196035349c97708f8b72fa | 51fb11934afa594c53541812c672a190270c70cc8ce1b9d6d7a02f021b4020dc |
| Digital Marketing Services | d025e95a1d8a2fe81eb5ee4906baeafd0a1b968f4a6c0469d6527d6e188809bd | 172e0f1c37bb599b2f1edcacd06b7fe6d5823d462d6f10bfe0219901d256e99e |
| Blog listing | 080d8da25f62ea7e7a94d0917cdd6b8559c830d8b6ecd5a302596aebf96cfc88 | ecaff4becbba73a721fed5aed62d15aabd0729a09d46a1cdb318296a6d037287 |
| Blog details | 57badbf1a4a5270da0941a3ebab3b46de951583cde2104c95d123bbc2cf99bb4 | f0ab87231b60229ee7d77a11ec820d66b7e4d340013f228f91efa306bc7cf2f8 |
| Legal | d7411793c6f90e61288de88f74a1d1c401bf672c680f2b7c5a38c6923b37330a | b73df1d5b844c2cc18164a13de89c404a61fd55602930e1e8bf3bda546e13cbc |
| Error | e0ec0cc42f5478c702f163c2f3670a1f6d1e67b8bdddc777a92fe38479d10fa8 | 1dd27b056866aaa0b2318b7eae04a62cff3cadf135f9acc0577a7f4070ca08f7 |

All 16 before/after hashes and geometry records matched exactly; 655–3,107 elements were captured and candidate matches were zero.

### Exhaustive route and asset validation

- Canonical routes: 86; total probes: 89; expected family distribution unchanged.
- Route/status/family/order/compatibility failures: 0.
- Final unique local stylesheet paths: 17; unique full URLs after mtime stabilization: 17; HTTP failures: 0.
- Active style attributes/blocks: 0; rendered candidate matches: 0.

The first pass counted 19 full URLs because bundle cache-buster mtimes changed during the traversal immediately after a rebuild. Path-level uniqueness was 17, and a stable rerun showed one URL per each of the 17 paths. This was an evidence-harness timing artifact, not duplicate page markup or requests.

No screenshots were taken because same-DOM hashes and geometry passed.

### Final checkpoint checks

    npm run build:css
    git diff --stat
    git diff --check
    git status --short

These must pass immediately before committing the Benefit/Loan/Features checkpoint.

The Benefit/Loan/Features checkpoint was committed as 68ef25a1a02ed3fe2ca7f4394bf51defe6996ec6, pushed only to origin/testing, and Deploy Virtuo Staging run 29664834471 succeeded before the next Phase 4 gate.

## Phase 4 dormant Preloader/Search deletion validation

The clean testing/remote gate passed at 68ef25a1a02ed3fe2ca7f4394bf51defe6996ec6 after staging run 29664834471 succeeded.

The current Preloader boundary contained six normal rules and the prefixed/standard `preloader` keyframes; no other editable CSS references that animation name. Header markup and its call remain commented, while the retained function is uncalled. The Search boundary contained exactly 15 approved popup/input/overlay rules. Its JavaScript binds absent opener/close/popup nodes; exhaustive DOM and interaction evidence remains zero. Neither boundary defined a URL or custom property.

| Output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.css | 540,777 | 535,651 | -5,126 |
| core.min.css | 456,053 | 451,717 | -4,336 |
| main.css | 828,292 | 823,166 | -5,126 |
| main.min.css | 706,709 | 702,373 | -4,336 |

`npm run build:css` passed with the known remote-import notice. Core keyframes changed 25 to 23.

Installed Playwright/local Chrome compared committed and deletion core bundles before the unchanged family bundle. Selected layout/box/flex/grid/typography/color/background/border/visibility properties plus every element rectangle and document geometry matched in Home, About, Contact, Digital Marketing Services, Blog listing, Blog details, Legal and Error at desktop/mobile. All 16 state hashes matched before/after; aggregate matrix SHA-256: `2ebefb75f01980397e229719eaa038f912c3124e1163f62a74649ac80bd37f1f`. Captured elements ranged 655–3,107; candidate matches/failures: 0.

All 89 probes retained expected status/family/order/no-compatibility behavior. All 17 stable local stylesheet paths and URLs returned 200; active inline styles and candidate DOM matches remained zero. One immediate traversal observed cache-buster variants during watcher regeneration, but path uniqueness stayed 17 and the stable rerun produced 17 full URLs.

No screenshots were taken because exact same-DOM parity passed.

Final checkpoint commands:

    npm run build:css
    git diff --stat
    git diff --check
    git status --short

The dormant shell checkpoint was committed as 5338f1fdce556b671d508db3acd54dfbda1e920f, pushed only to origin/testing, and staging run 29665032564 succeeded before the advisory gate.

## Phase 4 advisory-section deletion validation

The clean testing/remote gate passed at 5338f1fdce556b671d508db3acd54dfbda1e920f after staging run 29665032564.

Fresh active-source, JavaScript and 89-route DOM evidence requalified Callback, Core Value, Pricing and Career. Pricing handlers still bind absent nodes. The Career span also contains seven `.apply__box` rules outside the original `career__` token count; separate searches found only inactive SCSS source and no build/runtime/DOM owner, and same-DOM parity covered their deletion.

| Group | Normal rules | Media wrappers | Boundary bytes |
| --- | ---: | ---: | ---: |
| Callback | 43 | 15 | 4,701 |
| Core Value | 19 | 12 | 2,119 |
| Pricing | 27 | 2 | 3,313 |
| Career/apply box | 50 | 10 | 6,023 |

The exact spans total 16,156 bytes; retained separators make the net source reduction 16,152. Callback's scoped `--bs-gutter-x` is the sole custom-property declaration. No keyframe or URL was present.

| Output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.css | 535,651 | 519,499 | -16,152 |
| core.min.css | 451,717 | 438,152 | -13,565 |
| main.css | 823,166 | 807,014 | -16,152 |
| main.min.css | 702,373 | 688,808 | -13,565 |

`npm run build:css` passed. Installed Playwright/local Chrome produced identical selected-style/geometry hashes across all eight families at desktop/mobile. Aggregate matrix SHA-256: `407ff2a7774be57352f4d3b3af4bb7632aac832ccaeb67698be1d0e7587a157c`; states 16; elements 655–3,107; candidate matches/failures 0.

All 89 probes retained expected status/family/order/no-compatibility behavior; 17 local stylesheet paths/full URLs returned 200; inline styles and candidate DOM tokens were zero. No screenshots were required.

Final commands: `npm run build:css`, `git diff --stat`, `git diff --check`, and `git status --short`.

The advisory checkpoint was committed as 1d2ff25b33c59ba97174ca29a69ebaab2f5859d0, pushed only to origin/testing, and staging run 29665177543 succeeded before the commerce/account gate.

## Phase 4 commerce/account deletion validation

The clean testing/remote gate passed at 1d2ff25b33c59ba97174ca29a69ebaab2f5859d0 after staging run 29665177543.

Fresh active-source and runtime checks requalified the complete Shop, Login and Checkout spans. The only first-party JavaScript references are a guarded `.shop-active` initializer and handlers for absent `#coupon-element`, `.coupon__code-form`, `.cart-plus-minus` and `.qtybutton` nodes. The inactive SCSS archive is outside the active build. All 89 initial responses and all 16 parity states contained zero candidate nodes.

| Group | Normal rules | Media wrappers | Boundary bytes |
| --- | ---: | ---: | ---: |
| Shop/product | 150 | 15 | 24,032 |
| Login/account | 28 | 6 | 3,918 |
| Checkout/cart | 64 | 16 | 8,027 |

The exact spans total 35,977 bytes. They contain no keyframes, URLs or custom-property declarations. Generic-looking Shop/Checkout selectors were individually searched and remained confined to inactive archive source or absent markup.

| Output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.css | 519,499 | 483,522 | -35,977 |
| core.min.css | 438,152 | 407,845 | -30,307 |
| main.css | 807,014 | 771,037 | -35,977 |
| main.min.css | 688,808 | 658,501 | -30,307 |

`npm run build:css` passed. Installed Playwright/local Chrome swapped the committed and deletion core bundles in place before the unchanged family bundle. Comprehensive selected layout, box, flex/grid, typography, color, background, border, visibility and overflow properties plus every element rectangle and document geometry matched across all eight families at desktop/mobile. Aggregate matrix SHA-256: `fb9a1d78059f16e4f83c878ab27d0afe4ef33dba525e4ec098e66e4df324ecc5`; states 16; elements 698–3,151; candidate matches/failures/browser diagnostics 0.

The post-change validator passed all 86 canonical routes and three negative probes with expected status/family/order/no-compatibility behavior. All 17 local stylesheet paths and full URLs returned 200; active inline styles and candidate DOM tokens were zero. No screenshots were required because exact same-DOM parity passed.

Final commands: `npm run build:css`, `git diff --stat`, `git diff --check`, and `git status --short`.
The commerce/account checkpoint was committed as e3fa003b88b589495b63c6fdf3c79b84352f1f50, pushed only to origin/testing, and staging run 29665494285 succeeded before the presentation gate.

## Phase 4 legacy presentation deletion validation

The clean testing/remote gate passed at e3fa003b88b589495b63c6fdf3c79b84352f1f50 after staging run 29665494285.

Fresh source, runtime and all-route evidence requalified Brand, History, Counter, Video and most—but not all—of Banner. Home, About and Contact render four `.circle__wrap` instances. The 17 normal rules, seven media wrappers, reduced-motion rule and standard/prefixed `virtuo-circle-text-rotation` keyframes that own those instances were therefore retained at the Banner tail. All remaining Banner selectors, including `business-growth-box` and `happy__clients-wrap`, had no owner. Brand's guarded initializers return before creating Swipers when `.brand-active`/`.brand-active-two` are absent.

| Group | Normal rules | Media wrappers | Audited boundary bytes |
| --- | ---: | ---: | ---: |
| Banner inactive portion | 211 | 120 | 25,422 |
| Brand | 31 | 6 | 3,954 |
| History | 138 | 56 | 18,516 |
| Counter | 89 | 40 | 10,492 |
| Video | 75 | 37 | 10,285 |

The audited spans total 68,669 bytes; retaining one separator makes the net reduction 68,668. Two `url()` declarations for the same Banner-only mask were removed. No keyframe or custom property was deleted.

| Output | Before | After | Change |
| --- | ---: | ---: | ---: |
| core.css | 483,522 | 414,854 | -68,668 |
| core.min.css | 407,845 | 351,362 | -56,483 |
| main.css | 771,037 | 702,369 | -68,668 |
| main.min.css | 658,501 | 602,018 | -56,483 |

`npm run build:css` passed. Installed Playwright/local Chrome compared the committed and selective-deletion core bundles in place before the unchanged family bundle. Comprehensive selected computed styles, every element rectangle and document geometry matched across all eight families at desktop/mobile. Aggregate matrix SHA-256: `87688365f205caa20ee091efcf9f7d7f48290444540f3500b9bc667dd1465dcc`; states 16; elements 698–3,151; inactive candidate matches/failures/browser diagnostics 0; retained circle observations 8.

The post-change validator passed all 86 canonical routes and three negative probes with expected status/family/order/no-compatibility behavior. All 17 local stylesheet paths/full URLs returned 200; active inline styles and deleted candidate tokens were zero; four active circle instances remained. No screenshots were required because exact same-DOM parity passed.

Final commands: `npm run build:css`, deterministic double-build hash comparison, `git diff --stat`, `git diff --check`, and `git status --short`.
