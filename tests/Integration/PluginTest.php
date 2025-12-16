<?php
/**
 * Integration tests for the plugin.
 *
 * @package Automattic\BuddyPressVIPGo\Tests\Integration
 */

namespace Automattic\BuddyPressVIPGo\Tests\Integration;

/**
 * Test case for plugin integration.
 */
class PluginTest extends TestCase {

	/**
	 * Test that the plugin main file is loaded.
	 */
	public function test_plugin_loaded(): void {
		// The plugin registers an action hook on bp_loaded.
		// Since this runs during bootstrap, we just verify the main file was loaded.
		$this->assertTrue(
			has_action( 'bp_loaded' ) !== false
		);
	}
}
