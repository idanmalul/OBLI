<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PrivateFlow extends CI_Controller {
    
    function __construct() {

        parent::__construct();
         date_default_timezone_set('Asia/Jerusalem');
         
         
         error_reporting(0);
//         echo $this->config->item('payment_url'); die;
         
    }
	
    function smsvarification(){
		
		$this->load->helper('common_helper');
		
		$data = $this->input->post();
		
		$otp = verify_send_otp($data);
		
		echo $otp;
	}		
    
    function private_Form1(){
//        $this->session->sess_destroy();
        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'private1' => $data
            );

            $this->session->set_userdata($newdata);
//            echo 'hello';
//            print_r($this->session->userdata()); die();
            redirect('private2');
        }else{
            
            $session_array = array('private1', 'private2', 'private3', 'private4', 'private5', 'private6', 'private7', 'private8', 'private9');
            $this->session->unset_userdata($session_array);
                
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/private/private_1_scr');
            $this->load->view('website/footer', $data);
        }
        
    }
    
    function private_Form2(){
        
        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data); 
            
            // first file
            if(isset($_FILES["file-2"]["name"])) {

                $config['upload_path'] = './webservices/obli_profile_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["file-2"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file-2', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                // $this->load->view('website/header');
                // $this->load->view('website/tenant', $form_data);
                // $this->load->view('website/footer', $data);
                // return false;
                }
                $client_file = base_url().'webservices/obli_profile_images/'.$file_name;

                $data['user_first_file'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";

                // $file_name = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

                // echo base_url().'/'.$client_file; die();

            } 
            // end
            
            $newdata = array(
                'private2' => $data
            );

            $this->session->set_userdata($newdata);
//            echo 'hello';
//            $this->session->unset_userdata('private1');
//            $this->session->unset_userdata('private2');
//            print_r($this->session->userdata()); die();
            
            /* API : Start */
            
            $private1 = $this->session->userdata('private1');
            $preferred_route = $private1['radio-box'];
            
            $private2 = $this->session->userdata('private2');
            $first_name = $private2['first_name'];
            $last_name = $private2['last_name'];
            $unique_id = $private2['unique_id'];
            $client_hometown = $private2['hometown'];
            $client_street = $private2['street'];
            $client_home_no = $private2['home_no'];
            $client_phone = $private2['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);
            $client_email = $private2['client_email'];
            $client_gender = $private2['client_gender'];
            $client_date_of_birth = strtr($private2['client_date_of_birth'], '/', '-');
            $client_date_of_birth = date('Y-m-d', strtotime($client_date_of_birth));
            $client_first_file = $private2['user_first_file'];
            
            $client_account_type = 1;
            $client_another_account_status = 0;
            
            $fields = array('client_id_number' => $unique_id, 'client_first_name' => $first_name, 'client_last_name' => $last_name, 'client_email' => $client_email, 'client_phone' => $client_phone, 'client_gender' => $client_gender, 'client_hometown' => $client_hometown, 'client_street' => $client_street, 'client_home_no' => $client_home_no, 'client_file' => $client_first_file, 'client_date_of_birth' => $client_date_of_birth, 'client_account_type' => $client_account_type, 'client_another_account_status' => $client_another_account_status );

//            echo '<pre>'; 
//            print_r($fields); 
//            die();


            $url = 'https://obli-backend.herokuapp.com/webservices/privateClientDetails.php';

            //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //execute post
            $result = curl_exec($ch);
            $err = curl_error($ch);
            //close connection
            curl_close($ch);

            if($err){
                // echo $err;
                //$session_array = array('private2');
                //$this->session->unset_userdata($session_array);
                echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('private2')."'; </script>";
                return FALSE;
//                redirect('businessThird1');
//                $responsePostData = array('status'=>'false','msg'=>'Error in order insertion!');
//                echo json_encode($responsePostData);
            }
            else{
//                print_r($result); die();
//                echo 1; die();
                 $clientData = json_decode($result);
//                 print_r($clientData);echo "<br>"; 
//                 print_r($clientData->client_reponse_data[1]->_hc_lastop); 
//                 die();
                 
                 if(!empty($clientData)){
                     if($clientData->status == "true"){
                         
                         if(@$clientData->client_reponse_data[1]->_hc_lastop == "FAILED"){
                            
                            //$session_array = array('private2');
                           // $this->session->unset_userdata($session_array);
                            echo "<script type='text/javascript'>alert('Your record is rejected, Please try again!'); window.location.href = '".site_url('private2')."'; </script>";
//                            redirect('business1');
                            return FALSE;
                             
                        }else{
                             
//                           $session_array = array('businessThird1');
//                           $this->session->unset_userdata($session_array);

//                             alert('Your record successfully saved!');
//                            die();
                            $private1 = $this->session->userdata('private1');
                            // print_r($private1); die();

                            if(!empty($private1)){
                                // private 1 case
                                if($private1['radio-box'] == "מסלול ללא עמלה"){
                                    // redirect('private31');
                                    $this->session->set_userdata('order_id_number', @$clientData->client_reponse_data[1]->order_id_number);
                                    echo "<script type='text/javascript'>window.location.href = '".site_url('private31')."';</script>";
                                    return FALSE;
                                }
                                // private 2 case
                                elseif($private1['radio-box'] == "מסלול ללא פיקדון"){
                                    // redirect('private32');
                                    $this->session->set_userdata('order_id_number', @$clientData->client_reponse_data[1]->order_id_number);
                                    echo "<script type='text/javascript'>window.location.href = '".site_url('private32')."';</script>";
                                    return FALSE;
                                }
                                else{
                                    // redirect('private31');
                                    $this->session->set_userdata('order_id_number', @$clientData->client_reponse_data[1]->order_id_number);
                                    echo "<script type='text/javascript'>window.location.href = '".site_url('private31')."';</script>";
                                    return FALSE;
                                }
                            }
                        

                         }
                         
                     }
                     else{
                         
                       // $session_array = array('private2');
                      //  $this->session->unset_userdata($session_array);
                        echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('private2')."'; </script>";
                        return FALSE;
                        
//                         redirect('businessThird1');
                     }
                 }
//                 print_r($orderData->status);
//                 print_r($orderData); die();
                 
            }

            /* API : End */
            
            
            
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/private/private_2_scr');
            $this->load->view('website/footer', $data);
        }
        
    }
    
    function private_Form3_1(){
//        $this->session->sess_destroy();
        $data = $this->input->post();
        if(!empty($data)){
            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'private3' => $data
            );

            $this->session->set_userdata($newdata);
//            echo 'hello';
//            print_r($this->session->userdata()); die();
            redirect('private6');
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/private/private_3_1_scr');
            $this->load->view('website/footer', $data);
        }
        
    }
    
    function private_Form3_2(){
//        $this->session->sess_destroy();
        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'private3' => $data
            );

            $this->session->set_userdata($newdata);
//            echo 'hello';
//            print_r($this->session->userdata()); die();
            redirect('private42');
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/private/private_3_2_scr');
            $this->load->view('website/footer', $data);
        }
        
    }
    
