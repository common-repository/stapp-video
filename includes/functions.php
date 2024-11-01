<?php

function stapp_video_plugin_path( $path = '' ) {
    return path_join( STAPP_VIDEO_PLUGIN_DIR, trim( $path, '/' ) );
}

function stapp_video_plugin_url( $path = '' ) {
    $url = plugins_url( $path, STAPP_VIDEO_PLUGIN );

    if ( is_ssl()
        and 'http:' == substr( $url, 0, 5 ) ) {
        $url = 'https:' . substr( $url, 5 );
    }

    return $url;
}