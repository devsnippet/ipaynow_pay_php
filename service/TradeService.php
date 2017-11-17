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
     * 微信被扫支付
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $channelAuthCode 支付授权码
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function wx_trade05($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$channelAuthCode,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,"","13","05","0",$channelAuthCode,$isTest);
    }


    /**
     * 支付宝被扫支付
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $channelAuthCode 支付授权码
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function ali_trade05($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$channelAuthCode,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,"","12","05","0",$channelAuthCode,$isTest);
    }

    /**
     * 手Q被扫支付
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $channelAuthCode 支付授权码
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function handq_trade05($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$channelAuthCode,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,"","25","05","0",$channelAuthCode,$isTest);
    }

    /**
     * 京东被扫
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $channelAuthCode 支付授权码
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function jd_trade05($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$channelAuthCode,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,"","04","05","0",$channelAuthCode,$isTest);
    }


    /**
     * 银联被扫
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $channelAuthCode 支付授权码
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function union_trade05($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$channelAuthCode,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,"","27","05","0",$channelAuthCode,$isTest);
    }



    /**
     * 微信主扫
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $outputType 输出格式  0 返回二维码串 1 返回支付链接
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function wx_trade08($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$outputType,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,"","13","08",$outputType,"",$isTest);
    }


    /**
     * 支付宝主扫
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $outputType 输出格式  0 返回二维码串 1 返回支付链接
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function ali_trade08($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$outputType,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,"","12","08",$outputType,"",$isTest);
    }


    /**
     * 手Q主扫
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $outputType 输出格式  0 返回二维码串 1 返回支付链接
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function handq_trade08($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$outputType,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,"","25","08",$outputType,"",$isTest);
    }

    /**
     * 京东主扫
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $outputType 输出格式  0 返回二维码串 1 返回支付链接
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function jd_trade08($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$outputType,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,"","04","08",$outputType,"",$isTest);
    }


    /**
     * 银联主扫
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $outputType 输出格式  0 返回二维码串 1 返回支付链接
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function union_trade08($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$outputType,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,"","27","08",$outputType,"",$isTest);
    }



    /**
     * 微信公众号
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function wx_trade0600($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,"13","0600","0","",$isTest);
    }

    /**
     * 支付宝公众号
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function ali_trade0600($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,"12","0600","0","",$isTest);
    }


    /**
     * 手Q公众号
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function handq_trade0600($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,"25","0600","0","",$isTest);
    }


    /**
     * 微信H5
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function wx_trade0601($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,"13","0601",$outputType,"",$isTest);
    }

    /**
     * 支付宝H5
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function ali_trade0601($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,"12","0601",$outputType,"",$isTest);
    }


    /**
     * 银联H5
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function union_trade0601($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,"27","0601",$outputType,"",$isTest);
    }

    /**
     * 招行H5
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function cmbywt_trade0601($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,"17","0601",$outputType,"",$isTest);
    }

    /**
     * 招行H5
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function handq_trade0601($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,"25","0601",$outputType,"",$isTest);
    }


    /**
     * 银联网页
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function union_trade04($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,"27","04",$outputType,"",$isTest);
    }

    /**
     * 支付宝网页
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function ali_trade04($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,"12","04",$outputType,"",$isTest);
    }


    /**
     * 微信小程序
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 订单号
     * @param $mhtOrderName 订单名
     * @param $mhtOrderDetail 订单详细
     * @param $mhtOrderAmt 订单金额单位分
     * @param $notifyUrl  商户后台通知URL
     * @param $frontNotifyUrl 商户前台通知URL
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function wx_app($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$isTest=true){
        return self::trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,"14","04","0","",$isTest);
    }


    #下单及查询
    public static function trade($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$payChannelType,$deviceType,$outputType,$channelAuthCode,$isTest){
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
        if ($isTest){
            $url = "https://dby.ipaynow.cn/api/payment";
        }else{
            $url = "https://pay.ipaynow.cn";
        }
        echo $url;
        echo "\n";
        echo $req_str;
        echo "\n";
        $resp_str = HttpUtil::send_post($url,$req_str);
        return urldecode($resp_str);
    }


}
