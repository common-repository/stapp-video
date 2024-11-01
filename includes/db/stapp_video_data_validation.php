<?php


class stapp_video_data_validation{
    const patternForColor = ['hexcode','color'];
    const patternForNumber = ['videoid', 'start', 'end','duration','transparency','position','blur','spread', 'breakpoint'];
    const patternForText = ['path','title','shortcode_string', 'type'];
    const patternForTiming = ['timing_function'];
    const patternForCheckbox = ['checkbox'];

    function validate($key, $value){
        foreach (self::patternForColor as $pattern){
            if (strpos($key,$pattern)!==false){
                return $this->checkColor($value);
            }
        }
        foreach (self::patternForCheckbox as $pattern){
            if (strpos($key,$pattern)!==false){
                return $this->checkCheckbox($value);
            }
        }
        foreach (self::patternForNumber as $pattern){
            if (strpos($key,$pattern)!==false){
                return $this->checkNumber($value);
            }
        }
        foreach (self::patternForText as $pattern){
            if (strpos($key,$pattern)!==false){
                return $this->checkText($value);
            }
        }
        foreach (self::patternForTiming as $pattern){
            if (strpos($key,$pattern)!==false){
                return $this->checkTiming($value);
            }
        }

    }

    function checkColor($value){
        $value = ltrim($value, '#');
        if(ctype_xdigit($value) && (strlen($value) == 6 || strlen($value) == 3)){
            return true;
        }
        return false;
    }


    function checkNumber($value){
        if (!is_numeric($value)){
            return false;
        }
        return true;
    }

    function checkText($value){
        if (is_null($value)){
            return false;
        }return true;
    }

    function checkTiming($value){
        if (is_null($value)){
            return false;
        }elseif (empty($value)){
            return false;
        }elseif ($value!=='linear' && $value!=='ease'&& $value!=='ease-in'&& $value!=='ease-out'&& $value!=='ease-in-out'){
            return false;
        }return true;
    }

    function checkCheckbox($value){
        if (is_null($value)){
            return false;
        }elseif (empty($value)){
            return false;
        }elseif ($value!=='on' && $value!=='off'){
            return false;
        }return true;
    }
}