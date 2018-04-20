<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/Kuas.png')?>"/>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>"  />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/default.css')?>"  />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/js/fancybox/jquery.fancybox.css')?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/Animocons/css/demo.css')?>" type="text/css"  />
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/Animocons/css/icons.css')?>" type="text/css"  />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-dashboard.css')?>">

    <!--===================================== Back end Pandhu ===================================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    <!-- <link rel="stylesheet" href="<?=base_url('assets/css/checkbox-style.css');?>"> -->

    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
      <!--==================================== End Back end pandhu ===========================================-->

<script>
  document.onreadystatechange = function () {
      if (document.readyState === "complete") {
          console.log(document.readyState);
          document.getElementById("PreLoaderBar").style.display = "none";
      }
  }
</script>
    <title>Home</title>
  </head>
<body>
<!-- <script type="text/javascript"> var SPklikkanan = 'TILANG';</script> <script type="text/javascript" src="<?php echo base_url('assets/js/sp-tilang.js');?>"> </script> -->

<div class="progress" id="PreLoaderBar">
        <div class="indeterminate"></div>
    </div>
  <header>
    <nav class="navbar ">
      <div class="main-menu ">
        <div class="container">
          <div class="row ">
            <div class="col-md-3 respon-sm-nav">
              <a href="<?=base_url('c_dashboard/index')?>"><img class="navbar-brand" src="<?php echo base_url('assets/images/icons/Ngartish.png') ?>"></img></a>
            </div>
            <div class="col-md-3 respon-sm-nav">
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
            <div class="col-md-6 col-md-6 col-xs-6">
            
							<div class="col-md-2 col-xs-2">
							</div>
              <ul class="nav navbar-nav row navbar-top">
                <li class="col-xs-2 col-md-2 col-md-offset-1 col-xs-offset-0">
                  <a href="<?=base_url('c_lelang/index');?>" data-toggle="tooltip" data-placement="bottom" title="Auction"><i class="fa fa-balance-scale nav-icon"></i></a>
                </li>
                <li class="col-md-2">
                  <a href="<?=base_url('c_profile/m_users/'.$this->session->userdata('Id'));?>" class="nav-icon-gambar" data-toggle="tooltip" data-placement="bottom" title="My Gallery"><i class="material-icons nav-icon-gambar">panorama</i></a>
                </li>
                <div class="col-md-2 col-xs-2">
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
                    <a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" data-placement="bottom" title="Notification" href="#"><i class="fas fa-bell nav-icon"></i><div class="count text-center">4</div></a>
                    <ul class="dropdown-menu notifikasi">
                      <div class="border-45">
                      </div>
                      <li class="option"><div class="text-center">Notifikasi</div></li>
                      <a class="" href="#">
                        <li class="option">
                            <span><b>Hilmi</b></span></br>
                            <div>isiiiiiiiiiiiiii</div>
                        </li>
                      </a>
                      <a class="" href="#">
                        <li class="option">
                            <span><b>Hilmi</b></span></br>
                            <div>isiiiiiiiiiiiiii</div>
                        </li>
                      </a>
                      <a class="" href="#">
                        <li class="option">
                            <span><b>Hilmi</b></span></br>
                            <div>isiiiiiiiiiiiiii</div>
                        </li>
                      </a>
                      <a class="" href="#">
                        <li class="option">
                            <span><b>Hilmi</b></span></br>
                            <div>isiiiiiiiiiiiiii</div>
                        </li>
                      </a>
                      <a class="" href="#">
                        <li class="text-center"> Read More</li>
                      </a>
                    </ul>
                  </li>
                </div> -->
                <div class="col-md-3 col-xs-3">
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" data-placement="right" title="Profil" href="#">
                      <div class="nav-label">
											<?php foreach($foto as $f){ ?>
												<?php if(isset($f->fotoprofil)&&$f->fotoprofil!=''){ ?>
												<div class="nav-icon-profile">
													<img class="img-responsive img-border-radius-profil" src="<?php echo base_url('assets/images/profilepicture/'.$f->fotoprofil.'')?>"/></img>
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
                      <a class="text-center" href="#"><li class="option">Feedback</li></a>
                      <a class="text-center" href="<?php echo base_url('c_loginusers/m_logout'); ?>"><li class="option">Log Out</li></a>
                    </ul>
                  </li>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
