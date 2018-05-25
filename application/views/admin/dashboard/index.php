<!DOCTYPE html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Propeller Admin Dashboard">
<meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">

<title>Ngartish | Home Administrator</title>
<meta name="description" content="Admin is a material design and bootstrap based responsive dashboard template created mainly for admin and backend applications."/>

<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/Kuas.png')?>"/>

<!-- Google icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Bootstrap css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dashboardadmin/assets/css/bootstrap.min.css');?>">

<!-- Propeller css -->
<!-- build:[href] assets/css/ -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dashboardadmin/assets/css/propeller.min.css');?>">
<!-- /build -->

<!-- Propeller date time picker css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dashboardadmin/components/datetimepicker/css/bootstrap-datetimepicker.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dashboardadmin/components/datetimepicker/css/pmd-datetimepicker.css');?>" />

<!-- Propeller theme css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dashboardadmin/themes/css/propeller-theme.css');?>" />

<!-- Propeller admin theme css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dashboardadmin/themes/css/propeller-admin.css');?>">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript"> 
     
        // Load the Visualization API and the piechart package. 
        google.charts.load('current', {'packages':['corechart']}); 
        
        // Set a callback to run when the Google Visualization API is loaded. 
        google.charts.setOnLoadCallback(drawChart); 
        
        function drawChart() { 
            var jsonData = $.ajax({ 
                url: "<?php echo base_url() . 'c_admin/get_data_count_post' ?>", 
                dataType: "json", 
                async: false 
                }).responseText; 
                
            // Create our data table out of JSON data loaded from server. 
            var data = new google.visualization.DataTable(jsonData); 
        
            // Instantiate and draw our chart, passing in some options. 
            var chart = new google.visualization.PieChart(document.getElementById('chart_div')); 
            chart.draw(data, {width: 400, height: 300}); 
        }
    </script>

	<script type="text/javascript"> 
     
		// Load the Visualization API and the piechart package. 
		google.charts.load('current', {'packages':['corechart']}); 
		
		// Set a callback to run when the Google Visualization API is loaded. 
		google.charts.setOnLoadCallback(drawChart); 
		
		function drawChart() { 
			var jsonData = $.ajax({ 
				url: "<?php echo base_url() . 'c_admin/get_data_count_users_post' ?>", 
				dataType: "json", 
				async: false 
				}).responseText; 
				
			// Create our data table out of JSON data loaded from server. 
			var data = new google.visualization.DataTable(jsonData); 
		
			// Instantiate and draw our chart, passing in some options. 
			var chart = new google.visualization.PieChart(document.getElementById('chart_users')); 
			chart.draw(data, {width: 400, height: 300}); 
		}
	</script>

	<script type="text/javascript"> 
     
		// Load the Visualization API and the piechart package. 
		google.charts.load('current', {'packages':['corechart']}); 
		
		// Set a callback to run when the Google Visualization API is loaded. 
		google.charts.setOnLoadCallback(drawChart); 
		
		function drawChart() { 
			var jsonData = $.ajax({ 
				url: "<?php echo base_url() . 'c_admin/get_data_count_likes' ?>", 
				dataType: "json", 
				async: false 
				}).responseText; 
				
			// Create our data table out of JSON data loaded from server. 
			var data = new google.visualization.DataTable(jsonData); 
		
			// Instantiate and draw our chart, passing in some options. 
			var chart = new google.visualization.PieChart(document.getElementById('chart_likes')); 
			chart.draw(data, {width: 400, height: 300}); 
		}
		function drawChart_open_all(status) {

			var PieChartData = $.ajax({
			type: 'POST',
			url: "<?php echo base_url(); ?>" + "c_admin/get_data_count_auction",
			data: { 'option':status },  // <-- kept as option instead of val
			dataType:"json",
			global: false,              // <-- Added 
			async:false,                // <-- Added 
			success: function(data){    // <-- Added 
				return data;            // <-- Added 
			},
			error: function(xhr, textStatus, error){
				console.log(xhr.statusText);
				console.log(textStatus);
				console.log(error);
			}
			}).responseText;

			// Create the data table.
			var data = new google.visualization.DataTable(PieChartData);
			var options = {  pieSliceText: 'value-and-percentage', };

			var chart = new google.visualization.PieChart(document.getElementById('open_new'));
			chart.draw(data, {width: 400, height: 300});
		}
	</script>
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
				<li><a href="<?php echo base_url('c_admin/categoryreport');?>">Per Categories</a></li>
			</ul>
		</li>
		
	</ul>
