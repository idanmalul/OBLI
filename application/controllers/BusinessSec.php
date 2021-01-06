<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BusinessSec extends CI_Controller {
    
    function __construct() {

        parent::__construct();
         date_default_timezone_set('Asia/Jerusalem');
         
         error_reporting(0);
         
    }
    
    // business second flow
    function business_sec_Form1(){
//        $this->session->sess_destroy();die();
        $data = $this->input->post();
        if(!empty($data)){
            
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
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'businessSec1' => $data
            );

            $this->session->set_userdata($newdata);
//            echo 'hello';
//            print_r($this->session->userdata()); die();
            
            /* API : Start */
            $business1 = $this->session->userdata('business1');
            $guarantee_type = $business1['guarantee_type'];
            
            $business2 = $this->session->userdata('business2');
            $preferred_route = $business2['preferred_route'];
            
            $businessSec1 = $this->session->userdata('businessSec1');
            $first_name = $businessSec1['first_name'];
            $last_name = $businessSec1['last_name'];
            $unique_id = $businessSec1['unique_id'];
            $client_hometown = $businessSec1['hometown'];
            $client_street = $businessSec1['street'];
            $client_home_no = $businessSec1['home_no'];
            $client_phone = $businessSec1['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);
            $client_email = $businessSec1['client_email'];
            $client_gender = $businessSec1['client_gender'];
            $client_date_of_birth = strtr($businessSec1['client_date_of_birth'], '/', '-');
            $client_date_of_birth = date('Y-m-d', strtotime($client_date_of_birth));
            $client_first_file = $businessSec1['user_first_file'];
            
            $client_account_type = 1;
            $client_another_account_status = 0;
            
            $fields = array('client_id_number' => $unique_id, 'client_first_name' => $first_name, 'client_last_name' => $last_name, 'client_email' => $client_email, 'client_phone' => $client_phone, 'client_gender' => $client_gender, 'client_hometown' => $client_hometown, 'client_street' => $client_street, 'client_home_no' => $client_home_no, 'client_file' => $client_first_file, 'client_date_of_birth' => $client_date_of_birth, 'client_account_type' => $client_account_type, 'client_another_account_status' => $client_another_account_status );

//            echo '<pre>'; 
//            print_r($fields); 
//            die();


            $url = 'https://obli-backend.herokuapp.com/webservices/businessSecClientDetails.php';

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
              //  $session_array = array('businessSec1');
              //  $this->session->unset_userdata($session_array);
                echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('businessSec1')."'; </script>";
                return FALSE;
//                redirect('businessThird1');
//                $responsePostData = array('status'=>'false','msg'=>'Error in order insertion!');
//                echo json_encode($responsePostData);
            }
            else{
//                echo "<pre>";
//                print_r($result);echo "<br>"; echo "<br>"; 
//                echo 1; die();
                 $clientData = json_decode($result);
                 
//                 print_r($clientData);echo "<br>"; 
//                 echo $clientData->client_reponse_data[1]->_hc_lastop;
//                 die();
                 
                 if(!empty($clientData)){
                     if($clientData->status == "true"){
                         
                         if(@$clientData->client_reponse_data[1]->_hc_lastop == "FAILED"){
                            
                        //    $session_array = array('businessSec1');
                        //    $this->session->unset_userdata($session_array);
                            echo "<script type='text/javascript'>alert('Your record is rejected, Please try again!'); window.location.href = '".site_url('businessSec1')."'; </script>";
//                            redirect('business1');
                            return FALSE;
                             
                        }else{
                             
//                           $session_array = array('businessThird1');
//                           $this->session->unset_userdata($session_array);

//                             alert('Your record successfully saved!');
//                            die();
                            $this->session->set_userdata('order_id_number', @$clientData->client_reponse_data[1]->order_id_number);
                            echo "<script type='text/javascript'>window.location.href = '".site_url('businessSec2')."';</script>";
                            return FALSE;

//                            redirect('businessThird2');
                         }
                         
                     }
                     else{
                         
                       // $session_array = array('businessSec1');
                       // $this->session->unset_userdata($session_array);
                        echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('businessSec1')."'; </script>";
                        return FALSE;
                        
//                         redirect('businessThird1');
                     }
                 }
//                 print_r($orderData->status);
//                 print_r($orderData); die();
                 
            }

            /* API : End */
            
            
//            redirect('businessSec2');
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
            $this->load->view('website/businessSecond/business_sec_1_scr');
            $this->load->view('website/footer', $data);
        }
        
    }
    
    function business_sec_Form2(){

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'businessSec2' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            redirect('businessSec3');
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
            $this->load->view('website/businessSecond/business_sec_2_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function business_sec_Form3(){

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            
            $newdata = array(
                'businessSec3' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
            print_r($this->session->userdata());die();
            redirect('businessSec4');
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
            $this->load->view('website/businessSecond/business_sec_3_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function business_sec_Form4(){

        $form_data = array();
        // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $footer_data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $footer_data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $footer_data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $footer_data['logo_details'] = $this->project_model->get_query_result($sql6);
        // end footer
        
        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            
            // second file
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

                $data['gr_company_file'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";

                // $file_name = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

                // echo base_url().'/'.$client_file; die();

            }
            // end
            
            $newdata = array( 
                'businessSec4' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
            
            $company_name = $this->input->post('company_name');
            $cmp = explode("_", $company_name);
//            print_r($cmp); die();
            
            if(!empty($cmp)){
                if(@$cmp[1] == 1){
//                    $ch = array('company_id' => $this->input->post('agent_id')); 
//                    $rec = $this->project_model->get_data_where_condition('company_forms', $ch);
                    if(!empty($this->input->post('main_company_contact_id'))){
                        $main_cmp_id = $this->input->post('main_company_contact_id');
                    }
                    else{
                        $main_cmp_id = 0;
                    }
                    
                    $agent_id = $this->input->post('agent_id');
                    $sql = "SELECT * FROM company_forms where FIND_IN_SET('".$agent_id."', company_id) AND id = '".$main_cmp_id."' ";
                    $rec = $this->project_model->get_query_result($sql);

//                    print_r($rec); 
//                    die();

                    if(empty($rec)){
                        $form_data['bus7_param'] = $this->input->post();
                        $form_data['error'] =  "זיהוי איש הקשר אינו חוקי , אנא בדוק!";

                        $this->load->view('website/header');
                        $this->load->view('website/businessSecond/business_sec_4_scr', $form_data);
                        $this->load->view('website/footer', $footer_data);
//                        redirect('business7');
                        return false;  
//                        die();
                    }else{
                        redirect('businessSec5');
                    }
                }
                elseif(@$cmp[1] == 2){
                    redirect('businessSec5');
                }
                else{
                    redirect('businessSec5');
                }
            }
//            print_r($this->session->userdata());die();
//            redirect('businessSec5');
        }else{
            
            $this->load->view('website/header');
            $this->load->view('website/businessSecond/business_sec_4_scr');
            $this->load->view('website/footer', $data);
        }
    }


    function business_sec_Form5(){
        
//        echo '<pre>';
//        print_r($this->session->userdata());die();
        
        /*if(empty($this->session->userdata('business1')) || empty($this->session->userdata('business2')) || empty($this->session->userdata('businessThird1')) || empty($this->session->userdata('businessThird2')) || empty($this->session->userdata('businessThird3')) || empty($this->session->userdata('businessThird5')) ){
            redirect('business1');
            exit();
        }*/

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'businessSec5' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
//            redirect('businessThird7');
            
            $businessSec2 = $this->session->userdata('businessSec2');

            if(!empty($businessSec2)){

                $business_type = $businessSec2['business_type'];

                if(!empty($business_type)){
                    if($business_type == 'חברה בע”מ'){

                       redirect('businessSec6');

                    }else{
                        $this->businessSecAllFormSubmit();
                    }
                }
                else{
                    redirect('business1');
                }

            }
            else{

            }
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
            $this->load->view('website/businessSecond/business_sec_5_scr');
            $this->load->view('website/footer', $data);
        }
    }


       function business_sec_Form6(){

//         echo '<pre>';
//        print_r($this->session->userdata());die();
        
        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
           // print_r($data);

//            print_r($_FILES); die();

           // first file
            if(isset($_FILES["b10_first_file"]["name"])) {

                $config['upload_path'] = './uploads/business_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["b10_first_file"]["name"]));

                $new_extension = strtolower($file_extension);

                // $today = time();
                $today = (int) (microtime(true) * 1000000000000);

                $custom_name = "bthird1_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('b10_first_file', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                }

                $client_file = base_url().'uploads/business_images/'.$file_name;

                $data['gurantee_articles_of_association'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";
               
            } 
            // first end

            // second file
            if(isset($_FILES["b10_second_file"]["name"])) {

                $config['upload_path'] = './uploads/business_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["b10_second_file"]["name"]));

                $new_extension = strtolower($file_extension);

                // $today = time();
                $today = (int) (microtime(true) * 1000000000000);

                $custom_name = "bthird2_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('b10_second_file', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                }

                $client_file = base_url().'uploads/business_images/'.$file_name;

                $data['gurantee_certificate'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";
               
            } 
            // second end

            // third file
            if(isset($_FILES["b10_third_file"]["name"])) {

                $config['upload_path'] = './uploads/business_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["b10_third_file"]["name"]));

                $new_extension = strtolower($file_extension);

                // $today = time();
                $today = (int) (microtime(true) * 1000000000000);

                $custom_name = "bthird3_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('b10_third_file', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                }

                $client_file = base_url().'uploads/business_images/'.$file_name;

                $data['gurantee_exemption_withholding_tax'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";
               
            } 
            // third end

            // fourth file
            if(isset($_FILES["b10_fourth_file"]["name"])) {

                $config['upload_path'] = './uploads/business_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["b10_fourth_file"]["name"]));

                $new_extension = strtolower($file_extension);

                // $today = time();
                $today = (int) (microtime(true) * 1000000000000);

                $custom_name = "bthird4_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('b10_fourth_file', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                }

                $client_file = base_url().'uploads/business_images/'.$file_name;

                $data['gurantee_bookkeeping_authorization'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";
               
            } 
            // fourth end

            // fifth file
            if(isset($_FILES["b10_fifth_file"]["name"])) {

                $config['upload_path'] = './uploads/business_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["b10_fifth_file"]["name"]));

                $new_extension = strtolower($file_extension);

                // $today = time();
                $today = (int) (microtime(true) * 1000000000000);

                $custom_name = "bthird5_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('b10_fifth_file', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                }

                $client_file = base_url().'uploads/business_images/'.$file_name;

                $data['gurantee_oval_attorney'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";
               
            } 
            // fifth end
            
            // six file
            if(isset($_FILES["b10_sixth_file"]["name"])) {

                $config['upload_path'] = './uploads/business_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["b10_sixth_file"]["name"]));

                $new_extension = strtolower($file_extension);

                // $today = time();
                $today = (int) (microtime(true) * 1000000000000);

                $custom_name = "bthird6_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('b10_sixth_file', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                }

                $client_file = base_url().'uploads/business_images/'.$file_name;

                $data['gurantee_direct_debit_authorization'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";
               
            } 
            // six end

            $newdata = array(
                'businessSec6' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            $this->businessSecAllFormSubmit();
//            redirect('businessThird8');
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
            $this->load->view('website/businessSecond/business_sec_6_scr');
            $this->load->view('website/footer', $data);
 
        }
    }


    function business_sec_Form7(){

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data); die;
            $newdata = array(
                'businessSec7' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            redirect('businessSec8');
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
            $this->load->view('website/businessSecond/business_sec_7_scr');
            $this->load->view('website/footer', $data);
        }
    }


    function business_sec_Form8(){

        $data = $this->input->post();
                   
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
//            $newdata = array(
//                'businessThird8' => $data
//            );
//            print_r($this->session->userdata('business1'));
//            $this->session->set_userdata($newdata);
//            echo 'hello';
//            print_r($this->session->userdata());die();
            
            if(!empty($data['noneLtdCase'])){
                $paymentPageCase = $data['noneLtdCase'];
            
                if($paymentPageCase == 2){
                    redirect('businessSec8');
                }
                else{
//                    $this->session->unset_userdata('businesThird_payment_api_link');
                    $this->session->sess_destroy();
                    redirect('website');
                }
            }
            else{
//                $this->session->unset_userdata('businesThird_payment_api_link');
                $this->session->sess_destroy();
                redirect('website');
            }
         
            
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
            $this->load->view('website/businessSecond/business_sec_8_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function businessSecBadResponse(){
        
        
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
            $this->load->view('website/businessSecond/business_sec_bad_response',$data);
            $this->load->view('website/footer', $data);
        
        
    }
    
    function businessSecAllFormSubmit(){
       
//            echo '<pre>';
//            print_r($data);
//            $newdata = array(
//                'businessThird8' => $data
//            );
//            print_r($this->session->userdata('business1'));
//            $this->session->set_userdata($newdata);
//            echo 'hello';
//            print_r($this->session->userdata());die();
          
            $business1 = $this->session->userdata('business1');
            $guarantee_type = $business1['guarantee_type'];
            
            $business2 = $this->session->userdata('business2');
            $preferred_route = $business2['preferred_route'];
            
            $businessSec1 = $this->session->userdata('businessSec1');
            $first_name = $businessSec1['first_name'];
            $last_name = $businessSec1['last_name'];
            $unique_id = $businessSec1['unique_id'];
            $hometown = $businessSec1['hometown'];
            $street = $businessSec1['street'];
            $home_no = $businessSec1['home_no'];
            $client_phone = $businessSec1['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);
            $client_email = $businessSec1['client_email'];
            $client_gender = $businessSec1['client_gender'];
            $client_date_of_birth = strtr($businessSec1['client_date_of_birth'], '/', '-');
            $client_date_of_birth = date('Y-m-d', strtotime($client_date_of_birth));
            $user_first_file = $businessSec1['user_first_file'];

            // order id number
            $order_id_number = $this->session->userdata('order_id_number');
            
            $businessSec2 = $this->session->userdata('businessSec2');
            $company_name = $businessSec2['company_name'];
            $business_type = $businessSec2['business_type'];
            $company_id = $businessSec2['company_id'];
            $company_address = $businessSec2['company_address'];
            $contact_person_name = $businessSec2['contact_person_name'];
            $contact_person_email = $businessSec2['contact_person_email'];
            $contact_person_phone = $businessSec2['contact_person_phone'];
            $contact_person_phone = str_replace(["-"], '', $contact_person_phone);
            
            $businessSec3 = $this->session->userdata('businessSec3');
//            $first_base64_signature = $businessSec3['first_base64_signature'];
//            $second_base64_signature = $businessSec3['second_base64_signature'];
            $req_gur_amt = $businessSec3['businessSec_requested_gur_amount'];
            $gur_period_month = $businessSec3['gur_period_month'];
            $startDate = $businessSec3['startDate'];
            $endDate = $businessSec3['endDate'];
//            $checkbox2 = $businessSec3['checkbox2'];
//            $checkbox1 = $businessSec3['checkbox1'];
//            $btn3_checkbox = $businessSec3['btn3_checkbox'];
            $value_check = $businessSec3['value_check'];
            
//            $businessThird4 = $this->session->userdata('businessThird4');
////            print_r($business6); 
//            $ant_first_name = $businessThird4['ant_first_name'];
//            $ant_last_name = $businessThird4['ant_last_name'];
//            $ant_unique_id = $businessThird4['ant_unique_id'];
//            $ant_client_add = $businessThird4['ant_client_add'];
//            $ant_client_phone = $businessThird4['ant_client_phone'];
//            $ant_client_phone = str_replace(["-"], '', $ant_client_phone);
//            $ant_client_email = $businessThird4['ant_client_email'];
//            $ant_client_gender = $businessThird4['ant_client_gender'];
//            $antsec_date_of_birth = strtr($businessThird4['antsec_date_of_birth'], '/', '-');
//            $antsec_date_of_birth = date('Y-m-d', strtotime($antsec_date_of_birth));
//            $ant_req_gur_amt = $businessThird4['ant_req_gur_amt'];
//            $ant_gur_period_month = $businessThird4['ant_gur_period_month'];
//            $antstartDate = strtr($businessThird4['antstartDate'], '/', '-');
//            $antstartDate = date('Y-m-d', strtotime($antstartDate));
//            $antendDate = strtr($businessThird4['antendDate'], '/', '-');
//            $antendDate = date('Y-m-d', strtotime($antendDate));
//            $another_user_file = $businessThird4['another_user_file'];
            
            $payment_api_link = $this->session->userdata('businesSec_payment_api_link');
            
            $businessSec4 = $this->session->userdata('businessSec4');
//            $property_owner_name = $businessThird5['property_owner_name'];
//            $owner_of_property = $businessThird5['owner_of_property'];
//            $property_owner_phone = $businessThird5['property_owner_phone'];
//            $property_owner_phone = str_replace(["-"], '', $property_owner_phone);
//            $property_owner_of_email = $businessThird5['property_owner_of_email'];
//            $property_address = $businessThird5['property_address'];
            
            $b7_company_name = $businessSec4['company_name'];
            $b7_company_address = $businessSec4['company_address'];
            // $gur_period_date_range = $business7['gur_period_date_range'] ;
            // $cmpStartDate = $business7['cmpStartDate'] ;
            // $cmpSndDate = $business7['cmpSndDate'] ;
            $company_telephone = $businessSec4['company_telephone'];
            $company_telephone = str_replace(["-"], '', $company_telephone);
            $company_email = $businessSec4['company_email'];
            $gr_company_file = $businessSec4['gr_company_file'];
            $b7_company_id = $businessSec4['company_id'];
            $b7_contact_id = $businessSec4['agent_id'];
            $b7_other_company_name = $businessSec4['other_company_name'];

    $businessSec6 = $this->session->userdata('businessSec6');
    $gurantee_articles_of_association = $businessSec6['gurantee_articles_of_association'];
    $gurantee_certificate = $businessSec6['gurantee_certificate'];
    $gurantee_exemption_withholding_tax = $businessSec6['gurantee_exemption_withholding_tax'];
    $gurantee_bookkeeping_authorization = $businessSec6['gurantee_bookkeeping_authorization'];
    $gurantee_oval_attorney = $businessSec6['gurantee_oval_attorney'];
    $gurantee_direct_debit_authorization = $businessSec6['gurantee_direct_debit_authorization'];

            // first signature image start
//            define('UPLOAD_DIR', 'doc_sign/');
//              $img1 = $first_base64_signature;
//              
//              $img1 = str_replace('data:image/png;base64,', '', $img1);
//              $img1 = str_replace(' ', '+', $img1);
//              $data1 = base64_decode($img1);
//
//              $encoded_string1 = $img1;
//              $imgdata1 = base64_decode($encoded_string1);
//              $mimetype1 = $this->getImageMimeType($imgdata1);
//              // echo $imgdata; die();
//
//              $file1 = UPLOAD_DIR . uniqid() . '.'.$mimetype1;
//              // echo $file; die();
//              $success1 = file_put_contents($file1, $data1);
//
//              $first_signature_file = base_url().$file1;
              // $file_path1 = "222";

        // end


        // second signature image start
//            define('UPLOAD_SECOND_DIR', 'doc_sign/');
//              $img2 = $second_base64_signature;
//              
//              $img2 = str_replace('data:image/png;base64,', '', $img2);
//              $img2 = str_replace(' ', '+', $img2);
//              $data2 = base64_decode($img2);
//
//              $encoded_string2 = $img2;
//              $imgdata2 = base64_decode($encoded_string2);
//              $mimetype2 = $this->getImageMimeType($imgdata2);
//              // echo $imgdata2; die();
//
//              $file2 = UPLOAD_SECOND_DIR . uniqid().rand() . '.'.$mimetype2;
//              // echo $file; die();
//              $success2 = file_put_contents($file2, $data2);
//
//              $second_signature_file = base_url().$file2;
              // $file_path2 = "123";

        // end

            // another lease period getting
//            if(!empty($antstartDate) && !empty($antendDate)){
//
//                $another_startDate = $antstartDate;
//                $another_endDate = $antendDate;
//
//                $an_ts1 = strtotime($another_startDate);
//                $an_ts2 = strtotime($another_endDate);
//
//                $an_year1 = date('Y', $an_ts1);
//                $an_year2 = date('Y', $an_ts2);
//
//                $an_month1 = date('m', $an_ts1);
//                $an_month2 = date('m', $an_ts2);
//
//                $an_diff = (($an_year2 - $an_year1) * 12) + ($an_month2 - $an_month1);
//
//                $ant_lease_period = $an_diff;
//
//            }
//            else{
//                $ant_lease_period = "";
//            }
            // end

            // company gurantee lease period getting
            // $sec_ts1 = strtotime($cmpStartDate);
            // $sec_ts2 = strtotime($cmpSndDate);

            // $sec_year1 = date('Y', $sec_ts1);
            // $sec_year2 = date('Y', $sec_ts2);

            // $sec_month1 = date('m', $sec_ts1);
            // $sec_month2 = date('m', $sec_ts2);

            // $sec_diff = (($sec_year2 - $sec_year1) * 12) + ($sec_month2 - $sec_month1);

            // $gr_company_period_month = $sec_diff; // api check
            // end

            // gurantee lease period getting
            $sec_ts3 = strtotime($startDate);
            $sec_ts4 = strtotime($endDate);

            $sec_year3 = date('Y', $sec_ts3);
            $sec_year4 = date('Y', $sec_ts4);

            $sec_month3 = date('m', $sec_ts3);
            $sec_month4 = date('m', $sec_ts4);

            $sec_diff1 = (($sec_year4 - $sec_year3) * 12) + ($sec_month4 - $sec_month3);

            $gur_period_month = $sec_diff1; // api check
            // end

            // other details
            $client_account_type = 1;
             $first_signature_file = "";
             $second_signature_file = "";
            // $ant_lease_period = "";
//            $ant_client_file = $another_user_file;
            // $gr_company_period_month = "";
            $gr_company_url = $gr_company_file;

//            if(empty($ant_first_name) && empty($ant_last_name) && empty($ant_unique_id) && empty($ant_client_add) && empty($ant_client_phone) && empty($ant_client_gender) && empty($ant_req_gur_amt) && empty($ant_client_file)) {
//
//                $client_another_account_status = 0;
//            }
//            else{
//                $client_another_account_status = 1;
//            }
            // end
            
            // user pdf and link generate (pdf details)
            $date = date("Y-m-d");
            $amount = $req_gur_amt;
            $name = $first_name." ".$last_name;
            $document_number_id = $unique_id;
            $address = $street.", ".$home_no.", ".$hometown;
            $no_of_months = $gur_period_month;
            $file_path = $second_signature_file;
            $document_id = "";

        $document_id = $this->session->userdata('order_id_number');
            
            $businessSec3 = $this->session->userdata('businessSec3');
            
            $endDate = date('Y').'12-31';
           
            if(!empty($businessSec3))
            {
              $endDate = $businessSec3['endDate'];
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

                  
                   

                </STYLE>
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
          
         
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; margin-top: -150px;">
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center;">
            <FONT FACE="David"><SPAN LANG="he-IL"> הלוואה למימון עמלת ערבות לחברה</SPAN></FONT></P>

            </div>
            <DIV TYPE=HEADER>
                 
            </DIV>
             <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> אאני, החתום מטה, '.$name.' בעל ת.ז. מס '.$document_number_id.'חברה מאשר ומצהיר כמפורט להלן:</SPAN></FONT></P>

    
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">1. ידוע לי כי תשלום העמלה לגולדנרוד פיננסים בע"מ, ח.פ. 513578674 (להלן: "גולדנרוד") בגין העמדת הערבות (להלן: "העמלה") באמצעות הלוואה זו ומימון העמלה בדרך של קבלת הלוואה באמצעות טריא פי2פי בע"מ )ח.פ. 515024131 ) או טריא קהילה פיננסית בע"מ (ח.פ. 515928034) (שתי החברות יקראו להלן: "טריא") הן עסקאות נפרדות.  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">  2. אני מצהיר ומאשר שסכום ההלוואה יועבר במישרין לגולדנרוד ובחתימתי על נספח זה אני מסכים לכל תנאי ההלוואה וכן לכל תנאי האתר שבאמצעותו אקבל את ההלוואה ואני מורה לטריא להעביר את סכום ההלוואה כאמור.  </SPAN></FONT></P>
        
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3. אני מאשר שידוע לי שטריא אינה שותפה או ערבה בצורה כלשהי לעסקי גולדנרוד, ואינה צד לעסקה זו, ולפיכך טענות הנוגעות לעמלה או טענות אחרות שעלולות להיות לי כלפי, לרבות בקשר עם העמלה, לא יהוו עילה לאי תשלום ההלוואה ולא יפטרו אותי מתשלום החזרי ההלוואה לטריא. </SPAN></FONT></P>
            <BR>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > שם החותם: '.$name.' חתימה דיגיטלית: </SPAN></FONT></P>
            <BR>
            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$first_signature_file.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>
 
             
            </BODY>
            </HTML>';

          
            $location_url1 = 'doc_sign/first_document/';

//            $pdf_data1 = $this->pdf($html1,$location_url1);
//            $first_document = $pdf_data1['final_pdf_path'];
            
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
            <FONT FACE="David"><SPAN LANG="he-IL">הסכם שיפוי חברה </SPAN></FONT></P>

            </div>
            <DIV TYPE=HEADER>
                  
            </DIV>
              <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> שנערך ונחתם ב'.$date_signature.' </SPAN></FONT></P>

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
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.1.  המבוא להסכם וכן כל הנספחים המצורפים להסכם מהווים חלק בלתי נפרד הימנו (להלן: "ההסכם").   </SPAN></FONT></P>

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


            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד (הערבה) </SPAN></FONT></P>
            <BR>
            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$second_signature_file.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

             
            </BODY>
            </HTML>';

        
            $location_url2 = 'doc_sign/second_document/';

//            $pdf_data2 = $this->pdf($html2,$location_url2);
//            $second_document = $pdf_data2['final_pdf_path'];
        // end second
           
            // echo "<pre>"; print_r($pdf_data); print_r($pdf_data1); print_r($pdf_data2);
            // echo $first_document."<br>"; echo $second_document."<br>";
            // die();
            
            $fields = array("client_id_number" => $unique_id, "guarantee_type" => $guarantee_type, "preferred_route" => $preferred_route, "client_first_name" => $first_name, "client_last_name" => $last_name, "guarantee_period_month" => $gur_period_month, "requested_amount" => $req_gur_amt, "amt_company_name" => $company_name, "amt_company_address" => $company_address, "amt_company_id" => $company_id, "amt_company_business_type" => $business_type, "amt_company_contact_person_email" => $contact_person_email, "amt_company_contact_person_name" => $contact_person_name, "amt_company_contact_person_phone" => $contact_person_phone, "gr_company_name" => $b7_company_name, "gr_company_address" => $b7_company_address, "gr_company_email" => $company_email, "user_pdf" => $user_pdf, "gr_company_phone" => $company_telephone, "gr_company_url" => $gr_company_url, "gurantee_articles_of_association" => $gurantee_articles_of_association, "gurantee_certificate" => $gurantee_certificate, "gurantee_exemption_withholding_tax" => $gurantee_exemption_withholding_tax, "gurantee_bookkeeping_authorization" => $gurantee_bookkeeping_authorization, "gurantee_oval_attorney" => $gurantee_oval_attorney, "user_link" => $user_link, "b7_company_id" => $b7_company_id, "b7_contact_id" => $b7_contact_id, "guarantee_period_start_date" => $startDate, "guarantee_period_end_date" => $endDate, "gurantee_direct_debit_authorization" => $gurantee_direct_debit_authorization,"gr_other_company_name"=>$b7_other_company_name, 'order_id_number' => $order_id_number );

//             echo "<pre>"; print_r($fields); 
//             die();
            
            // api call
            $url = 'https://obli-backend.herokuapp.com/webservices/businessSecOrderDetails.php';

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
            
//            print_r($result); echo '<br>';echo '<br>';
//            print_r($err);            
//            die();

            if($err){
//                 echo $err;die();
                $session_array = array( 'businessSec2', 'businessSec3', 'businessSec4', 'businessSec5', 'businessSec6', 'businessSec7');
                $this->session->unset_userdata($session_array);
                echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('businessSec1')."'; </script>";
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
                            
                            $session_array = array('business1', 'business2', 'businessSec2', 'businessSec3', 'businessSec4', 'businessSec5', 'businessSec6', 'businessSec7');
                            $this->session->unset_userdata($session_array);
                            echo "<script type='text/javascript'>alert('Your record is rejected, Please try to fill all the forms again!'); window.location.href = '".site_url('business1')."'; </script>";
//                            redirect('business1');
                            return FALSE;
                             
                         }else{
                             
                           $businessSec2 = $this->session->userdata('businessSec2');

                            if(!empty($businessSec2)){

                                $business_type = $businessSec2['business_type'];

                                if(!empty($business_type)){
                                    if($business_type == 'חברה בע”מ'){
                                        
                                        $session_array = array('business1', 'business2', 'businessSec2', 'businessSec3', 'businessSec4', 'businessSec5', 'businessSec6', 'businessSec7');
                                        $this->session->unset_userdata($session_array);

                                        echo "<script type='text/javascript'>alert('Your record successfully saved!');window.location.href = '".site_url('businessSec7')."';</script>";
                                        return FALSE;

                                    }else{
                                        
                                        $session_array = array('business1', 'business2', 'businessSec2', 'businessSec3', 'businessSec4', 'businessSec5', 'businessSec6', 'businessSec7');
                                        $this->session->unset_userdata($session_array);
                                        echo "<script type='text/javascript'>alert('Your record successfully saved!');window.location.href = '".site_url('businessSecPaymentPage')."';</script>";
                                        return FALSE;
                                    }
                                }
                                else{
                                    
                                    $session_array = array('business1', 'business2', 'businessSec2', 'businessSec3', 'businessSec4', 'businessSec5', 'businessSec6', 'businessSec7');
                                    $this->session->unset_userdata($session_array);
                                    redirect('business1');
                                }

                            }
                            else{
                                
                                $session_array = array('business1', 'business2', 'businessSec2', 'businessSec3', 'businessSec4', 'businessSec5', 'businessSec6', 'businessSec7');
                                $this->session->unset_userdata($session_array);
                                redirect('business1');
                            }

//                            redirect('business1');
                         }
                         
                     }
                     else{
                         
                         $session_array = array('businessThird1', 'businessThird2', 'businessSec2', 'businessSec3', 'businessSec4', 'businessSec5', 'businessSec6', 'businessSec7');
                        $this->session->unset_userdata($session_array);
                        echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('business1')."'; </script>";
                        return FALSE;
                        
//                         redirect('businessThird1');
                     }
                 }
//                 print_r($orderData->status);
//                 print_r($orderData); die();
                 
            }
            
            /* API : End */
        
    }
    
    function businessSecPaymentPage(){
        
//         echo '<pre>';
//        print_r($this->session->userdata());die();
        
        redirect('businessSec8');
        
        return false;
        
        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'businessSecPaymentPage' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            redirect('businessSec7');
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
            $this->load->view('website/businessSecond/business_sec_payment_page_scr');
            $this->load->view('website/footer', $data);
        }
        
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
        $date = $document_id = $amount = $document_number_id = $no_of_months = "";
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
            <FONT FACE="David"><SPAN LANG="he-IL"><U>כתובת מלאה של
            המשכיר</U></SPAN></FONT></P>
            <P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in;float:left;"><FONT FACE="David"><SPAN LANG="he-IL">א</SPAN></FONT>.<FONT FACE="David"><SPAN LANG="he-IL">ג</SPAN></FONT>.<FONT FACE="David"><SPAN LANG="he-IL">נ</SPAN></FONT>.,<FONT FACE="David" ><SPAN LANG="he-IL" STYLE="" >תאריך</SPAN></FONT>:
            '.$date.'</P>
            <P DIR="RTL" CLASS="western" ALIGN=CENTER STYLE="margin-left: 0.02in">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>הנדון</B></SPAN></FONT><B>:
            </B><FONT FACE="David"><SPAN LANG="he-IL"><U><B>ערבות מס</B></U></SPAN></FONT><U><B> '.$document_id.'</B></U></P>
            <OL>
                <LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL">אנו ערבים
                בזה כלפיך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
                לתשלום כל סכום עד לסכום כולל של </SPAN></FONT><U>'.$amount.'</U><B>
                ₪ </B>(<FONT FACE="David"><SPAN LANG="he-IL">להלן</SPAN></FONT>:
                &quot;<FONT FACE="David"><SPAN LANG="he-IL"><B>סכום הערבות</B></SPAN></FONT>&quot;)
                <FONT FACE="David"><SPAN LANG="he-IL">שתדרוש</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">תדרשו
                מ</SPAN></FONT>- <U><FONT FACE="David"><SPAN LANG="he-IL">'.$name.'</SPAN></FONT></U> (<FONT FACE="David"><SPAN LANG="he-IL">להלן
                וביחד</SPAN></FONT>: <B>&quot;</B><FONT FACE="David"><SPAN LANG="he-IL"><B>הנערב</B></SPAN></FONT><B>&quot;</B>)
                <FONT FACE="David"><SPAN LANG="he-IL">בקשר עם ההסכם מיום
                </SPAN></FONT> <U>'.$address.'</U>, <FONT FACE="David"><SPAN LANG="he-IL">על כל
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
            המדד שפורסם ביום </SPAN></FONT><U>'.$document_number_id.'</U> <FONT FACE="David"><SPAN LANG="he-IL">בגין
            חודש </SPAN></FONT><U>'.$no_of_months.'</U>.</P>
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

            </OL>
            <OL START=3>
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">לפי
                דרישתך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
                הראשונה בכתב</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">ולא
                יאוחר מארבעה עשר ימים מתאריך התקבל
                דרישתך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
                על ידינו </SPAN></FONT>[<FONT FACE="David"><SPAN LANG="he-IL">באמצעות
                האתר או לפי כתובתנו המפורטת לעיל </SPAN></FONT>(<FONT FACE="David"><SPAN LANG="he-IL">בלוגו
                של המסמך</SPAN></FONT>)], <FONT FACE="David"><SPAN LANG="he-IL">אנו
                נשלם לך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
                כל סכום הנקוב בדרישה ובלבד שלא יעלה על
                סכום הערבות הצמוד למדד</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">מבלי
                להטיל עליך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
                חובה להוכיח או לבסס את דרישתך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
                ומבלי שתהיה</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ו
                חייב</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ים
                לדרוש את התשלום תחילה מאת הנערב</SPAN></FONT>.
                [<FONT FACE="David"><SPAN LANG="he-IL"><SPAN>דני</SPAN></SPAN></FONT><SPAN>,
                <FONT FACE="David"><SPAN LANG="he-IL">ערן – לדיון כיצד
                מודיעים על מימוש הערבות</SPAN></SPAN></FONT><SPAN>.
                <FONT FACE="David"><SPAN LANG="he-IL">האם אפשר להסתפק
                בשליחת מייל</SPAN></SPAN></FONT><SPAN>?
                <FONT FACE="David"><SPAN LANG="he-IL">החזרה של הערבות</SPAN></SPAN></FONT><SPAN>?</SPAN>]</P>
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">ערבות זו
                תישאר בתוקפה עד ליום סיום ההסכם</SPAN></FONT>,
                <FONT FACE="David"><SPAN LANG="he-IL">ולאחר תאריך זה
                תהיה בטלה ומבוטלת</SPAN></FONT>. <FONT FACE="David"><SPAN LANG="he-IL">כל
                דרישה על פי ערבות זו צריכה להתקבל על
                ידינו בכתב ולא יאוחר מהתאריך הנ</SPAN></FONT>&quot;<FONT FACE="David"><SPAN LANG="he-IL">ל</SPAN></FONT>.
                    </P>
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">ערבות
                זאת אינה ניתנת להעברה ו</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">או
                להסבה</SPAN></FONT>.</P>
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">ערבות זו
                ניתנת למימוש לשיעורין</SPAN></FONT>.</P>
            </OL>
            <P DIR="RTL" ALIGN=LEFT STYLE="margin-left: 3.54in"><FONT FACE="David"><SPAN LANG="he-IL">בכבוד
            רב</SPAN></FONT>,</P>
            <P DIR="LTR" CLASS="western" STYLE="margin-left: 3.54in; text-indent: 4.39in">
                  <FONT FACE="David"><SPAN LANG="he-IL">גולדן</SPAN></FONT>-<FONT FACE="David"><SPAN LANG="he-IL">רוד
            בע</SPAN></FONT>&quot;<FONT FACE="David"><SPAN LANG="he-IL">מ</SPAN></FONT></P>
            <P DIR="LTR" CLASS="western"><img src="'.$file_path.'" width="200" height="" STYLE="margin:0 35%; color:red;">
            </P>
            </BODY>
            </HTML>';

            $pdf_location = "doc_sign/userPdf/";
            $final_pdf_path = $this->pdf($html, $pdf_location);
            echo '<pre>';
            print_r($final_pdf_path); die();
    }

    
    function business_payment_api() {
       $postForm = $_POST;
       
       $postForm['businessSec_requested_gur_amount'] = str_replace(',', '', $postForm['businessSec_requested_gur_amount']);
       
// print_r($_POST);
// echo $amount = $_POST["req_gur_amt"];
            $amount = str_replace(',', '',$_POST["businessSec_requested_gur_amount"]);
            
            
             $diff = 12;
            
            $duration = (($year2 - $year1) * 12) + ($month2 - $month1);
            
            ($duration > 12)? $duration/12*6/100 : $tax = 0.06;
         
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
            
            $businessSec1 = $this->session->userdata('businessSec1');
            $first_name = $businessSec1['first_name'];
            $last_name = $businessSec1['last_name'];
            $TZId = $businessSec1['unique_id'];
            $street = $businessSec1['street'];
            $home_no = $businessSec1['home_no'];
            $client_gender = $businessSec1['client_gender'];
            
            if($client_gender == "זכר"){
                $client_gender = 1;
            }
            else{
                $client_gender = 2;
            }
            
            $client_date_of_birth = strtr($businessSec1['client_date_of_birth'], '/', '-');
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
            
            
            $client_phone = $businessSec1['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);

            $client_phone;
            $client_email = $businessSec1['client_email'];
            //$client_date_of_birth = $business3['client_date_of_birth'];

            // print_r($this->session->userdata('business3'));
            // print_r($this->session->userdata('business4'));
            //die();
            $newdata = array(
                'businessSec3' => $postForm
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
            
            
            //Amount always send 20k on taraya Idan 02 Marh 20 //
            
                $amount1 = 20000;
                
             // Assigned 20000 successfully//
            
            $api_data = array("OrgId" => 10069,"FirstName" => "$first_name","LastName" => "$last_name","TZ" => "$TZId","Cell" => "$client_phone","Email"=> "$client_email","Street" => "$street","HouseNum"=> "$home_no","City" => "תל אביב","Sex" => $client_gender,"Birthdate_y" => "$client_year","Birthdate_m" => "$client_month","Birthdate_d" => "$client_day","Amount" => $amount1 ,"Duration" => $diff,"Product" => "מימון עמלה","OrderId" => "14XA24F","SuccessUrl" => "https://obli.co.il/business2PaymentSuccess","FailureUrl" => "https://obli.co.il/business2PaymentFailed","AutoApprove"=> 0);
            
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
              CURLOPT_POSTFIELDS => "{\n\"OrgId\" : 10069,\n\"FirstName\" : \"$first_name\",\n\"LastName\" : \"$last_name\",\n\"TZ\" : \"$TZId\",\n\"Cell\" : \"$client_phone\",\n\"Email\": \"$client_email\",\n\"Street\" : \"$street\",\n\"HouseNum\": \"$home_no\",\n\"City\" : \"תל אביב\",\n\"Sex\" : $client_gender,\n\"Birthdate_y\" : \"$client_year\",\n\"Birthdate_m\" : \"$client_month\",\n\"Birthdate_d\" : \"$client_day\",\n\"Amount\" : $amount1 ,\n\"Duration\" : $diff,\n\"Product\" : \"מימון עמלה\",\n\"OrderId\" : \"14XA24F\",\n\"SuccessUrl\" : \"https://obli.co.il/business2PaymentSuccess\",\n\"FailureUrl\" : \"https://obli.co.il/business2PaymentFailed\",\n\"AutoApprove\": 0\n}",
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
                $log_data = array('tz_id' => $TZId, 'firstname' => $first_name, 'lastname' => $last_name, 'form_text' => 'Business Second', 'payment_url' => $this->config->item('payment_url'), 'request_data' => json_encode($api_data), 'error_data' => $err, 'created_at' => date('Y-m-d H:i:s') );
                 $this->project_model->insert_data('check_payment_api_response', $log_data);
                // end 
                 
              // echo "cURL Error #:" . $err;
//              $form_data['data'] = array('status' => 'false');
                $responsePostData = array('status'=>'false','msg'=>'failed!');
                echo json_encode($responsePostData);
            } else {
                
                // log error insert in table
                $log_data = array('tz_id' => $TZId, 'firstname' => $first_name, 'lastname' => $last_name, 'form_text' => 'Business Second', 'payment_url' => $this->config->item('payment_url'), 'request_data' => json_encode($api_data), 'response_data' => $response, 'created_at' => date('Y-m-d H:i:s') );
                 $this->project_model->insert_data('check_payment_api_response', $log_data);
                // end 
                 
//                print_r($response); 
                $res = json_decode($response);
//                print_r($res);
                
                if(!empty($res->iframe->mpiHostedPageUrl)){
//                    echo $res->iframe->mpiHostedPageUrl;
                    $this->session->set_userdata(array(
                      'businesSec_payment_api_link' => $res->iframe->mpiHostedPageUrl
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
    
    function business_without_payment_api() {
        $postForm = $_POST;
        
        
         $postForm['businessSec_requested_gur_amount'] = str_replace(',', '', $postForm['businessSec_requested_gur_amount']);

            // print_r($this->session->userdata('business3'));
            // print_r($this->session->userdata('business4'));
            //die();
            $newdata = array(
                'businessSec3' => $postForm
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
  
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
     
      
    function business2PaymentSuccess(){
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
        
        redirect('businessSec8');
    }
    
    function business2PaymentFailed(){
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

