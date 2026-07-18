# Core CSS Optimization Resume State

## Last completed checkpoint

Phase 4 Project/Testimonial deletion is committed as 5d00d1aac9aa999c45728219929e575aad52c9f8, pushed to origin/testing and green in staging run 29665925805. The first Phase 5 core exact-duplicate cleanup is implemented and validated, awaiting checkpoint commit/push/staging.

## Repository state at this handoff

- Current branch: testing
- Starting commit for core duplicate cleanup: 5d00d1aac9aa999c45728219929e575aad52c9f8
- Last completed checkpoint: 5d00d1aac9aa999c45728219929e575aad52c9f8
- Last completed staging run: Deploy Virtuo Staging 29665925805 succeeded
- Current HEAD: the core duplicate checkpoint containing this file after commit; resolve exactly with git rev-parse HEAD
- Required remote equality: current HEAD must equal origin/testing before the next Phase 4 group starts
- Production/main state: untouched

## Core duplicate cleanup completed locally

- Removed six earlier exact rule copies and five earlier exact keyframe blocks; the last identical copy remains.
- core.css dropped 2,003 bytes; core.min.css and every route dropped 1,655 bytes.
- Core keyframe blocks changed 23 to 18.
- Same-DOM matrix parity passed all eight families at desktop/mobile.
- All 89 probes and 17 stable stylesheet paths/URLs passed; candidate DOM matches remained zero.

## Next exact action

Run final deterministic build/diff checks, commit with message Consolidate exact core CSS duplicates, push only to testing and wait for staging. Then consolidate Services-family exact duplicates.

## Outstanding phases

- Phase 4: complete and staging-validated.
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
- Core is now 298,806 minified bytes; all Phase 4 approved unused candidates are removed and its exact duplicate groups are consolidated.
- Shop/coupon/quantity absent-node JavaScript remains for Phase 7 review.
- Brand's absent-node Swiper initialization remains for Phase 7 review.
- Project/Testimonial absent-node Swiper initialization remains for Phase 7 review.
- The remote import and duplicate candidates remain unchanged.
- The approved installed Playwright/local Chrome fallback remains necessary while the in-app browser bridge metadata is unavailable.

## Recovery rule

Resume from this file and current Git state. Do not restart the audit, alter main, or discard unrelated work. If the Git safety gate no longer passes, stop and report rather than continuing.
