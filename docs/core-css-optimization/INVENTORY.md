# Core CSS Optimization Inventory

## Baseline identity

- Branch: testing
- Starting commit: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- origin/testing at baseline: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- Worktree at baseline: clean
- Date: 2026-07-19, Asia/Dubai

All byte counts are decoded filesystem bytes from the checked-in files after a successful deterministic baseline build.

## Editable CSS sizes and structural counts

| Editable source | Bytes | Lines | Rules | Selectors | Media queries | Keyframes | Imports |
| --- | ---: | ---: | ---: | ---: | ---: | ---: | ---: |
| assets/css/src/core.css | 658,214 | 30,407 | 4,643 | 5,065 | 1,213 | 30 | 1 |
| assets/css/src/pages/home.css | 13,080 | 513 | 83 | 98 | 13 | 0 | 0 |
| assets/css/src/pages/about.css | 15,046 | 656 | 109 | 154 | 13 | 0 | 0 |
| assets/css/src/pages/contact.css | 15,743 | 654 | 101 | 111 | 15 | 0 | 0 |
| assets/css/src/pages/services.css | 1,024 | 59 | 12 | 12 | 1 | 0 | 0 |
| assets/css/src/pages/blog-listing.css | 12,660 | 518 | 68 | 92 | 11 | 0 | 0 |
| assets/css/src/pages/blog-details.css | 122,887 | 4,438 | 658 | 890 | 50 | 0 | 0 |
| assets/css/src/pages/legal.css | 0 | 0 | 0 | 0 | 0 | 0 | 0 |
| assets/css/src/pages/error.css | 1,186 | 72 | 14 | 14 | 7 | 0 | 0 |

Family sources total 181,626 bytes. Core plus all family sources total 839,840 bytes, exactly matching the generated unminified compatibility aggregate.

The parser ignored comments and preserved media ancestry. Core contains 88 active custom-property declarations representing 70 unique names, zero font-face blocks, 30 keyframe blocks representing 18 logical names, and 27 unique media-query texts.

## Generated CSS sizes

| Output | Bytes | Core plus family | Saving versus main.min.css |
| --- | ---: | ---: | ---: |
| assets/css/bundles/core.min.css | 556,488 | — | — |
| assets/css/bundles/home.min.css | 11,472 | 567,960 | 148,449 bytes / 20.72% |
| assets/css/bundles/about.min.css | 12,802 | 569,290 | 147,119 bytes / 20.54% |
| assets/css/bundles/contact.min.css | 13,516 | 570,004 | 146,405 bytes / 20.44% |
| assets/css/bundles/services.min.css | 853 | 557,341 | 159,068 bytes / 22.20% |
| assets/css/bundles/blog-listing.min.css | 10,868 | 567,356 | 149,053 bytes / 20.81% |
| assets/css/bundles/blog-details.min.css | 109,467 | 665,955 | 50,454 bytes / 7.04% |
| assets/css/bundles/legal.min.css | 50 | 556,538 | 159,871 bytes / 22.32% |
| assets/css/bundles/error.min.css | 943 | 557,431 | 158,978 bytes / 22.19% |
| assets/css/main.css | 839,840 | compatibility only | — |
| assets/css/main.min.css | 716,409 | compatibility only | — |

All family minified bundles total 159,971 bytes. The gzip -9 diagnostic sizes are 77,649 bytes for core.css and 73,497 bytes for core.min.css. These are local diagnostics, not measured network transfer sizes.

## Major core sections

The original theme index and later first-party override layers remain in one file. Measured source bytes run from each heading to the next heading.

| Starting line | Logical section | Source bytes |
| ---: | --- | ---: |
| 46 | Theme default variables and base foundations | included in the pre-typography header |
| 103 | Typography | 3,019 |
| 348 | Bootstrap/container customization | 3,964 |
| 593 | Buttons | 7,337 |
| 894 | Preloader | 1,130 |
| 980 | Off-canvas | 5,498 |
| 1,226 | Breadcrumb | 3,063 |
| 1,364 | Scroll top | 1,351 |
| 1,434 | Section titles | 2,167 |
| 1,550 | Mobile menu | 10,349 |
| 1,972 | Keyframe animations | 7,816 |
| 2,299 | Search | 3,997 |
| 2,466 | Header | 38,485 |
| 4,073 | Banner | 28,466 |
| 5,542 | Slider | 23,883 |
| 6,660 | Brand | 3,954 |
| 6,852 | About | 37,934 |
| 8,707 | Services | 46,660 |
| 10,860 | CTA | 9,119 |
| 11,348 | History | 18,516 |
| 12,248 | Counter | 10,492 |
| 12,794 | Video | 10,285 |
| 13,327 | Project | 42,651 |
| 15,226 | Team | 25,356 |
| 16,471 | FAQ | 7,898 |
| 16,846 | Testimonial | 17,810 |
| 17,700 | Blog | 25,318 |
| 18,895 | Callback | 4,701 |
| 19,123 | Marquee | 3,427 |
| 19,282 | Choose | 9,976 |
| 19,790 | Core value | 2,119 |
| 19,904 | Work | 5,911 |
| 20,180 | Shop | 24,032 |
| 21,262 | Estimate | 4,965 |
| 21,505 | Benefit | 3,078 |
| 21,663 | Loan | 2,492 |
| 21,775 | Features | 4,780 |
| 21,992 | Challenge | 835 |
| 22,038 | Strategic | 490 |
| 22,067 | Pricing | 3,313 |
| 22,224 | Career | 6,023 |
| 22,514 | Contact | 11,368 |
| 23,007 | Login | 3,918 |
| 23,209 | Checkout | 8,027 |
| 23,602 | Footer plus later custom override layers | 158,122 |

