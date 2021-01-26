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
                'first_name' => $user_data['private2']['last_name'],
                'id_number' => $user_data['private2']['unique_id'],
                'status' => 'pending',
                'verified' => 0

            );
            $verified_id = $this->project_model->insert_data('verified_persons', $insert_data);
            $result = $this->create_verification($verified_id, $user_data['private2']['client_email']);

            $url = parse_url($result->url);
            $data_kyc['auth_url'] = str_replace('link=', '', $url['query']);
            $data_kyc['verified_id'] = $verified_id;
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
                    case_id varchar(255) NULL       
                );";
        $this->project_model->get_query_create_table_result($sql);
    }

    public function check_verified_status(){
        $data = array();
        $data['success'] = false;
        $id = $this->input->post("verified_id");
        if(isset($id) && $id!=null){
            $ch = array("id" => $id);
            $rec = $this->project_model->get_data_where_condition('verified_persons', $ch);
            if(isset($rec[0])){
                if($rec[0]->verified){
                    $data['success'] = true;
                    echo json_encode($data);
                }
            }
        }
        echo json_encode($data);
    }

    public function get_verification_data(){
        $this->save_request($_REQUEST, 'data-data');
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
                echo json_encode($data);
            }

        }
        echo 0;

    }

    public function set_verification_status(){
        $this->save_request($_REQUEST, 'status-request');
        $customer_case_id = $this->input->post("customer_case_id");
        if($customer_case_id!=null){
            $status = $this->input->post("status");
            $id = str_replace('customer_', '', $customer_case_id);
            $verified = 0;
            if($status == 'verified-status'){
                $verified = 1;
            }
            $data = array(
                'status' => $status,
                'verified' => $verified,
                'case_id' => $this->input->post("case_id")
            );
            $where = array('id' => $id);
            $edit = $this->project_model->update_data('admin_front_ui', $data, $where);
        }
        echo 1;
    }

    private function save_request($data, $file_name){
        $request = json_encode($data);
//        var_dump($data);
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
                'customer_callback_url' => $this->config->item('fully_customer_callback_url'),
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

}