<?php 
/*
$tranzila_api_host  =  'secure5.tranzila.com'; 
$tranzila_api_path  =  'cgi-bin/tranzila71u.cgi' ;
 
// Prepare transaction parameters 
$query_parameters ['supplier']  =  'getintest' ; // 'TERMINAL_NAME' should be replaced by actual terminal name 
$query_parameters ['sum']  =  '5' ;  // Transaction sum 
$query_parameters ['currency']  =  '2' ;  // Type of currency 1 euro, 2 USD, 978 EUR, 826 GBP, 392 JPY 
$query_parameters ['ccno']  =  '12312312' ;  // Test card number 
$query_parameters ['expdate'] =  '0820' ;  // Card expiry date: mmyy 
$query_parameters ['myid']  =  '12312312' ;  // ID number if required 
$query_parameters ['mycvv']  =  'mycvv' ;  // number if required 
$query_parameters ['cred_type']  =  '1' ;  // This field specifies the type of transaction, 1 - normal transaction, 6 - credit, 8 - payments 
$query_parameters ['TranzilaPW']  =  'TranzilaPW' ; 

$query_string  =  '' ; 
foreach  ( $query_parameters  as  $name  =>  $value )  { 
	$query_string .=$name.'='.$value.'&'; 
}
 
$query_string  =  substr ( $query_string ,  0 ,  - 1 ) ;  // Remove trailing '&'
 
// Initiate CURL 
$cr  =  curl_init ( ) ;
 
curl_setopt ( $cr , CURLOPT_URL ,  "https://$tranzila_api_host/$tranzila_api_path" ) ; 
curl_setopt ( $cr , CURLOPT_POST ,  1 ) ; 
curl_setopt ( $cr , CURLOPT_FAILONERROR ,  true ) ; 
curl_setopt ( $cr , CURLOPT_POSTFIELDS ,  $query_string ) ; 
curl_setopt ( $cr , CURLOPT_RETURNTRANSFER ,  1 ); 
curl_setopt ( $cr , CURLOPT_SSL_VERIFYPEER ,  0 ) ;
 
// Execute request 
$result  =  curl_exec ( $cr ) ; 
$error  =  curl_error ( $cr ) ;
if  ( ! empty ( $error ) )  { 
	die  ( $error ) ; 
} 
// print_r($result);die();

curl_close ( $cr ) ;

// Preparing associative array with response data 
$response_array  =  explode ('&' ,  $result ) ; 
$response_assoc  =  array ( ) ; 
if  ( count ( $Response_array )  >  1 )  { 
	foreach  ( $Response_array  as  $value )  { 
		$tmp  =  explode ('=' ,  $value) ; 
		if  ( count ( $tmp )  > 1 )  { 
			$response_assoc [ $tmp [ 0 ] ]  =  $tmp [ 1 ] ; 
		} 
	} 
} 
// Analyze the result string 
if  (!Isset($response_assoc['Response'])){ 
	die($result."\n"); 
	/**
	 * When there is no 'Response' parameter it either means
	 * that some pre-transaction error happened (like authentication
	 * problems), in which case the result string will be in HTML format,
	 * explaining the error, or the request was made for generate token only
	 * (in this case the response string will only contain 'TranzilaTK'
	 * parameter)
	 * 
} else if($response_assoc['Response']!=='000')  { 
	die($response_assoc['Response']."\n") ; 
	// Any other than '000' code means transaction failure 
	// (bad card, expiry, etc ..) 
}  else  { 
	die("Success\n"); 
}
 */
?>


<!--<form ACTION="https://direct.tranzila.com/getintest/" method="POST" >
<input type="hidden" name="expyear" value="2015">
<input type="hidden" name="pdesc" value="Def">
<input type="hidden" name="currency" value="1">
<input type="hidden" name="sum" value="18.99">
<input type="hidden" name="oldprice" value="19.99">
<input type="hidden" name="success_url_address" value="http://oblidev.malul.xyz/webservices/payment_success.php">
<input type="hidden" name="fail_url_address" value="http://oblidev.malul.xyz/webservices/payment_failed.php">
<input type="hidden" name="notify_url_address" value="http://oblidev.malul.xyz/webservices/payment_success.php">
<input type="hidden" name="TranzilaToken"
value="some=value&andother=fdds">
<h2>Optional fields</h2>
<b>Customer full name</b> <br>
<input type="text" name="contact" value="Moshe"><br><br>
<b>Company</b> <br>
<input type="text" name="company" value="My Company"><br><br>
<b>Email</b> <br>
<input type="text" name="email" value="some@email.co.il"><br><br>
<b>Phone</b> <br>
<input type="text" name="phone"
value="00000000"><br><br>
<h2>Payments</h2>
<b>cred_type</b> <br>
<input type="text" name="cred_type" value="8"><br><br>
<b>fpay</b> <br>
<input type="text" name="fpay" value="4.99"><br><br>
<b>spay</b> <br>
<input type="text" name="spay" value="5"><br><br>
<b>npay</b> <br>
<input type="text" name="npay" value="2"><br><br>
<p><input type="submit" value=" Send ">
</form>-->
<!--<iframe src="https://direct.tranzila.com/getintest/iframe.php?nologo=1&tranmode=VK&hidesum=1&sum=0.5&currency=1&cred_type=1&lang=il&contact=idan+malul&email=idaalul%2540gmail.com&phone=0506876131&payment_id=729700&u71=1&DclickTK=729700&success_url_address=http://oblidev.malul.xyz/webservices/payment_success.php&fail_url_address=http://oblidev.malul.xyz/webservices/payment_failed.php&notify_url_address=http://oblidev.malul.xyz/webservices/payment_success.php&event_id=23138&producer_id=56762&apayments=0&env=prod&template=custom" style="width: 1370px;height: 855px;"></iframe>-->

