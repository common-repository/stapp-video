<form action="/wp-admin/admin.php?page=stappvideo_new" method="post" class="admin_form">

    <?php
    // output security fields for the registered setting "wporg_options"
    settings_fields( 'manage_options' );
    // output setting sections and their fields
    // (sections are registered for "wporg", each field is registered to a specific section)
    do_settings_sections( 'manage_options' );
    ?>
    <br>
    <button type="submit" class="divButton"><?php esc_html_e( "Save", 'stapp_video' ); ?></button>
    <input id="videoid" name="videoid" value="<?php echo $videoID; ?>" videoid="<?php echo $videoID; ?>" style="display:none;">
    <div class="config_block">
        <div class="config_border">
            <div class="config_border_headline"><?php esc_html_e( "Configuration", 'stapp_video' ); ?></div>
            <div class="config_border_container float_layout_left">
                <?php
                esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/image/config_icon.svg");
                ?>
                <div class="normal_layout">
                    <div class="float_layout_left">
                        <p id="video_label" class="config_border_container_element_space"> <?php esc_html_e( "Title:", 'stapp_video' ); ?></p>
                        <input type="text" class="stapp_input text_input config_border_container_element_space" id="video_title"  name="video_title" value="<?php echo getSTAppValueForVideo($videoData,'video_title'); ?>" >
                        <p id="shotcode_label" class="config_border_container_element_space"> <?php esc_html_e( "ShortCode:", 'stapp_video' ); ?></p>
                        <input type="text" class="stapp_input text_input config_border_container_element_space" id="shortcode_string"  name="shortcode_string" value="<?php echo getSTAppValueForVideo($videoData,'shortcode_string'); ?>" readonly>
                    </div>
                    <!-- Second Row -->
                    <div class="float_layout_left">
                        <div class="float_layout_left">
                            <div>
                                <label id="config_message" class="important_label config_border_container_element_space"></label>
                            </div>
                        </div>
                    </div>
                    <div class="float_layout_left">

                        <div class="float_layout_left">
                            <!-- Enable Autoplay -->
                            <div id="title_wrap" class="wrap">
                                <label class="toogle " id="toogle_enable_autoplay">
                                    <input id="checkbox_enable_autoplay" name="checkbox_enable_autoplay" type="checkbox" <?php echo (getSTAppValueForVideo($videoData,'checkbox_enable_autoplay')=="off"  ? '' : 'checked'); ?>
                                           onclick="setActionForAutoplay('#checkbox_enable_autoplay','#checkbox_enable_mute','#config_message','<?php esc_html_e( "Muted will also activated. Some Browser are blocked unmuted videos.", 'stapp_video' ); ?>' )"
                                    >
                                    <span class="toogleButton"></span>
                                </label>
                                <label for="toogle_enable_autoplay" class=""><?php esc_html_e( "Autoplay:", 'stapp_video' ); ?></label>

                            </div>
                            <!-- Enable Autoplay -->
                        </div>

                        <div class="float_layout_left ">
                            <!-- Enable Loop -->
                            <div id="title_wrap" class="wrap">
                                <label class="toogle" id="toogle_enable_loop">
                                    <input id="checkbox_enable_loop" name="checkbox_enable_loop" type="checkbox" <?php echo (getSTAppValueForVideo($videoData,'checkbox_enable_loop')=="off"  ? '' : 'checked'); ?>>
                                    <span class="toogleButton"></span>
                                </label>
                                <label for="toogle_enable_loop"><?php esc_html_e( "Loop:", 'stapp_video' ); ?></label>

                            </div>
                            <!-- Enable Loop -->
                        </div>




                        <div class="float_layout_left ">
                            <!-- Enable Mute -->
                            <div id="title_wrap" class="wrap">
                                <label class="toogle" id="toogle_enable_mute">
                                    <input id="checkbox_enable_mute" name="checkbox_enable_mute" type="checkbox" <?php echo (getSTAppValueForVideo($videoData,'checkbox_enable_mute')=="off"  ? '' : 'checked'); ?>>
                                    <span class="toogleButton"></span>
                                </label>
                                <label for="toogle_enable_mute"><?php esc_html_e( "Mute:", 'stapp_video' ); ?></label>

                            </div>
                            <!-- Enable Mute -->
                        </div>


                    </div>
                    <div class="float_layout_left">

                        <div class="float_layout_left ">
                            <!-- Enable controls -->
                            <div id="title_wrap" class="wrap">
                                <label class="toogle" id="toogle_enable_controls">
                                    <input id="checkbox_enable_controls" name="checkbox_enable_controls" type="checkbox" <?php echo (getSTAppValueForVideo($videoData,'checkbox_enable_controls')=="off"  ? '' : 'checked'); ?>>
                                    <span class="toogleButton"></span>
                                </label>
                                <label for="toogle_enable_controls"><?php esc_html_e( "Controls:", 'stapp_video' ); ?></label>

                            </div>
                            <!-- Enable controls -->
                        </div>


                        <div class="float_layout_left ">
                            <!-- Enable playsinline -->
                            <div id="title_wrap" class="wrap">
                                <label class="toogle" id="toogle_enable_playsinline">
                                    <input id="checkbox_enable_playsinline" name="checkbox_enable_playsinline" type="checkbox" <?php echo (getSTAppValueForVideo($videoData,'checkbox_enable_playsinline')=="off"  ? '' : 'checked'); ?>>
                                    <span class="toogleButton"></span>
                                </label>
                                <label for="toogle_enable_playsinline"><?php esc_html_e( "Play Inline:", 'stapp_video' ); ?></label>

                            </div>
                            <!-- Enable playsinline -->
                        </div>


                        <div class="float_layout_left ">
                            <!-- Enable Preload -->
                            <div id="title_wrap" class="wrap">
                                <label class="toogle" id="toogle_enable_preload">
                                    <input id="checkbox_enable_preload" name="checkbox_enable_preload" type="checkbox" <?php echo (getSTAppValueForVideo($videoData,'checkbox_enable_preload')=="off"  ? '' : 'checked'); ?>>
                                    <span class="toogleButton"></span>
                                </label>
                                <label for="toogle_enable_preload"><?php esc_html_e( "Preload:", 'stapp_video' ); ?></label>

                            </div>
                            <!-- Enable Preload -->
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="config_block">
        <div class="config_border">
            <div class="config_border_headline"><?php esc_html_e( "Fallback Image", 'stapp_video' ); ?></div>
            <div class="config_border_container float_layout_left">
                <?php
                esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/image/fallback_icon.svg");
                ?>

                <div class="normal_layout">
                    <div class="float_layout_left">
                        <label id="title_label" class="config_border_container_element_space"> <?php esc_html_e( "File:", 'stapp_video' ); ?></label>

                        <div class="glasses" onclick="openImageUploader('#fallback_image_path')">
                            <?php
                            esc_url(require STAPP_VIDEO_PLUGIN_DIR."/includes/image/lupe_icon.svg");
                            ?>
                        </div>

                        <input id="fallback_image_path" class="text_input config_border_container_element_space" name="fallback_image_path" value="<?php
                        esc_html_e(getSTAppValueForVideo($videoData,'fallback_image_path') , 'stapp_video' );
                        ?>" readonly onclick="openImageUploader('#fallback_image_path')">
                        <div>
                            <a class="divButton config_border_container_element_space" onclick="clearMediaPath('#fallback_image_path')"><?php esc_html_e("clear" , 'stapp_video' ); ?></a>
                        </div>
                        <input id="fallback_image_type" name="fallback_image_type" value="<?php esc_html_e(getSTAppValueForVideo($videoData,'fallback_image_type') , 'stapp_video' );?>" readonly style="display:none;">
                    </div>
                    <div>
                        <label id="fallback_image_message" class="important_label config_border_container_element_space"></label>
                    </div>
                    <div >

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="config_block">
        <div class="config_border">
            <div class="config_border_headline"><?php esc_html_e( "Desktop Video 4K", 'stapp_video' ); ?></div>
            <div class="config_border_container float_layout_left">
                <?php
                esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/image/video_desktop_4k.svg");
                ?>
                <!-- Config Bereich -->
                <div class="normal_layout">
                    <div class="float_layout_left">
                        <label id="title_label" class="config_border_container_element_space"> <?php esc_html_e( "File:", 'stapp_video' ); ?></label>
                        <div class="glasses" onclick="openMediaUploader('#video_desktop_4k_path')">
                            <?php
                            esc_url(require STAPP_VIDEO_PLUGIN_DIR."/includes/image/lupe_icon.svg");
                            ?>
                        </div>
                        <input id="video_desktop_4k_path" class="text_input video_path config_border_container_element_space" name="video_desktop_4k_path" value="<?php

                        esc_html_e(getSTAppValueForVideo($videoData,'video_desktop_4k_path') , 'stapp_video' );
                        ?>" readonly onclick="openMediaUploader('#video_desktop_4k_path')">
                        <div>
                            <a class="divButton config_border_container_element_space" onclick="clearMediaPath('#video_desktop_4k_path')"><?php esc_html_e("clear" , 'stapp_video' ); ?></a>
                        </div>

                        <input id="video_desktop_4k_type" name="video_desktop_4k_type" value="<?php esc_html_e(getSTAppValueForVideo($videoData,'video_desktop_4k_type') , 'stapp_video' );?>" readonly style="display:none;">

                    </div>
                    <div>
                        <label id="video_desktop_4k_message" class="important_label config_border_container_element_space"></label>
                    </div>
                    <div class="float_layout_left config_border_container_element_space">
                        <!-- Enable Shadow -->
                        <div id="title_wrap" class="wrap">
                            <label class="toogle" id="toogle_enable_video_desktop_4k_individual_breakpoint">
                                <input id="video_desktop_4k_checkbox_individual_breakpoint" name="video_desktop_4k_checkbox_individual_breakpoint" type="checkbox" oninput="setEnableVideoBreakpoint('#video_desktop_4k_checkbox_individual_breakpoint','#video_desktop_4k_breakpoint')" <?php echo (getSTAppValueForVideo($videoData,'video_desktop_4k_checkbox_individual_breakpoint')=="off"  ? '' : 'checked'); ?>>
                                <span class="toogleButton"></span>
                            </label>
                            <label for="toogle_enable_video_desktop_4k_individual_breakpoint"><?php esc_html_e( "Custom Breakpoint:", 'stapp_video' ); ?></label>
                            <input type="number" class="stapp_input" id="video_desktop_4k_breakpoint" name="video_desktop_4k_breakpoint" min="0" max="6000" step="1" value="<?php echo getSTAppValueForVideo($videoData,'video_desktop_4k_breakpoint'); ?>" >
                        </div>
                        <!-- Enable Shadow -->
                    </div>
                </div>
                <!-- Config Bereich -->

            </div>
        </div>
    </div>
    <div class="config_block">
        <div class="config_border">
            <div class="config_border_headline"><?php esc_html_e( "Desktop Video HD", 'stapp_video' ); ?></div>
            <div class="config_border_container float_layout_left">


                <?php
                esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/image/video_desktop_hd.svg");
                ?>

                <!-- Config Bereich -->
                <div class="normal_layout">
                    <div class="float_layout_left">
                        <label id="title_label" class="config_border_container_element_space"> <?php esc_html_e( "File:", 'stapp_video' ); ?></label>
                        <div class="glasses" onclick="openMediaUploader('#video_desktop_hd_path')">
                            <?php
                            esc_url(require STAPP_VIDEO_PLUGIN_DIR."/includes/image/lupe_icon.svg");
                            ?>
                        </div>
                        <input id="video_desktop_hd_path" class="text_input video_path config_border_container_element_space" name="video_desktop_hd_path" value="<?php

                        esc_html_e(getSTAppValueForVideo($videoData,'video_desktop_hd_path') , 'stapp_video' );
                        ?>" readonly onclick="openMediaUploader('#video_desktop_hd_path')">
                        <div>
                            <a class="divButton config_border_container_element_space" onclick="clearMediaPath('#video_desktop_hd_path')"><?php esc_html_e("clear" , 'stapp_video' ); ?></a>
                        </div>
                        <input id="video_desktop_hd_type" name="video_desktop_hd_type" value="<?php esc_html_e(getSTAppValueForVideo($videoData,'video_desktop_hd_type') , 'stapp_video' );?>" readonly style="display:none;">

                    </div>
                    <div>
                        <label id="video_desktop_hd_message" class="important_label config_border_container_element_space"></label>
                    </div>
                    <div class="float_layout_left config_border_container_element_space">
                        <!-- Enable Shadow -->
                        <div id="title_wrap" class="wrap">
                            <label class="toogle" id="toogle_enable_video_desktop_hd_individual_breakpoint">
                                <input id="video_desktop_hd_checkbox_individual_breakpoint" name="video_desktop_hd_checkbox_individual_breakpoint" type="checkbox" oninput="setEnableVideoBreakpoint('#video_desktop_hd_checkbox_individual_breakpoint','#video_desktop_hd_breakpoint')" <?php echo (getSTAppValueForVideo($videoData,'video_desktop_hd_checkbox_individual_breakpoint')=="off"  ? '' : 'checked'); ?>>
                                <span class="toogleButton"></span>
                            </label>
                            <label for="toogle_enable_video_desktop_hd_individual_breakpoint"><?php esc_html_e( "Custom Breakpoint:", 'stapp_video' ); ?></label>
                            <input type="number" class="stapp_input" id="video_desktop_hd_breakpoint" name="video_desktop_hd_breakpoint" min="0" max="6000" step="1" value="<?php echo getSTAppValueForVideo($videoData,'video_desktop_hd_breakpoint'); ?>" >
                        </div>
                        <!-- Enable Shadow -->
                    </div>
                </div>
                <!-- Config Bereich -->

            </div>
        </div>
    </div>
    <div class="config_block">
        <div class="config_border">
            <div class="config_border_headline"><?php esc_html_e( "Desktop Video", 'stapp_video' ); ?></div>
            <div class="config_border_container float_layout_left">
                <?php
                esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/image/video_desktop.svg");
                ?>

                <!-- Config Bereich -->
                <div class="normal_layout">
                    <div class="float_layout_left">
                        <label id="title_label" class="config_border_container_element_space"> <?php esc_html_e( "File:", 'stapp_video' ); ?></label>
                        <div class="glasses" onclick="openMediaUploader('#video_desktop_path')">
                            <?php
                            esc_url(require STAPP_VIDEO_PLUGIN_DIR."/includes/image/lupe_icon.svg");
                            ?>
                        </div>
                        <input id="video_desktop_path" class="text_input video_path config_border_container_element_space" name="video_desktop_path" value="<?php
                        esc_html_e(getSTAppValueForVideo($videoData,'video_desktop_path') , 'stapp_video' );
                        ?>" readonly onclick="openMediaUploader('#video_desktop_path')">
                        <div>
                            <a class="divButton config_border_container_element_space" onclick="clearMediaPath('#video_desktop_path')"><?php esc_html_e("clear" , 'stapp_video' ); ?></a>
                        </div>
                        <input id="video_desktop_type" name="video_desktop_type" value="<?php esc_html_e(getSTAppValueForVideo($videoData,'video_desktop_type') , 'stapp_video' );?>" readonly style="display:none;">
                    </div>
                    <div>
                        <label id="video_desktop_message" class="important_label config_border_container_element_space"></label>
                    </div>
                    <div class="float_layout_left config_border_container_element_space">
                        <!-- Enable Shadow -->
                        <div id="title_wrap" class="wrap">
                            <label class="toogle" id="toogle_enable_video_desktop_individual_breakpoint">
                                <input id="video_desktop_checkbox_individual_breakpoint" name="video_desktop_checkbox_individual_breakpoint" type="checkbox" oninput="setEnableVideoBreakpoint('#video_desktop_checkbox_individual_breakpoint','#video_desktop_breakpoint')" <?php echo (getSTAppValueForVideo($videoData,'video_desktop_checkbox_individual_breakpoint')=="off"  ? '' : 'checked'); ?>>
                                <span class="toogleButton"></span>
                            </label>
                            <label for="toogle_enable_video_desktop_individual_breakpoint"><?php esc_html_e( "Custom Breakpoint:", 'stapp_video' ); ?></label>
                            <input type="number" class="stapp_input" id="video_desktop_breakpoint" name="video_desktop_breakpoint" min="0" max="6000" step="1" value="<?php echo getSTAppValueForVideo($videoData,'video_desktop_breakpoint'); ?>">
                        </div>
                        <!-- Enable Shadow -->
                    </div>
                </div>
                <!-- Config Bereich -->

            </div>
        </div>
    </div>
    <div class="config_block">
        <div class="config_border">
            <div class="config_border_headline"><?php esc_html_e( "Tablet Video", 'stapp_video' ); ?></div>
            <div class="config_border_container float_layout_left">
                <?php
                esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/image/video_tablet.svg");
                ?>

                <!-- Config Bereich -->
                <div class="normal_layout">
                    <div class="float_layout_left">
                        <label id="title_label" class="config_border_container_element_space"> <?php esc_html_e( "File:", 'stapp_video' ); ?></label>
                        <div class="glasses" onclick="openMediaUploader('#video_tablet_path')">
                            <?php
                            esc_url(require STAPP_VIDEO_PLUGIN_DIR."/includes/image/lupe_icon.svg");
                            ?>
                        </div>
                        <input id="video_tablet_path" class="text_input video_path config_border_container_element_space" name="video_tablet_path" value="<?php

                        esc_html_e(getSTAppValueForVideo($videoData,'video_tablet_path') , 'stapp_video' );
                        ?>" readonly onclick="openMediaUploader('#video_tablet_path')">
                        <div>
                            <a class="divButton config_border_container_element_space" onclick="clearMediaPath('#video_tablet_path')"><?php esc_html_e("clear" , 'stapp_video' ); ?></a>
                        </div>
                        <input id="video_tablet_type" name="video_tablet_type" value="<?php esc_html_e(getSTAppValueForVideo($videoData,'video_tablet_type') , 'stapp_video' );?>" readonly style="display:none;">
                    </div>
                    <div>
                        <label id="video_tablet_message" class="important_label config_border_container_element_space"></label>
                    </div>
                    <div class="float_layout_left config_border_container_element_space">
                        <!-- Enable Shadow -->
                        <div id="title_wrap" class="wrap">
                            <label class="toogle" id="toogle_enable_video_tablet_individual_breakpoint">
                                <input id="video_tablet_checkbox_individual_breakpoint" name="video_tablet_checkbox_individual_breakpoint" type="checkbox" oninput="setEnableVideoBreakpoint('#video_tablet_checkbox_individual_breakpoint','#video_tablet_breakpoint')" <?php echo (getSTAppValueForVideo($videoData,'video_tablet_checkbox_individual_breakpoint')=="off"  ? '' : 'checked'); ?>>
                                <span class="toogleButton"></span>
                            </label>
                            <label for="toogle_enable_video_tablet_individual_breakpoint"><?php esc_html_e( "Custom Breakpoint:", 'stapp_video' ); ?></label>
                            <input type="number" class="stapp_input" id="video_tablet_breakpoint" name="video_tablet_breakpoint" min="0" max="6000" step="1" value="<?php echo getSTAppValueForVideo($videoData,'video_tablet_breakpoint'); ?>" >
                        </div>
                        <!-- Enable Shadow -->
                    </div>
                </div>
                <!-- Config Bereich -->

            </div>
        </div>
    </div>
    <div class="config_block">
        <div class="config_border">
            <div class="config_border_headline"><?php esc_html_e( "Mobile Phone Video", 'stapp_video' ); ?></div>
            <div class="config_border_container float_layout_left">
                <?php
                esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/image/video_phone.svg");
                ?>

                <!-- Config Bereich -->
                <div class="normal_layout">
                    <div class="float_layout_left">
                        <label id="title_label" class="config_border_container_element_space"> <?php esc_html_e( "File:", 'stapp_video' ); ?></label>
                        <div class="glasses" onclick="openMediaUploader('#video_phone_path')">
                            <?php
                            esc_url(require STAPP_VIDEO_PLUGIN_DIR."/includes/image/lupe_icon.svg");
                            ?>
                        </div>
                        <input id="video_phone_path" class="text_input video_path config_border_container_element_space" name="video_phone_path" value="<?php esc_html_e(getSTAppValueForVideo($videoData,'video_phone_path') , 'stapp_video' ); ?>" readonly onclick="openMediaUploader('#video_phone_path')">
                        <div>
                            <a class="divButton config_border_container_element_space" onclick="clearMediaPath('#video_phone_path')"><?php esc_html_e("clear" , 'stapp_video' ); ?></a>
                        </div>
                        <input id="video_phone_type" name="video_phone_type" value="<?php esc_html_e(getSTAppValueForVideo($videoData,'video_phone_type') , 'stapp_video' );?>" readonly style="display:none;">
                    </div>
                    <div>
                        <label id="video_phone_message" class="important_label config_border_container_element_space"></label>
                    </div>
                    <div class="float_layout_left config_border_container_element_space">
                        <!-- Enable Shadow -->
                        <div id="title_wrap" class="wrap">
                            <label class="toogle" id="toogle_enable_video_phone_individual_breakpoint">
                                <input id="video_phone_checkbox_individual_breakpoint" name="video_phone_checkbox_individual_breakpoint" type="checkbox" oninput="setEnableVideoBreakpoint('#video_phone_checkbox_individual_breakpoint','#video_phone_breakpoint')" <?php echo (getSTAppValueForVideo($videoData,'video_phone_checkbox_individual_breakpoint')=="off"  ? '' : 'checked'); ?>>
                                <span class="toogleButton"></span>
                            </label>
                            <label for="toogle_enable_video_phone_individual_breakpoint"><?php esc_html_e( "Custom Breakpoint:", 'stapp_video' ); ?></label>
                            <input type="number" class="stapp_input" id="video_phone_breakpoint" name="video_phone_breakpoint" min="0" max="6000" step="1" value="<?php echo getSTAppValueForVideo($videoData,'video_phone_breakpoint'); ?>" >
                        </div>
                        <!-- Enable Shadow -->
                    </div>
                </div>
                <!-- Config Bereich -->

            </div>
        </div>
    </div>
    <button type="submit" class="divButton"><?php esc_html_e( "Save", 'stapp_video' ); ?></button>
    <input type="hidden" id="save_action" name="save_action" value="save_action" />
</form>
