<?php $this->session->userdata("Id"); ?>
    <section  class="section appear clearfix" style="background:url('<?php echo base_url('assets/images/bright_squares.png')?>')">
        <div class="container">
            <div class="row">
                <div class="col-md-12 border-content">
                    <div class="portfolio-items isotopeWrapper clearfix ">
                        <div class="row">
                            <div id="show_data"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Katagory</title>


    <!-- Core Stylesheet -->
    <link href="<?php echo base_url("assets/css/style_cat.css")?>" rel="stylesheet">
 

    <!-- Responsive CSS -->
    <link href="<?php echo base_url("assets/responsive/responsive.css")?>" rel="stylesheet">
  

</head>

<body>

    <div class="row">
                <!-- Semua Kategori -->
                <div class="col-12">
                    <div class="all_cat text-center" >
                        <h2>All Category</h2>
                    </div>
                </div>
            </div>


    <!-- ****** Categories Area Start ****** -->
    <section class="categories_area clearfix" id="about">
        <div class="container">
            <div class="row">
                <?php
                foreach($categories as $categmenu){
                    ?>
                        <div class="col-12 col-md-3 col-lg-3">
                            <div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
                                <img onmousedown="return false" oncontexmenu="return false" onselectstart="return false" src=<?php echo base_url("assets/images/catagory-img/4.jpg")?> alt="">
                                <div class="catagory-title">
                                    <a href="<?=base_url('c_dashboard/m_searchcategory/'.$categmenu->Id);?>">
                                        <h5><?=$categmenu->name;?></h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- ****** Categories Area End ****** -->

    
   
   




    <!-- Jquery-2.2.4 js -->
    <script src="<?=base_url('js/jquery_cat.min.js');?>"></script>
    <!-- Bootstrap-4 js -->
    <script src="<?=base_url('js/bootstrap4.min.js');?>"></script>
    <!-- All Plugins JS -->
    <script src="<?=base_url('js/plugin_cat.min.js');?>"></script>
    <!-- Active JS -->
    <script src="<?=base_url('js/active_cat.min.js');?>"></script>

</body>
