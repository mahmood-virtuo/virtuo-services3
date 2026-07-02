---
name: virtuo-project-safety
description: Use before editing, reviewing, debugging, routing, PHP, CSS, JavaScript, sitemap, deployment, or Git changes in the Virtuo Services website project.
---

# Virtuo Project Safety Skill

Before making changes:

1. Read `AGENTS.md`.
2. Inspect `git status`.
3. Inspect only files relevant to the task.
4. Propose a short plan before editing.
5. Make the smallest safe change.

Critical restrictions:

- This is a live PHP website with CI/CD.
- Do not run `git push`, deployment commands, database commands, or destructive commands.
- Do not change `.htaccess`, `server.php`, `router.php`, `sitemap.php`, `error.php`, redirects, clean URLs, blog slugs, category URLs, tag URLs, or 404 behavior unless the user explicitly asks.
- Do not install dependencies.
- Do not rewrite the project.
- Do not touch unrelated files.
- Do not use IAB, in-app browser, Playwright, browser automation, screenshot testing, or end-to-end browser testing unless the user explicitly asks.
- Default validation should be lightweight: `git diff --check` and `php -l` for changed PHP files.

After changes:

- Show changed files.
- Explain root cause.
- Explain exact changes.
- Run or suggest validation commands.
- List manual browser tests needed.
