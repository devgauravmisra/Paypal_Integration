<?php

$clientId = 'AbvnG_c6Gxd14cK8CQdoXpgMK3ODaGRv5bLrT0yuCVmSIZEh-lS71fSNoZScMyYfAkPwlyQmIItzJ-A6';
$clientSecret = 'EOqJQ04vyFW_yHyMjM9nMAIbor378eyDVPTsoxwU36YgEvHQBeeS6u9XZ_O-8aRTYcXA7wT6CO4n-Rsi';


$orderIDs = $_POST['orderID'];
$orderID =json_encode($orderIDs);

// Capture the PayPal payment
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sandbox.paypal.com/v2/checkout/orders/$orderID/capture");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Basic ' . base64_encode($clientId . ':' . $clientSecret)
]);
$response = curl_exec($ch);
curl_close($ch);

if ($response !== false) {
   //db insertion code
    echo json_encode(['status' => 'success']);
} else {
    // Handle error
    echo json_encode(['error' => 'Error capturing PayPal payment: ' . curl_error($ch)]);
}
?>
