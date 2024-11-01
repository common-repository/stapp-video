<?php

require_once STAPP_VIDEO_PLUGIN_DIR."/includes/db/stapp_video_data_validation.php";

class stapp_video_writeData{

    function write($data){
        $videoID = $this->checkvideoID($data['videoid']);
        if ($videoID!==-0) {
            $this->delete($videoID);
            $this->insert($data, $videoID);
            update_option('stapp_video_counter', get_option('stapp_video_counter') + 1);
            
        }
    }


    function insert($data, $videoID){
        $videoID = $this->checkvideoID($videoID);
        if ($videoID!==-1){
            global $wpdb;
            $tables = $this->getTables();
            $table = $tables["tblvideosetting"];

            foreach ($data as $key => $value){
                $key = $this->validation_key($key);
                if ($this->checkIsAllowedKey($key)){
                    $wpdb->query($wpdb->prepare("INSERT INTO `$table` (`video_id`, `key`, `value`) VALUE (%s , %s, %s) ", $videoID, $key , $this->validation_value($key, $value)));
                }
            }
        }
    }

    function delete($videoID){
        $videoID = $this->checkvideoID($videoID);
        if ($videoID!==-1) {
            global $wpdb;
            $tables = $this->getTables();
            foreach ($tables as $table) {
                $wpdb->query($wpdb->prepare("DELETE FROM `$table` WHERE VIDEO_ID=%s", $videoID));
            }
        }
    }


    private function getTables(){
        $class = new stapp_video_global_db();
        return $class->getTables();
    }

    private function checkIsAllowedKey($keyToCheck){
        foreach($this->getAllowedKeys() as $key => $value ){
            if (strpos($keyToCheck,$key)!==false){
                return true;
            }
        }
        return false;
    }


    private function getAllowedKeys(){
        $class = new stapp_video_global_db();
        return $class->getDefaultDataVideo(-1);
    }



    private function getVideoTyp($videoTitle){
        if ($videoTitle == "webm"){
            return "video/webm";
        }elseif ($videoTitle == "ogg"){
            return "video/ogg";
        }else{
            return "video/mp4";
        }
    }


    private function checkvideoID($videoID){
        if (!is_numeric($videoID)){
            return -1;
        }elseif($videoID>get_option('stapp_video_counter') || $videoID<0){
            return -1;
        }return $videoID;
    }

    private function validation_key($key){
        return sanitize_key($key);
    }

    private function validation_value($key, $value){
        $class = new stapp_video_data_validation();
        if ($class->validate($key,$value)){
            return $value;
        }
        return '';
    }


}


class stapp_video_unlock_plugin{

    function unlock($data){
        if ($this->checkKey($data)){
            $this->setunlockPlugin();
        }
    }


    private function checkKey($data){
        $key = 'unlock_key';
        if ($this->isKeyIsSet($data, $key)) {
            $value = sanitize_key($this->getValue($data,$key));
            $GLOBALS['Stapp_Video_Result_Type']["value"] = $this->getValue($data,$key);
            $GLOBALS['Stapp_Video_Result_Type']["message"] = $this->checkValue($value);
            if (empty($GLOBALS['Stapp_Video_Result_Type']["message"])){
                return true;
            }
        }
        return false;
    }

    private function isKeyIsSet($data, $key){
        if ( isset($data[$key]) ){
            return true;
        }
        $GLOBALS['Stapp_Video_Result_Type']["message"] = __( "You entered no licence key!", 'stapp_video' );
        return false;
    }

    private function getValue($data, $key){
        return $data[$key];
    }


    private function checkValue($value){
        if (empty ($value)){
            return __( "You entered no licence key!", 'stapp_video' );
        }else {
            $value = $this->replaceByKey("-", "", $value);
            if ( strlen( $value ) != 16){
                return __( "You entered a incorrect licence key!", 'stapp_video' );
            }else{
                if ($this->checkValueList(str_split ( $value , 1 ))){
                    return "";
                } else{
                    return __( "You entered a worng licence key!", 'stapp_video' );
                }
            }
        }
    }

    private function checkValueList($list){
        $i = 0;

        $ref = $this->refList();
        foreach ($list as $item){
            if (chr($ref[$i]) != $item){
                return false;
            }
            $i++;
        }
        return true;

    }


    private function refList(){
        return [
            0 => '114',
            1 =>  '117',
            2 =>  '53',
            3 =>  '103',
            4 =>  '114',
            5 =>  '56',
            6 =>  '103',
            7 =>  '101',
            8 =>  '97',
            9 =>  '114',
            10 => '57',
            11 => '113',
            12 => '118',
            13 => '56',
            14 => '97',
            15 => '122',
        ];
    }

    //replace parameter form list
    private function replaceByKey($old, $new, $shortcode_string)
    {
        $shortcode_string = str_ireplace($old, $new, $shortcode_string);
        return $shortcode_string;
    }

    private function setunlockPlugin(){
        update_option('stapp_video_pro_value', 1);
    }

}