//    function private_Form4_1(){
////        $this->session->sess_destroy();
//        $data = $this->input->post();
//        if(!empty($data)){
//            echo '<pre>';
////            print_r($data);
//            $newdata = array(
//                'private4' => $data
//            );
//
//            $this->session->set_userdata($newdata);
////            echo 'hello';
////            print_r($this->session->userdata()); die();
//            redirect('private5');
//        }else{
//            // footer records
//            $sql3 = "SELECT * FROM menu_section where status = 1";
//            $data['menu_details'] = $this->project_model->get_query_result($sql3);
//
//            $sql4 = "SELECT * FROM icons_section where status = 1";
//            $data['icons_details'] = $this->project_model->get_query_result($sql4);
//
//            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
//            $data['application_url_details'] = $this->project_model->get_query_result($sql5);
//
//            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
//            $data['logo_details'] = $this->project_model->get_query_result($sql6);
//
//            $this->load->view('website/header');
//            $this->load->view('website/private/private_4_1_scr');
//            $this->load->view('website/footer', $data);
//        }
//        
//    }
    
    function private_Form4_2(){
//        $this->session->sess_destroy();
        $data = $this->input->post();
        if(!empty($data)){
            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'private4' => $data
            );

            $this->session->set_userdata($newdata);
//            echo 'hello';
//            print_r($this->session->userdata()); die();
            redirect('private52');
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/private/private_4_2_scr');
            $this->load->view('website/footer', $data);
        }
        
    }
    
    function private_Form5_2(){
//        echo '<pre>';
//        print_r($this->session->userdata()); die();
//        $this->session->sess_destroy();
        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            
            // another user file
            if(isset($_FILES["file-2"]["name"])) {

                $config['upload_path'] = './webservices/obli_profile_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["file-2"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file-2', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                // $this->load->view('website/header');
                // $this->load->view('website/tenant', $form_data);
                // $this->load->view('website/footer', $data);
                // return false;
                }
                $client_file = base_url().'webservices/obli_profile_images/'.$file_name;

                $data['another_user_file'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";

                // $file_name = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

                // echo base_url().'/'.$client_file; die();

            } 
            // end
            
            $newdata = array(
                'private5' => $data
            );

            $this->session->set_userdata($newdata);
//            echo 'hello';
//            print_r($this->session->userdata()); die();
            redirect('private6');
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/private/private_5_2_scr');
            $this->load->view('website/footer', $data);
        }
        
    }
    
    // private1 and private2 flow both  
    function private_Form6(){ 
			// echo '<pre>'; print_r($this->session->userdata()); die;
//        $this->session->sess_destroy();
        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            
            // another user file
            if(isset($_FILES["file-1"]["name"])) {

                $config['upload_path'] = './webservices/obli_profile_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["file-1"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file-1', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                // $this->load->view('website/header');
                // $this->load->view('website/tenant', $form_data);
                // $this->load->view('website/footer', $data);
                // return false;
                }
                $client_file = base_url().'webservices/obli_profile_images/'.$file_name;

                $data['another_user_file'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";

                // $file_name = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

                // echo base_url().'/'.$client_file; die();

            } 
            // end
            
            $newdata = array(
                'private6' => $data
            );

            $this->session->set_userdata($newdata);
//            echo '<pre>';
//            print_r($this->session->userdata()); die();
            redirect('private7');
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/private/private_6_scr');
            $this->load->view('website/footer', $data);
        }
        
    }
    
    function private_Form7(){
//        echo '<pre>';
//        print_r($this->session->userdata()); die();
//        $this->session->sess_destroy();
        $data = $this->input->post();
        if(!empty($data)){
//            echo 2; die;
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'private7' => $data
            );
            
            // form values
            
            // client details
            $private1 = $this->session->userdata('private1');
            $preferred_route = $private1['radio-box'];
                        
            $private2 = $this->session->userdata('private2');
            $first_name = $private2['first_name'];
            $last_name = $private2['last_name'];
            $unique_id = $private2['unique_id'];
            $client_hometown = $private2['hometown'];
            $client_street = $private2['street'];
            $client_home_no = $private2['home_no'];
            $client_phone = $private2['client_phone'];
            $client_email = $private2['client_email'];
            $client_gender = $private2['client_gender'];

            // order id number
            $order_id_number = $this->session->userdata('order_id_number');
            
            $private3 = $this->session->userdata('private3');
            
            $flowCheck = $private3["flowCheck"];
            
            if(!empty($private3["flowCheck"])){
            
                if($private3["flowCheck"] == 1){
                    $amount = $private3["private1_requested_gurantee_amt"];
                }
                else{
                    $amount = $private3["private2_requested_gurantee_amt"];
					$amount = 22000;
                }

            }
            else{
                $amount = $private3["private1_requested_gurantee_amt"];
            }
            $req_gur_amt = $amount;

            // print_r($postData);

            $startDate = $private3['startDate'];
            $endDate = $private3['endDate'];

            $ts1 = strtotime($startDate);
            $ts2 = strtotime($endDate);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
            $client_gur_month = $diff;

            // print_r($_FILES);
        
        // first signature image start
        if(!empty($private3["flowCheck"])){
            
            if($private3["flowCheck"] == 1){
                
                $file_path1 = "";
            }
            else{
                
                define('UPLOAD_DIR', 'doc_sign/');
                $img1 = $private3['first_base64_signature'];

                $img1 = str_replace('data:image/png;base64,', '', $img1);
                $img1 = str_replace(' ', '+', $img1);
                $data1 = base64_decode($img1);

                $encoded_string1 = $img1;
                $imgdata1 = base64_decode($encoded_string1);
                $mimetype1 = $this->getImageMimeType($imgdata1);
                // echo $imgdata; die();

                $file1 = UPLOAD_DIR . uniqid() . '.'.$mimetype1;
                // echo $file; die();
                $success1 = file_put_contents($file1, $data1);

                $file_path1 = base_url().$file1;
                // $file_path1 = "222";
				
				$file_path1 = "";
            }

        }
        else{
            $file_path1 = "";
        }
            

        // end


        // second signature image start
            define('UPLOAD_SECOND_DIR', 'doc_sign/');
              $img2 = $private3['second_base64_signature'];
              
              $img2 = str_replace('data:image/png;base64,', '', $img2);
              $img2 = str_replace(' ', '+', $img2);
              $data2 = base64_decode($img2);

              $encoded_string2 = $img2;
              $imgdata2 = base64_decode($encoded_string2);
              $mimetype2 = $this->getImageMimeType($imgdata2);
              // echo $imgdata2; die();

              $file2 = UPLOAD_SECOND_DIR . uniqid().rand() . '.'.$mimetype2;
              // echo $file; die();
              $success2 = file_put_contents($file2, $data2);

              $file_path2 = base_url().$file2;
              // $file_path2 = "123";

        // end

            // echo $file_path2; die();

            if(!empty($amount)){

                if($amount > 25000){


                    // $another_account_address = $postData['apartment_add'];
                    // $another_first_name = $postData['landlord'];
                    // $another_account_id_number = $postData['landlord_id'];
                    // $another_account_phone = $postData['property_phone'];
                    // $another_account_email = $postData['sec_email'];

                    // another details 
                    $private5 = $this->session->userdata('private5');
                    
                    $another_first_name = $private5['ant_first_name'];
                    $another_last_name = $private5['ant_last_name'];
                    $another_account_id_number = $private5['ant_unique_id'];
                    $another_account_email = $private5['ant_client_email'];
                    $another_account_phone = $private5['ant_client_phone']; 
                    $another_account_phone = str_replace(["-"], '', $another_account_phone);
                    $another_account_address = $private5['ant_client_add'];
                    $another_account_sum = $private5['ant_req_gur_amt'];
                    $another_account_gender = $private5['ant_client_gender'];
                    $another_account_dob = strtr($private5['antsec_date_of_birth'], '/', '-');
                    $another_account_dob = date("Y-m-d", strtotime($another_account_dob));
                    $ant_account_file = $private5['another_user_file'];
                    $type_of_other_details = '1';

                    $another_startDate = strtr($private5['antstartDate'], '/', '-');
                    $another_startDate = date("Y-m-d", strtotime($another_startDate));
                    
                    $another_endDate = strtr($private5['antendDate'], '/', '-');
                    $another_endDate = date("Y-m-d", strtotime($another_endDate));

                    $an_ts1 = strtotime($another_startDate);
                    $an_ts2 = strtotime($another_endDate);

                    $an_year1 = date('Y', $an_ts1);
                    $an_year2 = date('Y', $an_ts2);

                    $an_month1 = date('m', $an_ts1);
                    $an_month2 = date('m', $an_ts2);

                    $an_diff = (($an_year2 - $an_year1) * 12) + ($an_month2 - $an_month1);

                    $an_lease_period = $an_diff;

                   
                }
                else{

                    $type_of_other_details = '2';
                    // another details (property details)
                    $private6 = $this->session->userdata('private6');
                    
                    $another_account_address = $private6['apartment_add'];
                    $another_first_name = $private6['landlord'];
                    $another_account_id_number = $private6['landlord_id'];
                    $another_account_phone = $private6['property_phone'];
                    $another_account_phone = str_replace(["-"], '', $another_account_phone);
                    $another_account_email = $private6['sec_email'];
                    $ant_account_file = $private6['another_user_file'];
                    $another_account_dob = "";
                    $another_account_gender = "";
                    $another_account_sum = "";
                    $another_last_name = "";
                    $another_startDate = "";
                    $another_endDate = "";
                    
                    // $sec_StartDate = date('Y-m-d', strtotime($postData['sec_dateStartDate']));
                    // $sec_EndDate = $postData['sec_dateEndDate'];
                    // $sec_EndDate = date('Y-m-d', strtotime($sec_EndDate));

                    // echo $postData['sec_dateStartDate']."  ".$sec_StartDate."  "; echo $postData['sec_dateEndDate']."  "; echo $sec_EndDate."  ";

                    // $sec_ts1 = strtotime($sec_StartDate);
                    // $sec_ts2 = strtotime($sec_EndDate);

                    // $sec_year1 = date('Y', $sec_ts1);
                    // $sec_year2 = date('Y', $sec_ts2);

                    // $sec_month1 = date('m', $sec_ts1);
                    // $sec_month2 = date('m', $sec_ts2);

                    // $sec_diff = (($sec_year2 - $sec_year1) * 12) + ($sec_month2 - $sec_month1);

                    $an_lease_period = "";

                
           
                // $property_phone = $postData['property_phone'];
                //["another_account_sum = $postData['fullname'];

                }
            }

        // user pdf and link generate (pdf details)
            $date = date("Y-m-d");
            $amount = $req_gur_amt;
            $name = $first_name." ".$last_name;
            $document_number_id = $unique_id;
            $address = $client_street.", ".$client_home_no.", ".$client_hometown;
            $no_of_months = $client_gur_month;
            $file_path = $file_path2;
            $document_id = "";
        

         $document_id = $this->session->userdata('order_id_number');
            
            $private5 = $this->session->userdata('private5');
            
            $endDate = date('Y').'-12-31';
           
            if(!empty($private5))
            {
              $endDate = $private5['endDate'];
            }

        $html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
            <HTML>
            <HEAD>
                <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
                <TITLE>כתב ערבות</TITLE>
                <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)">
                <META NAME="AUTHOR" CONTENT="Hen Choen">
                <META NAME="CREATED" CONTENT="20190430;154600000000000">
                <META NAME="CHANGEDBY" CONTENT="DANIEL">
                <META NAME="CHANGED" CONTENT="20190618;71200000000000">
                <META NAME="CLASSIFICATION" CONTENT="חן כהן">
                <META NAME="DESCRIPTION" CONTENT="90856\0\3">
                <META NAME="KEYWORDS" CONTENT="90856\0\3">
                <META NAME="AppVersion" CONTENT="16.0000">
                <META NAME="DocSecurity" CONTENT="0">
                <META NAME="HyperlinksChanged" CONTENT="false">
                <META NAME="LinksUpToDate" CONTENT="false">
                <META NAME="ScaleCrop" CONTENT="false">
                <META NAME="ShareDoc" CONTENT="false">

                <STYLE TYPE="text/css">
                
                    @page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
                    P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2; margin-top: 0.08in;}
                    P.western { font-family: "Times New Roman", serif; font-size: 12pt }
                    P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 12pt }
                    LI{
                        margin-right: -20px;
                    }
                    #pd{
                    margin-bottom:-10px;
                    }
                    #pd1{
                    margin-bottom:-15px;
                    }
                  

                </STYLE>
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; ">
            <img src="http://oblidev.malul.xyz/website_assets/img/logo.png" class="img-responsive" style="height: 40px; margin-left: 20px;">
            <img src="http://oblidev.malul.xyz/website_assets/img/gold.png" class="img-responsive" style="height: 40px; margin-right: 20px; margin-bottom: -10px;">
            </div>
            <DIV TYPE=HEADER>
                  <!--<P DIR="RTL" ALIGN=CENTER STYLE="margin-bottom: 0.47in; line-height: 100%">
                <FONT FACE="David"><SPAN LANG="he-IL">לוגו ופרטים של
                גולדן רוד</SPAN></FONT></P> -->
            </DIV>
            <!--<P DIR="LTR" CLASS="western" ALIGN=CENTER><FONT FACE="David"><SPAN LANG="he-IL"><U><FONT SIZE=4><B>כתב
            ערבות</B></FONT></U></SPAN></FONT></P>-->
            <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">לכבוד</SPAN></FONT>:</P>
            <P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>שם המשכיר</B><U> </U></SPAN></FONT>
            </P>
            <P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><U>'.$name.'</U></SPAN></FONT></P>
            <P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in;float:left;"><FONT FACE="David" ><SPAN LANG="he-IL" STYLE="" >תאריך</SPAN></FONT>:
            '.$date.'</P>
            <P DIR="RTL" CLASS="western" ALIGN=CENTER STYLE="margin-left: 0.02in">

                <FONT FACE="David"><SPAN LANG="he-IL">א</SPAN></FONT>.<FONT FACE="David"><SPAN LANG="he-IL">ג</SPAN></FONT>.<FONT FACE="David"><SPAN LANG="he-IL">נ</SPAN></FONT>.,

            </P>


            <p DIR="RTL" CLASS="western" ALIGN=CENTER STYLE="text-align: center;">

                <FONT FACE="David"><SPAN LANG="he-IL"><B>הנדון</B></SPAN></FONT><B>:
            </B><FONT FACE="David"><SPAN LANG="he-IL"><U><B>ערבות מס</B></U></SPAN></FONT><U><B> '.$document_id.'</B></U>

            </p>

            <OL>

                <LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL">אנו ערבים בזה כלפיך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם לתשלום כל סכום עד לסכום כולל של</SPAN></FONT><U>'.$amount.'</U><B>
                ₪ </B>(<FONT FACE="David"><SPAN LANG="he-IL">(להלן:</SPAN></FONT>:
                &quot;<FONT FACE="David"><SPAN LANG="he-IL"><B>סכום הערבות</B></SPAN></FONT>&quot;)
                <FONT FACE="David"><SPAN LANG="he-IL">שתדרוש</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">תדרשו
                מ</SPAN></FONT>- <U><FONT FACE="David"><SPAN LANG="he-IL">'.$name.'</SPAN></FONT></U> (<FONT FACE="David"><SPAN LANG="he-IL">להלן
                וביחד</SPAN></FONT>: <B>&quot;</B><FONT FACE="David"><SPAN LANG="he-IL"><B>הנערב</B></SPAN></FONT><B>&quot;</B>)
                <FONT FACE="David"><SPAN LANG="he-IL">בקשר עם ההסכם מיום
                </SPAN></FONT> <U><FONT FACE="David"><SPAN LANG="he-IL">'.$date.'</SPAN></FONT></U>, <FONT FACE="David"><SPAN LANG="he-IL">על כל
                תוספותיו</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">ככל
                שיהיו מעת לעת </SPAN></FONT>(<FONT FACE="David"><SPAN LANG="he-IL">להלן</SPAN></FONT>:
                <B>&quot;</B><FONT FACE="David"><SPAN LANG="he-IL"><B>ההסכם</B></SPAN></FONT><B>&quot;</B>).</P>

                <LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL">סכום
                הערבות יהיה צמוד למדד המחירים לצרכן
                כפי שהוא מתפרסם מפעם לפעם על ידי הלשכה
                המרכזית לסטטיסטיקה ולמחקר כלכלי</SPAN></FONT>,
                <FONT FACE="David"><SPAN LANG="he-IL">בתנאי ההצמדה שלהלן</SPAN></FONT>:</P>
                <P DIR="RTL" STYLE="margin-left: 0.35in">&quot;<FONT FACE="David"><SPAN LANG="he-IL"><B>המדד
            היסודי</B></SPAN></FONT>&quot; <FONT FACE="David"><SPAN LANG="he-IL">לעניין
            ערבות זו</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">יהא
            המדד שפורסם ביום </SPAN></FONT><U>'.date("Y").'</U> <FONT FACE="David"><SPAN LANG="he-IL">בגין
            חודש </SPAN></FONT><U>'.date("m").'</U> <SPAN LANG="he-IL"> <FONT FACE="David"><SPAN LANG="he-IL">שינה</FONT> </SPAN></P>
                <P DIR="RTL" STYLE="margin-left: 0.35in">&quot;<FONT FACE="David"><SPAN LANG="he-IL"><B>המדד
            החדש</B></SPAN></FONT>&quot; <FONT FACE="David"><SPAN LANG="he-IL">לעניין
            ערבות זו</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">יהא
            המדד שפורסם לאחרונה וקודם לקבלת דרישתכ  ם
            על פי ערבות זו</SPAN></FONT>.</P>
            <P DIR="RTL" STYLE="margin-left: 0.35in"><FONT FACE="David"><SPAN LANG="he-IL">הפרשי
            ההצמדה לעניין ערבות זו יחושבו כדלהלן</SPAN></FONT>:
            <FONT FACE="David"><SPAN LANG="he-IL">אם יתברר כי המדד
            החדש עלה לעומת המדד היסודי</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">יהיו
            הפרשי ההצמדה </SPAN></FONT>- <FONT FACE="David"><SPAN LANG="he-IL">הסכום
            השווה למכפלת ההפרש בין המדד החדש למדד
            היסודי בסכום הדרישה</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">מחולק
            במדד היסודי</SPAN></FONT>. <FONT FACE="David"><SPAN LANG="he-IL">אם
            המדד החדש יהיה נמוך מהמדד היסודי</SPAN></FONT>,
            <FONT FACE="David"><SPAN LANG="he-IL">נשלם לך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
            את הסכום הנקוב בדרישתך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
            עד לסכום הערבות</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">ללא
            כל הפרשי הצמדה</SPAN></FONT>.</P>

            </OL>';
        
        $html .= "
            <OL START=3>
                <LI>


                    <P DIR='RTL' id='pd'><FONT FACE='David'><SPAN LANG='he-IL'>
                        אנו נשלם לך לפי דרישתך/ם הראשונה בכתב, ולא יאוחר מארבעה עשר ימים מתאריך התקבל דרישתך/ם על ידינו (באמצעות מייל לכתובת info@obli.co.il), כל סכום הנקוב בדרישה ובלבד שלא יעלה על סכום הערבות הצמוד למדד, מבלי להטיל עליך/ם חובה להוכיח או לבסס את דרישתך/ם ומבלי שתהיה/ו חייב/ים לדרוש את התשלום תחילה מאת הנערב. להודעת המייל כאמור יש לצרף את שטר הערבות שהתקבל במייל, צילום תעודת זהות, אישור ניהול חשבון בנק או צילום צ'ק מבוטל עם פרטי החשבון.

                    </SPAN></FONT></P>";
        
        
        $html .= '


                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">
                    
                    ערבות זו תישאר בתוקפה עד ליום <U>'.$endDate.'</U>, ולאחר תאריך זה תהיה בטלה ומבוטלת.

                </SPAN></FONT>.
                    </P>

                </LI>



                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL"> ערבות זאת אינה ניתנת להעברה ו/או להסבה. </SPAN></FONT>.</P>

                </LI>
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">ערבות זו ניתנת למימוש לשיעורין.

בכבוד רב,</SPAN></FONT>.</P>

                </LI>
            </OL>

            <P DIR="LTR" CLASS="western" STYLE="margin-left: 3.54in; text-indent: 4.39in">

                <span><FONT FACE="David"><SPAN LANG="he-IL">בכבוד
            רב</SPAN></FONT>,</span>
        </P>
            
            <P DIR="LTR" CLASS="western" STYLE="margin-left: 3.54in; text-indent: 4.39in">


                  <FONT FACE="David"><SPAN LANG="he-IL">גולדן</SPAN></FONT>-<FONT FACE="David"><SPAN LANG="he-IL">רוד
            בע</SPAN></FONT>&quot;<FONT FACE="David"><SPAN LANG="he-IL">מ</SPAN></FONT></P>
            <P DIR="LTR" CLASS="western"><img src="'.$file_path.'" width="200" height="" STYLE="margin:0 35%; color:red;">
            </P>
            </BODY>
            </HTML>';
           
            $location_url = 'doc_sign/userPdf/';

            $pdf_data = $this->pdf($html,$location_url);
            $final_pdf_path = $pdf_data['final_pdf_path'];
            $pdf_file = $pdf_data['pdf_file'];
            // echo "<pre>"; print_r($pdf_data)."<br>"; echo $final_pdf_path."<br>"; echo $pdf_file;
            // die();
            
            $property_owner_email = "satendra.tectum@gmail.com";
            $user_link = base_url()."business12/".base64_encode($pdf_file)."/".base64_encode($property_owner_email) ;
            $user_pdf = $final_pdf_path;
        // end

        // first document
            $html1 = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
            <HTML>
            <HEAD>
                <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
                <TITLE>כתב ערבות</TITLE>
                <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)">
                <META NAME="AUTHOR" CONTENT="Hen Choen">
                <META NAME="CREATED" CONTENT="20190430;154600000000000">
                <META NAME="CHANGEDBY" CONTENT="DANIEL">
                <META NAME="CHANGED" CONTENT="20190618;71200000000000">
                <META NAME="CLASSIFICATION" CONTENT="חן כהן">
                <META NAME="DESCRIPTION" CONTENT="90856\0\3">
                <META NAME="KEYWORDS" CONTENT="90856\0\3">
                <META NAME="AppVersion" CONTENT="16.0000">
                <META NAME="DocSecurity" CONTENT="0">
                <META NAME="HyperlinksChanged" CONTENT="false">
                <META NAME="LinksUpToDate" CONTENT="false">
                <META NAME="ScaleCrop" CONTENT="false">
                <META NAME="ShareDoc" CONTENT="false">
                

                <STYLE TYPE="text/css">
                
                    @page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
                    P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2; margin-top: 0.08in;}
                    P.western { font-family: "Times New Roman", serif; font-size: 12pt; }
                    P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 12pt }
                    .text_color{
                        color: #323474
                    }

                 
                .check1{
                    position: absolute; 
                    width: 15px; 
                    height: 15px; 
                    right: 55px; 
                    top:390px; 
                    border: 1px solid #cccccc; 
                    border-radius: 3px; 
                    background-color: #428bca;
                    content: "\f00c" !important;
                }
                .check2{
                    position: absolute; 
                    width: 15px; 
                    height: 15px; 
                    right: 55px; 
                    top:500px; 
                    border: 1px solid #cccccc; 
                    border-radius: 3px; 
                    background-color: #428bca;
                    
                }
                    


                </STYLE>
                }
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
          
          
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; margin-top: -150px;">
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center;">
            <FONT FACE="David"><SPAN LANG="he-IL"> הלוואה למימון עמלת ערבות </SPAN></FONT></P>

            </div>
            <DIV TYPE=HEADER>
                  
            </DIV>
             <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> אני, החתום מטה, '.$first_name.' '. $last_name.' בעל ת.ז. מס  '.$unique_id.' מאשר ומצהיר כמפורט להלן:</SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">1. ידוע לי כי תשלום העמלה לגולדנרוד פיננסים בע"מ, ח.פ. 513578674 (להלן: "גולדנרוד") בגין העמדת הערבות (להלן: "העמלה") באמצעות הלוואה זו ומימון העמלה בדרך של קבלת הלוואה באמצעות טריא פי2פי בע"מ )ח.פ. 515024131 ) או טריא קהילה פיננסית בע"מ (ח.פ. 515928034) (שתי החברות יקראו להלן: "טריא") הן עסקאות נפרדות.  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2. אני מצהיר ומאשר שסכום ההלוואה יועבר במישרין לגולדנרוד ובחתימתי על נספח זה אני מסכים לכל תנאי ההלוואה וכן לכל תנאי האתר שבאמצעותו אקבל את ההלוואה ואני מורה לטריא להעביר את סכום ההלוואה כאמור. </SPAN></FONT></P>
        
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3. אני מאשר שידוע לי שטריא אינה שותפה או ערבה בצורה כלשהי לעסקי גולדנרוד, ואינה צד לעסקה זו, ולפיכך טענות הנוגעות לעמלה או טענות אחרות שעלולות להיות לי כלפי, לרבות בקשר עם </SPAN></FONT></P>
           

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> העמלה, לא יהוו עילה לאי תשלום ההלוואה ולא יפטרו אותי מתשלום החזרי ההלוואה לטריא. </SPAN></FONT></P>
            <BR>
                    <div class="check1"><span><img src="http://oblidev.malul.xyz/website_assets/img/Vector.png" class="img-responsive"  STYLE="padding-top:2px;"></span>
                    </div>
                                        
            <P DIR="RTL" CLASS="western text_color" STYLE="margin: 0px 40px 0px 0px; font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%, ">
            <FONT FACE="David"><SPAN LANG="he-IL">אני מבין כי טריא אינה מאפשרת לקחת הלוואה עבור אחרים ואני מצהיר בזה כי אני מבקש לקבל הלוואה בעבור עצמי בלבד.  </SPAN></FONT></P>
             
            <P DIR="RTL" CLASS="western text_color" STYLE="margin: 0px 40px 0px 0px;  margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> אני מתחייב להודיע לטריא בכתב בהקדם האפשרי על כל שינוי בפרטים שמסרתי לעיל; ידוע לי כי מסירת מידע כוזב, לרבות אי-מסירת עדכון של פרט החייב בדיווח, במטרה שלא יהיה דיווח או כדי לגרום לדיווח בלתי נכון לפי סעיף 7 לחוק איסור הלבנת הון, התש"ס-, מהווה עבירה פלילית.  </SPAN></FONT></P>
             <BR>
                 <div class="check2"><span  STYLE="color:white;"><span><img src="http://oblidev.malul.xyz/website_assets/img/Vector.png" class="img-responsive" STYLE="padding-top:2px;"></span>
                    </div>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin: 0px 40px 0px 0px; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 
