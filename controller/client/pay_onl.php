<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$vnp_TmnCode = "0GD7OZB5"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "4L5TC8FQ243K2PXEW9A7Y4HPKT94PZXA"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/php/laptop_shop/view/client/order.php";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));


$vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
$vnp_Amount = 250000; // Số tiền thanh toán
$vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
$vnp_BankCode = 'NCB'; //Mã phương thức thanh toán
$vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount * 100,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
    "vnp_OrderType" => "other",
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_ExpireDate" => $expire
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}

ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}

header('Location: ' . $vnp_Url);
die();
/*
http://localhost/php/laptop_shop/view/client/order.php?
vnp_Amount=25000000&
vnp_BankCode=NCB&
vnp_BankTranNo=VNP14827648&
vnp_CardType=ATM&
vnp_OrderInfo=Thanh+toan+GD%3A3681&
vnp_PayDate=20250303092117&
vnp_ResponseCode=00&
vnp_TmnCode=0GD7OZB5&
vnp_TransactionNo=14827648&
vnp_TransactionStatus=00&
vnp_TxnRef=3681&
vnp_SecureHash=31a0e3f5e2a264348d24a72db2938f3c3282e1a366508b748d04762a6c09bc6b92
b2ba04e5346b0c1852f02f8ae9f26f1f781481dbf4eb4bf2116e31b341ee84
*/