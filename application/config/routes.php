<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['welcomeObli'] = 'website/welcomeObli';


// for admin
$route['dashboard'] = 'admin';
$route['logout'] = 'admin/logout';
$route['change-password'] = 'admin/change_pass';
$route['change-status'] = 'admin/change_status';
$route['coming_soon'] = 'admin/coming_soon';


// website admin
$route['banner'] = 'admin/banner';
$route['section2'] = 'admin/content_section';
$route['testmonial'] = 'admin/testmonial_section_3';
$route['section4'] = 'admin/content_section_4';
$route['section5'] = 'admin/content_section_5';
$route['menu'] = 'admin/menu_list';
$route['icons'] = 'admin/icon_list';
$route['links'] = 'admin/application_link_list';
$route['about_us'] = 'admin/aboutus';
$route['checkPaymentDetails'] = 'admin/check_payment_details';


// website
$route['aboutus'] = 'website/aboutus';
$route['contactus'] = 'website/contactus';
$route['faq'] = 'website/faq';
$route['terms'] = 'website/terms';
$route['policy'] = 'website/policy';
$route['tenant'] = 'website/tenant';

// Private forms
$route['private1'] = 'privateFlow/private_Form1';
$route['private2'] = 'privateFlow/private_Form2';
$route['private31'] = 'privateFlow/private_Form3_1';
$route['private32'] = 'privateFlow/private_Form3_2';
//$route['private41'] = 'privateFlow/private_Form4_1';
$route['private42'] = 'privateFlow/private_Form4_2';
$route['private52'] = 'privateFlow/private_Form5_2';
$route['private6'] = 'privateFlow/private_Form6';
$route['private7'] = 'privateFlow/private_Form7';
$route['private8'] = 'privateFlow/private_Form8';
$route['private9'] = 'privateFlow/private_Form9';
$route['private10/(:any)/(:any)'] = 'privateFlow/private_Form10';
$route['privateBadResponse'] = 'privateFlow/privateBadResponse';
$route['privatePaymentSuccess'] = 'privateFlow/privatePaymentSuccess';
$route['privatePaymentFailed'] = 'privateFlow/privatePaymentFailed';

// business routing
$route['business1'] = 'website/business_Form1';
$route['business2'] = 'website/business_Form2';
$route['business3'] = 'website/business_Form3';
$route['business4'] = 'website/business_Form4';
$route['business5'] = 'website/business_Form5';
$route['business6'] = 'website/business_Form6';
$route['business7'] = 'website/business_Form7';
$route['business8'] = 'website/business_Form8';
$route['business9'] = 'website/business_Form9';
$route['business10'] = 'website/business_Form10';
$route['business11'] = 'website/business_Form11';
$route['business12/(:any)/(:any)'] = 'website/business_Form12';
$route['businessFirstPaymentPage'] = 'website/businessFirstPaymentPage';
$route['businessFirstBadResponse'] = 'website/businessFirstBadResponse';
$route['business1PaymentSuccess'] = 'website/business1PaymentSuccess';

$route['business1PaymentFailed'] = 'website/business1PaymentFailed';
$route['paymentBadResponse'] = 'website/paymentBadResponse';

// business sec screen routing
$route['businessSec1'] = 'BusinessSec/business_sec_Form1';
$route['businessSec2'] = 'BusinessSec/business_sec_Form2';
$route['businessSec3'] = 'BusinessSec/business_sec_Form3';
$route['businessSec4'] = 'BusinessSec/business_sec_Form4';
$route['businessSec5'] = 'BusinessSec/business_sec_Form5';
$route['businessSec6'] = 'BusinessSec/business_sec_Form6';
$route['businessSec7'] = 'BusinessSec/business_sec_Form7';
$route['businessSec8'] = 'BusinessSec/business_sec_Form8';
$route['businessSecBadResponse'] = 'BusinessSec/businessSecBadResponse';
$route['businessSecPaymentPage'] = 'BusinessSec/businessSecPaymentPage';

$route['business2PaymentSuccess'] = 'BusinessSec/business2PaymentSuccess';
$route['business2PaymentFailed'] = 'BusinessSec/business2PaymentFailed';

// business third screen routing
$route['businessThird1'] = 'BusinessThird/business_third_Form1';
$route['businessThird2'] = 'BusinessThird/business_third_Form2';
$route['businessThird3'] = 'BusinessThird/business_third_Form3';
$route['businessThird4'] = 'BusinessThird/business_third_Form4';
$route['businessThird5'] = 'BusinessThird/business_third_Form5';
$route['businessThird6'] = 'BusinessThird/business_third_Form6';
$route['businessThird7'] = 'BusinessThird/business_third_Form7';
$route['businessThird8'] = 'BusinessThird/business_third_Form8';
$route['businessThird9/(:any)/(:any)'] = 'BusinessThird/business_third_Form9';
$route['businessThirdBadResponse'] = 'BusinessThird/businessThirdBadResponse';
$route['businessThirdPaymentPage'] = 'BusinessThird/businessThirdPaymentPage';

$route['business3PaymentSuccess'] = 'BusinessThird/business3PaymentSuccess';
$route['business3PaymentFailed'] = 'BusinessThird/business3PaymentFailed';

// business fourth screen routing
$route['businessFourth1'] = 'BusinessFourth/business_fourth_Form1';
$route['businessFourth2'] = 'BusinessFourth/business_fourth_Form2';
$route['businessFourth3'] = 'BusinessFourth/business_fourth_Form3';
$route['businessFourth4'] = 'BusinessFourth/business_fourth_Form4';
$route['businessFourth5'] = 'BusinessFourth/business_fourth_Form5';
$route['businessFourth6'] = 'BusinessFourth/business_fourth_Form6';
$route['businessFourth7'] = 'BusinessFourth/business_fourth_Form7';
$route['businessFourth8'] = 'BusinessFourth/business_fourth_Form8';
$route['businessFourth9'] = 'BusinessFourth/business_fourth_Form9';
$route['businessFourthBadResponse'] = 'BusinessFourth/businessFourthBadResponse';
$route['businessFourthPaymentPage'] = 'BusinessFourth/businessFourthPaymentPage';

$route['business4PaymentSuccess'] = 'BusinessFourth/business4PaymentSuccess';
$route['business4PaymentFailed'] = 'BusinessFourth/business4PaymentFailed';

// Website forms
$route['company'] = 'admin/company_list';

// Fully Verified
$route['kyc'] = 'FullyVerified/kyc';
$route['verification-data'] = 'FullyVerified/get_verification_data';
$route['verification-status'] = 'FullyVerified/set_verification_status';
$route['check-verified-status'] = 'FullyVerified/check_verified_status';