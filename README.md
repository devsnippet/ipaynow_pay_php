
# 聚合支付SDK使用说明 #

## 版本变更记录 ##

- 1.0.0 : 初稿
- 1.0.1 ：接口按渠道分开，增加微信支付宝外的渠道方法

## 目录 ##

[1. 概述](#1)

&nbsp;&nbsp;&nbsp;&nbsp;[1.1 简介](#1.1)

&nbsp;&nbsp;&nbsp;&nbsp;[1.2 如何获取](#1.2)

&nbsp;&nbsp;&nbsp;&nbsp;[1.3 DEMO使用](#1.3)

[2. API](#2)

&nbsp;&nbsp;&nbsp;&nbsp;[2.1 聚合交易API](#2.1)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[微信被扫支付](#2.1.1)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[支付宝被扫支付](#2.1.2)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[手Q被扫支付](#2.1.3)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[京东被扫支付](#2.1.4)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[银联被扫支付](#2.1.5)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[微信主扫支付](#2.1.6)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[支付宝主扫支付](#2.1.7)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[手Q主扫支付](#2.1.8)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[京东主扫支付](#2.1.9)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[银联主扫支付](#2.1.10)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[微信公众号支付](#2.1.11)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[支付宝公众号支付](#2.1.13)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[手Q公众号支付](#2.1.15)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[微信H5](#2.1.17)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[支付宝H5](#2.1.18)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[银联H5](#2.1.19)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[招行一网通H5](#2.1.20)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[手Q H5](#2.1.21)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[支付宝网页web](#2.1.22)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[银联网页web](#2.1.23)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[微信小程序支付](#2.1.24)  

&nbsp;&nbsp;&nbsp;&nbsp;[2.2 支付结果通知](#2.2)

&nbsp;&nbsp;&nbsp;&nbsp;[2.3 订单查询API](#2.3)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[用户主扫支付订单查询](#2.3.1)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[用户被扫支付订单查询](#2.3.2)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[商户公众号支付订单查询](#2.3.3)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[商户H5支付订单查询](#2.3.4)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[商户网页支付订单查询](#2.3.5)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[商户微信App支付订单查询](#2.3.6)

&nbsp;&nbsp;&nbsp;&nbsp;[2.4 退款API](#2.4)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[退款](#2.4.1)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[退款查询](#2.4.2)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[撤销](#2.4.3)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[撤销查询](#2.4.4)

<h2 id='1'> 1. 概述 </h2>
<h4 id='1.1'> 1.1 简介 </h4>
- 聚合支付SDK PHP版本,建议使用php7。

- 支付接口使用的工具类: 

    HttpUtil.php 发送post请求
    
    ParamUtil.php 请求参数加签名

 <h4 id='1.2'>1.2 如何获取</h4>
 

[demo源码](https://github.com/ipaynowORG/ipaynow_pay_php.git)


<h4 id='1.3'>1.3 DEMO使用</h4>
- 支付测试实例：example
    TradeTest.php 直接运行即可

   使用方法: 
        
     导入 
     require_once 'service/TradeService.php';
     
   之后便可在您的代码中开始调用现在支付 PHP SDK
   
   使用实例 ：
     
     cd 进入example文件夹
     运行 TradeTest.php

## 2. API ##
<h4 id='2.1'> 2.1 聚合交易API </h4>

### 2.1 工具说明 ###

- 下单接口
    * TradeService.php  
       <h5 id='2.1.1'></h5>
       
       - 微信被扫支付
       
               /**
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
               public static function wx_trade05($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$channelAuthCode,$isTest)
           
       <h5 id='2.1.2'></h5>
       
       - 支付宝被扫支付
       
             /**
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
            public static function ali_trade05($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$channelAuthCode,$isTest)       
       
       <h5 id='2.1.3'></h5>
       
       - 手Q被扫支付
            
             /**
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
              public static function handq_trade05($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$channelAuthCode,$isTest)
           
       <h5 id='2.1.4'></h5>
       
       - 京东被扫支付
       
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
             public static function jd_trade05($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$channelAuthCode,$isTest)
             
       <h5 id='2.1.5'></h5>
       
       - 银联被扫支付
       
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
             public static function union_trade05($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$channelAuthCode,$isTest)               
       <h5 id='2.1.6'></h5>
       - 微信主扫支付
       
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
             public static function wx_trade08($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$outputType,$isTest)
       
       <h5 id='2.1.7'></h5>
       
       - 支付宝主扫支付
       
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
             public static function ali_trade08($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$outputType,$isTest)        
       <h5 id='2.1.8'></h5>
       
       - 手Q主扫支付
       
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
             public static function handq_trade08($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$outputType,$isTest)
       
       <h5 id='2.1.9'></h5>
       
       - 京东主扫支付
       
       <h5 id='2.1.10'></h5>
       
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
           public static function jd_trade08($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$outputType,$isTest)
       
       - 银联主扫支付
       
       <h5 id='2.1.11'></h5>
       
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
           public static function union_trade08($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$outputType,$isTest)
       
       - 微信公众号支付
     
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
             public static function wx_trade0600($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$isTest)       
       
       <h5 id='2.1.13'></h5>
       
       - 支付宝公众号支付
       
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
              * @param $outputType 0.返回支付跳转链接 2.返回支付页面（html）
              * @param $isTest 是否测试 True 测试环境 False 生产环境
              * @return string
              */
             public static function ali_trade0600($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$isTest)       
       <h5 id='2.1.15'></h5>
       
       - 手Q公众号支付
       
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
              public static function handq_trade0600($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$isTest)
       
       <h5 id='2.1.17'></h5>
       
       - 微信H5
       
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
             public static function wx_trade0601($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest)
       
       <h5 id='2.1.18'></h5>
       
       - 支付宝H5
       
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
             public static function ali_trade0601($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest)
           
       <h5 id='2.1.19'></h5>
       
       - 银联H5
       
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
             public static function union_trade0601($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest)
       
       <h5 id='2.1.20'></h5>
       - 招行一网通H5
       
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
             public static function cmbywt_trade0601($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest)
       
       <h5 id='2.1.21'></h5>
              
       - 手Q H5
       
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
             public static function handq_trade0601($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest)
       
       <h5 id='2.1.22'></h5>
       
       - 支付宝网页web
       
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
                public static function ali_trade04($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest)
       <h5 id='2.1.23'></h5>
       
       - 银联网页web
            
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
             public static function union_trade04($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$outputType,$isTest)
       
       <h5 id='2.1.24'></h5>
       
       - 微信小程序支付
       
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
              public static function wx_app($appId,$appKey,$mhtOrderNo,$mhtOrderName,$mhtOrderDetail,$mhtOrderAmt,$notifyUrl,$frontNotifyUrl,$isTest)
            
       下单接口字段含义如下:
       
       <table>
               <tr>
                   <th>字段名称</th>
                   <th>字段Key</th>
                   <th>备注</th>
               </tr>
               <tr>
                   <td>功能码</td>
                   <td>funcode</td>
                   <td>定值：N001</td>
               </tr>
               <tr>
                   <td>接口版本号</td>
                   <td>version</td>
                   <td>定值：1.0.0</td>
                </tr>
       <tr>
                   <td>商户应用唯一标识</td>
                   <td>appId</td>
                   <td></td>
                </tr>
       <tr>
                   <td>商户订单号</td>
                   <td>mhtOrderNo</td>
                   <td></td>
                </tr>
       <tr>
                   <td>商户商品名称</td>
                   <td>mhtOrderName</td>
                   <td></td>
                </tr>
       <tr>
                   <td>商户交易类型</td>
                   <td>mhtOrderType</td>
                   <td></td>
                </tr>
       <tr>
                   <td>商户订单币种类型</td>
                   <td>mhtCurrencyType</td>
                   <td>156人民币</td>
                </tr>
       <tr>
                   <td>商户订单原单金额</td>
                   <td>oriMhtOrderAmt</td>
                   <td>单位(人民币)：分</td>
                </tr>
       <tr>
                   <td>商户订单实付金额</td>
                   <td>mhtOrderAmt</td>
                   <td>单位(人民币)：分</td>
                </tr>
       <tr>
                   <td>商户订单优惠金额</td>
                   <td>discountAmt</td>
                   <td>单位(人民币)：分</td>
                </tr>
       <tr>
                   <td>商户订单超时时间</td>
                   <td>mhtOrderTimeOut</td>
                   <td>60~3600秒，默认3600</td>
                </tr>
       <tr>
                   <td>商户订单开始时间</td>
                   <td>mhtOrderStartTime</td>
                   <td>yyyyMMddHHmmss</td>
                </tr>
       <tr>
                   <td>支付成功时间</td>
                   <td>payTime</td>
                   <td>yyyyMMddHHmmss</td>
                </tr>
       <tr>
                   <td>商户字符编码</td>
                   <td>mhtCharset</td>
                   <td>UTF-8</td>
                </tr>
       <tr>
                   <td>现在支付流水号</td>
                   <td>nowPayOrderNo</td>
                   <td></td>
                </tr>
       <tr>
                   <td>设备类型</td>
                   <td>deviceType</td>
                   <td></td>
                </tr>
       <tr>
                   <td>用户所选渠道类型</td>
                   <td>payChannelType</td>
                   <td>12-支付宝 13-微信 27-银联 04-京东 25-手Q</td>
                </tr>
       <tr>
                   <td>交易支付状态</td>
                   <td>transStatus</td>
                   <td></td>
                </tr>
       <tr>
                   <td>渠道订单号</td>
                   <td>channelOrderNo</td>
                   <td></td>
                </tr>
       <tr>
                   <td>付款人账号</td>
                   <td>payConsumerId</td>
                   <td>微信返回sub_openid,支付宝返回buyer_user_id</td>
                </tr>
       <tr>
                   <td>商户保留域</td>
                   <td>mhtReserved</td>
                   <td>给商户使用的字段，商户可以对交易进行标记，现在支付将原样返回</td>
                </tr>
       <tr>
                   <td>签名方法</td>
                   <td>signType</td>
                   <td>定值：MD5</td>
                </tr>
       <tr>
                   <td>数据签名</td>
                   <td>signature</td>
                   <td>除signature字段外，所有参数都参与MD5签名</td>
                </tr>
       <tr>
                   <td>银行类型</td>
                   <td>bankType</td>
                   <td>微信渠道返回</td>
                </tr>
       <tr>
                   <td>卡类型</td>
                   <td>cardType</td>
                   <td>CREDIT 信用卡  DEBIT  借记卡</td>
                </tr>
           </table>      
           
<h4 id='2.2'>2.2 支付结果通知</h4>

通知方式采用http post方式通知

字段含义如下:

<table>
        <tr>
            <th>字段名称</th>
            <th>字段Key</th>
            <th>备注</th>
        </tr>
        <tr>
            <td>功能码</td>
            <td>funcode</td>
            <td>定值：N001</td>
        </tr>
        <tr>
            <td>接口版本号</td>
            <td>version</td>
            <td>定值：1.0.0</td>
         </tr>
<tr>
            <td>商户应用唯一标识</td>
            <td>appId</td>
            <td></td>
         </tr>
<tr>
            <td>商户订单号</td>
            <td>mhtOrderNo</td>
            <td></td>
         </tr>
<tr>
            <td>商户商品名称</td>
            <td>mhtOrderName</td>
            <td></td>
         </tr>
<tr>
            <td>商户交易类型</td>
            <td>mhtOrderType</td>
            <td></td>
         </tr>
<tr>
            <td>商户订单币种类型</td>
            <td>mhtCurrencyType</td>
            <td>156人民币</td>
         </tr>
<tr>
            <td>商户订单原单金额</td>
            <td>oriMhtOrderAmt</td>
            <td>单位(人民币)：分</td>
         </tr>
<tr>
            <td>商户订单实付金额</td>
            <td>mhtOrderAmt</td>
            <td>单位(人民币)：分</td>
         </tr>
<tr>
            <td>商户订单优惠金额</td>
            <td>discountAmt</td>
            <td>单位(人民币)：分</td>
         </tr>
<tr>
            <td>商户订单超时时间</td>
            <td>mhtOrderTimeOut</td>
            <td>60~3600秒，默认3600</td>
         </tr>
<tr>
            <td>商户订单开始时间</td>
            <td>mhtOrderStartTime</td>
            <td>yyyyMMddHHmmss</td>
         </tr>
<tr>
            <td>支付成功时间</td>
            <td>payTime</td>
            <td>yyyyMMddHHmmss</td>
         </tr>
<tr>
            <td>商户字符编码</td>
            <td>mhtCharset</td>
            <td>UTF-8</td>
         </tr>
<tr>
            <td>现在支付流水号</td>
            <td>nowPayOrderNo</td>
            <td></td>
         </tr>
<tr>
            <td>设备类型</td>
            <td>deviceType</td>
            <td></td>
         </tr>
<tr>
            <td>用户所选渠道类型</td>
            <td>payChannelType</td>
            <td></td>
         </tr>
<tr>
            <td>交易支付状态</td>
            <td>transStatus</td>
            <td></td>
         </tr>
<tr>
            <td>渠道订单号</td>
            <td>channelOrderNo</td>
            <td></td>
         </tr>
<tr>
            <td>付款人账号</td>
            <td>payConsumerId</td>
            <td>微信返回sub_openid,支付宝返回buyer_user_id</td>
         </tr>
<tr>
            <td>商户保留域</td>
            <td>mhtReserved</td>
            <td>给商户使用的字段，商户可以对交易进行标记，现在支付将原样返回</td>
         </tr>
<tr>
            <td>签名方法</td>
            <td>signType</td>
            <td>定值：MD5</td>
         </tr>
<tr>
            <td>数据签名</td>
            <td>signature</td>
            <td>除signature字段外，所有参数都参与MD5签名</td>
         </tr>
<tr>
            <td>银行类型</td>
            <td>bankType</td>
            <td>微信渠道返回</td>
         </tr>
<tr>
            <td>卡类型</td>
            <td>cardType</td>
            <td>CREDIT 信用卡  DEBIT  借记卡</td>
         </tr>
    </table>           
           
<h4 id='2.3'> 2.3 订单查询API </h4>
订单查询：OrderQueryService.php

<h5 id='2.3.1'></h5>

- 用户主扫支付订单查询

        /**
         * 主扫支付查询
         * @param $appId
         * @param $appKey
         * @param $mhtOrderNo
         * @return string
         * @param $isTest 是否测试 True 测试环境 False 生产环境
         */
        public static function orederQuery08($appId,$appKey,$mhtOrderNo,$isTest)
       
<h5 id='2.3.2'></h5>

- 用户被扫支付订单查询

        /**
         * 被扫支付查询
         * @param $appId
         * @param $appKey
         * @param $mhtOrderNo
         * @param $isTest 是否测试 True 测试环境 False 生产环境
         * @return string
         */
        public static function orederQuery05($appId,$appKey,$mhtOrderNo,$isTest)
        
<h5 id='2.3.3'></h5>

- 公众号支付订单查询

        /**
         * 公众号支付查询
         * @param $appId
         * @param $appKey
         * @param $mhtOrderNo
         * @param $isTest 是否测试 True 测试环境 False 生产环境
         * @return string
         */
        public static function orederQuery0600($appId,$appKey,$mhtOrderNo,$isTest)
        
<h5 id='2.3.4'></h5>

- H5支付订单查询

       /**
       * H5支付查询
       * @param $appId
       * @param $appKey
       * @param $mhtOrderNo
       * @param $isTest 是否测试 True 测试环境 False 生产环境
       * @return string
       */
       public static function orederQuery0601($appId,$appKey,$mhtOrderNo,$isTest)

        
<h5 id='2.3.5'></h5>

- 网页支付订单查询

      /**
       * web支付查询
       * @param $appId
       * @param $appKey
       * @param $mhtOrderNo
       * @param $isTest 是否测试 True 测试环境 False 生产环境
       * @return string
      */
      public static function orederQuery04($appId,$appKey,$mhtOrderNo,$isTest)

<h5 id='2.3.6'></h5>

- 小程序支付订单查询

        /**
         * 小程序支付查询
         * @param $appId
         * @param $appKey
         * @param $mhtOrderNo
         * @param $isTest 是否测试 True 测试环境 False 生产环境
         * @return string
         */
        public static function orederQuery14($appId,$appKey,$mhtOrderNo,$isTest)


订单查询接口字段含义如下:
接口接入URL：https://pay.ipaynow.cn/             请求类型：POST

<table>
        <tr>
            <th>字段名称</th>
            <th>字段Key</th>
            <th>备注</th>
        </tr>
        <tr>
            <td>功能码</td>
            <td>funcode</td>
            <td>定值：MQ002</td>
        </tr>
        <tr>
            <td>接口版本号</td>
            <td>version</td>
            <td>定值：1.0.0</td>
         </tr>
           <tr>
            <td>商户应用唯一标识</td>
            <td>appId</td>
            <td></td>
         </tr>
        <tr>
            <td>设备类型</td>
            <td>deviceType</td>
            <td></td>
         </tr>
        <tr>
            <td>商户订单号</td>
            <td>mhtOrderNo</td>
            <td></td>
         </tr>
        <tr>
            <td>商户字符集</td>
            <td>mhtCharset</td>
            <td>定值：UTF-8</td>
         </tr>
        <tr>
            <td>签名方法</td>
            <td>mhtSignType</td>
            <td>定值：MD5</td>
         </tr>
        <tr>
            <td>数据签名</td>
            <td>mhtSignature</td>
            <td>除mhtSignature字段外，所有参数都参与MD5签名。</td>
         </tr>
    </table>
        
        
<h4 id='2.4'> 2.4 退款API </h4>
    RefundService.php

<h5 id='2.4.1'></h5>

- 退款

       
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
           public static function refund($appId,$appKey,$mhtOrderNo,$mhtRefundNo,$amount,$reason,$isTest)

<h5 id='2.4.2'></h5>

- 退款查询

         /**
          * 退款查询
          * @param $appId 应用Id
          * @param $appKey 应用秘钥
          * @param $mhtRefundNo 退款单号
          * @param $isTest 是否测试 True 测试环境 False 生产环境
          * @return string
          */
         public static function refundQuery($appId,$appKey,$mhtRefundNo,$isTest)

<h5 id='2.4.3'></h5>

- 撤销

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
            public static function backOrder($appId,$appKey,$mhtOrderNo,$mhtRefundNo,$reason,$isTest)   

<h5 id='2.4.4'></h5>

- 撤销查询

            /**
             * 撤销查询
             * @param $appId 应用Id
             * @param $appKey 应用秘钥
             * @param $mhtRefundNo 撤销单号
             * @param $isTest 是否测试 True 测试环境 False 生产环境
             * @return string
             */
            public static function backOrderQuery($appId,$appKey,$mhtRefundNo,$isTest)                         

         
