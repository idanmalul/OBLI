<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './db.class.php';

// require './class.phpmailer.php';
// require './class.smtp.php';

class PdfSend extends DB {

    function pdf() {
        

        if(!empty($_REQUEST['name']) && !empty($_REQUEST['email']) && !empty($_REQUEST['pdf_path']) )
        {
            $name = trim($_REQUEST['name']);
            $email = trim($_REQUEST['email']);
            $pdf_url = trim($_REQUEST['pdf_path']);

            $to = $email;
            $subject = "Obli Team";

            $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Untitled Document</title>
            </head>

            <body bgcolor="#f1f1f1">
            <table cellpadding="0" cellspacing="0" width="600" style="background:#fff; border:1px solid #cbcbcb; margin:0 auto; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
                    <thead class="header">
                    <tr>
                            <td style="background:#396196; height:62px; width:100%; padding:5px; border-bottom:1px solid #DDD;" valign="middle">
                            <!--<a href="#" style="margin-left:10px;"><img width="100" src="'.WEBSITE.'/assets/email_img/logo.png" alt="..."/></a>-->
        <h1 style="color:#fff;text-align:center;">Obli Team</h1>
            <!--<div class="social-icons" style="float:right; margin-top:10px;">
                    <a href="#" style="float:left; margin:0px 3px;"><img src="'.WEBSITE.'/assets/email_img/fb.png" alt="..."/></a>
            <a href="#" style="float:left; margin:0px 3px;"><img src="'.WEBSITE.'/assets/email_img/tw.png" alt="..."/></a>
            <a href="#" style="float:left; margin:0px 3px;"><img src="'.WEBSITE.'/assets/email_img/in.png" alt="..."/></a>

                        </div>-->
                    </td>
                </tr>
            </thead>
            <tbody style=" border-bottom:1px solid #ddd;">
                    <!--<tr>
                    <td style="padding:10px 15px;">
                            <h1 style="margin-bottom:0px; color:#010101;">Dear ' . ucwords($name) . '</h1>
                            </td>
                    </tr>-->
                    <tr>
            <td style="padding:10px 15px;">
            <p>New user document :</p>
            <ul style="padding-left:20px;">

                <li style="margin-bottom:10px;"><strong>Name: </strong>
                    <p style="margin:0; margin-top:5px;">'.$name.'</p>
                </li>
                <!--<li style="margin-bottom:10px;">
                    <p style="margin:0; margin-top:5px;">'.$pdf_url.'</p>
                </li>-->
                
            </ul>
        </td>
    </tr>
                    <tr>
                            <td style="padding:10px 15px;">
                            <span><strong>Thanks&Regards</strong></span><br/>
                            <span>Obli Team</span>

                        </td>
                    </tr>
                    <tr>
                            <td style="background:#ddd; height:1px; width:100%;"></td>
                    </tr>
                </tbody>

                <tfoot style="background:#396196; text-align:center; color:#333;">
                    <tr>
                            <td style="color:#fff;"><p>Copyright © 2018 Obli Team all right reserved</p></td>
                    <tr>
                </tfoot>

            </table>
            </body>
            </html>';

                //Send the mails        
                require_once('class.phpmailer.php');
                // require_once('class.smtp.php');
                //include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

                    $mail = new PHPMailer;

                //Enable SMTP debugging. 
                // $mail->SMTPDebug = 3;  
                $mail->SMTPDebug = false;                             
                //Set PHPMailer to use SMTP.
                $mail->isSMTP();            
                //Set SMTP host name                          
                $mail->Host = "smtp.gmail.com";
                //Set this to true if SMTP host requires authentication to send email
                $mail->SMTPAuth = true;    
                $mail->CharSet = 'utf-8';                      
                //Provide username and password     
                $mail->Username = "satendra.tectum@gmail.com";                 
                $mail->Password = "satendra123456";                           
                //If SMTP requires TLS encryption then set it
                $mail->SMTPSecure = "tls";                           
                //Set TCP port to connect to 
                $mail->Port = 587;                                   

                $mail->From = "satendra.tectum@gmail.com";
                $mail->FromName = "Obli Team";
                // $email = "shuklasatendra7@gmail.com";
                $mail->addAddress($email, ucwords($name));
                
                $mail->addStringAttachment(file_get_contents($pdf_url), 'obliAgreement.pdf');

                $mail->isHTML(true);

                $mail->Subject = $subject;
                $mail->Body = $message;
                //$mail->AltBody = "This is the plain text version of the email content";
                $mail->IsHTML(true);

if(!$mail->send()) 
{
    //echo "Mailer Error: " . $mail->ErrorInfo;
    $response=array("status"=>"false","message" =>"Mail error: .$mail->ErrorInfo");
} 
else 
{
    // If success everythig is good send header as "OK" and user details
    $response = array("status"=>"true","message" =>"Mail send successfully!");
}
            
            

        }else{
          $response = array('status' => 'false', 'message' => 'Invalid request parameter!');
    }
        $this->json_output($response);
    }

}

$loggedin = new PdfSend();
$loggedin->pdf();

