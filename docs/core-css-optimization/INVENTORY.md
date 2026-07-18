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

The same scan found project__, testimonial__, and pricing__ only in main.js, making them dynamic/uncertain rather than unused. contact__ appears in ajax-form.js. These results are candidate evidence only: comments, PHP generation, plugin output, generic selector parts, pseudo states, breakpoints, and browser DOM/Coverage still must be checked before deletion.

Large active or shared prefixes include header/menu, slider, about, services, CTA, team, FAQ, blog, marquee, choose, work, estimate, contact form, and footer. A whole family must not be removed when even one live variant remains.

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
