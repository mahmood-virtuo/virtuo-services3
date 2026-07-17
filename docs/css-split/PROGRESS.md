# CSS Split Progress

## Baseline

- Branch: `testing`
- Baseline commit: `a0f754a` (`Support Basic Auth in staging health check`)
- Remote tracking branch: `origin/testing`
- Starting worktree: clean
- Original `assets/css/main.css`: 831,837 bytes; SHA-256 `acb749e03607a964f1733b9ae05db7ce56e032bd81df540693293896756a4b6b`
- Original `assets/css/main.min.css`: 709,415 bytes; SHA-256 `19cecf2edf3d0d613a2b92b0524954b5babc2af52aa217d93bac0be621c75b31`

## Current phase

Phase 0 — baseline and inventory. Documentation and validation are complete; commit and push are pending.

## Completed phases

None yet.

## Pending phases

- Phase 0 checkpoint validation/commit/push
- Phase 1 build architecture
- Phase 2 home
- Phase 3 about
- Phase 4 contact
- Phase 5 services
- Phase 6 blog listing
- Phase 7 blog details
- Phase 8 legal
- Phase 9 error
- Phase 10 final audit

## Phase log

### Phase 0 — baseline and inventory

Files changed:

- `docs/css-split/PLAN.md`
- `docs/css-split/PROGRESS.md`
- `docs/css-split/VALIDATION.md`
- `docs/css-split/BUNDLE-MAP.md`

Commands run:

- `git branch --show-current`
- `git status --short`
- `git log -1 --oneline`
- `git remote -v`
- `wc -c assets/css/main.css assets/css/main.min.css`
- `shasum -a 256 assets/css/main.css assets/css/main.min.css`
- Targeted `rg`, `sed`, `find`, and `awk` inventory of active templates, routes, body classes, stylesheet order, build scripts, and CSS sections
- Representative local `curl` route/status and rendered stylesheet checks against the existing server on `127.0.0.1:8000`

Validation results:

- Initial branch/cleanliness safety gate: passed.
- Active route/template/body-class inventory: completed.
- Baseline HTTP status inventory: completed; one intentionally invalid category probe returned 404 and was replaced with the valid category slug `business-setup-structuring`, which returned 200.
- `git diff --check`: passed.

Browser-smoke results: not applicable; Phase 0 made no behavioral or visual changes.

Commit SHA: pending.

Pushed: no.

Remaining risk: page-exclusive unscoped CSS must not be over-classified; uncertain ownership will remain in core.

Exact next action: commit the four Phase 0 documents and push that checkpoint to `origin/testing`, then begin Phase 1 from the recorded baseline.