</aside><!-- End Left sidebar -->
<!-- Sidebar Ends -->  
	
<!--content area start-->
<div id="content" class="pmd-content content-area dashboard">

	<div class="container-fluid">
		<div class="row" id="card-masonry">
		 
		 
			<!--Statistics-->
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div class="pmd-card pmd-z-depth statistics-content">      
					<div class="pmd-card-title">
						<div class="media-left set-svg">
							<span class="service-icon img-circle bg-fill-green">
								<svg version="1.1" id="Layer_1" x="0px" y="0px" width="36px" height="26.25px" viewBox="279.765 332.782 36 26.25" enable-background="new 279.765 332.782 36 26.25" xml:space="preserve">
									<g>
										<path fill="#FFFFFF" d="M312.318,332.782c-1.928,0-3.485,1.558-3.485,3.485c0,0.89,0.334,1.706,0.89,2.336l-6.117,8.898
											c-0.371-0.112-0.742-0.186-1.148-0.186c-0.557,0-1.077,0.111-1.521,0.334l-4.82-4.932c0.296-0.519,0.445-1.075,0.445-1.706
											c0-1.927-1.557-3.485-3.485-3.485c-1.928,0-3.485,1.558-3.485,3.485c0,0.853,0.296,1.595,0.779,2.225l-6.155,8.972
											c-0.296-0.074-0.63-0.148-0.964-0.148c-1.928,0-3.485,1.558-3.485,3.486c0,1.927,1.557,3.485,3.485,3.485
											c1.928,0,3.485-1.558,3.485-3.485c0-0.89-0.333-1.706-0.889-2.336l6.118-8.935c0.333,0.111,0.742,0.185,1.112,0.185
											c0.593,0,1.187-0.148,1.669-0.445l4.782,4.931c-0.334,0.556-0.556,1.187-0.556,1.854c0,1.927,1.556,3.485,3.485,3.485
											c1.927,0,3.484-1.558,3.484-3.485c0-0.816-0.297-1.595-0.78-2.188l6.155-9.009c0.296,0.074,0.63,0.148,0.964,0.148
											c1.93,0,3.485-1.558,3.485-3.486C315.765,334.339,314.244,332.782,312.318,332.782z"/>
									</g>
								</svg>
							</span>
						</div>
						<div class="media-body media-middle">
							<h2 class="pmd-card-title-text typo-fill-secondary">Based on Categories</h2>
						</div>
					</div>
					<div id="chart_div"></div>
				</div>
			</div>
			<!-- end statistics-->
		 
			<!--Statistics-->
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div class="pmd-card pmd-z-depth statistics-content">      
					<div class="pmd-card-title">
						<div class="media-left set-svg">
							<span class="service-icon img-circle bg-fill-green">
								<svg version="1.1" id="Layer_1" x="0px" y="0px" width="36px" height="26.25px" viewBox="279.765 332.782 36 26.25" enable-background="new 279.765 332.782 36 26.25" xml:space="preserve">
									<g>
										<path fill="#FFFFFF" d="M312.318,332.782c-1.928,0-3.485,1.558-3.485,3.485c0,0.89,0.334,1.706,0.89,2.336l-6.117,8.898
											c-0.371-0.112-0.742-0.186-1.148-0.186c-0.557,0-1.077,0.111-1.521,0.334l-4.82-4.932c0.296-0.519,0.445-1.075,0.445-1.706
											c0-1.927-1.557-3.485-3.485-3.485c-1.928,0-3.485,1.558-3.485,3.485c0,0.853,0.296,1.595,0.779,2.225l-6.155,8.972
											c-0.296-0.074-0.63-0.148-0.964-0.148c-1.928,0-3.485,1.558-3.485,3.486c0,1.927,1.557,3.485,3.485,3.485
											c1.928,0,3.485-1.558,3.485-3.485c0-0.89-0.333-1.706-0.889-2.336l6.118-8.935c0.333,0.111,0.742,0.185,1.112,0.185
											c0.593,0,1.187-0.148,1.669-0.445l4.782,4.931c-0.334,0.556-0.556,1.187-0.556,1.854c0,1.927,1.556,3.485,3.485,3.485
											c1.927,0,3.484-1.558,3.484-3.485c0-0.816-0.297-1.595-0.78-2.188l6.155-9.009c0.296,0.074,0.63,0.148,0.964,0.148
											c1.93,0,3.485-1.558,3.485-3.486C315.765,334.339,314.244,332.782,312.318,332.782z"/>
									</g>
								</svg>
							</span>
						</div>
						<div class="media-body media-middle">
							<h2 class="pmd-card-title-text typo-fill-secondary">Based on users who frequently post</h2>
						</div>
					</div>
					<div id="chart_users"></div>
				</div>
			</div>
			<!-- end statistics-->
		</div>

		<div class="row" id="card-masonry">
  
			<!--Statistics-->
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div class="pmd-card pmd-z-depth statistics-content">      
					<div class="pmd-card-title">
						<div class="media-left set-svg">
							<span class="service-icon img-circle bg-fill-green">
								<svg version="1.1" id="Layer_1" x="0px" y="0px" width="36px" height="26.25px" viewBox="279.765 332.782 36 26.25" enable-background="new 279.765 332.782 36 26.25" xml:space="preserve">
									<g>
										<path fill="#FFFFFF" d="M312.318,332.782c-1.928,0-3.485,1.558-3.485,3.485c0,0.89,0.334,1.706,0.89,2.336l-6.117,8.898
											c-0.371-0.112-0.742-0.186-1.148-0.186c-0.557,0-1.077,0.111-1.521,0.334l-4.82-4.932c0.296-0.519,0.445-1.075,0.445-1.706
											c0-1.927-1.557-3.485-3.485-3.485c-1.928,0-3.485,1.558-3.485,3.485c0,0.853,0.296,1.595,0.779,2.225l-6.155,8.972
											c-0.296-0.074-0.63-0.148-0.964-0.148c-1.928,0-3.485,1.558-3.485,3.486c0,1.927,1.557,3.485,3.485,3.485
											c1.928,0,3.485-1.558,3.485-3.485c0-0.89-0.333-1.706-0.889-2.336l6.118-8.935c0.333,0.111,0.742,0.185,1.112,0.185
											c0.593,0,1.187-0.148,1.669-0.445l4.782,4.931c-0.334,0.556-0.556,1.187-0.556,1.854c0,1.927,1.556,3.485,3.485,3.485
											c1.927,0,3.484-1.558,3.484-3.485c0-0.816-0.297-1.595-0.78-2.188l6.155-9.009c0.296,0.074,0.63,0.148,0.964,0.148
											c1.93,0,3.485-1.558,3.485-3.486C315.765,334.339,314.244,332.782,312.318,332.782z"/>
									</g>
								</svg>
							</span>
						</div>
						<div class="media-body media-middle">
							<h2 class="pmd-card-title-text typo-fill-secondary">Based on most likes</h2>
						</div>
					</div>
					<div id="chart_likes"></div>
				</div>
			</div>
			<!-- end statistics-->

			<!--Statistics-->
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div class="pmd-card pmd-z-depth statistics-content">      
					<div class="pmd-card-title">
						<div class="media-left set-svg">
							<span class="service-icon img-circle bg-fill-green">
								<svg version="1.1" id="Layer_1" x="0px" y="0px" width="36px" height="26.25px" viewBox="279.765 332.782 36 26.25" enable-background="new 279.765 332.782 36 26.25" xml:space="preserve">
									<g>
										<path fill="#FFFFFF" d="M312.318,332.782c-1.928,0-3.485,1.558-3.485,3.485c0,0.89,0.334,1.706,0.89,2.336l-6.117,8.898
											c-0.371-0.112-0.742-0.186-1.148-0.186c-0.557,0-1.077,0.111-1.521,0.334l-4.82-4.932c0.296-0.519,0.445-1.075,0.445-1.706
											c0-1.927-1.557-3.485-3.485-3.485c-1.928,0-3.485,1.558-3.485,3.485c0,0.853,0.296,1.595,0.779,2.225l-6.155,8.972
											c-0.296-0.074-0.63-0.148-0.964-0.148c-1.928,0-3.485,1.558-3.485,3.486c0,1.927,1.557,3.485,3.485,3.485
											c1.928,0,3.485-1.558,3.485-3.485c0-0.89-0.333-1.706-0.889-2.336l6.118-8.935c0.333,0.111,0.742,0.185,1.112,0.185
											c0.593,0,1.187-0.148,1.669-0.445l4.782,4.931c-0.334,0.556-0.556,1.187-0.556,1.854c0,1.927,1.556,3.485,3.485,3.485
											c1.927,0,3.484-1.558,3.484-3.485c0-0.816-0.297-1.595-0.78-2.188l6.155-9.009c0.296,0.074,0.63,0.148,0.964,0.148
											c1.93,0,3.485-1.558,3.485-3.486C315.765,334.339,314.244,332.782,312.318,332.782z"/>
									</g>
								</svg>
							</span>
						</div>
						<div class="media-body media-middle">
							<h2 class="pmd-card-title-text typo-fill-secondary">Based on most end date</h2>
						</div>
					</div>
					<br />
					<form>
						<div class="input-date">
							<div class="row">
								<div class="form-group">
									<label>End Date</label>
									<input type="date" name="status" class="form-control" style="width:45%;" onchange="drawChart_open_all(this.value)">
									<br />
									<div id="open_new"></div>
								</div>
							</div>
						</div>
					</form>
					
				</div>
			</div>
			<!-- end statistics-->
		</div>
	</div>

