

jQuery(document).ready( function() {
    setEnableVideoBreakpoint('#video_desktop_4k_checkbox_individual_breakpoint','#video_desktop_4k_breakpoint');
    setEnableVideoBreakpoint('#video_desktop_hd_checkbox_individual_breakpoint','#video_desktop_hd_breakpoint');
    setEnableVideoBreakpoint('#video_desktop_checkbox_individual_breakpoint','#video_desktop_breakpoint');
    setEnableVideoBreakpoint('#video_tablet_checkbox_individual_breakpoint','#video_tablet_breakpoint');
    setEnableVideoBreakpoint('#video_phone_checkbox_individual_breakpoint','#video_phone_breakpoint');
    checkConfigurtation();
});



function setEnableVideoBreakpoint($cToogle, $cInput) {
        document.querySelector($cInput).disabled = !document.querySelector($cToogle).checked;
}

function setActionForAutoplay($cAutoplayToogle, $cMutedToogle, $cMessages,$sMessageText) {
    if (document.querySelector($cAutoplayToogle).checked) {
        document.querySelector($cMutedToogle).checked = true;
        setMessage($cMessages, $sMessageText);
    }else{
        clearConfigMessage($cMessages);
    }
}

function clearConfigMessage($cMessages){
    document.querySelector($cMessages).innerHTML = '';
}


function setMessage($cMessages,$sMessageText){
    document.querySelector($cMessages).innerHTML = $sMessageText;
}


function openImageUploader($cTargetID){
    let send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

        console.log("isAllowedImageType:"+isAllowedImageType(attachment.url));
        if (isAllowedImageType(attachment.url)){
            document.querySelector(replaceInString('_path','_message',$cTargetID)).innerHTML = '';
            jQuery($cTargetID).val(attachment.url);
        }else{
            document.querySelector(replaceInString('_path','_message',$cTargetID)).innerHTML = 'File format not supported';
            jQuery($cTargetID).val('');
        }

        wp.media.editor.send.attachment = send_attachment_bkp;
        checkConfigurtation();
    }

    wp.media.editor.open();

    return false;
}

function isAllowedImageType($filename){
    let fileExt = getFileExtendion($filename);
    var result = false;
    const AllowedImageFormats = [".jpg", ".png", ".jpeg",".gif"];
    AllowedImageFormats.forEach( function (element) {
            console.log(element+" "+fileExt+" "+element==fileExt);
            if (element==fileExt){
                result = true;
            }
        }
    );
    return result;
}


function openMediaUploader($cTargetID){


        let send_attachment_bkp = wp.media.editor.send.attachment;

        wp.media.editor.send.attachment = function(props, attachment) {

            let $filetype = getVideoType(attachment.url);
            if ($filetype == 'nd'){

                document.querySelector(replaceInString('_path','_message',$cTargetID)).innerHTML = 'File format not support from browser';
                jQuery(replaceInString('_path','_type',$cTargetID)).val('');
                jQuery($cTargetID).val('');
            }else if ($filetype == ''){
                document.querySelector(replaceInString('_path','_message',$cTargetID)).innerHTML = '';
                jQuery(replaceInString('_path','_type',$cTargetID)).val('');
                jQuery($cTargetID).val('');
            }else{
                document.querySelector(replaceInString('_path','_message',$cTargetID)).innerHTML = '';
                jQuery(replaceInString('_path','_type',$cTargetID)).val($filetype);
                jQuery($cTargetID).val(attachment.url);
            }


            //jQuery('.custom_media_id').val(attachment.id);

            wp.media.editor.send.attachment = send_attachment_bkp;
            checkConfigurtation();
        }

        wp.media.editor.open();

        return false;
}


function replaceInString($old, $new, $string){
    return $string.replace($old, $new);
}

function getVideoType($filename){
    let fileExt = getFileExtendion($filename);
    let VIDEO_TYPE = 'video/';
    if (fileExt == '.mp4'){
        return VIDEO_TYPE + 'mp4';
    }else if (fileExt == '.webm'){
        return VIDEO_TYPE + 'webm';

    }else if (fileExt == '.ogg'){
        return VIDEO_TYPE + 'ogg';
    }else if (fileExt.length>0){
        return 'nd';
    }else{
        return ''
    }
}



function getFileExtendion($filename){
    return $filename.substring($filename.lastIndexOf('.')).toLowerCase();
}

function clearMediaPath($cTargetID){
    jQuery($cTargetID).val('');
    checkConfigurtation();
}


function checkConfigurtation(){

    checkVideoIsSet();
    checkFallbackIsSet();

    function checkVideoIsSet(){
        var $isset = false;
        document.querySelectorAll('.video_path').forEach(function ($element){
            if ($element.value.length>0){
                $isset = true;
            }
        });
        displayMessage('stapp-video-error-no-video',!$isset);
    }

    function checkFallbackIsSet(){
        var $isset = false;
        let $element = document.getElementById('fallback_image_path')
        if ($element.value.length>0){
            $isset = true;
        }
        displayMessage('stapp-video-error-no-fallback',!$isset);
    }

    function displayMessage($id, $visible){
        if ($visible){
            document.getElementById($id).classList.remove('hidden');
        }else{
            document.getElementById($id).classList.add('hidden');
        }
    }

}