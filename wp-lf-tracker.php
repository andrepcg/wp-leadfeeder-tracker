<?php

namespace Leadfeeder\Plugins\Wp_Lf_Tracker;

/**
 * Plugin Name: Leadfeeder Tracker
 * Plugin URI: https://github.com/andrepcg/wp-leadfeeder-tracker
 * Description: Simple and light weight Leadfeeder plugin for WordPress.
 * Version: 0.1
 * Author: André Perdigão
 * Author URI: https://github.com/andrepcg
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
 * Text Domain: wp-leadfeeder-tracker
 * Domain Path: /languages
 */

// No direct access
if (!defined('ABSPATH')) exit;

define('LF_WP_PLUGIN_VER', '0.1');
define('LF_WP_BASE_FILE', __FILE__);
define('LF_WP_OPTION_NAME', 'lfwpt_options');


require 'inc/class-singleton.php';
/**
 * Initiate required classes
 * Note: We are not using AJAX anywhere in this plugin
 */
if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX)) {
    require 'inc/class-admin.php';
    Admin::instance();

} else {
    require 'inc/class-frontend.php';
    Frontend::instance();
}


