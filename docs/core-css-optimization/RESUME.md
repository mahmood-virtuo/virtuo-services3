# Core CSS Optimization Resume State

## Last completed checkpoint

Phase 4 advisory-section deletion is committed as 1d2ff25b33c59ba97174ca29a69ebaab2f5859d0, pushed to origin/testing and green in staging run 29665177543. Shop/Login/Checkout deletion is implemented and validated, awaiting checkpoint commit/push/staging.

## Repository state at this handoff

- Current branch: testing
- Starting commit for commerce/account deletion: 1d2ff25b33c59ba97174ca29a69ebaab2f5859d0
- Last completed checkpoint: 1d2ff25b33c59ba97174ca29a69ebaab2f5859d0
- Last completed staging run: Deploy Virtuo Staging 29665177543 succeeded
- Current HEAD: the commerce/account checkpoint containing this file after commit; resolve exactly with git rev-parse HEAD
- Required remote equality: current HEAD must equal origin/testing before the next Phase 4 group starts
- Production/main state: untouched

## Commerce/account deletion completed locally

- Deleted 242 normal rules and 37 media wrappers; no keyframe, URL or custom property was removed.
- core.css dropped 35,977 bytes; core.min.css and every route dropped 30,307 bytes.
- Same-DOM matrix parity passed all eight families at desktop/mobile.
- All 89 probes and 17 stable stylesheet paths/URLs passed; candidate DOM matches remained zero.

## Next exact action

Run final build/diff checks, commit with message Remove unused commerce and account CSS, push only to testing and wait for staging. Then gate Banner/Brand/History/Counter/Video.

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
- Core is now 407,845 minified bytes and retains the remaining approved presentation/carousel candidates until their Phase 4 gates pass.
- Shop/coupon/quantity absent-node JavaScript remains for Phase 7 review.
- The remote import and duplicate candidates remain unchanged.
- The approved installed Playwright/local Chrome fallback remains necessary while the in-app browser bridge metadata is unavailable.

## Recovery rule

Resume from this file and current Git state. Do not restart the audit, alter main, or discard unrelated work. If the Git safety gate no longer passes, stop and report rather than continuing.
