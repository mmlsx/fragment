<?php

/**
* sso curl post json 操作
*
*/
function curl_api_post_json($params, $api_url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'Content-Length: ' . strlen($params))
    );
    $response = curl_exec($ch);
    $curl_errors='';
    if(curl_errno($ch)) {
      $curl_errors='CURL错误代码:'.curl_errno($ch).'. 错误内容:'.curl_error($ch);
    }
    curl_close($ch);
    return json_decode($response, true);
}

/**
* sso curl post 操作
*
*/
function curl_api_post($params, $api_url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $response = curl_exec($ch);
    $curl_errors='';
    if(curl_errno($ch)) {
      $curl_errors='CURL错误代码:'.curl_errno($ch).'. 错误内容:'.curl_error($ch);
    }
    curl_close($ch);
    return json_decode($response, true);
}

/**
* sso curl get 操作
*
*/
function curl_api_get($params, $api_url){
    $api_url   = $api_url . "?" . http_build_query($params, '', '&');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $response = curl_exec($ch);
    $curl_errors='';
    if(curl_errno($ch)) {
      $curl_errors='CURL错误代码:'.curl_errno($ch).'. 错误内容:'.curl_error($ch);
    }
    curl_close($ch);
    return json_decode($response, true);
}
