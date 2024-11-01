<?php
// check user capabilities
if ( ! current_user_can( 'manage_options' ) ) {
    return;
}

include_once STAPP_VIDEO_PLUGIN_DIR."/includes/db/stapp_video_readData.php";
include_once STAPP_VIDEO_PLUGIN_DIR."/includes/db/stapp_video_option.php";

$videoID = get_option('stapp_video_counter');

?>
<style>
    <?php
        esc_urL(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/css/styleForOverview.css");
    ?>
</style>
<style>
    <?php
        esc_urL(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/css/styleForGlobalBackend.css");
    ?>
</style>
<style>
    <?php
        esc_urL(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/css/styleForOverlay.css");
    ?>
</style>
<script>
    <?php
    esc_js(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/js/FrontendScript.js");
    ?>
</script>
<style>
    <?php
        if (!checkSTAppVideoConfigExists()){
        esc_urL(include_once STAPP_VIDEO_PLUGIN_DIR."/includes/css/proversion_stylesheet.css");
        }
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
        esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/OverviewSubMenuHTML_HelpBox.php");
    ?>
    <?php
        esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/OverviewSubMenuHTML_HelpDialog.php");
    ?>

    <br>
    <div>
        <a class="divButton" href="<?php echo esc_url("admin.php?page=stappvideo_new&videoID="); ?><?php echo $videoID ?>"><?php esc_html_e( "New Video", 'stapp_video' ); ?></a>
    </div>
    <br>
    <?php
        if (!checkSTAppVideoConfigExists()){
            esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/OverviewSubMenuHTML_Message.php");
        }
    ?>
    <div class="config_block" style="display: none;">
        <div class="config_border">
            <div class="config_border_headline"><?php esc_html_e( "General Configuration", 'stapp_video' ); ?></div>
            <div class="config_border_container float_layout_left">
                <?php
                    esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/image/config_icon.svg");
                ?>
                <div class="normal_layout">


                </div>
            </div>
        </div>
    </div>
    <?php
            echo getSTAppVideoDataForOverview();
    ?>
</div>
