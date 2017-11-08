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
     * @return string
     */
    public static function orederQuery05($appId,$appKey,$mhtOrderNo){
        return self::orederQuery($appId,$appKey,$mhtOrderNo,"05");
    }

    /**
     * 主扫支付查询
     * @param $appId
     * @param $appKey
     * @param $mhtOrderNo
     * @return string
     */
    public static function orederQuery08($appId,$appKey,$mhtOrderNo){
        return self::orederQuery($appId,$appKey,$mhtOrderNo,"08");
    }

    /**
     * 公众号支付查询
     * @param $appId
     * @param $appKey
     * @param $mhtOrderNo
     * @return string
     */
    public static function orederQuery0600($appId,$appKey,$mhtOrderNo){
        return self::orederQuery($appId,$appKey,$mhtOrderNo,"0600");
    }


    /**
     * H5支付查询
     * @param $appId
     * @param $appKey
     * @param $mhtOrderNo
     * @return string
     */
    public static function orederQuery0601($appId,$appKey,$mhtOrderNo){
        return self::orederQuery($appId,$appKey,$mhtOrderNo,"0601");
    }

    /**
     * web支付查询
     * @param $appId
     * @param $appKey
     * @param $mhtOrderNo
     * @return string
     */
    public static function orederQuery04($appId,$appKey,$mhtOrderNo){
        return self::orederQuery($appId,$appKey,$mhtOrderNo,"04");
    }

    /**
     * 小程序支付查询
     * @param $appId
     * @param $appKey
     * @param $mhtOrderNo
     * @return string
     */
    public static function orederQuery14($appId,$appKey,$mhtOrderNo){
        return self::orederQuery($appId,$appKey,$mhtOrderNo,"14");
    }



    public static function orederQuery($appId,$appKey,$mhtOrderNo,$deviceType){
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
        $resp_str = HttpUtil::send_post("https://pay.ipaynow.cn",$req_str);
        return urldecode($resp_str);
    }


}
