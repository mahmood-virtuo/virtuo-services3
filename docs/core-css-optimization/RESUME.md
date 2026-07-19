# Core CSS Optimization Resume State

## Last completed checkpoint

The Phase 7 Blog-detail cleanup is committed as e71c6dcd6b0d102a08dbe1143b7b9849ba7a6dd7, pushed to origin/testing and green in staging run 29667810234. Phase 8 build-system validation is complete and awaiting its documentation checkpoint.

## Repository state at this handoff

- Current branch: testing
- Starting commit for Phase 8: e71c6dcd6b0d102a08dbe1143b7b9849ba7a6dd7
- Last completed checkpoint: e71c6dcd6b0d102a08dbe1143b7b9849ba7a6dd7
- Last completed staging run: Deploy Virtuo Staging 29667810234 succeeded
- Current HEAD: the Phase 8 documentation checkpoint containing this file after commit; resolve exactly with `git rev-parse HEAD`
- Required remote equality: current HEAD must equal origin/testing before Phase 9 starts
- Production/main state: untouched

## Phase 8 build-system validation completed locally

- Two consecutive CSS builds produced identical hashes for nine core/family bundles and two compatibility outputs; all are non-empty.
- Compatibility aggregate/order, CSS URL assets, route absence of compatibility CSS and exact one-core loading passed.
- One controlled source event caused one CSS rebuild and no loop; the existing watcher remains active.
- A reversible invalid local URL made the build exit 1, proving genuine errors fail the process.

## Next exact action

Run the final explicit CSS build and diff checks, commit with message `Document deterministic CSS build validation`, push only to testing and wait for staging. Then run Phase 9's exhaustive canonical/redirect/invalid route and resource matrix.

## Outstanding phases

- Phases 4–6: complete and staging-validated.
- Phase 7: complete and staging-validated.
- Phase 8: build/watcher validation complete; checkpoint pending.
- Phase 9: exhaustive route/status/asset validation.
- Phase 10: restricted desktop/mobile regression.
- Phase 11: controlled performance comparison and final report.

## Known risks

- `.virtuo-team__container` and shared Contact/footer/eye rules remain intentionally in core.
- Core is 294,299 minified bytes.
- The preloader disable/rollback comment remains intentionally.
- Active but absent-node carousel/shop/pricing JavaScript remains outside the commented-code scope.
- No obsolete markup-bearing comment candidate remains; three deliberate structural/rollback exclusions stay protected.
- Compatibility outputs remain intentionally generated but absent from active route markup.
- The pinned intl-tel-input CSS/JS remains an external jsDelivr dependency.

## Recovery rule

Resume from this file and current Git state. Do not restart the audit, alter main, or discard unrelated work. If the Git safety gate no longer passes, stop and report rather than continuing.
