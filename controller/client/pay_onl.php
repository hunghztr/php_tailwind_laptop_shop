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
$vnp_Returnurl = "http://localhost/php/laptop_shop/controller/client/addToOrderOnl.php";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));


$vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
$vnp_Amount = $_GET['gia_tien']; // Số tiền thanh toán
$vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
$vnp_BankCode = 'NCB'; //Mã phương thức thanh toán
$vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán
$orderInfo = $_GET['ngay_tao'] . "|" . $_GET['tong_san_pham'] . "|" . $_GET['id_nd'] . "|" . $_GET['trang_thai'] . "|" . $_GET['dia_chi'] . "|" . $_GET['ghi_chu'] . "|" . $_GET['hinh_thuc'];
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount * 100,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $orderInfo,
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
vnp_Amount=1599000000&
vnp_BankCode=NCB&
vnp_BankTranNo=VNP14832609&
vnp_CardType=ATM&
vnp_OrderInfo=2025-03-06-1-9--ha+giang-hung%2C-online&vnp_PayDate=20250306094905&vnp_ResponseCode=00&vnp_TmnCode=0GD7OZB5&vnp_TransactionNo=14832609&vnp_TransactionStatus=00&vnp_TxnRef=7933&vnp_SecureHash=6094914f51c2e9042174d85c63b3279cb65d52ffa1e35f051433e0667e8c8f010a107e9f42279c9a480c5d8f9e665d50e59a35f37e294e2c82e99299837661a4
*/