</div><!--end content area-->

<!-- Footer Starts -->
<!--footer start-->
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
<!--footer end-->
<!-- Footer Ends -->

<!-- Scripts Starts -->
<script src="<?php echo base_url('assets/dashboardadmin/assets/js/jquery-1.12.2.min.js');?>"></script>
<script src="<?php echo base_url('assets/dashboardadmin/assets/js/bootstrap.min.js');?>"></script>
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
	});
</script>
<script type="text/javascript">
(function() {
  "use strict";
  var toggles = document.querySelectorAll(".c-hamburger");
  for (var i = toggles.length - 1; i >= 0; i--) {
    var toggle = toggles[i];
    toggleHandler(toggle);
  };
  function toggleHandler(toggle) {
    toggle.addEventListener( "click", function(e) {
      e.preventDefault();
      (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
    });
  }

})();
</script>

<script src="<?php echo base_url('assets/dashboardadmin/assets/js/propeller.min.js');?>"></script> 

<!-- Javascript for revenue progressbar animation effect-->
<script>
	function progress(percent, $element) {
		var progressBarWidth = percent * $element.width() / 100;
		$element.find('.progress-bar').animate({ width: progressBarWidth }, 500);
	} 
	
	progress(50, $('.cash-progressbar'));
	progress(30, $('.card-progressbar'));
	progress(60, $('.wallet-progressbar'));
	progress(40, $('.credit-progressbar'));
	progress(10, $('.other-progressbar'));
</script>
<!-- Javascript for revenue progressbar animation effect-->	




<!--staked column chart for payment-->
<script src="<?php echo base_url('assets/dashboardadmin/themes/js/highcharts.js');?>"></script>
<script src="<?php echo base_url('assets/dashboardadmin/themes/js/highcharts-more.js');?>"></script>

<!-- Payment chart js-->
<script>
$(function paymentChart(){
    $('#payment-chart').highcharts({
        chart: {
            type: 'column'
        },
		colors: "#00719d,#2ab7ee".split(","),
        title: {
            text: 'Last 10 days comparison',
			style: {
                color: "#4d575d",
                fontSize: "14px",
            },
        },
        xAxis: {
            categories: ['9-7', '10-7', '11-7', '12-7', '13-7', '14-7', '15-7', '16-7', '17-7', '18-7']
        },
        yAxis: {
            min: 0,
			title: {
					text: "Amount"
			},
			stackLabels: {
					enabled: false,
					style: {
						fontWeight: 'bold',
						color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
					}
				}
			},
        legend: {
            enabled: !0,
            align: "right",
            layout: "horizontal",
            labelFormatter: function() {
                return this.name
            },
            borderColor: false,
            borderRadius: 0,
            navigation: {
                activeColor: "#274b6d",
                inactiveColor: "#CCC"
            },
            shadow: false,
            itemStyle: {
                color: "#888888",
                fontSize: "12px",
                fontWeight: "normal"
            },
            itemHoverStyle: {
                color: "#000"
            },
            itemHiddenStyle: {
                color: "#CCC"
            },
            itemCheckboxStyle: {
                position: "absolute"
            },
			symbolHeight: 10,
			symbolWidth: 10,
            symbolPadding: 5,
            verticalAlign: "bottom",
            x: 0,
            y: 0,
            title: {
                style: {
                    fontWeight: "normal"
                }
            }
        },
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}',
			backgroundColor: '#ffffff',
			borderColor: '#f0f0f0',
			shadow: true
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: false,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black'
                    }
                }
            }
        },
		 credits: {
            enabled: false,
        },
        series: [{
            name: 'Card',
            data: [25000, 50000, 75000, 75000, 60000, 70000, 10000, 2500, 5000, 25000]
        }, {
            name: 'Wallet',
            data: [75000, 50000, 25000, 25000, 30000, 30000, 90000, 25000, 3000, 50000]
        }]
		
    });
});
</script>

