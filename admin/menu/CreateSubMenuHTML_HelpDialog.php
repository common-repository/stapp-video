<div id="info_dialog" class="dialog-overlay" style="display:
    <?php
        if (stapp_video_get_option('stapp_video_show_cHD') ==0){
            stapp_video_increase_option('stapp_video_show_cHD');
            echo 'block';
        }else{
            echo 'none';
        }
    ?>"">
    <div class="config_border_container_element_space"></div>
    <div class="overlay_close_container">
        <span class="delete_button" onclick="document.getElementById('info_dialog').style.display='none'" title="Close Modal">
            <svg width="20px" height="20px" viewBox="0 0 80 80" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                <g transform="matrix(1,0,0,1,-60.398,-480.708)">
                    <g transform="matrix(0.709432,0.704774,-0.704774,0.709432,392.828,68.37)">
                        <path d="M119.122,518.889L118.888,479.101L102.796,479.101L102.954,519.304L62.771,519.084L62.771,534.869L102.301,534.758L102.52,574.686L118.888,574.686L118.862,534.905L158.356,534.84L158.356,518.582L119.122,518.889Z" style="fill:url(#_Radial1);"/>
                    </g>
                </g>
                <defs>
                    <radialGradient id="_Radial1" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="matrix(47.7924,0,0,47.7924,110.564,526.894)"><stop offset="0" style="stop-color:rgb(233,0,4);stop-opacity:1"/><stop offset="0.52" style="stop-color:rgb(179,0,3);stop-opacity:1"/><stop offset="1" style="stop-color:black;stop-opacity:1"/></radialGradient>
                </defs>
            </svg>
        </span>
    </div>
    <div class="info_dialog_container" id="info_dialog_container_1">
        <br><br><br><br>
        <br>
        <div class="float_layout_left">
            <div class="overlay_border overlay_border_complete_screen_width float_layout_center">
                <div class="normal_layout config_border_container_element_space">
                    <div class="config_border_container_element_space float_layout_center_top">
                            <b><?php esc_html_e( "Hover to learn more about", 'stapp_video' ); ?></b>
                    </div>
                    <div class="overlay_border hidden_bevor_hover_master overlay_border_tap_height_container overlay_border_complete_screen_width normal_layout_center config_border_container_element_space">
                        <div class=" float_layout_center_top">
                            <?php esc_html_e( "Configuration", 'stapp_video' );?>
                        </div>
                        <div class="hidden_bevor_hover config_border_container_element_space">
                            <div class="float_layout_center_top">
                                <?php esc_html_e( "In this area you can make general settings for starting and playing your video.", 'stapp_video' ); ?>
                                <?php esc_html_e( "Here you can also give the video a title and a description.", 'stapp_video' ); ?>
                                <?php esc_html_e( "If the video has been saved, you can copy the shortcode from here.", 'stapp_video' ); ?>
                            </div>
                            <div class="float_layout">
                                <div class="normal_layout ">
                                    <div class="overlay_border config_border_container_element_space layout_animation" id="layout_animation1">
                                        <b><?php esc_html_e( "Autoplay:", 'stapp_video' ); ?></b>
                                        <div><?php esc_html_e( "Enabled that the video will start playing if page is ready.", 'stapp_video' ); ?>
                                        <?php esc_html_e( "Some Browser will block auto playing if a video is unmuted.", 'stapp_video' ); ?></div>
                                    </div>
                                    <div class="overlay_border config_border_container_element_space layout_animation" id="layout_animation2">
                                        <b><?php esc_html_e( "Loop:", 'stapp_video' ); ?></b>
                                        <div><?php esc_html_e( "The video will start again, every time if is finished.", 'stapp_video' ); ?></div>
                                    </div>
                                </div>

                                <div class="normal_layout ">
                                    <div class="overlay_border config_border_container_element_space layout_animation" id="layout_animation3">
                                        <b><?php esc_html_e( "Mute:", 'stapp_video' ); ?></b>
                                        <div><?php esc_html_e( "Disabled the audio output of the video.", 'stapp_video' ); ?></div>
                                    </div>
                                    <div class="overlay_border config_border_container_element_space layout_animation" id="layout_animation4">
                                        <b><?php esc_html_e( "Controls:", 'stapp_video' ); ?></b>
                                        <div><?php esc_html_e( "The video controls will be display (such as a play/pause button etc).", 'stapp_video' ); ?></div>
                                    </div>
                                </div>

                                <div class="normal_layout ">
                                    <div class="overlay_border config_border_container_element_space layout_animation" id="layout_animation5">
                                        <b><?php esc_html_e( "Play Inline:", 'stapp_video' ); ?></b>
                                        <div><?php esc_html_e( "Mobile browsers, will play the video right where it is instead of the default, which is to open it up full screen while it plays.", 'stapp_video' ); ?></div>
                                    </div>
                                    <div class="overlay_border config_border_container_element_space layout_animation" id="layout_animation6">
                                        <b><?php esc_html_e( "Preload:", 'stapp_video' ); ?></b>
                                        <div><?php esc_html_e( "Specifies how the video should be loaded when the page loads. (auto/none)", 'stapp_video' ); ?></div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="overlay_border hidden_bevor_hover_master overlay_border_tap_height_container overlay_border_complete_screen_width normal_layout_center config_border_container_element_space">
                        <div class=" float_layout_center_top">
                            <?php esc_html_e( "Fallback Image", 'stapp_video' ); ?>
                        </div>
                        <div class="hidden_bevor_hover config_border_container_element_space">
                            <div class="float_layout_center_top">
                                <?php esc_html_e( "Specifies an image that will be shown, if the video is downloading or until the user hits the play button.", 'stapp_video' ); ?>
                                <?php esc_html_e( "The picture should have the same size as the largest video.", 'stapp_video' ); ?>
                            </div>
                            <div class="normal_layout config_border_container_element_space overlay_border">
                                <div class="config_border_container_element_space normal_layout_center">
                                    <div><?php esc_html_e( "Possible Image formats are: ", 'stapp_video' ); ?></div>
                                    <br>
                                    <div><b><?php esc_html_e( "JPG, PNG, JPEG, GIF", 'stapp_video' ); ?></b></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay_border hidden_bevor_hover_master overlay_border_tap_height_container overlay_border_complete_screen_width normal_layout_center config_border_container_element_space">
                        <div class=" float_layout_center_top">
                            <?php esc_html_e( "Video", 'stapp_video' ); ?>
                        </div>
                        <div class="hidden_bevor_hover config_border_container_element_space">
                            <div class="float_layout_center_top">
                                <?php esc_html_e( "In this area you can add 5 different video sizes.", 'stapp_video' ); ?>
                                <?php esc_html_e( "Each size stands for a device type.", 'stapp_video' ); ?>
                                <?php esc_html_e( "If no video is linked for a device type, the video is displayed in a smaller size.", 'stapp_video' ); ?>
                            </div>

                            <div class="normal_layout config_border_container_element_space overlay_border">
                                <div class="config_border_container_element_space normal_layout_center">
                                    <div><?php esc_html_e( "There are three supported video formats in HTML: ", 'stapp_video' ); ?></div>
                                    <br>
                                    <div><b><?php esc_html_e( "MP4, WebM, and OGG", 'stapp_video' ); ?></b></div>
                                    <br>
                                    <div><?php esc_html_e( "Other video formats are not supported by all web browsers.", 'stapp_video' ); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="info_dialog_button_container float_layout_center">
        <a class="overlay_main_button config_border_container_element_space float_layout_center" id="info_dialog_button_close" name="info_dialog_button_close" onclick="document.getElementById('info_dialog').style.display='none'" ><?php esc_html_e( "Close", 'stapp_video' ) ?></a>
    </footer>
</div>