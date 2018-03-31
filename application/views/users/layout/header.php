<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/default.css')?>"  />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/js/fancybox/jquery.fancybox.css')?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/isotope.css')?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-dashboard.css')?>">

    <title>Home</title>
</head>
<body>
  <header>
    <div class="main-menu">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <img class="navbar-brand" src="<?php echo base_url('assets/images/icons/Ngartish.png') ?>"></img>
          </div>
          <div class="col-md-4 ">
            <div class="widget">
              <div class="form-search">
                <input class="form-control" type="text" placeholder="Search..">
                    <i class="fa fa-search search-button"></i>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-2 col-md-offset-2">
                <i class="material-icons nav-icon-gambar">panorama</i>
              </div>
              <div class="col-md-2">
                <i class="fas fa-th nav-icon"></i>
              </div>
              <div class="col-md-2">
                <i class="fas fa-bell nav-icon"></i>
              </div>
              <div class="row profil">
                <div class="col-md-1">
                  <div class="nav-label">Hilmi</div>
                </div>
                <div class="col-md-2 col-md-offset-1">
                  <img class="nav-icon-profile" alt="foto"></img>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
