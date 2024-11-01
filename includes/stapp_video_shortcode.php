<?php

include_once STAPP_VIDEO_PLUGIN_DIR."/includes/db/stapp_video_readData.php";

class stapp_video_shortcode
{

    // read Inputfile form path
    function getShortCode($atts)
    {
        $videoID = $this->checkvideoID($atts);
        if ($videoID > 0) {
                $class = new STAppVideoShortcode();
                $data = $class->getData($videoID);
                return $this->getVideoHTML($data);
        }else {
            return $this->setMessage("No ID was found. Please check your Shortcode.");
        }
    }

    private function checkvideoID($atts){
        if (!isset($atts['id'])) {
            return 0;
        }
        $videoID = $atts['id'];
        if (is_int($videoID )) {
            return 0;
        }
        if ($videoID > get_option('stapp_video_counter') || $videoID < 0){
            return 0;
        }
        return $videoID;
    }


    //replace parameter form list
    private function replaceByKey($key, $atts, $shortcode_string)
    {
        $shortcode_string = str_ireplace("{".$key."}", $atts, $shortcode_string);
        return $shortcode_string;
    }

    //replace in string
    private function replaceInString($old, $new, $string)
    {
        $string = str_ireplace($old, $new, $string);
        return $string;
    }

    private function setMessage($message){
        return "<div>".$message."</div>"."<br>";
    }





    private function getVideoHTML($data){

        $html = $this->getVideoSourceHTML($data);
        $html = $this->replaceByKey("source_template",$html, $this->getTemplate("video_shortcode.html"));
        $html = $this->replaceByKey("video_attributes",$this->getVideoAttributes($data), $html);
        return $html;
    }


    private function getVideoAttributes($data){
        $sAttribute = " class=\"".$this->getValue("class", $data)."\" ";
        $sAttribute = $sAttribute." id=\"".$this->getValue("class", $data)."_".$this->getValue("videoid", $data)."\" ";
        if ($this->isAttributeSet($data, "checkbox_enable_autoplay")){
            $sAttribute = $sAttribute." autoplay ";
        }
        if ($this->isAttributeSet($data, "checkbox_enable_loop")){
            $sAttribute = $sAttribute." loop ";
        }
        if ($this->isAttributeSet($data, "checkbox_enable_mute")){
            $sAttribute = $sAttribute." muted ";
        }
        if ($this->isAttributeSet($data, "checkbox_enable_controls")){
            $sAttribute = $sAttribute." controls ";
        }
        if ($this->isAttributeSet($data, "checkbox_enable_playsinline")){
            $sAttribute = $sAttribute." playsinline ";
        }
        if ($this->isAttributeSet($data, "checkbox_enable_preload")){
            $sAttribute = $sAttribute." preload=\"auto\" ";
        }else{
            $sAttribute = $sAttribute." preload=\"none\" ";
        }
        $sAttribute = $sAttribute." poster=\"".$this->getValue("fallback_image_path", $data)."\" ";
        $sAttribute = $sAttribute." style=\"width: 100%;\"";
        return $sAttribute;
    }


    private function isAttributeSet($data, $key){
        if ($data[$key]=="on"){
            return true;
        }
        else false;
    }



    private function getVideoSourceHTML($data){

        $html = "";
        $MinValue = 0;
        foreach ($data as $key => $value){
            if (strpos($key,'video_')!==false && strpos($key,'_path')!==false){
                if ($this->getValue($key,$data)!==""){
                    $template = $this->getTemplate("source_template.html");
                    // Video Path
                    $template = $this->replaceByKey("video_path",$this->getValue($key,$data), $template );
                    // Checkbox Path

                    $template = $this->replaceByKey("type",$this->getValue($this->replaceInString('_path', '_type', $key),$data), $template );
                    // Checkbox Min and Max Range
                    $MaxValue = $MinValue-1;
                    if ($this->isAttributeSet($data, $this->replaceInString('_path', '_checkbox_individual_breakpoint', $key))){
                        $MinValue = $this->getValue($this->replaceInString('_path', '_breakpoint', $key),$data);

                    }else{
                        $MinValue = get_option( "stapp_".$this->replaceInString('_path', '', $key)."_default_breakpoint" );
                    }
                    $template = $this->replaceByKey("media",$this->getMediaString($MinValue,$MaxValue), $template );
                    $html = $html.$template;
                }
            }
        }
        return $html;
    }

    private function getTemplate($template){
        return file_get_contents(STAPP_VIDEO_PLUGIN_DIR .'/template/'.$template);
    }


    private function getValue($key, $data){
        return $data[$key];
    }


    private function getMediaString($min, $max){
        $key = "media=\"all";

        if ($min>0){
            $key = $key." and (min-width:".$min."px)";
        }
        if ($max>0){
            $key = $key." and (max-width:".$max."px)";
        }

        $key = $key."\"";
        return $key;
    }




}
