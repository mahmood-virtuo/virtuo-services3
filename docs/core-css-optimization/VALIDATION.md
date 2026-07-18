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
