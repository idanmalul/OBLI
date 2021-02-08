<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OBLI</title>
    <meta name="description" content="">
    <meta name="author" content="template">

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


</head>
<style>
    #content {height: 50%; margin-top: 10%; margin-bottom: 20%;}
</style>
<div id="content" data-id="<?php echo $verified_id;?>">
    <p id="redirect_status">Waiting KYC status...</p>
    <p id="redirect_url"></p>
</div>
<script>
    function check_status(){
        let id =$('#content').data('id');
        $.post("<?php echo site_url('check-verified-status'); ?>", {verified_id: id}, function (response) {
            if (response == 1) {
                $('#redirect_status').hide();
                $('#redirect_url').html('<a target="_parent" href="'+"<?php echo site_url('private8'); ?>"+'">Go to the next Step!<a/>');
            } else {
                setTimeout(function(){check_status();}, 10000);
            }
        });
    }
    check_status();
</script>
</body>
</html>