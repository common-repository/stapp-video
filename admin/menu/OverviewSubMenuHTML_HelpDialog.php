<div id="info_dialog" class="dialog-overlay" style="display:
            <?php
            if (stapp_video_get_option('stapp_video_show_oHD') ==0){
                stapp_video_increase_option('stapp_video_show_oHD');
                echo 'block';
            }else{
                echo 'none';
            }
            ?>">
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
    <div class="info_dialog_container">
        <br><br><br><br><br><br>
        <div class="float_layout_rigth">
            <div class="overlay_border overlay_border_divButton">
                <div class="float_layout_center">
                    <?php esc_html_e( "If you want to show this dialog again,", 'stapp_video' ); ?>
                </div>
                <div class="float_layout_center">
                    <?php esc_html_e( "please click on... ", 'stapp_video' ); ?>
                </div>
                <div class="float_layout_center">
                    <div class="config_border_container_element_space">
                        <?php
                            esc_url(require STAPP_VIDEO_PLUGIN_DIR . "/includes/image/help_icon.svg");
                        ?>
                    </div>
                </div>
            </div>


        </div>
        <br><br><br>
        <div class="float_layout_left">
            <div class="overlay_border overlay_border_divButton">
                <div class="float_layout_center">
                    <?php esc_html_e( "Click \"New Video\" Button to start a new Configuration ", 'stapp_video' ); ?>
                </div>
                <div class="float_layout_center">
                    <a class="divButton overlay_border_complete_screen_width" href="<?php echo esc_url("admin.php?page=stappvideo_new&videoID="); ?><?php echo $videoID ?>"><?php esc_html_e( "New Video", 'stapp_video' ); ?></a>
                </div>
            </div>


        </div>
        <br>
        <div class="float_layout_left">
            <div class="overlay_border overlay_border_complete_screen_width overlay_border_main_container float_layout_center">
                <div>
                    <?php esc_html_e( "After saving you will find a list of all video configurations here.", 'stapp_video' ); ?>
                    <?php esc_html_e( "Copy the desired shortcode and paste it in your page editor.", 'stapp_video' ); ?>
                    <?php esc_html_e( "Wordpress will transform the Shortcode to your video.", 'stapp_video' ); ?>
                    <br>
                    <?php esc_html_e( "For more Information about Shortcode, please visit our support form.", 'stapp_video' ); ?>
                </div>
            </div>
        </div>


    </div>
    <footer class="info_dialog_button_container float_layout_center">

        <a class="overlay_main_button config_border_container_element_space float_layout_center" id="info_dialog_button_close" name="info_dialog_button_close" onclick="document.getElementById('info_dialog').style.display='none'" ><?php esc_html_e( "Close", 'stapp_video' ) ?></a>

    </footer>
</div>