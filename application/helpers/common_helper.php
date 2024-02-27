<?php
function get_all_countries()
{
    $headers = array(
        "Cache-Control: no-cache",
        "Content-Type: application/json"
    );

    $url = API_URL . '/country/all';
    $curl_data['url']       = $url;
    $curl_data['headers']   = $headers;
    $countries = curl_get($curl_data);
    $countries = json_decode($countries, true);
    return $countries['data'];
}

function get_all_states($country_id)
{
    $headers = array(
        "Cache-Control: no-cache",
        "Content-Type: application/json"
    );

    $url = API_URL . '/country/state?cid=' . $country_id;
    $curl_data['url']       = $url;
    $curl_data['headers']   = $headers;
    $states = curl_get($curl_data);
    $states = json_decode($states, true);
    return $states['data'];
}

function get_ip_address()
{
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = '';

    return $ipaddress;
}
?>
