<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BusinessThird extends CI_Controller {
    
    function __construct() {

        parent::__construct();
         date_default_timezone_set('Asia/Jerusalem');
         
         ob_start();
         
         error_reporting(0);
         
         $this->load->helper('common_helper');
         
    }
    
    function business_third_Form1(){
//        echo '<pre>';
//        print_r($this->session->userdata());die();
//        $this->session->sess_destroy();die();
        
        if(empty($this->session->userdata('business1')) || empty($this->session->userdata('business2')) ){
            redirect('business1');
            exit();
        }
            
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
                'businessThird1' => $data
            );

            $this->session->set_userdata($newdata);
//            echo 'hello';
//            print_r($this->session->userdata()); die();
            
            /* API : Start */
            $business1 = $this->session->userdata('business1');
            $guarantee_type = $business1['guarantee_type'];
            
            $business2 = $this->session->userdata('business2');
            $preferred_route = $business2['preferred_route'];
            
            $businessThird1 = $this->session->userdata('businessThird1');
            $first_name = $businessThird1['first_name'];
            $last_name = $businessThird1['last_name'];
            $unique_id = $businessThird1['unique_id'];
            $client_hometown = $businessThird1['hometown'];
            $client_street = $businessThird1['street'];
            $client_home_no = $businessThird1['home_no'];
            $client_phone = $businessThird1['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);
            $client_email = $businessThird1['client_email'];
            $client_gender = $businessThird1['client_gender'];
            $client_date_of_birth = strtr($businessThird1['client_date_of_birth'], '/', '-');
            $client_date_of_birth = date('Y-m-d', strtotime($client_date_of_birth));
            $client_first_file = $businessThird1['user_first_file'];
            
            $client_account_type = 1;
            $client_another_account_status = 0;
            
            $fields = array('client_id_number' => $unique_id, 'client_first_name' => $first_name, 'client_last_name' => $last_name, 'client_email' => $client_email, 'client_phone' => $client_phone, 'client_gender' => $client_gender, 'client_hometown' => $client_hometown, 'client_street' => $client_street, 'client_home_no' => $client_home_no, 'client_file' => $client_first_file, 'client_date_of_birth' => $client_date_of_birth, 'client_account_type' => $client_account_type, 'client_another_account_status' => $client_another_account_status );

//            echo '<pre>'; 
//            print_r($fields); 
//            die();


            $url = 'https://obli-backend.herokuapp.com/webservices/businessThirdClientDetails.php';

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
                //$session_array = array('businessThird1');
               // $this->session->unset_userdata($session_array);
                echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('businessThird1')."'; </script>";
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
                            
                            //$session_array = array('businessThird1');
                           // $this->session->unset_userdata($session_array);
                            echo "<script type='text/javascript'>alert('Your record is rejected, Please try again!'); window.location.href = '".site_url('businessThird1')."'; </script>";
//                            redirect('business1');
                            return FALSE;
                             
                        }else{
                             
//                           $session_array = array('businessThird1');
//                           $this->session->unset_userdata($session_array);

//                             alert('Your record successfully saved!');
//                            die();
                            $this->session->set_userdata('order_id_number', @$clientData->client_reponse_data[1]->order_id_number);
                            echo "<script type='text/javascript'>window.location.href = '".site_url('businessThird2')."';</script>";
                            return FALSE;

//                            redirect('businessThird2');
                         }
                         
                     }
                     else{
                         
                      //  $session_array = array('businessThird1');
                      //  $this->session->unset_userdata($session_array);
                        echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('businessThird1')."'; </script>";
                        return FALSE;
                        
//                         redirect('businessThird1');
                     }
                 }
//                 print_r($orderData->status);
//                 print_r($orderData); die();
                 
            }

            /* API : End */
            
