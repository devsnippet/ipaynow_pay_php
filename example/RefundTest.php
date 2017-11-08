<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/11/8
 * Time: 10:03
 */

require_once "../service/RefundService.php";

//print RefundService::refund("150753082825470","8jTST7ywIBY0QQ3RlcxWEl08Xj9gaYyQ","eY85WUOEoSP1X","201711008","1","php退款测试");

print RefundService::refundQuery("150753082825470","8jTST7ywIBY0QQ3RlcxWEl08Xj9gaYyQ","20171108");