<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 footermenubar">
					<a class="footerlogo" href="<?php echo site_url('website'); ?>">
						<img src="<?php echo base_url() ?>website_assets/img/white_logo.svg" />
					</a>
					<ul class="links">

						<?php 
							// if(!empty($menu_details)){ 
							// // echo "<pre>"; print_r($menu_details); die();

							// foreach($menu_details as $menu){
							// 		$menu_order[] = $menu->set_order;
							
							// }
							// $numbers = $menu_order;
							// sort($numbers);

							// $arrlength = count($numbers);
							// for($x = 0; $x < $arrlength; $x++) {
							//     $menuData = get_menu_by_set_order($numbers[$x]);

							//     if(!empty($menuData)){

							//     	echo "<li><a href='#'>".$menuData[0]->menu_title."</a></li>";
							//     }
							// } 
						 // } 
						?>
						
						<li><a href="<?php echo site_url('policy'); ?>">מדיניות פרטיות </a></li>
						<li><a href="<?php echo site_url('terms'); ?>">תנאי השימוש</a></li>

						<?php // if(!empty($icons_details)){ 
							// echo "<pre>"; print_r($icons_details); die();

							// foreach($icons_details as $menu){
							// 		$icons_order[] = $menu->set_order;
							
							// }
							// $numbersIcon = $icons_order;
							// sort($numbersIcon);

							// $arrlength1 = count($numbersIcon);
							// for($x = 0; $x < $arrlength1; $x++) {
							//     $iconsData = get_icon_by_set_order($numbersIcon[$x]);

							//     if(!empty($iconsData)){

							//     	echo "<li><a href=""><i class='fa fa-facebook' aria-hidden='true'></i></a></li>";
							//     }
							// } 
						 // } ?>

					</ul>
				</div>
				
				<div class="col-lg-4 col-md-3 col-sm-12 col-xs-12 footer-paly-store-image">
					<ul class="playstore">

						<li>
							<a href="<?php //if(!empty($application_url_details)){ echo $application_url_details[0]->first_app_url; }else{ echo '#'; } ?> https://obli.co.il/login"><img src="<?php echo base_url() ?>website_assets/img/applestore.svg"/></a></li>
						<li>
							<a href="<?php //if(!empty($application_url_details)){ echo $application_url_details[0]->second_app_url; }else{ echo '#'; } ?> https://obli.co.il/login"><img src="<?php echo base_url() ?>website_assets/img/playstore.svg"/></a>
						</li>
						<li>
							<p>:להורדה  </p>
						</li>
					</ul>
				</div>

				<div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
					<ul class="footer-icons-obli rtl" >

						<!-- <?php if(!empty($logo_details)){ 
								foreach($logo_details as $logo){ ?>
									
									<li><img src="<?php echo base_url('uploads/logo_images').'/'.$logo->image; ?>" class="img-responsive obli02"/></li>

						<?php	}
						 } ?> -->

						<!-- <li><img src="<?php echo base_url() ?>website_assets/img/L4.png"/></li>
						<li><img src="<?php echo base_url() ?>website_assets/img/L3.png"/></li>
						<li><img src="<?php echo base_url() ?>website_assets/img/L2.png"/></li>
						<li><img src="<?php echo base_url() ?>website_assets/img/L1.png" class="partner1-img"/></li> -->

						<li>
							<a href="#">
								<img src="<?php echo base_url() ?>website_assets/img/twitter.svg" alt="twitter">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo base_url() ?>website_assets/img/instagram.svg" alt="instagram">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo base_url() ?>website_assets/img/linkedin.svg" alt="linkedin">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo base_url() ?>website_assets/img/facebook.svg" alt="facebook">
							</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</footer>

<style>
    
    
.form-control-border{
    box-shadow: 0 1px 0px #3a3078 !important;
    border-bottom: 1px solid #323474 !important;
    opacity:0.5 !important;
}

@media only screen and (max-width: 767px) and (min-width: 300px){

.navbar-nav {
    margin: -32px -15px !important;
    padding-bottom:35px;
}

}


</style>
	
	<script>
		// When the DOM is ready, run this function
		$(document).ready(function() {
		  //Set the carousel options
		  $('#quote-carousel').carousel({
			pause: true,
			interval: 4000,
		  });
		  if($('#StartModal').length) {
			$('#StartModal').modal();
			$('#StartModal .btn2').on('click', function(e) {
				e.preventDefault();
				$('#StartModal .video-container').slideToggle();
			});
		  }

		  	var $videoSrc;  
			$('.video-modal-btn').click(function() {
			    $videoSrc = $(this).data( "src" );
			    console.log($videoSrc);
			});

			// when the modal is opened autoplay it  
			$('#youtubeModal').on('shown.bs.modal', function (e) {
				// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
				$("#main_video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
			});

			// stop playing the youtube video when I close the modal
			$('#youtubeModal').on('hide.bs.modal', function (e) {
			    // a poor man's stop video
			    $("#main_video").attr('src',$videoSrc); 
			});
		});
                
                var isMobile = /iPad|iPhone|iPod/.test(navigator.userAgent);
            
        if (isMobile){ 
            
            $(".form-control").addClass("form-control-border");
    }
        
	</script>
        
   <script type="text/javascript">
            var _userway_config = {
              account: 'UAn8y2PGhU'
         };
</script>
<script type="text/javascript" src="https://cdn.userway.org/widget.js"></script>
	
</body>
</html>