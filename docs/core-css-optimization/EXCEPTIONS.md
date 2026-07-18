# Core CSS Optimization Exceptions

This register starts in Phase 0. An entry means retain until stronger evidence proves a safe move or deletion; it does not mean the selector must remain in core forever.

Phase 2 status: the allowlist below was revalidated against all canonical rendered route families and the active first-party JavaScript sources. Restricted desktop/mobile DOM, interaction and Coverage evidence narrowed the legacy exceptions listed in the Phase 2 disposition section; all other dynamic/plugin groups remain retained.

## Dynamic and third-party selector allowlist

| Owner | Retained selectors/states | Reason |
| --- | --- | --- |
| Swiper | swiper-*, swiper-wrapper, swiper-slide, swiper-slide-active, swiper-pagination-bullet, swiper-button-disabled | Generated and changed by the slider library; inactive states and breakpoints are not reliably present in static markup. |
| jQuery Marquee | js-marquee, js-marquee-wrapper, marquee__*, is-marquee-ready, change-subs-duration | Wrappers/clones and ready states are created at runtime. |
| intl-tel-input | iti, iti__*, country/list/dropdown/flag/selected-country/validation states | The phone library generates markup and state classes around every shared footer phone input. |
| AOS/WOW | aos-init, aos-animate, wow, animated, data-aos states | Third-party animation libraries add/remove these at runtime. |
| Header/mobile | mobile-menu-visible, sticky-menu, open, active, menu-item-has-children, virtuo-mega-menu-trigger, mega-menu is-active | main.js and virtuo-mega-menu.js create/toggle these interaction states. Search-popup-only states were narrowed separately by Phase 2 evidence. |
| Service tabs | is-active, is-open, digital-panel-changing, digital-panel-ready, service-tab-*, digital-service-*, data-service-*, data-digital-service-* | First-party JavaScript changes panels, tabs, nested tabs, content, and API-injected markup. |
| Service breadcrumbs | is-hidden, js-service-breadcrumb-* | Initial PHP state and runtime breadcrumb updates both use these classes. |
| Blog listing | blog-load-hidden, listing sticky slot/inner classes, load-more button/sentinel/data attributes | Load-more and sticky behavior depends on runtime visibility and measured geometry. |
| Blog details | is-active, is-visible, is-enhanced, active, open, in, dimmed, highlighted, hl, vt-*, generated blog-toc__item--*, map/region/data selector states | Several article-specific scripts inject or toggle these classes and sometimes generate markup. |
| Forms | ajax-response, success, error, loading/is-loading/disabled candidates, intl-tel-input validation states | Submission and validation states occur only after interaction and error paths. |
| SVG/background runtime | injectable, injected SVG classes, data-inject-url, data-background, data-background-mobile, data-lazy-background, breadcrumb__bg | Plugins or first-party scripts replace SVG/image/background content dynamically. |
| Sticky widgets | blog listing/detail slot/inner/layout selectors and runtime position/size styles | Scripts set continuous measured geometry without necessarily toggling a dedicated class. |

Additional first-party runtime classes observed during Phase 1 include active-animation, active-height, selected/seleceted legacy state spelling, fa-times, title-two, vt-ptitle, reveal, vt-reveal and article-specific generated state combinations. Generic class names must be associated with their component and JavaScript owner before any matching rule is removed.

## Generic CSS states

Retain associated hover, focus, focus-visible, active, checked, disabled, target, open, sticky, loading, success, error, print, pseudo-element, and responsive-only rules for every live component. Static source absence at one viewport or initial render does not prove these states unused.

## Mixed/shared rules

- Mixed selector lists that span families remain in core until they can be split without declaration, specificity, or cascade change.
- Header, navigation, mobile menu, off-canvas, footer, shared forms, phone fields, common CTA, breadcrumb, marquee, scroll-top, and reusable service/sidebar primitives remain core by default.
- The section beginning with the Footer heading at core.css line 23,602 contains footer plus later cross-family override layers. It must be classified rule-by-rule, not moved as one section.
- The complete rule assigning `font-size: 15px` to both Contact form fields and `.footer__area-five` form fields remains in core. Splitting that selector list solely to force family ownership would rewrite a mixed shared rule without reducing the rendered Contact payload.
- Shared Home/About/Contact eye rules and shared form, ajax-response and intl-tel-input state rules remain in core after the Contact extraction.
- Legal has an empty source and uses shared core foundations. No generic typography may be moved to legal.css without exclusive ownership evidence.
- Error has no body class, so error ownership must continue to rely on proven template-exclusive selectors rather than broad element selectors.

