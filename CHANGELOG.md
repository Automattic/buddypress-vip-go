# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.10] - 2025-01-23

### Fixed

- Filter BuddyBoss default group avatar to prevent opendir error by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/47>

## [1.0.9] - 2025-01-21

### Fixed

- Redirect chunked video uploads to local temp directory to fix "Failed to create lock file" error by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/44>

## [1.0.8] - 2025-01-12

### Fixed

- Fix default group avatar uploads in BuddyBoss by storing metadata in option instead of group meta when item_id=0 by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/41>
- Fall back to default group avatar for groups without specific avatars by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/41>

## [1.0.7] - 2025-12-16

### Fixed

- Move avatar folder dir filter outside bp_init callback to prevent opendir() warnings by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/37>

## [1.0.6] - 2025-12-16

### Fixed

- Improve avatar upload handling for VIP filesystem by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/34>
- Support BuddyPress 6.0+ avatar filter rename by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/31>
- Disable avatar history feature (BP 10.0+) to prevent filesystem errors by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/33>
- Simplify loading conditions by removing unnecessary AJAX check by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/23>

### Changed

- Add note about plugin activation order in README by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/32>
- Increase minimum supported WordPress version to 6.6 by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/25>
- Add wp-env configuration for local development by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/24>
- Add GitHub Actions workflows and PHPUnit test infrastructure by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/27>

## [1.0.5] - 2025-07-07

### Fixed

- Add `DOING_AJAX` check for `A8C_Files` initialization by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/18>

## [1.0.4] - 2025-06-24

### Fixed

- Add cache flushing after video moves in album by @amitraj2203 in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/13>
- Add support for group video uploads and override temp directory by @amitraj2203 in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/14>

### Changed

- docs: Improve README by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/12>
- docs: Small amendments and Markdown linting by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/15>

## [1.0.3] - 2025-05-06

### Fixed

- Pass extra data to xprofile_cover_image_uploaded hook by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/9>

## [1.0.2] - 2025-05-06

### Fixed

- Use correct number of arguments in hook call by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/6>

## [1.0.1] - 2025-04-29

### Fixed

- Cover image metadata fatal if groups component is not active by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/1>

### Changed

- Improve documentation by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/2>

## Maintenance

- Add development files and update code standards by @GaryJones in <https://github.com/Automattic/BuddyPress-VIP-Go/pull/3>
- Registered on Packagist: <https://packagist.org/packages/automattic/buddypress-vip-go>

## 1.0.0 - 2016-04-22

### Added

- Initial release of BuddyPress for VIP Go

[1.0.10]: https://github.com/automattic/buddypress-vip-go/compare/1.0.9...1.0.10
[1.0.9]: https://github.com/automattic/buddypress-vip-go/compare/1.0.8...1.0.9
[1.0.8]: https://github.com/automattic/buddypress-vip-go/compare/1.0.7...1.0.8
[1.0.7]: https://github.com/automattic/buddypress-vip-go/compare/1.0.6...1.0.7
[1.0.6]: https://github.com/automattic/buddypress-vip-go/compare/1.0.5...1.0.6
[1.0.5]: https://github.com/automattic/buddypress-vip-go/compare/1.0.4...1.0.5
[1.0.4]: https://github.com/automattic/buddypress-vip-go/compare/1.0.3...1.0.4
[1.0.3]: https://github.com/automattic/buddypress-vip-go/compare/1.0.2...1.0.3
[1.0.2]: https://github.com/automattic/buddypress-vip-go/compare/1.0.1...1.0.2
[1.0.1]: https://github.com/automattic/buddypress-vip-go/compare/1.0.0...1.0.1