The final measured range is not footer-only. It also contains successive mega-menu, About, marquee, service-tab, breadcrumb, contact, blog, responsive, shared component, and footer correction layers through the end of core.css. That mixed ownership is a primary Phase 1 classification target.

## Phase 1 ownership classification

Phase 1 classified complete logical groups using all 86 canonical rendered routes, an Error render, active PHP templates/partials, first-party JavaScript queries and class mutations, body-family scopes, responsive contexts, and plugin-generated state risks. Selector names alone were not treated as ownership evidence.

The classification unit is a complete logical rule group rather than a whole original heading. Some headings contain several categories and must be split only at complete rule boundaries in later phases.

| Current core range | Logical groups and evidence | Classification | Phase decision |
| --- | --- | --- | --- |
| 1–45 | License header and remote intl-tel-input import | E | Retain header; isolate import only in Phase 6. |
| 46–893 | Variables, typography, placeholders, common helpers, containers, Bootstrap adjustments, buttons | A | Retain in core. |
| 894–956 | Preloader | D candidate | Markup and invocation are commented out; require Phase 2 browser/interaction evidence before removal. |
| 957–1,971 | Background helpers, off-canvas, breadcrumb foundations, scroll top, section titles, mobile menu | A with E runtime states | Retain shared rules and dynamic menu/background states in core. |
| 1,972–2,298 | General keyframes and animation helper classes | E | Retain until animation-name and runtime-class dependency audit is complete. |
| 2,299–2,465 | Search popup | E / D candidate | Search states are toggled in main.js, but no initial rendered search class was found; retain pending interaction evidence. |
| 2,466–4,072 | Desktop/sticky header and navigation variants | A with E states | Active shared header uses tg-header__, tgmenu__, mobile, sticky and mega-menu states on all families. Retain active variants; legacy variants require Phase 2 proof. |
| 4,073–5,541 | Banner variants | D candidate | No banner__ class appeared in active rendered DOM or first-party runtime generation. Phase 2 must still check pseudo/responsive/plugin evidence. |
| 5,542–6,659 | Slider, hero animations and Swiper states | C and E | slider__ markup is used by Home and Blog details; slider marquee appears on seven families; Swiper states are plugin-owned. Classify variant-by-variant, never move the whole section. |
| 6,660–6,851 | Brand carousel | D candidate | No brand__ rendered class; main.js initializer requires Phase 2 review before removal. |
| 6,852–8,706 | About variants | B, C and D candidate | Active about__ groups occur on Home, About and Services. Assign exclusive variants to their family, shared Home/About variants to C, and unmatched legacy variants to Phase 2. |
| 8,707–10,859 | Service cards/details/sidebar variants | B, C, D candidate and E | Home owns active service cards; Services owns details/sidebar/tabs; service state changes are dynamic. Unmatched theme variants remain candidates only. |
| 10,860–11,347 | CTA variants | A and C | Shared footer/section CTA markup spans all families; some page variants are limited to Home/About. Retain shared primitives and classify scoped variants separately. |
| 11,348–12,247 | History variants | D candidate | No history__ rendered or runtime-generated match found. |
| 12,248–12,793 | Counter variants | D candidate | No counter__ rendered or runtime-generated match found. |
| 12,794–13,326 | Video variants | D candidate | No video__ rendered or runtime-generated match found. |
| 13,327–15,225 | Project variants | E / D candidate | No project__ DOM match, but main.js contains a project carousel initializer. Retain until Phase 2 proves the initializer has no applicable markup. |
| 15,226–16,470 | Team variants | B and D candidate | The active Virtuo team is About-only; unmatched theme team variants require Phase 2 evidence. |
| 16,471–16,845 | FAQ variants | B and E | Active FAQ markup is Services-only; accordion open/collapsed states are runtime and pseudo-state sensitive. |
| 16,846–17,699 | Testimonial variants | E / D candidate | No testimonial__ DOM match, but main.js contains testimonial initialization including an obsolete commented implementation. Retain until Phase 2. |
| 17,700–18,894 | Blog cards, sidebars, comments and detail helpers | B, C and E | Active groups span Home, Blog listing and Blog details. Sticky, load-more, TOC and interactive states remain E. |
| 18,895–19,122 | Callback variants | D candidate | No call__back rendered or runtime-generated match found. |
| 19,123–19,281 | Marquee variants | C and E | Shared across Home, About, Contact, Services, Blog listing, Blog details and Error; runtime wrappers/clones are plugin-owned. |
| 19,282–19,789 | Choose/eye variants | C | Active on Home, About and Contact; destination may use small family duplication after cascade review. |
| 19,790–19,903 | Core-value variants | D candidate | No core__value rendered or runtime-generated match found. |
| 19,904–20,179 | Work/process variants | B and E | Active Services-only process markup; animation activation and dashed-line states are runtime-sensitive. |
| 20,180–21,261 | Shop/product/cart variants | D candidate | No shop__ rendered or runtime-generated match found. |
| 21,262–21,504 | Estimate/form primitives | A and E | estimate__ footer form markup appears on every family; form and phone states are dynamic. |
| 21,505–21,991 | Benefit, loan and feature variants | D candidate | No corresponding active rendered or runtime-generated class match found. |
| 21,992–22,513 | Challenge, strategic, pricing and career variants | D candidate / E | No active DOM match; pricing has a main.js initializer and remains uncertain until Phase 2. |
| 22,514–23,006 | Contact layouts and AJAX response states | B, A and E | Contact-page layouts are B; shared form response success/error states are A/E and must remain available on footer/sidebar forms. |
| 23,007–23,601 | Login and checkout variants | D candidate | No active rendered or runtime-generated class match found. |
| 23,602–24,766 | Footer foundations and shared footer form | A and E | footer__ and estimate__ markup appears on every family; phone, AJAX and responsive states stay core. |
| 24,767–25,375 | Global gutters and mega-menu correction layers | A and E | Site gutters and mega menu are shared; is-active/mobile states are runtime-owned. |
| 25,376–25,580 | Choose, marquee and About-image corrections | C | Limited to Home/About/Contact, seven marquee families, or Home/About depending on the complete selector. |
| 25,581–26,854 | Service panels, footer responsive layers, nested Digital Marketing tabs and breadcrumbs | B, A and E | Service panel/tab rules are Services-owned; interleaved footer rules are A; panel/breadcrumb transition states are E. Move only complete proven service rules. |
| 26,855–27,272 | FAQ, Contact cards/map and shared sidebar form | B, C and E | FAQ is Services; Contact card/map is Contact; sidebar form primitives are shared by Services and Blog families; form states remain dynamic. |
| 27,273–28,668 | Breadcrumb corrections, Blog article systems, author/sidebar/sticky helpers | A, B, C and E | Breadcrumb foundations are shared; article systems are Blog-details-owned; author/sidebar rules cross Blog listing/details; sticky/interactive states are E. |
| 28,669–29,893 | Service gutter/work corrections, Home hero fix, Blog-detail helper systems, footer layout | A, B, C and E | Classify each named correction by its proven family; do not move the range wholesale. |
| 29,894–30,407 | Blog responsive layers, global breadcrumb/footer/container fixes, shared Built for Entrepreneurs/eye sections, Emirates map | A, B, C and E | Blog combined rules are C; blog-detail form/map rules are B/E; footer/container/breadcrumb rules are A; shared eye/built sections are C. |

