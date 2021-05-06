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

  define('UPLOAD_DIR', 'obli_profile_images/');
  $img = $_REQUEST['image_file'];
  
  $img = str_replace('data:image/png;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);


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
      $bytes = getBytesFromHexString($hexbytes);
      if (substr($imagedata, 0, strlen($bytes)) == $bytes)
        return $mime;
    }

    return NULL;
  }

  $encoded_string = $img;
  $imgdata = base64_decode($encoded_string);
  $mimetype = getImageMimeType($imgdata);
  // echo $imgdata; die();

  $file = UPLOAD_DIR . uniqid() . '.'.$mimetype;
  // echo $file; die();
  $success = file_put_contents($file, $data);

  if($success){

    $file_path = USER_PROFILE_IMAGES.$file;

    $response = array('status' => 'true', 'message' => 'Upload successfully!', 'file_path' => $file_path);
  }
  else{
    $response = array('status' => 'false', 'message' => 'Error in upload file!');
  }

  // print $success ? $file : 'Unable to save the file.';

  
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
