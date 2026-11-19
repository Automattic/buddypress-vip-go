<?php
/**
 * PHPUnit bootstrap file.
 *
 * Detects which test suite is being run and loads the appropriate bootstrap.
 *
 * @package Automattic\BuddyPressVIPGo\Tests
 */

// Get the testsuite name from PHPUnit's configuration.
$testsuite = getenv( 'PHPUNIT_TESTSUITE' ) ?: '';

// If running via PHPUnit XML config, detect from the input arguments,
// as either `--testsuite=Unit` or `--testsuite Unit`.
if ( empty( $testsuite ) && isset( $_SERVER['argv'] ) ) {
	foreach ( $_SERVER['argv'] as $i => $arg ) {
		if ( strpos( $arg, '--testsuite=' ) === 0 ) {
			$testsuite = str_replace( '--testsuite=', '', $arg );
			break;
		}
		if ( '--testsuite' === $arg && isset( $_SERVER['argv'][ $i + 1 ] ) ) {
			$testsuite = $_SERVER['argv'][ $i + 1 ];
			break;
		}
	}
}

// Load the appropriate bootstrap based on testsuite.
if ( 'Unit' === $testsuite ) {
	require_once __DIR__ . '/Unit/bootstrap.php';
} else {
	require_once __DIR__ . '/Integration/bootstrap.php';
}
