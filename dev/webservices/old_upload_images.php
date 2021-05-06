<?php

require './db.class.php';

class fileUpload extends DB {
    

    function upload_images() {

if(!empty($_REQUEST['image_file']))
{
          // $path = WHATSAPP.'qwer1asdf123_456_5e5da23a05af277fb7200c88739c4229_20180622.zip';
//           echo $md5_sum = md5_file($path);
//           die();
  //echo "123";die;

  if(isset($_FILES['file'])){
      $errors= array();
      $file_name = time().$_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      
      $file_ex= explode('_',$_FILES['file']['name']);

      $expensions= array("jpg");
      
      if(in_array($file_ext,$expensions)=== false){ 
         $errors[]="extension not allowed, please choose a jpg, jpeg or png file!";
         $response = array('status' => 'false', 'message' => 'extension not allowed, please choose a jpg, jpeg or png file!');
         $this->json_output($response);
         exit();

      }
      
      // if($file_size > 2097152) {
      //    $errors[]='File size must be excately 2 MB';
      //    $response = array('status' => 'false', 'message' => 'File size must be excately 2 MB');
      // }
      
      if(empty($errors)==true) {
        // print_r($file_ext); die();
        //echo "string";die();
         move_uploaded_file($file_tmp,"./obli_profile_images/".$file_name);
         $file_path = USER_PROFILE_IMAGES.$file_name;
         // echo "Success";
         $response = array('status' => 'true', 'message' => 'Upload successfully!', 'file_path' => $file_path);
      }else{
         $response = array('status' => 'false', 'message' => 'Error in upload file');
      }
   }
}
else
{
  $response = array('status' => 'false', 'message' => 'Invalid request parameter');
}
        $this->json_output($response);
    }

}

$add = new fileUpload();
$add->upload_images();