//            redirect('businessThird2');
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
            $this->load->view('website/businessThird/business_third_1_scr');
            $this->load->view('website/footer', $data);
        }
        
    }
    
    function business_third_Form2(){
//        echo '<pre>';
//        print_r($this->session->userdata());die();
        
        if(empty($this->session->userdata('business1')) || empty($this->session->userdata('business2')) || empty($this->session->userdata('businessThird1')) ){
            redirect('business1');
            exit();
        }

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            
            
            $company_name = $data['company_name'];
            $business_type = $data['business_type'];
            $company_id = $data['company_id'];
            $company_address = $data['company_address'];
            
            $Area__c = $data['Area__c'];
            $Business_Field__c = $data['Business_Field__c'];
            
            $contact_person_name = $data['contact_person_name'];
            $contact_person_email = $data['contact_person_email'];
            $contact_person_phone = $data['contact_person_phone'];
            $contact_person_phone = str_replace(["-"], '', $contact_person_phone);
            
            $order_id_number = $this->session->userdata('order_id_number');
            
            
            $businessThird1 = $this->session->userdata('businessThird1');
            
            $unique_id = $businessThird1['unique_id'];
            
            $business_type = $data['business_type'];
             
            if($business_type == 'חברה בע”מ'){
                
                $business_text_eng = 'business ltd';
                
            }else{
                 $business_text_eng = 'licensed dealer';
            }
            
            $first_name = $businessThird1['first_name'];
            $last_name = $businessThird1['last_name'];
            
            $fields = array("Business_Field__c"=>$Business_Field__c,"Area__c"=>$Area__c,"amt_company_name__c" => $company_name,
            "amt_company_address__c" => $company_address, "amt_company_id__c" => $company_id, "amt_company_business_type__c" => $business_text_eng,
            "amt_company_contact_person_email__c" => $contact_person_email, "amt_company_contact_person_name__c" => $contact_person_name, 
            "amt_company_contact_person_phone__c" => $contact_person_phone,'order_id_number__c' => $order_id_number,'flow_number__c'=>5,'client_id_number'=>$unique_id,
            'ref_client_id__c'=>$unique_id,'amt_company_business_type__c'=>$business_text_eng,'form_type_in_text__c'=>'Business','client_first_name__c'=>$first_name,
            'client_last_name__c'=>$last_name,'flow_type__c'=>1,'form_type__c'=>3);
            
            //print_r($fields); die;

//             echo "<pre>"; print_r($fields); 
//             die();

            
            // api call
            $url = 'https://obli-backend.herokuapp.com/webservices/newbusnessthirdordersdetails.php';

              $request = sf_register_record($url,$fields);
             $request = json_decode($request);
             
            //execute post
            $client_c = $request->client_c;
            $err = $request->errors;
            
            $data['error'] = 0;
            
            if(!empty($err)){
                
                $data['error'] = 1;
            
            }
            
            if(!empty($client_c)){
                $data['client_c'] = $client_c;
            }
            
            $newdata = array(
                'businessThird2' => $data
            );

            $this->session->set_userdata($newdata);
            
            
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            redirect('businessThird5');
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
            $this->load->view('website/businessThird/business_third_2_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function business_third_Form3(){
        
//        if(empty($this->session->userdata('business1')) || empty($this->session->userdata('business2')) || empty($this->session->userdata('businessThird1')) || empty($this->session->userdata('businessThird2')) ){
//            redirect('business1');
//            exit();
//        }

        $this->session->set_userdata('flow_number__c','5');


        $prevousnfo = $this->session->userdata('businessThird2');

        $data = $this->input->post(); 
        
        
        if(!empty($data)){
//            echo '<pre>';
            //print_r($data); die;

            $data['startDate'] = strtr($data['startDate'], '/', '-');
            $data['startDate'] = date('Y-m-d', strtotime($data['startDate']));
            
            $data['endDate'] = strtr($data['endDate'], '/', '-');
            $data['endDate'] = date('Y-m-d', strtotime($data['endDate']));

              $order_id_number = $this->session->userdata('order_id_number');
            
            
            $businessThird1 = $this->session->userdata('businessThird1');
            
            $unique_id = $businessThird1['unique_id'];
            
            $new_doc_sign = $data['first_base64_signature'];
            
            
            $first_base64_signature = $data['second_base64_signature'];
            $second_base64_signature = $data['third_base64_signature'];
            $third_base64_sign = $data['third_base64_signature'];
            $req_gur_amt = $data['busineesThird_requested_gurantee_amt'];
            $gur_period_month = $data['gur_period_month'];
            $startDate = $data['startDate'];
            $endDate = $data['endDate'];
            $checkbox2 = $data['checkbox2'];
            $checkbox1 = $data['checkbox1'];
            $btn3_checkbox = $data['btn3_checkbox'];
            $value_check = $data['value_check'];
            
            
            
            // first signature image start
            define('UPLOAD_DIR', 'doc_sign/');
               $img_new = $new_doc_sign;
              
              $img_new1 = str_replace('data:image/png;base64,', '', $img_new);
              $img_new1 = str_replace(' ', '+', $img_new1);
              $data_new1 = base64_decode($img_new1);

              $encoded_string_new1 = $img_new1;
              $imgdata_new1 = base64_decode($encoded_string_new1);
              $mimetype_new1 = $this->getImageMimeType($imgdata_new1);
              // echo $imgdata; die();

              $file_new1 = UPLOAD_DIR . uniqid() . '.'.$mimetype_new1;
              // echo $file; die();
              $success1 = file_put_contents($file_new1, $data_new1);

               $new_doc_sign = base_url().$file_new1;
               
                $new_doc_sign1 = $_SERVER["DOCUMENT_ROOT"].'/'.$file_new1;
            
            
            
             // first signature image start
            define('UPLOAD_DIR', 'doc_sign/');
               $img1 = $first_base64_signature;
              
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

              $first_signature_file = base_url().$file1;
              // $file_path1 = "222";

        // end


        // second signature image start
            define('UPLOAD_SECOND_DIR', 'doc_sign/');
              $img2 = $second_base64_signature;
              
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

              $second_signature_file = base_url().$file2;
              // $file_path2 = "123";

        // end
              
              // third signature image start
            define('UPLOAD_THIRD_DIR', 'doc_sign/');
              $img3 = $third_base64_sign;
              
              $img3 = str_replace('data:image/png;base64,', '', $img3);
              $img3 = str_replace(' ', '+', $img3);
              $data3 = base64_decode($img3);

              $encoded_string3 = $img3;
              $imgdata3 = base64_decode($encoded_string3);
              $mimetype3 = $this->getImageMimeType($imgdata3);
              // echo $imgdata2; die();

              $file3 = UPLOAD_THIRD_DIR . uniqid().rand() . '.'.$mimetype3;
              // echo $file; die();
              $success3 = file_put_contents($file3, $data3);

              $third_signature_file = base_url().$file3;
              // $file_path2 = "123";

        // end
        
        $req_gur_amt = str_replace(',', '', $req_gur_amt);
        
        $flow_type = '1';
        
        if($req_gur_amt > 50000){
            $flow_type = '2';
        }
        
        
        
        // Documents creatiing //
        
        $hometown = $businessThird1['hometown'];
            $street = $businessThird1['street'];
            $home_no = $businessThird1['home_no'];
            
            $first_name = $businessThird1['first_name'];
            $last_name = $businessThird1['last_name'];
            
            $name = $first_name.' '.$last_name;
            
            $client_id = $businessThird1['unique_id'];
            
            $clientAdd = $hometown.','.$street.','.$home_no;
            
            $expdate = $data['expiry_date'];
            
            $expdate2 = $data['expiry_date2'];
        
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
            
            </div>
            <DIV TYPE=HEADER>
                 
            </DIV>
           
            <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>';
            
            
          $html .= '<p style="margin: 10px 0px 0px 0px;" DIR="RTL" CLASS="western"> <FONT FACE="David"><SPAN LANG="he-IL">';
        
        $html .= '(תקנה 5) <br/> <br/>';
            
            
           $html .= "</SPAN></FONT> <FONT FACE='David'><SPAN LANG='he-IL'>  
                                                טופס 1  </SPAN></FONT> <br/>  <br/>";

								 $html .='				<FONT FACE="David"><SPAN LANG="he-IL"> טופס הסכמת לקוח למסירת נתוני אשראי לגביו לנותן האשראי לפי תקנה 5 לתקנות נתוני אשראי, התשע"ח-2017 :</SPAN></FONT><br/><br/>';
												
							 $html .="					<FONT FACE='David'><SPAN LANG='he-IL'> פרטי הלקוח:
 </SPAN></FONT><br/>

												<FONT FACE='David'><SPAN LANG='he-IL'> שם: {{ $name}} כתובת:{{ $clientAdd}}  מס' זהות: {{ $client_id}}</SPAN></FONT><br/><br/>";
           $html .= '<p DIR="RTL" CLASS="western"> <FONT FACE="David"><SPAN LANG="he-IL">
                                                    מצהיר בזה כי אני נותן את הסכמתי לכך שנתוני האשראי לגבי הכלולים במאגר יימסרו ללשכת אשראי לשם עריכת דוח אשראי שיימסר ל " גולדנרוד פיננסים בע"מ", לשם התקשרות בעסקת אשראי או לשם הבטחת קיום העסקה, כמפורט להלן:   
													</SPAN></FONT><br/>
                                                    
                            <p DIR="RTL" CLASS="western"> <FONT FACE="David"><SPAN LANG="he-IL">  עסקת אשראי חדשה – ערבות. </SPAN></FONT> </p> <br/>   
							
							<p DIR="RTL" CLASS="western"> <FONT FACE="David"><SPAN LANG="he-IL"> 
                                                    הסכמתי זו תעמוד בתוקפה עד תאריך  '. $expdate.' ואם העסקה תצא לפועל  עד '. $expdate2.' ולא יאוחר ממועד סיום עסקת האשראי.
                                  </SPAN></FONT></p><br/>      

<p DIR="RTL" CLASS="western"> <FONT FACE="David"><SPAN LANG="he-IL"> 

ידוע לי שנתוני האשראי הכלולים לגביי במאגר כוללים, בין השאר, נתונים לגבי עסקאות אשראי שביצעתי וכן נתונים שונים מכונס הנכסים הרשמי, הוצאה לפועל ובנק ישראל.					

</SPAN></FONT><br/> 			  
                                                    
          <p DIR="RTL" CLASS="western"> <FONT FACE="David"><SPAN LANG="he-IL"><b>     שים לב:
          </b>      </SPAN></FONT></p><br/>                 
                                                    
                                                      <FONT FACE="David"><SPAN LANG="he-IL">
                                                    נתוני האשראי האמורים יוכלו לשמש את לשכת האשראי גם למתן שירותים לנותן האשראי, לרבות דירוג אשראי או ייעוץ לתקופה שהוסכמה לעיל, והכל בכפוף לחוק.

													</SPAN></FONT> <br/><br/>
													
													
												<FONT FACE="David"><SPAN LANG="he-IL">	מסירת המידע תלויה בהסכמתך, ואין אתה חייב לתת את הסכמתך.

                                                  </SPAN></FONT> <br/><br/> ';
                                                   
                                                   
                $html .= '<P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;" LANG="he-IL">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימה דיגיטלית: </SPAN></FONT></P>
            <BR>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$new_doc_sign1.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>';
            
         $html .= '   </BODY>
            </HTML>';
            
            $html = str_replace('{{',' ',$html);
            
            $html = str_replace('}}',' ',$html);
            
            $location_url1 = 'doc_sign/customer_form/';

            $pdf_data1 = $this->pdf($html,$location_url1,2);
            $customer_form_document = $pdf_data1['final_pdf_path'];
            
    //Document Create//
    
    $expdate = explode('/',$expdate);
    
    $expdate = $expdate[2].'-'.$expdate[1].'-'.$expdate[0];
    
     $expdate2 = explode('/',$expdate2);
    
    $expdate2 = $expdate2[2].'-'.$expdate2[1].'-'.$expdate2[0];
    
    
            $fields = array( "client_requested_amount__c" => $req_gur_amt,"Expiration_Date_of_Credit_Data__c"=>$expdate,"End_Date_of_Credit_Transaction__c"=>$expdate2, "client_first_signature_file__c" => $first_signature_file, 
            "client_second_signature_file__c" => $second_signature_file,
            "guarantee_period_start_date__c" => $startDate, "guarantee_period_end_date__c" => $endDate,
            'order_id_number__c' => $order_id_number,'flow_number__c'=>5,'client_id_number'=>$unique_id,'Client__c'=>$prevousnfo['client_c'],
            'customer_credit_data__c'=>'',"first_document_url__c" => $customer_form_document,'Annual_fee__c'=>6.5);
            
            
            $url = 'https://obli-backend.herokuapp.com/webservices/newbusnessthirdordersupdate.php';

              $request = sf_update_record($url,$fields,$prevousnfo['client_c']);
             $request = json_decode($request);
            
             
            //execute post
           
            $err = $request->errors;
            
            $data['error'] = 0;
            
            if(!empty($err)){
                
                $data['error'] = 1;
            
            }
            
            
            
            $newdata = array(
                'businessThird3' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
            
            $this->allDcumentcreateandSaveSF();
            
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            //redirect('businessThird4'); // Flow correcton removed as per request by @idan
            
            redirect('businessThird6');
            
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
            $this->load->view('website/businessThird/business_third_3_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function business_third_Form4(){
//        echo '<pre>';
//        print_r($this->session->userdata());die();

        $data = $this->input->post();
        if(!empty($data)){
            echo '<pre>';
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
            
             $order_id_number = $this->session->userdata('order_id_number');
            
            
            $businessThird1 = $this->session->userdata('businessThird1');
            
            $unique_id = $businessThird1['unique_id'];
            
            
            $ant_first_name = $data['ant_first_name'];
            $ant_last_name = $data['ant_last_name'];
            $ant_unique_id = $data['ant_unique_id'];
            $ant_client_add = $data['ant_client_add'];
            $ant_client_phone = $data['ant_client_phone'];
            $ant_client_phone = str_replace(["-"], '', $ant_client_phone);
            $ant_client_email = $data['ant_client_email'];
            $ant_client_gender = $data['ant_client_gender'];
            $antsec_date_of_birth = strtr($data['antsec_date_of_birth'], '/', '-');
            $antsec_date_of_birth = date('Y-m-d', strtotime($antsec_date_of_birth));
            $ant_req_gur_amt = $data['ant_req_gur_amt'];
            $ant_gur_period_month = $data['ant_gur_period_month'];
            $antstartDate = strtr($data['antstartDate'], '/', '-');
            $antstartDate = date('Y-m-d', strtotime($antstartDate));
            $antendDate = strtr($data['antendDate'], '/', '-');
            $antendDate = date('Y-m-d', strtotime($antendDate));
            $another_user_file = $data['another_user_file'];
            
            if(!empty($antstartDate) && !empty($antendDate)){

                $another_startDate = $antstartDate;
                $another_endDate = $antendDate;

                $an_ts1 = strtotime($another_startDate);
                $an_ts2 = strtotime($another_endDate);

                $an_year1 = date('Y', $an_ts1);
                $an_year2 = date('Y', $an_ts2);

                $an_month1 = date('m', $an_ts1);
                $an_month2 = date('m', $an_ts2);

                $an_diff = (($an_year2 - $an_year1) * 12) + ($an_month2 - $an_month1);

                $ant_lease_period = $an_diff;

            }
            else{
                $ant_lease_period = "";
            }
            
            $prevousnfo = $this->session->userdata('businessThird2');
            
             $fields = array( "another_compnay_first_name__c" => $ant_first_name, "another_compnay_last_name__c" => $ant_last_name, "another_compnay_id__c" => $ant_unique_id,
             "another_compnay_email__c" => $ant_client_email,
             "another_compnay_phone__c" => $ant_client_phone, "another_compnay_address__c" => $ant_client_add, "client_requested_amount__c" => $ant_req_gur_amt, "another_comp_gender__c" => $ant_client_gender,
             "another_compnay_date_birth__c" => $antsec_date_of_birth, "another_compnay_period_month__c" => $ant_lease_period, "another_compnay_file__c" => $another_user_file,
             "another_guarantee_period_start_date__c" => $antstartDate, "another_guarantee_period_end_date__c" => $antendDate,
             'order_id_number__c' => $order_id_number,'client_id_number'=>$unique_id,'Client__c'=>$prevousnfo['client_c']);
            
            $url = 'https://obli-backend.herokuapp.com/webservices/newbusnessthirdordersupdate.php';

              $request = sf_update_record($url,$fields,$prevousnfo['client_c']);
             $request = json_decode($request);
            
             
            //execute post
           
            $err = $request->errors;
            
            $data['error'] = 0;
            
            if(!empty($err)){
                
                $data['error'] = 1;
            
            }
            
            
            $newdata = array(
                'businessThird4' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            redirect('businessThird5');
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
            $this->load->view('website/businessThird/business_third_4_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function business_third_Form5(){
//        echo '<pre>';
//        print_r($this->session->userdata());die();
        
//        if(empty($this->session->userdata('business1')) || empty($this->session->userdata('business2')) || empty($this->session->userdata('businessThird1')) || empty($this->session->userdata('businessThird2')) || empty($this->session->userdata('businessThird3')) ){
//            redirect('business1');
//            exit();
//        }
        
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
            // GR file
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
            
            $order_id_number = $this->session->userdata('order_id_number');
            
            
            $businessThird1 = $this->session->userdata('businessThird1');
            
            $unique_id = $businessThird1['unique_id'];
            
            $prevousnfo = $this->session->userdata('businessThird2');
            
            
            $property_owner_name = $data['property_owner_name'];
            $owner_of_property = $data['owner_of_property'];
            $property_owner_phone = $data['property_owner_phone'];
            $property_owner_phone = str_replace(["-"], '', $property_owner_phone);
            $property_owner_of_email = $data['property_owner_of_email'];
            $property_address = $data['property_address'];
            
             $fields = array( "another_compnay_first_name__c" => $property_owner_name, "another_compnay_id__c" => $owner_of_property,
             "another_compnay_email__c" => $property_owner_of_email,
             "another_compnay_phone__c" => $property_owner_phone, "another_compnay_address__c" => $property_address, "another_compnay_file__c" => $data['gr_company_file'], 'order_id_number__c' => $order_id_number,'client_id_number'=>$unique_id,'Client__c'=>$prevousnfo['client_c']);
            
            $url = 'https://obli-backend.herokuapp.com/webservices/newbusnessthirdordersupdate.php';

              $request = sf_update_record($url,$fields,$prevousnfo['client_c']);
             $request = json_decode($request);
            
             
            //execute post
           
            $err = $request->errors;
            
            $data['error'] = 0;
            
            if(!empty($err)){
                
                $data['error'] = 1;
            
            }
            
            
            $newdata = array(
                'businessThird5' => $data
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
                        $this->load->view('website/businessThird/business_third_5_scr', $form_data);
                        $this->load->view('website/footer', $footer_data);
//                        redirect('business7');
                        return false;  
//                        die();
                    }else{
                        redirect('businessThird3');
                    }
                }
                elseif(@$cmp[1] == 2){
                    redirect('businessThird3');
                }
                else{
                    redirect('businessThird3');
                }
            }
            
//            print_r($this->session->userdata());die();
//            redirect('businessThird6');
        }else{
          
            $this->load->view('website/header');
            $this->load->view('website/businessThird/business_third_5_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function business_third_Form6(){
        
//         echo '<pre>';
//        print_r($this->session->userdata());die();
        
//        if(empty($this->session->userdata('business1')) || empty($this->session->userdata('business2')) || empty($this->session->userdata('businessThird1')) || empty($this->session->userdata('businessThird2')) || empty($this->session->userdata('businessThird3')) || empty($this->session->userdata('businessThird5')) ){
//            redirect('business1');
//            exit();
//        }

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'businessThird6' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
//            redirect('businessThird7');
            
            $businessThird2 = $this->session->userdata('businessThird2');

            if(!empty($businessThird2)){

                $business_type = $businessThird2['business_type'];

                if(!empty($business_type)){
                    if($business_type == 'חברה בע”מ'){

                       redirect('businessThird7');

                    }else{
                        $this->businessThirdAllFormSubmit();
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
            
            
            $order_id_number = $this->session->userdata('order_id_number');
            
            
            $businessThird1 = $this->session->userdata('businessThird1');
            
            $unique_id = $businessThird1['unique_id'];
            
             $first_name = $businessThird1['first_name'];
            $last_name = $businessThird1['last_name'];
            
            $prevousnfo = $this->session->userdata('businessThird2');
           
           $fields = array('order_id_number__c' => $order_id_number,'flow_number__c'=>5,'client_id_number'=>$unique_id,'Client__c'=>$prevousnfo['client_c'],'document_number__c'=>$document_id);
            
            
            $url = 'https://obli-backend.herokuapp.com/webservices/newbusnessthirdordersupdate.php';

              $request = sf_update_record($url,$fields,$prevousnfo['client_c']);
             $request = json_decode($request);
            
             
            //execute post
           
            $err = $request->errors;
            
            $data['error'] = 0;
            
            if(!empty($err)){
                
                $data['error'] = 1;
            
            }
            
           $businessThird3 = $this->session->userdata('businessThird3');
            $req_gur_amt = str_replace(',','',$businessThird3['busineesThird_requested_gurantee_amt']);
                                   
             
//                            redirect('business1');
            
        // CoFace BDI API //
        
        
            	// ofacebdi api call
            	
            	$businessThird2 = $this->session->userdata('businessThird2');
            
            $company_id = $businessThird2['company_id'];
            	
            $dataarray = array('amount'=>'','fname'=>$first_name,'lname'=>$last_name,'uniqueid'=>'513578674','order_id_number'=>$order_id_number);
            	
			$request = $this->BuildXmlRequest($dataarray);
                  $poststring = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body><DoBusinessProcess xmlns="http://tempuri.org/"><req>' . htmlspecialchars($request) . '</req></DoBusinessProcess></soap:Body></soap:Envelope>';

                $ch = curl_init('https://www.bdipersonal.co.il/TEST/BDIOnLWebServiceFront/XMLBDIOnLine.asmx');
                curl_setopt($ch, CURLOPT_URL, 'https://www.bdipersonal.co.il/QA/BDIOnLWebServiceFront/BDIOnLine.asmx');
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $poststring);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: text/xml; charset=utf-8","SOAPAction: http://tempuri.org/DoBusinessProcess", "Content-length: ".strlen($poststring))); 

                // Execute
                  $data1['bdireport'] = curl_exec($ch); 
                  
                  $filename = trim($order_id_number)."_".rand(100,1000).".txt";
                  
                   $file = trim($_SERVER["DOCUMENT_ROOT"])."/website_assets/bdireports/".$filename;
                  
                  $myfile = fopen($file, "w") or die("Unable to open file!");
                  
                    $txt = $data1['bdireport'];
                    
                    
                    fwrite($myfile, $txt);
                    
                   
                    fclose($myfile);
                  
                  
                  $fields = array('order_id_number__c' => $order_id_number,'flow_number__c'=>5,'client_id_number'=>$unique_id,'Client__c'=>$prevousnfo['client_c'],'BDI_Report__c'=>'https://obli.co.il/website_assets/bdireports/'.$filename);
            
            
            $url = 'https://obli-backend.herokuapp.com/webservices/newbusnessthirdordersupdate.php';

              $request = sf_update_record($url,$fields,$prevousnfo['client_c']);
             $request = json_decode($request);
            
             
            //execute post
           
            $err = $request->errors;
            
            $data['error'] = 0;
            
            if(!empty($err)){
                
                $data['error'] = 1;
            
            }
                 
                 curl_close($ch);

            $this->load->view('website/header');
            $this->load->view('website/businessThird/business_third_6_scr',$data1);
            $this->load->view('website/footer', $data);
        }
    }
    
    function business_third_Form7(){

//         echo '<pre>';
//        print_r($this->session->userdata());die();

$is_approved = $this->session->userdata('is_approved');
if($is_approved == 2){
    
    redirect('businessThirdBadResponse');
    
}
        
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
            
            
            $order_id_number = $this->session->userdata('order_id_number');
            
            
            $businessThird1 = $this->session->userdata('businessThird1');
            
            $unique_id = $businessThird1['unique_id'];
            
            $prevousnfo = $this->session->userdata('businessThird2');
            
            
            $gurantee_articles_of_association = $data['gurantee_articles_of_association'];
            $gurantee_certificate = $data['gurantee_certificate'];
            $gurantee_exemption_withholding_tax = $data['gurantee_exemption_withholding_tax'];
            $gurantee_bookkeeping_authorization = $data['gurantee_bookkeeping_authorization'];
            $gurantee_oval_attorney = $data['gurantee_oval_attorney'];
            $gurantee_direct_debit_authorization = $data['gurantee_direct_debit_authorization'];
            
            
            $fields = array( "gurantee_articles_of_association_file__c" => $gurantee_articles_of_association, "gurantee_certificate_file__c" => $gurantee_certificate,
            "gurantee_exemption_withholding_tax_file__c" => $gurantee_exemption_withholding_tax, "gurantee_bookkeeping_authorization_file__c" => $gurantee_bookkeeping_authorization,
            "gurantee_oval_attorney_file__c" => $gurantee_oval_attorney, "gurantee_direct_debit_authorization_file__c" => $gurantee_direct_debit_authorization, 'order_id_number__c' => $order_id_number,'client_id_number'=>$unique_id,
            'Client__c'=>$prevousnfo['client_c']);
            
            $url = 'https://obli-backend.herokuapp.com/webservices/newbusnessthirdordersupdate.php';

              $request = sf_update_record($url,$fields,$prevousnfo['client_c']);
             $request = json_decode($request);
            
             
            //execute post
           
            $err = $request->errors;
            
            $data['error'] = 0;
            
            if(!empty($err)){
                
                $data['error'] = 1;
            
            }

            $newdata = array(
                'businessThird7' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            $this->businessThirdAllFormSubmit();
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
            $this->load->view('website/businessThird/business_third_7_scr');
            $this->load->view('website/footer', $data);
 
        }
    }
    
    function business_third_Form8(){

        $data = $this->input->post();
        
       $file = base64_encode($this->session->userdata('url_user_document'));
       
       $email_url = $this->session->userdata('url_user_document_email');
       
        $this->session->set_userdata('flow_number__c','5');
                   
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
                    redirect('businessThird8');
                }
                else{
//                  $this->session->unset_userdata('businesThird_payment_api_link');
                  //  $this->session->sess_destroy();
                    
                    $this->session->set_userdata('url_user_document',base64_decode($file));
       
                    $this->session->set_userdata('url_user_document_email',$email_url);
       
                    redirect('businessThird9/'.$file.'/'.base64_encode($email_url));
                }
            }
            else{
//                $this->session->unset_userdata('businesThird_payment_api_link');
            //    $this->session->sess_destroy();
                
                $this->session->set_userdata('url_user_document',base64_decode($file));
       
                $this->session->set_userdata('url_user_document_email',$email_url);
                redirect('businessThird9/'.$file.'/'.base64_encode($email_url));
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
            $this->load->view('website/businessThird/business_third_8_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    
    function business_third_Form9(){

        $pdf_url = $this->uri->segment(2);
        $email_url = $this->uri->segment(3);
        
        if(empty($pdf_url))
        {
            redirect('website');
        }

        $pdf_url = base_url(). "doc_sign/rent_document/". base64_decode($pdf_url);
        // echo $pdf_url; die();
        $usr_data['user_data'] = array('pdf_url' => $pdf_url,'email_url'=>base64_decode($email_url));
        
       // print_r($usr_data); die;

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
            $this->load->view('website/businessThird/business_third_9_scr', $usr_data);
            $this->load->view('website/footer', $data);
        /*}*/
    }

    
    function businessThirdAllFormSubmit(){
       
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
            
            $businessThird1 = $this->session->userdata('businessThird1');
            $first_name = $businessThird1['first_name'];
            $last_name = $businessThird1['last_name'];
            $unique_id = $businessThird1['unique_id'];
            $hometown = $businessThird1['hometown'];
            $street = $businessThird1['street'];
            $home_no = $businessThird1['home_no'];
            $client_phone = $businessThird1['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);
            $client_email = $businessThird1['client_email'];
            $client_gender = $businessThird1['client_gender'];
            $client_date_of_birth = strtr($businessThird1['client_date_of_birth'], '/', '-');
            $client_date_of_birth = date('Y-m-d', strtotime($client_date_of_birth));
            $user_first_file = $businessThird1['user_first_file'];

            // order id number
            $order_id_number = $this->session->userdata('order_id_number');
            
            $businessThird2 = $this->session->userdata('businessThird2');
            $company_name = $businessThird2['company_name'];
            $business_type = $businessThird2['business_type'];
            $company_id = $businessThird2['company_id'];
            $company_address = $businessThird2['company_address'];
            
            $Area__c = $businessThird2['Area__c'];
            $Business_Field__c = $businessThird2['Business_Field__c'];
            
            $contact_person_name = $businessThird2['contact_person_name'];
            $contact_person_email = $businessThird2['contact_person_email'];
            $contact_person_phone = $businessThird2['contact_person_phone'];
            $contact_person_phone = str_replace(["-"], '', $contact_person_phone);
            
            $businessThird3 = $this->session->userdata('businessThird3');
            $first_base64_signature = $businessThird3['first_base64_signature'];
            $second_base64_signature = $businessThird3['second_base64_signature'];
            $third_base64_sign = $businessThird3['third_base64_signature'];
            $req_gur_amt = $businessThird3['busineesThird_requested_gurantee_amt'];
            $gur_period_month = $businessThird3['gur_period_month'];
            $startDate = $businessThird3['startDate'];
            $endDate = $businessThird3['endDate'];
            $checkbox2 = $businessThird3['checkbox2'];
            $checkbox1 = $businessThird3['checkbox1'];
            $btn3_checkbox = $businessThird3['btn3_checkbox'];
            $value_check = $businessThird3['value_check'];
            
            $businessThird4 = $this->session->userdata('businessThird4');
//            print_r($business6); 
            $ant_first_name = $businessThird4['ant_first_name'];
            $ant_last_name = $businessThird4['ant_last_name'];
            $ant_unique_id = $businessThird4['ant_unique_id'];
            $ant_client_add = $businessThird4['ant_client_add'];
            $ant_client_phone = $businessThird4['ant_client_phone'];
            $ant_client_phone = str_replace(["-"], '', $ant_client_phone);
            $ant_client_email = $businessThird4['ant_client_email'];
            $ant_client_gender = $businessThird4['ant_client_gender'];
            $antsec_date_of_birth = strtr($businessThird4['antsec_date_of_birth'], '/', '-');
            $antsec_date_of_birth = date('Y-m-d', strtotime($antsec_date_of_birth));
            $ant_req_gur_amt = $businessThird4['ant_req_gur_amt'];
            $ant_gur_period_month = $businessThird4['ant_gur_period_month'];
            $antstartDate = strtr($businessThird4['antstartDate'], '/', '-');
            $antstartDate = date('Y-m-d', strtotime($antstartDate));
            $antendDate = strtr($businessThird4['antendDate'], '/', '-');
            $antendDate = date('Y-m-d', strtotime($antendDate));
            $another_user_file = $businessThird4['another_user_file'];
            
            $payment_api_link = $this->session->userdata('businesThird_payment_api_link');
            
            $businessThird5 = $this->session->userdata('businessThird5');
            $property_owner_name = $businessThird5['property_owner_name'];
            $owner_of_property = $businessThird5['owner_of_property'];
            $property_owner_phone = $businessThird5['property_owner_phone'];
            $property_owner_phone = str_replace(["-"], '', $property_owner_phone);
            $property_owner_of_email = $businessThird5['property_owner_of_email'];
            $property_address = $businessThird5['property_address'];
            
            $b7_company_name = $businessThird5['company_name'];
            $b7_company_address = $businessThird5['company_address'];
            $b7_other_company_name = $businessThird5['other_company_name'];
            // $gur_period_date_range = $business7['gur_period_date_range'] ;
            // $cmpStartDate = $business7['cmpStartDate'] ;
            // $cmpSndDate = $business7['cmpSndDate'] ;
            $company_telephone = $businessThird5['company_telephone'];
            $company_telephone = str_replace(["-"], '', $company_telephone);
            $company_email = $businessThird5['company_email'];
            $gr_company_file = $businessThird5['gr_company_file'];
            $b7_company_id = $businessThird5['company_id'];
            $b7_contact_id = $businessThird5['agent_id'];

        $businessThird7 = $this->session->userdata('businessThird7');
        $gurantee_articles_of_association = $businessThird7['gurantee_articles_of_association'];
        $gurantee_certificate = $businessThird7['gurantee_certificate'];
        $gurantee_exemption_withholding_tax = $businessThird7['gurantee_exemption_withholding_tax'];
        $gurantee_bookkeeping_authorization = $businessThird7['gurantee_bookkeeping_authorization'];
        $gurantee_oval_attorney = $businessThird7['gurantee_oval_attorney'];
        $gurantee_direct_debit_authorization = $businessThird7['gurantee_direct_debit_authorization'];

            // first signature image start
            define('UPLOAD_DIR', 'doc_sign/');
              $img1 = $first_base64_signature;
              
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

              $first_signature_file = base_url().$file1;
              
              $first_signature_file1 = $_SERVER["DOCUMENT_ROOT"].'/'.$file1;
              
              
              // $file_path1 = "222";

        // end


        // second signature image start
            define('UPLOAD_SECOND_DIR', 'doc_sign/');
              $img2 = $second_base64_signature;
              
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

              $second_signature_file = base_url().$file2;
              
              $second_signature_file1 = $_SERVER["DOCUMENT_ROOT"].'/'.$file2;
              // $file_path2 = "123";

        // end
              
              // third signature image start
            define('UPLOAD_THIRD_DIR', 'doc_sign/');
              $img3 = $third_base64_sign;
              
              $img3 = str_replace('data:image/png;base64,', '', $img3);
              $img3 = str_replace(' ', '+', $img3);
              $data3 = base64_decode($img3);

              $encoded_string3 = $img3;
              $imgdata3 = base64_decode($encoded_string3);
              $mimetype3 = $this->getImageMimeType($imgdata3);
              // echo $imgdata2; die();

              $file3 = UPLOAD_THIRD_DIR . uniqid().rand() . '.'.$mimetype3;
              // echo $file; die();
              $success3 = file_put_contents($file3, $data3);

              $third_signature_file = base_url().$file3;
              // $file_path2 = "123";

        // end

            // another lease period getting
            if(!empty($antstartDate) && !empty($antendDate)){

                $another_startDate = $antstartDate;
                $another_endDate = $antendDate;

                $an_ts1 = strtotime($another_startDate);
                $an_ts2 = strtotime($another_endDate);

                $an_year1 = date('Y', $an_ts1);
                $an_year2 = date('Y', $an_ts2);

                $an_month1 = date('m', $an_ts1);
                $an_month2 = date('m', $an_ts2);

                $an_diff = (($an_year2 - $an_year1) * 12) + ($an_month2 - $an_month1);

                $ant_lease_period = $an_diff;

            }
            else{
                $ant_lease_period = "";
            }
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
            // $first_signature_file = "";
            // $second_signature_file = "";
            // $ant_lease_period = "";
            $ant_client_file = $another_user_file;
            // $gr_company_period_month = "";
            $gr_company_url = $gr_company_file;

            if(empty($ant_first_name) && empty($ant_last_name) && empty($ant_unique_id) && empty($ant_client_add) && empty($ant_client_phone) && empty($ant_client_gender) && empty($ant_req_gur_amt) && empty($ant_client_file)) {

                $client_another_account_status = 0;
            }
            else{
                $client_another_account_status = 1;
            }
            // end
            
            // user pdf and link generate (pdf details)
            $date = date("Y-m-d");
            $amount = $req_gur_amt;
            $name = $first_name." ".$last_name;
            $document_number_id = $unique_id;
            $address = $street.", ".$home_no.", ".$hometown;
            $no_of_months = $gur_period_month;
            $file_path = $first_signature_file;
            $document_id = "";
            
            $document_id = $this->session->userdata('order_id_number');
            
            $businessThird3 = $this->session->userdata('businessThird3');
            
            $endDate = date('Y').'-12-31';
           
            if(!empty($businessThird3))
            {
              $endDate = $businessThird3['endDate'];
            }
            
            $businessThird2 = $this->session->userdata('businessThird2');


    $business_type = $businessThird2['business_type'];

    $companyName = $businessThird2['company_name'];

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

           <!-- <P DIR="LTR" CLASS="western" STYLE="margin-left: 3.54in; text-indent: 4.39in">

                <span><FONT FACE="David"><SPAN LANG="he-IL">בכבוד
            רב</SPAN></FONT>,</span>
        </P>-->
            
            <P DIR="LTR" CLASS="western" STYLE="margin-left: 3.54in; text-indent: 4.39in">


                <!--  <FONT FACE="David"><SPAN LANG="he-IL">גולדן</SPAN></FONT>-<FONT FACE="David"><SPAN LANG="he-IL">רוד
            בע</SPAN></FONT>&quot;<FONT FACE="David"><SPAN LANG="he-IL">מ</SPAN></FONT></P>-->
            
<p style="margin: 30px 40px 0px 0px;text-align: center;"><FONT FACE="David">
                                     <b>שם החברה: </b> '.$companyName.' <b>שם החותם: </b> '.$name.' <b>חתימה דיגיטלית:</b>
                                     </FONT> </p>
                                      
            <P DIR="LTR" CLASS="western"><img src="'.$first_signature_file1.'" width="200" height="" STYLE="margin:0 35%; color:red;">
            </P>
            </BODY>
            </HTML>';

           
            $location_url = 'doc_sign/userPdf/';

            $pdf_data = $this->pdf($html,$location_url,2);
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
            <FONT FACE="David"><SPAN LANG="he-IL"> הלוואה למימון עמלת ערבות </SPAN></FONT></P>

            </div>
            <DIV TYPE=HEADER>
                 
            </DIV>
             <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> אני, החתום מטה, '.$name.' בעל ת.ז. מס '.$document_number_id.'מאשר ומצהיר כמפורט להלן:</SPAN></FONT></P>

    
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">1. ידוע לי כי תשלום העמלה לגולדנרוד פיננסים בע"מ, ח.פ. 513578674 (להלן: "גולדנרוד") בגין העמדת הערבות (להלן: "העמלה") באמצעות הלוואה זו ומימון העמלה בדרך של קבלת הלוואה באמצעות טריא פי2פי בע"מ (ח.פ. 515024131 ) או טריא קהילה פיננסית בע"מ (ח.פ. 515928034) (שתי החברות יקראו להלן: "טריא") הן עסקאות נפרדות.  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">  2. אני מצהיר ומאשר שסכום ההלוואה יועבר במישרין לגולדנרוד ובחתימתי על נספח זה אני מסכים לכל תנאי ההלוואה וכן לכל תנאי האתר שבאמצעותו אקבל את ההלוואה ואני מורה לטריא להעביר את סכום ההלוואה כאמור.  </SPAN></FONT></P>
        
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3. אני מאשר שידוע לי שטריא אינה שותפה או ערבה בצורה כלשהי לעסקי גולדנרוד, ואינה צד לעסקה זו, ולפיכך טענות הנוגעות לעמלה או טענות אחרות שעלולות להיות לי כלפי, לרבות בקשר עם העמלה, לא יהוו עילה לאי תשלום ההלוואה ולא יפטרו אותי מתשלום החזרי ההלוואה לטריא. </SPAN></FONT></P>
            <BR>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > שם החברה: '.$name.' חתימה דיגיטלית: </SPAN></FONT></P>
            <BR>
            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$second_signature_file1.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>
 
             
            </BODY>
            </HTML>';

          
            $location_url1 = 'doc_sign/first_document/';

            $pdf_data1 = $this->pdf($html1,$location_url1,2);
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
        
        <!--    <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לבין '.$name.' </SPAN></FONT></P>-->

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
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>6.5%</B> מסכום הערבות. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.3. במקרה של מימוש כתב הערבות ע"י המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית הערב  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לת הלוואה דרך חברת טריא בריבית שנתית קבועה של 6.5% ההלוואה תעמוד לתקופה של 18 חודשים. </SPAN></FONT></P>

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
            <BR>
        
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">  ולראיה באו הצדדים על החתום: </SPAN></FONT></P>

            <BR><P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד (הערבה) </SPAN></FONT></P>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$_SERVER["DOCUMENT_ROOT"].'/website_assets/img/sign1.png" class="img-responsive" style="margin-left: 20px;">

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימה דיגיטלית (הלקוחה)  </SPAN></FONT></P>
            <BR>
            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$second_signature_file1.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

            <BR>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>נספח ב </B></SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>שטר ערבות אישית בהתאם לסעיף 2 להסכם </B></SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> אני הח"מ, מר/גברת: בוריס דוידוב ת.ז. 309224921 , מרח העצמאות 45 , תל אביב, (להלן: " לקוח" או "הח"מ") ערב/ה באופן אישי ובלתי חוזר ומאשר/ת בזה, כדלקמן:</SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>1.</B>ביום 01\12\2020 נכרת הסכם שיפוי (להלן: "ההסכם") בין חברה לקוח עסקי בע"מ, ח.פ 2538875 (להלן: \12\ 1. ביום 01 "הלקוח") לבין גולדנרוד בע"מ (להלן: "החברה"), במסגרתו התחייבה הלקוחה בסעיף 2, לשלם לחברה סכומים הנקובים בהסכם (להלן: "תשלום"), במקרה של מימוש כתב הערבות על ידי המוטב (כמוגדר בהסכם), ב התאם לתנאים המפורטים בסעיף 2 כאמור. </SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>2.</B>ככל שהלקוחה לא תקיים את התחייבותה כאמור בסעיף 2 להסכם, הערב/ה ללקוחה מתחייב/ת באופן אישי ובלתי חוזר, לשלם במקום הלקוחה, כל תשלום שהלקוחה תידרש לשלם לחברה בהתאם למוסכם בין הצדדים ת חת ההסכם. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>3.</B>הערב/ה ללקוחה מתחייב/ת לשלם לחברה את התשלום כאמור, מיד עם דרישתה הראשונה של החברה ו ללא כל תנאי. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>4.</B>פירעון התשלום ייעשה מיד עם דרישת החברה בכתב ולא יאוחר משבעה (7) ימים מיום פניית המוטב ה חוקללו/או לחברה בדרישה לתשלום.</SPAN></FONT></P>

               <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>5.</B>אני הח"מ מאשר/ת כי כל הרישומים בספרי הנהלת החשבונות של החברה לגבי התשלום לחברה, יחשבו נ כונים וישמשו הוכחה מכרעת כלפי וכלפי הלקוח.</SPAN></FONT></P>
               
               <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>6.</B>אני מתחייב/ת, כי אני בעל/ת עניין בלקוח (כמוגדר בחוק [ניירות ערך, תשכ"ח 1968- ]) ולא יראו בי ערב/ה מוגן/ת, ולא תחול עלי כל הגנה שהיא המפורטת בחוק הערבות, תשכ"ז 1967- או על פי כל דין וכי אני מוותר/ת ע ל כל תביעה ו/או טענה כלפי החברה.</SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>7.</B>ידוע לי כי החברה תהא רשאית לצרף ערב/ים נוספים להתחייבות הלקוחה, אולם צירוף ערב/ים נוסף/ים לא י גרעו מתוקף התחייבויותיי כלפי הלקוחה.</SPAN></FONT></P>

            <BR><P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד (הערבה)</SPAN></FONT></P>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$_SERVER["DOCUMENT_ROOT"].'/website_assets/img/sign1.png" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימה דיגיטלית (הלקוחה)</SPAN></FONT></P>
            <BR>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$third_signature_file.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

            <BR>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>נספח ב </B></SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>שטר ערבות אישית בהתאם לסעיף 2 להסכם </B></SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> אני הח"מ, מר/גברת: בוריס דוידוב ת.ז. 309224921 , מרח העצמאות 45 , תל אביב, (להלן: " לקוח" או "הח"מ") ערב/ה באופן אישי ובלתי חוזר ומאשר/ת בזה, כדלקמן:</SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>1.</B>ביום 01\12\2020 נכרת הסכם שיפוי (להלן: "ההסכם") בין חברה לקוח עסקי בע"מ, ח.פ 2538875 (להלן: \12\ 1. ביום 01 "הלקוח") לבין גולדנרוד בע"מ (להלן: "החברה"), במסגרתו התחייבה הלקוחה בסעיף 2, לשלם לחברה סכומים הנקובים בהסכם (להלן: "תשלום"), במקרה של מימוש כתב הערבות על ידי המוטב (כמוגדר בהסכם), ב התאם לתנאים המפורטים בסעיף 2 כאמור. </SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>2.</B>ככל שהלקוחה לא תקיים את התחייבותה כאמור בסעיף 2 להסכם, הערב/ה ללקוחה מתחייב/ת באופן אישי ובלתי חוזר, לשלם במקום הלקוחה, כל תשלום שהלקוחה תידרש לשלם לחברה בהתאם למוסכם בין הצדדים ת חת ההסכם. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>3.</B>הערב/ה ללקוחה מתחייב/ת לשלם לחברה את התשלום כאמור, מיד עם דרישתה הראשונה של החברה ו ללא כל תנאי. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>4.</B>פירעון התשלום ייעשה מיד עם דרישת החברה בכתב ולא יאוחר משבעה (7) ימים מיום פניית המוטב ה חוקללו/או לחברה בדרישה לתשלום.</SPAN></FONT></P>

               <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>5.</B>אני הח"מ מאשר/ת כי כל הרישומים בספרי הנהלת החשבונות של החברה לגבי התשלום לחברה, יחשבו נ כונים וישמשו הוכחה מכרעת כלפי וכלפי הלקוח.</SPAN></FONT></P>
               
               <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>6.</B>אני מתחייב/ת, כי אני בעל/ת עניין בלקוח (כמוגדר בחוק [ניירות ערך, תשכ"ח 1968- ]) ולא יראו בי ערב/ה מוגן/ת, ולא תחול עלי כל הגנה שהיא המפורטת בחוק הערבות, תשכ"ז 1967- או על פי כל דין וכי אני מוותר/ת ע ל כל תביעה ו/או טענה כלפי החברה.</SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>7.</B>ידוע לי כי החברה תהא רשאית לצרף ערב/ים נוספים להתחייבות הלקוחה, אולם צירוף ערב/ים נוסף/ים לא י גרעו מתוקף התחייבויותיי כלפי הלקוחה.</SPAN></FONT></P>

            <BR><P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד (הערבה) </SPAN></FONT></P>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$_SERVER["DOCUMENT_ROOT"].'/website_assets/img/sign1.png" class="img-responsive" style="margin-left: 20px;">

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימה דיגיטלית: </SPAN></FONT></P>
            <BR>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$third_signature_file.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

  
            </BODY>
            </HTML>';

        
            $location_url2 = 'doc_sign/second_document/';

           // $pdf_data2 = $this->pdf($html2,$location_url2);
            $second_document = '';
        // end second
            
   // House Rent Document //
            
    

    $clientID = $document_number_id;
    
    if(empty($company_id))
    {
        $company_id = $clientID;
    }
    
    $signaturepath = $_SERVER["DOCUMENT_ROOT"].'/website_assets/img/sign1.png';    
    $businessThird5 = $this->session->userdata('businessThird5');
    $prop_owner_name = $businessThird5['property_owner_name'];
    $prop_owner_add = $businessThird5['property_address'];
   
            
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
                
                    <FONT FACE="David"><SPAN LANG="he-IL"><B><U>'.$prop_owner_name.'</U></B></SPAN></FONT>
                    <br/>
                    <br/>
                    <FONT FACE="David"><SPAN LANG="he-IL"><B><U>'.$prop_owner_add.'</U></B></SPAN></FONT>
                    
                
            <P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">א</SPAN></FONT>.<FONT FACE="David"><SPAN LANG="he-IL">ג</SPAN></FONT>.<FONT FACE="David"><SPAN LANG="he-IL">נ</SPAN></FONT>.,</P>
            
<P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B> תאריך </B></SPAN></FONT>:</P>
            
<P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">'.$date.'</SPAN></FONT></P>
                
     <!-- <table STYLE="width:100%;">
        <tr>
        
            <td STYLE="text-align:left; width:10%;"></td>
        
            <td DIR="LTR" CLASS="western" STYLE="text-align:right; width:20%;"><FONT FACE="David" ><B><SPAN LANG="he-IL" STYLE=""></SPAN></B></FONT>:
            '.$date.'</td>
                

            <td></td>
            
            <td></td>
                
            
            
         </tr>    
         </table>-->


            <p DIR="RTL" CLASS="western" ALIGN=CENTER STYLE="text-align: center;">

                <FONT FACE="David"><SPAN LANG="he-IL"><B>הנדון</B></SPAN></FONT><B>:
            </B><FONT FACE="David"><SPAN LANG="he-IL"><U><B>ערבות מס</B></U></SPAN></FONT><U><B> '.$document_id.'</B></U>

            </p>

            <OL>

                <LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL"> אנו ערבים בזה כלפיך/ם לתשלום כל סכום עד לסכום כולל של <B><U>'.$amount.'</U></B> ₪ (להלן: "סכום הערבות") שתדרוש/תדרשו מאת <B><U>'.$companyName.'</U></B>  ת.ז <B><U>'.$company_id.'</U></B> (להלן וביחד: "הנערב") בקשר עם ההסכם מיום <B><U>'.$date.'</U></B>, על כל תוספותיו, ככל שיהיו מעת לעת (להלן: <B>"ההסכם"</B>).
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

        $rent_document = $this->pdf($html,$location_url_rent_documnet,1);
        $house_rent_document = $rent_document['final_pdf_path'];
        
        
        $pdf_file = $rent_document['pdf_file'];
        
         $user_link = base_url()."business12/".$pdf_file."/".$property_owner_email;
        
        $user_pdf = $house_rent_document;
        
        $this->session->set_userdata('url_user_document',$pdf_file);
        
        $this->session->set_userdata('url_user_document_email',$user_link);
        
        
        
        $tuplier_dradit = 'N/A'; 
        
       
   
            
 // End of house rent document //
           
            // echo "<pre>"; print_r($pdf_data); print_r($pdf_data1); print_r($pdf_data2);
            // echo $first_document."<br>"; echo $second_document."<br>";
            // die();
            
            if($business_type == 'חברה בע”מ'){
                
                $business_text_eng = 'business ltd';
                
            }else{
                 $business_text_eng = 'licensed dealer';
            }
            
            $Area__c = $businessThird2['Area__c'];
            $Business_Field__c = $businessThird2['Business_Field__c'];
            
            
            $order_id_number = $this->session->userdata('order_id_number');
            
            
            $businessThird1 = $this->session->userdata('businessThird1');
            
            $unique_id = $businessThird1['unique_id'];
            
             $first_name = $businessThird1['first_name'];
            $last_name = $businessThird1['last_name'];
            
            $prevousnfo = $this->session->userdata('businessThird2');
           
           $fields = array('order_id_number__c' => $order_id_number,'flow_number__c'=>5,'client_id_number'=>$unique_id,'Client__c'=>$prevousnfo['client_c'],'document_number__c'=>$document_id);
            
            
            $url = 'https://obli-backend.herokuapp.com/webservices/newbusnessthirdordersupdate.php';

              $request = sf_update_record($url,$fields,$prevousnfo['client_c']);
             $request = json_decode($request);
            
             
            //execute post
           
            $err = $request->errors;
            
            $data['error'] = 0;
            
            if(!empty($err)){
                
                $data['error'] = 1;
            
            }
            
           $businessThird3 = $this->session->userdata('businessThird3');
            $req_gur_amt = str_replace(',','',$businessThird3['busineesThird_requested_gurantee_amt']);
                                   
             
//                            redirect('business1');
            
        // CoFace BDI API //
        
        
            	// ofacebdi api call
            	
            	$businessThird2 = $this->session->userdata('businessThird2');
            
            $company_id = $businessThird2['company_id'];
            	
            $dataarray = array('amount'=>str_replace(',','',$amount),'fname'=>$first_name,'lname'=>$last_name,'uniqueid'=>'513578674','order_id_number'=>$order_id_number);
            	
		/*	$request = $this->BuildXmlRequest($dataarray);
                echo  $poststring = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body><DoBusinessProcess xmlns="http://tempuri.org/"><req>' . htmlspecialchars($request) . '</req></DoBusinessProcess></soap:Body></soap:Envelope>';

                $ch = curl_init('https://www.bdipersonal.co.il/TEST/BDIOnLWebServiceFront/XMLBDIOnLine.asmx');
                curl_setopt($ch, CURLOPT_URL, 'https://www.bdipersonal.co.il/QA/BDIOnLWebServiceFront/BDIOnLine.asmx');
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $poststring);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: text/xml; charset=utf-8","SOAPAction: http://tempuri.org/DoBusinessProcess", "Content-length: ".strlen($poststring))); 

                // Execute
                 $result = curl_exec($ch);*/
                 
                /* 
$arrayResult = json_decode(json_encode(SimpleXML_Load_String($plainXML, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

print_r($arrayResult); die;*/

                 /* $plainXML = $this->mungXML( trim($result) );
                            
                  $paretx_json = json_decode(json_encode(SimpleXML_Load_String(htmlspecialchars_decode($plainXML), 'SimpleXMLElement', LIBXML_NOCDATA)), true);
                  
                  
                $fullhistory = $this->Parse($plainXML);

                //echo $data;
                // Check HTTP status code
                if (!curl_errno($ch)) {
                    switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
                        case 200:  # OK
                             $soap     = simplexml_load_string(htmlspecialchars_decode ($result), 'SimpleXMLElement', LIBXML_NOCDATA);
                            $response = $soap->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->DoBusinessProcessResponse;
                            
                           
                            
                            $plainXML = $this->mungXML( trim($response->DoBusinessProcessResult->asXML()) );
                            
                             $businesshistory = $this->Parse($plainXML);
                            
                            $arrayResult = json_decode(json_encode(SimpleXML_Load_String($plainXML, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

                            
                            
                            $DoBusinessProcessResult = (string) htmlspecialchars_decode ($response->DoBusinessProcessResult->asXML());
                            $data['response'] = '<?xml version="1.0" encoding="utf-8" ?>' . $DoBusinessProcessResult;
                            $procXmlObj = $response->DoBusinessProcessResult->children()->BDIRESPONSE;

                            if($procXmlObj->RECORDS->RECORD->RES_BLOCKS->RES_BLOCK->RES_BLOCK_DATA->ERROR) {//check if has error
                                $data['error_code'] = $error_code = $procXmlObj->RECORDS->RECORD->RES_BLOCKS->RES_BLOCK->RES_BLOCK_DATA->ERROR->ERRORCODE;
                                $data['error_description'] = $error_desc = $procXmlObj->RECORDS->RECORD->RES_BLOCKS->RES_BLOCK->RES_BLOCK_DATA->ERROR->ERRORDESC;

                            }
                            else {
                                //OK..
                            }

                            break;
                    }
                }

                // Close handle
                curl_close($ch);
                
                 // $fullhistory = str_replace('\/','/',$fullhistory);
                 
                  
                 
                  //$businesshistory = str_replace('\/','/',$businesshistory);
                
              

                //return response
               // return $data;
               
              // $data_json_arr = json_encode($arrayResult, JSON_UNESCAPED_UNICODE);
               
               //$paretx_json = json_encode($paretx_json, JSON_UNESCAPED_UNICODE);
		 
		   // $resuldData  = $this->paretix_api_call($fullhistory,$businesshistory);
		  //  echo $resuldData; 
			
			*/
			$session_array = array('business1', 'business2', 'businessThird2', 'businessThird3', 'businessThird4', 'businessThird5', 'businessThird6', 'businessThird7');
            //$this->session->unset_userdata($session_array);
            echo "<script type='text/javascript'>window.location.href = '".site_url('kyc')."'; </script>";
            
            
            return FALSE;

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
        
            
            /* API : End */
        
    }
    
    
 function Parse ($fileContents) {

		//$fileContents= file_get_contents($url);

		$fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);

		$fileContents = trim(str_replace('"', "'", $fileContents));

		$simpleXml = simplexml_load_string($fileContents);

		$json = json_encode($simpleXml,JSON_UNESCAPED_UNICODE);

		return $json;

	}
    
    
    function mungXML($xml)
{
    $obj = SimpleXML_Load_String($xml);
    if ($obj === FALSE) return $xml;

    // GET NAMESPACES, IF ANY
    $nss = $obj->getNamespaces(TRUE);
    if (empty($nss)) return $xml;

    // CHANGE ns: INTO ns_
    $nsm = array_keys($nss);
    foreach ($nsm as $key)
    {
        // A REGULAR EXPRESSION TO MUNG THE XML
        $rgx
        = '#'               // REGEX DELIMITER
        . '('               // GROUP PATTERN 1
        . '\<'              // LOCATE A LEFT WICKET
        . '/?'              // MAYBE FOLLOWED BY A SLASH
        . preg_quote($key)  // THE NAMESPACE
        . ')'               // END GROUP PATTERN
        . '('               // GROUP PATTERN 2
        . ':{1}'            // A COLON (EXACTLY ONE)
        . ')'               // END GROUP PATTERN
        . '#'               // REGEX DELIMITER
        ;
        // INSERT THE UNDERSCORE INTO THE TAG NAME
        $rep
        = '$1'          // BACKREFERENCE TO GROUP 1
        . '_'           // LITERAL UNDERSCORE IN PLACE OF GROUP 2
        ;
        // PERFORM THE REPLACEMENT
        $xml =  preg_replace($rgx, $rep, $xml);
    }

    return $xml;

} // End :: mungXML()
    
    function businessThirdPaymentPage(){
        
//         echo '<pre>';
//        print_r($this->session->userdata());die();
        
        // footer records
        
        redirect('businessThird8');
        
        return false;
        
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);

        $this->load->view('website/header');
        $this->load->view('website/businessThird/business_third_payment_page_scr');
        $this->load->view('website/footer', $data);
        
    }
    
    function pdf($html,$pdf_location,$haspass=''){
        // $file_path = base_url() . "doc_sign/5de0fb3a5b6d21223182045.png";
        // echo $file_path; die();
        // $path = base_url(). 'webservices/vendor/autoload.php';
        $pdfData = array();
        require_once './webservices/vendor/autoload.php';
        // require_once(APPPATH.'../webservices/vendor/autoload.php');
        // echo $path; die();
        $mpdf = new \Mpdf\Mpdf();
        
        $haspass = 2;
        
        if($haspass == 1){
        
        $mpdf->SetProtection(array());
        
        }

        $mpdf->SetDirectionality('rtl');
        $mpdf->autoLangToFont = true;

        // Define a default Landscape page size/format by name
        // $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        // $mpdf=new Mpdf('c','A4','',''); 
        // $mpdf->SetDisplayMode(90);
        $mpdf->SetDisplayMode('fullpage');
        // $mpdf->SetDisplayMode('fullwidth');


        // $date = $document_id = $amount = $name = $address = $document_number_id = $no_of_months = "";
        
        $businessThird1 = $this->session->userdata('businessThird1');
            
            $TZId = $businessThird1['unique_id'];

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
            
            if($haspass == 1){
            
            $mpdf->SetProtection(array(), 'UserPassword', $TZId); //set password
            
            
            }
            
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
                יאוחר משבעה ימים מתאריך התקבל
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
            $final_pdf_path = $this->pdf($html, $pdf_location,2);
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

    

    function business_payment_api() {
        $postForm = $_POST;
        
         $postForm['busineesThird_requested_gurantee_amt'] = str_replace(',', '', $postForm['busineesThird_requested_gurantee_amt']);
        
// print_r($_POST);
// echo $amount = $_POST["req_gur_amt"];
           
            $amount = str_replace(',', '',$_POST["busineesThird_requested_gurantee_amt"]);
            
            
            $diff = 12;
            
            $duration = (($year2 - $year1) * 12) + ($month2 - $month1);
            
            ($duration > 12)? $tax = $duration/12*6/100 : $tax = 0.065;
         
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
            
            $businessThird1 = $this->session->userdata('businessThird1');
            $first_name = $businessThird1['first_name'];
            $last_name = $businessThird1['last_name'];
            $TZId = $businessThird1['unique_id'];
            $street = $businessThird1['street'];
            $home_no = $businessThird1['home_no'];
            $client_gender = $businessThird1['client_gender'];
            
            if($client_gender == "זכר"){
                $client_gender = 1;
            }
            else{
                $client_gender = 2;
            }
            
            $client_date_of_birth = strtr($businessThird1['client_date_of_birth'], '/', '-');
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
            
            
            $client_phone = $businessThird1['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);

            $client_phone;
            $client_email = $businessThird1['client_email'];
            //$client_date_of_birth = $business3['client_date_of_birth'];

            // print_r($this->session->userdata('business3'));
            // print_r($this->session->userdata('business4'));
            //die();
            $newdata = array(
                'businessThird3' => $postForm
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
            
            //Amount always send 20k on taraya Idan 02 Marh 20 //
            
                $amount1 = 20000;
                
             // Assigned 20000 successfully//
            
            $api_data = array("OrgId" => 10069,"FirstName" => "$first_name","LastName" => "$last_name","TZ" => "$TZId","Cell" => "$client_phone","Email"=> "$client_email","Street" => "$street","HouseNum"=> "$home_no","City" => "תל אביב","Sex" => $client_gender,"Birthdate_y" => "$client_year","Birthdate_m" => "$client_month","Birthdate_d" => "$client_day","Amount" => $amount1 ,"Duration" => $diff,"Product" => "מימון עמלה","OrderId" => "14XA24F","SuccessUrl" => "https://obli.co.il/business3PaymentSuccess","FailureUrl" => "https://obli.co.il/business3PaymentFailed","AutoApprove"=> 0);
            
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
              CURLOPT_POSTFIELDS => "{\n\"OrgId\" : 10069,\n\"FirstName\" : \"$first_name\",\n\"LastName\" : \"$last_name\",\n\"TZ\" : \"$TZId\",\n\"Cell\" : \"$client_phone\",\n\"Email\": \"$client_email\",\n\"Street\" : \"$street\",\n\"HouseNum\": \"$home_no\",\n\"City\" : \"תל אביב\",\n\"Sex\" : $client_gender,\n\"Birthdate_y\" : \"$client_year\",\n\"Birthdate_m\" : \"$client_month\",\n\"Birthdate_d\" : \"$client_day\",\n\"Amount\" : $amount1 ,\n\"Duration\" : $diff,\n\"Product\" : \"מימון עמלה\",\n\"OrderId\" : \"14XA24F\",\n\"SuccessUrl\" : \"https://obli.co.il/business3PaymentSuccess\",\n\"FailureUrl\" : \"https://obli.co.il/business3PaymentFailed\",\n\"AutoApprove\": 0\n}",
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
                $log_data = array('tz_id' => $TZId, 'firstname' => $first_name, 'lastname' => $last_name, 'form_text' => 'Business Third', 'payment_url' => $this->config->item('payment_url'), 'request_data' => json_encode($api_data), 'error_data' => $err, 'created_at' => date('Y-m-d H:i:s') );
                 $this->project_model->insert_data('check_payment_api_response', $log_data);
                // end 
                 
              // echo "cURL Error #:" . $err;
//              $form_data['data'] = array('status' => 'false');
                $responsePostData = array('status'=>'false','msg'=>'failed!');
                echo json_encode($responsePostData);
            } else {
                 
                // log error insert in table
                $log_data = array('tz_id' => $TZId, 'firstname' => $first_name, 'lastname' => $last_name, 'form_text' => 'Business Third', 'payment_url' => $this->config->item('payment_url'), 'request_data' => json_encode($api_data), 'response_data' => $response, 'created_at' => date('Y-m-d H:i:s') );
                 $this->project_model->insert_data('check_payment_api_response', $log_data);
                // end 
                 
//                print_r($response); 
                $res = json_decode($response);
//                print_r($res);
                
                if(!empty($res->iframe->mpiHostedPageUrl)){
//                    echo $res->iframe->mpiHostedPageUrl;
                    $this->session->set_userdata(array(
                      'businesThird_payment_api_link' => $res->iframe->mpiHostedPageUrl
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
        
        $postForm['busineesThird_requested_gurantee_amt'] = str_replace(',', '', $postForm['busineesThird_requested_gurantee_amt']);

            // print_r($this->session->userdata('business3'));
            // print_r($this->session->userdata('business4'));
            //die();
            $newdata = array(
                'businessThird3' => $postForm
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);

            
    }
    
    function businessThirdBadResponse(){
        
        
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

            $data['clientdetails'] = $this->session->userdata('businessThird1');

            $this->load->view('website/header');
            $this->load->view('website/businessThird/business_third_bad_response',$data);
            $this->load->view('website/footer', $data);
        
        
    }
    
    function business3PaymentSuccess(){
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
        
        redirect('businessThird8');
    }
    
    function business3PaymentFailed(){
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
    
    
    
    function BuildXmlRequest($data) 
        { 
            
            //520000118
            
            return '<?xml version="1.0" encoding="utf-8" ?>'
                    . '<BDIREQUEST>'
                        .   '<REFERENCE>Ref123456</REFERENCE>'
                        .   '<REQIDENTITIES>'
                                .   '<IDENTITY>'
                                    .   '<USER>WS_GOLD_1212</USER>'
                                    .   '<PWS>D6PBCTKB</PWS>'
                                    .   '<TERMID>513578674</TERMID>'
                                    .   '<FNAME>'.$data["fname"].'</FNAME>'
                                    .   '<LNAME>'.$data["lname"].'</LNAME>'
                                    .   '<REQPURPOSE>1</REQPURPOSE>'
                                    .   '<CreditProviderCode>RGNT0025</CreditProviderCode>'
                                .   '</IDENTITY>'
                        .   '</REQIDENTITIES>'

                        .   '<REQTYPES>'
                                .   '<REQTYPE>ORAGENWS10</REQTYPE>'
                        .   '</REQTYPES>'

                        .   '<QUERIES>'
                                .   '<QUERY>'
                                    .   '<REC_REFERENCE></REC_REFERENCE>'
                                    .   '<IDTYPE>03</IDTYPE>'
                                    .   '<ID>'.$data["uniqueid"].'</ID>'
                                    .   '<CCODE>212</CCODE>'
                                    .   '<BANKID>0</BANKID>'
                                    .   '<BRANCHID>0</BRANCHID>'
                                    .   '<ACCOUNTNUM>0</ACCOUNTNUM>'
                                    .   '<RECVALUE>'.$data["amount"].'</RECVALUE>'
                                    .   '<NAME>'
                                        .   '<FIRST>'.$data["fname"].'</FIRST>'
                                        .   '<LAST>'.$data["lname"].'</LAST>'
                                    .   '</NAME>'
                                .   '</QUERY>'
                        .   '</QUERIES>'

                    . '</BDIREQUEST>';
        }
        
        
        
        
  function allDcumentcreateandSaveSF(){
       

          
            $business1 = $this->session->userdata('business1');
            $guarantee_type = $business1['guarantee_type'];
            
            $business2 = $this->session->userdata('business2');
            $preferred_route = $business2['preferred_route'];
            
            $businessThird1 = $this->session->userdata('businessThird1');
            $first_name = $businessThird1['first_name'];
            $last_name = $businessThird1['last_name'];
            $unique_id = $businessThird1['unique_id'];
            $hometown = $businessThird1['hometown'];
            $street = $businessThird1['street'];
            $home_no = $businessThird1['home_no'];
            $client_phone = $businessThird1['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);
            $client_email = $businessThird1['client_email'];
            $client_gender = $businessThird1['client_gender'];
            $client_date_of_birth = strtr($businessThird1['client_date_of_birth'], '/', '-');
            $client_date_of_birth = date('Y-m-d', strtotime($client_date_of_birth));
            $user_first_file = $businessThird1['user_first_file'];

            // order id number
            $order_id_number = $this->session->userdata('order_id_number');
            
            $businessThird2 = $this->session->userdata('businessThird2');
            $company_name = $businessThird2['company_name'];
            $business_type = $businessThird2['business_type'];
            $company_id = $businessThird2['company_id'];
            $company_address = $businessThird2['company_address'];
            
            $Area__c = $businessThird2['Area__c'];
            $Business_Field__c = $businessThird2['Business_Field__c'];
            
            $contact_person_name = $businessThird2['contact_person_name'];
            $contact_person_email = $businessThird2['contact_person_email'];
            $contact_person_phone = $businessThird2['contact_person_phone'];
            $contact_person_phone = str_replace(["-"], '', $contact_person_phone);
            
            $businessThird3 = $this->session->userdata('businessThird3');
            $first_base64_signature = $businessThird3['first_base64_signature'];
            $second_base64_signature = $businessThird3['second_base64_signature'];
            $third_base64_sign = $businessThird3['third_base64_signature'];
            $req_gur_amt = $businessThird3['busineesThird_requested_gurantee_amt'];
            $gur_period_month = $businessThird3['gur_period_month'];
            $startDate = $businessThird3['startDate'];
            $endDate = $businessThird3['endDate'];
            $checkbox2 = $businessThird3['checkbox2'];
            $checkbox1 = $businessThird3['checkbox1'];
            $btn3_checkbox = $businessThird3['btn3_checkbox'];
            $value_check = $businessThird3['value_check'];
            
            $businessThird4 = $this->session->userdata('businessThird4');
//            print_r($business6); 
            $ant_first_name = $businessThird4['ant_first_name'];
            $ant_last_name = $businessThird4['ant_last_name'];
            $ant_unique_id = $businessThird4['ant_unique_id'];
            $ant_client_add = $businessThird4['ant_client_add'];
            $ant_client_phone = $businessThird4['ant_client_phone'];
            $ant_client_phone = str_replace(["-"], '', $ant_client_phone);
            $ant_client_email = $businessThird4['ant_client_email'];
            $ant_client_gender = $businessThird4['ant_client_gender'];
            $antsec_date_of_birth = strtr($businessThird4['antsec_date_of_birth'], '/', '-');
            $antsec_date_of_birth = date('Y-m-d', strtotime($antsec_date_of_birth));
            $ant_req_gur_amt = $businessThird4['ant_req_gur_amt'];
            $ant_gur_period_month = $businessThird4['ant_gur_period_month'];
            $antstartDate = strtr($businessThird4['antstartDate'], '/', '-');
            $antstartDate = date('Y-m-d', strtotime($antstartDate));
            $antendDate = strtr($businessThird4['antendDate'], '/', '-');
            $antendDate = date('Y-m-d', strtotime($antendDate));
            $another_user_file = $businessThird4['another_user_file'];
            
            $payment_api_link = $this->session->userdata('businesThird_payment_api_link');
            
            $businessThird5 = $this->session->userdata('businessThird5');
            $property_owner_name = $businessThird5['property_owner_name'];
            $owner_of_property = $businessThird5['owner_of_property'];
            $property_owner_phone = $businessThird5['property_owner_phone'];
            $property_owner_phone = str_replace(["-"], '', $property_owner_phone);
            $property_owner_of_email = $businessThird5['property_owner_of_email'];
            $property_address = $businessThird5['property_address'];
            
            $b7_company_name = $businessThird5['company_name'];
            $b7_company_address = $businessThird5['company_address'];
            $b7_other_company_name = $businessThird5['other_company_name'];
            // $gur_period_date_range = $business7['gur_period_date_range'] ;
            // $cmpStartDate = $business7['cmpStartDate'] ;
            // $cmpSndDate = $business7['cmpSndDate'] ;
            $company_telephone = $businessThird5['company_telephone'];
            $company_telephone = str_replace(["-"], '', $company_telephone);
            $company_email = $businessThird5['company_email'];
            $gr_company_file = $businessThird5['gr_company_file'];
            $b7_company_id = $businessThird5['company_id'];
            $b7_contact_id = $businessThird5['agent_id'];

        $businessThird7 = $this->session->userdata('businessThird7');
        $gurantee_articles_of_association = $businessThird7['gurantee_articles_of_association'];
        $gurantee_certificate = $businessThird7['gurantee_certificate'];
        $gurantee_exemption_withholding_tax = $businessThird7['gurantee_exemption_withholding_tax'];
        $gurantee_bookkeeping_authorization = $businessThird7['gurantee_bookkeeping_authorization'];
        $gurantee_oval_attorney = $businessThird7['gurantee_oval_attorney'];
        $gurantee_direct_debit_authorization = $businessThird7['gurantee_direct_debit_authorization'];

            // first signature image start
            define('UPLOAD_DIR', 'doc_sign/');
              $img1 = $first_base64_signature;
              
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

              $first_signature_file = base_url().$file1;
              // $file_path1 = "222";

        // end


        // second signature image start
            define('UPLOAD_SECOND_DIR', 'doc_sign/');
              $img2 = $second_base64_signature;
              
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

              $second_signature_file = base_url().$file2;
              
              $second_signature_file1 =$_SERVER["DOCUMENT_ROOT"].'/'.$file2;
              
              // $file_path2 = "123";

        // end
              
              // third signature image start
           /* define('UPLOAD_THIRD_DIR', 'doc_sign/');
              $img3 = $third_base64_sign;
              
              $img3 = str_replace('data:image/png;base64,', '', $img3);
              $img3 = str_replace(' ', '+', $img3);
              $data3 = base64_decode($img3);

              $encoded_string3 = $img3;
              $imgdata3 = base64_decode($encoded_string3);
              $mimetype3 = $this->getImageMimeType($imgdata3);
              // echo $imgdata2; die();

              $file3 = UPLOAD_THIRD_DIR . uniqid().rand() . '.'.$mimetype3;
              // echo $file; die();
              $success3 = file_put_contents($file3, $data3);*/

              $third_signature_file = ''; // base_url().$file3;
              // $file_path2 = "123";

        // end

            // another lease period getting
            if(!empty($antstartDate) && !empty($antendDate)){

                $another_startDate = $antstartDate;
                $another_endDate = $antendDate;

                $an_ts1 = strtotime($another_startDate);
                $an_ts2 = strtotime($another_endDate);

                $an_year1 = date('Y', $an_ts1);
                $an_year2 = date('Y', $an_ts2);

                $an_month1 = date('m', $an_ts1);
                $an_month2 = date('m', $an_ts2);

                $an_diff = (($an_year2 - $an_year1) * 12) + ($an_month2 - $an_month1);

                $ant_lease_period = $an_diff;

            }
            else{
                $ant_lease_period = "";
            }
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
            // $first_signature_file = "";
            // $second_signature_file = "";
            // $ant_lease_period = "";
            $ant_client_file = $another_user_file;
            // $gr_company_period_month = "";
            $gr_company_url = $gr_company_file;

            if(empty($ant_first_name) && empty($ant_last_name) && empty($ant_unique_id) && empty($ant_client_add) && empty($ant_client_phone) && empty($ant_client_gender) && empty($ant_req_gur_amt) && empty($ant_client_file)) {

                $client_another_account_status = 0;
            }
            else{
                $client_another_account_status = 1;
            }
            // end
            
            // user pdf and link generate (pdf details)
            $date = date("d-m-Y");
            $amount = $req_gur_amt;
            $name = $first_name." ".$last_name;
            $document_number_id = $unique_id;
            $address = $street.", ".$home_no.", ".$hometown;
            $no_of_months = $gur_period_month;
            $file_path = $_SERVER["DOCUMENT_ROOT"].'/'.$file1;
            $document_id = "";
            
            $document_id = $this->session->userdata('order_id_number');
            
            $businessThird3 = $this->session->userdata('businessThird3');
            
            $endDate = date('Y').'-12-31';
           
            if(!empty($businessThird3))
            {
              $endDate = $businessThird3['endDate'];
            }
            
            $endDate = explode('-',$endDate);
            
            $endDate = $endDate[2].'-'.$endDate[1].'-'.$endDate[0];
            
            
            $startDate_m_Y = explode('-',$startDate);
            
            $startDate = $startDate_m_Y[2].'-'.$startDate_m_Y[1].'-'.$startDate_m_Y[0];
            
            $businessThird2 = $this->session->userdata('businessThird2');


    $business_type = $businessThird2['business_type'];

    $companyName = $businessThird2['company_name'];
    
    
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

          <!--  <P DIR="LTR" CLASS="western" STYLE="margin-left: 3.54in; text-indent: 4.39in">

                <span><FONT FACE="David"><SPAN LANG="he-IL">בכבוד
            רב</SPAN></FONT>,</span>
        </P> -->
        
            
            
            <P DIR="LTR" CLASS="western" STYLE="margin-left: 3.54in; text-indent: 4.39in">


                  <!--<FONT FACE="David"><SPAN LANG="he-IL">גולדן</SPAN></FONT>-<FONT FACE="David"><SPAN LANG="he-IL">רוד
            בע</SPAN></FONT>&quot;<FONT FACE="David"><SPAN LANG="he-IL">מ</SPAN></FONT></P>-->
            
<p style="margin: 30px 40px 0px 0px;text-align: center;">
                                    <FONT FACE="David"> <b>שם החברה: </b> '.$companyName.' <b>שם החותם: </b> '.$name.' <b>חתימה דיגיטלית:</b>
                                     </FONT> </p>
                                      
            <P DIR="LTR" CLASS="western"><img src="'.$second_signature_file.'" width="200" height="" STYLE="margin:0 35%; color:red;">
            </P>
            </BODY>
            </HTML>';
        
            $location_url = 'doc_sign/userPdf/';

            $pdf_data = $this->pdf($html,$location_url,2);
            $final_pdf_path = $pdf_data['final_pdf_path'];
            $pdf_file = $pdf_data['pdf_file'];
            // echo "<pre>"; print_r($pdf_data)."<br>"; echo $final_pdf_path."<br>"; echo $pdf_file;
            // die();
            
            $property_owner_email = "satendra.tectum@gmail.com";
            $user_link = base_url()."business12/".base64_encode($pdf_file)."/".base64_encode($property_owner_email) ;
            $user_pdf = $final_pdf_path;

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
                </SPAN></FONT> <U><FONT FACE="David"><SPAN LANG="he-IL">'.$startDate.'</SPAN></FONT></U>, <FONT FACE="David"><SPAN LANG="he-IL">על כל
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
            המדד שפורסם ביום </SPAN></FONT><U>'.$startDate_m_Y[0].'</U> <FONT FACE="David"><SPAN LANG="he-IL">בגין
            חודש </SPAN></FONT><U>'.$startDate_m_Y[1].'</U> <SPAN LANG="he-IL"> <FONT FACE="David"><SPAN LANG="he-IL">שינה</FONT> </SPAN></P>
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

           <!-- <P DIR="LTR" CLASS="western" STYLE="margin-left: 3.54in; text-indent: 4.39in">

                <span><FONT FACE="David"><SPAN LANG="he-IL">בכבוד
            רב</SPAN></FONT>,</span>
        </P>-->
            
            <P DIR="LTR" CLASS="western" STYLE="margin-left: 3.54in; text-indent: 4.39in">


                <!--  <FONT FACE="David"><SPAN LANG="he-IL">גולדן</SPAN></FONT>-<FONT FACE="David"><SPAN LANG="he-IL">רוד
            בע</SPAN></FONT>&quot;<FONT FACE="David"><SPAN LANG="he-IL">מ</SPAN></FONT></P>-->
            
<p style="margin: 30px 40px 0px 0px;text-align: center;"><FONT FACE="David">
                                     <b>שם החברה: </b> '.$companyName.' <b>שם החותם: </b> '.$name.' <b>חתימה דיגיטלית:</b>
                                     </FONT> </p>
                                      
            <P DIR="LTR" CLASS="western"><img src="'.$file_path.'" width="200" height="" STYLE="margin:0 35%; color:red;">
            </P>
            </BODY>
            </HTML>';

           
            $location_url = 'doc_sign/userPdf/';

            $pdf_data = $this->pdf($html,$location_url,2);
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
            <FONT FACE="David"><SPAN LANG="he-IL"> הלוואה למימון עמלת ערבות </SPAN></FONT></P>

            </div>
            <DIV TYPE=HEADER>
                 
            </DIV>
             <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> אני, החתום מטה, '.$name.' בעל ת.ז. מס '.$document_number_id.'מאשר ומצהיר כמפורט להלן:</SPAN></FONT></P>

    
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">1. ידוע לי כי תשלום העמלה לגולדנרוד פיננסים בע"מ, ח.פ. 513578674 (להלן: "גולדנרוד") בגין העמדת הערבות (להלן: "העמלה") באמצעות הלוואה זו ומימון העמלה בדרך של קבלת הלוואה באמצעות טריא פי2פי בע"מ (ח.פ. 515024131 ) או טריא קהילה פיננסית בע"מ (ח.פ. 515928034) (שתי החברות יקראו להלן: "טריא") הן עסקאות נפרדות.  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">  2. אני מצהיר ומאשר שסכום ההלוואה יועבר במישרין לגולדנרוד ובחתימתי על נספח זה אני מסכים לכל תנאי ההלוואה וכן לכל תנאי האתר שבאמצעותו אקבל את ההלוואה ואני מורה לטריא להעביר את סכום ההלוואה כאמור.  </SPAN></FONT></P>
        
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3. אני מאשר שידוע לי שטריא אינה שותפה או ערבה בצורה כלשהי לעסקי גולדנרוד, ואינה צד לעסקה זו, ולפיכך טענות הנוגעות לעמלה או טענות אחרות שעלולות להיות לי כלפי, לרבות בקשר עם העמלה, לא יהוו עילה לאי תשלום ההלוואה ולא יפטרו אותי מתשלום החזרי ההלוואה לטריא. </SPAN></FONT></P>
            <BR>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > שם החברה: '.$name.' חתימה דיגיטלית: </SPAN></FONT></P>
            <BR>
            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$second_signature_file1.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>
 
             
            </BODY>
            </HTML>';

          
            $location_url1 = 'doc_sign/first_document/';

            $pdf_data1 = $this->pdf($html1,$location_url1,2);
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
                    P.western { font-family: "Times New Roman", serif; font-size: 22px; }
                    P.cjk { font-family: "Times New Roman"; font-size: 22px; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 22px }
                    .text_color{
                        color: #323474
                    }

                  
                   

                </STYLE>
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">';
          
         
            /*<div style="text-align: center;border-bottom: 1px solid black; padding: 10px; margin-top: -150px;">
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
            <FONT FACE="David"><SPAN LANG="he-IL">    בין '.$company_name.'      ח.פ. '.$company_id.' (להלן: "הערב")

                                   <BR>
                                     

                                  מ '.$company_address.' <br>   </SPAN></FONT></P>

           
            <BR>
            <BR>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">  הואיל והערב עוסקת במתן שירותי אשראי והינה בעלת רישיון למתן אשראי כהגדרתו בחוק הפיקוח על  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> שירותים פיננסיים (שירותים פיננסיים מוסדיים), התשע"ו-2016;  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> והואוהואיל והערב הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו <B>'.$order_id_number.'</B> (להלן: "כתב הערבות"), </SPAN></FONT></P>

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
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>6.5%</B> מסכום הערבות. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.3. במקרה של מימוש כתב הערבות ע"י המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית הערב  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> ת הלוואה דרך חברת טריא בריבית שנתית קבועה של 6.5% ההלוואה תעמוד לתקופה של 18 חודשים. </SPAN></FONT></P>

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
            <BR>
        
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">  ולראיה באו הצדדים על החתום: </SPAN></FONT></P>

            <BR><P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד (הערבה) </SPAN></FONT></P>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.base_url().'website_assets/img/sign_1.png" class="img-responsive" style="margin-left: 20px;">

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימה דיגיטלית (הלקוחה)  </SPAN></FONT></P>
            <BR>
            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$second_signature_file.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

            <BR>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>נספח ב </B></SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>שטר ערבות אישית בהתאם לסעיף 2 להסכם </B></SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
             <FONT FACE="David"><SPAN LANG="he-IL"> אני הח"מ, מר/גברת: '.$name.' ת.ז. '.$unique_id.' , '.$address.', (להלן: " לקוח" או
                                    "הח"מ") ערב/ה באופן אישי ובלתי חוזר ומאשר/ת בזה, כדלקמן:
                                   
									
									</SPAN></FONT></P>
									
									
			 <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>1.</B>                                     סכומים הנקובים בהסכם (להלן: "תשלום"), במקרה של מימוש כתב הערבות על ידי המוטב (כמוגדר בהסכם),
                                    ב
                                    התאם לתנאים המפורטים בסעיף 2 כאמור </SPAN></FONT></P>
           
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>2.</B>ככל שהלקוחה לא תקיים את התחייבותה כאמור בסעיף 2 להסכם, הערב/ה ללקוחה מתחייב/ת באופן אישי ובלתי חוזר, לשלם במקום הלקוחה, כל תשלום שהלקוחה תידרש לשלם לחברה בהתאם למוסכם בין הצדדים ת חת ההסכם. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>3.</B>הערב/ה ללקוחה מתחייב/ת לשלם לחברה את התשלום כאמור, מיד עם דרישתה הראשונה של החברה ו ללא כל תנאי. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>4.</B>פירעון התשלום ייעשה מיד עם דרישת החברה בכתב ולא יאוחר משבעה (7) ימים מיום פניית המוטב ה חוקללו/או לחברה בדרישה לתשלום.</SPAN></FONT></P>

               <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>5.</B>אני הח"מ מאשר/ת כי כל הרישומים בספרי הנהלת החשבונות של החברה לגבי התשלום לחברה, יחשבו נ כונים וישמשו הוכחה מכרעת כלפי וכלפי הלקוח.</SPAN></FONT></P>
               
               <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>6.</B>אני מתחייב/ת, כי אני בעל/ת עניין בלקוח (כמוגדר בחוק [ניירות ערך, תשכ"ח 1968- ]) ולא יראו בי ערב/ה מוגן/ת, ולא תחול עלי כל הגנה שהיא המפורטת בחוק הערבות, תשכ"ז 1967- או על פי כל דין וכי אני מוותר/ת ע ל כל תביעה ו/או טענה כלפי החברה.</SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>7.</B>ידוע לי כי החברה תהא רשאית לצרף ערב/ים נוספים להתחייבות הלקוחה, אולם צירוף ערב/ים נוסף/ים לא י גרעו מתוקף התחייבויותיי כלפי הלקוחה.</SPAN></FONT></P>

            <BR><P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד (הערבה)</SPAN></FONT></P>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.base_url().'website_assets/img/sign_1.png" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימה דיגיטלית (הלקוחה)</SPAN></FONT></P>
            <BR>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$third_signature_file.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

            <BR>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>נספח ב </B></SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>שטר ערבות אישית בהתאם לסעיף 2 להסכם </B></SPAN></FONT></P>
            
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
             <FONT FACE="David"><SPAN LANG="he-IL"> אני הח"מ, מר/גברת: '.$name.' ת.ז. '.$unique_id.' , '.$address.', (להלן: " לקוח" או
                                    "הח"מ") ערב/ה באופן אישי ובלתי חוזר ומאשר/ת בזה, כדלקמן:
                                   
									
									</SPAN></FONT></P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>1.</B>     ביום '. date("d/m/Y").' נכרת הסכם שיפוי (להלן: "ההסכם") בין '.$company_name.', ח.פ '.$company_id.' (להלן: \12\ 1. ביום 01
                                    "הלקוח") לבין גולדנרוד בע"מ (להלן: "החברה"), במסגרתו התחייבה הלקוחה בסעיף 2, לשלם לחברה
                                    סכומים הנקובים בהסכם (להלן: "תשלום"), במקרה של מימוש כתב הערבות על ידי המוטב (כמוגדר בהסכם),
                                    ב
                                    התאם לתנאים המפורטים בסעיף 2 כאמור                              
                                     </SPAN></FONT></P>
           
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>2.</B>ככל שהלקוחה לא תקיים את התחייבותה כאמור בסעיף 2 להסכם, הערב/ה ללקוחה מתחייב/ת באופן אישי ובלתי חוזר, לשלם במקום הלקוחה, כל תשלום שהלקוחה תידרש לשלם לחברה בהתאם למוסכם בין הצדדים ת חת ההסכם. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>3.</B>הערב/ה ללקוחה מתחייב/ת לשלם לחברה את התשלום כאמור, מיד עם דרישתה הראשונה של החברה ו ללא כל תנאי. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>4.</B>פירעון התשלום ייעשה מיד עם דרישת החברה בכתב ולא יאוחר משבעה (7) ימים מיום פניית המוטב ה חוקללו/או לחברה בדרישה לתשלום.</SPAN></FONT></P>

               <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>5.</B>אני הח"מ מאשר/ת כי כל הרישומים בספרי הנהלת החשבונות של החברה לגבי התשלום לחברה, יחשבו נ כונים וישמשו הוכחה מכרעת כלפי וכלפי הלקוח.</SPAN></FONT></P>
               
               <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>6.</B>אני מתחייב/ת, כי אני בעל/ת עניין בלקוח (כמוגדר בחוק [ניירות ערך, תשכ"ח 1968- ]) ולא יראו בי ערב/ה מוגן/ת, ולא תחול עלי כל הגנה שהיא המפורטת בחוק הערבות, תשכ"ז 1967- או על פי כל דין וכי אני מוותר/ת ע ל כל תביעה ו/או טענה כלפי החברה.</SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>7.</B>ידוע לי כי החברה תהא רשאית לצרף ערב/ים נוספים להתחייבות הלקוחה, אולם צירוף ערב/ים נוסף/ים לא י גרעו מתוקף התחייבויותיי כלפי הלקוחה.</SPAN></FONT></P>

            <BR><P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד (הערבה) </SPAN></FONT></P>

            <DIV CLASS="" style="text-align: center; ">
            
            */
            
            
            $htmlsdata = base64_decode($businessThird3['documenthtml']);
            
            $htmlsdata = str_replace('<li style="list-style-type: disc;">','<li style="list-style-type: disc;"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);

            $htmlsdata = str_replace('</li>','</SPAN></FONT></li>',$htmlsdata);
            
            $htmlsdata = str_replace('<b>','<b><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
            $htmlsdata = str_replace('</b>','</SPAN></FONT></b>',$htmlsdata);
            
            $htmlsdata = str_replace('<p>','<P><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
            $htmlsdata = str_replace('</p>','</P></FONT></b>',$htmlsdata);
            
            $htmlsdata = str_replace('<p style="margin: 10px 0px 0px 0px; text-align: center;">','<p style="margin: 10px 0px 0px 0px; text-align: center;"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
            $htmlsdata = str_replace('<p class="dct">','<p class="dct"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
            
             $htmlsdata = str_replace('<div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">','<div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; direction: rtl;"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
             $htmlsdata = str_replace('<div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">','<div class="col-md-2" style="text-align:right !important;"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
             $htmlsdata = str_replace('</div>','</div></FONT></b>',$htmlsdata);
             
             $htmlsdata = str_replace('<u>','<FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
             
             $htmlsdata = str_replace('</u>','</u></FONT></b>',$htmlsdata);
             
            
               $htmlsdata = str_replace('<p style="text-align:right !important;">','<p style="text-align:right !important;"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
            
            $htmlsdata = str_replace('<div class="col-md-9" style="text-align:right !important;">','<div class="col-md-9" style="text-align:right !important; width: 74.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; direction: rtl;"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
            
            if(!empty($htmlsdata)){
                 
                 $html2 .= $htmlsdata;
             
             }else{
                 
                  $htmlsdata = base64_decode($businessThird3['documenthtml']);
            
            $htmlsdata = str_replace('<li style="list-style-type: disc;">','<li style="list-style-type: disc;"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);

            $htmlsdata = str_replace('</li>','</SPAN></FONT></li>',$htmlsdata);
            
            $htmlsdata = str_replace('<b>','<b><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
            $htmlsdata = str_replace('</b>','</SPAN></FONT></b>',$htmlsdata);
            
            $htmlsdata = str_replace('<p>','<P><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
            $htmlsdata = str_replace('</p>','</P></FONT></b>',$htmlsdata);
            
            $htmlsdata = str_replace('<p style="margin: 10px 0px 0px 0px; text-align: center;">','<p style="margin: 10px 0px 0px 0px; text-align: center;"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
            $htmlsdata = str_replace('<p class="dct">','<p class="dct"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
            
             $htmlsdata = str_replace('<div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">','<div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; direction: rtl;"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
             $htmlsdata = str_replace('<div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">','<div class="col-md-2" style="text-align:right !important;"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
             $htmlsdata = str_replace('</div>','</div></FONT></b>',$htmlsdata);
             
             $htmlsdata = str_replace('<u>','<FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
             
             $htmlsdata = str_replace('</u>','</u></FONT></b>',$htmlsdata);
             
            
               $htmlsdata = str_replace('<p style="text-align:right !important;">','<p style="text-align:right !important;"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
            
            $htmlsdata = str_replace('<div class="col-md-9" style="text-align:right !important;">','<div class="col-md-9" style="text-align:right !important; width: 74.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; direction: rtl;"><FONT FACE="David"><SPAN LANG="he-IL" >',$htmlsdata);
            
             
             $html2 .= $htmlsdata;
             
             }
             
             $second_signature_file1 = $_SERVER["DOCUMENT_ROOT"].'/'.$file2;
                                    
          $html2 .=' <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > הלקוח</SPAN></FONT></P>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$_SERVER["DOCUMENT_ROOT"].'/website_assets/img/sign1.png" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > החברה </SPAN></FONT></P>
            <BR>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$second_signature_file1.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

  
            </BODY>
            </HTML>';

       
        
            $location_url2 = 'doc_sign/second_document/';

            $pdf_data2 = $this->pdf($html2,$location_url2,2);
             $second_document = $pdf_data2['final_pdf_path']; 
        // end second
            
   // House Rent Document //
            
    

    $clientID = $document_number_id;
    
    if(empty($company_id))
    {
        $company_id = $clientID;
    }
    
    $signaturepath = $_SERVER["DOCUMENT_ROOT"].'/website_assets/img/sign1.png';    
    $businessThird5 = $this->session->userdata('businessThird5');
    $prop_owner_name = $businessThird5['property_owner_name'];
    $prop_owner_add = $businessThird5['property_address'];
    
     $new_text = 'ת.ז';
  
 if($business_type == 'חברה בע”מ'){
 $new_text = 'ח.פ';
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
                
                    <FONT FACE="David"><SPAN LANG="he-IL"><B><U>'.$prop_owner_name.'</U></B></SPAN></FONT>
                    <br/>
                    <br/>
                    <FONT FACE="David"><SPAN LANG="he-IL"><B><U>'.$prop_owner_add.'</U></B></SPAN></FONT>
                    
                
            <P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">א</SPAN></FONT>.<FONT FACE="David"><SPAN LANG="he-IL">ג</SPAN></FONT>.<FONT FACE="David"><SPAN LANG="he-IL">נ</SPAN></FONT>.,</P>
            
<P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B> תאריך </B></SPAN></FONT>:</P>
            
<P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">'.$date.'</SPAN></FONT></P>
                
     <!-- <table STYLE="width:100%;">
        <tr>
        
            <td STYLE="text-align:left; width:10%;"></td>
        
            <td DIR="LTR" CLASS="western" STYLE="text-align:right; width:20%;"><FONT FACE="David" ><B><SPAN LANG="he-IL" STYLE=""></SPAN></B></FONT>:
            '.$date.'</td>
                

            <td></td>
            
            <td></td>
                
            
            
         </tr>    
         </table>-->


            <p DIR="RTL" CLASS="western" ALIGN=CENTER STYLE="text-align: center;">

                <FONT FACE="David"><SPAN LANG="he-IL"><B>הנדון</B></SPAN></FONT><B>:
            </B><FONT FACE="David"><SPAN LANG="he-IL"><U><B>ערבות מס</B></U></SPAN></FONT><U><B> '.$document_id.'</B></U>

            </p>

            <OL>
            
            <LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL"> אנו ערבים בזה כלפיך/ם לתשלום כל סכום עד לסכום כולל של <B><U>'.$amount.'</U></B> ₪ (להלן: "סכום הערבות") שתדרוש/תדרשו מאת <B><U>'.$companyName.'</U></B> '.$new_text.'  <B><U>'.$company_id.'</U></B> (להלן וביחד: "הנערב") בקשר עם ההסכם מיום <B><U>'.$startDate.'</U></B>, על כל תוספותיו, ככל שיהיו מעת לעת (להלן: <B>"ההסכם"</B>). </SPAN></FONT></P>

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

        $rent_document = $this->pdf($html,$location_url_rent_documnet,1);
        $house_rent_document = $rent_document['final_pdf_path'];
        
        
        $pdf_file = $rent_document['pdf_file'];
        
         $user_link = base_url()."business12/".$pdf_file."/".$property_owner_email;
        
        //$user_pdf = $house_rent_document;
        
        $this->session->set_userdata('url_user_document',$pdf_file);
        
        $this->session->set_userdata('url_user_document_email',$user_link);
        
        
        
        $tuplier_dradit = 'N/A'; 
        
       
   
            
 // End of house rent document //
           
            // echo "<pre>"; print_r($pdf_data); print_r($pdf_data1); print_r($pdf_data2);
            // echo $first_document."<br>"; echo $second_document."<br>";
            // die();
            
            if($business_type == 'חברה בע”מ'){
                
                $business_text_eng = 'business ltd';
                
            }else{
                 $business_text_eng = 'licensed dealer';
            }
            
            $Area__c = $businessThird2['Area__c'];
            $Business_Field__c = $businessThird2['Business_Field__c'];
            
            
            $order_id_number = $this->session->userdata('order_id_number');
            
            
            $businessThird1 = $this->session->userdata('businessThird1');
            
            $unique_id = $businessThird1['unique_id'];
            
             $first_name = $businessThird1['first_name'];
            $last_name = $businessThird1['last_name'];
            
            $prevousnfo = $this->session->userdata('businessThird2');
           
           $fields = array("second_document_url__c" => $second_document,
           "guarantee_document__c"=>$house_rent_document,'user_pdf_url__c'=>$user_pdf,
            'order_id_number__c' => $order_id_number,'flow_number__c'=>5,'client_id_number'=>$unique_id,'Client__c'=>$prevousnfo['client_c'],'document_number__c'=>$document_id,'user_link__c'=>$user_link);
            
            
            $url = 'https://obli-backend.herokuapp.com/webservices/newbusnessthirdordersupdate.php';

              $request = sf_update_record($url,$fields,$prevousnfo['client_c']);
             
            
           //echo $html2; die;
          
          return $request;
                                   
             

        
    }
    
    
    function callparetix(){
        
        $businessThird1 = $this->session->userdata('businessThird1');
            
            $unique_id = $businessThird1['unique_id'];
            
             $first_name = $businessThird1['first_name'];
            $last_name = $businessThird1['last_name'];
            
            
        $businessThird3 = $this->session->userdata('businessThird3');
           
            $req_gur_amt = str_replace(',','',$businessThird3['busineesThird_requested_gurantee_amt']);
            
            
            $client_date_of_birth = strtr($businessThird1['client_date_of_birth'], '/', '-');
            $client_date_of_birth = date('d-m-Y', strtotime($client_date_of_birth));
            
            
            $company_address = $businessThird2['company_address'];
            
            $Area__c = $businessThird2['Area__c'];
            $Business_Field__c = $businessThird2['Business_Field__c'];
        
        $full =$_REQUEST['bdidata']; $approve_status = 2;
        
        
        $cofaceUrl = "https:/www.paretix-obli.com/api/CheckPrivateBusiness";
        
        
        $request = array('TestCall'=>true,'ClientInternalCallID'=>'7086','ClientInternalCustomerID'=>'108904329','PersonalID'=>'108904329',
        'GuaranteeType'=>1,'GuaranteeAmount'=>25000,'GuaranteePeriod'=>18,'TimeInBusiness'=>4,'ExperienceInBusiness'=>12,'BusinessArea'=>5,
        'DateOfBirth'=>'30-04-1977','GeographicalArea'=>2);
        
        $request_json = '{"TestCall":true,"ClientInternalCallID":"7086","ClientInternalCustomerID":'.$unique_id.',"PersonalID":'.$unique_id.',"GuaranteeType":1,"GuaranteeAmount":'.$req_gur_amt.',"GuaranteePeriod":18,"TimeInBusiness":4,"ExperienceInBusiness":12,"BusinessArea":'.$Business_Field__c.',"DateOfBirth":'.$client_date_of_birth.',"GeographicalArea":'.$Area__c.',"BDIBusinessReport":'.$full.'}';
        
        
       // echo $request_json = json_encode($request, JSON_UNESCAPED_UNICODE); die;
        
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
			  CURLOPT_POSTFIELDS => json_encode($request, JSON_UNESCAPED_UNICODE),
			  CURLOPT_HTTPHEADER => array(
				"Content-Type: application/json"
			  ),
			));

			  $cofaceResponse = curl_exec($curl);
			  
			  $response = json_decode($cofaceResponse);
			  
			   if(!empty($response) && isset($response->IsApproved) && $response->IsApproved == 1){
			       
			       $approve_status = 1;
			       
			   }
			   
			   $this->session->set_userdata('is_approved',$approve_status);
			   
			   echo $cofaceResponse;
			
        
    }
        
        
 
}

