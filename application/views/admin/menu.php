<body class="page-body">

    <div class="page-container">
       
        <div class="sidebar-menu toggle-others fixed">

            <div class="sidebar-menu-inner">

                <header class="logo-env">

                    <!-- logo -->
                    <div class="logo">
                        <!-- <h1 class="menuLogo">OBLI ADMIN</h1> -->
                        <a href="<?php echo site_url('dashboard'); ?>" class="logo-expanded">
                            <img src="<?php echo base_url(); ?>assets/images/logo/logo.png" alt=""  />
                        </a>

                       <!--  <a href="<?php echo site_url('dashboard'); ?>" class="logo-collapsed">
                            <img src="<?php echo base_url(); ?>assets/images/logo.png" width="40" alt="" />
                        </a> -->
                         <!-- <h3 style="color:#fff">Aptech</h3>  -->
<!--                        <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" width="150" />-->
                    </div>

                    <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                    <div class="mobile-menu-toggle visible-xs">
                        <a href="#" data-toggle="user-info-menu">
                            <i class="fa-arrow-down"></i>
                            <!--<span class="badge badge-success">7</span>-->
                        </a>

                        <a href="#" data-toggle="mobile-menu">
                            <i class="fa-bars"></i>
                        </a>
                    </div>

                </header>

                <ul id="main-menu" class="main-menu">
                    <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                    <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                    <li <?php if($this->uri->segment(1) == 'dashboard'){ ?>class="active"
                        <?php } ?>>
                            <a href="<?php echo site_url('dashboard'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Front UI</span>
                            </a>
                    </li>

                    <li <?php if($this->uri->segment(1) == 'coming_soon'){ ?>class="active"
                        <?php } ?>>
                            <a href="<?php echo site_url('coming_soon'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Coming Soon</span>
                            </a>
                    </li>

                    <h3 style="color: #31d7e8;">Website</h3>

                    <li <?php if($this->uri->segment(1) == 'banner'){ ?>class="active"
                        <?php } ?>>
                            <a href="<?php echo site_url('banner'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Banner Section 1</span>
                            </a>
                    </li>

                    <li <?php if($this->uri->segment(1) == 'section2'){ ?>class="active"
                        <?php } ?>>
                            <a href="<?php echo site_url('section2'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Section 2</span>
                            </a>
                    </li>

                    <li <?php if($this->uri->segment(1) == 'testmonial'){ ?>class="active"
                        <?php } ?>>
                            <a href="<?php echo site_url('testmonial'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Testimonial Section 3</span>
                            </a>
                    </li>

                    <li <?php if($this->uri->segment(1) == 'section4'){ ?>class="active"
                        <?php } ?>>
                            <a href="<?php echo site_url('section4'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Section 4</span>
                            </a>
                    </li>

                    <li <?php if($this->uri->segment(1) == 'section5'){ ?>class="active"
                        <?php } ?>>
                            <a href="<?php echo site_url('section5'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Section 5</span>
                            </a>
                    </li>

                    <li <?php if($this->uri->segment(1) == 'menu' || $this->uri->segment(2) == 'menu_list' || $this->uri->segment(2) == 'add_menu' || $this->uri->segment(2) == 'edit_menu' || $this->uri->segment(1) == 'icons' || $this->uri->segment(2) == 'add_icon' || $this->uri->segment(2) == 'edit_icon' || $this->uri->segment(2) == 'icon_list' || $this->uri->segment(1) == 'links' || $this->uri->segment(2) == 'add_app_url' || $this->uri->segment(2) == 'edit_app_url'){ ?> class="active opened active" <?php } ?> >
                        <a href="layout-variants.html">
                            <i class="linecons-desktop"></i>
                            <span class="title">Footer Section</span>
                        </a>
                        <ul>

                            <li <?php if($this->uri->segment(1) == 'menu'){ ?> class="active" <?php } ?> >
                                <a href="<?php echo site_url('menu'); ?>">
                                    <span class="title">Menu</span>
                                </a>
                            </li>

                            <!-- <li <?php if($this->uri->segment(1) == 'icons'){ ?> class="active" <?php } ?> >
                                <a href="<?php echo site_url('icons'); ?>">
                                    <span class="title">Icons</span>
                                </a>
                            </li> -->

                            <li <?php if($this->uri->segment(1) == 'links'){ ?> class="active" <?php } ?> >
                                <a href="<?php echo site_url('links'); ?>">
                                    <span class="title">Application link</span>
                                </a>
                            </li>

                           <!--  <li>
                                <a href="layout-horizontal-menu.html">
                                    <span class="title">Horizontal Menu</span>
                                </a>
                            </li> -->

                            
                        </ul>
                    </li>

                    <!-- About us section menu -->

                    <li <?php if($this->uri->segment(1) == 'about_us'){ ?>class="active"
                        <?php } ?>>
                            <a href="<?php echo site_url('about_us'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">About Us</span>
                            </a>
                    </li>
                    
                    <!--website form-->
                    <h3 style="color: #31d7e8;">Website => Form</h3>
                    
                    <!--company menu for business flow-->
                    <li <?php if($this->uri->segment(1) == 'company'){ ?>class="active"
                        <?php } ?>>
                            <a href="<?php echo site_url('company'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Company</span>
                            </a>
                    </li>
                    
                    <li <?php if($this->uri->segment(1) == 'checkPaymentDetails'){ ?>class="active"
                        <?php } ?>>
                            <a href="<?php echo site_url('checkPaymentDetails'); ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">API Req Res Details</span>
                            </a>
                    </li>

                </ul>

            </div>

        </div>

        <div class="main-content">

            <nav class="navbar user-info-navbar" role="navigation" style="height: 160px;">


                <!-- User Info, Notifications and Menu Bar -->

                <!-- Left links for user info navbar -->
                <!--<ul class="user-info-menu left-links list-inline list-unstyled">

                    <li class="hidden-sm hidden-xs">
                        <a href="#" data-toggle="sidebar">
                            <i class="fa-bars"></i>
                        </a>
                    </li>

                </ul>-->
                <!-- Left links for user info navbar -->
                <ul class="user-info-menu left-links list-inline list-unstyled">

