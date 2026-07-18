# Core CSS Optimization Resume State

## Last completed phase

Phase 0 baseline, inventory, documentation checkpoint, and staging workflow are complete. No CSS/PHP/JavaScript implementation has started.

## Repository state at this handoff

- Current branch: testing
- Starting commit: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- Last completed phase checkpoint: bc8c96789f822bb2b4a7af6ce7769785bcbeb973
- Checkpoint staging run: Deploy Virtuo Staging 29659795632 succeeded
- Current HEAD: the documentation metadata commit containing this file; resolve exactly with git rev-parse HEAD
- Required remote equality: current HEAD must equal origin/testing before Phase 1 starts
- Production/main state: untouched

The completed phase checkpoint and staging run are recorded above. A committed file cannot contain its own final Git hash, so git rev-parse HEAD and git rev-parse origin/testing remain the authoritative values for the metadata commit containing this resume state.

## Next exact action

Begin Phase 1 only: verify the Git safety gate, then document rule-group classification and the finalized dynamic-selector allowlist. Do not edit CSS in Phase 1.

## Outstanding validation

- Phase 0 required validation: complete.
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