## Phase 2 narrowed legacy exceptions

- project__, testimonial__, brand__ and shop__ have no active PHP match. Their main.js Swiper calls all use virtuoInitSwiper(), which returns before initialization when the requested selector is absent. The exhaustive rendered scan, restricted interaction scan and candidate Coverage all found no applicable markup or used candidate token; their CSS is approved for later Phase 4 boundary-safe deletion.
- pricing__ and search-popup-only selectors have event handlers but no active trigger or target markup. The same DOM/interaction/Coverage gates found zero applicable markup and zero covered candidate tokens, so their CSS is approved for later Phase 4 boundary-safe deletion. Active header/mobile/menu states remain allowlisted.
- Preloader markup and invocation are commented. Its dormant function found no runtime element, and its candidate selectors had zero Coverage; its CSS is approved for later Phase 4 deletion. Commented markup/function cleanup remains a separate Phase 7 decision.
- contact__ is referenced by ajax-form.js even when an initial PHP prefix scan does not find it. Retain form feedback/error paths until interaction validation is complete.
- Banner, History, Counter, Video, Callback, Core value, Benefit, Loan, Features, Challenge, Strategic, Career, Login and Checkout have no active source/runtime owner, no DOM match across the exhaustive initial scan or representative interactions, and zero covered candidate tokens. They are approved for later Phase 4 boundary-safe deletion.
- Any new prefix with zero first-party text matches remains only a candidate until it independently passes the same data, plugin, pseudo-state, responsive, interaction and Coverage gates.

## Remote intl-tel-input import

Retain the current version 25.3.1 import until Phase 6 proves an explicit load can preserve order and every phone field. All 89 Phase 0 route probes render a footer phone field and the JavaScript library, so conditional route loading is not expected to reduce the request count on current active routes. Removing nested discovery may still improve the critical chain.

## Keyframes and custom properties

- Retain all 30 keyframe blocks until every animation/animation-name reference is audited in editable CSS, templates, injected styles, and first-party JavaScript.
- Duplicate names fadeInUp2, pulse-border, and digitalPanelFadeIn are candidates, not approved removals; later definitions may intentionally override earlier definitions.
- Retain all 70 unique custom-property names until both CSS var() use and JavaScript setProperty/getPropertyValue references are checked.

## Comment exclusions

Phase 7 must retain:

- Copyright/license headers.
- Third-party/vendor comments and minified/generated comments.
- Source-map, lint, formatter, build, security, browser-compatibility, and tooling directives.
- Comments that explain non-obvious active runtime logic.
- Active TODO/FIXME notes that describe unresolved work.
- All comments under _unused_pages_backup, node_modules, vendor, generated bundles, minified assets, and font-package source.

The 136 code-shaped Phase 0 comment candidates require manual context review. No candidate is deletion-approved merely because it resembles code.

## Phase 2 evidence closure

- Browser DOM matching and interaction-state Coverage are now complete for the approved legacy candidates at representative desktop and mobile viewports.
- The 86-route initial DOM scan plus Error remains the exhaustive route-presence evidence; the 24-state browser matrix supplies interaction, plugin and responsive evidence.
- No production browser observation was used. Evidence came from the tested local checkout at the exact testing-branch checkpoint.
- Computed-style parity remains required after actual extraction/deletion checkpoints; Phase 2 itself changed no CSS.

## Phase 1 limited-family exceptions

- Slider rules cannot be assigned to Home wholesale because Blog details also renders slider__ hero markup and seven families render slider marquee helpers.
- About rules cannot be assigned wholesale because active variants occur on Home, About and Services.
- Service rules cannot be assigned wholesale because Home uses service cards while Services uses details/sidebar/tab variants.
- CTA, estimate/form and footer rules remain core because shared partials render them across all families.
- Blog rules include Home cards, Blog listing, Blog details and listing/detail shared sidebar/author/responsive primitives.
- Marquee rules remain limited-shared because every family except Legal renders the service marquee at baseline.
- Choose/eye rules remain limited-shared across Home, About and Contact.
- Legal has no proven exclusive core group; Error has no additional safe broad extraction group.