צורך בדיקת הבקשה, אנחנו מתכוונים לפנות ללשכת אשראי על מנת לקבל חיווי אשראי. מובהר בזאת שלצורך קבלת החיווי לשכת האשראי תגיש בקשה לבנק ישראל לקבלת נתוני אשראי לגביך הכלולים במאגר. הפנייה ללשכת אשראי לצורך קבלת חיווי הינה בכל מקרה של בקשה לקבלת הלוואה באמצעות טריא. </SPAN></FONT></P>

          <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; ">
            <FONT FACE="David"><SPAN LANG="he-IL" > <B>שם הלקוח: </B>'.$first_name.' '. $last_name.' <B>חתימה דיגיטלית: </B></SPAN></FONT></P>

            <BR>

            <DIV CLASS="" style="text-align: center; ">

            
                                    
            <img src="'.$file_path1.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

             
            </BODY>
            </HTML>';

          
            $location_url1 = 'doc_sign/first_document/';

            $pdf_data1 = $this->pdf($html1,$location_url1);
            $first_document = $pdf_data1['final_pdf_path'];
            // $pdf_file = $pdf_data['pdf_file'];
        // end first

        // second document
            $date_signature = date('F d, Y');
            $html2 = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
            <HTML>
            <HEAD>
                <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
                <TITLE>כתב ערבות</TITLE>
                <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)">
                <META NAME="AUTHOR" CONTENT="Hen Choen">
                <META NAME="CREATED" CONTENT="20190430;154600000000000">
                <META NAME="CHANGEDBY" CONTENT="DANIEL">
                <META NAME="CHANGED" CONTENT="20190618;71200000000000">
                <META NAME="CLASSIFICATION" CONTENT="חן כהן">
                <META NAME="DESCRIPTION" CONTENT="90856\0\3">
                <META NAME="KEYWORDS" CONTENT="90856\0\3">
                <META NAME="AppVersion" CONTENT="16.0000">
                <META NAME="DocSecurity" CONTENT="0">
                <META NAME="HyperlinksChanged" CONTENT="false">
                <META NAME="LinksUpToDate" CONTENT="false">
                <META NAME="ScaleCrop" CONTENT="false">
                <META NAME="ShareDoc" CONTENT="false">

                <STYLE TYPE="text/css">
                
                    @page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
                    P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2; margin-top: 0.08in;}
                    P.western { font-family: "Times New Roman", serif; font-size: 12pt; }
                    P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 12pt }
                    .text_color{
                        color: #323474
                    }

                  
                   

                </STYLE>
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
          
         
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; margin-top: -150px;">
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center;">
            <FONT FACE="David"><SPAN LANG="he-IL"> הלוואה למימון עמלת ערבות  </SPAN></FONT></P>

            </div>
            <DIV TYPE=HEADER>
                  
            </DIV>
             <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">שנערך ונחתם ב '.$date_signature.' </SPAN></FONT></P>

             <BR>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">בין גולדנרוד בע"מ ח.פ. 513578674 (להלן: "הערב")  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מרח  יד חרוצים 12, תל אביב  </SPAN></FONT></P>
        
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לבין '.$name.' </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">'.$address.' </SPAN></FONT></P>
            <BR>
            <BR>


            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הואיל והערב עוסקת במתן שירותי אשראי והינה בעלת רישיון למתן אשראי כהגדרתו בחוק הפיקוח על שירותים  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> פיננסיים (שירותים פיננסיים מוסדיים), התשע"ו-2016;  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> והואיל והערב הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו <B>'.$order_id_number.'</B> (להלן: "כתב הערבות"), </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">לטובת המוטב, על סך '.$amount.' ₪ (להלן: "סכום הערבות"), המצורף בזאת כנספח א להסכם זה; </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> והואיל וברצון הצדדים להגדיר ולהסדיר את החובות אשר יחולו עליהם בקשר עם חילוט כתב הערבות ע"י  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> המוטב. </SPAN></FONT></P>
             
            <BR>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לפיכך הוסכם, הוצהר והותנה בין הצדדים כדלקמן:  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%, ">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1. מבוא ונספחים </SPAN></FONT></P>

           <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.1.  המבוא להסכם וכן כל הנספחים המצורפים להסכם מהווים חלק בלתי נפרד הימנו (להלן: "<B>ההסכם</B>").   </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.2. כותרות הסעיפים נועדו לצורך הנוחיות בלבד ואין לפרש תנאי מתנאי ההסכם לפיהן. </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.3. הצדדים מצהירים כי אין עליהם כל הגבלה, בין בהסכם, בין על פי דין ובין בכל אופן אחר, המונעת מכל אחד  </SPAN></FONT></P>
            
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מהם או מגבילה אותם מלהתקשר בהסכם זה ולמלא את הוראותיו. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2. ההתקשרות </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.1. במסגרת ההתקשרות הכללית בין הצדדים, הערב הנפיקה ללקוח כתב ערבות, אשר פרטיו מפורטים  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> במבוא להסכם זה, לטובתו של המוטב, בו התחייבה להעביר לידי המוטב את סכום הערבות במקרה שבו יבקש  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> המוטב לממש את כתב הערבות.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.2. במקרה של מימוש כתב הערבות ע"י המוטב, מכל סיבה שהיא, החייב ישלם לחברה כל סכום אותו תידרש  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הערב לשלם למוטב. עבור כל יום איחור בתשלום סכום הערבות לחברה, ישלם החייב ריבית שנתית בגובה של </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>6%</B> מסכום הערבות. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.3. במקרה של מימוש כתב הערבות ע"י המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית הערב  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לקבלת הלוואה דרך חברת טריא בריבית שנתית קבועה של 6%. ההלוואה תעמוד לתקופה של 18 חודשים. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הענקת ההלוואה כפופה לאישור חיתום הלקוח בטריא. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.4. במקרה של אי קיום התחייבויות הלקוחה מצדה כאמור בהסכם, הערב/ה ללקוחה (כמוגדר בנספח ב להסכם) מתחייב/ת באופן אישי ובלתי חוזר, לשלם במקום החייבת, כל תשלום לו יידרש, בהתאם למוסכם תחת ס עיף זה.</SPAN></FONT></P>                      

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.5. במקרה של שני ערבים לחייב החתומים כנגד שטר הערבות, כל אחד מהם יחויב להעביר לידי הערב את  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מלוא סכום הערבות כמפורט בסעיף 2.2, וזאת במקרה זה לא יוכלו החייבים לקבל הפנייה לקבלת הלוואה ו/או  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לא יעמדו בבדיקת הלקוח אותה תבצע טריא. </SPAN></FONT></P>

            
            <BR>
             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3. תקופת ההסכם  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3.1. הסכם זה יעמוד בתוקפו החל מיום האמור לעיל ויסתיים במוקדם מבין:  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> (א) מועד סיום תקופת הערבות, הכוללת גם תקופה של חידוש ו/או הארכת הערבות; </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> (ב) מועד קבלת מלוא סכום הערבות אשר הועבר למוטב ע"י הערב במסגרת חילוט הערבות.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4. מצגים </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הלקוח מצהיר בזאת, כדלקמן:  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.1. הוא בעל האמצעים הכלכליים לשיפוי הערב בכל סכום הערבות כשהוא צמוד מדד בערכיו המשוערכים   </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.2. לא התקבלה החלטה על פירוקה מרצון ו/או לא התחיל הליך פירוק החברה מרצון, כמשמעותם בחוק ה חברות, תשנ"ט 1999- [נוסח מלא ומעודכן]. </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.3. לא מתקיימים לגביה הליכי חדלות פירעון כמשמעותם בסעיף 2 לחוק חדלות פירעון ושיקום כלכלי, ת שע"ח 2018- [נוסח מלא ומעודכן]. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.4. ספרי הערב ישמשו כראייה לסכום חובו לחברה. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5. התחייבויות הלקוח </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.1. הלקוח יידע את הערב אם אחד מהמצגים המנויים מעלה יחדול מלהתקיים במהלך תקופת ההסכם.  </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.2. הלקוח ישלם לחברה, לפי דרישתה הראשונה, את מלוא סכום הערבות אותו העבירה למוטב, וזאת תוך 7 </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> ימים ממועד העברת סכום הערבות למוטב. </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.3. הלקוח יפצה ו/או ישפה את הערב, לפי דרישתה הראשונה, בגין כל סכום ו/או הוצאה מכל סוג שהוא שתהיה </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לחברה, במישרין ובעקיפין, בקשר עם גביית סכום הערבות מהלקוח.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.4. במקרה של אי קיום התחייבויות הלקוחה כאמור לעיל, הערב/ה ללקוחה מתחייב/ת באופן אישי ובלתי ח וזר, לשלם במקום החייבת, כל תשלום לו יידרש, בהתאם לתנאים המוסכמים תחת סעיף זה.</SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6. כללי </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.1. הדין הישראלי יחול באופן בלעדי על הסכם זה, וסמכות השיפוט הבלעדית בכל הקשור להסכם זה תהיה  </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מסורה לבתי המשפט המוסמכים בתל אביב. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.2. אם ייקבע ע"י ערכאה מסוימת כי הוראה מהוראות הסכם זה אינה ניתנת לאכיפה ו/או הינה חסרת תוקף מטעם כלשהו, לא יהא בכך כדי לפגום ו/או לבטל את תוקפן של יתר הוראות ההסכם.</SPAN></FONT></P>
            

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.3. הודעה שתישלח על פי כתובות הצדדים במבוא להסכם זה בדואר רשום, תיחשב כאילו הגיעה לצד שכנגד </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> ולידיעתו תוך 3 ימים מיום שיגורה בדואר רשום מבית דואר בישראל ואם נמסרה ביד – בעת מסירתה, ואם </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> שוגרה בפקס או בדוא"ל – תוך 24 שעות ממועד שיגורה. </SPAN></FONT></P>

            <BR><P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד: </SPAN></FONT></P>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.base_url().'website_assets/img/sign_1.png" class="img-responsive" style="margin-left: 20px;">

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימה דיגיטלית:</SPAN></FONT></P>
            <BR>
            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$file_path2.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

             
            </BODY>
            </HTML>';

        
            $location_url2 = 'doc_sign/second_document/';

            $pdf_data2 = $this->pdf($html2,$location_url2);
            $second_document = $pdf_data2['final_pdf_path'];
        // end second

