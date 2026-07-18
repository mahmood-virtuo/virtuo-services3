# Inline Style Migration Exceptions

This register covers style mutations that the static-template migration intentionally retains. Line numbers are the Phase 0 baseline and may move as nearby markup changes; the identifying behavior remains authoritative.

## Runtime-generated first-party styles (Category E)

| File and identifying lines | Behavior | Exact reason retained |
| --- | --- | --- |
| `partials/scripts.php:71` | Sets each circular-text span's rotation from its computed character index. | The transform is a runtime-calculated continuous value; static classes would be brittle and add one class per character position. |
| `assets/js/virtuo-performance.js:23` | Applies a `backgroundImage` from an element's data attribute. | Data-driven lazy/background initialization must retain runtime URL assignment. |
| `assets/js/main.js:146,151` | jQuery applies data-driven background image and background color values. | Existing first-party runtime initialization; changing it is outside static template migration and could affect many components. |
| `assets/js/virtuo-service-tabs-breadcrumb.js:53-58` | Shows/hides the dynamic sub-breadcrumb label and separator. | Visibility changes with the selected service tab at runtime. |
| `assets/js/virtuo-service-tabs-breadcrumb.js:188,356` | Shows the active service panel and hides inactive panels. | Core tab functionality depends on runtime active-state presentation; retain during static migration. |
| `assets/js/blog-details.js:76` | Calculates range-fill left/width percentages from `data-low` and `data-high`. | Values are article data and are calculated at runtime. |
| `assets/js/blog-details.js:350` | Sets `--tax-rate-width` from `data-pct`. | This is a genuinely dynamic custom property used for a data-driven tax-rate visualization. |
| `blog-details4.php:364` | Calculates range-fill left/width percentages for the article interactive. | Inline first-party JavaScript produces continuous data-dependent values; it is not static template CSS. |
| `blog-details5.php:362` | Calculates range-fill left/width percentages for the article interactive. | Inline first-party JavaScript produces continuous data-dependent values; it is not static template CSS. |
| `assets/js/virtuo-blog-interactives.js:217,244-245` | Sets interactive fill widths/positions from selected values and data attributes. | Values change with user interaction and cannot be represented by one static declaration. |
| `assets/js/blog-sticky-form.js:13-72` | Clears and assigns position, dimensions, z-index, transform, and slot height for a sticky form. | Viewport/element geometry is measured continuously; replacing this with static CSS would break sticky boundaries. |
| `assets/js/blog-detail-sticky-widgets.js:35-87` | Clears and assigns measured sticky-widget slot/inner geometry. | Runtime dimensions and offsets depend on layout and scroll position. |
| `assets/js/blog-sticky-widgets.js:73-178` | Clears and assigns measured listing-widget geometry, overflow, height, position, and stacking. | Runtime dimensions and offsets depend on content, layout, and scroll position. |

The Phase 0 search found 105 individual runtime style operations across these 11 files. They are intentionally retained unless a later static migration exposes a direct, minimal reason to alter an initial state.

## PHP-generated finite/static values (Category C; migration candidates)

These are not final exceptions. They are recorded here until Phase 3 replaces them safely:

| File and element | Current behavior | Planned treatment |
| --- | --- | --- |
| `partials/service-marquee.php:28`, marquee SVG | Outputs a constant CSS declaration string through PHP. | Replace with a semantic SVG class in `services.css` (or `core.css` only if confirmed genuinely cross-family). |
| `partials/service-breadcrumb.php:42`, sub-separator | Emits either no style or `display: none` from a finite initial state. | Replace with an allowlisted hidden-state modifier class while retaining JavaScript tab updates. |
| `partials/service-breadcrumb.php:46`, sub-label | Emits either no style or `display: none` from a finite initial state. | Replace with an allowlisted hidden-state modifier class while retaining JavaScript tab updates. |

## Third-party/inactive exclusions (Categories F and H)

- Font-package helper/demo PHP under `assets/fonts/**` contains 12 `style` attributes and 2 `<style>` tokens. These files are third-party/inactive package artifacts, not active Virtuo templates, and will not be modified.
- `about.php` baseline lines 321-390 contains five commented-out WhatsApp anchor/SVG pairs with 10 `style` attributes. They are inactive HTML comments, do not create DOM nodes, and are left untouched to avoid changing unrelated dormant code.
- `blog-details8.php` baseline lines 292-313 contains a commented-out cost-box prototype with four static fill-width attributes. It is inactive HTML-comment markup and will be left untouched.
- `_unused_pages_backup`, `node_modules`, vendor libraries, generated/minified CSS/JavaScript, and plugin sources are excluded from the migration and counts.

## Critical CSS (Category G)

No active first-party inline `<style>` block was found in Phase 0, so there is no intentional critical-CSS exception at baseline.
