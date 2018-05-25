<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118768464-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-118768464-1');
    </script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
  	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/Kuas.png')?>"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/baguetteBox.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/default.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/js/fancybox/jquery.fancybox.css')?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/Animocons/css/demo.css')?>" type="text/css"  />
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/Animocons/css/icons.css')?>" type="text/css"  />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-dashboard.css')?>"/>

    <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>

    <script src="<?php echo base_url('assets/js/jssor.slider-27.1.0.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/jsor.js')?>" type="text/javascript"></script>

    
      <!--==================================== End Back end pandhu ===========================================-->

    <!--===============================================================================================-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <!--===============================================================================================-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <!--===============================================================================================-->

    <!--===================================== Back end Pandhu ===================================================-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css')?>"/>
    
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.min.css')?>"/>
    <!--===============================================================================================-->
<!-- <script>
  document.onreadystatechange = function () {
      if (document.readyState === "complete") {
          console.log(document.readyState);
          document.getElementById("PreLoaderBar").style.display = "none";
      }
  }
</script> -->
    <title>Home</title>
  </head>
<body>
<!-- <script type="text/javascript"> var SPklikkanan = 'TILANG';</script> <script type="text/javascript" src="<?php echo base_url('assets/js/sp-tilang.js');?>"> </script> -->