//            $diff_data = array('diff' => $diff, 'an_diff' => $an_diff, 'sec_diff' => $sec_diff, 'client_file' => $client_first_file, 'another_account_file' => $another_account_file, 'order_file_name' => $order_file_name, 'file_path1' => $file_path1, 'file_path2' => $file_path2 );
            
            
            
            
            // House Rent Document //
     
    $clientID = $unique_id; $signaturepath = 'https://obli.co.il/website_assets/img/sign_1.png';
    
    $private6 = $this->session->userdata('private6');
                    
    $another_account_address = $private6['apartment_add'];
    $another_first_name = $private6['landlord'];
    
    if(empty($another_first_name))
    {
        $another_first_name = $name;
    }
    
    if(empty($another_account_address))
    {
        $another_account_address = $address;
    }
          
            
   $html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
            <HTML>
            <HEAD>
                <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
                <TITLE>כתב ערבות</TITLE>
                <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)">
                <META NAME="AUTHOR" CONTENT="Hen Choen">
                <META NAME="CREATED" CONTENT="20190430;154600000000000">
                <META NAME="CHANGEDBY" CONTENT="DANIEL">
                <META NAME="CHANGED" CONTENT="20190618;71200000000000">
                <META NAME="CLASSIFICATION" CONTENT="חן כהן">
                <META NAME="DESCRIPTION" CONTENT="90856\0\3">
                <META NAME="KEYWORDS" CONTENT="90856\0\3">
                <META NAME="AppVersion" CONTENT="16.0000">
                <META NAME="DocSecurity" CONTENT="0">
                <META NAME="HyperlinksChanged" CONTENT="false">
                <META NAME="LinksUpToDate" CONTENT="false">
                <META NAME="ScaleCrop" CONTENT="false">
                <META NAME="ShareDoc" CONTENT="false">

                <STYLE TYPE="text/css">
                
                    @page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
                    P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2; margin-top: 0.08in;}
                    P.western { font-family: "Times New Roman", serif; font-size: 12pt }
                    P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 12pt }
                    LI{
                        margin-right: -20px;
                    }
                    #pd{
                    margin-bottom:-10px;
                    }
                    #pd1{
                    margin-bottom:-15px;
                    }
                  

                </STYLE>
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; ">
            <img src="http://oblidev.malul.xyz/website_assets/img/logo.png" class="img-responsive" style="height: 40px; margin-left: 20px;">
            <img src="http://oblidev.malul.xyz/website_assets/img/gold.png" class="img-responsive" style="height: 40px; margin-right: 20px; margin-bottom: -10px;">
            </div>
            <DIV TYPE=HEADER>
                  <!--<P DIR="RTL" ALIGN=CENTER STYLE="margin-bottom: 0.47in; line-height: 100%">
                <FONT FACE="David"><SPAN LANG="he-IL">לוגו ופרטים של
                גולדן רוד</SPAN></FONT></P> -->
            </DIV>
            <!--<P DIR="LTR" CLASS="western" ALIGN=CENTER><FONT FACE="David"><SPAN LANG="he-IL"><U><FONT SIZE=4><B>כתב
            ערבות</B></FONT></U></SPAN></FONT></P>-->
            
           <div STYLE="margin-left:10%; margin-right:10%; width:80%;">
            <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><B><SPAN LANG="he-IL">לכבוד</SPAN></B></FONT>:</P>
            <P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
                
                    <FONT FACE="David"><SPAN LANG="he-IL"><B><U>'.$another_first_name.'</U></B></SPAN></FONT>
                    <br/>
                    <br/>
                    <FONT FACE="David"><SPAN LANG="he-IL"><B><U>'.$another_account_address.'</U></B></SPAN></FONT>
                    
                
            <P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><B><SPAN LANG="he-IL">א</SPAN></FONT>.<FONT FACE="David"><SPAN LANG="he-IL">ג</SPAN></FONT>.<FONT FACE="David"><SPAN LANG="he-IL">נ</SPAN></B></FONT>.,</P>
            
