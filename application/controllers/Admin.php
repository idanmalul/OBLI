<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    
    function __construct() {

        parent::__construct();
        
        if (!$this->session->userdata('logged_in')) 
        {

             redirect('login');

        }
        $this->session->userdata('admin_id');

        // if(isset($_SESSION['error'])){
        //     unset($_SESSION['error']);
        // }
         date_default_timezone_set('Asia/Jerusalem');
    }

    function index() 
    { 
        $admin_id = $this->session->userdata('admin_id');

        $where = array('created_by' => $admin_id);

        $rec['admin_detail'] = $this->project_model->get_data_where_condition('admin_front_ui', $where);

        if(!empty($rec)){

            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/add_obli_app_front_detail', $rec);
            $this->load->view('admin/footer');

        }
        else{

            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/add_obli_app_front_detail');
            $this->load->view('admin/footer');

        }   
    }

    function add_front_ui()
    {
        if ($this->input->post())
        {
            $data = $this->input->post();
            $admin_id = $this->session->userdata('admin_id');
            unset($data['submit']);
            
            // $data['status']= 1;
            $data['created_by']= $admin_id;
            $data['created_at'] = date('Y-m-d H:i:s');

            // echo "<pre>"; print_r($data); die();

            $ch = array("main_title" => $this->input->post("main_title") );
            $rec = $this->project_model->get_data_where_condition('admin_front_ui', $ch);

            if (empty($rec)) {

                
                    $front_obli_id = $this->project_model->insert_data('admin_front_ui', $data);

                    if ($front_obli_id > 0) {
                        
                        $this->session->set_flashdata('success', 'Record added successfully.');
                        redirect('admin/edit_front_ui/'.$front_obli_id);
                        
                    } else {

                        $this->session->set_flashdata('error', 'Error in insertion');
                        redirect("admin/edit_front_ui");
                    }
               
                
            } else {
                $data['error'] = 'Main title already exist!';
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/add_obli_app_front_detail', $data);
                $this->load->view('admin/footer');
                return false;

            }

        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/add_obli_app_front_detail');
            $this->load->view('admin/footer');
        }
    }

    function edit_front_ui()
    {
        if ($this->input->post()) 
        {
            $data = $this->input->post();

            $admin_id = $this->session->userdata('admin_id');
            $front_obli_id = $this->input->post('front_obli_id');

            unset($data['submit']);
            unset($data['front_obli_id']);

            

        $ch = array("main_title" => $this->input->post("main_title"), "id !="=> $front_obli_id);

            $rec = $this->project_model->get_data_where_condition('admin_front_ui', $ch);

            // echo "<pre>"; print_r($rec); die();

            if (empty($rec)) {

                    $where = array('id' => $front_obli_id);

                    $edit = $this->project_model->update_data('admin_front_ui', $data, $where);

                    $this->session->set_flashdata('success', 'Record updated successfully');
                    redirect('admin/edit_front_ui/'.$front_obli_id);
                
                
            } else { 

                $this->session->set_flashdata('error', 'Main title already exist!');

                redirect('admin/edit_front_ui/'.$front_obli_id);

            }



        } else {

            $front_obli_id = $this->uri->segment(3);

            if (!empty($front_obli_id)) {

                $where = array('id' => $front_obli_id);

                $admin_detail = $this->project_model->get_column_data_where('admin_front_ui', '', $where);

                if (!empty($admin_detail)) {

                    $data['admin_detail'] = $admin_detail;

                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/add_obli_app_front_detail', $data);

                    $this->load->view('admin/footer');

                } else {

                    redirect('admin/add_front_ui');

                }

            } else {

                redirect('admin/add_front_ui');

            }

        }
    }


    function coming_soon()
    {
        $admin_id = $this->session->userdata('admin_id');

        $where = array('created_by' => $admin_id);

        $rec['admin_detail'] = $this->project_model->get_data_where_condition('admin_front_ui', $where);

        if(!empty($rec)){
       
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/add_obli_app_coming_soon_detail', $rec);
            $this->load->view('admin/footer');
        }
        else{

            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/add_obli_app_coming_soon_detail');
            $this->load->view('admin/footer');
        }

    }

    function add_coming_soon()
    {
        if ($this->input->post())
        {
            $data = $this->input->post();
            $admin_id = $this->session->userdata('admin_id');
            unset($data['submit']);
            
            // $data['status']= 1;

            // if($this->input->post('coming_soon_status') == "ON"){
            //     $data['coming_soon_status']= "ON";
            // }
            // else{
            //     $data['coming_soon_status']= "OFF";
            // }
            // $data['created_by']= $admin_id;
            $data['coming_soon_created_at'] = date('Y-m-d H:i:s');

            // echo "<pre>"; print_r($data); die();

            $ch = array("coming_soon_title" => $this->input->post("coming_soon_title") );
            $rec = $this->project_model->get_data_where_condition('admin_front_ui', $ch);

            if (empty($rec)) {

                
                    $coming_soon_id = $this->project_model->insert_data('admin_front_ui', $data);

                    if ($coming_soon_id > 0) {
                        
                        $this->session->set_flashdata('success', 'Record added successfully.');
                        redirect('admin/edit_coming_soon/'.$coming_soon_id);
                        
                    } else {

                        $this->session->set_flashdata('error', 'Error in insertion');
                        redirect("admin/edit_coming_soon");
                    }
               
                
            } else {
                $data['error'] = 'Coming soon title already exist!';
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/add_obli_app_coming_soon_detail', $data);
                $this->load->view('admin/footer');
                return false;

            }

        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/add_obli_app_coming_soon_detail');
            $this->load->view('admin/footer');
        }
    }

    function edit_coming_soon()
    {
        if ($this->input->post()) 
        {
            $data = $this->input->post();

            $admin_id = $this->session->userdata('admin_id');
            $coming_soon_id = $this->input->post('coming_soon_id');

            unset($data['submit']);
            unset($data['coming_soon_id']);

            if($this->input->post('coming_soon_status') == "ON"){
                $data['coming_soon_status']= "ON";
            }
            else{
                $data['coming_soon_status']= "OFF";
            }
            // $data['created_by']= $admin_id;
            $data['coming_soon_created_at'] = date('Y-m-d H:i:s');

            

        $ch = array("coming_soon_title" => $this->input->post("coming_soon_title"), "id !="=> $coming_soon_id);

            $rec = $this->project_model->get_data_where_condition('admin_front_ui', $ch);

            // echo "<pre>"; print_r($rec); die();

            if (empty($rec)) {

                    $where = array('id' => $coming_soon_id);

                    $edit = $this->project_model->update_data('admin_front_ui', $data, $where);

                    $this->session->set_flashdata('success', 'Record updated successfully');
                    redirect('admin/edit_coming_soon/'.$coming_soon_id);
                
                
            } else { 

                $this->session->set_flashdata('error', 'Coming soon title already exist!');

                redirect('admin/edit_coming_soon/'.$coming_soon_id);

            }



        } else {

            $coming_soon_id = $this->uri->segment(3);

            if (!empty($coming_soon_id)) {

                $where = array('id' => $coming_soon_id);

                $admin_detail = $this->project_model->get_column_data_where('admin_front_ui', '', $where);

                if (!empty($admin_detail)) {

                    $data['admin_detail'] = $admin_detail;

                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/add_obli_app_coming_soon_detail', $data);

                    $this->load->view('admin/footer');

                } else {

                    redirect('admin/add_coming_soon');

                }

            } else {

                redirect('admin/add_coming_soon');

            }

        }
    }

    function banner() 
    { 
        $sql = "SELECT * FROM banner ORDER BY id DESC LIMIT 1";
        $data['banner_detail'] = $this->project_model->get_query_result($sql);

        $admin_id = $this->session->userdata('admin_id');
        $where_logo = array('created_by' => $admin_id);
        $data['logo_detail'] = $this->project_model->get_records_where('logo_image', $where_logo);

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/add/add_banner', $data);
        $this->load->view('admin/footer');

    }

    function add_banner()
    {
        if ($this->input->post())
        {
            $admin_id = $this->session->userdata('admin_id');
            $data = $this->input->post();
            unset($data['submit']);
            
            // $data['status']= 1;
            $data['created_by']= $admin_id;
            $data['created_at'] = date('Y-m-d H:i:s');

            // echo "<pre>"; print_r($data); die();

            $ch = array("title" => $this->input->post("title") );
            $rec = $this->project_model->get_data_where_condition('banner', $ch);

            if (empty($rec)) {

                
                    $banner_id = $this->project_model->insert_data('banner', $data);

                    if ($banner_id > 0) {

                        if($_FILES['userfile']['name'][0])
                        {   
                            // $custom_name = '';
                         // echo "<pre>";
                         // print_r($_FILES);die(); 
                          $files = $_FILES;     
                             $images = array();
                             $count = count($_FILES['userfile']['name']);
                              for($i=0; $i<$count; $i++)
                                {
                                $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                                $config['upload_path'] = './uploads/logo_images';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                                $config['max_size'] = '2000000';
                                $config['remove_spaces'] = true;
                                $config['overwrite'] = false;
                                $config['max_width'] = '';
                                $config['max_height'] = '';
                                $c_name = 'id_proof';
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                $this->upload->do_upload();
                                $fileName = $_FILES['userfile']['name'];
                                // $images[] = $fileName;

                                $logo_data = array('banner_id' => $banner_id, 'created_by' => $admin_id, 'image' => $fileName, 'created_at' => date('Y-m-d H:i:s') );

                                $this->project_model->insert_data('logo_image', $logo_data);


                                }
                                  // $fileNames = implode(',',$images);
                        }
                        
                        $this->session->set_flashdata('success', 'Banner details added successfully.');
                        redirect('admin/edit_banner/'.$banner_id);
                        
                    } else {

                        $this->session->set_flashdata('error', 'Error in insertion');
                        redirect("admin/edit_banner");
                    }
               
                
            } else {
                $data['error'] = 'Title already exist!';
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/add_banner', $data);
                $this->load->view('admin/footer');
                return false;

            }

        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/add_banner');
            $this->load->view('admin/footer');
        }
    }

    function edit_banner()
    {
        if ($this->input->post()) 
        {
            $data = $this->input->post();

            $admin_id = $this->session->userdata('admin_id');
            $banner_id = $this->input->post('banner_id');

            unset($data['submit']);
            unset($data['banner_id']);

            $data['updated_at'] = date('Y-m-d H:i:s');

            if($_FILES['userfile']['name'][0])
            {   
                // $custom_name = '';
             // echo "<pre>";
             // print_r($_FILES);die(); 
              $files = $_FILES;     
                 $images = array();
                 $count = count($_FILES['userfile']['name']);
                  for($i=0; $i<$count; $i++)
                    {
                    $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                    $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                    $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                    $config['upload_path'] = './uploads/logo_images';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '2000000';
                    $config['remove_spaces'] = true;
                    $config['overwrite'] = false;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $c_name = 'id_proof';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload();
                    $fileName = $_FILES['userfile']['name'];
                    // $images[] = $fileName;

                    $logo_data = array('banner_id' => $banner_id, 'created_by' => $admin_id, 'image' => $fileName, 'created_at' => date('Y-m-d H:i:s') );

                    $this->project_model->insert_data('logo_image', $logo_data);


                    }
                      // $fileNames = implode(',',$images);
            }

        $ch = array("title" => $this->input->post("title"), "id !="=> $banner_id);

            $rec = $this->project_model->get_data_where_condition('banner', $ch);

            // echo "<pre>"; print_r($rec); die();

            if (empty($rec)) {

                    $where = array('id' => $banner_id);

                    $edit = $this->project_model->update_data('banner', $data, $where);

                    $this->session->set_flashdata('success', 'Banner details updated successfully');
                    redirect('admin/edit_banner/'.$banner_id);
                
                
            } else { 

                $this->session->set_flashdata('error', 'Title already exist!');

                redirect('admin/edit_banner/'.$banner_id);

            }



        } else {

            $banner_id = $this->uri->segment(3);

            if (!empty($banner_id)) {

                $where = array('id' => $banner_id);

                $banner_detail = $this->project_model->get_column_data_where('banner', '', $where);

                if (!empty($banner_detail)) {

                    $data['banner_detail'] = $banner_detail;

                    $where_logo = array('banner_id' => $banner_id);

                    $data['logo_detail'] = $this->project_model->get_records_where('logo_image', $where_logo);

                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/add_banner', $data);

                    $this->load->view('admin/footer');

                } else {

                    redirect('admin/edit_banner');

                }

            } else {

                redirect('admin/edit_banner');

            }

        }
    }

    function delete_logo()
    {
            $deleteid  = $this->input->post('image_id');
            $this->db->delete('logo_image', array('id' => $deleteid)); 
            $verify = $this->db->affected_rows();
            echo $verify;
    }

    function content_section() 
    { 
        $sql = "SELECT * FROM content_section_2 ORDER BY id DESC LIMIT 1";
        $data['content_detail'] = $this->project_model->get_query_result($sql);

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/add/content_section_2', $data);
        $this->load->view('admin/footer');

    }

    function add_section_2()
    {
        if ($this->input->post())
        {
            $admin_id = $this->session->userdata('admin_id');
            $data = $this->input->post();
            unset($data['submit']);
            
            // $data['status']= 1;
            $data['created_by']= $admin_id;
            $data['created_at'] = date('Y-m-d H:i:s');

            // echo "<pre>"; print_r($data); die();

            $ch = array("first_title_text" => $this->input->post("first_title_text") );
            $rec = $this->project_model->get_data_where_condition('content_section_2', $ch);

            if (empty($rec)) {

                
                    $section2_id = $this->project_model->insert_data('content_section_2', $data);

                    if ($section2_id > 0) {
                        
                        $this->session->set_flashdata('success', 'Details added successfully.');
                        redirect('admin/edit_section_2/'.$section2_id);
                        
                    } else {

                        $this->session->set_flashdata('error', 'Error in insertion');
                        redirect("admin/edit_section_2");
                    }
               
                
            } else {
                $data['error'] = 'Title already exist!';
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/content_section_2', $data);
                $this->load->view('admin/footer');
                return false;

            }

        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/content_section_2');
            $this->load->view('admin/footer');
        }
    }

    function edit_section_2()
    {
        if ($this->input->post()) 
        {
            $data = $this->input->post();

            $admin_id = $this->session->userdata('admin_id');
            $section2_id = $this->input->post('section2_id');

            unset($data['submit']);
            unset($data['section2_id']);

            $data['updated_at'] = date('Y-m-d H:i:s');

        $ch = array("first_title_text" => $this->input->post("first_title_text"), "id !="=> $section2_id);

            $rec = $this->project_model->get_data_where_condition('content_section_2', $ch);

            // echo "<pre>"; print_r($rec); die();

            if (empty($rec)) {

                    $where = array('id' => $section2_id);

                    $edit = $this->project_model->update_data('content_section_2', $data, $where);

                    $this->session->set_flashdata('success', 'Details updated successfully');
                    redirect('admin/edit_section_2/'.$section2_id);
                
                
            } else { 

                $this->session->set_flashdata('error', 'Title already exist!');

                redirect('admin/edit_section_2/'.$section2_id);

            }



        } else {

            $section2_id = $this->uri->segment(3);

            if (!empty($section2_id)) {

                $where = array('id' => $section2_id);

                $content_detail = $this->project_model->get_column_data_where('content_section_2', '', $where);

                if (!empty($content_detail)) {

                    $data['content_detail'] = $content_detail;

                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/content_section_2', $data);

                    $this->load->view('admin/footer');

                } else {

                    redirect('admin/edit_section_2');

                }

            } else {

                redirect('admin/edit_section_2');

            }

        }
    }

    function testmonial_section_3() 
    { 
        $data['testmonial_detail'] = $this->project_model->get_records('testmonial_section_3');

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/listing/testmonial_list', $data);
        $this->load->view('admin/footer');

    }

    function add_section_3()
    {
        if ($this->input->post())
        {
            $admin_id = $this->session->userdata('admin_id');
            $data = $this->input->post();
            unset($data['submit']);

            if (!empty($_FILES["image"]["name"])) {

                $config['upload_path'] = './uploads/testmonial_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["image"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_testimonial_" . $today;

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image', $config)) {
                    
                $data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
               
                
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/testmonial_section', $data);
                $this->load->view('admin/footer');
                return false;
                }
                $data['slider_image'] = $file_name;
                $file_name = "";
                $custom_name = "";
                $config['file_name'] = "";

            }
            
            // $data['status']= 1;
            $data['created_by']= $admin_id;
            $data['created_at'] = date('Y-m-d H:i:s');

            // echo "<pre>"; print_r($data); die();

            $ch = array("order_set" => $this->input->post("order_set") );
            $rec = $this->project_model->get_data_where_condition('testmonial_section_3', $ch);

            if (empty($rec)) {

                
                    $testmonial_id = $this->project_model->insert_data('testmonial_section_3', $data);

                    if ($testmonial_id > 0) {
                        
                        $this->session->set_flashdata('success', 'Slider details added successfully.');
                        redirect('admin/edit_section_3/'.$testmonial_id);
                        
                    } else {

                        $this->session->set_flashdata('error', 'Error in insertion');
                        redirect("admin/edit_section_3");
                    }
               
                
            } else {
                $data['error'] = 'Order already exist!';
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/testmonial_section', $data);
                $this->load->view('admin/footer');
                return false;

            }

        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/testmonial_section');
            $this->load->view('admin/footer');
        }
    }

    function edit_section_3()
    {
        if ($this->input->post()) 
        {
            $data = $this->input->post();

            $admin_id = $this->session->userdata('admin_id');
            $testmonial_id = $this->input->post('testmonial_id');

            unset($data['submit']);
            unset($data['testmonial_id']);

            if (!empty($_FILES["image"]["name"])) {

                $config['upload_path'] = './uploads/testmonial_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["image"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_testimonial_" . $today;

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image', $config)) {
                    
                $data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
               
                
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/testmonial_section', $data);
                $this->load->view('admin/footer');
                return false;
                }
                $data['slider_image'] = $file_name;

                $custom_name = "";
                $file_name = "";
                $config['file_name'] = "";
                $config = array();
            }

            $data['updated_at'] = date('Y-m-d H:i:s');

        $ch = array("order_set" => $this->input->post("order_set"), "id !="=> $testmonial_id);

            $rec = $this->project_model->get_data_where_condition('testmonial_section_3', $ch);

            // echo "<pre>"; print_r($rec); die();

            if (empty($rec)) {

                    $where = array('id' => $testmonial_id);

                    $edit = $this->project_model->update_data('testmonial_section_3', $data, $where);

                    $this->session->set_flashdata('success', 'Slider details updated successfully');
                    redirect('admin/edit_section_3/'.$testmonial_id);
                
                
            } else { 

                $this->session->set_flashdata('error', 'Order already exist!');

                redirect('admin/edit_section_3/'.$testmonial_id);

            }



        } else {

            $testmonial_id = $this->uri->segment(3);

            if (!empty($testmonial_id)) {

                $where = array('id' => $testmonial_id);

                $testmonial_detail = $this->project_model->get_column_data_where('testmonial_section_3', '', $where);

                if (!empty($testmonial_detail)) {

                    $data['testmonial_detail'] = $testmonial_detail;

                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/testmonial_section', $data);

                    $this->load->view('admin/footer');

                } else {

                    redirect('admin/edit_section_3');

                }

            } else {

                redirect('admin/edit_section_3');

            }

        }
    }

    function content_section_4() 
    { 
        $sql = "SELECT * FROM section_4 ORDER BY id DESC LIMIT 1";
        $data['section_4_detail'] = $this->project_model->get_query_result($sql);

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/add/section_4_view', $data);
        $this->load->view('admin/footer');

    }

    function add_section_4()
    {
        if ($this->input->post())
        {
            $admin_id = $this->session->userdata('admin_id');
            $data = $this->input->post();
            unset($data['submit']);
            
            // $data['status']= 1;
            $data['created_by']= $admin_id;
            $data['created_at'] = date('Y-m-d H:i:s');

            // echo "<pre>"; print_r($data); die();

            $ch = array("first_title_text" => $this->input->post("first_title_text") );
            $rec = $this->project_model->get_data_where_condition('section_4', $ch);

            if (empty($rec)) {

                
                    $section4_id = $this->project_model->insert_data('section_4', $data);

                    if ($section4_id > 0) {
                        
                        $this->session->set_flashdata('success', 'Details added successfully.');
                        redirect('admin/edit_section_4/'.$section4_id);
                        
                    } else {

                        $this->session->set_flashdata('error', 'Error in insertion');
                        redirect("admin/edit_section_4");
                    }
               
                
            } else {
                $data['error'] = 'Title already exist!';
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/section_4_view', $data);
                $this->load->view('admin/footer');
                return false;

            }

        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/section_4_view');
            $this->load->view('admin/footer');
        }
    }

    function edit_section_4()
    {
        if ($this->input->post()) 
        {
            $data = $this->input->post();

            $admin_id = $this->session->userdata('admin_id');
            $section4_id = $this->input->post('section4_id');

            unset($data['submit']);
            unset($data['section4_id']);

            $data['updated_at'] = date('Y-m-d H:i:s');

        $ch = array("first_title_text" => $this->input->post("first_title_text"), "id !="=> $section4_id);

            $rec = $this->project_model->get_data_where_condition('section_4', $ch);

            // echo "<pre>"; print_r($rec); die();

            if (empty($rec)) {

                    $where = array('id' => $section4_id);

                    $edit = $this->project_model->update_data('section_4', $data, $where);

                    $this->session->set_flashdata('success', 'Details updated successfully');
                    redirect('admin/edit_section_4/'.$section4_id);
                
                
            } else { 

                $this->session->set_flashdata('error', 'Title already exist!');

                redirect('admin/edit_section_4/'.$section4_id);

            }



        } else {

            $section4_id = $this->uri->segment(3);

            if (!empty($section4_id)) {

                $where = array('id' => $section4_id);

                $section_4_detail = $this->project_model->get_column_data_where('section_4', '', $where);

                if (!empty($section_4_detail)) {

                    $data['section_4_detail'] = $section_4_detail;

                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/section_4_view', $data);

                    $this->load->view('admin/footer');

                } else {

                    redirect('admin/edit_section_4');

                }

            } else {

                redirect('admin/edit_section_4');

            }

        }
    }

    function content_section_5() 
    { 
        $sql = "SELECT * FROM section_5 ORDER BY id DESC LIMIT 1";
        $data['section_5_detail'] = $this->project_model->get_query_result($sql);

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/add/section_5_view', $data);
        $this->load->view('admin/footer');

    }

    function add_section_5()
    {
        if ($this->input->post())
        {
            $admin_id = $this->session->userdata('admin_id');
            $data = $this->input->post();
            unset($data['submit']);
            
            // $data['status']= 1;
            $data['created_by']= $admin_id;
            $data['created_at'] = date('Y-m-d H:i:s');

            // echo "<pre>"; print_r($data); die();

            $ch = array("title" => $this->input->post("title") );
            $rec = $this->project_model->get_data_where_condition('section_5', $ch);

            if (empty($rec)) {

                
                    $section5_id = $this->project_model->insert_data('section_5', $data);

                    if ($section5_id > 0) {
                        
                        $this->session->set_flashdata('success', 'Details added successfully.');
                        redirect('admin/edit_section_5/'.$section5_id);
                        
                    } else {

                        $this->session->set_flashdata('error', 'Error in insertion');
                        redirect("admin/edit_section_5");
                    }
               
                
            } else {
                $data['error'] = 'Title already exist!';
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/section_5_view', $data);
                $this->load->view('admin/footer');
                return false;

            }

        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/section_5_view');
            $this->load->view('admin/footer');
        }
    }

    function edit_section_5()
    {
        if ($this->input->post()) 
        {
            $data = $this->input->post();

            $admin_id = $this->session->userdata('admin_id');
            $section5_id = $this->input->post('section5_id');

            unset($data['submit']);
            unset($data['section5_id']);

            $data['updated_at'] = date('Y-m-d H:i:s');

        $ch = array("title" => $this->input->post("title"), "id !="=> $section5_id);

            $rec = $this->project_model->get_data_where_condition('section_5', $ch);

            // echo "<pre>"; print_r($rec); die();

            if (empty($rec)) {

                    $where = array('id' => $section5_id);

                    $edit = $this->project_model->update_data('section_5', $data, $where);

                    $this->session->set_flashdata('success', 'Details updated successfully');
                    redirect('admin/edit_section_5/'.$section5_id);
                
                
            } else { 

                $this->session->set_flashdata('error', 'Menu already exist!');

                redirect('admin/edit_section_5/'.$section5_id);

            }



        } else {

            $section5_id = $this->uri->segment(3);

            if (!empty($section5_id)) {

                $where = array('id' => $section5_id);

                $section_5_detail = $this->project_model->get_column_data_where('section_5', '', $where);

                if (!empty($section_5_detail)) {

                    $data['section_5_detail'] = $section_5_detail;

                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/section_5_view', $data);

                    $this->load->view('admin/footer');

                } else {

                    redirect('admin/edit_section_5');

                }

            } else {

                redirect('admin/edit_section_5');

            }

        }
    }

    function menu_list() 
    { 
        $data['menu_detail'] = $this->project_model->get_records('menu_section');

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/listing/menu_view', $data);
        $this->load->view('admin/footer');

    }

    function add_menu()
    {
        if ($this->input->post())
        {
            $admin_id = $this->session->userdata('admin_id');
            $data = $this->input->post();
            unset($data['submit']);
            
            // $data['status']= 1;
            $data['created_by']= $admin_id;
            $data['created_at'] = date('Y-m-d H:i:s');

            // echo "<pre>"; print_r($data); die();

            $ch = array("menu_title" => $this->input->post("menu_title") );
            $rec = $this->project_model->get_data_where_condition('menu_section', $ch);

            if (empty($rec)) {

                $ch1 = array("set_order" => $this->input->post("set_order") );
                $rec1 = $this->project_model->get_data_where_condition('menu_section', $ch1);

                if (empty($rec1)) {

                    $menu_id = $this->project_model->insert_data('menu_section', $data);

                    if ($menu_id > 0) {
                        
                        $this->session->set_flashdata('success', 'Menu details added successfully.');
                        redirect('admin/edit_menu/'.$menu_id);
                        
                    } else {

                        $this->session->set_flashdata('error', 'Error in insertion');
                        redirect("admin/edit_menu");
                    }

                }
                else {
                    $data['error'] = 'Menu order already exist!';
                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/add_menu', $data);
                    $this->load->view('admin/footer');
                    return false;

                }               
                
            } else {
                $data['error'] = 'Menu already exist!';
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/add_menu', $data);
                $this->load->view('admin/footer');
                return false;

            }

        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/add_menu');
            $this->load->view('admin/footer');
        }
    }

    function edit_menu()
    {
        if ($this->input->post()) 
        {
            $data = $this->input->post();

            $admin_id = $this->session->userdata('admin_id');
            $menu_id = $this->input->post('menu_id');

            unset($data['submit']);
            unset($data['menu_id']);

            $data['updated_at'] = date('Y-m-d H:i:s');

        $ch = array("menu_title" => $this->input->post("menu_title"), "id !="=> $menu_id);

            $rec = $this->project_model->get_data_where_condition('menu_section', $ch);

            // echo "<pre>"; print_r($rec); die();

            if (empty($rec)) {

                $ch1 = array("set_order" => $this->input->post("set_order"), "id !="=> $menu_id);

                $rec1 = $this->project_model->get_data_where_condition('menu_section', $ch1);

                if (empty($rec1)) {

                    $where = array('id' => $menu_id);

                    $edit = $this->project_model->update_data('menu_section', $data, $where);

                    $this->session->set_flashdata('success', 'Menu details updated successfully');
                    redirect('admin/edit_menu/'.$menu_id);

                }
                else { 

                    $this->session->set_flashdata('error', 'Menu order already exist!');

                    redirect('admin/edit_menu/'.$menu_id);

                }
                
            } else { 

                $this->session->set_flashdata('error', 'Menu already exist!');

                redirect('admin/edit_menu/'.$menu_id);

            }



        } else {

            $menu_id = $this->uri->segment(3);

            if (!empty($menu_id)) {

                $where = array('id' => $menu_id);

                $menu_detail = $this->project_model->get_column_data_where('menu_section', '', $where);

                if (!empty($menu_detail)) {

                    $data['menu_detail'] = $menu_detail;

                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/add_menu', $data);

                    $this->load->view('admin/footer');

                } else {

                    redirect('admin/edit_menu');

                }

            } else {

                redirect('admin/edit_menu');

            }

        }
    }

    function icon_list() 
    { 
        $data['icon_detail'] = $this->project_model->get_records('icons_section');

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/listing/icon_view', $data);
        $this->load->view('admin/footer');

    }

    function add_icon()
    {
        if ($this->input->post())
        {
            $admin_id = $this->session->userdata('admin_id');
            $data = $this->input->post();
            unset($data['submit']);
            
            // $data['status']= 1;
            $data['created_by']= $admin_id;
            $data['created_at'] = date('Y-m-d H:i:s');

            if (!empty($_FILES["image"]["name"])) {

                $config['upload_path'] = './uploads/icons_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["image"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_icons_" . $today;

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image', $config)) {
                    
                $data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
               
                
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/add_icon', $data);
                $this->load->view('admin/footer');
                return false;
                }
                $data['icons_image'] = $file_name;
                $file_name = "";
                $custom_name = "";
                $config['file_name'] = "";

            }

            // echo "<pre>"; print_r($data); die();

            $ch = array("set_order" => $this->input->post("set_order") );
            $rec = $this->project_model->get_data_where_condition('icons_section', $ch);

            if (empty($rec)) {

                $icon_id = $this->project_model->insert_data('icons_section', $data);

                if ($icon_id > 0) {
                    
                    $this->session->set_flashdata('success', 'Icons details added successfully.');
                    redirect('admin/edit_icon/'.$icon_id);
                    
                } else {

                    $this->session->set_flashdata('error', 'Error in insertion');
                    redirect("admin/edit_icon");
                }    
                
            } else {
                $data['error'] = 'Icon order already exist!';
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/add_icon', $data);
                $this->load->view('admin/footer');
                return false;

            }

        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/add_icon');
            $this->load->view('admin/footer');
        }
    }

    function edit_icon()
    {
        if ($this->input->post()) 
        {
            $data = $this->input->post();

            $admin_id = $this->session->userdata('admin_id');
            $icon_id = $this->input->post('icon_id');

            unset($data['submit']);
            unset($data['icon_id']);

            if (!empty($_FILES["image"]["name"])) {

                $config['upload_path'] = './uploads/icons_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["image"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_icons_" . $today;

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image', $config)) {
                    
                $data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
               
                
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/add_icon', $data);
                $this->load->view('admin/footer');
                return false;
                }
                $data['icons_image'] = $file_name;

                $custom_name = "";
                $file_name = "";
                $config['file_name'] = "";
                $config = array();
            }

            $data['updated_at'] = date('Y-m-d H:i:s');

        $ch = array("set_order" => $this->input->post("set_order"), "id !="=> $icon_id);

            $rec = $this->project_model->get_data_where_condition('icons_section', $ch);

            // echo "<pre>"; print_r($rec); die();

            if (empty($rec)) {

                $where = array('id' => $icon_id);

                $edit = $this->project_model->update_data('icons_section', $data, $where);

                $this->session->set_flashdata('success', 'Icons details updated successfully');
                redirect('admin/edit_icon/'.$icon_id);
                
            } else { 

                $this->session->set_flashdata('error', 'Icon order already exist!');

                redirect('admin/edit_icon/'.$icon_id);

            }



        } else {

            $icon_id = $this->uri->segment(3);

            if (!empty($icon_id)) {

                $where = array('id' => $icon_id);

                $icon_detail = $this->project_model->get_column_data_where('icons_section', '', $where);

                if (!empty($icon_detail)) {

                    $data['icon_detail'] = $icon_detail;

                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/add_icon', $data);

                    $this->load->view('admin/footer');

                } else {

                    redirect('admin/edit_icon');

                }

            } else {

                redirect('admin/edit_icon');

            }

        }
    }

    function application_link_list() 
    { 
        $sql = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['app_link_detail'] = $this->project_model->get_query_result($sql);

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/add/add_application_url_view', $data);
        $this->load->view('admin/footer');

    }

    function add_app_url()
    {
        if ($this->input->post())
        {
            $admin_id = $this->session->userdata('admin_id');
            $data = $this->input->post();
            unset($data['submit']);
            
            // $data['status']= 1;
            $data['created_by']= $admin_id;
            $data['created_at'] = date('Y-m-d H:i:s');

            // echo "<pre>"; print_r($data); die();

            $ch = array("first_app_url" => $this->input->post("first_app_url") );
            $rec = $this->project_model->get_data_where_condition('application_url_section', $ch);

            if (empty($rec)) {

                
                    $app_link_id = $this->project_model->insert_data('application_url_section', $data);

                    if ($app_link_id > 0) {
                        
                        $this->session->set_flashdata('success', 'Links added successfully.');
                        redirect('admin/edit_app_url/'.$app_link_id);
                        
                    } else {

                        $this->session->set_flashdata('error', 'Error in insertion');
                        redirect("admin/edit_app_url");
                    }
               
                
            } else {
                $data['error'] = 'Title already exist!';
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/add_application_url_view', $data);
                $this->load->view('admin/footer');
                return false;

            }

        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/add_application_url_view');
            $this->load->view('admin/footer');
        }
    }

    function edit_app_url()
    {
        if ($this->input->post()) 
        {
            $data = $this->input->post();

            $admin_id = $this->session->userdata('admin_id');
            $app_link_id = $this->input->post('app_link_id');

            unset($data['submit']);
            unset($data['app_link_id']);

            $data['updated_at'] = date('Y-m-d H:i:s');

        $ch = array("first_app_url" => $this->input->post("first_app_url"), "id !="=> $app_link_id);

            $rec = $this->project_model->get_data_where_condition('application_url_section', $ch);

            // echo "<pre>"; print_r($rec); die();

            if (empty($rec)) {

                    $where = array('id' => $app_link_id);

                    $edit = $this->project_model->update_data('application_url_section', $data, $where);

                    $this->session->set_flashdata('success', 'Links updated successfully');
                    redirect('admin/edit_app_url/'.$app_link_id);
                
                
            } else { 

                $this->session->set_flashdata('error', 'Menu already exist!');

                redirect('admin/edit_app_url/'.$app_link_id);

            }



        } else {

            $app_link_id = $this->uri->segment(3);

            if (!empty($app_link_id)) {

                $where = array('id' => $app_link_id);

                $app_link_detail = $this->project_model->get_column_data_where('application_url_section', '', $where);

                if (!empty($app_link_detail)) {

                    $data['app_link_detail'] = $app_link_detail;

                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/add_application_url_view', $data);

                    $this->load->view('admin/footer');

                } else {

                    redirect('admin/edit_app_url');

                }

            } else {

                redirect('admin/edit_app_url');

            }

        }
    }

    // Aboutus section
    function aboutus() 
    { 
        $sql = "SELECT * FROM aboutus ORDER BY id DESC LIMIT 1";
        $data['aboutus_detail'] = $this->project_model->get_query_result($sql);

        $admin_id = $this->session->userdata('admin_id');
        $where_logo = array('created_by' => $admin_id);
        $data['partner_icon_detail'] = $this->project_model->get_records_where('partner_icons_images', $where_logo);

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/add/add_aboutus', $data);
        $this->load->view('admin/footer');

    }

    function add_aboutus()
    {
        if ($this->input->post())
        {
            $admin_id = $this->session->userdata('admin_id');
            $data = $this->input->post();
            unset($data['submit']);

            if (!empty($_FILES["image"]["name"])) {

                $config['upload_path'] = './uploads/aboutus/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["image"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "aboutus_banner_" . $today;

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image', $config)) {
                    
                $data['error'] = 'Supported Media Type - gif, jpg, png, jpeg, svg.';
               
                
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/add_aboutus', $data);
                $this->load->view('admin/footer');
                return false;
                }
                $data['banner_image'] = $file_name;
                $file_name = "";
                $custom_name = "";
                $config['file_name'] = "";

            }
            
            // $data['status']= 1;
            $data['created_by']= $admin_id;
            $data['created_at'] = date('Y-m-d H:i:s');

            // echo "<pre>"; print_r($data); die();

            $ch = array("title" => $this->input->post("title") );
            $rec = $this->project_model->get_data_where_condition('aboutus', $ch);

            if (empty($rec)) {

                
                    $aboutus_id = $this->project_model->insert_data('aboutus', $data);

                    if ($aboutus_id > 0) {

                        if($_FILES['userfile']['name'][0])
                        {   
                            // $custom_name = '';
                         // echo "<pre>";
                         // print_r($_FILES);die(); 
                          $files = $_FILES;     
                             $images = array();
                             $count = count($_FILES['userfile']['name']);
                              for($i=0; $i<$count; $i++)
                                {
                                $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                                $config['upload_path'] = './uploads/aboutus/partner_icons';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                                $config['max_size'] = '2000000';
                                $config['remove_spaces'] = true;
                                $config['overwrite'] = false;
                                $config['max_width'] = '';
                                $config['max_height'] = '';
                                $c_name = 'id_proof';
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                $this->upload->do_upload();
                                $fileName = $_FILES['userfile']['name'];
                                // $images[] = $fileName;

                                $icons_data = array('aboutus_id' => $aboutus_id, 'created_by' => $admin_id, 'image' => $fileName, 'created_at' => date('Y-m-d H:i:s') );

                                $this->project_model->insert_data('partner_icons_images', $icons_data);


                                }
                                  // $fileNames = implode(',',$images);
                        }
                        
                        $this->session->set_flashdata('success', 'Banner details added successfully.');
                        redirect('admin/edit_aboutus/'.$aboutus_id);
                        
                    } else {

                        $this->session->set_flashdata('error', 'Error in insertion');
                        redirect("admin/edit_aboutus");
                    }
               
                
            } else {
                $data['error'] = 'Title already exist!';
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/add_aboutus', $data);
                $this->load->view('admin/footer');
                return false;

            }

        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/add_aboutus');
            $this->load->view('admin/footer');
        }
    }

    function edit_aboutus()
    {
        if ($this->input->post()) 
        {
            $data = $this->input->post();

            $admin_id = $this->session->userdata('admin_id');
            $aboutus_id = $this->input->post('aboutus_id');

            unset($data['submit']);
            unset($data['aboutus_id']);

            if (!empty($_FILES["image"]["name"])) {

                $config['upload_path'] = './uploads/aboutus/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["image"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "aboutus_banner_" . $today;

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image', $config)) {
                    
                $data['error'] = 'Supported Media Type - gif, jpg, png, jpeg, svg.';
               
                
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/add/add_aboutus', $data);
                $this->load->view('admin/footer');
                return false;
                }
                $data['banner_image'] = $file_name;

                $custom_name = "";
                $file_name = "";
                $config['file_name'] = "";
                $config = array();
            }

            $data['updated_at'] = date('Y-m-d H:i:s');

            if($_FILES['userfile']['name'][0])
            {   
                // $custom_name = '';
             // echo "<pre>";
             // print_r($_FILES);die(); 
              $files = $_FILES;     
                 $images = array();
                 $count = count($_FILES['userfile']['name']);
                  for($i=0; $i<$count; $i++)
                    {
                    $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                    $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                    $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                    $config['upload_path'] = './uploads/aboutus/partner_icons';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                    $config['max_size'] = '2000000';
                    $config['remove_spaces'] = true;
                    $config['overwrite'] = false;
                    $config['max_width'] = '';
                    $config['max_height'] = '';
                    $c_name = 'id_proof';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload();
                    $fileName = $_FILES['userfile']['name'];
                    // $images[] = $fileName;

                    $icons_data = array('aboutus_id' => $aboutus_id, 'created_by' => $admin_id, 'image' => $fileName, 'created_at' => date('Y-m-d H:i:s') );

                    $this->project_model->insert_data('partner_icons_images', $icons_data);


                    }
                      // $fileNames = implode(',',$images);
            }

        $ch = array("title" => $this->input->post("title"), "id !="=> $aboutus_id);

            $rec = $this->project_model->get_data_where_condition('aboutus', $ch);

            // echo "<pre>"; print_r($rec); die();

            if (empty($rec)) {

                    $where = array('id' => $aboutus_id);

                    $edit = $this->project_model->update_data('aboutus', $data, $where);

                    $this->session->set_flashdata('success', 'Banner details updated successfully');
                    redirect('admin/edit_aboutus/'.$aboutus_id);
                
                
            } else { 

                $this->session->set_flashdata('error', 'Title already exist!');

                redirect('admin/edit_aboutus/'.$aboutus_id);

            }



        } else {

            $aboutus_id = $this->uri->segment(3);

            if (!empty($aboutus_id)) {

                $where = array('id' => $aboutus_id);

                $aboutus_detail = $this->project_model->get_column_data_where('aboutus', '', $where);

                if (!empty($aboutus_detail)) {

                    $data['aboutus_detail'] = $aboutus_detail;

                    $where_icons = array('aboutus_id' => $aboutus_id);

                    $data['partner_icon_detail'] = $this->project_model->get_records_where('partner_icons_images', $where_icons);

                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/add_aboutus', $data);
                    $this->load->view('admin/footer');

                } else {

                    redirect('admin/edit_aboutus');

                }

            } else {

                redirect('admin/edit_aboutus');

            }

        }
    }

    function delete_aboutus_image()
    {
            $deleteid  = $this->input->post('image_id');
            $this->db->delete('partner_icons_images', array('id' => $deleteid)); 
            $verify = $this->db->affected_rows();
            echo $verify;
    }

    function company_list() 
    { 
        $data['company_details'] = $this->project_model->get_records('company_forms');
       
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/listing/company_list', $data);
        $this->load->view('admin/footer');

    }

    function add_company()
    {
        if ($this->input->post())
        {
            $admin_id = $this->session->userdata('admin_id');
            $data = $this->input->post();
            unset($data['submit']);
            
            $data['status']= 1;
            $data['created_by']= $admin_id;
            $data['created_at'] = date('Y-m-d H:i:s');
            
            if(!empty($data['company_id'])){
                $data['company_id'] = $this->input->post("company_id");
                $data['type'] = 1;
            }
            else{
                $data['company_id'] = 0;
                $data['type'] = 2;
            }

            // echo "<pre>"; print_r($data); die();

//            $ch = array("company_id" => $this->input->post("company_id") );
//            $rec = $this->project_model->get_data_where_condition('company_forms', $ch);
//
//            if (empty($rec)) {

//                $ch1 = array("set_order" => $this->input->post("set_order") );
//                $rec1 = $this->project_model->get_data_where_condition('company_forms', $ch1);
//
//                if (empty($rec1)) {

                    $cmp_id = $this->project_model->insert_data('company_forms', $data);

                    if ($cmp_id > 0) {
                        
                        $this->session->set_flashdata('success', 'Company details added successfully.');
                        redirect('admin/edit_company/'.$cmp_id);
                        
                    } else {

                        $this->session->set_flashdata('error', 'Error in insertion');
                        redirect("admin/edit_company");
                    }

//                }
//                else {
//                    $data['error'] = 'Menu order already exist!';
//                    $this->load->view('admin/header');
//                    $this->load->view('admin/menu');
//                    $this->load->view('admin/add/add_company', $data);
//                    $this->load->view('admin/footer');
//                    return false;
//
//                }               
                
//            } else {
//                $data['error'] = 'Company id already exist!';
//                $this->load->view('admin/header');
//                $this->load->view('admin/menu');
//                $this->load->view('admin/add/add_company', $data);
//                $this->load->view('admin/footer');
//                return false;
//
//            }

        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/add/add_company');
            $this->load->view('admin/footer');
        }
    }

    function edit_company()
    {
        if ($this->input->post()) 
        {
            $data = $this->input->post();

            $admin_id = $this->session->userdata('admin_id');
            $cmp_id = $this->input->post('cmp_id');

            unset($data['submit']);
            unset($data['cmp_id']);
            
            if(!empty($data['company_id'])){
                $data['company_id'] = $this->input->post("company_id");
                $data['type'] = 1;
            }
            else{
                $data['company_id'] = 0;
                $data['type'] = 2;
            }

//        $ch = array("company_id" => $this->input->post("company_id"), "id !="=> $cmp_id);
//
//            $rec = $this->project_model->get_data_where_condition('company_forms', $ch);
//
//            // echo "<pre>"; print_r($rec); die();
//
//            if (empty($rec)) {

//                $ch1 = array("set_order" => $this->input->post("set_order"), "id !="=> $company_id);
//                $rec1 = $this->project_model->get_data_where_condition('company_forms', $ch1);

//                if (empty($rec1)) {

                    $where = array('id' => $cmp_id);

                    $edit = $this->project_model->update_data('company_forms', $data, $where);

                    $this->session->set_flashdata('success', 'Company details updated successfully');
                    redirect('admin/edit_company/'.$cmp_id);

//                }
//                else {
//
//                    $this->session->set_flashdata('error', 'Menu order already exist!');
//
//                    redirect('admin/edit_company/'.$company_id);
//
//                }
                
//            } else { 
//
//                $this->session->set_flashdata('error', 'Company id already exist!');
//
//                redirect('admin/edit_company/'.$cmp_id);
//
//            }



        } else {

            $cmp_id = $this->uri->segment(3);

            if (!empty($cmp_id)) {

                $where = array('id' => $cmp_id);

                $company_details = $this->project_model->get_column_data_where('company_forms', '', $where);

                if (!empty($company_details)) {

                    $data['company_details'] = $company_details;

                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/add/add_company', $data);
                    $this->load->view('admin/footer');

                } else {

                    redirect('admin/edit_company');

                }

            } else {

                redirect('admin/edit_company');

            }

        }
    }
    
    function check_payment_details() 
    { 
        $sql = "SELECT * FROM check_payment_api_response ORDER BY id DESC ";
        $data['payment_details'] = $this->project_model->get_query_result($sql);
//        $data['payment_details'] = $this->project_model->get_records('check_payment_api_response');
       
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/listing/payment_api_details', $data);
        $this->load->view('admin/footer');

    }
   
    function send_email($from, $to, $subject, $message) 
    {
        $this->load->library('email');

        $this->email->from($from);

        $this->email->to($to);

        $this->email->subject($subject);

        $this->email->message($message);

        if (!$this->email->send()) {

            return FALSE;

        } else {

            return TRUE;

        }

    }

    function delete() {

        $delete_type = $this->uri->segment(3);

        $delete_table = $this->uri->segment(4);

        $delete_where_name = $this->uri->segment(5);

        $delete_where_id = $this->uri->segment(6);

        $delete_where = array($delete_where_name => $delete_where_id);
                
        $delete = $this->project_model->delete_record($delete_table, $delete_where);

        if ($delete == TRUE) {

            if ($delete_type == 'delete_agent') {

                $message = 'Agent deleted successfully!!';

                $this->session->set_flashdata('error', $message);

                redirect('admin/agent_list');

            }

            if ($delete_type == 'delete_testimonial') {

                $message = 'Testimonial detalis deleted successfully!!';

                $this->session->set_flashdata('error', $message);

                redirect('admin/testmonial_section_3');

            }

            if ($delete_type == 'delete_menu') {

                $message = 'Menu detalis deleted successfully!!';

                $this->session->set_flashdata('error', $message);

                redirect('admin/menu_list');

            }

            if ($delete_type == 'delete_icons') {

                $message = 'Icons detalis deleted successfully!!';

                $this->session->set_flashdata('error', $message);

                redirect('admin/icon_list');

            }
            
            if ($delete_type == 'delete_company') {

                $message = 'Company detalis deleted successfully!!';

                $this->session->set_flashdata('error', $message);

                redirect('company');

            }
            
            
        } else {

            redirect();

        }

    }

    function change_status() {

        $where_name = $this->uri->segment(3);

        $where_value = $this->uri->segment(4);

        $table = $this->uri->segment(5);

        $table_field = $this->uri->segment(6);

        $field_value = $this->uri->segment(7);

        $function = $this->uri->segment(8);



        //----------------Start Change Status--------------------//



        $where = array($where_name => $where_value);

        $data = array($table_field => $field_value);

        $this->project_model->update_data($table, $data, $where);



        //----------------End Change Status--------------------//

        

    if ($table == "admin" && $function == "agent_list") {

            if ($field_value != 1) {

                $message = 'Agent deactivated successfully!';

            } else {

                $message = 'Agent activated successfully!';

            }

            $this->session->set_flashdata('status', $message);

            $path = 'admin/'.$function;

            redirect($path);

        }

    if ($table == "testmonial_section_3" && $function == "testmonial_section_3") {

            if ($field_value != 1) {

                $message = 'Testimonial status deactivated successfully!';

            } else {

                $message = 'Testimonial status activated successfully!';

            }

            $this->session->set_flashdata('status', $message);

            $path = 'admin/'.$function;

            redirect($path);

        }

    if ($table == "menu_section" && $function == "menu_list") {

            if ($field_value != 1) {

                $message = 'Menu status deactivated successfully!';

            } else {

                $message = 'Menu status activated successfully!';

            }

            $this->session->set_flashdata('status', $message);

            $path = 'admin/'.$function;

            redirect($path);

        }

        if ($table == "icons_section" && $function == "icon_list") {

            if ($field_value != 1) {

                $message = 'Icons status deactivated successfully!';

            } else {

                $message = 'Icons status activated successfully!';

            }

            $this->session->set_flashdata('status', $message);

            $path = 'admin/'.$function;

            redirect($path);

        }
        
        if ($table == "company_forms" && $function == "company_list") {

            if ($field_value != 1) {

                $message = 'Company status deactivated successfully!';

            } else {

                $message = 'Company status activated successfully!';

            }

            $this->session->set_flashdata('status', $message);

//            $path = 'admin/'.$function;

            redirect('company');

        }
        
    }


    // END About Us Secton
    function logout() {

        $array_items = array('admin_id', 'admin_email', 'logged_in');

        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();

        redirect('login');

    }

    function change_pass() {

        if ($this->input->post('old_pass')) {

            $admin_id = $this->session->userdata('admin_id');

            $where = array('admin_id' => $admin_id, 'admin_password' => md5($this->input->post('old_pass')));

            $check_user = $this->project_model->get_records_where('user_admin', $where);

            if ($check_user) {

                $password = $this->input->post('new_pass');

                $agent_email = $this->session->userdata('admin_email');

                $agent_name =  $this->session->userdata('admin_name');

                $admin_type =  $this->session->userdata('admin_type');

                $update_data = array('admin_password' => md5($this->input->post('new_pass')));

                $check_user = $this->project_model->update_records('user_admin', $where, $update_data);

                $_SESSION['success_msg'] = 'Password changed successfully';

                $this->session->mark_as_flash('success_msg');

                redirect('change-password');

            } else {

                $_SESSION['error_msg'] = 'Invalid old password';

                $this->session->mark_as_flash('error_msg');

                redirect('change-password');

            }

        } else {

            $this->load->view('admin/header');

            $this->load->view('admin/menu');

            $this->load->view('admin/change_pass');

            $this->load->view('admin/footer');

        }

    }


/*** viewPaymentAjaxDetail
/*** Created for show detail of payment api request response view
/*** Created BY : Manikant
*/


function viewPaymentAjaxDetail()
{
    $data = $this->input->post();



    if(!empty($data['paymentid']))
    {
        $html = '';

         $sql = "SELECT * FROM check_payment_api_response where id = ".$data['paymentid'];
        $detail = $this->project_model->get_query_result($sql);

        if(!empty($detail))
        {
            $html .= '<p class="popup_text_color"> <b>Payment URL</b> : '.$detail[0]->payment_url .'</p>';

            $html .= '<p class="popup_text_color"> <b>Request Detail</b> : '.$detail[0]->request_data .'</p>';

            $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
    return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UTF-16BE');
}, $detail[0]->response_data);

            $html .= '<p class="popup_text_color"> <b>Response Detail</b> : '.$str .'</p>';

            $html .= '<p class="popup_text_color"> <b>Error Detail</b> : '.$detail[0]->error_data .'</p>';

            $html .= '<p class="popup_text_color"> <b>Form Type</b> : '.$detail[0]->form_text .'</p>';
        }//End of if
    }

    echo $html;
}//End of function


    
        
}

