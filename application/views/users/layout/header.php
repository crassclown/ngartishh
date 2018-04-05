<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/Kuas.png')?>"/>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Berkshire+Swash">
    style="font-family: 'Berkshire Swash', cursive;" -->

    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>"  />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/default.css')?>"  />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/js/fancybox/jquery.fancybox.css')?>" type="text/css" media="screen" />
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/isotope.css')?>" type="text/css" media="screen" /> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-dashboard.css')?>">

    <title>Home</title>
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="main-menu">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <img class="navbar-brand" src="<?php echo base_url('assets/images/icons/Ngartish.png') ?>"></img>
            </div>
            <div class="col-md-3 ">
              <div class="widget">
                <div class="form-search">
                  <input class="form-control" type="text" placeholder="Search..">
                      <i class="fa fa-search search-button"></i>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <ul class="nav navbar-nav row navbar-left">
                <li class="col-md-2 col-md-offset-1">
                  <a href="#" data-toggle="tooltip" data-placement="bottom" title="Auction"><i class="fa fa-balance-scale nav-icon"></i></a>
                </li>
                <li class="col-md-2">
                  <a href="<?=base_url('c_profile/m_users/'.$this->session->userdata('Id'));?>" class="nav-icon-gambar" data-toggle="tooltip" data-placement="bottom" title="My Gallery"><i class="material-icons nav-icon-gambar">panorama</i></a>
                </li>
                <div class="col-md-2">
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" data-placement="bottom" title="Category" href="#"><i class="fas fa-th nav-icon"></i></a>
                    <ul class="dropdown-menu">
                      <div class="border-45">
                      </div>
                      <a href="#"><li class="option border-warna1">Ilustrasi</li></a>
                      <a href="#"><li class="option border-warna2">Surealism</li></a>
                      <a href="#"><li class="option border-warna3">Improsionisme</li></a>
                      <a href="#"><li class="option border-warna4">Mural</li></a>
                      <a href="#"><li class="option border-warna5">Neo-Improsionisme</li></a>
                      <a href="#"><li class="text-center ">More</li></a>
                    </ul>
                  </li>
                </div>
                <div class="col-md-2">
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
                </div>
                <div class="col-md-3">
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" data-placement="right" title="Profil" href="#">
                      <div class="nav-label">
                        <span class="font-pp"><b><?php echo substr(trim(ucfirst($this->session->userdata("name"))),0,1); ?></b></span> 
                        <img src="<?php echo base_url('assets/images/icons/profil.png') ?>" class="nav-icon-profile" alt="foto"></img>
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
                      <a class="text-center" href="#"><li class="option">Pengaturan Akun</li></a>
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