### Category A — retained global core

Global ownership is proven for design tokens/base typography, common containers and gutters, active buttons, off-canvas, shared header/navigation/mobile menu/mega menu, breadcrumb foundations, scroll top, shared CTA primitives, shared footer, footer/estimate form primitives, shared phone overrides, shared response states, and cross-family accessibility/responsive foundations.

### Category B — family-exclusive extraction candidates

| Family | Proven logical groups currently remaining in core |
| --- | --- |
| Home | Active Home-only service-card/hero corrections and Home-only late overrides not mixed with another family. |
| About | Active About-only base/team/content variants not shared with Home or Services. |
| Contact | Contact card/map/layout groups and Contact-only late corrections; shared form feedback remains core. |
| Services | Service details/sidebar/process/FAQ and Digital Marketing tab/panel groups, excluding shared form/marquee/breadcrumb primitives. |
| Blog listing | Listing-only card/filter/load-more layout groups not mixed with Blog details. |
| Blog details | Article systems, detail-only TOC/interactive/map/form helpers, excluding listing/detail shared sidebars and author primitives. |
| Legal | No exclusive rule group proved in core; shared typography remains A. |
| Error | No additional exclusive group proved beyond the existing error.css extraction; broad breadcrumb/footer/marquee rules remain shared. |

