<?php
// check user capabilities
if ( ! current_user_can( 'manage_options' ) ) {
    return;
}

include_once STAPP_VIDEO_PLUGIN_DIR."/includes/db/stapp_video_readData.php";



?>

<style>
    <?php
        esc_urL(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/css/styleForGlobalBackend.css");
    ?>
</style>
<style>
    <?php
        esc_urL(include_once STAPP_VIDEO_PLUGIN_DIR."/includes/css/proversion_stylesheet.css");
    ?>
</style>

<div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
    <?php
    // output security fields for the registered setting "wporg_options"
    settings_fields( 'manage_options' );
    // output setting sections and their fields
    // (sections are registered for "wporg", each field is registered to a specific section)
    do_settings_sections( 'manage_options' );
    ?>
    <br>
    <?php
    if (checkSTAppVideoIsProEnabled()){
        esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/ProVersionSubMenuHTML_Message.php");
    }else{
        esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/ProVersionSubMenuHTML_Form.php");
        esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/CreateSubMenuHTML_ProPage.php");
    }
    ?>
</div>