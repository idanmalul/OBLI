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

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);

        $result = $this->create_verification();
        $url = parse_url($result->url);
        $data_kyc['auth_url'] = str_replace('link=', '', $url['query']);
        $this->load->view('website/header');
        $this->load->view('kyc/kyc', $data_kyc);
        $this->load->view('website/footer', $data);
    }

    public function get_verification_data(){
        $this->save_request($_REQUEST, 'data-data');
        $data = array(
            'language' => 'en-US',
            'fields' => array(
                array(
                    'field_id' => 'first_name',
                    'field_name' => 'First name',
                    'field_type' => 'text',
                    'field_value' => 'John',
                ),
                array(
                    'field_id' => 'last_name',
                    'field_name' => 'Last name',
                    'field_type' => 'text',
                    'field_value' => 'Rambo',
                ),
                array(
                    'field_id' => 'id_number',
                    'field_name' => 'ID number',
                    'field_type' => 'text',
                    'field_value' => 'IJR 123456',
                ),
            ),
        );
        echo json_encode($data);
        return;
    }

    public function set_verification_status(){
        $this->save_request($_SERVER, 'status-request');
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
//        var_dump($response);
//        var_dump($err);
        curl_close($curl);
        if($err){
            // todo check with Idan
            return false;
        }else{
            $data = json_decode($response);
            return $data->token;
        }
    }

    private function create_verification(){
        $token = $this->get_jwt_token();
        if($token){
            $url = $this->config->item('fully_verified_url').'/customers/api/verify/';
            $data = http_build_query(array(
                'customer' => $this->config->item('fully_customer_name'),
                'customer_callback_url' => $this->config->item('fully_customer_callback_url'),
                'customer_ext_id' => 'customer_1232',
                'customer_data_url' => $this->config->item('fully_customer_callback_url').'/verification-data?id=23',
                'customer_status_url' => $this->config->item('fully_customer_callback_url').'/verification-status',
                'email' => 'zhulinskyi1990@gmail.com',
                'is_iframe' => true,
                'verification_type' => 'with_operator',

            ));
            $signature = $this->calculate_signature($this->config->item('fully_verification_secret_key'), $data['customer_ext_id'], $url );
            $this->save_request($signature, 'signature-request');
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
//            var_dump($response);
//            var_dump($err);
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