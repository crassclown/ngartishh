<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link href='https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,400italic,300italic,300|Raleway:300,400,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/animate.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">

  </head>
  <body>

    <div class="content">
      <div class="container wow fadeInDown delay-03s">
        <div class="row">
          <div class="logo text-center">
            <img src="<?=base_url('assets/img/logo.png');?>" alt="logo" width="150">
            <h2>Login</h2>
          </div>
        </div>
      </div>
 
      <div id="contact-info">
        <div class="container">
          <div class="row">
            <div class="col-md-6 wow fadeInLeft delay-03s ">
              <div class="contact-title">
                <i class="fa fa-envelope"></i>
                <h2>Get in the first</h2>
                <p>Jadilah yang pertama menjadi terkenal hanya dengan karya mu</p>
              </div>
            </div>
            <div class="contact col-md-6 wow fadeInRight delay-08s">
              <div class="col-md-10 col-md-offset-1">
                <div id="note"></div>
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="<?=base_url('c_loginusers/m_auth');?>" method="post" role="form" class="contactForm">
                <div class="form-group">
                    <input type="email" class="form-control" name="txtemail" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>

                  <div class="form-group">
                    <input type="password" name="txtpassword" class="form-control" id="password" placeholder="Your Password" data-rule="password" data-msg="Please enter Your Password" />
                    <div class="validation"></div>
                  </div>

                  <div class="text-center"><input type="submit" name="btnlogin" value="Log In"class="contact-submit"/></div>
                </form>
                <div class="text-center"><a class="register" href="<?=base_url('c_loginusers/m_moveregister');?>">Do not have an account yet?</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section id="about" class="section-padding">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
              <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp delay-02s">
                <div class="img">
                  <i class="fa fa-refresh"></i>
                </div>
                <h3 class="abt-hd">Our process</h3>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                <div class="img">
                  <i class="fa fa-eye"></i>
                </div>
                <h3 class="abt-hd">Our Vision</h3>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp delay-06s">
                <div class="img">
                  <i class="fa fa-cogs"></i>
                </div>
                <h3 class="abt-hd">Our Approach</h3>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp delay-08s">
                <div class="img">
                  <i class="fa fa-dot-circle-o"></i>
                </div>
                <h3 class="abt-hd">Our Objective</h3>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-padding">
        <div class="container wow fadeIn delay-03s">
          <div class="row bort text-center">
            <div class="social">
              <ul>
                <li>
                  <a href=""><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href=""><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

    
    </div>
    <footer class="footer">
      <div class="container">
        <div class="row bort">

          <div class="copyright">
            © Copyright Ngartish. All rights reserved.
            <div class="credits">
              <!--
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Maundy
              -->
            </a>
            </div>
          </div>

        </div>
      </div>
    </footer>
  
    <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.countdown.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/wow.js')?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
    <!-- <script src="<?php echo base_url('assets/contactform/contactform.js')?>"></script> -->
  </body>
</html>
