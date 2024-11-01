<div class="stapp_input white_background"><label class="mainLabel"><?php esc_html_e( "Getting started", 'stapp_video' ); ?></label>
    <div class="config_main_container float_layout">
        <div class="config_column_container normal_layout">
            <br>
            <br>
            <div>
                <label id="title_label"> <?php esc_html_e( "If you have any question about the Configuration, please read the", 'stapp_video' ); ?> <a target="_blank" href="<?php echo esc_url("https://dev-wordpress.com/forum/"); ?>"><?php esc_html_e( "Documentation", 'stapp_video' ); ?> </a> <?php esc_html_e( "or visit our ", 'stapp_video' ); ?> <a target="_blank" href="<?php echo esc_url("https://dev-wordpress.com/forum/") ?>"><?php esc_html_e( "Forum", 'stapp_video' ); ?> </a></label>
            </div>
            <div>
                <label id="title_label"> <?php esc_html_e( "You will find a lot of answers from other users", 'stapp_video' ); ?></label>
            </div>
            <div>
                <label id="title_label"> <?php esc_html_e( "If you want to report a bug, please contact our ", 'stapp_video' ); ?> <a target="_blank" href="<?php echo esc_url("https://dev-wordpress.com/contact/"); ?>"><?php esc_html_e( "Support Team.", 'stapp_video' ); ?> </a></label>
            </div>
            <div>
                <label id="title_label"> <?php esc_html_e( "If you interest about more custom features, please use our ", 'stapp_video' ); ?> <a target="_blank" href="<?php echo esc_url("https://stapp-professional.de"); ?>"><?php esc_html_e( "Professional Service.", 'stapp_video' ); ?> </a></label>
            </div>

            <br>
            <br>
        </div>
        <div class="config_column_container float_layout_rigth">
            <div class="help_button config_border_container_element_space" onclick="document.getElementById('info_dialog').style.display='block'" >
                <div class="config_border_container_element_space float_layout_center">
                    <?php
                    esc_url(require STAPP_VIDEO_PLUGIN_DIR . "/includes/image/help_icon.svg");
                    ?>
                </div>
                <div class="config_border_container_element_space float_layout_center">
                    <?php esc_html_e( "Help?", 'stapp_video' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
