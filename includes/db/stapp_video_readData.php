<?php

include_once STAPP_VIDEO_PLUGIN_DIR."/includes/db/stapp_video_global_db.php";



function getSTAppVideoDataForOverview(){
    $class = new STAppVideoOverviewMenu();
    return $class->getData();
}


class STAppVideoOverviewMenu {

        function getData(){
            $content = '';
            foreach ($this->selectData() as $values){
                $content = $content.$this->getVideoHTMLTemplate();
                $content = $this->replaceText($content);
                foreach ($values as $key => $value){
                    $content = $this->replaceByKey($key,$value,$content);
                }
            }
            return $content;
        }



        private function selectData(){
            global $wpdb;
            $tblsettings = $this->getTables()["tblvideosetting"];
            $sql = "SELECT shortcode, video_title, videoID
            FROM 
            (SELECT `VIDEO_ID`, `VIDEO_ID` as videoID FROM `$tblsettings` GROUP BY videoID) sd
            INNER JOIN
            (SELECT `value` as video_title ,`VIDEO_ID` FROM `$tblsettings` WHERE `key`= \"video_title\") as video_title on video_title.`VIDEO_ID`=sd.`VIDEO_ID`
            LEFT JOIN
            (SELECT `value` as shortcode ,`VIDEO_ID` FROM `$tblsettings` WHERE `key`= \"shortcode_string\") as shortcode on shortcode.`VIDEO_ID`=sd.`VIDEO_ID`
            ORDER BY sd.`VIDEO_ID`;";
            return $wpdb->get_results($sql);
        }


        private function getVideoHTMLTemplate(){
                return file_get_contents(STAPP_VIDEO_PLUGIN_DIR .'/template/video_overview_template.html');
        }



        private function getTables(){
            $cDataset = new stapp_video_global_db();
            return $cDataset->getTables();
        }

        //replace parameter form list
        private function replaceByKey($key, $atts, $shortcode_string)
        {
            $shortcode_string = str_ireplace("{".$key."}", $atts, $shortcode_string);
            return $shortcode_string;
        }



        private function replaceText($content){
            $content = $this->replaceByKey( "text_label_shortcode", __( "Shortcode", 'stapp_video' ), $content);
            $content = $this->replaceByKey("text_change", __( "Change", 'stapp_video' ),  $content);
            $content = $this->replaceByKey("text_delete",__( "Delete", 'stapp_video' ),  $content);
            $content = $this->replaceByKey("text_cancel",__( "Cancel", 'stapp_video' ),  $content);
            $content = $this->replaceByKey("text_dialog_title", __( "Delete Video Configuration", 'stapp_video' ),  $content);
            $content = $this->replaceByKey("text_dialog_text", __( "Are you sure you want to delete this video configuration?", 'stapp_video' ),  $content);
            return $content;
        }


}


function getSTAppDataForVideo($videoID){
    $class = new STAppVideoCreateVideo();
    return $class->getData($videoID);
}


class STAppVideoCreateVideo{

    function getData($videoID){
        if ($videoID==get_option('stapp_video_counter')){
            return $this->getDefaultData($videoID);
        }else{
            return $this->getSelectedData($videoID);
        }
    }


    function getSelectedData($videoID){
        $array = $this->getDefaultData($videoID);
        foreach ($this->selectSettingsData($videoID) as $value) {
            $array[$value->setting] = $value->value;
        }
        return $array;
    }




    private function selectSettingsData($videoID){
        global $wpdb;
        $tblsettings = $this->getTables()["tblvideosetting"];
        $sql = $wpdb->prepare("SELECT `key` as setting, `value` FROM `$tblsettings` as sd WHERE sd.`VIDEO_ID`=%d;",$videoID);
        return $wpdb->get_results($sql);
    }


    private function getTables(){
        $cDataset = new stapp_video_global_db();
        return $cDataset->getTables();
    }

    private function getDefaultData($videoID){
        $cDataset = new stapp_video_global_db();
        return $cDataset->getDefaultDataVideo($videoID);
    }

}


function getSTAppValueForVideo($array, $searchKey){
    if (array_key_exists ( $searchKey , $array )){
        return $array[$searchKey];
    }
    return "";
}


class STAppVideoShortcode{

    function getData($videoID){
        return $this->getSelectedData($videoID);
    }

    function getSelectedData($videoID){
        $array = $this->getDefaultData($videoID);
        foreach ($this->selectSettingsData($videoID) as $value) {
            $array[$value->setting] = $value->value;
        }
        return $array;
    }


    private function selectSettingsData($videoID){
        global $wpdb;
        $tblsettings = $this->getTables()["tblvideosetting"];
        $sql = $wpdb->prepare("SELECT `key` as setting, `value` FROM `$tblsettings` as sd WHERE sd.`VIDEO_ID`=%d;",$videoID);
        return $wpdb->get_results($sql);
    }

    private function getTables(){
        $cDataset = new stapp_video_global_db();
        return $cDataset->getTables();
    }

    private function getDefaultData($videoID){
        $cDataset = new stapp_video_global_db();
        return $cDataset->getDefaultDataVideo($videoID);
    }

}

function checkSTAppVideoCounter(){
    $cClass = new STAppVideoAdjustment();
    return $cClass->isMax();
}

function checkSTAppVideoConfigExists(){
    $cClass = new STAppVideoAdjustment();
    return $cClass->checkExists();
}

function checkSTAppVideoIsProEnabled(){
    $cClass = new STAppVideoAdjustment();
    return $cClass->isEnabled();
}

class STAppVideoAdjustment{


    function isEnabled(){
        return $this->isProEnabeled();
    }


    function isMax(){
        if ($this->isProEnabeled()){
            return false;
        }
        if ($this->getCurrentCounter()>=$this->getMaxLimit()){
            return true;
        }
        else false;
    }

    function checkExists(){
        if ($this->getCurrentCounter()>0){
            return true;
        }
        else false;
    }

    function getCurrentCounter(){
        $count = -1;
        foreach ($this->selectSettingsData() as $value) {
            $count = $value->count;
        }

        return $count;
    }

    private function selectSettingsData(){
        global $wpdb;
        $tblsettings = $this->getTables()["tblvideosetting"];
        $sql = "SELECT count(counter) as `count` FROM ( SELECT count(video_id) as `counter` FROM `$tblsettings` group by video_id ) as counter";
        return $wpdb->get_results($sql);
    }

    private function getTables(){
        $cDataset = new stapp_video_global_db();
        return $cDataset->getTables();
    }

    private function getMaxLimit(){
        return 5;
    }

    private function isProEnabeled(){
        if (get_option('stapp_video_pro_value') == 1){
            return true;
        }
        return false;
    }


}