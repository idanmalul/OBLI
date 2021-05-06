<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller {
    
    function __construct() {

        parent::__construct();
         date_default_timezone_set('Asia/Kolkata');
    }

    function index() 
    {
        $data = array();
        $footerdata = array();
        $sql1 = "SELECT * FROM banner ORDER BY id DESC LIMIT 1 ";
        $data['banner_detail'] = $this->project_model->get_query_result($sql1);

        // echo "<pre>"; print_r($data['banner_detail']); die();

        $sql2 = "SELECT * FROM content_section_2 ORDER BY id DESC LIMIT 1";
        $data['content_details'] = $this->project_model->get_query_result($sql2);

        $sql3 = "SELECT * FROM section_4 ORDER BY id DESC LIMIT 1";
        $data['section_4_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM section_5 ORDER BY id DESC LIMIT 1";
        $data['section_5_details'] = $this->project_model->get_query_result($sql4);

        // Footer records
        $sql5 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql6);

        $sql7 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql7);

        $sql8 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql8);

        $sql9 = "SELECT * FROM testmonial_section_3 where status = 1";
        $data['slider_details'] = $this->project_model->get_query_result($sql9);

        $this->load->view('website/header');
        $this->load->view('website/body_content', $data);
        $this->load->view('website/footer', $data);
       
    }

    function aboutus()
    {
        $sql1 = "SELECT * FROM aboutus ORDER BY id DESC LIMIT 1 ";
        $data['aboutus_detail'] = $this->project_model->get_query_result($sql1);

        $where_icon_logo = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($where_icon_logo);

        $sql2 = "SELECT * FROM aboutus INNER JOIN partner_icons_images ON aboutus.id = partner_icons_images.aboutus_id ORDER BY partner_icons_images.id ";
        $data['partner_icons_details'] = $this->project_model->get_query_result($sql2);

        // echo "<pre>"; print_r($data['partner_icons_details']); die();

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
        $this->load->view('website/about_us', $data);
        $this->load->view('website/footer', $data);
    }

    function contactus()
    {
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
        $this->load->view('website/contact_us');
        $this->load->view('website/footer', $data);
    }

    function faq()
    {
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
        $this->load->view('website/faq');
        $this->load->view('website/footer', $data);
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

    function tenant_payment_api(){

        // echo "<pre>"; print_r($_POST); die();

        // footer records
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);

        if($this->input->post()){ 

            $form_detail = $this->input->post();

            $postData = $this->input->post();

            // echo "<pre>"; print_r($form_detail); print_r($_FILES['file-2']); die();

            $first_name = $postData['first_name'];
            $last_name = $postData['last_name'];
            $unique_id = $postData['unique_id'];
            $client_hometown = $postData['hometown']; // api check client add
            $client_street = $postData['street'];
            $client_home_no = $postData['home_no'];
            $client_phone = $postData['client_phone'];
            $client_email = $postData['client_email'];
            $client_gender = $postData['client_gender'];
            $client_date_of_birth = $postData['client_date_of_birth'];
            $req_gur_amt = $postData['req_gur_amt'];

            $startDate = $postData['startDate'];
            $endDate = $postData['endDate'];

            $ts1 = strtotime($startDate);
            $ts2 = strtotime($endDate);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
            // echo $diff;

            // first file
            if(isset($_FILES["file-2"]["name"])) {

                $config['upload_path'] = './webservices/obli_profile_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

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

                $postFile = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";

                // $file_name = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

                // echo base_url().'/'.$client_file; die();

            } 
            // end
            // echo $postFile; die();

            // api start
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => "https://tarya.orange.tarya.co.il/api/tarya-pay/loan",
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => "",
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 30,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => "POST",
            //   CURLOPT_POSTFIELDS => "{\n\"amount\": ".$req_gur_amt.",\n\"autoApprove\": 1,\n\"birthDate\": \"1983-04-28\",\n\"cellPhone\": \"0503996262\",\n\"city\":\"תל אביב\",\n\"countryCode\": \"IL\",\n\"email\": \"".$client_email."\",\n\"failureUrl\": \"http://ebay.com/sucess?orderId=14XA24F\",\n\"firstName\": \"".$first_name."\",\n\"gender\": ".$client_gender.",\n\"houseNum\": \"5א\",\n\"includeUi\": 1,\n\"lastName\": \"".$last_name."\",\n\"localCountryId\": \"028117513\",\n\"merchantId\": 10052,\n\"orderId\": \"14XA24F\",\n\"period\": 7,\n\"productTitle\": \"היזיולט\",\n\"street\": \"קילאיב\",\n\"successUrl\": \"http://ebay.com/sucess?orderId=14XA24F\"\n}",
            //   CURLOPT_HTTPHEADER => array(
                
            //     "Cache-Control: no-cache",
            //     "Content-Type: application/json",
            //     "Postman-Token: 1effd8b2-2187-4b3b-aee8-91ad39e85888,a2ab8682-a93b-4675-8537-3c04c68a8979",
            //     "cache-control: no-cache"
            //   ),
            // ));

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://tarya.orange.tarya.co.il/api/tarya-pay/loan",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{\n\"amount\": 7500,\n\"autoApprove\": 1,\n\"birthDate\": \"1983-04-28\",\n\"cellPhone\": \"0503996262\",\n\"city\":\"תל אביב\",\n\"countryCode\": \"IL\",\n\"email\": \"nitzan.alcobi@gmail.com\",\n\"failureUrl\": \"http://ebay.com/sucess?orderId=14XA24F\",\n\"firstName\": \"דוד\",\n\"gender\": 1,\n\"houseNum\": \"5א\",\n\"includeUi\": 1,\n\"lastName\": \"ןהכ\",\n\"localCountryId\": \"028117513\",\n\"merchantId\": 10052,\n\"orderId\": \"14XA24F\",\n\"period\": 7,\n\"productTitle\": \"היזיולט\",\n\"street\": \"קילאיב\",\n\"successUrl\": \"http://ebay.com/sucess?orderId=14XA24F\"\n}",
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
              // echo "cURL Error #:" . $err;
              $form_data['data'] = array('status' => 'false');
            } else {
              // echo $response;

              $form_data['data'] = array('status' => 'true', 'api_url' => $response, 'form_detail' => $form_detail, 'first_file' => $postFile );

                $this->load->view('website/header');
                $this->load->view('website/new_form', $form_data);
                $this->load->view('website/footer', $data);
            } 
        // api end

            

        }
        else{
            $this->load->view('website/header');
            $this->load->view('website/new_form');
            $this->load->view('website/footer', $data);
        }

    }

    function submit_form_data()
    {
        if($this->input->post()){

            $client_file = $another_account_file = $order_file_name = $an_diff = $apartment_add = $landlord = $landlord_id = $property_phone = $sec_email = $sec_diff = '';
            $postData = $this->input->post();

            // client details
            $first_name = $postData['first_name'];
            $last_name = $postData['last_name'];
            $unique_id = $postData['unique_id'];
            $client_hometown = $postData['hometown']; // api check client add
            $client_street = $postData['street'];
            $client_home_no = $postData['home_no'];
            $client_phone = $postData['client_phone'];
            $client_email = $postData['client_email'];
            $client_gender = $postData['client_gender'];
            $client_first_file = $postData['first_file'];
            $client_date_of_birth = $postData['client_date_of_birth'];

            $req_gur_amt = $postData['req_gur_amt'];

            // print_r($postData);

            $startDate = $postData['startDate'];
            $endDate = $postData['endDate'];

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
            define('UPLOAD_DIR', 'doc_sign/');
              $img1 = $_POST['first_base64_signature'];
              
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

        // end


        // second signature image start
            define('UPLOAD_SECOND_DIR', 'doc_sign/');
              $img2 = $_POST['second_base64_signature'];
              
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

            if(!empty($postData['req_gur_amt'])){

                if($postData['req_gur_amt'] > 25000){

                    $client_another_account_status = "1";

                    // $another_account_address = $postData['apartment_add'];
                    // $another_first_name = $postData['landlord'];
                    // $another_account_id_number = $postData['landlord_id'];
                    // $another_account_phone = $postData['property_phone'];
                    // $another_account_email = $postData['sec_email'];

                    // another details
                    $another_first_name = $postData['ant_first_name'];
                    $another_last_name = $postData['ant_last_name'];
                    $another_account_id_number = $postData['ant_unique_id'];
                    $another_account_email = $postData['ant_client_email'];
                    $another_account_phone = $postData['ant_client_phone'];   
                    $another_account_address = $postData['ant_client_add'];
                    $another_account_sum = $postData['ant_req_gur_amt'];
                    $another_account_gender = $postData['ant_client_gender'];
                    $another_account_dob = $postData['antsec_date_of_birth'];
                    // $another_account_file = $postData['to_photo_id'];
                    $type_of_other_details = '1';

                    $another_startDate = $postData['antstartDate'];
                    $another_endDate = $postData['antendDate'];

                    $an_ts1 = strtotime($another_startDate);
                    $an_ts2 = strtotime($another_endDate);

                    $an_year1 = date('Y', $an_ts1);
                    $an_year2 = date('Y', $an_ts2);

                    $an_month1 = date('m', $an_ts1);
                    $an_month2 = date('m', $an_ts2);

                    $an_diff = (($an_year2 - $an_year1) * 12) + ($an_month2 - $an_month1);

                    $an_lease_period = $an_diff;

                    if (!empty($_FILES["file-2"]["name"])) {  

                        // $config = array();

                        // print_r($config['file_name']."sat"); echo "<br>";

                        $config['upload_path'] = './webservices/obli_profile_images/';

                        $config['allowed_types'] = 'gif|jpg|png|jpeg';

                        $config['overwrite'] = FALSE;

                        $config['max_size'] = '';

                        $config['min_width']  = '';

                        $config['min_height']  = '';

                        $config['max_width']  = '';

                        $config['max_height']  = '';

                        $file_extension1 = @end(explode(".", $_FILES["file-2"]["name"]));

                        $new_extension1 = strtolower($file_extension1);

                        $today1 = time();

                        $custom_name1 = "obli_" . $today1.rand(10,100);

                        $file_name1 = $custom_name1 . "." . $new_extension1;

                        $config['file_name'] = $file_name1;

                        $this->load->library('upload', $config);

                        // print_r($config['file_name']); echo "<br>";

                        if (!$this->upload->do_upload('file-2', $config)) {
                            
                        $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                       
                        
                        // $this->load->view('website/header');
                        // $this->load->view('website/tenant', $form_data);
                        // $this->load->view('website/footer', $data);
                        // return false;
                        }
                        $another_account_file = base_url().'webservices/obli_profile_images/'.$file_name1;
                        $ant_account_file = $another_account_file;
                        // $file_name1 = "";
                        // $custom_name = "";
                        // $config['file_name'] = "";
                        // $config = array();

                    }
                }
                else{

                    $client_another_account_status = "0";
                    $type_of_other_details = '2';
                    // another details (property details)
                    $another_account_address = $postData['apartment_add'];
                    $another_first_name = $postData['landlord'];
                    $another_account_id_number = $postData['landlord_id'];
                    $another_account_phone = $postData['property_phone'];
                    $another_account_email = $postData['sec_email'];
                    $another_account_dob = "1925-02-05";
                    $another_account_gender = "3";
                    $another_account_sum = "1";
                    $another_last_name = "1";
                    
                    $sec_StartDate = date('Y-m-d', strtotime($postData['sec_dateStartDate']));
                    $sec_EndDate = $postData['sec_dateEndDate'];
                    $sec_EndDate = date('Y-m-d', strtotime($sec_EndDate));

                    // echo $postData['sec_dateStartDate']."  ".$sec_StartDate."  "; echo $postData['sec_dateEndDate']."  "; echo $sec_EndDate."  ";

                    $sec_ts1 = strtotime($sec_StartDate);
                    $sec_ts2 = strtotime($sec_EndDate);

                    $sec_year1 = date('Y', $sec_ts1);
                    $sec_year2 = date('Y', $sec_ts2);

                    $sec_month1 = date('m', $sec_ts1);
                    $sec_month2 = date('m', $sec_ts2);

                    $sec_diff = (($sec_year2 - $sec_year1) * 12) + ($sec_month2 - $sec_month1);

                    $an_lease_period = $sec_diff; // api check

                // second file
                    if (!empty($_FILES["file-1"]["name"])) {

                        $config['upload_path'] = './webservices/obli_profile_images/';

                        $config['allowed_types'] = 'gif|jpg|png|jpeg';

                        $config['overwrite'] = FALSE;

                        $config['max_size'] = '';

                        $config['min_width']  = '';

                        $config['min_height']  = '';

                        $config['max_width']  = '';

                        $config['max_height']  = '';

                        $file_extension2 = @end(explode(".", $_FILES["file-1"]["name"]));

                        $new_extension2 = strtolower($file_extension2);

                        $today2 = time();

                        $custom_name2 = "obli_" . $today2.rand(10,100);

                        $file_name2 = $custom_name2 . "." . $new_extension2;

                        $config['file_name'] = $file_name2;

                        // print_r($config['file_name']); echo "<br>"; die();

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('file-1', $config)) {
                            
                        $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                       
                        
                        // $this->load->view('website/header');
                        // $this->load->view('website/tenant', $form_data);
                        // $this->load->view('website/footer', $data);
                        // return false;
                        }
                        $order_file_name = base_url().'webservices/obli_profile_images/'.$file_name2;
                        $ant_account_file = $order_file_name;
                        // $data['slider_image'] = $file_name;
                        // $file_name2 = "";
                        // $custom_name = "";
                        // $config['file_name'] = "";
                        // $config = array();

                    }
                // end file

           
                // $property_phone = $postData['property_phone'];
                //["another_account_sum = $postData['fullname'];

                }

            }

            $diff_data = array('diff' => $diff, 'an_diff' => $an_diff, 'sec_diff' => $sec_diff, 'client_file' => $client_first_file, 'another_account_file' => $another_account_file, 'order_file_name' => $order_file_name, 'file_path1' => $file_path1, 'file_path2' => $file_path2 );

        

            $client_account_type = "1";
            $order_name = "Rent guarantee";
            $deposit_status = "0";
            $order_type = "1";
            $approval_Status = '0';

            // client_account_type:1
            // order_name:Rent guarantee sat

            // deposit_status:0
            // order_type:1

            // echo $client_file."<br>"; echo $another_account_file."<br>"; echo $order_file_name; die();

            $fields = array('client_id_number' => $unique_id, 'client_first_name' => $first_name, 'client_last_name' => $last_name, 'client_email' => $client_email, 'client_phone' => $client_phone, 'client_gender' => $client_gender, 'client_hometown' => $client_hometown, 'client_street' => $client_street, 'client_home_no' => $client_home_no, 'client_file' => $client_first_file, 'client_date_of_birth' => $client_date_of_birth, 'client_account_type' => $client_account_type, 'client_another_account_status' => $client_another_account_status, 'guarantee_period_month' => $client_gur_month, 'requested_amount' => $req_gur_amt, 'first_signature_file' => $file_path1, 'second_signature_file' => $file_path2, 'ant_first_name' => $another_first_name, 'ant_last_name' => $another_last_name, 'ant_client_email' => $another_account_email, 'ant_unique_id' => $another_account_id_number, 'ant_client_file' => $ant_account_file, 'ant_client_phone' => $another_account_phone, 'ant_client_add' => $another_account_address, 'ant_client_gender' => $another_account_gender, 'ant_account_birth_date' => $another_account_dob, 'ant_req_gur_amt' => $another_account_sum, 'ant_lease_period' => $an_lease_period);

            // print_r($fields);


            $url = 'https://obli-backend.herokuapp.com/webservices/client_details.php';

            //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);

            //execute post
            $result = curl_exec($ch);
            $err = curl_error($ch);
            //close connection
            curl_close($ch);

            if($err){
                // echo $err;
                $responsePostData = array('status'=>'false','msg'=>'Error in insertion!');
                echo json_encode($responsePostData);
            }
            else{
                // echo $result;
                $responsePostData = array('status'=>'true','msg'=>'Record added success fully');
                echo json_encode($responsePostData);
            }

            

            // $responsePostData = array('status'=>'true','msg'=>'Record added success fully', 'formData' => $postData, 'ddd' => $diff_data);
                // echo json_encode($responsePostData);
            
        }
        else {
            $responsePostData = array('status'=>'false','msg'=>'Something went wrong!');
            echo json_encode($responsePostData);
        }
        
    }


    function tenant()
    {
        if(!empty($_SESSION['error'])){
            unset($_SESSION['error']);
        }

        if(!empty($_SESSION['success'])){
            unset($_SESSION['success']);
        }
        
        
        // footer records
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);

        if ($this->input->post()){ 

            // signature file generated
            define('UPLOAD_DIR', 'doc_sign/');
              $img = $_POST['base64_signature'];
              
              $img = str_replace('data:image/png;base64,', '', $img);
              $img = str_replace(' ', '+', $img);
              $data = base64_decode($img);

              $encoded_string = $img;
              $imgdata = base64_decode($encoded_string);
              $mimetype = $this->getImageMimeType($imgdata);
              // echo $imgdata; die();

              $file = UPLOAD_DIR . uniqid() . '.'.$mimetype;
              // echo $file; die();
              $success = file_put_contents($file, $data);

              $file_path = base_url().$file;

              // end

            // echo $file_path; die();

            $formdata = $this->input->post();
            unset($formdata['submit']);

            // client details
            $client_name = $formdata['fullname'];
            $client_id_number = $formdata['unique_id'];
            $client_email = $formdata['email'];
            $client_phone = $formdata['phone_number'];  
            $client_address = $formdata['current_residence'];
            $sum_amount = $formdata['guarantee_amount'];
            // $client_file = $formdata['photo_id'];

            if (isset($_FILES["photo_id"]["name"])) {

                $config['upload_path'] = './webservices/obli_profile_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["photo_id"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo_id', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
               
                
                $this->load->view('website/header');
                $this->load->view('website/tenant', $form_data);
                $this->load->view('website/footer', $data);
                return false;
                }
                $client_file = base_url().'webservices/obli_profile_images/'.$file_name;

                // echo "<pre>"; print_r($_FILES); echo "<br>";

                // $file_name = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

                // echo base_url().'/'.$client_file; die();

            } 

            if (!empty($_FILES["landlord_photo_id"]["name"])) { 

                // print_r($config['file_name']."sat1"); echo "<br>";
                // echo "<pre>"; print_r($_FILES); echo "<br>";

                $config['upload_path'] = './webservices/obli_profile_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension2 = @end(explode(".", $_FILES["landlord_photo_id"]["name"]));

                $new_extension2 = strtolower($file_extension2);

                $today2 = time();

                $custom_name2 = "obli_" . $today2.rand(10,100);

                $file_name2 = $custom_name2 . "." . $new_extension2;

                $config['file_name'] = $file_name2;

                // print_r($config['file_name']); echo "<br>"; die();

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('landlord_photo_id', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
               
                
                $this->load->view('website/header');
                $this->load->view('website/tenant', $form_data);
                $this->load->view('website/footer', $data);
                return false;
                }
                $order_file_name = base_url().'webservices/obli_profile_images/'.$custom_name.'1.'.$new_extension;
                // $data['slider_image'] = $file_name;
                // $file_name2 = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

            }

            if(!empty($formdata['guarantee_amount'])){ 

                if($formdata['guarantee_amount'] > 25000){

                    $client_another_account_status = "1";

                    // another details
                    $another_account_name = $formdata['to_fullname'];
                    $another_account_id_number = $formdata['to_unique_id'];
                    $another_account_email = $formdata['to_email'];
                    $another_account_phone = $formdata['to_phone_number'];   
                    $another_account_address = $formdata['to_current_residence'];
                    $another_account_sum = $formdata['to_guarantee_amount'];
                    // $another_account_file = $formdata['to_photo_id'];

                    if (!empty($_FILES["to_photo_id"]["name"])) {  

                        // $config = array();

                        // print_r($config['file_name']."sat"); echo "<br>";

                        $config['upload_path'] = './webservices/obli_profile_images/';

                        $config['allowed_types'] = 'gif|jpg|png|jpeg';

                        $config['overwrite'] = FALSE;

                        $config['max_size'] = '';

                        $config['min_width']  = '';

                        $config['min_height']  = '';

                        $config['max_width']  = '';

                        $config['max_height']  = '';

                        $file_extension1 = @end(explode(".", $_FILES["to_photo_id"]["name"]));

                        $new_extension1 = strtolower($file_extension1);

                        $today1 = time();

                        $custom_name1 = "obli_" . $today1.rand(10,100);

                        $file_name1 = $custom_name1 . "." . $new_extension1;

                        $config['file_name'] = $file_name1;

                        $this->load->library('upload', $config);

                        // print_r($config['file_name']); echo "<br>";

                        if (!$this->upload->do_upload('to_photo_id', $config)) {
                            
                        $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                       
                        
                        $this->load->view('website/header');
                        $this->load->view('website/tenant', $form_data);
                        $this->load->view('website/footer', $data);
                        return false;
                        }
                        $another_account_file = base_url().'webservices/obli_profile_images/'.$custom_name.'2.'.$new_extension;
                        // $file_name1 = "";
                        // $custom_name = "";
                        // $config['file_name'] = "";
                        // $config = array();

                    }
                }
                else{

                    $client_another_account_status = "0";
                    // another details
                    $another_account_name = "";
                    $another_account_id_number = "";
                    $another_account_email = "";
                    $another_account_phone = "";   
                    $another_account_address = "";
                    $another_account_sum = "";
                    $another_account_file = "";
                }
            }

            // property details
            $property_owner_name = $formdata['landlord'];
            $property_owner_id = $formdata['landlord_id'];
            $property_owner_email = $formdata['landlord_email'];
            $lease_period = $formdata['lease_period'];
            $order_address = $formdata['apartment_add'];
            // $property_phone = $formdata['property_phone'];
            //["another_account_sum = $formdata['fullname'];

            $client_account_type = "1";
            $order_name = "Rent guarantee";
            $deposit_status = "0";
            $order_type = "1";

            // client_account_type:1
            // order_name:Rent guarantee sat

            // deposit_status:0
            // order_type:1

            

            // echo $client_file."<br>"; echo $another_account_file."<br>"; echo $order_file_name; die();

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://obli-backend.herokuapp.com/webservices/client_details.php",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_id_number\"\r\n\r\n".$client_id_number."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_name\"\r\n\r\n".$client_name."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_email\"\r\n\r\n".$client_email."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_phone\"\r\n\r\n".$client_phone."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_address\"\r\n\r\n".$client_address."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_file\"\r\n\r\n".$client_file."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_account_type\"\r\n\r\n".$client_account_type."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sum_amount\"\r\n\r\n".$sum_amount."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_another_account_status\"\r\n\r\n".$client_another_account_status."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"order_name\"\r\n\r\n".$order_name."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"property_address\"\r\n\r\n".$order_address."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"order_file_name\"\r\n\r\n".$order_file_name."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"deposit_status\"\r\n\r\n".$deposit_status."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"order_type\"\r\n\r\n".$order_type."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"property_owner_name\"\r\n\r\n".$property_owner_name."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"property_owner_id\"\r\n\r\n".$property_owner_id."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"property_owner_email\"\r\n\r\n".$property_owner_email."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_id_number\"\r\n\r\n".$another_account_id_number."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_name\"\r\n\r\n".$another_account_name."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_phone\"\r\n\r\n".$another_account_phone."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"lease_period\"\r\n\r\n".$lease_period."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_email\"\r\n\r\n".$another_account_email."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_address\"\r\n\r\n".$another_account_address."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_file\"\r\n\r\n".$another_account_file."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_sum\"\r\n\r\n".$another_account_sum."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
              CURLOPT_HTTPHEADER => array(
                "Postman-Token: d80b3b60-4c77-4934-8e84-7fce9782923a",
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              // echo "cURL Error #:" . $err;
                $this->session->set_flashdata('error', 'שגיאה בהכנסה');
                
                $this->load->view('website/header');
                $this->load->view('website/tenant');
                $this->load->view('website/footer', $data);
            } else {
              // echo $response;
                // $this->session->set_flashdata('success', 'פרטים נשמרו בהצלחה.');
                // $this->payment_page($client_id_number, $sum_amount);

                // payment webservices
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "http://oblidev.malul.xyz/webservices/payment.php",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => "",
                  CURLOPT_HTTPHEADER => array(
                    "Postman-Token: fa746230-d2fb-4688-be17-f8c3b08acae8",
                    "cache-control: no-cache"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                  echo $response;
                }
            }

            

        }
        else {
            $this->load->view('website/header');
            $this->load->view('website/tenant');
            $this->load->view('website/footer', $data);
        }
        
        // $this->load->view('website/header');
        // $this->load->view('website/tenant');
        // $this->load->view('website/footer', $data);
    }

    function business_Form1(){

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
        $this->load->view('website/business_12_scr');
        $this->load->view('website/footer', $data);
    }

    function business_Form2(){

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
        $this->load->view('website/business_9_scr');
        $this->load->view('website/footer', $data);
    }

    function business_Form3(){

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
        $this->load->view('website/business_10_scr');
        $this->load->view('website/footer', $data);
    }

    function business_Form4(){

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
        $this->load->view('website/business_11_scr');
        $this->load->view('website/footer', $data);
    }

    // function submit_form_data1()
    // {
    //         $client_id_number = "01234544";
    //         $client_first_name = "Satendra";
    //         $client_last_name = "Shukla";
    //         $client_email = "satendra.tectum@gmail.com";
    //         $client_phone = "7894561230";
    //         $client_gender = "1";
    //         $client_hometown = "Indore";
    //         $client_street = "Nehru Nagar";
    //         $client_home_no = "8569";
    //         $client_file = "http://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png";
    //         $client_date_of_birth = "2019-05-22";
    //         $client_account_type = "1";
    //         $client_another_account_status = "1";
    //         $guarantee_period_month = "6";
    //         $requested_amount = "2344556555";
    //         $first_signature_file = "1222";
    //         $second_signature_file = "1333";
    //         $ant_first_name = "qw1";
    //         $ant_last_name = "qw2";
    //         $ant_client_email = "qw@gmail.com";
    //         $ant_unique_id = "345678";
    //         $ant_client_file = "http://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png";
    //         $ant_client_phone = "5236589325";
    //         $ant_client_add = "Indore";
    //         $ant_client_gender = "1";
    //         $ant_account_birth_date = "2019-09-19";
    //         $ant_req_gur_amt = "4000";
    //         $ant_lease_period = "550";
    //         // $approval_Status = '0';
    //         // $type_of_other_details = '1';

    //         /* API URL */
    //         $url = 'https://obli-backend.herokuapp.com/webservices/client_details.php';
       
    //         /* Init cURL resource */
    //         // $ch = curl_init($url);

 
    //         /* Array Parameter Data */
    //         // $data = ['name'=>'Hardik', 'email'=>'itsolutionstuff@gmail.com'];

    //         // $fields = array('client_id_number' => '01234544',
    //         //             'client_first_name' => 'Satendra',
    //         //             'client_last_name' => 'Shukla',
    //         //             'client_email' => 'satendra.tectum@gmail.com',
    //         //             'client_phone' => '7894561230',
    //         //             'client_gender' => '1',
    //         //             'client_hometown' => 'Indore',
    //         //             'client_street' => 'Nehru Nagar',
    //         //             'client_home_no' => '8569',
    //         //             'client_file' => 'http://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png',
    //         //             'client_date_of_birth' => '2019-05-22',
    //         //             'client_account_type' => '1',
    //         //             'client_another_account_status' => '0',
    //         //             'guarantee_period_month' => '6',
    //         //             'requested_amount' => '234',
    //         //             'first_signature_file' => '1222',
    //         //             'second_signature_file' => '1333',
    //         //             'ant_first_name' => 'qw1',
    //         //             'ant_last_name' => 'qw2',
    //         //             'ant_client_email' => 'qw@gmail.com',
    //         //             'ant_unique_id' => '345678',
    //         //             'ant_client_file' => 'http://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png',
    //         //             'ant_client_phone' => '5236589325',
    //         //             'ant_client_add' => 'Indore',
    //         //             'ant_client_gender' => '1',
    //         //             'ant_account_birth_date' => '2019-09-19',
    //         //             'ant_req_gur_amt' => '4000',
    //         //             'ant_lease_period' => '550'
    //         //         );

    //         $fields = array('client_id_number' => $client_id_number, 'client_first_name' => $client_first_name, 'client_last_name' => $client_last_name, 'client_email' => $client_email, 'client_phone' => $client_phone, 'client_gender' => $client_gender, 'client_hometown' => $client_hometown, 'client_street' => $client_street, 'client_home_no' => $client_home_no, 'client_file' => $client_file, 'client_date_of_birth' => $client_date_of_birth, 'client_account_type' => $client_account_type, 'client_another_account_status' => $client_another_account_status, 'guarantee_period_month' => $guarantee_period_month, 'requested_amount' => $requested_amount, 'first_signature_file' => $first_signature_file, 'second_signature_file' => $second_signature_file, 'ant_first_name' => $ant_first_name, 'ant_last_name' => $ant_last_name, 'ant_client_email' => $ant_client_email, 'ant_unique_id' => $ant_unique_id, 'ant_client_file' => $ant_client_file, 'ant_client_phone' => $ant_client_phone, 'ant_client_add' => $ant_client_add, 'ant_client_gender' => $ant_client_gender, 'ant_account_birth_date' => $ant_account_birth_date, 'ant_req_gur_amt' => $ant_req_gur_amt, 'ant_lease_period' => $ant_lease_period);

    //         // echo "<pre>"; print_r($fields); die();
       
    //         //url-ify the data for the POST
    //         // foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    //         // rtrim($fields_string, '&');

    //         //open connection
    //         $ch = curl_init();

    //         //set the url, number of POST vars, POST data
    //         curl_setopt($ch,CURLOPT_URL, $url);
    //         curl_setopt($ch,CURLOPT_POST, true);
    //         curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);

    //         //execute post
    //         $result = curl_exec($ch);
    //         $err = curl_error($ch);
    //         //close connection
    //         curl_close($ch);

    //         if($err){
    //             echo $err;
    //         }
    //         else{
    //             echo $result;
    //         }

    // }

    function payment_page(){
        // $this->load->view('payment/TranzilaDirectiFrame2');

    }

    
        
}

