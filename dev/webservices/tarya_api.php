<?php

$curl = curl_init();

 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://sparkorange.tarya.co.il:17373/spark/borrower_api.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 5000,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\"OrgId\" : 10069,\n\"FirstName\" : \"ivo\",\n\"LastName\" : \"segura\",\n\"TZ\" : \"203110697\",\n\"Cell\" : \"0541234567\",\n\"Email\": \"satendra@gmail.com\",\n\"Street\" : \"ביאליק\",\n\"HouseNum\": \"t 5\",\n\"City\" : \"תל אביב\",\n\"Sex\" : 1,\n\"Birthdate_y\" : \"1983\",\n\"Birthdate_m\" : \"04\",\n\"Birthdate_d\" : \"28\",\n\"Amount\" : 1024.32 ,\n\"Duration\" : 7,\n\"Product\" : \"New car\",\n\"OrderId\" : \"14XA24F\",\n\"SuccessUrl\" : \"https://obli.co.il/webservices/payment_success.php\",\n\"FailureUrl\" : \"https://obli.co.il/webservices/payment_failed.php\",\n\"AutoApprove\": 0\n}",
  CURLOPT_HTTPHEADER => array(
    
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    "Postman-Token: 1effd8b2-2187-4b3b-aee8-91ad39e85888,a2ab8682-a93b-4675-8537-3c04c68a8979",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "Error #:" . $err;
} else {
  echo $response;
}

//{\n\"OrgId\" : 95,\n\"FirstName\" : \"$first_name\",\n\"LastName\" : \"$last_name\",\n\"TZ\" : \"$TZId\",\n\"Cell\" : \"$client_phone\",\n\"Email\": \"$client_email\",\n\"Street\" : \"$street\",\n\"HouseNum\": \"$home_no\",\n\"City\" : \"תל אביב\",\n\"Sex\" : $client_gender,\n\"Birthdate_y\" : \"$client_year\",\n\"Birthdate_m\" : \"$client_month\",\n\"Birthdate_d\" : \"$client_day\",\n\"Amount\" : $amount ,\n\"Duration\" : $diff,\n\"Product\" : \"New car\",\n\"OrderId\" : \"14XA24F\",\n\"SuccessUrl\" : \"http://ebay.com/success?orderId=14XA24F\",\n\"FailureUrl\" : \"http://ebay.com/fail?orderId=14XA24F\",\n\"AutoApprove\": 0\n}

//real json
//{\n\"OrgId\" : 95,\n\"FirstName\" : \"ivo\",\n\"LastName\" : \"segura\",\n\"TZ\" : \"341321974\",\n\"Cell\" : \"0541234567\",\n\"Email\": \"ivosegura@gmail.com\",\n\"Street\" : \"ביאליק\",\n\"HouseNum\": \"t 5\",\n\"City\" : \"תל אביב\",\n\"Sex\" : 1,\n\"Birthdate_y\" : \"1983\",\n\"Birthdate_m\" : \"04\",\n\"Birthdate_d\" : \"28\",\n\"Amount\" : 1024.32 ,\n\"Duration\" : 7,\n\"Product\" : \"New car\",\n\"OrderId\" : \"14XA24F\",\n\"SuccessUrl\" : \"http://ebay.com/success?orderId=14XA24F\",\n\"FailureUrl\" : \"http://ebay.com/fail?orderId=14XA24F\",\n\"AutoApprove\": 0\n}

// CURLOPT_POSTFIELDS => "{\n\"amount\": 7500,\n\"autoApprove\": 1,\n\"birthDate\": \"1983-04-28\",\n\"cellPhone\": \"0503996262\",\n\"city\":\"תל אביב\",\n\"countryCode\": \"IL\",\n\"email\": \"nitzan.alcobi@gmail.com\",\n\"failureUrl\": \"http://ebay.com/sucess?orderId=14XA24F\",\n\"firstName\": \"דוד\",\n\"gender\": 1,\n\"houseNum\": \"5א\",\n\"includeUi\": 1,\n\"lastName\": \"ןהכ\",\n\"localCountryId\": \"028117513\",\n\"merchantId\": 10069,\n\"orderId\": \"14XA24F\",\n\"period\": 7,\n\"productTitle\": \"היזיולט\",\n\"street\": \"קילאיב\",\n\"successUrl\": \"http://ebay.com/sucess?orderId=14XA24F\"\n}",

// {
//   "amount": 7500,
//   "autoApprove": 1,
//   "birthDate": "1983-04-28",
//   "cellPhone": "0503996262",
//   "city": "תל אביב",
//   "countryCode": "IL",
//   "email": "nitzan.alcobi@gmail.com",
//   "failureUrl": "http://ebay.com/sucess?orderId=14XA24F",
//   "firstName": "דוד",
//   "gender": 1,
//   "houseNum": "5א",
//   "includeUi": 1,
//   "lastName": "ןהכ",
//   "localCountryId": "028117513",
//   "merchantId": 10069,
//   "orderId": "14XA24F",
//   "period": 7,
//   "productTitle": "היזיולט",
//   "street": "קילאיב",
//   "successUrl": "http://ebay.com/sucess?orderId=14XA24F"
// }


