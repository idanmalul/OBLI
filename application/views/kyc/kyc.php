<div id="content" data-id="<?php echo $verified_id;?>">
    <iframe class="iframe" style="height: 100vh; width: 100%;" scrolling="no" src="<?php echo $auth_url;?>" frameborder="0" allow="geolocation; microphone; camera"></iframe>
</div>
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