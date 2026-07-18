# Inline Style Migration Plan

## Scope

Migrate safely removable, first-party static inline CSS from active PHP templates and shared partials into the existing split CSS sources. Preserve the current cascade, responsive behavior, runtime behavior, public URLs, content, and bundle-loading architecture.

The migration starts from commit `2785b8c6f568987c19d61de9c151bafe8067c716` on branch `testing`.

## Exclusions

- `_unused_pages_backup`, `node_modules`, vendor libraries, generated/minified assets as source, font-package helper/demo files, third-party plugins, and external assets.
- Runtime styles applied by first-party JavaScript for sliders, sticky widgets, data-driven fills, background initialization, tab visibility, and circular positioning.
- JSON-LD, analytics, SEO, canonical metadata, preload logic, forms, integrations, database behavior, routing, redirects, sitemap, robots, deployment configuration, and GitHub Actions.
- Intentional critical CSS, if any is discovered. The Phase 0 audit found no active first-party `<style>` blocks.
- Government Relations image paths containing spaces. These are a pre-existing unrelated issue at `government-relations-pro-services.php` lines 89, 108, and 113 and will not be changed.

## Page-family mapping

| Family | Active templates/partials | Editable destination |
| --- | --- | --- |
| Shared | `partials/header.php`, `partials/footer.php`, reusable shared components | `assets/css/src/core.css` |
| Home | `index.php` | `assets/css/src/pages/home.css` |
| About | `about.php` | `assets/css/src/pages/about.css` |
| Contact | `contact.php` | `assets/css/src/pages/contact.css` |
| Services | Five service templates, `partials/service-*.php`, `partials/services/digital-marketing/**` | `assets/css/src/pages/services.css` unless genuinely shared |
| Blog listing | `blog.php`, `blog-category.php`, `blog-tag.php`, active listing partials | `assets/css/src/pages/blog-listing.css` |
| Blog details | Active routed `blog-details*.php` templates and detail partials | `assets/css/src/pages/blog-details.css` |
| Legal | `privacy-policy.php`, `terms-conditions.php` | `assets/css/src/pages/legal.css` |
| Error | `error.php` and invalid-route rendering | `assets/css/src/pages/error.css` |

## Phases

0. Inventory active `style=` attributes, `<style>` blocks, JavaScript runtime style operations, loaded bundles, bundle sizes, and representative rendered HTML sizes.
1. Migrate shared partials and reusable components to `core.css`.
2. Migrate Home, About, and Contact independently to their family sources.
3. Migrate all five service pages and active service partials to `services.css`.
4. Audit and migrate the blog-listing family to `blog-listing.css`.
5. Migrate all active blog-detail templates to `blog-details.css`.
6. Audit and migrate Legal and Error pages to `legal.css` and `error.css`.
7. Repeat the complete audit, remove no justified exception merely to reduce the count, and record final size/validation results.

## Per-declaration method

1. Inspect existing selectors affecting the same property and relevant breakpoints.
2. Add or reuse a semantic class at the smallest page-family scope.
3. Use narrowly sufficient selector specificity to replace inline priority; do not add `!important` by default.
4. Preserve initial-state styles needed by JavaScript with explicit state/modifier classes when safe.
5. Rebuild generated bundles through `npm run build:css`; never treat generated bundles as the source of truth.
6. Validate and checkpoint only the current phase before continuing.

## Validation gates

Every phase must pass:

- `php -l` for every changed PHP file.
- `node --check` for every changed first-party JavaScript/build file.
- `npm run build:css`.
- Two CSS builds with identical SHA-256 hashes for all family bundles plus compatibility `main.css` and `main.min.css`.
- `git diff --check`, `git diff --stat`, and status review.
- Targeted route/status and bundle mapping checks through the existing local PHP server setup.
- Representative HTML and bundle-size comparison.
- Manual desktop/tablet/mobile verification for visual parity when command-line checks cannot prove layout behavior.

No phase proceeds after a failed gate. Browser automation is not part of the default validation; any visual checks that remain unproven are reported for manual testing.

## Checkpoint and staging policy

- Work and commits remain exclusively on `testing`.
- Use the requested phase-specific checkpoint messages.
- Push only validated checkpoints to `origin/testing`.
- Record the pushed SHA and staging workflow outcome before moving to the next phase.
- Never switch to, modify, commit on, push to, merge into, or deploy `main`.
- Never deploy or modify `virtuo.ae`; the only allowed automated deployment destination is the existing staging workflow for `https://staging.virtuo.ae`.

## Rollback strategy

Each phase is isolated in a recoverable checkpoint commit. If validation fails before a commit, correct only that phase's edits. If a validated checkpoint later regresses, revert that checkpoint with a new commit on `testing` after inspecting the exact affected files; do not use destructive repository-wide resets. Generated bundles can always be regenerated from the checked-in editable CSS sources.
