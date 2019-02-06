namespace ConsoleApplication3
{
    using System;
    using System.Threading;

    using RestSharp;

    public class Program
    {
        public static async void Main()
        {
            var url = "https://sandbox.paytrek.com";
			var resource = "/api/v2/direct_charge/";
			var payload = "{\"amount\": \"12\", \"order_id\": 7, \"secure_option\": false,\n    \"pre_auth\": false,\n    \"number\": \"4508034508034509\",\n    \"expiration\": \"12/2020\",\n    \"cvc\": \"000\",\n    \"card_holder_name\": \"John Doe\",\n    \"billing_address\": \"Davutpasa\",\n    \"billing_city\": \"ISTANBUL\",\n    \"billing_country\": \"TR\",\n    \"billing_state\": \"IST\",\n    \"currency\": \"TRY\",\n    \"customer_email\": \"johndoe@sample.com\",\n    \"customer_first_name\": \"john\",\n    \"customer_ip_address\": \"78.167.133.200\",\n    \"customer_last_name\": \"doe\",\n    \"installment\": 1,\n    \"items\": [\n        {\n            \"unit_price\": 205,\n            \"quantity\": 1,\n            \"name\": \"Product Sample\",\n            \"photo\": \"https://blog.paytrek.com.tr/wp-content/uploads/2019/01/paytrek-new-logo.png\"\n        }\n    ],\n    \"sale_data\": {\n        \"merchant_name\": \"Your Store\"\n    },\n    \"language_code\": \"tr\"\n}";

			// https://sandbox.paytrek.com/dashboard/account_info/
			// Channel type must be API
			var apiKey = "";
			var secret = "";


			var client = new RestClient(url);
			client.Authenticator = new HttpBasicAuthenticator(apiKey, secret);

			var request = new RestRequest(resource, Method.POST);

			request.AddHeader("Content-Type", "application/json");
			request.AddParameter("application/json", payload, ParameterType.RequestBody);
			IRestResponse response = client.Execute(request);
			System.Console.WriteLine(response.Content);
        }
    }
}