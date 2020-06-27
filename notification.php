<?php
require __DIR__ . '/vendor/autoload.php';
$data = file_get_contents('php://input');
$handle = curl_init('https://hookb.in/oXVXXLQkPDu1mmLaRmqM');
curl_setopt($handle, CURLOPT_POST, 1);
curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$result = curl_exec($handle);

if (!empty($data)) {
    $notification = json_decode($data);
    MercadoPago\SDK::setAccessToken("TEST-7927007857849250-062405-afb9bb9c52903c3deb1ad9e8116e5aa0-590656607");

    switch ($notification["action"]) {
        case 'payment.created':
            $payment = MercadoPago\Payment . find_by_id($notification["data"]["id"]);
            curl_setopt($handle, CURLOPT_POST, 1);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $payment);
            curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            $result = curl_exec($handle);
            break;
    }
}
