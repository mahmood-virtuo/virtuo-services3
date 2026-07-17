# CSS Bundle Map

## Active template inventory

| Family | Templates | Body scope(s) | Intended page bundle |
|---|---|---|---|
| Home | `index.php` | `home-page` | `home.min.css` |
| About | `about.php` | `about-page` | `about.min.css` |
| Contact | `contact.php` | `contact-page` | `contact.min.css` |
| Services | `uae-business-formation.php`, `government-relations-pro-services.php`, `immigration-residency-solutions.php`, `digital-marketing-brand-development.php`, `ai-automation-technology-solutions.php` | `service-page` plus template-specific classes | `services.min.css` |
| Blog listing | `blog.php`, `blog-category.php`, `blog-tag.php` | `blog-page` | `blog-listing.min.css` |
| Blog details | `blog-details.php` through `blog-details11.php` | `blog-details-page`; detail 2/9/10/11 add subtype classes | `blog-details.min.css` |
| Legal | `privacy-policy.php`, `terms-conditions.php` | no family body class at baseline | `legal.min.css` |
| Error | `error.php` and the invalid-route include in `router.php` | no family body class at baseline | `error.min.css` |

Every active template above currently loads `assets/css/main.min.css` directly through `virtuo_asset_url()`. No additional active blog-detail template exists: `router.php` registers 11 slugs mapped one-to-one to `blog-details.php` through `blog-details11.php`.

## Active route evidence

- Root `/` maps to `index.php`.
- Extensionless PHP pages are resolved by `router.php`.
- Five canonical service routes map to the five service templates.
- Eleven canonical blog slugs map to the eleven blog-detail templates.
- `/blog/category/<valid-slug>` maps to `blog-category.php`.
- `/blog/tag/<valid-slug>` maps to `blog-tag.php`.
- Missing routes set HTTP 404 and include `error.php`.

Routing files were inspected only and will not be modified by this CSS split.

## Source ownership map

| Source | Ownership rule |
|---|---|
| `core.css` | foundations, theme variables, all shared components/utilities, and every ambiguous/mixed/unscoped rule |
| `pages/home.css` | rules conclusively scoped only to `body.home-page` |
| `pages/about.css` | rules conclusively scoped only to `body.about-page` |
| `pages/contact.css` | rules conclusively scoped only to `body.contact-page` |
| `pages/services.css` | rules conclusively scoped only to service body classes and shared by/used in the service family |
| `pages/blog-listing.css` | rules conclusively scoped only to `body.blog-page` |
| `pages/blog-details.css` | rules conclusively scoped only to blog-detail body classes |
| `pages/legal.css` | legal-only rules proven from both legal templates; uncertain shared typography stays in core |
| `pages/error.css` | error-only rules proven from `error.php`; uncertain breadcrumb/header/footer rules stay in core |

## Baseline CSS order and mixed/shared findings

`main.css` begins with theme variables, base typography, general helpers, preloader, scroll-top, section titles, animation/keyframes, search, and header. It then contains the original component sequence: banner, slider, brand, about, services, CTA, history, counter, video, project, team, FAQ, testimonial, blog, callback, marquee, choose, core value, work, shop, estimate, benefit, loan, features, challenge, strategic, pricing, career, contact, login, checkout, and footer. Later additions include shared mega-menu/footer/service/sidebar fixes and strongly family-scoped blocks.

Family body-scope occurrence inventory:

- `body.blog-details-page`: 842
- `body.about-page`: 146
- `body.blog-page`: 128
- `body.contact-page`: 109
- `body.home-page`: 84
- `body.blog-details2-page`: 78
- `body.service-page`: 4
- article subtype classes: one occurrence each for details 9, 10, and 11

The CSS also contains mixed selector lists and broadly named component rules. Those remain in core unless every selector in the complete rule can be assigned safely without declaration changes. Keyframes, custom properties, header/navigation, mega menu, mobile menu, footer, forms, phone-field foundations, CTA, breadcrumb foundations, marquees, scroll-top, service/sidebar primitives, and general responsive utilities remain core by default.

## Compatibility mapping

`assets/css/main.css` will be the generated unminified aggregate of core followed by every page source in manifest order. `assets/css/main.min.css` will remain its minified compatibility form for unclassified/inactive templates. Classified active templates will load `core.min.css` first and exactly one family bundle second.

The centralized manifest is `scripts/css-bundles.js`. Phase 1 output mapping is:

| Editable source | Generated output |
|---|---|
| `assets/css/src/core.css` | `assets/css/bundles/core.min.css` |
| `assets/css/src/pages/home.css` | `assets/css/bundles/home.min.css` |
| `assets/css/src/pages/about.css` | `assets/css/bundles/about.min.css` |
| `assets/css/src/pages/contact.css` | `assets/css/bundles/contact.min.css` |
| `assets/css/src/pages/services.css` | `assets/css/bundles/services.min.css` |
| `assets/css/src/pages/blog-listing.css` | `assets/css/bundles/blog-listing.min.css` |
| `assets/css/src/pages/blog-details.css` | `assets/css/bundles/blog-details.min.css` |
| `assets/css/src/pages/legal.css` | `assets/css/bundles/legal.min.css` |
| `assets/css/src/pages/error.css` | `assets/css/bundles/error.min.css` |

## Active migration status

| Template | Selected family | Delivery status |
|---|---|---|
| `index.php` | `home` | versioned core + home through `partials/main-styles.php` |
| `about.php` | `about` | versioned core + about through `partials/main-styles.php` |
| `contact.php` | `contact` | versioned core + contact through `partials/main-styles.php` |
| Five active service templates | `services` | versioned core + services through `partials/main-styles.php` |
| `blog.php`, `blog-category.php`, `blog-tag.php` | `blog-listing` | versioned core + blog-listing through `partials/main-styles.php` |
| `blog-details.php` through `blog-details11.php` | `blog-details` | versioned core + blog-details through `partials/main-styles.php` |

All other active templates still use compatibility `main.min.css` until their atomic family phase. The loader allowlist contains all eight planned family names, never reads request input, emits core before a valid family, de-duplicates links, and falls back to compatibility main for an absent or invalid family.
