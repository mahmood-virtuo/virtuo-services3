# Core CSS Optimization Validation

## Phase 0 environment

- Date: 2026-07-19, Asia/Dubai
- Repository: Virtuo Services
- Local server reused: http://127.0.0.1:8000
- Existing server process: php PID 8646; not terminated or replaced
- Existing asset watcher: node scripts/watch-assets.js PID 44048; left running
- Browser automation: not used in Phase 0

## Git safety gate

Commands:

    git branch --show-current
    git status --short
    git rev-parse HEAD
    git rev-parse origin/testing

Results:

- Branch: testing
- Worktree: clean at the safety gate
- HEAD: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- origin/testing: 984720bb7f6ec6e406093b4adbfb9ce1b53e1a19
- Gate: passed

## Baseline build

Command:

    npm run build:css

Result: passed. CleanCSS emitted the existing notice that it skipped inlining the remote intl-tel-input import because no callback was supplied. Output sizes were:

    core.min.css           556488
    home.min.css            11472
    about.min.css           12802
    contact.min.css         13516
    services.min.css          853
    blog-listing.min.css    10868
    blog-details.min.css   109467
    legal.min.css               50
    error.min.css              943
    main.css               839840
    main.min.css           716409

The worktree remained clean after the build, proving that the checked-in generated files already matched the builder output.

## Generated hash determinism at baseline

