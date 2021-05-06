<?php

require './db.class.php';

class UserProfile extends DB {

    function user() {
        

        if(!empty($_REQUEST['FirstName']) && !empty($_REQUEST['LastName']) && !empty($_REQUEST['Id']) && isset($_REQUEST['ACTIVITY_VOLUME_LAST_YEAR']) && isset($_REQUEST['AccountNum']) && isset($_REQUEST['BankId']) && isset($_REQUEST['BranchId']) && isset($_REQUEST['CCode']) && isset($_REQUEST['EXPERIENCE_WITH_CLIENT']) && isset($_REQUEST['IdType']) && isset($_REQUEST['LatinFirstName']) && isset($_REQUEST['LatinLastName']) && isset($_REQUEST['PAYMENTS_ETHICS']) )
        {
            // subject parameters
            $FirstName = trim($_REQUEST['FirstName']);
            $LastName = trim($_REQUEST['LastName']);
            $Id = trim($_REQUEST['Id']);
            $ACTIVITY_VOLUME_LAST_YEAR = $_REQUEST['ACTIVITY_VOLUME_LAST_YEAR'];
            $AccountNum = $_REQUEST['AccountNum'];
            $BankId = $_REQUEST['BankId'];
            $BranchId = $_REQUEST['BranchId'];
            $CCode = $_REQUEST['CCode'];
            $EXPERIENCE_WITH_CLIENT = $_REQUEST['EXPERIENCE_WITH_CLIENT'];
            $IdType = $_REQUEST['IdType'];
            $LatinFirstName = $_REQUEST['LatinFirstName'];
            $LatinLastName = $_REQUEST['LatinLastName'];
            $PAYMENTS_ETHICS = $_REQUEST['PAYMENTS_ETHICS'];

            // echo $FirstName."<br>";echo $LastName."<br>";echo $Id."<br>";echo $ACTIVITY_VOLUME_LAST_YEAR."<br>";echo $AccountNum."<br>";echo $BankId."<br>";echo $BranchId."<br>";echo $CCode."<br>";echo $EXPERIENCE_WITH_CLIENT."<br>";echo $IdType."<br>";echo $LatinFirstName."<br>";echo $LatinLastName."<br>";echo $PAYMENTS_ETHICS."<br>"; die();

            // Business Parameters
            $UnregisteredCreditProviderDescription = trim("אובלי בע״מ");

            // $firstname = utf8_encode("לירן");
            // $lastname = utf8_encode("חולצה אפורה");
            // $UnregCredit = utf8_encode("אובלי בע״מ");

            // echo $firstname; die();

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://stgperws.bdi.co.il/FrontRest/FrontServiceRest.svc/PostRequest",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{\n\t\"Application\":{\n\n\t\t\"ApplicationContractType\":\"MORTGAGE\",\n\t\t\"CreditAmount\":0,\n\t\t\"CreditProviderApplicationCode\":\"\",\n\t\t\"Designation\":\"\",\n\t\t\"PaymentFrequencyInAYear\":\"\",\n\t\t\"PlannedMonthlyPayment\":0,\n\t\t\"PlannedStartingDate\":\"\",\n\t\t\"Role\":\"1\"\n\t},\n\t\"BusinessParameters\":{\n\n\t\t\"CreditProviderCode\":\"\",\n\t\t\"CreditProviderConsentToCCRCWAEnquiry\":0,\n\t\t\"FlagCustomerConsent\":\"1\",\n\t\t\"FlagCustomerIdentificationWhenCustomerGaveConsentAccordingToRegulations\":\"1\",\n\t\t\"FlagCustomerInformed\":\"1\",\n\t\t\"PWS\":\"DMAF83KB\",\n\t\t\"TermId\":\"515966661\",\n\t\t\"UnregisteredCreditProviderDescription\":\"".$UnregisteredCreditProviderDescription."\",\n\t\t\"User\":\"WS_OBLY_1234\"\n\t},\n\t\"Origin\":\"\",\n\t\"Reference\":\"Ref123456\",\n\t\"Reqtype\":\"CWAWS10\",\n\t\"Subject\":{\n\n\t\t\"ACTIVITY_VOLUME_LAST_YEAR\":".$ACTIVITY_VOLUME_LAST_YEAR.",\n\t\t\"AccountNum\":\"".$AccountNum."\",\n\t\t\"BankId\":".$BankId.",\n\t\t\"BranchId\":\"".$BranchId."\",\n\t\t\"CCode\":\"".$CCode."\",\n\t\t\"EXPERIENCE_WITH_CLIENT\":".$EXPERIENCE_WITH_CLIENT.",\n\t\t\"FirstName\":\"".$FirstName."\",\n\t\t\"Id\":\"".$Id."\",\n\t\t\"IdType\":".$IdType.",\n\t\t\"LastName\":\"".$LastName."\",\n\t\t\"LatinFirstName\":\"".$LatinFirstName."\",\n\t\t\"LatinLastName\":\"".$LatinLastName."\",\n\t\t\"PAYMENTS_ETHICS\":".$PAYMENTS_ETHICS."\n\t}\n}",
              CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Postman-Token: c0504878-b96b-4a72-81d3-7e3b9dcfd6f5",
                "cache-control: no-cache"
              ),
            ));

            $response_data = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              // $response = array('status' => 'false', 'message' => 'cURL Error.', 'error' => $err );
              echo "cURL Error #:" . $err;
            } else {
              // $response = array('status' => 'true', 'message' => 'Records found.' );
              echo $response_data;
            }

        }else{
          $response = array('status' => 'false', 'message' => 'Invalid request parameter!');
    }
        $this->json_output($response);
    }

}

$loggedin = new UserProfile();
$loggedin->user();

