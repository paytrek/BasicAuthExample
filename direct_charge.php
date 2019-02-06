<?php

$secret = "";
$api_key = "";
$url = "https://sandbox.paytrek.com/api/v2/direct_charge/";

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n    \"amount\": \"12\",\n    \"order_id\": 7,\n    \"secure_option\": false,\n    \"pre_auth\": false,\n    \"number\": \"4508034508034509\",\n    \"expiration\": \"12/2020\",\n    \"cvc\": \"000\",\n    \"card_holder_name\": \"John Doe\",\n    \"billing_address\": \"Davutpasa\",\n    \"billing_city\": \"ISTANBUL\",\n    \"billing_country\": \"TR\",\n    \"billing_state\": \"IST\",\n    \"currency\": \"TRY\",\n    \"customer_email\": \"johndoe@sample.com\",\n    \"customer_first_name\": \"john\",\n    \"customer_ip_address\": \"78.167.133.200\",\n    \"customer_last_name\": \"doe\",\n    \"installment\": 1,\n    \"items\": [\n        {\n            \"unit_price\": 205,\n            \"quantity\": 1,\n            \"name\": \"Product Sample\",\n            \"photo\": \"\"\n        }\n    ],\n    \"sale_data\": {\n        \"merchant_name\": \"Your Store\"\n    },\n    \"language_code\": \"tr\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic " . base64_encode($api_key . ':' . $secret),
    "Content-Type: application/json",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>
