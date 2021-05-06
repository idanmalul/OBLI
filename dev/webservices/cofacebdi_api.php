<?php

//echo $ip_server = $_SERVER['SERVER_ADDR']; die;
//echo getcwd();
//$url = $_GET['url'];
//echo 123; echo $url; die;

$url = "https://stgperws.bdi.co.il/FrontRest/FrontServiceRest.svc/PostRequest";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_SSLCERT => '/home/oblico/ssl/certs/Obli_b0552_360d3_1646491832_4787b285021502a3cd3bea7c5f3c905f.crt',
    CURLOPT_SSLKEY => '/home/oblico/public_html/admin-key.pem',
    CURLOPT_SSLVERSION => 1.2,
  CURLOPT_SSL_VERIFYHOST=> 0,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>'

{
   "Application": {
      "ApplicationContractType": [],
      "CreditAmount": "0",
      "CreditProviderApplicationCode": [],
      "Designation": [],
      "PaymentFrequencyInAYear": [],
      "PlannedMonthlyPayment": "0",
      "PlannedStartingDate": [],
      "Role": []
   },
   "BusinessParameters": {
      "CreditProviderCode": "",
      "CreditProviderConsentToCCRCWAEnquiry": "0",
      "FlagCustomerConsent": [],
      "FlagCustomerIdentificationWhenCustomerGaveConsentAccordingToRegulations": [],
      "FlagCustomerInformed": "1",
      "PWS": "DMB3T5WB",
      "TermId": "515966661",
      "UnregisteredCreditProviderDescription": "OBLI",
      "User": "WS_OBLY_1234"
   },
   "Reference": "Ref123456",
   "Reqtype": "CWAWS10",
   "Subject": {
      "ACTIVITY_VOLUME_LAST_YEAR": "0",
      "AccountNum": "0",
      "BankId": "0",
      "BranchId": "0",
      "CCode": "900",
      "EXPERIENCE_WITH_CLIENT": "0",
      "FirstName": "לירן",
      "LastName": "חולצה אפורה",
      "Id": "015723331",
      "IdType": "1",
      "LatinFirstName": [],
      "LatinLastName": [],
      "PAYMENTS_ETHICS": "0"
   }
}',
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

//print_r($response);

if(curl_exec($curl) === false)
{
    echo curl_error($curl);
}
else
{
//    echo 'Operation completed without any errors';
}

print_r($response);

curl_close($curl);
//echo $response;
?>