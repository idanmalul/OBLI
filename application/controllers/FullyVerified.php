<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FullyVerified extends CI_Controller {
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jerusalem');
        error_reporting(0);
    }

    public function kyc(){
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);
        $verified_id = 0;
        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);
        $user_data = $this->session->userdata();
        $this->create_table();
        if(
            isset($user_data['private2']) &&
            $user_data['private2']['first_name']!=null &&
            $user_data['private2']['last_name']!=null &&
            $user_data['private2']['unique_id']!=null
        ){
            $insert_data = array(
                'last_name' => $user_data['private2']['last_name'],
                'first_name' => $user_data['private2']['first_name'],
                'id_number' => $user_data['private2']['unique_id'],
                'status' => 'pending',
                'verified' => 0,
                'send_data_sf' => 0,
            );
            $verified_id = $this->project_model->insert_data('verified_persons', $insert_data);
            $result = $this->create_verification($verified_id, $user_data['private2']['client_email']);
            $data = array(
                'verification_hash' => $result->verification_hash
            );
            $where = array('id' => $verified_id);
            $this->project_model->update_data('verified_persons', $data, $where);
            $url = parse_url($result->url);
            $data_kyc['auth_url'] = str_replace('link=', '', $url['query']);
            $data_kyc['verified_id'] = $verified_id;
            $this->session->set_userdata('verified_id_redirect',$verified_id);
            $this->load->view('website/header');
            $this->load->view('kyc/kyc', $data_kyc);
            $this->load->view('website/footer', $data);
        }else{
            echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('private1')."'; </script>";
            return FALSE;
        }

    }

    private function create_table(){
        $sql = "CREATE TABLE IF NOT EXISTS verified_persons (
                    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    last_name varchar(255) NOT NULL,
                    first_name varchar(255) NOT NULL,
                    id_number varchar(255) NOT NULL,
                    status varchar(255) NOT NULL,           
                    verified TINYINT(1) NOT NULL,
                    case_id varchar(255) NULL,
                    verification_hash varchar(255) NULL,
                    data_hash longtext NULL,
                    send_data_sf int NULL,
                    sf_result longtext NULL,
                    verification_image_one varchar(255) NULL,
                    verification_image_two varchar(255) NULL,
                    verification_image_three varchar(255) NULL,
                    verification_image_four varchar(255) NULL,
                    verification_video varchar(255) NULL
                );";
        $this->project_model->get_query_create_table_result($sql);
    }

    public function check_verified_status(){
        $id = $this->input->post("verified_id");
        if(isset($id) && $id!=null){
            $ch = array("id" => $id);
            $rec = $this->project_model->get_data_where_condition('verified_persons', $ch);
            if(isset($rec[0])){
                if($rec[0]->verified){
                    echo 1;
                    return;
                }
            }
        }
        echo 0;
    }

