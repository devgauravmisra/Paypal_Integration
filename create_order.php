
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set up your API credentials
$clientId = 'AbvnG_c6Gxd14cK8CQdoXpgMK3ODaGRv5bLrT0yuCVmSIZEh-lS71fSNoZScMyYfAkPwlyQmIItzJ-A6';
$clientSecret = 'EOqJQ04vyFW_yHyMjM9nMAIbor378eyDVPTsoxwU36YgEvHQBeeS6u9XZ_O-8aRTYcXA7wT6CO4n-Rsi';

// Create a PayPal order
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.paypal.com/v2/checkout/orders');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'intent' => 'CAPTURE',
    'purchase_units' => [[
        'amount' => [
            'currency_code' => 'USD',
            'value' => '10.00' // Set your desired amount here
        ]
    ]]
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Basic ' . base64_encode($clientId . ':' . $clientSecret)
]);
$response = curl_exec($ch);

curl_close($ch);

if ($response !== false) {
    $orderData = json_decode($response, true);
    echo json_encode(['id' => $orderData['id']]);
} else {
    // Handle error
    echo json_encode(['error' => 'Error creating PayPal order: ' . curl_error($ch)]);
}
?>
