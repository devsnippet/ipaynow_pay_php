
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

- 支付测试实例：example
    - Trade05.php （被扫支付 ）：payChannelType（12 支付宝支付，13 微信支付），channelAuthCode 支付授权码（点击付款码放大后即可显示）  
    - Trade08.php（主扫支付）：payChannelType（12 支付宝支付，13 微信支付），outputType（0 返回二维码，1返回支付链接）
    - Trade0600.php （公众号支付）：payChannelType（12 支付宝支付，13 微信支付），outputType （0-公众号0模式，1-公众号1模式 目前支持0模式）
    - Trade0601.php （H5支付）：payChannelType（12 支付宝支付，13 微信支付）
    - Trade04.php （PC支付）：payChannelType（12 支付宝支付）
### 2.2 DEMO使用 ###

   使用方法:  
   
     cd 进入example文件夹
     运行 Trade08.php
         
