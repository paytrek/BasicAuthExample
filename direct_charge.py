import base64

import requests

url = "http://sandbox.paytrek.com/api/v2/direct_charge/"

payload = {
    "amount": "12",
    "order_id": 7,
    "secure_option": False,
    "pre_auth": False,
    "number": "4508034508034509",
    "expiration": "12/2020",
    "cvc": "000",
    "card_holder_name": "John Doe",
    "billing_address": "Davutpasa",
    "billing_city": "ISTANBUL",
    "billing_country": "TR",
    "billing_state": "IST",
    "currency": "TRY",
    "customer_email": "johndoe@sample.com",
    "customer_first_name": "john",
    "customer_ip_address": "78.167.133.200",
    "customer_last_name": "doe",
    "installment": 1,
    "items": [
        {
            "unit_price": 205,
            "quantity": 1,
            "name": "Product Sample",
            "photo": "https://blog.paytrek.com.tr/wp-content/uploads/2019/01/paytrek-new-logo.png"
        }
    ],
    "sale_data": {
        "merchant_name": "Your Store"
    },
    "language_code": "tr"
}

# https://sandbox.paytrek.com/dashboard/account_info/
# Channel type must be API
api_key = "test_auto"
secret = "test_auto"

auth_token = base64.encodestring('%s:%s' % (api_key, secret)).replace('\n', '')

headers = {
    'Content-Type': "application/json",
    'Authorization': "Basic {}".format(auth_token),
}

response = requests.request("POST", url, data=payload, headers=headers)

print(response.text)
