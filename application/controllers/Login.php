<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    
    function __construct() {

        parent::__construct();
         date_default_timezone_set('Asia/Jerusalem');
         
         error_reporting(0);
         
    }

    
 function index() 
 {
     
        $this->load->view('website/header');
        $this->load->view('website/login');
        $this->load->view('website/footer');
       
    }
    
function varify() 
 {
     
        $data['values'] = $this->input->post();
        
        if(!empty($data))
        {
            $data['values']['phone'] = $data['values']['client_phone'];
            
            $this->load->helper('common_helper');
		
    		$otp = verify_send_otp($data['values']);
    		
    		$data['otp'] = $otp;
    		
    		$this->session->set_userdata('otpvarify',$otp);
    		
    		$data['sentotp'] = 1;
            
        }
     
        $this->load->view('website/header');
        $this->load->view('website/otpvarify',$data);
        $this->load->view('website/footer');
       
    }
    
function varified() 
 {
     
        $data['values'] = $this->input->post();
        
        redirect('website/userdashboard');
       
    }

        
}

