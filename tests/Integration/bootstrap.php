<?php
/**
 * Integration tests bootstrap file.
 *
 * @package Automattic\BuddyPressVIPGo\Tests\Integration
 */

use Yoast\WPTestUtils\WPIntegration;

// Composer autoloader.
require_once dirname( __DIR__, 2 ) . '/vendor/autoload.php';

// Get access to tests_add_filter() function.
require_once getenv( 'WP_PHPUNIT__DIR' ) . '/includes/functions.php';

tests_add_filter(
	'muplugins_loaded',
	static function () {
		// Load the plugin.
		require dirname( __DIR__, 2 ) . '/buddypress-vip-go.php';
	}
);

// Bootstrap WordPress.
WPIntegration\bootstrap_it();