Phase 3 must re-check every candidate at its exact selector/media context before moving it. Body-scoped mixed selector lists remain Category C unless they can be separated without cascade risk.

### Category C — limited-family shared groups

- Slider/hero primitives: Home and Blog details; Swiper state rules remain E.
- About image/content variants: Home and About, with isolated Services list variants handled separately.
- Marquee: seven families, excluding Legal at baseline.
- Choose/eye: Home, About and Contact.
- Blog cards/author/sidebar/responsive primitives: Home, Blog listing and Blog details, with smaller two-family subsets.
- Built for Entrepreneurs: Home and About.
- Shared sidebar consultation/form primitives: Services and Blog families.

Small stable duplication into the applicable existing family files is preferred only after exact bytes and cascade effects are measured. Otherwise these groups stay in core.

### Category D — legacy candidates requiring Phase 2 proof

The zero-rendered-match candidates are Preloader, Banner, Brand, History, Counter, Video, Callback, Core value, Shop, Benefit, Loan, Features, Challenge, Strategic, Career, Login and Checkout. Project, Testimonial, Pricing and Search remain E/D because first-party JavaScript references their states or initializers.

No Category D rule is deletion-approved in Phase 1.

### Category E — retained dynamic/generated/uncertain

The finalized Phase 1 allowlist is maintained in EXCEPTIONS.md. It covers Swiper, marquee, intl-tel-input, AOS/WOW, header/mobile/search states, mega menu, service tabs/breadcrumbs/API content, Blog load-more/sticky/TOC/interactives, forms, SVG injection, runtime backgrounds, animation helpers/keyframes, generic pseudo states and responsive-only states.

### Phase 1 rendered evidence summary

- Canonical routes inspected: 86 plus one Error render.
- Unique rendered class tokens by family: Home 267; About 243; Contact 217; Services 249; Blog listing 209; Blog details 618; Legal 153; Error 170.
- Shared components found on all eight families: off-canvas, header/navigation, mobile menu, scroll top, footer, footer estimate form and mega menu.
- No initial rendered prefix match: preloader, banner__, brand__, history__, counter__, video__, project__, testimonial__, call__back, core__value, shop__, benefit__, loan__, features__, challenge__, strategic__, pricing__, career__, contact__, login__, checkout__.
- JavaScript exceptions prevent treating Search, Project, Testimonial, Pricing and Contact/AJAX states as unused from that initial-render result alone.

## Duplicate-rule candidates

These are candidates, not approved edits. The syntax-aware scan included media ancestry and found:

- 758 selector texts that recur somewhere in core, mostly expected breakpoint/cascade overrides.
- 17 groups of exact selector-plus-declaration blocks repeated inside the same media context.
- 385 declaration bodies reused by different selectors in the same context. Many are intentional and must not be merged merely to reduce bytes.

Highest-confidence exact-block review candidates:

| Context | Selector | Copies and lines |
| --- | --- | --- |
| max-width 991px | .virtuo-services-mega__divider | 4 copies: 24,867; 24,940; 25,029; 25,112 |
| root | .service-tab-panel | 4 copies: 25,582; 26,038; 26,643; 26,816 |
| root | .service-tab-panel.is-active | 4 copies: 25,586; 26,042; 26,647; 26,820 |
| root | .service-tab-panel.digital-panel-changing | 3 copies: 26,505; 26,753; 26,828 |
| root | .service-tab-panel.digital-panel-ready | 3 copies: 26,513; 26,761; 26,836 |
| root | .fadeInUp2 | 2 copies: 2,148; 2,218 |
| root | Digital service list/item/open/arrow rule group | duplicate pairs across 26,162–26,442 |

Keyframe-name review candidates:

- fadeInUp2 is defined twice at lines 2,134 and 2,204.
- pulse-border standard and prefixed definitions are repeated at lines 2,184/2,194 and 2,279/2,289.
- digitalPanelFadeIn is defined three times at lines 26,521, 26,769, and 26,844.

Repeated declarations worth later measured review include the 311-byte linked-title underline block used by seven service/project/blog selectors; the 268-byte play-button pseudo-element block used by three selectors; and repeated slider animation blocks. Selector combination is permitted only if position, specificity, media context, and future ownership stay safe.

## Unused-rule candidates

A targeted first-party PHP/non-minified JavaScript prefix scan found no textual active-source reference for these legacy theme families:

- banner__, brand__, history__, counter__, video__, call__back, core__value
- shop__, benefit__, loan__, features__, challenge__, strategic__, career__
- login__ and checkout__

The same scan found project__, testimonial__, and pricing__ only in main.js, making them dynamic/uncertain rather than unused. contact__ appears in ajax-form.js. These results were candidate evidence only in Phase 1. Phase 2 completed the required rendered DOM, interaction, plugin-initializer and Chromium Coverage checks described below.

