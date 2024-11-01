<?php

include_once STAPP_VIDEO_PLUGIN_DIR."/includes/db/stapp_video_global_db.php";


class stapp_video_create_tables
{

    function createTable(){
        $this->createVideoSettingTable();
    }


    private function createVideoSettingTable(){
        global $wpdb;
        $class = new stapp_video_global_db();
        $table_name = $class->getTables()["tblvideosetting"];
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            `setting_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
            `video_id` int(6) unsigned NOT NULL,
            `key` varchar(255) COLLATE latin1_german1_ci NOT NULL,
            `value` varchar(255) COLLATE latin1_german1_ci NOT NULL,
            `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (setting_id)
        ) $charset_collate;";
        $wpdb->query($sql);
    }



}