<!-- <div class="progress" id="PreLoaderBar">
        <div class="indeterminate"></div>
    </div> -->
  <header>
    <nav class="navbar ">
      <div class="main-menu ">
        <div class="container">
          <div class="row ">
            <div class="col-xs-6 col-md-3 respon-sm-nav">
              <a href="<?=base_url('c_dashboard/index')?>"><img class="navbar-brand" src="<?php echo base_url('assets/images/icons/Ngartish.png') ?>"></img></a>
            </div>
            <div class="col-xs-3 col-md-3 respon-sm-nav">	
              <div class="widget">
                <div class="form-search">
                <form action="<?=base_url('c_dashboard/m_searcboxtype/');?>" method="POST">
                  <input class="form-control" type="text" placeholder="Search.." autocomplete="off" id="search_data" name="search_data" onkeyup="liveSearch()">
                  <i class="fa fa-search search-button" style="color:#aaa;"></i>
                  <div id="suggestions">
                    <div id="autoSuggestionsList">
                    </div>
                  </div>
                </form>    
              </div>
              </div>
            </div>
            <div class="col-xs-6 col-md-6 col-md-6 col-xs-6 right-button">
  						<div class="col-xs-2 col-md-2 col-xs-2">
							</div>
              <ul class="nav navbar-nav row navbar-top">
                <li class="col-xs-2 col-md-2 col-md-offset-1 col-xs-offset-0">
                  <a href="<?=base_url('c_lelang/index');?>" data-toggle="tooltip" data-placement="bottom" title="Auction"><i class="fa fa-balance-scale nav-icon"></i></a>
                </li>
                <li class="col-xs-2 col-md-2">
                  <a href="<?=base_url('c_profile/m_users/'.$this->session->userdata('Id'));?>" class="nav-icon-gambar" data-toggle="tooltip" data-placement="bottom" title="My Gallery"><i class="material-icons nav-icon-gambar">panorama</i></a>
                </li>
                <div class="col-xs-2 col-md-2 col-xs-2">
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" data-placement="bottom" title="Category" href="#"><i class="fas fa-th nav-icon"></i></a>
                    <ul class="dropdown-menu">
                      <div class="border-45">
                      </div>
                      <?php
                        $i=1;
                        foreach($categoriesmenu as $catmenu){
                          ?>
                            <a href="<?=base_url('c_dashboard/m_searchcategory/'.$catmenu->idCat);?>"><li class="option border-warna<?php echo $i;?>"><?=$catmenu->namaCat;?></li></a>
                            <?php ?>
                          <?php
                          $i = $i +1;
                        }
                      ?>
                      <a href="<?=base_url('c_dashboard/m_searchallcategory/');?>"><li class="text-center ">More</li></a>
                    </ul>
                  </li>
                </div>
                <!-- <div class="col-md-2 col-xs-2">
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" data-placement="bottom" title="Notification" href="#"><i class="fas fa-bell nav-icon"></i></a>
                    <ul class="dropdown-menu notifikasi">
                      <div class="border-45">
                      </div>
                      <li class="option"><div class="text-center">Notifikasi</div></li>
                      <a class="" href="#">
                        <li class="text-center">Likes Content</li>
                      </a>
                      <hr />
                      <?php
                        if(is_array($notifikasilikes) || is_object($notifikasilikes)){
                          foreach($notifikasilikes as $notiflikes){
                            if(substr($notiflikes->likeId, 0, 1) == 'L'){
                              ?>
                                <a class="" href="<?=base_url('c_dashboard/m_detailContent/'.$notiflikes->contentId.'/'.$notiflikes->yglike);?>">
                                  <li class="option">
                                      <span><b><?=$notiflikes->fullname;?></b></span></br>
                                      <div><?=$notiflikes->title;?></div>
                                      <small>Menyukai karya Anda</small>
                                  </li>
                                </a>
                              <?php
                            }
                          }  
                        }
                        ?>
                        <a class="" href="#">
                          <li class="text-center"> Follow User</li>
                        </a>
                        <hr />
                        <?php
                        if(is_array($notifikasifollower) || is_object($notifikasifollower)){
                          foreach($notifikasifollower as $notiffollower){
                            
                            if(substr($notiffollower->followId, 0, 1) == 'F'){
                              ?>
                                <a class="" href="<?=base_url('c_profile/m_users/'.$notiffollower->ygfollow);?>">
                                  <li class="option">
                                      <span><b><?=$notiffollower->fullname;?></b></span></br>
                                      <!-- <div><?=$notiffollower->title;?></div> -->
                                      <small>Telah mengikuti Anda</small>
                                  </li>
                                </a>
                              <?php
                            }
                          }  
                        }
                      ?>                      
                      <a class="" href="#">
                        <li class="text-center"> Read More</li>
                      </a>
                    </ul>
                  </li>
                </div> -->
                <div class="col-md-3 col-xs-3">
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" data-placement="right" title="Profil" style="cursor: pointer;">
                      <div class="nav-label">
											<?php foreach($foto as $f){ ?>
												<?php if(isset($f->fotoprofil)&&$f->fotoprofil!=''){ ?>
												<div class="nav-icon-profile">
													<img class="img-responsive img-border-radius-profil" src="<?php echo base_url('assets/images/profilepicture/'.$f->fotoprofil.'')?>" />
												</div>
												<?php }else{ ?>
                        <div class="nav-icon-profile">
                          <span class="profil-name"><b><?php echo substr(trim(ucfirst($this->session->userdata("name"))),0,1); ?></b></span> 
                        </div>
												<?php } ?>
											<?php } ?>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <div class="border-45-profil">
                      </div>
                      <li class="option text-center">
                        <b>Status </b>: 
                        <script>
                          if (navigator.onLine) {
                            // console.log('online');
                            document.write('Online');
                          } else {
                            document.write('Offline');
                          }
                        </script>
                      </li>
                      <a class="text-center" href="<?php echo base_url('c_profile/m_users/'.$this->session->userdata('Id').'') ?>"><li class="option">Pengaturan Akun</li></a>
                      <!-- <a class="text-center" href="#"><li class="option">Feedback</li></a> -->
                      <a class="text-center" href="<?php echo base_url('c_loginusers/m_logout'); ?>"><li class="option">Log Out</li></a>
                    </ul>
                  </li>
                </div>
              </ul>
              
            </div>
        </div>
        
      </div>
      <div id="collapse" class="panel-collapse collapse">
              <ul class="list-group">
                <li class="list-group-item">One</li>
                <li class="list-group-item">Two</li>
                <li class="list-group-item">Three</li>
              </ul>
          </div>

    </nav>
  </header>
