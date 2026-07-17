# CSS Split Plan

Status: implementation and command-line validation complete on `testing`; restricted visual browser verification remains manual because the in-app browser runtime was unavailable.

## Objective

Replace the single active `assets/css/main.min.css` download with a conservative shared bundle plus one page-family bundle, while preserving the existing cascade, vendor stylesheet order, PHP routing, and `virtuo_asset_url()` filemtime cache busting.

## Safety boundaries

- Work only on branch `testing`; never switch, merge, commit, or push to `main`.
- Keep `assets/css/main.css` and `assets/css/main.min.css` as generated compatibility artifacts.
- Do not change routes, redirects, sitemap behavior, 404 status behavior, SEO, JavaScript behavior, or deployment configuration.
- Do not install dependencies or use CSS `@import` for local bundle composition.
- Keep ambiguous selectors and selectors used by multiple page families in `core.css`.
- Preserve declarations, specificity, query nesting, and relative order within every destination.

## Atomic phases

1. Baseline and inventory documentation.
2. Multi-bundle source/build/watch architecture with compatibility output equivalent to the baseline.
3. Home family: `index.php`.
4. About family: `about.php`.
5. Contact family: `contact.php`.
6. Services family: the five routed service templates.
7. Blog-listing family: `blog.php`, `blog-category.php`, and `blog-tag.php`.
8. Blog-details family: all 11 templates registered in `router.php`.
9. Legal family: `privacy-policy.php` and `terms-conditions.php`.
10. Error family: `error.php` and invalid-route rendering.
11. Final active-template, cascade, build-determinism, route, and size audit.

Each behavioral phase will be validated, documented, committed, and pushed to `origin/testing` before the next family begins. A failed phase will not be pushed.

## Classification method

The first extraction pass uses repository-proven family body scopes (`body.home-page`, `body.about-page`, `body.contact-page`, `body.service-page`, `body.blog-page`, and `body.blog-details-page`, including detail-template subtype body classes). A rule is moved only when every selector in that rule is conclusively owned by the same family. Mixed, unscoped, shared, JavaScript-dependent, and uncertain rules remain in core. Legal and error rules will only move when template evidence is conclusive.

## Target source and generated structure

Editable sources:

- `assets/css/src/core.css`
- `assets/css/src/pages/home.css`
- `assets/css/src/pages/about.css`
- `assets/css/src/pages/contact.css`
- `assets/css/src/pages/services.css`
- `assets/css/src/pages/blog-listing.css`
- `assets/css/src/pages/blog-details.css`
- `assets/css/src/pages/legal.css`
- `assets/css/src/pages/error.css`

Generated page delivery assets use matching names under `assets/css/bundles/*.min.css`. The build also generates the compatibility aggregate `assets/css/main.css` and `assets/css/main.min.css` in manifest order.

## Validation strategy

- Node syntax checks for CSS build/watch scripts and the unchanged JS builder.
- `npm run build:css`, run twice with SHA-256 comparison for determinism.
- Baseline normalized/unminified and minified compatibility comparisons during Phase 1.
- `php -l` for every modified PHP template/partial.
- `git diff --check`, `git diff --name-status`, and generated-file existence/size checks per phase.
- Local `curl` status, expected versioned stylesheet links, and CSS asset 200 checks.
- Restricted representative desktop/mobile browser smoke checks only where the phase requires them.
