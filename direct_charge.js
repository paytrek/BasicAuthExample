let apiKey = "";
let secret = "";

let settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://sandbox.paytrek.com/api/v2/direct_charge/",
  "method": "POST",
  "headers": {
    "Content-Type": "application/json",
    "Authorization": "Basic " + btoa(apiKey + ":" + secret),
  },
  "processData": false,
  "data": "{\n    \"amount\": \"12\",\n    \"order_id\": 7,\n    \"secure_option\": false,\n    \"pre_auth\": false,\n    \"number\": \"4508034508034509\",\n    \"expiration\": \"12/2020\",\n    \"cvc\": \"000\",\n    \"card_holder_name\": \"John Doe\",\n    \"billing_address\": \"Davutpasa\",\n    \"billing_city\": \"ISTANBUL\",\n    \"billing_country\": \"TR\",\n    \"billing_state\": \"IST\",\n    \"currency\": \"TRY\",\n    \"customer_email\": \"johndoe@sample.com\",\n    \"customer_first_name\": \"john\",\n    \"customer_ip_address\": \"78.167.133.200\",\n    \"customer_last_name\": \"doe\",\n    \"installment\": 1,\n    \"items\": [\n        {\n            \"unit_price\": 205,\n            \"quantity\": 1,\n            \"name\": \"Product Sample\",\n            \"photo\": \"https://blog.paytrek.com.tr/wp-content/uploads/2019/01/paytrek-new-logo.png\"\n        }\n    ],\n    \"sale_data\": {\n        \"merchant_name\": \"Your Store\"\n    },\n    \"language_code\": \"tr\"\n}"
};

$.ajax(settings).done(function (response) {
  console.log(response);
});