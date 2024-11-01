<head>
    <meta charset="UTF-8">
</head>
<svg viewBox="0 0 0 0" style="position: absolute; z-index: -1; opacity: 0;">
    <defs>
        <linearGradient id="boxGradient" gradientUnits="userSpaceOnUse" x1="0" y1="0" x2="25" y2="25">
            <stop offset="0%"   stop-color="#27FDC7"/>
            <stop offset="100%" stop-color="#0FC0F5"/>
        </linearGradient>

        <radialGradient id="GrayRoundGradient">
            <stop offset="10%" stop-color="#54595F" />
            <stop offset="80%" stop-color="#7A7A7A" />
            <stop offset="95%" stop-color="#FFFFFF" />
        </radialGradient>

        <linearGradient id="lineGradient">
            <stop offset="0%"    stop-color="#0FC0F5"/>
            <stop offset="100%"  stop-color="#27FDC7"/>
        </linearGradient>


        <path id="stapp__line" stroke="url(#lineGradient)" d="M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9"></path>

        <path id="stapp__check" stroke="url(#boxGradient)" stroke-width="3" fill="none"; d="M0 15l8 10 12-15"></path>
        <circle id="stapp__circle" stroke="url(#boxGradient)" stroke-width="3" fill="none"; cx="10" cy="10" r="20"></circle>
        <circle id="stapp_gray_circle" fill="url(#GrayRoundGradient)" cx="10" cy="13" r="10"></circle>
    </defs>
</svg>


<div class="proversion_main_container">
    <div class="proversion_container">
        <div class="headline_container">
            <h2 class="headline_try_pro_text"><?php esc_html_e( "Try Video Pro", 'stapp_video' ); ?></h2>
        </div>
        <div class="headline_unterline_container">
            <svg  class="stapp_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 200" preserveAspectRatio="none">
                <use xlink:href="#stapp__line" class="stapp__line"></use>
            </svg>
        </div>

            <!-- price table -->
            <div class="price_table float_layout">
                <div class="price_table_border">
                    <div class="price_table_heading background_pro">
                        <h2 class="price_table_heading_text"><?php esc_html_e( "PRO", 'stapp_video' ); ?></h2>
                    </div>
                    <div class="price_table_subheading background_pro">
                        <h3 class="price_table_subheading_text"><?php esc_html_e( "Video Plugin", 'stapp_video' ); ?></h3>
                    </div>
                    <div class="price_table_center">
                        <div class="price_table_center_price">
                            <span class="price_table_center_price_text"><?php esc_html_e( "4,99", 'stapp_video' ); ?></span>
                            <span class="price_table_center_price_unit"><?php esc_html_e( "€", 'stapp_video' ); ?></span>
                        </div>
                        <div class="price_table_center_additional">
                            Einmalig
                        </div>
                        <!-- feature list -->
                        <ul class="price_table_center_list">
                            <!-- feature item-->
                            <li class="price_table_center_item">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26" height="26" class="svg_class">
                                        <use xlink:href="#stapp_gray_circle" class="stapp_gray_circle stapp_gray_circle1"></use>
                                    </svg>
                                    <span class="price_table_center_label"><?php esc_html_e( "Responsive optimized display of your videos on all devices", 'stapp_video' ); ?></span>
                                </div>
                            </li>
                            <li class="price_table_center_item">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="10" width="26" height="26" class="svg_class">
                                        <use xlink:href="#stapp_gray_circle" class="stapp_gray_circle stapp_gray_circle2"></use>
                                    </svg>
                                    <span class="price_table_center_label"><?php esc_html_e( "Very easy handling, no programming skills required", 'stapp_video' ); ?></span>
                                </div>
                            </li>
                            <li class="price_table_center_item">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="10" width="26" height="26" class="svg_class">
                                        <use xlink:href="#stapp_gray_circle" class="stapp_gray_circle stapp_gray_circle3"></use>
                                    </svg>
                                    <span class="price_table_center_label"><?php esc_html_e( "Assign a video file of the appropriate size to each end device type (desktop, tablet or smartphone)", 'stapp_video' ); ?></span>
                                </div>
                            </li>
                            <li class="price_table_center_item">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="10" width="26" height="26" class="svg_class">
                                        <use xlink:href="#stapp_gray_circle" class="stapp_gray_circle stapp_gray_circle4"></use>
                                    </svg>
                                    <span class="price_table_center_label"><?php esc_html_e( "Your videos are automatically SEO-friendly & responsive", 'stapp_video' ); ?></span>
                                </div>
                            </li>
                            <li class="price_table_center_item">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="10" width="26" height="26" class="svg_class">
                                        <use xlink:href="#stapp_gray_circle" class="stapp_gray_circle stapp_gray_circle5"></use>
                                    </svg>
                                    <span class="price_table_center_label"><?php esc_html_e( "Forum or email support", 'stapp_video' ); ?></span>
                                </div>
                            </li>
                            <li class="price_table_center_item">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="10" width="26" height="26" class="svg_class">
                                        <use xlink:href="#stapp_gray_circle" class="stapp_gray_circle stapp_gray_circle6"></use>
                                    </svg>
                                    <span class="price_table_center_label"><?php esc_html_e( "Unlimited lifetime updates", 'stapp_video' ); ?></span>
                                </div>
                            </li>
                            <li class="price_table_center_item">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="10" width="26" height="26" class="svg_class">
                                        <use xlink:href="#stapp__circle" class="stapp__circle stapp__circle1"></use>
                                        <use xlink:href="#stapp__check" class="stapp__check stapp__check1"></use>
                                    </svg>
                                    <span class="price_table_center_label"><?php esc_html_e( "Unlimited shortcodes / videos", 'stapp_video' ); ?></span>
                                </div>
                            </li>
                            <li class="price_table_center_item">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="10" width="26" height="26" class="svg_class">
                                        <use xlink:href="#stapp__circle" class="stapp__circle stapp__circle2"></use>
                                        <use xlink:href="#stapp__check" class="stapp__check stapp__check2"></use>
                                    </svg>
                                    <span class="price_table_center_label"><?php esc_html_e( "Unlimited pages", 'stapp_video' ); ?></span>
                                </div>
                            </li>
                            <li class="price_table_center_item">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="10" width="26" height="26" class="svg_class">
                                        <use xlink:href="#stapp__circle" class="stapp__circle stapp__circle3"></use>
                                        <use xlink:href="#stapp__check" class="stapp__check stapp__check3"></use>
                                    </svg>
                                    <span class="price_table_center_label"><?php esc_html_e( "1 year premium support", 'stapp_video' ); ?></span>
                                </div>
                            </li>

                            <li class="price_table_center_item">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="10" width="26" height="26" class="svg_class">
                                        <use xlink:href="#stapp__circle" class="stapp__circle stapp__circle4"></use>
                                        <use xlink:href="#stapp__check" class="stapp__check stapp__check4"></use>
                                    </svg>
                                    <span class="price_table_center_label"><?php esc_html_e( "NO SUBSCRIPTION! ONLY BUY ONCE AND USE UNLIMITED!", 'stapp_video' ); ?></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="price_table_footer background_pro">
                        <a href="https://dev-wordpress.com/produkt/video/" target="_blank" class="stapp_button" id="button_proceedToSTApp" role="button">
                            <span class="stapp_button_content_wrapper">
                                <span class="stapp_button_text"><?php esc_html_e( "Learn more", 'stapp_video' ); ?></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
