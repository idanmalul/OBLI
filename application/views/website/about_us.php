<style type="text/css">
	/*** responsive_doc end ***/

/*** responsive_doc start =header ***/
.header_hr-line{
    width: 100%;
    background: linear-gradient(to right,#2ab2f4,#7b6be7);
    height: 1.03px;
}
@media only screen and (max-width:3000px) and (min-width: 1311px){
.navbar-brand {
    padding: 20px 175px;
}
.logo img {
    width: 63px;
    height: 35px;
}
.navbar-default .navbar-nav>li>a{
    color: #3A3078 !important;
    font-weight: normal;
    font-size: 20.6154px;
    padding: 20px;
    margin-top: -15px;
    padding-left: 40px;
}

.navbar-header{
    min-height: 90px !important;
    box-shadow: 0px 5.15385px 4.12308px rgba(55, 68, 255, 0.05);
}
}
@media only screen and (max-width:1310px) and (min-width: 992px){
.navbar-brand {
    padding: 17px 150px;
}
.logo img {
    width: 63px;
    height: 35px;
}
.navbar-default .navbar-nav>li>a{
    color: #3A3078 !important;
    font-weight: normal;
    font-size: 20.6154px;
    padding: 14px;
    margin-top: -15px;
}
.navbar-header{
    min-height: 75px !important;
    box-shadow: 0px 5.15385px 4.12308px rgba(55, 68, 255, 0.05);
}
}
@media only screen and (max-width:991px) and (min-width: 769px){
.navbar-brand {
    padding: 15px 0px;
}
.logo img {
    width: 63px;
    height: 35px;
}
.navbar-default .navbar-nav>li>a{
    color: #3A3078 !important;
    font-weight: normal;
    font-size: 20.6154px;
    padding: 14px;
    margin-top: -15px;
}
.navbar-center{
    width: 65%;
    left: 46%;
}
.navbar-header{
    min-height: 75px !important;
    box-shadow: 0px 5.15385px 4.12308px rgba(55, 68, 255, 0.05);
}
}
@media only screen and (width:768px) {
.navbar-brand {
    padding: 10px 25px;
}
.logo img {
    width: 63px;
    height: 35px;
}
.navbar-default .navbar-nav>li>a{
    color: #3A3078 !important;
    font-weight: normal;
    font-size: 20.6154px;
    padding: 14px;
    margin-top: 10px;
}
.navbar-center{
    width: 65%;
    left: 46%;
}
.navbar-header{
    min-height: 75px !important;
    box-shadow: 0px 5.15385px 4.12308px rgba(55, 68, 255, 0.05);
}
.header_hr-line{
    margin-top: -250px;
}
}
@media only screen and (max-width:767px) and (min-width: 320px){
.navbar-default .navbar-nav>li>a{
    color: #3A3078 !important;
    font-weight: normal;
    font-size: 20.6154px;
}
}
/*** responsive_doc end =header ***/
</style>
<div id="content" class="about">
		<div class="page-top">
			<h1 class="page-title rtl"><?php if(!empty($aboutus_detail)){ echo $aboutus_detail[0]->title; } ?></h1>
			<div class="img-wrapper" data-fix-height="img" style="height: 337px;">
			
					<img class="main-image img_desktop" src="<?php echo base_url('uploads/aboutus').'/'.$aboutus_detail[0]->banner_image; ?>" alt="" data-fix-height="img" style="height: 337px;">
					<img class="main-image img_mobile" src="<?php echo base_url('uploads/aboutus').'/'.$aboutus_detail[0]->banner_image; ?>" alt="" data-fix-height="img" style="height: 337px;">
			</div>
		</div>

		<div class="main">
			<p class="about-text rtl">
			<?php if(!empty($aboutus_detail)){ echo $aboutus_detail[0]->sub_title; } ?></p>
		
			</div>
			<div class="team">

				<h2 class="about-team rtl">השותפים שלנו</h2>

				<div class="flexbox flexbox-partners rtl">

				<!-- Home icons images -->
				<?php if(!empty($logo_details)){ 
					foreach($logo_details as $logo){ ?>
						<div class="flexcolumn">
							<img class="team-img" src="<?php echo base_url('uploads/logo_images').'/'.$logo->image; ?>" />
						</div>
						<p class="breaker"></p>	

				<?php } } ?>


				<!-- Partners icon images -->
				<?php if(!empty($partner_icons_details)){ foreach($partner_icons_details as $icons){ ?>
					<div class="flexcolumn">
						<img class="team-img" src="<?php echo base_url('uploads/aboutus/partner_icons').'/'.$icons->image; ?>" alt="">
					</div>
					<p class="breaker"></p>

				<?php } } ?>	

					

							
				</div>

			</div>
		</div>