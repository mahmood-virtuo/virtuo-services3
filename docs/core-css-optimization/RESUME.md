# Core CSS Optimization Resume State

## Last completed checkpoint

The Phase 5 core exact-duplicate cleanup is committed as 4c9f51a0e15cc392c7bff8268e73dc40ee61ce66, pushed to origin/testing and green in staging run 29666121983. Services-family exact-duplicate cleanup is implemented and validated, awaiting checkpoint commit/push/staging.

## Repository state at this handoff

- Current branch: testing
- Starting commit for Services duplicate cleanup: 4c9f51a0e15cc392c7bff8268e73dc40ee61ce66
- Last completed checkpoint: 4c9f51a0e15cc392c7bff8268e73dc40ee61ce66
- Last completed staging run: Deploy Virtuo Staging 29666121983 succeeded
- Current HEAD: the Services duplicate checkpoint containing this file after commit; resolve exactly with git rev-parse HEAD
- Required remote equality: current HEAD must equal origin/testing before the next Phase 4 group starts
- Production/main state: untouched

## Services duplicate cleanup completed locally

- Removed 19 earlier rule copies from 13 exact groups; the last identical copy remains.
- services.css dropped 1,940 bytes; services.min.css and Services routes dropped 1,693 bytes.
- Twelve initial/changing/ready Services parity states passed after the transition settle.
- All 89 probes and 17 stable stylesheet paths/URLs passed; candidate DOM matches remained zero.

## Next exact action

Run final deterministic build/diff checks, commit with message Consolidate exact Services CSS duplicates, push only to testing and wait for staging. Then consolidate Home/Blog-details exact duplicates.

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
- Core remains 298,806 minified bytes; Services is now 35,376 minified bytes.
- Shop/coupon/quantity absent-node JavaScript remains for Phase 7 review.
- Brand's absent-node Swiper initialization remains for Phase 7 review.
- Project/Testimonial absent-node Swiper initialization remains for Phase 7 review.
- The remote import and duplicate candidates remain unchanged.
- The approved installed Playwright/local Chrome fallback remains necessary while the in-app browser bridge metadata is unavailable.

## Recovery rule

Resume from this file and current Git state. Do not restart the audit, alter main, or discard unrelated work. If the Git safety gate no longer passes, stop and report rather than continuing.
