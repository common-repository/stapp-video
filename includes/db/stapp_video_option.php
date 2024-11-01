<?php




function stapp_video_get_option($key){
    $c = new stapp_calculator_option();
    return $c->get($key);
}

function stapp_video_set_option($key,$value){
    $c = new stapp_calculator_option();
    return $c->set($key,$value);
}

function stapp_video_increase_option($key){
    $c = new stapp_calculator_option();
    return $c->increaseOption($key);
}


class stapp_video_option
{


    function get($optionKey){
        return $this->getOption($optionKey);
    }


    function set($optionKey, $value){
        $this->updateOption($optionKey,$value);
    }


    function increaseOption($optionKey){
        $this->updateOption($optionKey,$this->getOption($optionKey)+1);
    }


    private function updateOption($optionKey, $value){
        $this->optionExists($optionKey);
        update_option($optionKey, $value);
    }

    private function getOption($optionKey){
        $this->optionExists($optionKey);
        return get_option($optionKey);
    }

    private function optionExists($optionKey){
        $option = trim( get_option($optionKey));
        if ( empty( $option ) ) {
           $this->addOption($optionKey, null);
        }
    }


    private function addOption($optionKey,$initalValue) {
        add_option( $optionKey, $initalValue );
    }
}