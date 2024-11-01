<?php

include_once STAPP_VIDEO_PLUGIN_DIR."/includes/db/stapp_video_create_tables.php";

class stapp_video_activate_plugin{



    const DBVERSION = 106;
    const DBVERSION_KEY = 'stapp_video_version';
    const DB_OPTION_ARRAY = [
        'stapp_video_counter' => 1,
        'stapp_video_design_modus'=> 0,
        'stapp_video_pro_value' => 0,
        'stapp_video_phone_default_breakpoint'=> 0,
        'stapp_video_tablet_default_breakpoint' => 500,
        'stapp_video_desktop_default_breakpoint'=> 960,
        'stapp_video_desktop_hd_default_breakpoint'=> 1200,
        'stapp_video_desktop_4k_default_breakpoint' => 1600,
        'stapp_video_show_oHD' => 0,
        'stapp_video_show_cHD' => 0
    ];





    function checkDBVersion(){
        if (!$this->isOptionActivated(self::DBVERSION_KEY)) {
            $this->activate();
        }elseif ($this->getOption(self::DBVERSION_KEY)<self::DBVERSION){
            $this->update();
        }
    }


    private function activate(){
        $this->createVideoTable();
        $this->setVersion();
        $this->setOptions();
    }

    private function update(){
        $this->createVideoTable();
        $this->setOptions();
        $this->updateVersion();
    }


    private function createVideoTable(){
        if (!$this->isOptionActivated(self::DBVERSION_KEY)) {
            $class = new stapp_video_create_tables();
            $class->createTable();
        }
    }


    private function setVersion(){
        $this->checkOption( self::DBVERSION_KEY, self::DBVERSION );
    }

    private function updateVersion(){
        $this->updateOption( self::DBVERSION_KEY, self::DBVERSION );
    }

    private function setOptions(){
        foreach (self::DB_OPTION_ARRAY as $key => $value){
            $this->checkOption( $key, $value );
        }
    }



    private function checkOption($optionKey,$initalValue){
        if (!$this->isOptionActivated($optionKey)){
            $this->setOption($optionKey, $initalValue);
        }
    }

    private function setOption($optionKey,$initalValue) {
        add_option( $optionKey, $initalValue );
    }

    private function updateOption($optionKey,$initalValue) {
        update_option($optionKey, $initalValue );
    }

    private function getOption($optionKey) {
        return get_option($optionKey);
    }

    private function isOptionActivated($optionKey){
        $option = trim( $this->getOption($optionKey));
        if ( empty( $option ) ) {
            return false;
        }
        return true;
    }

}

