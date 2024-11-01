<?php



class stapp_video_global_db
{

    function getTables()
    {
        global $wpdb;
        return array("tblvideosetting" => "{$wpdb->prefix}" . "stapp_video_setting");

    }

    function getDefaultDataVideo($ID){
        $array = [
            "class" => "stapp_video_section",
            "videoid" => $ID,
            "shortcode_string" => "[stapp_video id=".$ID."]",
            "width"=> "100%",
            "video_title" => "Video ".$ID." Configuration from ".$this->getCurrentTime(),
            "checkbox_enable_autoplay" => "off",
            "checkbox_enable_loop" => "off",
            "checkbox_enable_mute" => "off",
            "checkbox_enable_preload" => "off",
            "checkbox_enable_playsinline" => "off",
            "checkbox_enable_controls" => "off",
            "fallback_image_path" => "",
            "fallback_image_type" => "",
            "video_desktop_4k_path" => "",
            "video_desktop_4k_type" => "",
            "video_desktop_4k_checkbox_individual_breakpoint" => "off",
            "video_desktop_hd_path" => "",
            "video_desktop_hd_type" => "",
            "video_desktop_hd_checkbox_individual_breakpoint" => "off",
            "video_desktop_path" => "",
            "video_desktop_type" => "",
            "video_desktop_checkbox_individual_breakpoint" => "off",
            "video_tablet_path" => "",
            "video_tablet_type" => "",
            "video_tablet_checkbox_individual_breakpoint" => "off",
            "video_phone_path" => "",
            "video_phone_type" => "",
            "video_phone_checkbox_individual_breakpoint" => "off",
            "video_desktop_4k_breakpoint" => get_option( "stapp_video_desktop_4k_default_breakpoint" ),
            "video_desktop_hd_breakpoint" => get_option( "stapp_video_desktop_hd_default_breakpoint" ),
            "video_desktop_breakpoint" => get_option( "stapp_video_desktop_default_breakpoint" ),
            "video_tablet_breakpoint" => get_option( "stapp_video_tablet_default_breakpoint" ),
            "video_phone_breakpoint" => get_option( "stapp_video_phone_default_breakpoint" ),
        ];
        return $array;
    }

    private function getCurrentTime(){
        $timestamp = time();
        $datum = date("d.m.Y - H:i", $timestamp);
        return $datum;
    }
}


function checkSTAppVideoID($videoID){
    if (!is_numeric($videoID)){
        return get_option('stapp_video_counter');
    }elseif($videoID<0){
        return get_option('stapp_video_counter');
    }return $videoID;
}


function getSTappVideoDesignModus(){
    return get_option('stapp_video_design_modus');
}

function getSTappVideoStyleClassDesignModus(){
    $ClassID = getSTappVideoDesignModus();
    if ($ClassID==1){
        return "black_modus";
    }else{
        return "white_modus";
    }
}