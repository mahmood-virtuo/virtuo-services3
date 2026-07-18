# Core CSS Optimization Resume State

## Last completed checkpoint

Phase 4 Benefit/Loan/Features deletion is committed as 68ef25a1a02ed3fe2ca7f4394bf51defe6996ec6, pushed to origin/testing and green in Deploy Virtuo Staging run 29664834471. Dormant Preloader/Search deletion is implemented and validated, awaiting checkpoint commit/push/staging.

## Repository state at this handoff

- Current branch: testing
- Starting commit for dormant shell deletion: 68ef25a1a02ed3fe2ca7f4394bf51defe6996ec6
- Last completed checkpoint: 68ef25a1a02ed3fe2ca7f4394bf51defe6996ec6
- Last completed staging run: Deploy Virtuo Staging 29664834471 succeeded
- Current HEAD: the dormant shell checkpoint containing this file after commit; resolve exactly with git rev-parse HEAD
- Required remote equality: current HEAD must equal origin/testing before the next Phase 4 group starts
- Production/main state: untouched

## Dormant shell deletion completed locally

- Deleted 21 normal rules and both exclusive Preloader keyframes.
- core.css dropped 5,126 bytes; core.min.css and every route dropped 4,336 bytes.
- Same-DOM matrix parity passed all eight families at desktop/mobile.
- All 89 probes and 17 stable stylesheet paths/URLs passed; candidate DOM matches remained zero.

## Next exact action

Run final deterministic build/diff checks, commit with message Remove dormant Preloader and Search CSS, push only to origin/testing and wait for staging. Then gate the Callback/Core-value/Pricing/Career group.

## Outstanding phases

- Phase 4: approved unused-group deletion in small checkpoints.
- Phase 5: exact duplicate and keyframe consolidation.
- Phase 6: remote intl-tel-input import optimization.
- Phase 7: dead commented-code review/removal.
- Phase 8: build/watcher verification.
- Phase 9: exhaustive route/status/asset validation.
- Phase 10: restricted desktop/mobile regression.
- Phase 11: controlled performance comparison and final report.

## Known risks

- `.virtuo-team__container` remains in core for verified cascade order.
- The complete mixed Contact/footer field-font rule and shared Home/About/Contact eye selectors intentionally remain in core.
- Core is now 451,717 minified bytes and retains the remaining approved legacy candidates until their Phase 4 gates pass.
- The remote import and duplicate candidates remain unchanged.
- The approved installed Playwright/local Chrome fallback remains necessary while the in-app browser bridge metadata is unavailable.

## Recovery rule

Resume from this file and current Git state. Do not restart the audit, alter main, or discard unrelated work. If the Git safety gate no longer passes, stop and report rather than continuing.
