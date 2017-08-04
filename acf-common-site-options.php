<?php
/**
 * Plugin Name: ACF Common Site Options
 * Plugin URI: https://github.com/martylouis/acf-common-site-options
 * Description: A small, pre-built Advanced Custom Fields Options Page plugin, ready to for development on any theme.
 * Author: Marty Thierry
 * Author URI: https://martylouis.com
 * Version: 1.1.2
 * License: GPLv2
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!class_exists('acf_cso')) :

  class acf_cso {

    function __construct() {

      $this->settings = [
        'version'           => '1.1.2',
        'name'              => 'ACF Common Site Options',
        'basename'          => dirname(plugin_basename(__FILE__)),
        'url'               => plugin_dir_url(__FILE__)
      ];

      // FILTERS
      add_filter('acf/settings/load_json', [$this, 'load_json']);

      // ACTIONS
      add_action('init', [$this, 'check_acf'], 99);
      add_action('admin_menu', [$this, 'acf_options_page'], 99);
      add_action('acf/input/admin_enqueue_scripts', [$this, 'scripts'], 99);

    }

    /**
     * Debug code in Javascript console
     */
    private function debug($data, $type = 'log') {
      $debug = '';
      if( is_array($data) || is_object($data) ) :
        $debug = sprintf('<script>console.%1$s(%2$s)</script>', $type, json_encode($data));
      else :
        $debug = sprintf('<script>console.%1$s("%2$s")</script>', $type, $data);
      endif;

      echo $debug;
    }

    /**
     * Check for ACF
     */
    function check_acf() {
     $acf = class_exists('acf') ? acf() : NULL;

     if ( !isset( $acf ) || version_compare($acf->settings['version'], '5.0', '<') ) :
       add_action( 'admin_notices', [$this, 'acf_error_msg'] );
       add_action( 'network_admin_notices', [$this, 'acf_error_msg'] );
     endif;
    }

    function acf_error_msg() {
      $msg = 'ACF Common Site Options requires Advanced Custom Fields v5.';
      printf(__('<div class="update error"><p>%s</p></div>'), $msg);
    }

    // Load JSON
    function load_json($paths) {
      // unset($paths[0]);
      $paths[] = plugin_dir_path(__FILE__) . 'json';
      return $paths;
    }

    /**
     * Setup Options Page
     */
    function acf_options_page() {
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
    }

    /**
     * Load Custom Stylesheet
     */
    function scripts() {
      wp_register_style($this->settings['basename'], $this->settings['url'] . 'css/styles.css', false, $this->settings['version']);
      wp_enqueue_style($this->settings['basename']);
    }

  }

  new acf_cso();

endif;
