<?php

include_once STAPP_VIDEO_PLUGIN_DIR.'/includes/db/stapp_video_writeData.php';
include_once STAPP_VIDEO_PLUGIN_DIR."/includes/stapp_activate_plugin.php";

/*
 * Message / Result
 */

$Stapp_Video_Result_Type = [
    'message' => '',
    'value' => '',
    'success' => false
    ];


add_action( 'admin_init', 'stapp_video_admin_init', 10, 0 );

function stapp_video_admin_init() {
    do_action( 'stapp_video_admin_init' );
}

add_action( 'admin_menu', 'stapp_video_admin_menu', 9, 0 );


function stapp_video_admin_menu() {
    do_action( 'stapp_video_admin_menu' );

    $c = new stapp_video_activate_plugin();
    $c->checkDBVersion();


    global $_wp_last_object_menu;

    $_wp_last_object_menu++;

    add_menu_page(
        __( 'Video Overview', 'stapp_video' ),
        __( 'Video', 'stapp_video' ),
        'manage_options',
        'stappvideo',
        'stapp_video_page_mainmenu_html',
        'dashicons-playlist-video',
        $_wp_last_object_menu
    );

    $edit = add_submenu_page(
        'stappvideo',
        __( 'Video Overview', 'stapp_video' ),
        __( 'Overview', 'stapp_video' ),
        'manage_options',
        'stappvideo',
        'stapp_video_page_mainmenu_html'
    );

    add_action( 'load-' . $edit, 'stapp_video_overview_admin', 10, 0 );


    $addnew = add_submenu_page(
        'stappvideo',
        __( 'Setup new Video', 'stapp_video' ),
        __( 'New', 'stapp_video' ),
        'manage_options',
        'stappvideo_new',
        'stapp_video_page_create_html'
    );

    add_action( 'load-' . $addnew, 'stapp_video_create_admin', 10, 0 );


    if (!checkSTAppVideoIsProEnabled()) {
        $stapp_pro_page = add_submenu_page(
            'stappvideo',
            __('STApp Video Pro Version', 'stapp_video'),
            __('Pro Version', 'stapp_video'),
            'manage_options',
            'stappvideo_pro_version',
            'stapp_video_page_proversion_html'
        );

        add_action('load-' . $stapp_pro_page, 'stapp_video_proversion_admin', 10, 0);
    }
}

function stapp_video_page_mainmenu_html(){
    require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/OverviewSubMenuHTML.php";
}

function stapp_video_page_create_html(){
    require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/CreateSubMenuHTML.php";
}

function stapp_video_page_proversion_html(){
    require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/ProVersionSubMenuHTML.php";
}


function stapp_video_overview_admin(){
    if ( isset($_GET['action']) ){
        if (sanitize_key($_GET['action'])== "delete"){
            if ( isset($_GET['videoid']) ) {
                $cdatabase = new stapp_video_writeData;
                $cdatabase->delete(sanitize_key($_GET['videoid']));
            }
        }
    }
}

function stapp_video_create_admin(){
    if ( isset($_POST['save_action']) ){
        $data = sanitize_post($_POST);
        $cdatabase = new stapp_video_writeData;
        return $cdatabase->write($data);
    }
}


function stapp_video_proversion_admin(){
    $GLOBALS['Stapp_Video_Result_Type']['message'] = '';
    $GLOBALS['Stapp_Video_Result_Type']['success'] = false;
    if ( isset($_POST['unlock_action']) ){
        $data = sanitize_post($_POST);
        $cClass = new stapp_video_unlock_plugin();
        $cClass->unlock($data);
    }

}

