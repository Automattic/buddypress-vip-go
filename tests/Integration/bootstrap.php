<?php
/**
 * Integration tests bootstrap file.
 *
 * @package Automattic\BuddyPressVIPGo\Tests\Integration
 */

use Yoast\WPTestUtils\WPIntegration;

// Composer autoloader.
require_once dirname( __DIR__, 2 ) . '/vendor/autoload.php';

// Load the Yoast WP integration helper functions.
require_once dirname( __DIR__, 2 ) . '/vendor/yoast/wp-test-utils/src/WPIntegration/bootstrap-functions.php';

// Get the path to the WordPress test library.
$_tests_dir = WPIntegration\get_path_to_wp_test_dir();

if ( empty( $_tests_dir ) ) {
	echo 'ERROR: Could not find WordPress test library directory.' . PHP_EOL;
	echo 'Make sure wp-env is running: npm run wp-env start' . PHP_EOL;
	exit( 1 );
}

// Get access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

tests_add_filter(
	'muplugins_loaded',
	static function () {
		// Load the plugin.
		require dirname( __DIR__, 2 ) . '/buddypress-vip-go.php';
	}
);

// Make sure the Composer autoload file has been generated.
WPIntegration\check_composer_autoload_exists();

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';

/*
 * Register the custom autoloader to overload the PHPUnit MockObject classes when running on PHP 8.
 *
 * This function has to be called _last_, after the WP test bootstrap to make sure it registers
 * itself in FRONT of the Composer autoload (which also prepends itself to the autoload queue).
 */
WPIntegration\register_mockobject_autoloader();
