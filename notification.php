<?php

 
$handle = curl_init('https://hookb.in/oXVXXLQkPDu1mmLaRmqM');
$encodedData = file_get_contents('php://input');//json_encode($data);

curl_setopt($handle, CURLOPT_POST, 1);
curl_setopt($handle, CURLOPT_POSTFIELDS, $encodedData);
curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$result = curl_exec($handle);

?>