
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

<div class="config_block" >
    <div class="config_border">
        <div class="config_border_headline">
            <?php esc_html_e( "No configuration available yet.", 'stapp_video' ); ?>
        </div>


<div class="proversion_main_container">
    <div class="proversion_container">
        <div class="headline_container">

        </div>
        <div class="headline_container">
            <h2 class="headline_try_pro_text"><?php esc_html_e( "Please click on \"New Video\" to start a new configuration.", 'stapp_video' ); ?></h2>
        </div>
        <div class="headline_unterline_container">
            <svg  class="stapp_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 200" preserveAspectRatio="none">
                <use xlink:href="#stapp__line" class="stapp__line"></use>
            </svg>
        </div>
    </div>
</div>


    </div>
</div>