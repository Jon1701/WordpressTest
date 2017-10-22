<?php
/*
Plugin Name:  Hyperion
Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
Description:  Basic WordPress Plugin Header Comment
Version:      20160911
Author:       WordPress.org
Author URI:   https://developer.wordpress.org/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
*/

// Exit if this file is directly accessed.
if ( ! defined( "ABSPATH" ) ) {
  exit;
}

// Plugin initialization.
function init() {
  // Declare global variable.
  global $pluginroot;

  // Set plugin root global variable.
  $pluginroot = plugin_dir_path(__FILE__);

  // Only load on Admin section.
  if ( is_admin() ) {
    // Require Post Meta Box.
    require_once $pluginroot . 'edit-post/class-hyperion-edit-post-box.php';
  }
}

// Run when plugin is loaded.
add_action('plugins_loaded', 'init', 10);
