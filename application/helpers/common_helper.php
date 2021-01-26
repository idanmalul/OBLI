<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists('get_menu_by_set_order'))
{
    function get_menu_by_set_order($set_order_id=0)
    {

        $CI = & get_instance();
        
        $where = array('set_order' => $set_order_id);

        $menudata = $CI->project_model->get_column_data_where('menu_section', '', $where);

        return $menudata;

        
    }   
}

if(!function_exists('get_icon_by_set_order'))
{
    function get_icon_by_set_order($set_icon_order_id=0)
    {

        $CI = & get_instance();
        
        $where = array('set_order' => $set_icon_order_id);

        $icondata = $CI->project_model->get_column_data_where('icons_section', '', $where);

        return $icondata;

        
    }   
}

if(!function_exists('get_slider_by_set_order'))
{
    function get_slider_by_set_order($set_slider_order_id=0)
    {

        $CI = & get_instance();
        
        $where = array('order_set' => $set_slider_order_id);

        $sliderdata = $CI->project_model->get_column_data_where('testmonial_section_3', '', $where);

        return $sliderdata;

        
    }   
}

 if(!function_exists('get_active_company'))
 {
     function get_active_company()
     {

        $CI = & get_instance();
        $where = array('status' => 1);

        $companyData = $CI->project_model->get_column_data_where('company_forms', '', $where);

        return $companyData;

         
     }   
 }
 
 if(!function_exists('get_company_by_company_id'))
 {
     function get_company_by_company_id($company_id=0)
     {
        $where = array('id' => $company_id, 'status' => 1);
        $companyDetails = $CI->project_model->get_column_data_where('company_forms', '', $where);
        
        return $companyDetails;

     }   
 }
 
 if(!function_exists('verify_send_otp'))
 {
     function verify_send_otp($data='')
     {
		 
		 $data["phone"] = str_replace('-','',$data["phone"]);
		
		 
		 $otp = rand(100000,999999);
		 
		 if(strlen($data["phone"]) == 10)
		 {
		     
		     $array = str_split($data["phone"]);
		     
		     $number = '';
		     
		     $n = 0;
		     
		     foreach ($array as $char) {
		         if($n != 0){
                 $number = $number.$char;
		         }
		         $n++;
            }
		     
			$data["phone"] = '972'.$number;
		 }
        
		$data = '<Inforu>
			 <User>
			 <Username>oblisms</Username>
			 <Password>M7868xzr!</Password>
			 </User>
			 <Content Type="sms">
			 <Message>כאן אובלי, על מנת לאשר את מספר הטלפון שלך אנא הזן את הקוד הבא באתר האינטרנט:'.$otp.'</Message>
			 </Content>
			 <Recipients>
			 <PhoneNumber>'.$data["phone"].'</PhoneNumber>
			 </Recipients>
			 <Settings>
			 <Sender>OBLI</Sender>
			 </Settings>
			</Inforu>
			';
			
			$posturl = 'https://uapi.inforu.co.il/SendMessageXml.ashx?InforuXML='.urlencode($data);
			
		 $result = file_get_contents($posturl); 
			
			return $otp;
			

     }   
 }

// if(!function_exists('get_all_partner'))
// {
//     function get_all_partner()
//     {

//         $CI = & get_instance();
//         if($CI->session->userdata('logged_in'))
//         {
//             // $where = array('status' => 1);

//             $allData = $CI->project_model->get_records('partners');

//             return $allData;

//         }
//         else 
//         {

//         }
//     }   
// }

// if(!function_exists('active_partner'))
// {
//     function active_partner()
//     {

//         $CI = & get_instance();
//         if($CI->session->userdata('logged_in'))
//         {
//             $where = array('status' => 1);

//             $partnerData = $CI->project_model->get_column_data_where('partners', '', $where);

//             return $partnerData;

//         }
//         else 
//         {

//         }
//     }   
// }



// if(!function_exists('get_agent_detail_by_id'))
// {
//     function get_agent_detail_by_id($agent_id=0)
//     {

//         $CI = & get_instance();
//         if($CI->session->userdata('logged_in'))
//         {
//             $where = array('admin_id' => $agent_id);

//             $agentDeatil = $CI->project_model->get_column_data_where('admin', '', $where);

//             return $agentDeatil;

//         }
//         else 
//         {

//         }
//     }   
// }

// if(!function_exists('count_all_status'))
// {
//     function count_all_status($agent_id=0,$all_status=0, $type_of_loan="")
//     {

//         $CI = & get_instance();
//         if($CI->session->userdata('logged_in'))
//         {
//             if($all_status ==1)
//             {
//                 $sql = "SELECT count(*) as approved from new_login where created_by = $agent_id AND status = 1 AND type_of_loan = '".$type_of_loan."' ";
//             }
//             elseif($all_status == 2)
//             {
//                 $sql = "SELECT count(*) as pending from new_login where created_by = $agent_id AND status = 2 AND type_of_loan = '".$type_of_loan."' ";
//             }
//             elseif($all_status == 3)
//             {
//                 $sql = "SELECT count(*) as rejected from new_login where created_by = $agent_id AND status = 3 AND type_of_loan = '".$type_of_loan."' ";
//             }
//             elseif($all_status == 4)
//             {
//                 $sql = "SELECT count(*) as disbursed from new_login where created_by = $agent_id AND status = 4 AND type_of_loan = '".$type_of_loan."' ";
//             }
//             else
//             {
                
//             }
            

//             $statusData = $CI->project_model->get_query_result($sql);

//             // $where = array('user_id' => $user_id);

//             // $userData = $CI->project_model->get_column_data_where('users', '', $where);

//             return $statusData;

//         }
//         else 
//         {

//         }
//     }   
// }

?>
