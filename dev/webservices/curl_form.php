<?php

$client_id_number = "01234544";
            $client_first_name = "Satendra";
            $client_last_name = "Shukla";
            $client_email = "satendra.tectum@gmail.com";
            $client_phone = "7894561230";
            $client_gender = "1";
            $client_hometown = "Indore";
            $client_street = "Nehru Nagar";
            $client_home_no = "8569";
            $client_file = "http://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png";
            $client_date_of_birth = "2019-05-22";
            $client_account_type = "1";
            $client_another_account_status = "1";
            $guarantee_period_month = "6";
            $requested_amount = "2344556555";
            $first_signature_file = "1222";
            $second_signature_file = "1333";
            $ant_first_name = "qw1";
            $ant_last_name = "qw2";
            $ant_client_email = "qw@gmail.com";
            $ant_unique_id = "345678";
            $ant_client_file = "http://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png";
            $ant_client_phone = "5236589325";
            $ant_client_add = "Indore";
            $ant_client_gender = "1";
            $ant_account_birth_date = "2019-09-19";
            $ant_req_gur_amt = "4000";
            $ant_lease_period = "550";
            // $approval_Status = '0';
            // $type_of_other_details = '1';

            /* API URL */
            $url = 'https://obli-backend.herokuapp.com/webservices/client_details.php';
       
            /* Init cURL resource */
            $ch = curl_init($url);

 
            /* Array Parameter Data */
            // $data = ['name'=>'Hardik', 'email'=>'itsolutionstuff@gmail.com'];

            $client_data = array('client_id_number' => $client_id_number, 'client_first_name' => $client_first_name, 'client_last_name' => $client_last_name, 'client_email' => $client_email, 'client_phone' => $client_phone, 'client_gender' => $client_gender, 'client_hometown' => $client_hometown, 'client_street' => $client_street, 'client_home_no' => $client_home_no, 'client_file' => $client_file, 'client_date_of_birth' => $client_date_of_birth, 'client_account_type' => $client_account_type, 'client_another_account_status' => $client_another_account_status, 'guarantee_period_month' => $guarantee_period_month, 'requested_amount' => $requested_amount, 'first_signature_file' => $first_signature_file, 'second_signature_file' => $second_signature_file, 'ant_first_name' => $ant_first_name, 'ant_last_name' => $ant_last_name, 'ant_client_email' => $ant_client_email, 'ant_unique_id' => $ant_unique_id, 'ant_client_file' => $ant_client_file, 'ant_client_phone' => $ant_client_phone, 'ant_client_add' => $ant_client_add, 'ant_client_gender' => $ant_client_gender, 'ant_account_birth_date' => $ant_account_birth_date, 'ant_req_gur_amt' => $ant_req_gur_amt, 'ant_lease_period' => $ant_lease_period);

            // print_r($client_data); die();
       
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $client_data);
                
            /* set the content type json */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                
            /* set return type json */
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
            /* execute request */
            $result = curl_exec($ch);
             
            /* close cURL resource */
            curl_close($ch);

            print_r($result);