<P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B> תאריך </B></SPAN></FONT>:</P>
            
<P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">'.$date.'</SPAN></FONT></P>
                
     <!-- <table STYLE="width:100%;">
        <tr>
        
            <td STYLE="text-align:left; width:10%;"></td>
        
            <td DIR="LTR" CLASS="western" STYLE="text-align:right; width:20%;"><FONT FACE="David" ><B><SPAN LANG="he-IL" STYLE="">תאריך</SPAN></B></FONT>:
            '.$date.'</td>
                

            <td></td>
            
            <td></td>
                
            
            
         </tr>    
         </table> -->


            <p DIR="RTL" CLASS="western" ALIGN=CENTER STYLE="text-align: center;">

                <FONT FACE="David"><SPAN LANG="he-IL"><B>הנדון</B></SPAN></FONT><B>:
            </B><FONT FACE="David"><SPAN LANG="he-IL"><U><B>ערבות מס</B></U></SPAN></FONT><U><B> '.$document_id.'</B></U>

            </p>

            <OL>

                <LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL"> אנו ערבים בזה כלפיך/ם לתשלום כל סכום עד לסכום כולל של <B><U>'.$amount.'</U></B> ₪ (להלן: "סכום הערבות") שתדרוש/תדרשו מאת <B><U>'.$name.'</B></U>  ת.ז <B><U>'.$clientID.'</U></B> (להלן וביחד: "הנערב") בקשר עם ההסכם מיום <B><U>'.$date.'</U></B>, על כל תוספותיו, ככל שיהיו מעת לעת (להלן: <B>"ההסכם"</B>).
 </SPAN></FONT></P>

<LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL">סכוםסכום הערבות יהיה צמוד למדד המחירים לצרכן כפי שהוא מתפרסם מפעם לפעם על ידי הלשכ    המרכזית לסטטיסטיקה ולמחקר כלכלי, בתנאי ההצמדה שלהלן:
<B>"המדד היסודי"</B> לעניין ערבות זו, יהא המדד שפורסם בגין חודש <B>'.date("m").'</B> שנה <B>'.date("Y").'</B>. <br/>
<B>"המדד החדש"</B> לעניין ערבות זו, יהא המדד שפורסם לאחרונה וקודם לקבלת דרישתכם על פי ערבות זו.
הפרשי ההצמדה לעניין ערבות זו יחושבו כדלהלן: אם יתברר כי המדד החדש עלה לעומת המדד היסודי, יהיו הפרשי ההצמדה - הסכום השווה למכפלת ההפרש בין המדד החדש למדד היסודי בסכום הדרישה, מחולק במדד היסודי. אם המדד החדש יהיה נמוך מהמדד היסודי, נשלם לך/ם את הסכום הנקוב בדרישתך/ם עד לסכום הערבות, ללא כל הפרשי הצמדה</SPAN></FONT>.</P>

            </OL>';
        
        $html .= "
            <OL START=3>
                <LI>


                    <P DIR='RTL' id='pd'><FONT FACE='David'><SPAN LANG='he-IL'>
                        
                        אנו נשלם לך לפי דרישתך/ם הראשונה בכתב, ולא יאוחר מארבעה עשר ימים מתאריך התקבל דרישתך/ם על ידינו (באמצעות מייל לכתובת info@obli.co.il), כל סכום הנקוב בדרישה ובלבד שלא יעלה על סכום הערבות הצמוד למדד, מבלי להטיל עליך/ם חובה להוכיח או לבסס את דרישתך/ם ומבלי שתהיה/ו חייב/ים לדרוש את התשלום תחילה מאת הנערב. להודעת המייל כאמור יש לצרף את שטר הערבות שהתקבל במייל, צילום תעודת זהות, אישור ניהול חשבון בנק או צילום צ'ק מבוטל עם פרטי החשבון.

                    </SPAN></FONT></P>";
        
        
        $html .= '


                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">
                    
                   ערבות זו תישאר בתוקפה עד ליום <B><U>'.$endDate.'</U></B>, ולאחר תאריך זה תהיה בטלה ומבוטלת.
כל דרישה על פי ערבות זו צריכה להתקבל על ידינו בכתב ולא יאוחר מהתאריך הנ"ל


                </SPAN></FONT>.
                    </P>

                </LI>



                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL"> ערבות זאת אינה ניתנת להעברה ו/או להסבה
 </SPAN></FONT>.</P>

                </LI>
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL"> ערבות זו ניתנת למימוש לשיעורין

