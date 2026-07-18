# Core CSS Optimization Resume State

## Last completed checkpoint

Phase 4 Shop/Login/Checkout deletion is committed as e3fa003b88b589495b63c6fdf3c79b84352f1f50, pushed to origin/testing and green in staging run 29665494285. Selective Banner plus Brand/History/Counter/Video deletion is implemented and validated, awaiting checkpoint commit/push/staging.

## Repository state at this handoff

- Current branch: testing
- Starting commit for presentation deletion: e3fa003b88b589495b63c6fdf3c79b84352f1f50
- Last completed checkpoint: e3fa003b88b589495b63c6fdf3c79b84352f1f50
- Last completed staging run: Deploy Virtuo Staging 29665494285 succeeded
- Current HEAD: the presentation checkpoint containing this file after commit; resolve exactly with git rev-parse HEAD
- Required remote equality: current HEAD must equal origin/testing before the next Phase 4 group starts
- Production/main state: untouched

## Presentation deletion completed locally

- Deleted 544 normal rules, 259 media wrappers and one inactive URL; no keyframe or custom property was removed.
- Retained all active circle rules and both circle-rotation keyframe blocks.
- core.css dropped 68,668 bytes; core.min.css and every route dropped 56,483 bytes.
- Same-DOM matrix parity passed all eight families at desktop/mobile.
- All 89 probes and 17 stable stylesheet paths/URLs passed; candidate DOM matches remained zero.

## Next exact action

Run final deterministic build/diff checks, commit with message Remove unused legacy presentation CSS, push only to testing and wait for staging. Then gate Project/Testimonial.

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
- Core is now 351,362 minified bytes and retains Project/Testimonial until their final Phase 4 gate passes.
- Shop/coupon/quantity absent-node JavaScript remains for Phase 7 review.
- Brand's absent-node Swiper initialization remains for Phase 7 review.
- The remote import and duplicate candidates remain unchanged.
- The approved installed Playwright/local Chrome fallback remains necessary while the in-app browser bridge metadata is unavailable.

## Recovery rule

Resume from this file and current Git state. Do not restart the audit, alter main, or discard unrelated work. If the Git safety gate no longer passes, stop and report rather than continuing.
