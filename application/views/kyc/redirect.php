<style>
    #content {height: 50%; margin-top: 10%; margin-bottom: 20%;}
</style>

<div id="content" data-id="<?php echo $verified_id;?>">Waiting KYC status...</div>

<script>
    function check_status(){
        let id =$('#content').data('id');
        $.post("<?php echo site_url('check-verified-status'); ?>", {verified_id: id}, function (response) {
            console.log(response);
            if (response.success == true) {
                alert('Your record successfully saved!');
                window.location.href = "<?php echo site_url('private8'); ?>";
            } else {
                setTimeout(function(){check_status();}, 10000);
            }
        });
    }
    check_status();
</script>