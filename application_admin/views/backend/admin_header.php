<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta name="Description" content="HTML5 Bootstrap Admin Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin template,admin website templates,analytics,analytics admin,analytics dashboard,bootstrap admin template,bootstrap analytics dashboard,bootstrap dashboard,css admin template,css dashboard template,dashboard html5,digital marketing analytics,html web app template,html5 dashboard template,marketing analytics,nice admin template,simple admin template,site analytics,web admin template,web app template,web dashboard templates">

		<!-- Favicon -->
    <link rel="icon" href="<?php base_url('/assets_admin/img/brand/favicon.ico') ?>" type="image/x-icon" />


		<!-- Title -->
		<title>Admin</title>

		<!-- Font Awesome -->
		<link href="<?= base_url("/assets_admin/plugins/fontawesome-free/css/all.min.css")?>" rel="stylesheet">

		<!-- Bootstrap -->
		<link href="<?= base_url("/assets_admin/plugins/bootstrap/css/bootstrap.min.css")?>" rel="stylesheet">

		<!-- Ionicons -->
		<link href="<?= base_url("/assets_admin/plugins/ionicons/css/ionicons.min.css")?>" rel="stylesheet">

		<!-- Typicons -->
		<link href="<?= base_url("/assets_admin/plugins/typicons.font/typicons.css")?>" rel="stylesheet">

		<!-- Sidebar css -->
		<link href="<?= base_url("/assets_admin/plugins/sidebar/sidebar.css")?>" rel="stylesheet">

		<!-- Horizontal-Menu css-->
		<link id="switcher" href="<?= base_url("/assets_admin/plugins/horizontal-menu/horizontal-menu.css")?>" rel="stylesheet">

		<!-- Custom Scroll bar-->
		<link href="<?= base_url("/assets_admin/plugins/mscrollbar/jquery.mCustomScrollbar.css")?>" rel="stylesheet"/>

		<!-- fullcalendar Css-->
		<link href="<?= base_url("/assets_admin/plugins/fullcalendar/fullcalendar.min.css")?>" rel="stylesheet">

		<!-- select2 Css-->
		<link href="<?= base_url("/assets_admin/plugins/select2/css/select2.min.css")?>" rel="stylesheet">

		<!-- Style Css-->
		<link href="<?= base_url("/assets_admin/css/dashboard-one.css")?>" rel="stylesheet">
		<link href="<?= base_url("/assets_admin/css/dashboard-one-dark.css")?>" rel="stylesheet">

		<!-- Icon Style -->
		<link href="<?= base_url("/assets_admin/css/icons.css")?>" rel="stylesheet">

        <!-- dataTables -->
        <link href="<?= base_url("/assets_admin/plugins/datatable/css/dataTables.bootstrap4.min.css") ?>" rel="stylesheet" />
		<link href="<?= base_url("/assets_admin/plugins/datatable/css/buttons.bootstrap4.min.css") ?>" rel="stylesheet">
		<link href="<?= base_url("/assets_admin/plugins/datatable/responsive.bootstrap4.min.css") ?>" rel="stylesheet" />
		

        <!-- Custom root  -->
        <link href="<?= base_url('/assets_admin/css/root.css') ?>" rel="stylesheet">

        		<!-- jquery.simple-dtpicker css -->
		<link href="<?= base_url("/assets_admin/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css")?>" rel="stylesheet">

        <!-- Picker.min css -->
        <link href="<?= base_url("/assets_admin/plugins/pickerjs/picker.min.css")?>"  rel="stylesheet" >

		<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">

	</head>

	<style>
		.main-logo{
			font-size: .8rem;
			width: 50px;
			height: 50px;
		}
	</style>
	<body class="main-body">

		<!-- Loader -->
		<div id="loading">
			<img src="<?= base_url("/assets_admin/img/loader1.svg")?> " class="loader-img" alt="Loader">
		</div>
    

    <!-- main-header -->
    <div class="main-header hor-header">
        <div class="container">
            <div class="main-header-left">
                <!--logo-->
             <!--    <div>
                    <a class="main-logo desktop-logo" href="<?= base_url("/Admin/") ?>"><img src="<?= base_url("assets_admin/img/LOGO-buddymotor.png") ?>" alt="logo"/> </a>
                    <a class="main-logo mobile-logo" href="<?= base_url("/Admin/") ?>"><img src="<?= base_url('/assets_admin/img/LOGO-buddymotor.png') ?>" alt="logo"></a>
                    <a class="main-logo dark-theme-logo" href="<?= base_url("/Admin/") ?>"><img src="<?= base_url('/assets_admin/img/LOGO-buddymotor.png') ?>" alt="logo"></a>
					
                </div> -->
                <!--/logo-->
                <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>

            </div>
            <div class="main-header-right ml-auto">
             <!--    <div class="dropdown main-header-search mobile-search">
                    <a class="new header-link" href="">
                        <i class="header-icons" data-eva="search-outline"></i>
                    </a>
                    <div class="dropdown-menu">
                        <div class="p-2 main-form-search">
                            <input class="form-control" placeholder="Search here..." type="search">
                            <button class="btn"><i class="fe fe-search"></i></button>
                        </div>
                    </div>
                </div> -->

                <?php if(isset($_SESSION['id'])){ ?>
                <div class="dropdown main-profile-menu">
                    <a class="main-img-user" href="">
						
						<i class="fas fa-user"></i>
                    </a>

					<?php $roleArr = array("Super Admin" , "Admin" , "User") ?>
                    <div class="dropdown-menu">
                        <div class="main-header-profile">
                            <span style="font-size: .7rem;"><?= $_SESSION['fname']." ".$_SESSION['lname'] ?></span>
							<span><?=  $roleArr[$_SESSION['role']] ?></span>

                        </div>
                        <a class="dropdown-item"href="<?= base_url("admin.php/Admin/Detail/").$_SESSION['id'] ?>?type=edit" c><i class="si si-user"></i> Profile</a>
           <!--              <a class="dropdown-item" href="#"><i class="si si-envelope-open"></i> Inbox</a>
							<a class="dropdown-item" href="#"><i class="si si-calendar"></i> Activity</a>
							<a class="dropdown-item" href="#"><i class="si si-bubbles"></i> Chat</a> -->
							<!-- <a class="dropdown-item" href="#"><i class="si si-settings"></i> Settings</a> -->
                        <a class="dropdown-item" href="<?= base_url("admin.php/Admin/logout") ?>"><i class="si si-power"></i> Log Out</a>
                    </div>

                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    	<!--Horizontal-main -->
		<?php if(isset($_SESSION['id'])){ ?>
		<div class="sticky">
			<div class="horizontal-main hor-menu clearfix">
				<div class="horizontal-mainwrapper container clearfix" style="display: flex !important;justify-content: center;">
					<!--Nav-->
					<nav class="horizontalMenu clearfix">
						<ul class="horizontalMenu-list">
							<li aria-haspopup="true"><a href="<?= base_url("admin.php/DashboardView/Map") ?>" class="sub-icon"><i class="hor-icon" data-eva="file-text-outline"></i> Map</a></li>
						<li aria-haspopup="true"><a href="<?= base_url("admin.php/DashboardView") ?>" class="sub-icon"><i class="hor-icon" data-eva="file-text-outline"></i> Dashboard</a></li>

							<?php if($_SESSION['role'] == '0'){?>
                            <li aria-haspopup="true"><a href="<?= base_url("admin.php/Admin/AdminList") ?>" class="sub-icon"><i class="hor-icon" data-eva="monitor-outline"></i> Admin <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
									<li aria-haspopup="true"><a href="<?= base_url("admin.php/Admin/AdminList") ?>" > Admin List</a></li>
										<li aria-haspopup="true"><a href="<?= base_url("admin.php/Admin/Register") ?>">Add Admin</a></li>
									</ul>
								</li>
								<?php } ?>
							<!-- <li aria-haspopup="true"><a href="<?= base_url("admin.php/Admin/Models") ?>" class="sub-icon"><i class="hor-icon" data-eva="file-text-outline"></i> Brand List</a></li> -->
							<li aria-haspopup="true"><a href="<?= base_url("admin.php/Admin/Branchs") ?>" class="sub-icon"><i class="hor-icon" data-eva="file-text-outline"></i> Branch List</a></li>

						<!-- 	<li aria-haspopup="true"><a href="<?= base_url("admin.php/Admin/Reviews") ?>" class="sub-icon"><i class="hor-icon" data-eva="file-text-outline"></i> Review List</a></li>
							<li aria-haspopup="true"><a href="<?= base_url("admin.php/Admin/Slides") ?>" class="sub-icon"><i class="hor-icon" data-eva="file-text-outline"></i> Slide List</a></li>
 -->

                            
							
						</ul>
					</nav>
					<!--Nav-->
				</div>
			</div>
		</div>
		<?php } ?>