Large active or shared prefixes include header/menu, slider, about, services, CTA, team, FAQ, blog, marquee, choose, work, estimate, contact form, and footer. A whole family must not be removed when even one live variant remains.

## Phase 2 unused-CSS evidence disposition

Phase 2 remained evidence-only: no CSS rule was removed or moved. It combined the Phase 1 exhaustive initial-render scan of all 86 canonical routes plus Error with a restricted Chromium interaction/Coverage pass over 12 representative routes at 1440 x 1000 and 390 x 844.

The representative browser matrix covered Home, About, Contact, a standard service, a Digital Marketing query tab, Blog listing, Blog category, a standard Blog detail, a calculator Blog detail, an interactive Emirates Blog detail, Legal and Error. It exercised desktop off-canvas, mobile navigation, phone-country UI, Home slider and service tabs, service accordion and panel tabs, Digital Marketing dynamic navigation, Blog load-more, Blog TOC, calculator input, Emirates filtering, footer form focus and link hover states.

Chromium CSS Coverage aggregated 195 used ranges and 67,227 decoded characters, or 12.08% of the 556,477-character browser representation of core.min.css. Coverage is a candidate-specific signal rather than an instruction to delete the other 87.92%: only the groups below passed every applicable evidence gate.

| Candidate group | Active PHP/source evidence | Runtime/plugin evidence | DOM before/after interactions | Candidate token occurrences covered | Phase 2 disposition |
| --- | --- | --- | --- | ---: | --- |
| Preloader | Markup and invocation are commented | Dormant function only | 0 | 0 / 6 | Approved for a later small Phase 4 deletion checkpoint; commented source is handled separately in Phase 7. |
| Search popup | No popup or opener markup | Event handlers bind to absent elements | 0 | 0 / 15 | Approved for later Phase 4 deletion; active header/mobile states remain retained. |
| Banner | No active class reference | No generator/initializer | 0 | 0 / 197 | Approved for later Phase 4 deletion. |
| Brand | No active class reference | Guarded Swiper initializers return when markup is absent | 0 | 0 / 31 | Approved for later Phase 4 deletion. |
| History | No active class reference | No generator/initializer | 0 | 0 / 117 | Approved for later Phase 4 deletion. |
| Counter | No active class reference | No generator/initializer | 0 | 0 / 92 | Approved for later Phase 4 deletion. |
| Video | No active class reference | No generator/initializer | 0 | 0 / 65 | Approved for later Phase 4 deletion. |
| Project | No active PHP class reference | Guarded Swiper initializers return when markup is absent | 0 | 0 / 297 | Approved for later Phase 4 deletion. |
| Testimonial | No active PHP class reference | Guarded Swiper initializers return when markup is absent; alternate implementation is commented | 0 | 0 / 155 | Approved for later Phase 4 deletion. |
| Callback | No active class reference | No generator/initializer | 0 | 0 / 46 | Approved for later Phase 4 deletion. |
| Core value | No active class reference | No generator/initializer | 0 | 0 / 19 | Approved for later Phase 4 deletion. |
| Shop/product | No active PHP class reference | Guarded Swiper and absent-element coupon handlers | 0 | 0 / 144 | Approved for later Phase 4 deletion. |
| Benefit | No active class reference | No generator/initializer | 0 | 0 / 26 | Approved for later Phase 4 deletion. |
| Loan | No active class reference | No generator/initializer | 0 | 0 / 19 | Approved for later Phase 4 deletion. |
| Features | No active class reference | No generator/initializer | 0 | 0 / 39 | Approved for later Phase 4 deletion. |
| Challenge | No active class reference | No generator/initializer | 0 | 0 / 9 | Approved for later Phase 4 deletion. |
| Strategic | No active class reference | No generator/initializer | 0 | 0 / 6 | Approved for later Phase 4 deletion. |
| Pricing | No active PHP class reference | Event handlers bind to absent trigger/target elements | 0 | 0 / 30 | Approved for later Phase 4 deletion. |
| Career | No active class reference | No generator/initializer | 0 | 0 / 43 | Approved for later Phase 4 deletion. |
| Login | No active class reference | No generator/initializer | 0 | 0 / 19 | Approved for later Phase 4 deletion. |
| Checkout/cart | No active PHP class reference | Guarded shop initializer and absent-element coupon handler only | 0 | 0 / 32 | Approved for later Phase 4 deletion. |

The coverage token sets were deliberately candidate-specific: preloader, search popup, banner, brand, history, counter, video, project, testimonial, callback, core value, shop/related product, benefit, loan, features, challenge, strategic, pricing, career, login and checkout/cart. Generic tokens such as active, title, row, form-grp, swiper-slide and tab-btn were not used as deletion evidence because live components share them.

No group is to be removed wholesale merely from this table. Phase 4 must re-resolve exact current rule boundaries, related media rules, keyframes, custom properties and URLs immediately before each small deletion checkpoint.

