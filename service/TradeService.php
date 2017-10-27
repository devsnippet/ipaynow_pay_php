<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/10/26
 * Time: 11:49
 */
require_once '../util/ParamUtil.php';
require_once '../util/HttpUtil.php';



class TradeService{

    /**
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $payChannelType 支付渠道编码 12支付宝，13微信  25手q ..
     * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
     * @return string
     */
    public static function trade0601($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$payChannelType,$outputType){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$payChannelType,"0601",$outputType,"");
    }

    /**
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $payChannelType 支付渠道编码 12支付宝，13微信  25手q ..
     * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
     * @return string
     */
    public static function trade0600($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$payChannelType){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$payChannelType,"0600","0","");
    }




    /**
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $payChannelType 支付渠道编码 12支付宝，13微信  25手q ..
     * @param $outputType 输出格式  0 返回二维码串 1 返回支付链接
     * @return string
     */
    public static function trade08($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$payChannelType,$outputType){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,"",$payChannelType,"08",$outputType,"");
    }

    /**
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $payChannelType 支付渠道编码 12支付宝，13微信  25手q ..
     * @param $channelAuthCode 支付授权码
     * @return string
     */
    public static function trade05($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$payChannelType,$channelAuthCode){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,"",$payChannelType,"05","0",$channelAuthCode);
    }

    /**
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $payChannelType 支付渠道编码 12支付宝，13微信  25手q ..
     * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
     * @return string
     */
    public static function trade04($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$payChannelType,$outputType){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$payChannelType,"04",$outputType,"");
    }

    public static function trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$payChannelType,$deviceType,$outputType,$channelAuthCode){
        $param = array();
        $param["funcode"] = "WP001";
        $param["version"] = "1.0.0";
        $param["mhtOrderName"] = $mhtOrderName;
        $param["mhtOrderAmt"] = $mhtOrderAmt;
        $param["mhtOrderDetail"] = $mhtOrderDetail;
        $param["appId"] = $appId;//应用ID
        if (strlen($mhtOrderNo) > 0){
            $param["mhtOrderNo"] = $mhtOrderNo;
        }else{
            $param["mhtOrderNo"] = "mhtOrderNo".date("YmdHis");
        }
        $param["mhtOrderType"] = "01";
        $param["mhtCurrencyType"] = "156"; //币种 人民币
        $param["mhtOrderTimeOut"] = "3600";
        $param["mhtOrderStartTime"] = date("YmdHis");
        $param["notifyUrl"] = $notifyUrl;
        if (strlen($frontNotifyUrl) > 0) {
            $param["frontNotifyUrl"] = $frontNotifyUrl;
        }
        $param["payChannelType"] = $payChannelType;
        $param["outputType"] = $outputType;
        $param["mhtCharset"] = "UTF-8";
        $param["deviceType"] = $deviceType;
        if (strlen($channelAuthCode) > 0){
            $param["channelAuthCode"] = $channelAuthCode;
        }
        $param["mhtSignType"] = "MD5";
        $param["mhtSignature"] = ParamUtil::buildSignature(ParamUtil::createParamString($param,true,false),$appKey);
        $req_str = ParamUtil::createParamString($param, false, false);
        print $req_str."\n";
        $resp_str = HttpUtil::send_post("https://pay.ipaynow.cn",$req_str);
        return urldecode($resp_str);
    }


}