</SPAN></FONT>.</P>

                </LI>
            </OL>
            

           <table style="width:100%; text-align:center;">
           
            <tr>
            
             <td> </td>
             
             <td> 

            <P DIR="LTR" CLASS="western" STYLE="margin-right: -0.2in; text-indent: 4.39in">

                <span><FONT FACE="David"><SPAN LANG="he-IL">בכבוד
            רב</SPAN></FONT>,</span>
        </P>
            
            <P DIR="LTR" CLASS="western" STYLE="text-indent: 4.39in">


                  <FONT FACE="David"><SPAN LANG="he-IL">  גולדנרוד פיננסים בע"מ </SPAN></FONT></P>
            <P DIR="LTR" CLASS="western"><img src="'.$signaturepath.'" width="200" height="" STYLE="margin:0 35%; color:red;">
            </P>
            
           </td>
           
           </tr>
           
            </table>
        </div>
            </BODY>
            </HTML>';
        
        $location_url_rent_documnet = 'doc_sign/rent_document/';

        $rent_document = $this->pdf($html,$location_url_rent_documnet);
        $house_rent_document = $rent_document['final_pdf_path'];

        $pdf_file = $rent_document['pdf_file'];
        
         $user_link = base_url()."business12/".base64_encode($pdf_file)."/".base64_encode($property_owner_email) ;
        
        $user_pdf = $house_rent_document;
        
        $this->session->set_userdata('url_user_document',$pdf_file);

            $client_account_type = "1";
            $client_another_account_status = 0;
            $order_name = "Rent guarantee";
            $deposit_status = "0";
            $order_type = "1";
            $approval_Status = '0';

            // client_account_type:1
            // order_name:Rent guarantee sat

            // deposit_status:0
            // order_type:1

            // echo $client_file."<br>"; echo $another_account_file."<br>"; echo $order_file_name; die();

            $fields = array('client_id_number' => $unique_id, 'client_first_name' => $first_name, 'client_last_name' => $last_name, 'preferred_route' => $preferred_route, 'client_account_type' => $client_account_type, 'client_another_account_status' => $client_another_account_status, 'guarantee_period_month' => $client_gur_month, 'requested_amount' => $req_gur_amt, 'first_signature_file' => $file_path1, 'second_signature_file' => $file_path2, 'ant_first_name' => $another_first_name, 'ant_last_name' => $another_last_name, 'ant_client_email' => $another_account_email, 'ant_unique_id' => $another_account_id_number, 'ant_client_file' => $ant_account_file, 'ant_client_phone' => $another_account_phone, 'ant_client_add' => $another_account_address, 'ant_client_gender' => $another_account_gender, 'ant_account_birth_date' => $another_account_dob, 'ant_req_gur_amt' => $another_account_sum, 'ant_lease_period' => $an_lease_period, 'user_pdf' => $user_pdf, 'user_link' => $user_link, 'first_document' => $first_document, 'second_document' => $second_document, 'guarantee_period_start_date' => $startDate, 'guarantee_period_end_date' => $endDate, 'another_guarantee_period_start_date' => $another_startDate, 'another_guarantee_period_end_date' => $another_endDate, 'flowCheck' => $flowCheck, 'order_id_number' => $order_id_number,"house_rent_document"=>$house_rent_document );

            //echo '<pre>'; 
            //print_r($fields); 
           // print_r($this->session->userdata());
            //die();

			// ofacebdi api call
			$cofaceUrl = "https://stgperws.bdi.co.il/FrontRest/FrontServiceRest.svc/PostRequest";

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => $cofaceUrl,
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

			$cofaceResponse = curl_exec($curl);

			//echo 'ths is response'; print_r($cofaceResponse); die;

			 // if(curl_exec($curl) === false)
			// {
			// 	echo curl_error($curl);
			// }
			// else
			// {
			//    echo 'Operation completed without any errors';
			// }


			curl_close($curl);
			// end cofacebdi api 

			// salesforce api
            $url = 'https://obli-backend.herokuapp.com/webservices/privateOrderdetails.php';

            //open connection
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            

            //execute post
            $result = curl_exec($ch);
            $err = curl_error($ch);
            //close connection
            curl_close($ch);
            
           // print_r($result); print_r($err); die();
            
//            if($_SERVER['REMOTE_ADDR'] == '182.70.229.154')
//            {
//            
//                print_r($result); print_r($err); die();
//            }

            if($err){
//                 echo $err;die();
                $session_array = array('private1', 'private3', 'private4', 'private5', 'private6', 'private7');
                $this->session->unset_userdata($session_array);
                echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('private1')."'; </script>";
                return FALSE;
//                redirect('businessThird1');
//                $responsePostData = array('status'=>'false','msg'=>'Error in order insertion!');
//                echo json_encode($responsePostData);
            }
            else{
//                print_r($result); die();
//                echo 1; die();
                 $orderData = json_decode($result); 
//                 echo '<pre>';
//                 print_r($orderData);die();//echo "<br>"; 
//                 print_r($orderData->order_reponse_data->sfId); die();
                 
                 if(!empty($orderData)){
                     if($orderData->status == "true"){
                         if(empty($orderData->order_reponse_data->sfId)){
                            
                            $session_array = array('private1', 'private3', 'private4', 'private5', 'private6', 'private7');
                            
                            $this->session->unset_userdata($session_array);
                            echo "<script type='text/javascript'>alert('Your record is rejected, Please try to fill all the forms again!'); window.location.href = '".site_url('private1')."'; </script>";
//                            redirect('business1');
                            return FALSE;
                             
                         }else{
                             
                             $this->session->set_userdata($newdata);
//                           todo we need "private2" data for KYC process don't remove it from session
                           $session_array = array('private1', 'private3', 'private4', 'private5', 'private6', 'private7');
                            $this->session->unset_userdata($session_array);

                            echo "<script type='text/javascript'>alert('Your record successfully saved!');window.location.href = '".site_url('kyc')."';</script>";
                            return FALSE;
                         }
                         
                     }
                     else{
                         
                         $session_array = array('private1', 'private3', 'private4', 'private5', 'private6', 'private7');
                        $this->session->unset_userdata($session_array);
                        echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('private1')."'; </script>";
                        return FALSE;
                        
//                         redirect('businessThird1');
                     }
                 }
//                 print_r($orderData->status);
//                 print_r($orderData); die();
                 
            }
            
            /* API : End */

            
//            echo 'hello';
//            print_r($this->session->userdata()); die();
//            redirect('private8');
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/private/private_7_scr');
            $this->load->view('website/footer', $data);
        }
        
    }
    
    function private_Form8(){
//        $this->session->sess_destroy();
        

//Hide screen 9 Idan commented may be again in future //
        
       redirect('private9');
        
        exit();
        
         //Hide screen 9 Idan commented may be again in future //
        
        
        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'private8' => $data
            );

            $this->session->set_userdata($newdata);
//            echo 'hello';
//            print_r($this->session->userdata()); die();
            redirect('private9');
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/private/private_8_scr');
            $this->load->view('website/footer', $data);
        }
        
    }
    
    function private_Form9(){
//        $this->session->sess_destroy();
        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'private9' => $data
            );

            $this->session->set_userdata($newdata);