//  run for cron php /home/oblico/public_html/index.php FullyVerified get_files
    public function get_files(){
        $sql = "SELECT * FROM verified_persons WHERE data_hash IS NOT NULL AND send_data_sf = 0";
        $result = $this->project_model->get_query_result($sql);
        foreach ($result as $val){
            $data = json_decode(base64_decode($val->data_hash));
            $data_images = $data->images;
            $data_video = $data->video;
            $data_urls = array();
            $data_obli_urls = array();
            $i=1;
            foreach ($data_images as $value) {
                $data_urls['verification_image_'.$i] = $value->screen->url;
                $i+=1;
            }

            foreach ($data_video as $value){
                $data_urls['verification_video'] = $value->url;
            }


            foreach ($data_urls as $key=>$url){
                $parse_name = explode("/", $url);
                $name = end($parse_name);
                $data_obli_urls[$key] = $this->config->item('fully_api_url').'/uploads/kyc/'.$name;
                $token = $this->get_jwt_token();
                $headers = array(
                    "Authorization: Bearer {$token}"
                );
                $fp = fopen('uploads/kyc/'.$name, 'w+');

                $ch = curl_init(str_replace(" ","%20", $url));
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $output = curl_exec($ch);
                curl_close($ch);
                fclose($fp);
            }
            if(count($data_obli_urls)>4){
                $data = array(
                    'verification_image_one' => isset($data_obli_urls['verification_image_1']) ? $data_obli_urls['verification_image_1']: null,
                    'verification_image_two' => isset($data_obli_urls['verification_image_2']) ? $data_obli_urls['verification_image_2']: null,
                    'verification_image_three' => isset($data_obli_urls['verification_image_3']) ? $data_obli_urls['verification_image_3']: null,
                    'verification_image_four' => isset($data_obli_urls['verification_image_4']) ? $data_obli_urls['verification_image_4']: null,
                    'verification_video' => isset($data_obli_urls['verification_video']) ? $data_obli_urls['verification_video']: null,
                );
            }else{
                $data = array(
                    'verification_image_one' => isset($data_obli_urls['verification_image_1']) ? $data_obli_urls['verification_image_1']: null,
                    'verification_image_two' => isset($data_obli_urls['verification_image_2']) ? $data_obli_urls['verification_image_2']: null,
                    'verification_image_three' => isset($data_obli_urls['verification_image_3']) ? $data_obli_urls['verification_image_3']: null,
                    'verification_image_four' => '',
                    'verification_video' => isset($data_obli_urls['verification_video']) ? $data_obli_urls['verification_video']: null,
                );
            }
            $where = array('id' => $val->ID);
            $this->project_model->update_data('verified_persons', $data, $where);

            $data['client_id_number'] = $val->id_number;
            $this->send_kyc_data_to_sf($data, $val->ID);
        }
        return true;
    }
    private function send_kyc_data_to_sf($data, $id){
        // salesforce api
        $url = 'https://obli-backend.herokuapp.com/webservices/kycSaveData.php';

        //open connection
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        //execute post
        $res = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($res);
        //close connection
        curl_close($ch);
        $where = array('id' => $id);
        if(isset($result->status) && $result->status == true){
            $data_update = array('sf_result'=> $res, 'send_data_sf'=>1);
        }else{
            $data_update = array('sf_result'=> $res, 'send_data_sf'=>2);
        }
        $this->project_model->update_data('verified_persons', $data_update, $where);

        return $result;
    }
    public function get_verification_data(){
        $id = $this->input->get("verified_id");
        if(isset($id) && $id!=null){
            $ch = array("id" => $id);
            $rec = $this->project_model->get_data_where_condition('verified_persons', $ch);
            if(isset($rec[0])){
                $data = array(
                    'language' => 'en-US',
                    'fields' => array(
                        array(
                            'field_id' => 'first_name',
                            'field_name' => 'First name',
                            'field_type' => 'text',
                            'field_value' => $rec[0]->first_name,
                        ),
                        array(
                            'field_id' => 'last_name',
                            'field_name' => 'Last name',
                            'field_type' => 'text',
                            'field_value' => $rec[0]->last_name,
                        ),
                        array(
                            'field_id' => 'id_number',
                            'field_name' => 'ID number',
                            'field_type' => 'text',
                            'field_value' => $rec[0]->id_number,
                        ),
                    ),
                );
                $this->save_request($data, 'data-data');
                echo json_encode($data);
            }

        }
    }

    public function set_verification_status(){
        $data = json_decode(file_get_contents('php://input'), true);
        $this->save_request($data, 'status-request');
        if(isset($data['customer_case_id']) && $data['customer_case_id']!=null){
            $status = $data["status"];
            $id = str_replace('customer_', '', $data['customer_case_id']);
            $data_update = array(
                'status' => $status,
                'case_id' => $data["case_id"]
            );
            if($status == 'verified-status' || $status == 'media-remote-ready'){
                $data_update['verified'] = 1;
                $ch = array("id" => $id );
                $rec = $this->project_model->get_data_where_condition('verified_persons', $ch);
                if((isset($rec[0]->verified) && $rec[0]->verified == 0) || $status == 'media-remote-ready'){
                    $this->get_data_package($rec[0]->verification_hash);
                }
            }
            if(isset($data['data'])){
                $data_update['data_hash'] = $data['data'];
            }

            $where = array('id' => $id);
            $edit = $this->project_model->update_data('verified_persons', $data_update, $where);
        }
        echo json_encode(1);
    }

    //  run for cron php /home/oblico/public_html/index.php FullyVerified get_ready_data
    public function get_ready_data(){
        $sql = "SELECT * FROM verified_persons WHERE status = 'media-remote-ready'";
        $result = $this->project_model->get_query_result($sql);
        foreach ($result as $val){
            $this->get_data_package($val->verification_hash, true);
            sleep(8);
        }
        echo 1;
    }
    private function get_data_package($hash, $header=false){
        $data = http_build_query(array(
            'email' => $this->config->item('fully_customer_email'),
            'password' => $this->config->item('fully_customer_password'),
            'verification_hash' => $hash,
            'customer_secret' => $this->config->item('fully_customer_secret_key')
        ));
        if($header){
            $token = $this->get_jwt_token();
            $headers = array(
                "Authorization: Bearer {$token}"
            );
        }


        $curl = curl_init();

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->config->item('fully_verified_url').'/customers/api/verification-data-package/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 5000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
        ));
        if($header){
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if($err){
            // todo check with Idan
            return false;
        }else{
            $data = json_decode($response);
            return $data;
        }
    }

    private function save_request($data, $file_name){
        $request = json_encode($data);
        $fp = fopen("uploads/$file_name.json", 'w');
        fwrite($fp, $request);   // here it will print the array pretty
        fclose($fp);
        return true;
    }
    private function get_jwt_token(){
        $data = http_build_query(array(
            'email' => $this->config->item('fully_customer_email'),
            'password' => $this->config->item('fully_customer_password'),
        ));

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->config->item('fully_verified_url').'/auth/token/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 5000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if($err){
            // todo check with Idan
            return false;
        }else{
            $data = json_decode($response);
            return $data->token;
        }
    }

    private function create_verification($verified_id, $email){
        $token = $this->get_jwt_token();
        if($token){
            $url = $this->config->item('fully_verified_url').'/customers/api/verify/';
            $data = http_build_query(array(
                'customer' => $this->config->item('fully_customer_name'),
                'customer_callback_url' => $this->config->item('fully_customer_callback_url').'/kyc-redirect',
                'customer_ext_id' => 'customer_'.$verified_id,
                'customer_data_url' => $this->config->item('fully_customer_callback_url').'/verification-data/?verified_id='.$verified_id,
                'customer_status_url' => $this->config->item('fully_customer_callback_url').'/verification-status',
                'email' => $email,
                'is_iframe' => true,
                'verification_type' => 'with_operator',

            ));
            $signature = $this->calculate_signature($this->config->item('fully_verification_secret_key'), $data['customer_ext_id'], $url );
            $headers = array(
                "Authorization: Bearer {$token}",
                "X-FV-Signature: $signature",
            );

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 5000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_HTTPHEADER => $headers,
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);
            return json_decode($response);
        }
    }

    private function calculate_signature($verification_secret, $customer_ext_id, $url, $params=null) {
        if($params){
            ksort($params);
            $url .= "?".http_build_query($params);
        }
        $pre_signature = $verification_secret . $customer_ext_id . hash("sha256",
                str_replace(array("%2F", "%253D"),array("/", "%3D"), urlencode($url)), false);
        return hash("sha256", $pre_signature, false);
    }

    public function kyc_redirect(){
        $user_data = $this->session->userdata();
        $data_kyc['verified_id'] = $user_data['verified_id_redirect'];
        $this->load->view('kyc/redirect', $data_kyc);
    }
}