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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <style>
        .img-content:hover {
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
        }
    </style>
    <style>
* {box-sizing: border-box;}
.page-content-perbesar {
  position:relative;
}
.page-glass {
  position: absolute;
  border: 3px solid #000;
  border-radius: 50%;
  cursor: none;
  /*Set the size of the magnifier glass:*/
  width: 100px;
  height: 100px;
}
</style>
<script>
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "page-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>
<script>
  document.onreadystatechange = function () {
      if (document.readyState === "complete") {
          console.log(document.readyState);
          document.getElementById("PreLoaderBar").style.display = "none";
      }
  }
</script>
<style>
  .content {
    position: relative;
    animation: animatop 0.9s cubic-bezier(0.425, 1.14, 0.47, 1.125) forwards;
}

.card {
    width: 500px;
    min-height: 100px;
    padding: 20px;
    border-radius: 3px;
    background-color: white;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
}

.card:after {
    content: '';
    display: block;
    width: 190px;
    height: 300px;
    background: cadetblue;
    position: absolute;
    animation: rotatemagic 0.75s cubic-bezier(0.425, 1.04, 0.47, 1.105) 1s both;
}

.badgescard {
    padding: 10px 20px;
    border-radius: 3px;
    background-color: #00bcd4;
    color:#fff;
    width: 480px;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    position: absolute;
    z-index: -1;
    left: 10px;
    bottom: 10px;
    animation: animainfos 0.5s cubic-bezier(0.425, 1.04, 0.47, 1.105) 0.75s forwards;
}

.badgescard span {
    font-size: 1.6em;
    margin: 0px 6px;
    opacity: 0.6;
}

.firstinfo {
    flex-direction: row;
    z-index: 2;
    position: relative;
}

.firstinfo img {
    border-radius: 50%;
    width: 120px;
    height: 120px;
}

.firstinfo .profileinfo {
    padding: 0px 20px;
}

.firstinfo .profileinfo h1 {
    font-size: 1.8em;
}

.firstinfo .profileinfo h3 {
    font-size: 1.2em;
    color: #00bcd4;
    font-style: italic;
}

.firstinfo .profileinfo p.bio {
    padding: 10px 0px;
    color: #5A5A5A;
    line-height: 1.2;
    font-style: initial;
}

@keyframes animatop {
    0% {
        opacity: 0;
        bottom: -500px;
    }
    100% {
        opacity: 1;
        bottom: 0px;
    }
}

@keyframes animainfos {
    0% {
        bottom: 10px;
    }
    100% {
        bottom: -42px;
    }
}

@keyframes rotatemagic {
    0% {
        opacity: 0;
        transform: rotate(0deg);
        top: -24px;
        left: -253px;
    }
    100% {
        transform: rotate(-30deg);
        top: -24px;
        left: -78px;
    }
}
</style>
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
                      <i class="fa fa-search search-button"></i>
                      <div id="suggestions">
                                        <div id="autoSuggestionsList">
                                        </div>
                                    </div>
                                    </form>    
                </div>
              </div>
            </div>
            <div class="col-md-6 col-md-6 col-xs-6">
            
              <ul class="nav navbar-nav row navbar-top">
                <li class="col-xs-2 col-md-2 col-md-offset-1 col-xs-offset-0">
                  <a href="#" data-toggle="tooltip" data-placement="bottom" title="Auction"><i class="fa fa-balance-scale nav-icon"></i></a>
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
                <div class="col-md-2 col-xs-2">
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
                <div class="col-md-3 col-xs-3">
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" data-placement="right" title="Profil" href="#">
                      <div class="nav-label">
                        <div class="nav-icon-profile">
                          <span class="profil-name"><b><?php echo substr(trim(ucfirst($this->session->userdata("name"))),0,1); ?></b></span> 
                        </div>
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
