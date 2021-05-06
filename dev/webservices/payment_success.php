<?php


require './db.class.php';

class payment extends DB {
    
    function api(){
        
        $data = array();
        if(!empty($_REQUEST)){
//        echo '<pre>';
//        print_r($_REQUEST);
            
            $data['success_data'] = json_encode($_REQUEST);
        } elseif(!empty($_GET)){
            $data['success_data'] = json_encode($_GET);
        }
        

        // $data['failed_data'] = json_encode($_REQUEST);
        
        if(!empty($data)){
            $this->insert_records('tarya_payment_api_response', $data);
        }

        

    }
}


$success = new payment();
$success->api();


?>