# Core CSS Optimization Resume State

## Last completed phase

Phase 0 baseline and inventory are complete. Only the six documentation files in this directory are being prepared for the checkpoint. No CSS/PHP/JavaScript implementation has started.

## Repository state at this handoff

- Current branch: testing
- Starting/current pre-checkpoint HEAD: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- origin/testing at the Phase 0 safety gate: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- Last successful existing commit: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- Pending checkpoint: documentation-only commit named Document core CSS optimization baseline
- Production/main state: untouched

After the checkpoint is created, use git rev-parse HEAD and git rev-parse origin/testing as the authoritative immutable checkpoint values. The resulting SHA and staging run are reported in the Phase 0 handoff and must be copied into PROGRESS.md when Phase 1 begins; a commit cannot contain its own final hash.

## Next exact action

1. Validate that exactly the six docs/core-css-optimization files changed.
2. Run git diff --check and review the complete documentation diff.
3. Commit with Document core CSS optimization baseline.
4. Push only testing to origin/testing.
5. Confirm the existing staging workflow succeeds.
6. Begin Phase 1 only: document rule-group classification and the finalized dynamic-selector allowlist. Do not edit CSS in Phase 1.

## Outstanding validation

- Documentation diff/stat/check and final status review.
- Documentation checkpoint push to origin/testing.
- Staging workflow result for the documentation checkpoint.
- Later phases: computed-style, Coverage, interaction, responsive, console, resource, watcher, and controlled performance comparisons.

## Known risks

- core.css is 658,214 bytes and core.min.css is 556,488 bytes.
- The final 158,122-byte measured section contains footer plus mixed later overrides and cannot be assigned wholesale.
- Initial zero-reference theme prefixes are candidates only, not deletion evidence.
- Dynamic/plugin selectors and generic state names require runtime allowlisting.
- Seventeen same-context exact duplicate groups require cascade-position review.
- The remote intl-tel-input import remains in generated core and compatibility CSS.
- Visual/cascade parity remains untested until an implementation checkpoint warrants restricted browser checks.

## Recovery rule

Resume from this file and current Git state. Do not restart the audit, alter main, or discard unrelated work. If the Git safety gate no longer passes, stop and report rather than continuing.
