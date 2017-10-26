<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/10/25
 * Time: 14:54
 */
class ParamUtil{

    public static function buildSignature($prestr,$appKey){
        $prestr.='&'.md5($appKey);
        return md5($prestr);
    }


    public static function createParamString(Array $para,$sort,$encode) {
        if ($sort) {
            $para=self::argSort($para);
        }
        $linkStr="";
        foreach ($para as $key => $value){
            if ($encode) {
                $value=urlencode($value);
            }
            $linkStr.=$key. "=" .$value. "&";
        }
        $linkStr=substr($linkStr, 0,count($linkStr)-2);
        return $linkStr;
    }
    private static function argSort($para) {
        ksort($para);
        return $para;
    }
}