## Phase 3 family extraction ledger

### Home

The Home checkpoint moved 86 complete normal rules and both hoverShine keyframe blocks from core.css to the beginning of home.css. Prepending the extracted rules preserves their order relative to the already-extracted Home override layer; selector text, declaration text/order and media contexts were unchanged.

| Home-exclusive logical group | Normal rules | Keyframe blocks | Source bytes moved |
| --- | ---: | ---: | ---: |
| White section-title modifier | 3 | 0 | 214 |
| hoverShine animation | 0 | 2 | 118 |
| Slider navigation and bar pagination | 18 | 0 | 2,864 |
| Home About mask | 6 | 0 | 858 |
| Home About decorative shape | 3 | 0 | 255 |
| Core Services item | 1 | 0 | 225 |
| Core Services tab layout and states | 19 | 0 | 3,094 |
| Core Services image | 2 | 0 | 171 |
| Core Services content | 7 | 0 | 1,012 |
| Shine helper | 3 | 0 | 833 |
| Home Blog area/item/thumb/date/content/tag/author primitives | 19 | 0 | 3,327 |
| Mobile Home hero containment/state fix | 5 | 0 | 1,050 |
| Total | 86 | 2 | 14,021 |

The exact removed core spans total 14,021 bytes. home.css gained 14,099 bytes because the moved content is separated for review and includes a 78-byte ownership heading plus spacing.

The following superficially Home-named groups were deliberately not moved:

- home-main-cta renders on both Home and About.
- virtuo-eye responsive rules combine Home with Contact and About selectors.
- slider area/content/background primitives render on Home and Blog details.
- about__area-four and about__img-four render on Home and About.

Their shared ownership remains Category C/A until a later safe duplication or shared-core decision.

### About

The About checkpoint moved 35 complete normal rules from core.css to the beginning of about.css:

| About-exclusive logical group | Normal rules moved | Source bytes moved |
| --- | ---: | ---: |
| Intro image wrapper and responsive shape positioning | 11 | 995 |
| Intro content and action row | 3 | 344 |
| Virtuo team layout, members, social links and breakpoints | 21 | 2,630 |
| Total | 35 | 3,969 |

The initial candidate contained 36 rules. Property-level before/after comparison proved that moving `.virtuo-team__container` changed desktop padding from 80px to 0 because it began to outrank a later shared site-content-gutter rule. That complete 88-byte rule remains in core at its original cascade position. The correction restored exact desktop/mobile computed-style and geometry hashes without rewriting any selector or declaration.

About source gained 4,034 bytes: the 3,969 moved bytes plus its ownership marker and spacing. Home/About CTA, shared about__area-four/image/content variants, mixed Home/About/Contact eye rules and shared breadcrumb/marquee rules remain in core.

### Contact

The Contact checkpoint moved 44 complete normal rules from core.css to the beginning of contact.css:

| Contact-exclusive logical group | Normal rules moved | Source bytes moved |
| --- | ---: | ---: |
| Contact Figma panel, details, form-card and responsive form layout | 41 | 5,502 |
| Contact map sizing, responsive height and iframe treatment | 3 | 207 |
| Total | 44 | 5,709 |

Contact source gained 5,710 bytes: the exact 5,709 moved bytes plus one separation newline. The mixed rule that assigns 15px form-field text to both `.contact-page-form-wrap` and `.footer__area-five` remains complete and unchanged in core. Shared Home/About/Contact eye rules, shared form primitives, intl-tel-input states and ajax-response success/error states also remain in core.

Moving the complete Contact-owned rules produced exact desktop/mobile computed-style and document-geometry parity. Unlike the earlier family checkpoints, CleanCSS produced no combined active-payload delta: core.min.css decreased by 5,025 bytes and contact.min.css increased by the same 5,025 bytes.

### Services

The Services checkpoint moved 214 complete normal rules plus the prefixed and standard `dash_animation` keyframes from core.css to the beginning of services.css. The ownership groups are:

- Active Services details thumb/content/inner-image, details-area/wrap and sidebar/category-list rules.
- Active Services FAQ area/wrap/shape rules.
- Active Services work/process item, icon, content, step, line-shape and dash-animation rules.
- Standard service panel/link and active-state rules.
- Digital Marketing main/sub-navigation, active/open/API transition states and responsive layers.
- Late Services-only workflow, gutter and mobile corrections.

The conservative selection required every selector branch in a complete rule to have a Services-only leading class anchor. No selector list was split. Generic `.col-70`/`.col-30`, shared sidebar widgets and forms, shared breadcrumb/marquee foundations, and inactive details/sidebar/FAQ/work variants remain in core.

Core source decreased 41,565 bytes while services.css gained 41,513 bytes. The 52-byte aggregate source decrease is blank-line normalization between previously scattered rule blocks, not declaration removal. The active minified Services payload is exactly unchanged: core.min.css decreased 36,216 bytes and services.min.css increased 36,216 bytes.