Command before and after the build:

    shasum -a 256 assets/css/bundles/*.min.css assets/css/main.css assets/css/main.min.css

Both sets matched:

| File | SHA-256 |
| --- | --- |
| about.min.css | ce3542443479182a35b51ccb41111864b7588ea6becc1611c4ba1cc98a8e5182 |
| blog-details.min.css | bec6a0c9f37c302371b215917710cbb34458970e1d7d985105215c214e5948ca |
| blog-listing.min.css | 788870e71fbe09139858d32a1b8a3bb208aebbebfe458175cc9b1de1cabe9969 |
| contact.min.css | 34adb8f2b80c07da6a3e39ff0807b3a6d8b8b513bf0d1c884c7d9d26e0ffaff9 |
| core.min.css | 639be506927b9be1aa1c4c4614fd292e8c4e280827aba9c26b80c9541a87eeb4 |
| error.min.css | 55b41e8ccf7c4a8756724a6df2bef5eb0568f1a676f79f1e684354e5f1593750 |
| home.min.css | 931ab5bdcd3776758e2c56c74ea4e6c464a9e13946daf51aec6f03253073da81 |
| legal.min.css | 67b6c5660d2ad0268b2efaa787cf90513d5e472a0ee6c2282bf297013cf8672f |
| services.min.css | 419db313752480a66ee9ee16e34a6835143654fbcdc27be6d87cfb2536771d87 |
| main.css | 6aaaa76c91206918a050807c15aedcf59d1c26eac1a26691c5f2934c02d2e314 |
| main.min.css | 3bd1eaebe9d73f1d5e23e697792112d9f1542fb02cd1962fec033fb8a55a43e3 |

Phase 8 will repeat two consecutive builds after implementation. Phase 0 establishes that one build reproduces the checked-in hashes.

## Size commands

    wc -c assets/css/src/core.css assets/css/src/pages/*.css
    wc -c assets/css/bundles/*.min.css assets/css/main.css assets/css/main.min.css
    gzip -9 -c assets/css/src/core.css | wc -c
    gzip -9 -c assets/css/bundles/core.min.css | wc -c

Results are recorded in INVENTORY.md. The gzip diagnostics were 77,649 and 73,497 bytes respectively.

## Structural inventory method

A comment-aware Node brace scanner was run against every editable CSS source. It:

1. Replaced comment contents with whitespace while preserving line positions.
2. Parsed statements and balanced blocks while respecting quotes, parentheses, and attribute brackets.
3. Recursed into media/support/container/layer/scope contexts.
4. Excluded keyframe step blocks from normal selector counts.
5. Split selector lists only on top-level commas.
6. Recorded media ancestry for duplicate comparisons.

Independent sanity commands:

    rg -o '@media\b' assets/css/src/core.css | wc -l
    rg -o '@(?:-webkit-)?keyframes\b' assets/css/src/core.css | wc -l
    rg -o '@font-face\b' assets/css/src/core.css | wc -l
    rg -n '@import|@font-face|@(?:-webkit-)?keyframes|url\(' assets/css/src/core.css

The raw media search returned 1,217 because four @media strings are inside comments. The comment-aware active count is 1,213. The raw and parsed keyframe count is 30; font-face count is zero.

Core structural result:

- 4,643 normal rules
- 5,065 selectors
- 1,213 media-query blocks / 27 unique query texts
- 30 keyframe blocks / 18 logical names
- 88 active custom-property declarations / 70 unique names
- 0 font-face blocks
- 1 import
- 13 active url() occurrences / 8 unique values

## Loader and route validation

The validator fetched sitemap.xml from the existing local server, converted only the virtuo.ae origin to localhost, added invalid category/tag/generic probes, and for each response verified:

- Expected 200 or 404 status.
- At least one vendor stylesheet.
- Exactly one core.min.css.
- Exactly one expected family bundle.
- Core appears before the family bundle.
- No main.css or main.min.css.

It then de-duplicated local stylesheet URLs and requested each one directly. External stylesheet URLs were inventoried separately and were not rebased to localhost.

Summary:

- sitemap.xml: 200
- Canonical sitemap routes: 86
- Total probes: 89
- Route/status/family/order failures: 0
- Unique local CSS URLs: 17
- Local CSS HTTP failures: 0
- External stylesheet links: one Google Fonts Poppins URL

Family distribution across the 89 probes:

| Family | Probes |
| --- | ---: |
| Home | 1 |
| About | 1 |
| Contact | 1 |
| Services | 27 |
| Blog listing | 43 |
| Blog details | 11 |
| Legal | 2 |
| Error | 3 |

All canonical URLs are enumerated in INVENTORY.md.

## Representative stylesheet order

The homepage rendered:

1. External Poppins stylesheet.
2. bootstrap.min.css.
3. fontawesome-all.min.css.
4. tg-flaticon.css.
5. swiper-bundle.min.css.
6. default.css.
7. default-icons.css.
8. aos.css.
9. tg-cursor.css.
10. bundles/core.min.css.
11. bundles/home.min.css.

Other active routes contained eight local/external vendor styles before core and one family bundle. The homepage contained an additional Swiper vendor stylesheet. No active route rendered compatibility CSS.

## Phone-field and remote import baseline

Commands/checks:

    rg -n '@import|intlTelInput\.css' assets/css/bundles/core.min.css assets/css/main.min.css

Results:

- The remote import is present in core.min.css and main.min.css.
- All 89 route probes rendered a virtuo-footer-phone-input.
- All 89 route probes rendered intlTelInput.min.js.
- No remote import change was made.

## Inline-style baseline

The route validator removed HTML comments, then counted active style attributes and style elements.

Results across 89 responses:

- Active style attributes: 0
- Active style blocks: 0
- Responses with either: 0

## CSS URL validation

The existing build-css.js validates that local source URLs are root-relative and that their decoded target files exist. npm run build:css passed this validation for all editable sources. The route validator also confirmed all 17 rendered local CSS links returned 200.

## Documentation checkpoint validation

Run immediately before commit:

    git diff --stat
    git diff --check
    git status --short
    git diff -- docs/core-css-optimization

Result: passed. Exactly the six files under docs/core-css-optimization were committed, with no whitespace errors.

## Phase 0 checkpoint and staging

- Checkpoint: bc8c96789f822bb2b4a7af6ce7769785bcbeb973
- Commit message: Document core CSS optimization baseline
- Push target: origin/testing only
- Push result: succeeded
- Workflow: Deploy Virtuo Staging
- Run: 29659795632
- Result: success
- Main and production: untouched

## Browser testing

No browser automation, screenshots, Playwright, or visual walkthrough was run in Phase 0. This is intentional because Phase 0 edits documentation only. Command-line checks cannot prove computed-style or interaction parity after future cascade changes.

## Manual browser tests still needed

None are caused by Phase 0 documentation. Before implementation checkpoints can be promoted, the requested restricted desktop/mobile matrix must validate Home, About, Contact, representative Services including Digital Marketing, Blog listing, representative Blog details, Legal, and Error, including interactions, console, failed resources, overflow, and responsive behavior.
