import java.util.Base64;
import okhttp3.MediaType;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

class DirectCharge
{
	public static void main (String[] args) throws java.lang.Exception
	{
        String api_key = "";
        String secret = "";

        String key = api_key + ":" + secret;
        String encoding = Base64.getEncoder().encodeToString(key.getBytes("utf-8"));

        OkHttpClient client = new OkHttpClient();


        MediaType mediaType = MediaType.parse("application/json");
        RequestBody body = RequestBody.create(mediaType, "{\n    \"amount\": \"12\",\n    \"order_id\": 7,\n    \"secure_option\": false,\n    \"pre_auth\": false,\n    \"number\": \"4508034508034509\",\n    \"expiration\": \"12/2020\",\n    \"cvc\": \"000\",\n    \"card_holder_name\": \"John Doe\",\n    \"billing_address\": \"Davutpasa\",\n    \"billing_city\": \"ISTANBUL\",\n    \"billing_country\": \"TR\",\n    \"billing_state\": \"IST\",\n    \"currency\": \"TRY\",\n    \"customer_email\": \"johndoe@sample.com\",\n    \"customer_first_name\": \"john\",\n    \"customer_ip_address\": \"78.167.133.200\",\n    \"customer_last_name\": \"doe\",\n    \"installment\": 1,\n    \"items\": [\n        {\n            \"unit_price\": 205,\n            \"quantity\": 1,\n            \"name\": \"Product Sample\",\n            \"photo\": \"\"\n        }\n    ],\n    \"sale_data\": {\n        \"merchant_name\": \"Your Store\"\n    },\n    \"language_code\": \"tr\"\n}");
        Request request = new Request.Builder()
          .url("https://sandobox.paytrek.com/api/v2/direct_charge/")
          .post(body)
          .addHeader("Content-Type", "application/json")
          .addHeader("Authorization", "Basic " + encoding)
          .build();

        Response response = client.newCall(request).execute();
    }
}