## Dynamic-selector risks and initial allowlist

The following selectors and state families must be retained until their runtime owner and applicable interactions are fully validated:

- Swiper: swiper, swiper-wrapper, swiper-slide, swiper-slide-active, swiper-pagination-bullet, swiper-button-disabled, and all generated swiper-* states.
- Marquee: marquee__*, js-marquee, js-marquee-wrapper, is-marquee-ready, and change-subs-duration.
- intl-tel-input: iti, iti__*, country/list/dropdown/flag/selected-country states, and phone validation presentation.
- Animation libraries: wow, animated, aos-init, aos-animate, and data-aos states.
- Header/menu/search: mobile-menu-visible, sticky-menu, search-opened, search-popup-overlay-open, open, active, menu-item-has-children, virtuo-mega-menu-trigger, and mega-menu is-active states.
- Service tabs and breadcrumb: is-active, is-open, is-hidden, digital-panel-changing, digital-panel-ready, service-tab-panel, service-tab-link, digital-service-* selectors, js-service-breadcrumb-* selectors, and API-injected content classes.
- Blog listing/detail: blog-load-hidden, is-active, is-visible, is-enhanced, active, open, in, dimmed, highlighted, hl, generated blog-toc__item--* classes, article vt-* states, map/region states, and sticky widget containers.
- Forms: ajax-response, success, error, loading/is-loading candidates, disabled submission states, and intl-tel-input validation states.
- SVG/runtime assets: injectable, injected SVG classes, data-inject-url, data-background, data-background-mobile, data-lazy-background, breadcrumb__bg, and hero/runtime background helpers.
- Sticky scripts: blog listing/detail slot and inner classes plus runtime position/size styles; absence of a toggled class does not make these selectors unused.
- All hover, focus, focus-visible, active, checked, open, sticky, loading, error, success, print, pseudo-element, and breakpoint-only states associated with live components.

First-party scripts explicitly add or toggle success, error, active, open, is-visible, blog-load-hidden, is-active, is-enhanced, mobile-menu-visible, active-animation, sticky-menu, search states, is-marquee-ready, digital-panel-changing, digital-panel-ready, and is-open. Third-party libraries add further runtime classes.

## Remote imports

core.css line 10 contains one remote import:

https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/css/intlTelInput.css

The import remains in generated core.min.css and main.min.css. The baseline build reports that CleanCSS skips remote import inlining, so the nested browser discovery chain remains. All 89 validated route probes render both the shared footer phone field and intlTelInput.min.js, which suggests explicit sitewide loading may remove serial discovery but may not reduce request count. Phase 6 must verify ordering, one-request maximum, flags/dropdown layout, and all phone states before changing it.

## CSS URL references

Comment-free core contains 13 url() occurrences and eight unique values:

- One remote intl-tel-input stylesheet URL.
- /assets/img/banner/mask_img.svg
- /assets/img/images/about_mask_img.svg
- /assets/img/project/project_mask_img.svg
- /assets/img/images/faq_mask_img.svg
- /assets/img/images/h5_choose_mask_img.svg
- /assets/img/images/virtuo-footer-gradient.webp
- /assets/img/services/footerBackgroundImage-1920x1105.webp

