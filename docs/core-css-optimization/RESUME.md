# Core CSS Optimization Resume State

## Last completed checkpoint

Phase 4 selective Banner plus Brand/History/Counter/Video deletion is committed as cfaa7bfd90710c77fc26f9db767ad1159fc053a4, pushed to origin/testing and green in staging run 29665767749. Project/Testimonial deletion is implemented and validated, awaiting the final Phase 4 checkpoint commit/push/staging.

## Repository state at this handoff

- Current branch: testing
- Starting commit for Project/Testimonial deletion: cfaa7bfd90710c77fc26f9db767ad1159fc053a4
- Last completed checkpoint: cfaa7bfd90710c77fc26f9db767ad1159fc053a4
- Last completed staging run: Deploy Virtuo Staging 29665767749 succeeded
- Current HEAD: the Project/Testimonial checkpoint containing this file after commit; resolve exactly with git rev-parse HEAD
- Required remote equality: current HEAD must equal origin/testing before the next Phase 4 group starts
- Production/main state: untouched

## Project/Testimonial deletion completed locally

- Deleted 409 normal rules, 103 media wrappers and one inactive URL; no keyframe or custom property was removed.
- core.css dropped 60,461 bytes; core.min.css and every route dropped 50,901 bytes.
- Same-DOM matrix parity passed all eight families at desktop/mobile.
- All 89 probes and 17 stable stylesheet paths/URLs passed; candidate DOM matches remained zero.

## Next exact action

Run final deterministic build/diff checks, commit with message Remove unused Project and Testimonial CSS, push only to testing and wait for staging. Then begin Phase 5 duplicate consolidation.

## Outstanding phases

- Phase 4: final checkpoint pending; all approved unused groups are implemented and locally validated.
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
- Core is now 300,461 minified bytes; all Phase 4 approved unused CSS candidates are removed.
- Shop/coupon/quantity absent-node JavaScript remains for Phase 7 review.
- Brand's absent-node Swiper initialization remains for Phase 7 review.
- Project/Testimonial absent-node Swiper initialization remains for Phase 7 review.
- The remote import and duplicate candidates remain unchanged.
- The approved installed Playwright/local Chrome fallback remains necessary while the in-app browser bridge metadata is unavailable.

## Recovery rule

Resume from this file and current Git state. Do not restart the audit, alter main, or discard unrelated work. If the Git safety gate no longer passes, stop and report rather than continuing.
