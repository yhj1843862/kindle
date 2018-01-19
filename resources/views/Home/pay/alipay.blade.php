<?php
//密钥对
$keys = 'lhy510gpac4xiwy4hrpnckyqy7gdmqg0';
$data = [
    //基本配置
    'service' => 'create_direct_pay_by_user',
    'partner' => '2088321002257695',
    '_input_charset' => 'UTF-8',
    'notify_url' => 'http://test.yuyexx.com/notify_url.php',
    'return_url' => 'http://test.yuyexx.com/return_url.php',
    //业务配置
    'out_trade_no' =>'PH201712271938',
    'subject' => 'test',
    'payment_type' => 1,
    'total_fee' => 0.01,
    'seller_id' => '2088321002257695',
    'body' => 'testtest'
];
ksort($data);
reset($data);
$urlStr = '';
foreach ($data as $key => $value) {
    $urlStr .=  $key . '=' .$value . '&';
}
$urlStr = rtrim($urlStr,'&');
$sign  = md5($urlStr.$keys);

$urlStr .= '&sign_type=MD5&sign='.$sign;


$url = 'https://mapi.alipay.com/gateway.do?'.$urlStr;
header('location:'.$url);