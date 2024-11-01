<?php
/**
 * @package STAppVideo
 */
/*
Plugin Name: STApp Video
Plugin URI: https://dev-wordpress.com/forum/
Description: Insert videos on any postion via shortcode
Version: 1.6
Author: STApp Professional GmbH
Author URI: https://stapp-professional.de
Text Domain: stapp_video
Domain Path: /languages
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/


if ( ! defined('ABSPATH')){
    die;
}





define( 'STAPP_VIDEO_VERSION', '1.6' );

define( 'STAPP_VIDEO_REQUIRED_WP_VERSION', '5.7' );

define( 'STAPP_VIDEO_PLUGIN', __FILE__ );

define( 'STAPP_VIDEO_PLUGIN_BASENAME', plugin_basename( STAPP_VIDEO_PLUGIN ) );

define( 'STAPP_VIDEO_PLUGIN_NAME', trim( dirname( STAPP_VIDEO_PLUGIN ), '/' ) );

define( 'STAPP_VIDEO_PLUGIN_DIR', untrailingslashit( dirname( STAPP_VIDEO_PLUGIN ) ) );

if ( ! defined( 'STAPP_VIDEO_LOAD_JS' ) ) {
    define( 'STAPP_VIDEO_LOAD_JS', true );
}

if ( ! defined( 'STAPP_VIDEO_LOAD_CSS' ) ) {
    define( 'STAPP_VIDEO_LOAD_CSS', true );
}

function stapp_video_text_domain() {
    load_plugin_textdomain( 'stapp_video', false, basename( dirname(__FILE__) ) . '/languages' );
}

add_action( 'plugins_loaded', 'stapp_video_text_domain' );

require_once STAPP_VIDEO_PLUGIN_DIR.'/stapp_video_settings.php';




