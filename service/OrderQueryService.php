<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/10/26
 * Time: 11:49
 */
require_once '../util/ParamUtil.php';
require_once '../util/HttpUtil.php';



class OrderQueryService{

    /**
     * 被扫支付查询
     * @param $appId
     * @param $appKey
     * @param $mhtOrderNo
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function orederQuery05($appId,$appKey,$mhtOrderNo,$isTest=true){
        return self::orederQuery($appId,$appKey,$mhtOrderNo,"05",$isTest);
    }

    /**
     * 主扫支付查询
     * @param $appId
     * @param $appKey
     * @param $mhtOrderNo
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function orederQuery08($appId,$appKey,$mhtOrderNo,$isTest=true){
        return self::orederQuery($appId,$appKey,$mhtOrderNo,"08",$isTest);
    }

    /**
     * 公众号支付查询
     * @param $appId
     * @param $appKey
     * @param $mhtOrderNo
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function orederQuery0600($appId,$appKey,$mhtOrderNo,$isTest=true){
        return self::orederQuery($appId,$appKey,$mhtOrderNo,"0600",$isTest);
    }


    /**
     * H5支付查询
     * @param $appId
     * @param $appKey
     * @param $mhtOrderNo
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function orederQuery0601($appId,$appKey,$mhtOrderNo,$isTest){
        return self::orederQuery($appId,$appKey,$mhtOrderNo,"0601",$isTest);
    }

    /**
     * web支付查询
     * @param $appId
     * @param $appKey
     * @param $mhtOrderNo
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function orederQuery04($appId,$appKey,$mhtOrderNo,$isTest=true){
        return self::orederQuery($appId,$appKey,$mhtOrderNo,"04",$isTest);
    }

    /**
     * 小程序支付查询
     * @param $appId
     * @param $appKey
     * @param $mhtOrderNo
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function orederQuery14($appId,$appKey,$mhtOrderNo,$isTest=true){
        return self::orederQuery($appId,$appKey,$mhtOrderNo,"14",$isTest);
    }



    public static function orederQuery($appId,$appKey,$mhtOrderNo,$deviceType,$isTest){
        $param = array();
        $param["funcode"] = "MQ002";
        $param["version"] = "1.0.0";
        $param["appId"] = $appId;//应用ID
        $param["mhtOrderNo"] = $mhtOrderNo;
        $param["mhtCharset"] = "UTF-8";
        $param["deviceType"] = $deviceType;
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
