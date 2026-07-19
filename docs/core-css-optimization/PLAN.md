# Core CSS Optimization Plan

## Starting point

- Branch: testing
- Starting commit: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- Starting remote-tracking commit: origin/testing at 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- Starting worktree: clean
- Baseline date: 2026-07-19, Asia/Dubai

## Objectives

1. Reduce assets/css/src/core.css and assets/css/bundles/core.min.css materially.
2. Move proven page-family-owned rules into the existing family sources without changing selectors, declarations, specificity, media conditions, or dependency order.
3. Remove only selectors, declarations, keyframes, and custom properties that meet the complete unused-CSS evidence standard.
4. Consolidate genuinely duplicate CSS only when cascade and media context are equivalent.
5. Remove the nested remote intl-tel-input import from the core critical chain if explicit loading can preserve all phone fields and stylesheet order.
6. Remove dead commented-out first-party code in a separate, late checkpoint.
7. Preserve routing, SEO, accessibility, visual appearance, responsive behavior, interactions, assets, and deterministic build behavior.

## Explicit exclusions

- No changes to .htaccess, router.php, server.php, error routing, sitemap.php, breadcrumbs, redirects, public URLs, slugs, or trailing-slash behavior unless a later validation exposes a task-caused regression that cannot be corrected elsewhere.
- No changes to analytics, fonts, images, preload strategy, general JavaScript performance, database behavior, credentials, hosting, GitHub Actions, or production configuration.
- No package installation and no framework, dependency, or build-tool replacement.
- No direct editing of generated or minified files. Generated CSS changes must come only from npm run build:css.
- No speculative selector deletion and no Lighthouse-score chasing.
- No main branch work, production deployment, force-push, history rewrite, or tag changes.

## Page-family mapping

| Family | Active templates and routes | Existing destination |
| --- | --- | --- |
| Home | index.php; / | assets/css/src/pages/home.css |
| About | about.php; /about | assets/css/src/pages/about.css |
| Contact | contact.php; /contact | assets/css/src/pages/contact.css |
| Services | Five service templates plus Digital Marketing tab variants | assets/css/src/pages/services.css |
| Blog listing | blog.php, blog-category.php, blog-tag.php; listing and all valid taxonomy routes | assets/css/src/pages/blog-listing.css |
| Blog details | blog-details.php through blog-details11.php; all 11 canonical article routes | assets/css/src/pages/blog-details.css |
| Legal | privacy-policy.php and terms-conditions.php | assets/css/src/pages/legal.css |
| Error | error.php, invalid routes, invalid categories, and invalid tags | assets/css/src/pages/error.css |

The exhaustive route inventory is recorded in INVENTORY.md. The current loader emits core first and exactly one allowlisted family bundle second.

## Component classification strategy

Every complete logical rule group will be assigned one category before it is edited:

### A. Truly global core

Retain design tokens, reset/base typography, container and grid foundations, accessibility helpers, header, footer, navigation, shared buttons, shared form primitives, shared marquee, common responsive foundations, and proven cross-family state/utility rules.

### B. Page-family-exclusive

Move a complete rule only when template, partial, JavaScript, route, and rendered-DOM evidence prove that every selector in the rule belongs to one family. Preserve its exact selector text, declaration values/order, media context, and related keyframe/custom-property dependencies.

### C. Shared by some families

Prefer small stable duplication in the applicable existing family sources over rebuilding a large core. A conditional component bundle is allowed only after measuring meaningful byte savings, proving deterministic loader selection, and showing that an added request does not worsen the critical chain.

### D. Proven unused

Deletion requires all applicable repository searches, runtime-generation checks, route checks, plugin checks, responsive/state checks, DOM matching, interaction checks, and Coverage checks to pass. Text-search absence is candidate evidence only.

### E. Dynamic, generated, or uncertain

Retain in the safest current source and document in EXCEPTIONS.md. This includes plugin-generated classes, generic state names, injected API markup, pseudo states, sticky geometry, form states, and selectors whose ownership cannot be proved.

## Implementation phases

1. Phase 0: baseline, route map, build, sizes, structural inventory, candidates, and recovery documentation. Documentation only.
2. Phase 1: classify every logical core group and establish the dynamic-selector allowlist. Documentation only.
3. Phase 2: apply the unused-CSS evidence standard to candidate groups. Evidence only; no deletion yet.
4. Phase 3: extract one family at a time in the order Home, About, Contact, Services, Blog listing, Blog details, Legal, Error.
5. Phase 4: remove proven-unused theme groups in small recoverable checkpoints.
6. Phase 5: consolidate proven duplicates without changing cascade behavior.
7. Phase 6: replace the remote nested intl-tel-input import with one explicit correctly ordered load if safe.
8. Phase 7: remove dead commented-out first-party code in small syntax-checked groups.
9. Phase 8: validate build determinism and watcher behavior.
10. Phase 9: validate the complete route/status/asset matrix.
11. Phase 10: run the requested restricted browser smoke matrix.
12. Phase 11: perform controlled before/after performance comparison and final reporting.

No later phase begins when its checkpoint fails or when selector ownership remains uncertain.

## Completion status

Phases 0 through 10 are committed, pushed only to origin/testing and staging-validated. Phase 11's controlled comparison is complete and awaiting its final documentation checkpoint. The final measured result reduces core source/minified size by 47.16%/47.11% without adding stylesheet requests on the representative routes; exhaustive route/resource validation and the 30-state restricted browser matrix pass. Final acceptance still requires the Phase 11 checkpoint, green staging, clean worktree and HEAD equal to origin/testing.

## Validation requirements

Every implementation checkpoint must include, as applicable:

- Safety gate: branch testing, clean starting worktree, HEAD equal to origin/testing.
- npm run build:css.
- Two consecutive builds with identical SHA-256 hashes for every generated split and compatibility output.
- Node syntax checks for changed first-party JavaScript/build files.
- php -l for each changed PHP file.
- git diff --stat and git diff --check.
- Non-empty configured bundle checks and complete CSS URL target validation.
- Complete route status and exact core/family mapping checks.
- Confirmation that no active page loads main.css or main.min.css.
- Representative restricted browser checks at 1440 by 900 and 390 by 844, plus one tablet viewport only where behavior changes.
- Interaction, console, failed-resource, overflow, and visual-cascade checks appropriate to the component changed.
- Staging workflow success before proceeding.

Phase 0 uses command-line HTTP validation only because it changes no rendering behavior. Browser validation begins only when cascade ownership changes.

## Commit strategy

- Keep all commits on testing and push only to origin/testing.
- Phase 0 checkpoint message: Document core CSS optimization baseline.
- Use one recoverable checkpoint for each family extraction and each small unused/duplicate cleanup group.
- Keep the remote import and commented-code cleanups separate from selector movement.
- Record resulting commit and staging workflow status in PROGRESS.md at the next documentation update and in the task handoff immediately after the checkpoint.
- Never amend or rewrite a pushed checkpoint.

## Rollback strategy

- Stop before committing when any validation fails.
- Correct or discard only the current uncommitted phase; do not reset the repository broadly.
- If a pushed checkpoint later proves faulty, inspect it and create a normal revert commit on testing. Do not force-push or rewrite history.
- Regenerate outputs from editable sources after rollback; never repair generated bundles manually.
- Preserve uncertain CSS and record the reason in EXCEPTIONS.md rather than deleting it.
