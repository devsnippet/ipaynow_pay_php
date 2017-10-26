<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/10/26
 * Time: 11:49
 */
require_once '../util/ParamUtil.php';
require_once '../util/HttpUtil.php';

$param = array();
$param["funcode"] = "WP001";
$param["version"] = "1.0.0";
$param["mhtOrderName"] = "php04";
$param["mhtOrderAmt"] = "1";
$param["mhtOrderDetail"] = "php下单详情";
$param["appId"] = "150753107733024";//应用ID
$param["mhtOrderNo"] = "mhtOrderNo".date("YmdHis");
$param["mhtOrderType"] = "01";
$param["mhtCurrencyType"] = "156"; //币种 人民币
$param["mhtOrderTimeOut"] = "3600";
$param["mhtOrderStartTime"] = date("YmdHis");
$param["notifyUrl"] = "https://op-tester.ipaynow.cn/paytest/notify";
$param["frontNotifyUrl"] = "https://op-tester.ipaynow.cn/paytest/notify";
$param["payChannelType"] = "12";
$param["outputType"] = "0";
$param["mhtCharset"] = "UTF-8";
$param["deviceType"] = "04";
$param["channelAuthCode"] = "135279910782523376";
$param["mhtReserved"] = "mth";
$param["mhtSignType"] = "MD5";
$param["mhtSignature"] = ParamUtil::buildSignature(ParamUtil::createParamString($param,true,false),"4Bl0qsRhe5xhRn3sO0Kwomqts6WgpMbq");
$param["appKey"]= "4Bl0qsRhe5xhRn3sO0Kwomqts6WgpMbq";
$req_str = ParamUtil::createParamString($param, false, false);
echo "post : " . $req_str;
$resp_str = HttpUtil::send_post("https://pay.ipaynow.cn",$req_str);
echo "\nresp : " . urldecode($resp_str);