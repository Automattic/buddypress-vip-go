# BuddyPress VIP Go

BuddyPress integration and compatibility layer for the WordPress VIP Go platform.

## Project Knowledge

| Property | Value |
|----------|-------|
| **Main file** | `buddypress-vip-go.php` |
| **Text domain** | `buddypress-vip-go` |
| **Namespace** | `Automattic\BuddyPressVIPGo` (tests only) |
| **Source directory** | Root level |
| **Version** | 1.0.12 |
| **Requires PHP** | 8.2+ |

### Directory Structure

```text
buddypress-vip-go/
├── buddypress-vip-go.php   # Main plugin file
├── files.php               # Large file (~31KB) — media/file handling for VIP Go
├── tests/
│   ├── Unit/               # Unit tests
│   └── Integration/        # Integration tests (wp-env)
├── languages/              # Translation files
├── .github/workflows/      # CI: cs-lint, integration
└── .phpcs.xml.dist         # PHPCS configuration
```

### Key Files

- `buddypress-vip-go.php` — Main plugin bootstrap and hooks
- `files.php` — Substantial media/file handling logic adapted for VIP Go's file system

### Dependencies

- **Runtime**: BuddyPress (required), WordPress VIP Go platform
- **Dev**: `automattic/vipwpcs`, `yoast/wp-test-utils`

## Commands

```bash
composer cs                # Check code standards (PHPCS)
composer cs-fix            # Auto-fix code standard violations
composer lint              # PHP syntax lint
composer test:unit         # Run unit tests
composer test:integration  # Run integration tests (requires wp-env)
composer test:integration-ms  # Run multisite integration tests
composer coverage          # Run tests with HTML coverage report
```

## Conventions

See `CONTRIBUTING.md` for setup, checks and the contribution workflow. Key points:

- **Commits**: Every commit must be signed; `develop` and `main` reject unsigned commits.
  Use a [Conventional Commits](https://www.conventionalcommits.org/) prefix (`fix:`, `feat:`, `test:`, `docs:`, `ci:`, `chore:` and so on)
  with an imperative subject of about 50 characters, and a body that explains why the change was needed rather than what changed.
  One concern per commit.
- **PRs**: Open against `develop`. The title describes the outcome in sentence case, without a conventional commit prefix.
  The description explains the problem first, then how the PR solves it.
  PRs land as merge commits (squash and rebase merging are disabled), so every commit message reaches `develop` as written.
- **Testing**: Write integration tests for WordPress-dependent behavior, unit tests for isolated logic. Use `Yoast\WPTestUtils\WPIntegration\TestCase` for integration, `Yoast\WPTestUtils\BrainMonkey\YoastTestCase` for unit.
- **Code style**: WordPress coding standards via PHPCS. Tabs for indentation.
- **i18n**: All user-facing strings must use the `buddypress-vip-go` text domain.

## Architectural Decisions

- **VIP Go platform compatibility**: This plugin adapts BuddyPress to work correctly on the VIP Go platform, particularly around file handling. The VIP Go file system differs from standard WordPress — this plugin bridges that gap.
- **Large files.php**: The `files.php` file is intentionally large because it contains cohesive file-handling logic for the VIP Go environment. Do not refactor without understanding the VIP Go file system constraints.
- **Incremental modernization**: The plugin still needs modernization work. Improvements are welcome but should be incremental.

## Common Pitfalls

- Do not edit WordPress core files or BuddyPress core files.
- This plugin depends on BuddyPress — test environments must have BuddyPress installed and active.
- Run `composer cs` before committing. CI will reject code standard violations.
- Integration tests require `npx --no wp-env start` running first. Run `npm ci` before it, so `npx` uses the `@wordpress/env` pinned in `package.json`. Always keep `--no`: without an installed `@wordpress/env`, plain `npx wp-env` fetches the unrelated `wp-env` package from npm.
- `files.php` is large but cohesive. Do not split it without understanding how VIP Go file operations work — the logic is tightly coupled to VIP Go's file system API.
- Do not assume standard WordPress file system behaviour. VIP Go uses a different file storage backend and this plugin exists specifically to handle those differences.
- Be cautious with any changes to upload/media handling — incorrect changes could break media uploads on VIP Go sites.
