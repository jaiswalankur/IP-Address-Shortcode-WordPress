<?php
//function to get IP address
function wc_smip_get() {
    $ip = '';
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"]) && filter_var($_SERVER["HTTP_CF_CONNECTING_IP"], FILTER_VALIDATE_IP)) //cloudflare
    $ip = sanitize_text_field($_SERVER["HTTP_CF_CONNECTING_IP"]);
    else if (isset($_SERVER['HTTP_CLIENT_IP']) && filter_var($_SERVER["HTTP_CLIENT_IP"], FILTER_VALIDATE_IP))
    $ip = sanitize_text_field($_SERVER['HTTP_CLIENT_IP']);
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && filter_var($_SERVER["HTTP_X_FORWARDED_FOR"], FILTER_VALIDATE_IP))
    $ip = sanitize_text_field($_SERVER['HTTP_X_FORWARDED_FOR']);
    else if(isset($_SERVER['HTTP_X_FORWARDED']) && filter_var($_SERVER["HTTP_X_FORWARDED"], FILTER_VALIDATE_IP))
    $ip = sanitize_text_field($_SERVER['HTTP_X_FORWARDED']);
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']) && filter_var($_SERVER["HTTP_FORWARDED_FOR"], FILTER_VALIDATE_IP))
    $ip = sanitize_text_field($_SERVER['HTTP_FORWARDED_FOR']);
    else if(isset($_SERVER['REMOTE_ADDR']) && filter_var($_SERVER["REMOTE_ADDR"], FILTER_VALIDATE_IP))
    $ip = sanitize_text_field($_SERVER['REMOTE_ADDR']);
    else
    $ip = 'Not found';
    return esc_html($ip);
}

add_shortcode('wc-ip', 'wc_smip_get');
?>
