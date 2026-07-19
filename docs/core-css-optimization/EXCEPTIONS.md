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
- Generic `.col-70`/`.col-30`, shared sidebar widgets/forms, breadcrumb/marquee foundations and inactive Services details/sidebar/FAQ/work variants remain in core after the Services extraction. Their selector ownership is shared or not exercised by the active Services templates, so moving them would either change other families or outrun the available evidence.
- Services tab and Digital Marketing `is-active`, `is-open`, `digital-panel-changing` and `digital-panel-ready` rules now live in services.css because all active owners use the Services family bundle. They remain deletion-protected dynamic states.
- Phase 5 removed only earlier byte-identical Services state copies. The last normal/`!important` visibility, active animation, changing and ready definitions remain; non-identical durations and declarations were deliberately not consolidated.
- Phase 5 removed only earlier byte-identical Home and Blog-details copies. The final desktop Home service-card definitions, Blue Note marker definitions and US-relocation warning color remain in their original later cascade positions; non-identical neighboring overrides remain protected.
- Blog metadata, avatar, sidebar, tag, recent-post and sidebar-form rules remain in core after the Blog-listing extraction because Blog details shares them. Complete responsive selector lists combining `body.blog-page` and `body.blog-details-page` also remain unsplit in core.
- The active fifth-variant listing card rules now live in blog-listing.css. Other unrendered Blog card/layout variants are still Phase 4 deletion candidates, not evidence for broad Blog ownership.
- Active Blog detail content/inner/bottom/avatar, TOC, `vt-*`, calculator/founder and article-specific helper rules now live in blog-details.css. Their dynamic selected/open/active/reveal states remain deletion-protected.
- Shared Blog metadata, generic sidebar/search/category/tag/recent-post/form primitives and complete listing/detail responsive selector lists remain in core after the Blog-details extraction. Generic blockquote/comment rules remain core because their broad element/class ownership was not narrowed merely from current route presence.
- Legal has an empty source and uses shared core foundations. The Phase 3 rendered audit found one Legal-exclusive token, `legal-content`, but no matching core selector; therefore zero core rules were movable. No generic typography may be moved to legal.css without exclusive ownership evidence.
- Error has no body class, so error ownership must continue to rely on proven template-exclusive selectors rather than broad element selectors. Phase 3 found the generic `.tg-button-wrap` helper only on current Error renders, but retained it in core because its complete rule is owned by the shared Button component; the active Error-specific rules already live in error.css.

## Phase 2 narrowed legacy exceptions

- Pricing CSS passed its fresh gate and was deleted; its absent-node handler remains for Phase 7 review. Search-popup CSS was already deleted; active header/mobile/menu states remain allowlisted.
- Preloader CSS and its exclusive keyframes passed the fresh gate and were deleted. Commented markup and dormant-function cleanup remains a separate Phase 7 decision.
- contact__ is referenced by ajax-form.js even when an initial PHP prefix scan does not find it. Retain form feedback/error paths until interaction validation is complete.
- Challenge and Strategic passed the fresh Phase 4 boundary/dependency gate and were deleted together in the first unused-rule checkpoint. They no longer require retention exceptions.
- Benefit, Loan and Features passed the fresh Phase 4 boundary/dependency gate and were deleted together in the second unused-rule checkpoint. Their inactive SCSS archive was not edited because it is outside the active CSS build.
- Callback, Core Value, Pricing and Career/apply-box passed fresh gates and were deleted in the advisory checkpoint.
- Shop/product, Login/account and Checkout/cart passed fresh boundary, dependency, source/runtime, 89-route DOM and same-DOM parity gates and were deleted in the commerce/account checkpoint. Their absent-node JavaScript handlers remain for Phase 7 review.
- Brand, History, Counter, Video and the inactive Banner portion passed their fresh gates and were deleted in the presentation checkpoint. Banner's live `.circle__wrap` rules, reduced-motion rule and both `virtuo-circle-text-rotation` keyframe blocks remain because Home, About and Contact render four owners.
- Project and Testimonial passed the final Phase 4 source/runtime, guarded-initializer, complete-boundary, 89-route DOM and same-DOM parity gates and were deleted. Their absent-node initializers and commented alternate Testimonial implementation remain for Phase 7 review.
- Any new prefix with zero first-party text matches remains only a candidate until it independently passes the same data, plugin, pseudo-state, responsive, interaction and Coverage gates.

## Remote intl-tel-input import

Phase 6 replaced the version 25.3.1 import with one synchronous direct link immediately before core. Retain that URL, version, once-guard and ordering: all 89 routes render phone fields, and core contains the custom overrides. Do not make it asynchronous or move it after core without new flash/cascade evidence.

## Keyframes and custom properties

- Retain all 18 remaining core keyframe blocks until every animation/animation-name reference is audited in editable CSS, templates, injected styles, and first-party JavaScript.
- Earlier byte-identical `fadeInUp2`, standard/prefixed `pulse-border` and `digitalPanelFadeIn` blocks were removed in Phase 5 while the last identical definition of each name was retained. Any non-identical repeated name remains protected.
- Retain all 70 unique custom-property names until both CSS var() use and JavaScript setProperty/getPropertyValue references are checked.

## Comment exclusions

Phase 7 must retain:

- Copyright/license headers.
- Third-party/vendor comments and minified/generated comments.
- Source-map, lint, formatter, build, security, browser-compatibility, and tooling directives.
- Comments that explain non-obvious active runtime logic.
- Active TODO/FIXME notes that describe unresolved work.
- All comments under _unused_pages_backup, node_modules, vendor, generated bundles, minified assets, and font-package source.

Phase 7 removed 68 current CSS comments only after confirming they contained actual disabled declarations/rules and proving canonical/browser equivalence. Remaining JavaScript and PHP/HTML candidates still require manual context review. No candidate is deletion-approved merely because it resembles code.

Phase 7 also removed only JavaScript comments whose live replacements or absent `data-src` ownership were proven. The preloader disable/rollback note remains protected as deliberate runtime documentation; active guarded initializers and absent-node handlers remain outside this cleanup scope.

The shared PHP/HTML group removed only 41 line-isolated blocks with no embedded PHP plus two explicitly named inactive assignments. The preloader rollback block and the two PHP-generated service-panel boundary labels remain protected. Ordinary structural comments remain because they are navigation aids rather than disabled code.

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
