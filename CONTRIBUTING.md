# Contributing to BuddyPress VIP Go

Thank you for your interest in contributing. This document covers setting up a local environment, running the checks, and proposing a change.

## Code of Conduct

This project follows the [Automattic Code of Conduct](https://automattic.com/code-of-conduct/).

## Development Setup

### Prerequisites

- [Node.js](https://nodejs.org/) LTS or later
- [Docker Desktop](https://www.docker.com/products/docker-desktop)
- [Composer](https://getcomposer.org/)

### Setup

1. Clone the repository into a directory named `buddypress-vip-go`.
   The integration test scripts expect the plugin at `wp-content/plugins/buddypress-vip-go` inside wp-env,
   which takes the name from your checkout's directory.
2. Install dependencies:

   ```bash
   composer install
   npm -g install @wordpress/env
   ```

3. Start the WordPress environment:

   ```bash
   wp-env start
   ```

4. Visit <http://localhost:8888> and log in with `admin` / `password`.

The plugin only does its work on WordPress VIP.
`files.php` loads on `bp_loaded`, and only when VIP's Files Service is available
(the `A8C_Files` class and the `FILES_CLIENT_SITE_ID` and `FILES_ACCESS_TOKEN` constants).
A local wp-env site has neither BuddyPress nor the Files Service,
so the plugin loads there but leaves BuddyPress's media handling alone.

### Checks

```bash
composer lint                # PHP syntax
composer cs                  # Coding standards
composer test:unit           # Unit tests (no WordPress needed)
composer test:integration    # Integration tests (single site, needs wp-env)
composer test:integration-ms # Integration tests (multisite, needs wp-env)
```

## Workflow

1. Create a branch from `develop`:

   ```bash
   git checkout develop
   git pull origin develop
   git checkout -b fix/short-description
   ```

2. Make your change, with tests.
3. Run the checks locally.
4. Commit, signed, with a [Conventional Commits](https://www.conventionalcommits.org/) prefix
   (`fix:`, `feat:`, `test:`, `docs:`, `ci:`, `chore:` and so on), an imperative subject of about 50 characters,
   and a body that explains why the change was needed. Keep to one concern per commit.
5. Push your branch and open a pull request against `develop`.

## Code Standards

We follow the [WordPress VIP Coding Standards](https://github.com/Automattic/VIP-Coding-Standards), configured in `.phpcs.xml.dist`.
Run `composer cs-fix` to fix what PHPCS can fix automatically.
All user-facing strings use the `buddypress-vip-go` text domain.

## Tests

Unit tests live in `tests/Unit/` and run without WordPress; there are none yet. Integration tests live in `tests/Integration/` and run inside wp-env.

- New behavior should come with tests.
- A bug fix should come with a test that fails without the fix.

## Pull Requests

- Keep each pull request to one change.
- Title it with the outcome, in sentence case, without a conventional commit prefix.
- In the description, explain the problem first, then how the pull request solves it.
- Pull requests land as merge commits, so each commit message reaches `develop` as written.
- Reference related issues, for example `Fixes #123`.
- Make sure CI passes before requesting a review.
- **Sign your commits.** `develop` and `main` only accept commits with a verified signature,
  so a pull request with an unsigned commit cannot be merged until it is re-signed and force-pushed.
  See GitHub's guide to [signing commits](https://docs.github.com/en/authentication/managing-commit-signature-verification/signing-commits).

## Releases

Maintainers cut releases from a `release/x.y.z` branch into `main`, and tag the version on `main`.
