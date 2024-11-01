<?php



// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}


//remove option
stapp_video_delete_plugin(array('stapp_video_version', 'stapp_video_counter','stapp_video_phone_default_breakpoint', 'stapp_video_tablet_default_breakpoint',  'stapp_video_desktop_default_breakpoint', 'stapp_video_desktop_hd_default_breakpoint', 'stapp_video_desktop_4k_default_breakpoint','stapp_video_design_modus', 'stapp_video_pro_value', 'stapp_video_show_cHD', 'stapp_video_show_oHD'), 'options');
//remove menu
stapp_video_delete_plugin(array('stappvideo', 'stappvideo_new', 'stappvideo_pro_version'), 'menu_page');
//remove shortcode
stapp_video_delete_plugin(array('stapp_video'), 'shortcode');
//remove shortcode
stapp_video_delete_plugin(array('STAppFrontendVideoScript', 'STAppBackendVideoScript'), 'script');





function stapp_video_delete_plugin($keys, $type){
    foreach ($keys as $key){
        if ('options' === $type){
            delete_option($key);
        }elseif ('menu_page' === $type){
            remove_menu_page($key);
        }elseif ('shortcode' === $type){
            remove_shortcode($key);
        }elseif ('script' === $type){
            wp_dequeue_script($key);
        }
    }
}



// drop a custom database table
global $wpdb;

$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}stapp_video_setting");