Five SVG masks occur in both prefixed and unprefixed declarations, giving 12 local core occurrences in total. In addition, home.css contains /assets/img/images/virtuo-footer-gradient-1920x908.webp and blog-details.css contains the fragment-only url(#emiratesMapGradient). Across all editable sources there are 15 active url() occurrences and 10 unique values. The CSS builder verified that every local root-relative target exists; the SVG fragment does not resolve to a filesystem asset.

## Commented-out first-party code inventory

This is a review inventory, not a deletion list. License headers, structural comments, third-party/vendor files, generated files, minified files, and excluded backup/font-package content are not candidates.

- Editable CSS: 66 code-shaped comment blocks were detected: 54 in core.css, 4 in about.css, 6 in blog-details.css, and 2 in home.css. They include disabled declarations, full disabled contact blocks, disabled media blocks, and old override experiments. Each must be inspected in Phase 7 because some may be documentation rather than dead code.
- main.js: disabled preloader call, disabled testimonial Swiper implementation, and disabled IntersectionObserver image assignment. The preloader function remains live source but is currently uncalled.
- virtuo-service-tabs-breadcrumb.js: seven commented statements/groups around superseded panel selection, hash replacement, and panel-update behavior.
- about.php: one disabled story wrapper and five disabled WhatsApp/SVG blocks.
- partials/header.php: eight disabled markup groups including the preloader, former social items, mega-menu prototypes, mobile submenu, and off-canvas image strip.
- partials/footer.php: one disabled tab navigation block and four disabled range-slider blocks.
- Blog detail templates: 16 disabled HTML groups across blog-details.php, blog-details2.php, blog-details3.php, blog-details6.php, blog-details7.php, and blog-details8.php.
- error.php: one disabled SVG image block and two commented breadcrumb assignments.
- Service content/templates: seven disabled content paragraphs across Digital Marketing partials, one sidebar form fragment, and 12 disabled icon fragments in uae-business-formation.php.

The automated scan produced 136 code-shaped comment candidates across 25 active first-party files, including the 66 CSS candidates. Phase 7 must inspect HTML comment boundaries and surrounding PHP control flow before removing any group; counts may decrease when explanatory/security/compatibility comments are excluded.

## Exhaustive active route-family map

The local sitemap contained 86 canonical URLs. All returned 200 and selected the family listed below.

### Home, About, Contact, Legal, and base listing

- Home: /
- About: /about
- Contact: /contact
- Blog listing: /blog
- Legal: /privacy-policy; /terms-conditions

### Services

Base routes:

- /uae-business-formation-structuring-and-compliance
- /government-relations-and-pro-services
- /immigration-and-residency-solutions
- /digital-marketing-and-brand-development
- /ai-automation-and-technology-solutions

The following 22 canonical Digital Marketing tab URLs all select Services and differ only by the tab query value:

- web-digital-solutions-website-design
- web-digital-solutions-website-development
- web-digital-solutions-ecommerce-solutions
- web-digital-solutions-landing-page-development
- web-digital-solutions-seo-performance-optimization
- web-digital-solutions-website-maintenance-support
- digital-marketing-brand-development-social-media-management
- social-media-content-plan-strategy
- social-media-content-creation
- social-media-community-management
- social-media-influencer-marketing
- digital-marketing-brand-development-brand-development
- brand-development-brand-identity-design
- brand-development-graphic-design
- brand-development-video-production-motion-graphics
- brand-development-marketing-collateral-design
- brand-development-creative-direction-concept-development
- digital-marketing-brand-development-marketing-solutions
- marketing-solutions-paid-advertising
- marketing-solutions-content-marketing
- marketing-solutions-brand-strategy-positioning
- marketing-solutions-analytics-performance-marketing

### Blog details

- /blog/mainland-free-zone-or-offshore-the-uae-structuring-decision-serious-us-founders-cannot-afford-to-get-wrong
- /blog/why-us-wireless-and-itad-operators-are-looking-at-the-uae
- /blog/beyond-company-formation-why-the-uae-is-becoming-a-strategic-business-base-in-2026
- /blog/the-uae-golden-visa-comparing-every-real-way-to-qualify
- /blog/freelance-visa-or-green-residence-the-independent-professionals-setup-decision
- /blog/why-americans-are-relocating-to-the-uae-in-2026
- /blog/uae-taxes-explained-2026-every-tax-who-pays-it-and-what-you-dont-owe
- /blog/ajman-free-zone-2026-cost-0-tax-and-the-10-billion-economy-behind-it
- /blog/starting-a-real-estate-brokerage-in-the-uae-why-the-numbers-beat-the-us-and-europe
- /blog/how-to-set-up-an-ai-company-in-a-uae-free-zone-2026-guide
- /blog/uae-not-equal-to-dubai-a-founders-map-of-the-7-emirates-2026

### Blog categories

- /blog/category/business-setup-structuring
- /blog/category/residency-immigration
- /blog/category/industry-trade-strategy
- /blog/category/uae-tax-compliance

### Blog tags

- ai-company; banking-readiness; business-setup; company-formation; compliance; corporate-tax
- cross-border-structuring; dafz; dubai-property; electronics-trade; entrepreneur-route; entrepreneur-visa
- family-sponsorship; free-zone; free-zone-qfzp; freelance-permit; freelance-visa; golden-visa
- green-residence; independent-professionals; jafza; mainland-company; offshore-company; property-investor
- real-estate-brokerage; rera; skilled-professional; us-founders; uae-business-base; uae-emirates
- uae-logistics; uae-residency; uae-strategy; uae-structuring; uae-tax; vat; virtual-work-visa; wireless-itad

All category and tag routes select Blog listing. Three additional negative probes—invalid category, invalid tag, and generic invalid route—returned 404 and selected Error.

## Loader and route baseline

- Sitemap routes: 86.
- Total route probes including three negative cases: 89.
- Family distribution: Home 1; About 1; Contact 1; Services 27; Blog listing 43; Blog details 11; Legal 2; Error probes 3.
- Every response contained vendor CSS, exactly one core.min.css, and exactly one expected family bundle in that order.
- No response contained main.css or main.min.css.
- All 17 unique local stylesheet URLs returned 200. One external Google Fonts stylesheet link was inventoried but not rebased or treated as a local asset.
- All rendered responses contained zero active style attributes and zero active style blocks after HTML comments were removed.
