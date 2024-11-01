<?php
// check user capabilities
if ( ! current_user_can( 'manage_options' ) ) {
    return;
}


include_once STAPP_VIDEO_PLUGIN_DIR."/includes/db/stapp_video_global_db.php";
include_once STAPP_VIDEO_PLUGIN_DIR."/includes/db/stapp_video_readData.php";
include_once STAPP_VIDEO_PLUGIN_DIR."/includes/db/stapp_video_option.php";

$videoID = get_option('stapp_video_counter');
$isMaxLimit = false;
$isSaved = false;
if ( isset($_GET['videoid']) ){
    $videoID=checkSTAppVideoID(sanitize_key($_GET['videoid']));
}elseif (isset($_POST['videoid'])){
    $data = sanitize_post($_POST);
    $videoID=checkSTAppVideoID($data['videoid']);
    $isSaved = true;
}else{
    $isMaxLimit = checkSTAppVideoCounter();
}



$classDesignModus = getSTappVideoStyleClassDesignModus();

$videoData = getSTAppDataForVideo($videoID);


?>

<style>
    <?php
        esc_urL(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/css/styleForCreate.css");
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
    esc_js(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/js/BackendScript.js");
    ?>
</script>
<style>
    <?php
        if ($isMaxLimit){
        esc_urL(include_once STAPP_VIDEO_PLUGIN_DIR."/includes/css/proversion_stylesheet.css");
        }
    ?>
</style>
 <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
     <?php
     // output security fields for the registered setting "wporg_options"
     settings_fields( 'manage_options' );
     // output setting sections and their fields
     // (sections are registered for "wporg", each field is registered to a specific section)
     do_settings_sections( 'manage_options' );
     ?>
     <?php
     if ($isSaved){
         esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/CreateSubMenuHTML_SaveMessage.php");
     }
     ?>
     <?php
        esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/CreateSubMenuHTML_NoVideoMessage.php");
     ?>
     <?php
        esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/CreateSubMenuHTML_NoImageMessage.php");
     ?>
     <br>
     <?php
        esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/OverviewSubMenuHTML_HelpBox.php");
     ?>
     <?php
        esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/CreateSubMenuHTML_HelpDialog.php");
     ?>
     <br>
     <?php
     if ($isMaxLimit){
         esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/CreateSubMenuHTML_ProPage.php");
     }else{
         esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/admin/menu/CreateSubMenuHTML_Form.php");
     }
     ?>
 </div>
