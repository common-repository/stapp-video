<form action="/wp-admin/admin.php?page=stappvideo_pro_version" method="post" class="admin_form">
    <div class="config_block" >
        <div class="config_border">
            <div class="config_border_headline"><?php esc_html_e( "Enter License Key", 'stapp_video' ); ?></div>
            <div class="config_border_container float_layout_left">
                <?php
                esc_url(require_once STAPP_VIDEO_PLUGIN_DIR."/includes/image/key_icon.svg");
                ?>
                <div class="normal_layout">
                    <div class="float_layout_left">
                        <p id="unlock_label" class="config_border_container_element_space">
                            <?php esc_html_e( "Please enter your licence key:", 'stapp_video' ); ?>
                            <?php esc_html_e( " XXXX-XXXX-XXXX-XXXX", 'stapp_video' ); ?>
                        </p>
                    </div>
                    <div class="normal_layout">
                        <div class="float_layout_left">
                            <input type="text" class="stapp_input text_input config_border_container_element_space" id="unlock_key"  name="unlock_key" autocomplete="off" value="<?php esc_html_e($GLOBALS['Stapp_Video_Result_Type']["value"], 'stapp_video') ?>" >
                        </div>
                    </div>
                    <div class="float_layout_left">
                        <div class="float_layout_left">
                            <div>
                                <label id="unlock_message" class="important_label config_border_container_element_space"><?php esc_html_e($GLOBALS['Stapp_Video_Result_Type']["message"], 'stapp_video') ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="normal_layout">
                        <div class="float_layout_left">
                            <button type="submit" class="divButton"><?php esc_html_e( "Save", 'stapp_video' ); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <input type="hidden" id="unlock_action" name="unlock_action" value="unlock_action" />
</form>