<?php
/**
 * BuddyPress VIP Go
 *
 * @package           BuddyPress-VIP-Go
 * @author            Human Made, WordPress VIP
 * @copyright         2016-onwards Shared and distributed between Paul Gibbs and contributors.
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       BuddyPress VIP Go
 * Description:       Makes BuddyPress' media work with WordPress VIP's hosting.
 * Version:           1.0.5
 * Requires at least: 4.4.2
 * Requires PHP:      8.2
 * Author:            Human Made, WordPress VIP
 * Text Domain:       buddypress-vip-go
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action(
	'bp_loaded',
	function () {
		$is_ajax       = defined( 'DOING_AJAX' ) && DOING_AJAX;
		$vip_available = class_exists( 'A8C_Files' ) && defined( 'FILES_CLIENT_SITE_ID' ) && defined( 'FILES_ACCESS_TOKEN' );

		// Load files.php if it's an AJAX request OR if VIP environment is available.
		if ( $is_ajax || $vip_available ) {
			require_once __DIR__ . '/files.php';
		}
	} 
);