// $curl = curl_init();

// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://obli-backend.herokuapp.com/webservices/business_details.php",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 3000,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_id_number\"\r\n\r\n54325610\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_first_name\"\r\n\r\nSatendra555\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_last_name\"\r\n\r\nShukla555\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_email\"\r\n\r\nsatendra.tectum@gmail.com\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_phone\"\r\n\r\n7894561230\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_gender\"\r\n\r\n1\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_hometown\"\r\n\r\nIndore\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_street\"\r\n\r\nNehru Nagar\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_home_no\"\r\n\r\n8569\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_file\"\r\n\r\nhttp://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_date_of_birth\"\r\n\r\n2019-05-22\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_account_type\"\r\n\r\n1\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_another_account_status\"\r\n\r\n1\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"guarantee_period_month\"\r\n\r\n6\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"requested_amount\"\r\n\r\n234\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"first_signature_file\"\r\n\r\n1222\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"second_signature_file\"\r\n\r\n1333\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"amt_company_name\"\r\n\r\nqw1\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"amt_company_address\"\r\n\r\nqw2\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"amt_company_id\"\r\n\r\n4532\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"amt_company_business_type\"\r\n\r\n2\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"amt_company_contact_person_email\"\r\n\r\nqw1@gmail.com\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"amt_company_contact_person_name\"\r\n\r\nasd123\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"amt_company_contact_person_phone\"\r\n\r\n1234567892\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ant_first_name\"\r\n\r\n1sattt\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ant_last_name\"\r\n\r\nllllllaa\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ant_unique_id\"\r\n\r\n895623\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ant_client_email\"\r\n\r\nas@gmail.com\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ant_client_phone\"\r\n\r\n1234567893\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ant_client_add\"\r\n\r\nqwerasd zxcv\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ant_req_gur_amt\"\r\n\r\n6582\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ant_client_gender\"\r\n\r\n1\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ant_account_birth_date\"\r\n\r\n2015-05-23\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ant_lease_period\"\r\n\r\n895\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ant_client_file\"\r\n\r\nhttp://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"gr_company_name\"\r\n\r\ncm1\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"gr_company_address\"\r\n\r\ncm1 qwer\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"gr_company_email\"\r\n\r\ncm1@gmail.com\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"gr_company_period_month\"\r\n\r\n12563\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"gr_company_phone\"\r\n\r\n1234567893\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"gr_company_url\"\r\n\r\nhttp://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
//   CURLOPT_HTTPHEADER => array(
//     "Cache-Control: no-cache",
//     "Content-Type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
//     "Postman-Token: 3dd0ceae-d542-4fa4-943a-95e29ecc6292,754bec5a-2ab2-4914-ac69-b23f9b6e1ae1",
//     "cache-control: no-cache"
    
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo $response;
// }



//old backup tarya api

//$curl = curl_init();
//
//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//
//curl_setopt_array($curl, array(
//  CURLOPT_URL => "https://tarya.orange.tarya.co.il/api/tarya-pay/loan",
//  CURLOPT_RETURNTRANSFER => true,
//  CURLOPT_ENCODING => "",
//  CURLOPT_MAXREDIRS => 10,
//  CURLOPT_TIMEOUT => 30,
//  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//  CURLOPT_CUSTOMREQUEST => "POST",
//  CURLOPT_POSTFIELDS => "{\n\"OrgId\" : 10069,\n\"FirstName\" : \"דוד\",\n\"LastName\" : \"ןהכ\",\n\"TZ\" : \"564562318\",\n\"Cell\" : \"0503996262\",\n\"Email\": \"me@gmail.com\",\n\"Street\" : \"‫ביאליק‬\",\n\"HouseNum\": \"t 5\",\n\"City\" : \"‫אביב‬ ‫תל‬\",\n\"Sex\" : 1,\n\"Birthdate_y\" : \"1983\",\n\"Birthdate_m\" : \"04\",\n\"Birthdate_d\" : \"28\",\n\"Amount\" : 1024.32 ,\n\"Duration\" : 7,\n\"Product\" : \"New car\",\n\"OrderId\" : \"14XA24F\",\n\"SuccessUrl\" : \"http://ebay.com/success?orderId=14XA24F\",\n\"FailureUrl\" : \" http://ebay.com/fail?orderId=14XA24F \",\n\"AutoApprove\": 1\n}",
//  CURLOPT_HTTPHEADER => array(
//    
//    "Cache-Control: no-cache",
//    "Content-Type: application/json",
//    "Postman-Token: 1effd8b2-2187-4b3b-aee8-91ad39e85888,a2ab8682-a93b-4675-8537-3c04c68a8979",
//    "cache-control: no-cache"
//  ),
//));
//
//$response = curl_exec($curl);
//$err = curl_error($curl);
//
//curl_close($curl);
//
//if ($err) {
//  echo "cURL Error #:" . $err;
//} else {
//  echo $response;
//}
