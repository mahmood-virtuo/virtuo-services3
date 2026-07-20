# AGENTS.md

## Project Summary

This is the Virtuo Services PHP website project. It is a live/production-sensitive website with GitHub Actions CI/CD deployment. Pushing to main can deploy changes to the live website.

The project uses PHP pages, partials, CSS, JavaScript, .htaccess routing, server.php/router.php local routing, SEO-friendly blog URLs, blog category/tag pages, sitemap.php, and a custom 404 page.

## Absolute Safety Rules

- Do not rewrite the whole project.
- Do not change unrelated files.
- Do not remove existing features.
- Do not change public URLs, slugs, redirects, routing, sitemap behavior, or 404 behavior unless the task specifically asks for routing work.
- Do not change `.htaccess`, `server.php`, `router.php`, `error.php`, `sitemap.php`, or breadcrumb logic unless explicitly asked.
- Do not install new packages, libraries, dependencies, build tools, or frameworks without asking first.
- Do not change database schema, environment variables, credentials, hosting config, deployment config, GitHub Actions config, or server config unless explicitly asked.
- Do not edit vendor, generated, cache, backup, or minified files unless explicitly asked.
- Preserve the current UI, spacing, responsiveness, colors, animations, and layout unless the task asks for a visual change.
- Prefer small, surgical changes over broad refactors.
- Before editing, inspect the relevant files first.
- After editing, explain exactly which files changed and why.
- Never run `git commit`, `git push`, deployment commands, destructive commands, or database commands unless the user explicitly asks.

## Live Deployment Warning

This repository is connected to CI/CD. Pushing to `main` can deploy to the live website. The AI agent must not push to main. The user must review, test, commit, and push manually.

## PHP Rules

- Keep PHP compatible with the current project style.
- Escape dynamic output with `htmlspecialchars(..., ENT_QUOTES, 'UTF-8')` where relevant.
- Do not introduce unsafe direct user input handling.
- Preserve existing include/require structure unless changing it is necessary.
- When changing PHP files, run `php -l` syntax checks on changed PHP files.

## Routing / URL Rules

- Be extremely careful with `.htaccess`, `server.php`, `router.php`, `error.php`, `sitemap.php`, and breadcrumb files.
- Clean URL behavior must not be changed unless the task specifically requires it.
- Trailing slash behavior must not be changed unless the task specifically requires it.
- Blog detail URLs, blog category URLs, blog tag URLs, and old blog redirects must remain working.
- Asset paths must work on normal pages and on the 404 page.
- If routing is changed, test valid pages, invalid pages, old redirected URLs, category URLs, tag URLs, and sitemap.xml.

## CSS / JS Rules

- Do not rename existing classes or IDs unless all references are updated.
- Do not make global CSS changes for a local layout issue.
- Prefer scoped CSS fixes.
- Do not break responsive behavior.
- Do not remove existing JavaScript behavior while fixing a small bug.

## Validation Commands

Before editing:

- `git status`

After editing:

- `git diff --stat`
- `git diff --check`

For changed PHP files:

- `php -l path/to/changed-file.php`

For checking all PHP files when needed:

- `find . -name "*.php" -not -path "./vendor/*" -print0 | xargs -0 -n1 php -l`

For local testing, use the existing PHP local server setup for this project. Do not invent a new server setup without asking.

## Token-Saving / Browser Testing Rules

- Do not use IAB, in-app browser, Playwright, browser automation, screenshot walkthroughs, visual browser testing, or end-to-end browser testing unless the user explicitly asks.
- Do not spend tokens repeatedly opening pages, taking screenshots, or running browser-based checks for small code changes.
- Default validation should be lightweight: `git status`, `git diff --stat`, `git diff --check`, and `php -l` for changed PHP files.
- For visual/layout changes, suggest manual browser tests for the user instead of automatically running browser automation.
- Ask before doing any expensive test, browser test, screenshot test, crawler test, or full-site scan.

## Required Final Response From AI

At the end of every task, provide:

1. Root cause
2. Files changed
3. Exact changes made
4. Validation/tests run
5. Manual browser tests still needed
6. Any remaining risk

## Testing Branch Autonomous Workflow Exception

When the user explicitly requests autonomous end-to-end work, the agent is authorized to:

- Run read-only Git inspection commands.
- Edit files inside the active workspace.
- Run project build, syntax, lint and validation commands.
- Run `git add`.
- Run `git commit`.
- Run `git push origin testing`.

This authorization applies only when all of the following are true:

1. The current branch is exactly `testing`.
2. The initial working tree state has been recorded.
3. `HEAD` equals `origin/testing` before implementation begins.
4. All required builds and validations pass.
5. `git diff --check` passes.
6. The complete changed-file list has been reviewed.
7. The push target is exactly `origin testing`.

The agent must never:

- Push to `main` or `master`.
- Force-push any branch.
- Merge or rebase.
- Run `git reset --hard`.
- Run `git clean`.
- Switch branches.
- Modify production deployment workflows.
- Trigger or perform a production deployment.
- Modify a database.

If any safety condition fails, stop and report the blocker without committing or pushing.