<!--staked column chart for sms details-->
<script>
$( function smsChart() { 
    $('#sms-chart').highcharts({
        chart: {
            zoomType: 'none'
        },
		colors: "#e75c5c,#9159b8".split(","),
         title: {
            text: 'Last 7 days comparison',
			style: {
                color: "#4d575d",
                fontSize: "14px",
            },
        },
        xAxis: [{
            categories: ['3-7', '4-7', '5-7', '6-7', '7-7', '8-7', '9-7']
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            title: {
                text: 'User Count',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Total Days',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            opposite: true
        }],
		legend: {
            enabled: !0,
            align: "right",
			layout: "horizontal",
            labelFormatter: function() {
                return this.name
            },
            borderColor: false,
            borderRadius: 0,
            navigation: {
                activeColor: "#274b6d",
                inactiveColor: "#CCC"
            },
            shadow: false,
            itemStyle: {
                color: "#888888",
                fontSize: "12px",
                fontWeight: "normal"
            },
            itemHoverStyle: {
                color: "#000"
            },
            itemHiddenStyle: {
                color: "#CCC"
            },
            itemCheckboxStyle: {
                position: "absolute",
                width: "12px",
                height: "12px"
            },
			symbolHeight: 10,
			symbolWidth: 10,
            symbolPadding: 5,
            verticalAlign: "bottom",
            x: 0,
            y: 0,
            title: {
                style: {
                    fontWeight: "normal"
                }
            }
        },

        tooltip: {
            shared: true,
			backgroundColor: '#ffffff',
			borderColor: '#f0f0f0',
			shadow: true
        },
		 credits: {
            enabled: false,
        },

        series: [{
            name: 'Total Days',
            type: 'spline',
            yAxis: 1,
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6],
            tooltip: {
                pointFormat: '<span style="font-weight: bold; color: {series.color}">{series.name}</span>: '
            }
        }, {
            name: 'Total Days error',
            type: 'errorbar',
            yAxis: 1,
            data: [[48, 51], [68, 73], [92, 110], [128, 136], [140, 150], [171, 179], [135, 143]],
            tooltip: {
                pointFormat: '(error range: {point.low}-{point.high})<br/>'
            }
        }, {
            name: 'User Count',
            type: 'column',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2],
            tooltip: {
                pointFormat: '<span style="font-weight: bold; color: {series.color}">{series.name}</span>: <b>{point.y:.1f}</b> '
            }
        }, {
            name: 'User Count error',
            type: 'errorbar',
            data: [[6, 8], [5.9, 7.6], [9.4, 10.4], [14.1, 15.9], [18.0, 20.1], [21.0, 24.0], [23.2, 25.3]],
            tooltip: {
                pointFormat: '(error range: {point.low}-{point.high})<br/>'
            }
        }]
    });
});
</script>
<!-- Scripts Ends -->
<!-- Javascript for Datepicker -->
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/dashboardadmin/components/datetimepicker/js/moment-with-locales.js');?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/dashboardadmin/components/datetimepicker/js/bootstrap-datetimepicker.js');?>"></script>
<script>
	// Linked date and time picker 
	// start date date and time picker 
	$('#datepicker-default').datetimepicker();
	$(".auto-update-year").html(new Date().getFullYear());
</script> 

</body>
</html>