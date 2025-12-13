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
	 * Test that the plugin is loaded.
	 */
	public function test_plugin_loaded(): void {
		$this->assertTrue( function_exists( 'bp_vip_go_setup' ) || class_exists( 'BP_VIP_Go' ) );
	}
}