<!--                    <li class="hidden-sm hidden-xs">
                        <a href="#" data-toggle="sidebar">
                            <i class="fa-bars"></i>
                        </a>
                    </li>-->
<!--                    <li class="dropdown hover-line">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa-bell-o"></i>
                            <span class="badge badge-green" id="count_notif">15</span>
                        </a>

                        <ul class="dropdown-menu messages">
                            <li>
                                <ul class="dropdown-menu-list list-unstyled ps-scrollbar" id="noti_list">

                                </ul>
                            </li>

                            <li class="external">
                                <a href="#">
                                    <span>Close</span>
                                    <i class="fa-link-ext"></i>
                                </a>
                            </li>
                        </ul>
                    </li>-->

<!--                    <li class="dropdown hover-line">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa-comments-o"></i>
                            <span id="chat_count" class="badge badge-purple"></span>
                        </a>

                        <ul class="dropdown-menu notifications">
                            <li class="top">
                                <p class="small">
              You have <strong id="count_chat_notif">0</strong> new messages.
                                </p>
                            </li>

                            <li>
                                <ul class="dropdown-menu-list list-unstyled ps-scrollbar" id="chat_list">

                                </ul>
                            </li>

                            <li class="external">
                                <a href="#">
                                    <span>Close</span>
                                    <i class="fa-link-ext"></i>
                                </a>
                            </li>
                        </ul>
                    </li>-->

                </ul>

                <!-- Right links for user info navbar -->
                <ul class="user-info-menu right-links list-inline list-unstyled">

                    <li class="dropdown user-profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 55px;">
                            <img src="<?php echo base_url(); ?>assets/images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
                            <span>
                                <?php
                                if ($this->session->userdata('admin_email'))
                                    echo $this->session->userdata('admin_email');
                                ?>
                                <i class="fa-angle-down"></i>
                            </span>
                        </a>

                        <ul class="dropdown-menu user-profile-menu list-unstyled">
                            <li>
                                <a href="<?php echo site_url('change-password'); ?>">
                                    <i class="fa-wrench"></i> Change Password
                                </a>
                            </li>
                            <li class="last">
                                <a href="<?php echo site_url('logout'); ?>">
                                    <i class="fa-lock"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
                
            </nav>

<!-- Modal 4 (Confirm)-->
	<div class="modal fade" id="modal-4" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<h4 class="modal-title">Alert</h4>
				</div>
				
				<div class="modal-body" id="AlertMsgId">
				
					New Tablet Added! Please allocate to student!
					
				</div>
				
				<div class="modal-footer" id="AlertButtonId">
                                    <a href="<?php echo site_url('admin/tablet_allocation'); ?>"><button type="button" class="btn btn-info" >Continue</button></a>
				</div>
			</div>
		</div>
	</div>

            
            
