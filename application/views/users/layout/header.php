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

    <link rel="stylesheet" href="<?php echo base_url('assets/css/default.css')?>"  />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/js/fancybox/jquery.fancybox.css')?>" type="text/css" media="screen" />
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
                  <a href="#" class="nav-icon-gambar" data-toggle="tooltip" data-placement="bottom" title="My Gallery"><i class="material-icons nav-icon-gambar">panorama</i></a>
                </li>
                <div class="col-md-2">
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" data-placement="bottom" title="Category" href="#"><i class="fas fa-th nav-icon"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Page 1-1</a></li>
                      <li><a href="#">Page 1-2</a></li>
                      <li><a href="#">Page 1-3</a></li>
                    </ul>
                  </li>
                </div>
                <div class="col-md-2">
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" data-placement="bottom" title="Notification" href="#"><i class="fas fa-bell nav-icon"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Page 1-1</a></li>
                      <li><a href="#">Page 1-2</a></li>
                      <li><a href="#">Page 1-3</a></li>
                    </ul>
                  </li>
                </div>
                <div class="col-md-3">
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" data-placement="right" title="Profil" href="#">
                      <div class="nav-label">
                        <span>Hilmi</span> 
                        <img src="<?php echo base_url('assets/images/icons/profil.png') ?>" class="nav-icon-profile" alt="foto"></img>
                      </div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Page 1-1</a></li>
                      <li><a href="#">Page 1-2</a></li>
                      <li><a href="#">Page 1-3</a></li>
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