//            echo 'hello';
//            print_r($this->session->userdata()); die();
            redirect('website');
        }else{
            
            $this->session->unset_userdata('private_payment_api_link');
            
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/private/private_9_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function private_Form10(){

        $pdf_url = $this->uri->segment(2);
        $email_url = $this->uri->segment(4);

        $pdf_url = base_url(). "doc_sign/rent_document/". base64_decode($pdf_url);
        // echo $pdf_url; die();
        $usr_data['user_data'] = array('pdf_url' => $pdf_url);

        /*$data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'business12' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            redirect('business13');
        }else{*/
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/private/private_10_scr', $usr_data);
            $this->load->view('website/footer', $data);
        /*}*/
    }
	
	function private_payment_api() {
        $postForm = $_POST;
        
         
// print_r($_POST);
// echo $amount = $_POST["req_gur_amt"];
        if(!empty($_POST["flowCheck"])){
            
            if($_POST["flowCheck"] == 1){
                
                $postForm['private1_requested_gurantee_amt'] = str_replace(',', '', $postForm['private1_requested_gurantee_amt']);
                
                $amount = str_replace(',', '',$_POST["private1_requested_gurantee_amt"]);
            }
            else{
                
                 $postForm['private2_requested_gurantee_amt'] = str_replace(',', '', $postForm['private2_requested_gurantee_amt']);
                 
                $amount = str_replace(',', '',$_POST["private2_requested_gurantee_amt"]);
            }
            
        }
        else{
            $amount = str_replace(',', '',$_POST["private1_requested_gurantee_amt"]);
        }
            
        
        $startDate = strtr($_POST['startDate'], '/', '-');
            $startDate = date('Y-m-d', strtotime($startDate));
            
            $endDate = strtr($_POST['endDate'], '/', '-');
            $endDate = date('Y-m-d', strtotime($endDate));

            $ts1 = strtotime($startDate);
            $ts2 = strtotime($endDate);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);
           
         $diff = 12;
            
            $duration = (($year2 - $year1) * 12) + ($month2 - $month1);
            
            ($duration > 12)? $tax = $duration/12*6/100 : $tax = 0.06;
         
    // Over 12 months duration apply 9% formula else 6% //
            $postForm['guarenty_duration'] = $duration;
            
            
            $amount = $amount*$tax;

            $startDate = strtr($_POST['startDate'], '/', '-');
            $startDate = date('Y-m-d', strtotime($startDate));
            
            $endDate = strtr($_POST['endDate'], '/', '-');
            $endDate = date('Y-m-d', strtotime($endDate));

            $ts1 = strtotime($startDate);
            $ts2 = strtotime($endDate);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = 12; //(($year2 - $year1) * 12) + ($month2 - $month1);
            
            $private2 = $this->session->userdata('private2');
            $first_name = $private2['first_name'];
            $last_name = $private2['last_name'];
            $TZId = $private2['unique_id'];
            $street = $private2['street'];
            $hometown = $private2['hometown'];
            $home_no = $private2['home_no'];
            $client_gender = $private2['client_gender'];
            
            if($client_gender == "זכר"){
                $client_gender = 1;
            }
            else{
                $client_gender = 2;
            }
            
            $client_date_of_birth = strtr($private2['client_date_of_birth'], '/', '-');
            $client_date_of_birth = date('Y-m-d', strtotime($client_date_of_birth));
            
            $client_date_of_birth = explode('-', $client_date_of_birth);
            
            if(!empty($client_date_of_birth)){
                $client_year = $client_date_of_birth[0];
                $client_month = $client_date_of_birth[1];
                $client_day = $client_date_of_birth[2];
            }
            
//            echo "<pre>";
//            print_r($client_date_of_birth);
//            die();
            
            
            $client_phone = $private2['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);

            $client_phone;
            $client_email = $private2['client_email'];
            //$client_date_of_birth = $business3['client_date_of_birth'];

            // print_r($this->session->userdata('business3'));
            // print_r($this->session->userdata('business4'));
            //die();
            $newdata = array(
                'private3' => $postForm
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
            
            
 
            if (!empty($newdata)) {
                $responsePostData = array('status'=>'true' );
				
				echo json_encode($responsePostData);
				
            } else {
						redirect('private1');
            }
        // api end
    }
    
	// this function change on date 31/12/2020 by idan
    function backup_31_12_2020_private_payment_api() {
        $postForm = $_POST;
        
         
// print_r($_POST);
// echo $amount = $_POST["req_gur_amt"];
        if(!empty($_POST["flowCheck"])){
            
            if($_POST["flowCheck"] == 1){
                
                $postForm['private1_requested_gurantee_amt'] = str_replace(',', '', $postForm['private1_requested_gurantee_amt']);
                
                $amount = str_replace(',', '',$_POST["private1_requested_gurantee_amt"]);
            }
            else{
                
                 $postForm['private2_requested_gurantee_amt'] = str_replace(',', '', $postForm['private2_requested_gurantee_amt']);
                 
                $amount = str_replace(',', '',$_POST["private2_requested_gurantee_amt"]);
            }
            
        }
        else{
            $amount = str_replace(',', '',$_POST["private1_requested_gurantee_amt"]);
        }
            
        
        $startDate = strtr($_POST['startDate'], '/', '-');
            $startDate = date('Y-m-d', strtotime($startDate));
            
            $endDate = strtr($_POST['endDate'], '/', '-');
            $endDate = date('Y-m-d', strtotime($endDate));

            $ts1 = strtotime($startDate);
            $ts2 = strtotime($endDate);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);
           
         $diff = 12;
            
            $duration = (($year2 - $year1) * 12) + ($month2 - $month1);
            
            ($duration > 12)? $tax = $duration/12*6/100 : $tax = 0.06;
         
    // Over 12 months duration apply 9% formula else 6% //
            $postForm['guarenty_duration'] = $duration;
            
            
            $amount = $amount*$tax;

            $startDate = strtr($_POST['startDate'], '/', '-');
            $startDate = date('Y-m-d', strtotime($startDate));
            
            $endDate = strtr($_POST['endDate'], '/', '-');
            $endDate = date('Y-m-d', strtotime($endDate));

            $ts1 = strtotime($startDate);
            $ts2 = strtotime($endDate);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = 12; //(($year2 - $year1) * 12) + ($month2 - $month1);
            
            $private2 = $this->session->userdata('private2');
            $first_name = $private2['first_name'];
            $last_name = $private2['last_name'];
            $TZId = $private2['unique_id'];
            $street = $private2['street'];
            $hometown = $private2['hometown'];
            $home_no = $private2['home_no'];
            $client_gender = $private2['client_gender'];
            
            if($client_gender == "זכר"){
                $client_gender = 1;
            }
            else{
                $client_gender = 2;
            }
            
            $client_date_of_birth = strtr($private2['client_date_of_birth'], '/', '-');
            $client_date_of_birth = date('Y-m-d', strtotime($client_date_of_birth));
            
            $client_date_of_birth = explode('-', $client_date_of_birth);
            
            if(!empty($client_date_of_birth)){
                $client_year = $client_date_of_birth[0];
                $client_month = $client_date_of_birth[1];
                $client_day = $client_date_of_birth[2];
            }
            
//            echo "<pre>";
//            print_r($client_date_of_birth);
//            die();
            
            
            $client_phone = $private2['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);

            $client_phone;
            $client_email = $private2['client_email'];
            //$client_date_of_birth = $business3['client_date_of_birth'];

            // print_r($this->session->userdata('business3'));
            // print_r($this->session->userdata('business4'));
            //die();
            $newdata = array(
                'private3' => $postForm
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
            
            //Amount always send 20k on taraya Idan 02 Marh 20 //
            
                $amount1 = 20000;
                
             // Assigned 20000 successfully//
            
            $api_data = array("OrgId" => 10069,"FirstName" => utf8_encode($first_name),"LastName" => utf8_encode($last_name),"TZ" => $TZId,"Cell" => $client_phone,"Email"=> $client_email,"Street" => utf8_encode($street),"HouseNum"=> $home_no,"City" => utf8_encode("תל אביב"),"Sex" => $client_gender,"Birthdate_y" => $client_year,"Birthdate_m" => $client_month,"Birthdate_d" => $client_day,"Amount" => $amount1 ,"Duration" => $diff,"Product" => "מימון עמלה","OrderId" => "14XA24F","SuccessUrl" => "https://obli.co.il/privatePaymentSuccess","FailureUrl" => "https://obli.co.il/privatePaymentFailed","AutoApprove"=> 0);
            
//            print_r($api_data);
            

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => $this->config->item('payment_url'),
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 5000,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{\n\"OrgId\" : 10069,\n\"FirstName\" : \"$first_name\",\n\"LastName\" : \"$last_name\",\n\"TZ\" : \"$TZId\",\n\"Cell\" : \"$client_phone\",\n\"Email\": \"$client_email\",\n\"Street\" : \"$street\",\n\"HouseNum\": \"$home_no\",\n\"City\" : \"תל אביב\",\n\"Sex\" : $client_gender,\n\"Birthdate_y\" : \"$client_year\",\n\"Birthdate_m\" : \"$client_month\",\n\"Birthdate_d\" : \"$client_day\",\n\"Amount\" : $amount1 ,\n\"Duration\" : $diff,\n\"Product\" : \"מימון עמלה\",\n\"OrderId\" : \"14XA24F\",\n\"SuccessUrl\" : \"https://obli.co.il/privatePaymentSuccess\",\n\"FailureUrl\" : \"https://obli.co.il/privatePaymentFailed\",\n\"AutoApprove\": 0\n}",
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
                
                // log error insert in table
                $log_data = array('tz_id' => $TZId, 'firstname' => $first_name, 'lastname' => $last_name, 'form_text' => 'Private', 'payment_url' => $this->config->item('payment_url'), 'request_data' => json_encode($api_data), 'error_data' => $err, 'created_at' => date('Y-m-d H:i:s') );
                 $this->project_model->insert_data('check_payment_api_response', $log_data);
                // end 
                 
              // echo "cURL Error #:" . $err;
//              $form_data['data'] = array('status' => 'false');
                $responsePostData = array('status'=>'false','msg'=>'failed!');
                echo json_encode($responsePostData);
            } else {
                $insert_res = $response;
                
                // log error insert in table
                $log_data = array('tz_id' => $TZId, 'firstname' => $first_name, 'lastname' => $last_name, 'form_text' => 'Private', 'payment_url' => $this->config->item('payment_url'), 'request_data' => json_encode($api_data), 'response_data' => $insert_res, 'created_at' => date('Y-m-d H:i:s') );
                 $this->project_model->insert_data('check_payment_api_response', $log_data);
                // end 
                 
//                print_r($response); 
                $res = json_decode($response);
//                print_r($res);
                
                if(!empty($res->iframe->mpiHostedPageUrl)){
//                    echo $res->iframe->mpiHostedPageUrl;
                    $this->session->set_userdata(array(
                      'private_payment_api_link' => $res->iframe->mpiHostedPageUrl
                  ));
//                    echo $this->session->userdata('businesThird_payment_api_link');
                   $responsePostData = array('status'=>'true', 'api_response' => $response, 'url_iframe' => $res->iframe->mpiHostedPageUrl );
                }
                else{
                    $responsePostData = array('status'=>'false', 'api_response' => $response );
                }                
                echo json_encode($responsePostData);
//              if(!empty($res->link)){
//                    // echo $res->link;
//                    $this->session->set_userdata(array(
//                      'businesThird_payment_api_link' => $res->link
//                  ));
//                    // print_r($this->session->userdata('businesThird_payment_api_link'));
//              }else{
//                  $fieldErrors = @$res->fieldErrors;
//                  if(!empty($fieldErrors)){
//                      $str = "";
//                      foreach ($fieldErrors as $key => $value) {
//                          $field = $value->field;
//                          $errorMessage = $value->errorMessage;
//                          $str .= "field : ".$field." and message : ".$errorMessage."\n";
//                      }
//                      $string = "\nTarya API Error: \n".$str;
//                  }
//              }
              
//              die();
//              $form_data['data'] = array('status' => 'true', 'api_url' => $response, 'form_detail' => $form_detail, 'first_file' => $postFile );

                
            }
        // api end
    }
    
    function private_without_payment_api() {
        $postForm = $_POST;
        
        if(!empty($_POST["flowCheck"])){
            
            if($_POST["flowCheck"] == 1){
                
                $postForm['private1_requested_gurantee_amt'] = str_replace(',', '', $postForm['private1_requested_gurantee_amt']);
                
                $amount = str_replace(',', '',$_POST["private1_requested_gurantee_amt"]);
            }
            else{
                
                 $postForm['private2_requested_gurantee_amt'] = str_replace(',', '', $postForm['private2_requested_gurantee_amt']);
                 
                $amount = str_replace(',', '',$_POST["private2_requested_gurantee_amt"]);
            }
            
        }

            // print_r($this->session->userdata('business3'));
            // print_r($this->session->userdata('business4'));
            //die();
            $newdata = array(
                'business5' => $postForm
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);

            
    }
    
    function privateBadResponse(){
        
        
//            echo "<pre>";        print_r($data); die;
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/private/private_bad_response');
            $this->load->view('website/footer', $data);
        
        
    }

    function pdf($html,$pdf_location){
        // $file_path = base_url() . "doc_sign/5de0fb3a5b6d21223182045.png";
        // echo $file_path; die();
        // $path = base_url(). 'webservices/vendor/autoload.php';
        $pdfData = array();
        require_once './webservices/vendor/autoload.php';
        // require_once(APPPATH.'../webservices/vendor/autoload.php');
        // echo $path; die();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetDirectionality('rtl');
        $mpdf->autoLangToFont = true;

        // Define a default Landscape page size/format by name
        // $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        // $mpdf=new Mpdf('c','A4','',''); 
        // $mpdf->SetDisplayMode(90);
        $mpdf->SetDisplayMode('fullpage');
        // $mpdf->SetDisplayMode('fullwidth');


        // $date = $document_id = $amount = $name = $address = $document_number_id = $no_of_months = "";

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);


            // set auto page breaks
            // $mpdf->SetAutoPageBreak(true, 11);
            $mpdf->AddPage();
            // $mpdf->SetFont('times', '', 10.5);
            $mpdf->WriteHTML($html);
            // $mpdf->Output();
            // $location = __DIR__ .'/user_pdf/';
            $location_url = base_url(). $pdf_location;

            $location = $pdf_location;
            $pdf_file = 'user_pdf'.uniqid().time().'.pdf';
            $mpdf->Output($location . $pdf_file, \Mpdf\Output\Destination::FILE);
            $final_pdf_path = $location_url.$pdf_file;

            $pdfData = array('final_pdf_path' => $final_pdf_path, 'pdf_file' => $pdf_file);

            return $pdfData ;

            // echo $pdff =  base64_encode($pdf_file)."<br>";
            // echo base64_decode($pdff)."<br>";

            // $property_owner_email = "satendra.tectum@gmail.com";
            // $user_link = base_url()."business12/".$pdf_file."/".$property_owner_email ;
            // echo $final_pdf_path;

           
            

    }

    function test_pdf()
    {
        $date = date('Y-m-d');
        $document_id = 23423432;
        $amount = 25000;
        $document_number_id = 56546546;
        $no_of_months =23;
         $first_signature_file= '';
         $second_signature_file= "";
         $order_id_number = 1234567890000;
         $date_signature = date('Y-m-d');
        $name = "סטיאנדרה שוקלה";
        $address = "נהרו נגר, אינדור";
        $file_path = base_url() . "doc_sign/5de0fb3a5b6d21223182045.png";
        $html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
            <HTML>
            <HEAD>
                <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
                <TITLE>כתב ערבות</TITLE>
                <META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)">
                <META NAME="AUTHOR" CONTENT="Hen Choen">
                <META NAME="CREATED" CONTENT="20190430;154600000000000">
                <META NAME="CHANGEDBY" CONTENT="DANIEL">
                <META NAME="CHANGED" CONTENT="20190618;71200000000000">
                <META NAME="CLASSIFICATION" CONTENT="חן כהן">
                <META NAME="DESCRIPTION" CONTENT="90856\0\3">
                <META NAME="KEYWORDS" CONTENT="90856\0\3">
                <META NAME="AppVersion" CONTENT="16.0000">
                <META NAME="DocSecurity" CONTENT="0">
                <META NAME="HyperlinksChanged" CONTENT="false">
                <META NAME="LinksUpToDate" CONTENT="false">
                <META NAME="ScaleCrop" CONTENT="false">
                <META NAME="ShareDoc" CONTENT="false">

                <STYLE TYPE="text/css">
                
                    @page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
                    P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2; margin-top: 0.08in;}
                    P.western { font-family: "Times New Roman", serif; font-size: 12pt; }
                    P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 12pt }
                    .text_color{
                        color: #323474
                    }

                  
                   

                </STYLE>
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
          
         
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; margin-top: -150px;">
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center;">
            <FONT FACE="David"><SPAN LANG="he-IL"> הלוואה למימון עמלת ערבות  </SPAN></FONT></P>

            </div>
            <DIV TYPE=HEADER>
                  
            </DIV>
             <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> שנערך ונחתם '.$date_signature.' </SPAN></FONT></P>

             <BR>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">בין גולדנרוד בע"מ ח.פ. 513578674 (להלן: "הערב")  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מרח  יד חרוצים 12, תל אביב  </SPAN></FONT></P>
        
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לבין '.$name.' </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">'.$address.' </SPAN></FONT></P>
            <BR>
            <BR>


            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הואיל והערב עוסקת במתן שירותי אשראי והינה בעלת רישיון למתן אשראי כהגדרתו בחוק הפיקוח על שירותים  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> פיננסיים (שירותים פיננסיים מוסדיים), התשע"ו-2016;  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> והואיל והערב הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו <B>'.$order_id_number.'</B> (להלן: "כתב הערבות"), </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">לטובת המוטב, על סך '.$amount.' ₪ (להלן: "סכום הערבות"), המצורף בזאת כנספח א להסכם זה; </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> והואיל וברצון הצדדים להגדיר ולהסדיר את החובות אשר יחולו עליהם בקשר עם חילוט כתב הערבות ע"י  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> המוטב. </SPAN></FONT></P>
              
            <BR>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לפיכך הוסכם, הוצהר והותנה בין הצדדים כדלקמן:  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%, ">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1. מבוא ונספחים </SPAN></FONT></P>

           <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.1.  המבוא להסכם וכן כל הנספחים המצורפים להסכם מהווים חלק בלתי נפרד הימנו (להלן: "<B>ההסכם</B>").   </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.2. כותרות הסעיפים נועדו לצורך הנוחיות בלבד ואין לפרש תנאי מתנאי ההסכם לפיהן. </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.3. הצדדים מצהירים כי אין עליהם כל הגבלה, בין בהסכם, בין על פי דין ובין בכל אופן אחר, המונעת מכל אחד  </SPAN></FONT></P>
            
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מהם או מגבילה אותם מלהתקשר בהסכם זה ולמלא את הוראותיו. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2. ההתקשרות </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.1. במסגרת ההתקשרות הכללית בין הצדדים, הערב הנפיקה ללקוח כתב ערבות, אשר פרטיו מפורטים  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> במבוא להסכם זה, לטובתו של המוטב, בו התחייבה להעביר לידי המוטב את סכום הערבות במקרה שבו יבקש  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> המוטב לממש את כתב הערבות.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.2. במקרה של מימוש כתב הערבות ע"י המוטב, מכל סיבה שהיא, החייב ישלם לחברה כל סכום אותו תידרש  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הערב לשלם למוטב. עבור כל יום איחור בתשלום סכום הערבות לחברה, ישלם החייב ריבית שנתית בגובה של </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>6%</B> מסכום הערבות. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.3. במקרה של מימוש כתב הערבות ע"י המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית הערב  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לקבלת הלוואה דרך חברת טריא בריבית שנתית קבועה של 6%. ההלוואה תעמוד לתקופה של 18 חודשים. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הענקת ההלוואה כפופה לאישור חיתום הלקוח בטריא. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.4. במקרה של אי קיום התחייבויות הלקוחה מצדה כאמור בהסכם, הערב/ה ללקוחה (כמוגדר בנספח ב להסכם) מתחייב/ת באופן אישי ובלתי חוזר, לשלם במקום החייבת, כל תשלום לו יידרש, בהתאם למוסכם תחת ס עיף זה.</SPAN></FONT></P>                      

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.5. במקרה של שני ערבים לחייב החתומים כנגד שטר הערבות, כל אחד מהם יחויב להעביר לידי הערב את  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מלוא סכום הערבות כמפורט בסעיף 2.2, וזאת במקרה זה לא יוכלו החייבים לקבל הפנייה לקבלת הלוואה ו/או  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לא יעמדו בבדיקת הלקוח אותה תבצע טריא. </SPAN></FONT></P>

            
            <BR>
             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3. תקופת ההסכם  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3.1. הסכם זה יעמוד בתוקפו החל מיום האמור לעיל ויסתיים במוקדם מבין:  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> (א) מועד סיום תקופת הערבות, הכוללת גם תקופה של חידוש ו/או הארכת הערבות; </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> (ב) מועד קבלת מלוא סכום הערבות אשר הועבר למוטב ע"י הערב במסגרת חילוט הערבות.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4. מצגים </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הלקוח מצהיר בזאת, כדלקמן:  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.1. הוא בעל האמצעים הכלכליים לשיפוי הערב בכל סכום הערבות כשהוא צמוד מדד בערכיו המשוערכים   </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.2. לא התקבלה החלטה על פירוקה מרצון ו/או לא התחיל הליך פירוק החברה מרצון, כמשמעותם בחוק ה חברות, תשנ"ט 1999- [נוסח מלא ומעודכן]. </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.3. לא מתקיימים לגביה הליכי חדלות פירעון כמשמעותם בסעיף 2 לחוק חדלות פירעון ושיקום כלכלי, ת שע"ח 2018- [נוסח מלא ומעודכן]. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.4. ספרי הערב ישמשו כראייה לסכום חובו לחברה. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5. התחייבויות הלקוח </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.1. הלקוח יידע את הערב אם אחד מהמצגים המנויים מעלה יחדול מלהתקיים במהלך תקופת ההסכם.  </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.2. הלקוח ישלם לחברה, לפי דרישתה הראשונה, את מלוא סכום הערבות אותו העבירה למוטב, וזאת תוך 7 </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> ימים ממועד העברת סכום הערבות למוטב. </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.3. הלקוח יפצה ו/או ישפה את הערב, לפי דרישתה הראשונה, בגין כל סכום ו/או הוצאה מכל סוג שהוא שתהיה </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לחברה, במישרין ובעקיפין, בקשר עם גביית סכום הערבות מהלקוח.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.4. במקרה של אי קיום התחייבויות הלקוחה כאמור לעיל, הערב/ה ללקוחה מתחייב/ת באופן אישי ובלתי ח וזר, לשלם במקום החייבת, כל תשלום לו יידרש, בהתאם לתנאים המוסכמים תחת סעיף זה.</SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6. כללי </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.1. הדין הישראלי יחול באופן בלעדי על הסכם זה, וסמכות השיפוט הבלעדית בכל הקשור להסכם זה תהיה  </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מסורה לבתי המשפט המוסמכים בתל אביב. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.2. אם ייקבע ע"י ערכאה מסוימת כי הוראה מהוראות הסכם זה אינה ניתנת לאכיפה ו/או הינה חסרת תוקף מטעם כלשהו, לא יהא בכך כדי לפגום ו/או לבטל את תוקפן של יתר הוראות ההסכם.</SPAN></FONT></P>
            

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.3. הודעה שתישלח על פי כתובות הצדדים במבוא להסכם זה בדואר רשום, תיחשב כאילו הגיעה לצד שכנגד </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> ולידיעתו תוך 3 ימים מיום שיגורה בדואר רשום מבית דואר בישראל ואם נמסרה ביד – בעת מסירתה, ואם </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> שוגרה בפקס או בדוא"ל – תוך 24 שעות ממועד שיגורה. </SPAN></FONT></P>

            <BR><P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד: </SPAN></FONT></P>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.base_url().'website_assets/img/sign_1.png" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימה דיגיטלית:</SPAN></FONT></P>
            <BR>
            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$file_path2.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

            
            
            </BODY>
            </HTML>';

            $pdf_location = "doc_sign/userPdf/";
            $final_pdf_path = $this->pdf($html, $pdf_location);
            echo '<pre>';
            print_r($final_pdf_path); die();
    }

    

    function saveImage()
    {
        $result = array();
        $imagedata = base64_decode($_POST['img_data']);
        $filename = md5(date("dmYhisA"));
        //Location to where you want to created sign image
        $file_name = base_url(). 'doc_sign/'.$filename.'.png';
        // echo $file_name; die();
        // chmod(base_url(). 'website_assets/signature/doc_signs/', 777);
        file_put_contents($file_name,$imagedata);
        $result['status'] = 1;
        $result['file_name'] = $file_name;
        die();
        echo json_encode($result);
    }

    // Find file type in base64 code
      function getBytesFromHexString($hexdata)
      {
        for($count = 0; $count < strlen($hexdata); $count+=2)
          $bytes[] = chr(hexdec(substr($hexdata, $count, 2)));

        return implode($bytes);
      }

      function getImageMimeType($imagedata)
      {
        $imagemimetypes = array( 
          "jpeg" => "FFD8", 
          "png" => "89504E470D0A1A0A", 
          "gif" => "474946",
          "bmp" => "424D", 
          "tiff" => "4949",
          "tiff" => "4D4D"
        );

        foreach ($imagemimetypes as $mime => $hexbytes)
        {
          $bytes = $this->getBytesFromHexString($hexbytes);
          if (substr($imagedata, 0, strlen($bytes)) == $bytes)
            return $mime;
        }

        return NULL;
      }
    // end function

    function privatePaymentSuccess(){
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
            $this->project_model->insert_data('tarya_payment_api_response', $data);
        }
        
        redirect('private9');
    }
    
    function privatePaymentFailed(){
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
            $this->project_model->insert_data('tarya_payment_api_response', $data);
        }
        
        redirect('paymentBadResponse');
    }
        
}

