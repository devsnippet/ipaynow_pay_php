
# 聚合支付SDK使用说明 #

## 版本变更记录 ##

- 1.0.0 : 初稿

## 1. 概述 ##

### 1.1 简介 ###

- 聚合支付SDK PHP版本,建议使用php7。

### 1.2 如何获取 ###


[demo源码](https://github.com/ipaynowORG/ipaynow_pay_php)


## 2. 使用说明 ##

### 2.1 工具说明 ###
- 支付接口使用的工具类: util
    * HttpUtil.php 发送post请求
    * ParamUtil.php 请求参数加签名
- 支付API
    * TradeService.php  
        * H5支付
        
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
              public static function trade0601($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$payChannelType,$outputType)
                    
        *  公众号支付
           
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
               public static function trade0600($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$payChannelType)
        
        *  主扫支付
                
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
                 public static function trade08($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$payChannelType,$outputType)
                 
        *  被扫支付
                         
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
                public static function trade05($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$payChannelType,$channelAuthCode)
        
        *  PC支付
                                 
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
                public static function trade04($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$payChannelType,$outputType)                

- 支付测试实例：example
    TradeTest.php 直接运行即可
### 2.2 DEMO使用 ###

   使用方法: 
     
     导入 
     require_once 'service/TradeService.php';
     
   之后便可在您的代码中开始调用现在支付 PHP SDK
   
   使用实例 ：
     
     cd 进入example文件夹
     运行 TradeTest.php
         
