<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/11/8
 * Time: 9:59
 */

require_once '../util/ParamUtil.php';
require_once '../util/HttpUtil.php';

class RefundService{


#退款查询
    static $proRefundQueryUrl = "https://pay.ipaynow.cn/refund/refundQuery";
    static $testRefundQueryUrl = "";

    /**
     * 退款接口
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 原订单号
     * @param $mhtRefundNo 退款号
     * @param $amount 退款金额（退款金额不能大于可清算的支付金额）
     * @param $reason 退款原因
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function refund($appId,$appKey,$mhtOrderNo,$mhtRefundNo,$amount,$reason,$isTest){
        $param = array();
        $param["funcode"] = "R001";
        $param["version"] = "1.0.0";
        $param["appId"] = $appId;//应用ID
        $param["mhtOrderNo"] = $mhtOrderNo;
        $param["mhtRefundNo"] = $mhtRefundNo;
        $param["amount"] = $amount;
        $param["reason"] = $reason;
        $param["mhtCharset"] = "UTF-8";
        $param["mhtSignature"] = ParamUtil::buildSignature(ParamUtil::createParamString($param,true,false),$appKey);
        $param["signType"] = "MD5";
        $req_str = ParamUtil::createParamString($param, false, false);
        if ($isTest){
            $url = "https://dby.ipaynow.cn/refund_access/refundOrder";
        }else{
            $url = "https://pay.ipaynow.cn/refund/refundOrder";
        }
        echo $url;
        echo "\n";
        echo $req_str;
        echo "\n";
        $resp_str = HttpUtil::send_post($url,$req_str);
        return urldecode($resp_str);
    }

    /**
     * 退款查询
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtRefundNo 退款单号
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function refundQuery($appId,$appKey,$mhtRefundNo,$isTest){
        $param = array();
        $param["funcode"] = "Q001";
        $param["version"] = "1.0.0";
        $param["appId"] = $appId;//应用ID
        $param["mhtRefundNo"] = $mhtRefundNo;
        $param["mhtCharset"] = "UTF-8";
        $param["mhtSignature"] = ParamUtil::buildSignature(ParamUtil::createParamString($param,true,false),$appKey);
        $param["signType"] = "MD5";
        $req_str = ParamUtil::createParamString($param, false, false);
        if ($isTest){
            $url = "https://dby.ipaynow.cn/refund_access/refundQuery";
        }else{
            $url = "https://pay.ipaynow.cn/refund/refundQuery";
        }
        echo $url;
        echo "\n";
        echo $req_str;
        echo "\n";
        $resp_str = HttpUtil::send_post($url,$req_str);
        return urldecode($resp_str);
    }

    /**
     * 撤销接口 (只能撤销当天的交易,且无论成功失败(逻辑包含退款))
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtOrderNo 原订单号
     * @param $mhtRefundNo 撤销单号
     * @param $reason 撤销原因
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function backOrder($appId,$appKey,$mhtOrderNo,$mhtRefundNo,$reason,$isTest){
        $param = array();
        $param["funcode"] = "R002";
        $param["version"] = "1.0.0";
        $param["appId"] = $appId;//应用ID
        $param["mhtOrderNo"] = $mhtOrderNo;
        $param["mhtRefundNo"] = $mhtRefundNo;
        $param["reason"] = $reason;
        $param["mhtCharset"] = "UTF-8";
        $param["mhtSignature"] = ParamUtil::buildSignature(ParamUtil::createParamString($param,true,false),$appKey);
        $param["signType"] = "MD5";
        $req_str = ParamUtil::createParamString($param, false, false);
        if ($isTest){
            $url = "https://dby.ipaynow.cn/refund_access/refundOrder";
        }else{
            $url = "https://pay.ipaynow.cn/refund/refundOrder";
        }
        echo $url;
        echo "\n";
        echo $req_str;
        echo "\n";
        $resp_str = HttpUtil::send_post($url,$req_str);
        return urldecode($resp_str);
    }


    /**
     * 撤销查询
     * @param $appId 应用Id
     * @param $appKey 应用秘钥
     * @param $mhtRefundNo 撤销单号
     * @param $isTest 是否测试 True 测试环境 False 生产环境
     * @return string
     */
    public static function backOrderQuery($appId,$appKey,$mhtRefundNo,$isTest){
        $param = array();
        $param["funcode"] = "Q002";
        $param["version"] = "1.0.0";
        $param["appId"] = $appId;//应用ID
        $param["mhtRefundNo"] = $mhtRefundNo;
        $param["mhtCharset"] = "UTF-8";
        $param["mhtSignature"] = ParamUtil::buildSignature(ParamUtil::createParamString($param,true,false),$appKey);
        $param["signType"] = "MD5";
        $req_str = ParamUtil::createParamString($param, false, false);
        if ($isTest){
            $url = "https://dby.ipaynow.cn/refund_access/refundQuery";
        }else{
            $url = "https://pay.ipaynow.cn/refund/refundQuery";
        }
        echo $url;
        echo "\n";
        echo $req_str;
        echo "\n";
        $resp_str = HttpUtil::send_post($url,$req_str);
        return urldecode($resp_str);
    }


}