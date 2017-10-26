<?php

/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/10/26
 * Time: 15:33
 */
class HttpUtil
{
    public static function send_post($url, $post_data)
    {
        $curl = curl_init();
        $option = array(
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        );
        curl_setopt_array($curl, $option);
        $resp_data = curl_exec($curl);
        if ($resp_data == FALSE) {
            curl_close($curl);
        } else {
            curl_close($curl);
            return $resp_data;
        }
    }
}