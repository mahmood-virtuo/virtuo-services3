# Core CSS Optimization Resume State

## Last completed checkpoint

Phase 6 explicit intl-tel-input loading is committed as 1f69ca7c9f45b57366eba67858b2381f106986f9, pushed to origin/testing and green in staging run 29667108255. The Phase 7 obsolete commented-out CSS cleanup is implemented and validated, awaiting checkpoint commit/push/staging.

## Repository state at this handoff

- Current branch: testing
- Starting commit for the CSS-comment group: 1f69ca7c9f45b57366eba67858b2381f106986f9
- Last completed checkpoint: 1f69ca7c9f45b57366eba67858b2381f106986f9
- Last completed staging run: Deploy Virtuo Staging 29667108255 succeeded
- Current HEAD: the CSS-comment checkpoint containing this file after commit; resolve exactly with `git rev-parse HEAD`
- Required remote equality: current HEAD must equal origin/testing before the next Phase 7 group starts
- Production/main state: untouched

## Phase 7 CSS-comment group completed locally

- Removed 68 true disabled CSS declaration/rule comments across seven editable sources; protected comment categories remain.
- Source/compatibility CSS dropped 7,402 bytes; minified compatibility CSS dropped 7,204 bytes.
- Canonical comment-stripped comparison passed all bundles.
- Sixteen all-family desktop/mobile same-DOM parity states and the full 89-route/17-stylesheet gate passed.

## Next exact action

Run final deterministic build/diff checks, commit with message `Remove obsolete commented CSS code`, push only to testing and wait for staging. Then inspect and remove only clearly obsolete JavaScript and PHP/HTML commented code in separate syntax-checked groups.

## Outstanding phases

- Phases 4–6: complete and staging-validated.
- Phase 7: CSS group validated; JavaScript and PHP/HTML groups remain.
- Phase 8: build/watcher verification.
- Phase 9: exhaustive route/status/asset validation.
- Phase 10: restricted desktop/mobile regression.
- Phase 11: controlled performance comparison and final report.

## Known risks

- `.virtuo-team__container` and shared Contact/footer/eye rules remain intentionally in core.
- Core is now 294,299 minified bytes; comments preserved for licenses, ownership, compatibility and active explanation remain.
- Active but absent-node carousel/shop/pricing JavaScript is outside the commented-code cleanup scope.
- The uncalled preloader function is active source and remains; only its commented invocation is a Phase 7 candidate.
- PHP/HTML candidates require control-flow and tag-boundary review before deletion.
- The pinned intl-tel-input CSS/JS remains an external jsDelivr dependency.
- The approved installed Playwright/local Chrome fallback remains necessary while the in-app browser bridge metadata is unavailable.

## Recovery rule

Resume from this file and current Git state. Do not restart the audit, alter main, or discard unrelated work. If the Git safety gate no longer passes, stop and report rather than continuing.
