
<?php
class API
{
    public function request($info)
    {
        $handle = curl_init('https://hookb.in/oXVXXLQkPDu1mmLaRmqM');
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $info);
        curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_exec($handle);
    }
}

require __DIR__ . '/vendor/autoload.php';
$data = file_get_contents('php://input');
$api = new API();
$api->request($data);

if (!empty($data)) {
    $notification = json_decode($data, true);
    MercadoPago\SDK::setAccessToken("TEST-7927007857849250-062405-afb9bb9c52903c3deb1ad9e8116e5aa0-590656607");
    switch ($notification["action"]) {
        case 'payment.created':
            //echo "DATA ID " . $notification["data"]["id"];
            $payment = MercadoPago\Payment::find_by_id($notification["data"]["id"]);
            //echo 'status=>'.$payment['status'].'</br>';
            //echo 'status_detail=>'.$payment['status_detail'];
            $api->request(json_encode($payment));
            //echo "DATA ID expor  " . $notification["data"]["id"];
            echo json_encode($payment);
            break;
    }
}


