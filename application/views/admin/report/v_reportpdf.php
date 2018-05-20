<!doctype html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Form Elements | Propeller - Admin Dashboard">
<meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
<title>Form Elements | Propeller - Admin Dashboard</title>
<link rel="shortcut icon" type="image/x-icon" href="themes/images/favicon.ico">

<!-- Google icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Bootstrap css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dashboardadmin/assets/css/bootstrap.min.css');?>">

<!-- Propeller css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dashboardadmin/assets/css/propeller.min.css');?>">

<!-- Propeller theme css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dashboardadmin/themes/css/propeller-theme.css');?>" />

<!-- Propeller admin theme css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dashboardadmin/themes/css/propeller-admin.css');?>">

</head>

<body>
<!-- Header Starts -->
<!--Start Nav bar -->
<nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth">

	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a href="javascrit:void(0);" data-target="basicSidebar" data-placement="left" data-position="slidepush" is-open="true" is-open-width="1200" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i class="material-icons md-light">menu</i></a>	
		  <a href="<?php echo base_url('c_admin/');?>" class="navbar-brand">
		  	<img src="<?php echo base_url('assets/images/icons/Ngartish.png');?>" class="img-responsive" style="width:13%;"/>
		  </a>
		</div>
	</div>

</nav><!--End Nav bar -->
<!-- Header Ends -->

<!-- Sidebar Starts -->
<div class="pmd-sidebar-overlay"></div>

<!-- Left sidebar -->
<aside id="basicSidebar" class="pmd-sidebar  sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
	<ul class="nav pmd-sidebar-nav">
		
		<!-- User info -->
		<li class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg">
			<a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" aria-expandedhref="javascript:void(0);">
				<div class="media-body media-middle">Hai, <?php echo $this->session->userdata('nama') ;?></div>
				<div class="media-right media-middle"><i class="dic-more-vert dic"></i></div>
			</a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo base_url('c_loginadmin/m_logout'); ?>">Logout</a></li>
			</ul>
		</li><!-- End user info -->
		
		<li> 
			<a class="pmd-ripple-effect" href="<?php echo base_url('c_admin/');?>">	
				<i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
	 xml:space="preserve">
<g>
	<path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
		 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
				<span class="media-body">Dashboard</span>
			</a> 
		</li>
		
		<li class="dropdown pmd-dropdown"> 
			<a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">	
				<i class="material-icons media-left pmd-sm">swap_calls</i> 
				<span class="media-body">Reports</span>
				<div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
			</a> 
			<ul class="dropdown-menu">
				<li><a href="<?php echo base_url('c_admin/indexreport');?>">Per Period</a></li>
				<li><a href="#">Per Day</a></li>
				<li><a href="#">Per Month</a></li>
				<li><a href="#">Per Categories</a></li>
			</ul>
		</li>
		
	</ul>
</aside><!-- End Left sidebar -->
<!-- Sidebar Ends -->
	
<!--Form-->
<div class="pmd-content pmd-content-custom" id="content">

	<div class="container-fluid">
	
		<!-- Title -->
		<h1 class="section-title" id="services">
			<span>Form Report Period</span>
		</h1><!-- End Title -->
			
		<!--breadcrum start-->
		<ol class="breadcrumb text-left">
		  <li><a href="<?php echo base_url('c_admin/');?>">Dashboard</a></li>
		  <li class="active">Form Report</li>
		</ol><!--breadcrum end--> 
		
		
		
		<!-- Text Fields-->
		<section class="row component-section">
			
			
			<!-- Text fields code, example -->
			<div class="col-md-9">
				<div class="component-box">
							
					<!-- Text fields example -->
					<div class="row">
						<div class="col-md-6">
							<div class="pmd-card pmd-z-depth pmd-card-custom-form">
								<div class="pmd-card-body"> 
									<!-- Regular Input -->
									<div class="form-group pmd-textfield">
										<label for="start_date" class="control-label">Start Date</label>
										<input type="date" id="start_date" class="form-control" name="start_date">
                                    </div>
									<!-- Password Input -->
									<div class="form-group pmd-textfield">
										<label for="end_date" class="control-label">End Date</label>
										<input id="end_date" class="form-control" type="date" name="end_date">
                                    </div>									
								</div>
							</div>
							
						</div>
						
					</div><!-- end Text fields example -->

				</div>
			</div><!--end Text fields code, example -->
		</section><!-- text fields end --> 
		
		
	</div> <!--container end --> 
	
</div> <!--Form-->
 
<!-- Footer Starts -->
<footer class="admin-footer">
 <div class="container-fluid">
 	<ul class="list-unstyled list-inline">
	 	<li>
			<span class="pmd-card-subtitle-text">Propeller &copy; <span class="auto-update-year"></span>. All Rights Reserved. Modified by Ngartish.</span>
			<h3 class="pmd-card-subtitle-text">Licensed under <a href="https://opensource.org/licenses/MIT" target="_blank">MIT license.</a></h3>
        </li>
        
        
    </ul>
 </div>
</footer>
<!-- Footer Ends -->

<!-- Scripts Starts -->
<script src="<?php echo base_url('assets/dashboardadmin/assets/js/jquery-1.12.2.min.js');?>"></script>
<script src="<?php echo base_url('assets/dashboardadmin/assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/dashboardadmin/assets/js/propeller.min.js');?>"></script>
<script>
	$(document).ready(function() {
		var sPath=window.location.pathname;
		var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
		$(".pmd-sidebar-nav").each(function(){
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").addClass("open");
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
			$(this).find("a[href='"+sPage+"']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
			$(this).find("a[href='"+sPage+"']").addClass("active");
		});
		$(".auto-update-year").html(new Date().getFullYear());
	});
</script> 

<!-- Scripts Ends -->

</body>
</html>