# Core CSS Optimization Resume State

## Last completed checkpoint

Phase 4 dormant Preloader/Search deletion is committed as 5338f1fdce556b671d508db3acd54dfbda1e920f, pushed to origin/testing and green in staging run 29665032564. Advisory-section deletion is implemented and validated, awaiting checkpoint commit/push/staging.

## Repository state at this handoff

- Current branch: testing
- Starting commit for advisory deletion: 5338f1fdce556b671d508db3acd54dfbda1e920f
- Last completed checkpoint: 5338f1fdce556b671d508db3acd54dfbda1e920f
- Last completed staging run: Deploy Virtuo Staging 29665032564 succeeded
- Current HEAD: the advisory checkpoint containing this file after commit; resolve exactly with git rev-parse HEAD
- Required remote equality: current HEAD must equal origin/testing before the next Phase 4 group starts
- Production/main state: untouched

## Advisory deletion completed locally

- Deleted 139 normal rules, 39 media wrappers and one scoped custom property.
- core.css dropped 16,152 bytes; core.min.css and every route dropped 13,565 bytes.
- Same-DOM matrix parity passed all eight families at desktop/mobile.
- All 89 probes and 17 stable stylesheet paths/URLs passed; candidate DOM matches remained zero.

## Next exact action

Run final build/diff checks, commit with message Remove unused advisory CSS, push only to testing and wait for staging. Then gate Shop/Login/Checkout.

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
- Core is now 438,152 minified bytes and retains the remaining approved legacy candidates until their Phase 4 gates pass.
- The remote import and duplicate candidates remain unchanged.
- The approved installed Playwright/local Chrome fallback remains necessary while the in-app browser bridge metadata is unavailable.

## Recovery rule

Resume from this file and current Git state. Do not restart the audit, alter main, or discard unrelated work. If the Git safety gate no longer passes, stop and report rather than continuing.
