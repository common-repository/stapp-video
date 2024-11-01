<?php


require_once STAPP_VIDEO_PLUGIN_DIR.'/includes/stapp_video_shortcode.php';
require_once STAPP_VIDEO_PLUGIN_DIR.'/includes/stapp_activate_plugin.php';
require_once STAPP_VIDEO_PLUGIN_DIR.'/includes/functions.php';


/**
 * Activate the plugin.
 */

register_activation_hook( STAPP_VIDEO_PLUGIN, 'stapp_video_plugin_activate' );

function stapp_video_plugin_activate() {

    $cactivate = new stapp_video_activate_plugin();
    $cactivate->checkDBVersion();


}



add_shortcode("stapp_video", "stapp_shortcode_video");

function stapp_shortcode_video($atts)
{
    $cshortcode = new stapp_video_shortcode();
    return $cshortcode->getShortCode($atts);
}

add_action( 'wp_enqueue_scripts', 'stapp_videofrontendEnqueue', 10, 0);

function stapp_videofrontendEnqueue(){
    error_log("stapp_frontendEnqueue");
    error_log(stapp_video_plugin_url('/includes/js/FrontendScript.js'));
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'STAppFrontendVideoScript', stapp_video_plugin_url('/includes/js/FrontendScript.js'),array( 'jquery' ), STAPP_VIDEO_VERSION,true);
}


add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );


if ( is_admin() ) {
    require_once STAPP_VIDEO_PLUGIN_DIR.'/admin/admin.php';
}


