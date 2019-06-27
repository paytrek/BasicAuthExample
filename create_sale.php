<?php
// This example creates sale(without charging) with using 'sale' endpoint

$sale_items[]= array(
	"name"       => "TEST URUN",
	"photo"      => "",
	"quantity"   => 1,
	"unit_price" => 10,
);

$sale_data = array(
  "merchant_name" => "Example Store",
);

$data = array(
	"order_id"            => date("YmdHis"),
	"secure_option"       => false,
	"return_url"          => "http://www.example.com/?is=ok",
	"cancel_url"          => "http://www.example.com/?is=fail",
	"installment"         => 1,
	"amount"              => 10,
	"currency"            => "TRY",
	"customer_first_name" => "John",
	"customer_last_name"  => "Doe",
	"customer_email"      => "john@doe.com",
	"billing_country"     => "TR",
	"billing_state"       => "TR",
	"billing_city"        => "ISTANBUL",
	"billing_zipcode"     => "34000",
	"billing_address"     => "Adresim",
	"customer_ip_address" => "1.1.1.1",
	"items"               => $sale_items,
	"sale_data"           => $sale_data,
);

//echo "<pre>". json_encode($data);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://sandbox.paytrek.com/api/v2/sale/");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt(
	$ch,
	CURLOPT_HTTPHEADER,
	array(
		"Content-Type: application/json",
		"Authorization: Basic " . base64_encode("TOKEN"),
	)
);

$response = curl_exec($ch);
curl_close($ch);

echo "<pre>";
print_r($response);
