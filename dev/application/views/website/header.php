<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OBLI</title>
    <meta name="description" content="">
    <meta name="author" content="template">l

    <link rel="icon" href="<?php echo base_url() ?>website_assets/img/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>website_assets/img/webclip.png"/>

    <link rel="stylesheet" href="<?php echo base_url() ?>website_assets/css/bootstrap.min.css" />
    <script src="<?php echo base_url() ?>website_assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>website_assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/font-awesome/css/font-awesome.css" />
	
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Assistant&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/css/style1.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/css/jinvertscroll.css" type="text/css" media="all">
	
	<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/css/css.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/css/formsmain.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/css/readyclass.min.css" type="text/css" media="all">
	<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
	<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js"></script>
	
	
	
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MTGJKKL');</script>
<!-- End Google Tag Manager -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MTGJKKL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	
</head>
	
<body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top navbar-header">
			<div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed togglebutton" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand leftnavbar" href="<?php echo site_url('website'); ?>"><img src="<?php echo base_url() ?>website_assets/img/logo.png" class="img-responsive"/></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
				    
				    <?php if($this->uri->segment(2) != 'userdashboard'){ ?>
					<!--<ul class="nav navbar-nav navbar-center lstcenternaviation" style='float:left !important;'>
					    <li style='left:0px !important;'><a href="<?php echo site_url('mamberboard'); ?>" <?php if (base_url(uri_string()) == site_url('login') || base_url(uri_string()) == site_url('login/varify')) { echo 'class=active'; } ?>> אזור אישי </a>
					    </li>
					   
					</ul>-->
				  <?php } ?>
				  
					<ul class="nav navbar-nav navbar-center lstcenternaviation">
					    <?php if($this->uri->segment(1) != 'website'){?>
						<li><a href="<?php echo site_url('website'); ?>" <?php if (base_url(uri_string()) == site_url('website')) { echo 'class=active'; } ?>> עמוד הבית </a>
						</li>
						<?php } ?>
						
						<li><a href="<?php echo site_url('business1'); ?>" <?php if (base_url(uri_string()) == site_url('business1')) { echo 'class=active'; } ?>>עסקי</a></li>
						
						<li><a href="<?php echo site_url('private1'); ?>" <?php if (base_url(uri_string()) == site_url('private1')) { echo 'class=active'; } ?>>פרטי</a></li>
						<!-- <li><a href="<?php echo site_url('aboutus'); ?>">אודות   </a></li> -->
						
						<li><a href="<?php echo site_url('faq'); ?>" <?php if (base_url(uri_string()) == site_url('faq')) { echo 'class=active'; } ?>>שאלות ותשובות </a></li>
						<li><a href="<?php echo site_url('contactus'); ?>" <?php if (base_url(uri_string()) == site_url('contactus')) { echo 'class=active'; } ?>>צור קשר   </a></li>
					    
					</ul>
					
					<ul class="nav navbar-nav navbar-right navigation-right logo">
						<a class="navbar-brand" href="<?php echo site_url('website'); ?>"><img src="<?php echo base_url() ?>website_assets/img/logo.png" class="img-responsive"/></a>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
			<div class="header_hr-line"></div>
		</nav>
	</header>