<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require './db.class.php';

class payment extends DB {
    
    function api(){
        
        $data = array();
        if(!empty($_REQUEST)){
//        echo '<pre>';
//        print_r($_REQUEST);
            $data['failed_data'] = json_encode($_REQUEST);
        } elseif(!empty($_GET)){
            $data['failed_data'] = json_encode($_GET);
        }
        

        // $data['failed_data'] = json_encode($_REQUEST);
        
        if(!empty($data)){
            $this->insert_records('tarya_payment_api_response', $data);
        }

        

    }
}


$failed = new payment();
$failed->api();


?>
