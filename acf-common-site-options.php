<?php
/**
 * Plugin Name: ACF Common Site Options
 * Plugin URI: https://github.com/martylouis/acf-common-site-options
 * Description: A small, pre-built Advanced Custom Fields Options Page plugin, ready to for development on any theme.
 * Author: Marty Thierry
 * Author URI: https://martylouis.com
 * Version: 1.1.0
 * License: GPLv2
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Setup Options pages with ACF
 */

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page([
    'page_title'   => 'Site Options',
    'menu_title' => 'Site Options',
    'menu_slug'  => 'common_site_options',
    'capability' => 'edit_posts',
    'redirect'   => true
  ]);

  acf_add_options_sub_page([
    'page_title'   => 'Contact Information',
    'menu_title' => 'Contact Info',
    'parent_slug'  => 'common_site_options',
  ]);

  acf_add_options_sub_page([
    'page_title'   => 'Code Injection',
    'menu_title' => 'Code Injection',
    'parent_slug'  => 'common_site_options',
  ]);

  acf_add_options_sub_page([
    'page_title'   => 'Other Services',
    'menu_title' => 'Other Services',
    'parent_slug'  => 'common_site_options',
  ]);

}


/**
 * Load JSON field path
 */
function cso_load_json($paths) {
  if ($paths) {
    unset($paths[0]);
    $paths[] = plugin_dir_path( __FILE__ ) . 'json';
    return $paths;
  }
}

add_filter('acf/settings/load_json', 'cso_load_json');


/**
 * Load Custom Stylesheet
 */

function cso_scripts() {
  wp_register_style('ml-site-options', plugin_dir_url(__FILE__) . 'css/common-site-options.css', false, '1.0');
  wp_enqueue_style('ml-site-options');
}
add_action('acf/input/admin_enqueue_scripts', 'cso_scripts', 99);