<!--<form action="/process/" class="round" method="post" id="itranpayform" autocomplete="off">
<input type="hidden" id="sum" name="sum" value="" /><input type="hidden" id="supplier" name="supplier" value="terminalname" /><input type="hidden" id="currency" name="currency" /><ul>
<li>
<label for="ccno"><span id="lang_ccno">Card Number</span><span class="ast">*</span></label>
<input type="text" name="ccno" id="ccno" autocomplete="off" /></li>
<li>
<label for="expmonth"><span id="lang_expiration">Expiration</span><span class="ast">*</span></label>
<select name="expmonth" id="expmonth" style="width:50px;"><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select><span> / </span>
<select name="expyear" style="width:77px;" id="expyear"><option value="14">2014</option><option value="15">2015</option><option value="16">2016</option><option value="17">2017</option><option value="18">2018</option><option value="19">2019</option><option value="20">2020</option><option value="21">2021</option></select></li>
<li>
<label for="mycvv"><a href="#" onclick="window.open('/docs/window-cvv-eng.html', '_blank', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=350,height=230, top=' + (parseInt((screen.availHeight/2) - 115)) + ',left='+(parseInt((screen.availWidth/2) - 175)));">CVV</a>:<span class="ast">*</span></label>
<input type="text" name="mycvv" id="mycvv" style="width:40px;" size="4" maxlength="4" /></li>
<li id="sumli">
</li>
<li id="send"><button id="submitbtn" type="button" onclick="ichecknrun(required,'cc');">Process</button>
</li>-->
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://obli-backend.herokuapp.com/webservices/amountValue.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_id\"\r\n\r\n144\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
    "postman-token: 58331f19-f7dc-4082-892f-f34a7cadc845"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  //echo "cURL Error #:" . $err;
} else {
  //echo $response;
}

?>
<html>
<head>
<style> 
    #NagishLiTag{
        display: none;
    }
        </style> 
		<body style="margin:0px;padding:0px;overflow:hidden;">
		<div class="row">
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">		
<form id="ttt111" target="iframe_tranzila" method="post" action="https://direct.tranzila.com/obli1/iframe.php?template=custom&nosubmitlabel=1"  style="width:100%;hieght:100%;">
    <input type="hidden" name="expyear" value="2015">
<input type="hidden" name="pdesc" value="Def">
<input type="hidden" name="currency" value="1">
<input type="hidden" name="sum" value="18.99">
<input type="hidden" name="oldprice" value="19.99">
<input type="hidden" name="myid" value="123456">
<input type="hidden" name="success_url_address" value="http://oblidev.malul.xyz/webservices/payment_success.php">
<input type="hidden" name="fail_url_address" value="http://oblidev.malul.xyz/webservices/payment_failed.php">
<input type="hidden" name="notify_url_address" value="http://oblidev.malul.xyz/webservices/payment_success.php">
<input type="hidden" name="TranzilaToken"
value="some=value&andother=fdds">
<input type="hidden" name="contact" value="Anshul">
<input type="hidden" name="company" value="OBLI">
</form>
</div>
</div>
<script type="text/javascript">
    //document.getElementById('ttt111').submit();
    //document.getElementById("NagishLiTag").style.display = "none"; 
</script>
<!-- <iframe name="iframe_tranzila" style="overflow:hidden;height:100vh;width:100%;" height="100%" width="100%" frameBorder="0"></iframe> -->
<script type="text/javascript">
    document.getElementById('ttt111').submit();
    //document.getElementById("NagishLiTag").style.display = "none"; 
</script>

<!-- <form action="/process/" class="round" method="post" id="itranpayform" autocomplete="off">
<input type="hidden" id="sum" name="sum" value="" /><input type="hidden" id="supplier" name="supplier" value="terminalname" /><input type="hidden" id="currency" name="currency" /><ul>
<li>
<label for="ccno"><span id="lang_ccno">Card Number</span><span class="ast">*</span></label>
<input type="text" name="ccno" id="ccno" autocomplete="off" /></li>
<li>
<label for="expmonth"><span id="lang_expiration">Expiration</span><span class="ast">*</span></label>
<select name="expmonth" id="expmonth" style="width:50px;"><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select><span> / </span>
<select name="expyear" style="width:77px;" id="expyear"><option value="14">2014</option><option value="15">2015</option><option value="16">2016</option><option value="17">2017</option><option value="18">2018</option><option value="19">2019</option><option value="20">2020</option><option value="21">2021</option></select></li>
<li>
<label for="mycvv"><a href="#" onclick="window.open('/docs/window-cvv-eng.html', '_blank', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=350,height=230, top=' + (parseInt((screen.availHeight/2) - 115)) + ',left='+(parseInt((screen.availWidth/2) - 175)));">CVV</a>:<span class="ast">*</span></label>
<input type="text" name="mycvv" id="mycvv" style="width:40px;" size="4" maxlength="4" /></li>
<li id="sumli">
</li>
<li id="send"><button id="submitbtn" type="button" onclick="ichecknrun(required,'cc');">Process</button>
</li> -->

<!-- <iframe src="https://direct.tranzila.com/obli1/iframe.php?template=custom&nosubmitlabel=1&sum=0.5&currency=1&cred_type=1&lang=il&contact=idan+malul&email=idaalul%2540gmail.com&success_url_address=http://oblidev.malul.xyz/webservices/payment_success.php&fail_url_address=http://oblidev.malul.xyz/webservices/payment_failed.php&notify_url_address=http://oblidev.malul.xyz/webservices/payment_success.php" style="width: 100%;height: 100%"></iframe> -->

	<!-- https://direct.tranzila.com/obli1/iframe.php?template=custom&nosubmitlabel=1 -->

	</body>
	</head>
	</html>