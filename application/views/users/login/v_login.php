<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/favicon.ico')?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animate/animate.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css')?>">
<!--===============================================================================================--> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Rammetto+One" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100 wow fadeIn delay-1s">
			<div class="wrap-login100 wow fadeIn delay-1s">
        <div class="row"> 
          <div class="login100-pic js-tilt col-lg-6 wow fadeIn delay-1s" data-tilt>
            <img src="<?php echo base_url('assets/images/1.png')?>" alt="IMG">
          </div>

          <form class="login100-form validate-form col-lg-6 wow fadeIn delay-1s" method="post">
            <span class="login100-form-title">
              Member Login
            </span>
            <span class="login100-form-description">
              Bergabung bersama kami, bersiap untuk explorasi dan sharing berbagai macam karya seni!
            </span>
            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
              <input class="input100" type="text" name="txtemail" placeholder="Email">
              <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Password is required">
              <input class="input100" type="password" name="txtpassword" placeholder="Password">
              <span class="focus-input100"></span>
            </div>
            <div class="container-login100-form-btn">
            
              <button class="login100-form-btn" name="btnlogin" href=""<?=base_url('c_loginusers/m_auth');?>"">
                Login
              </button>
            </div>

            <div class="text-center p-t-12">
              <span class="txt1">
                Forgot
              </span>
              <a class="txt2" href="#">
                Username / Password?
              </a>
            </div>

            <div class="text-center p-t-12">
              <a class="txt2" href="<?=base_url('c_loginusers/m_moveregister');?>">
                Create your Account
                <i class="m-l-5" aria-hidden="true"></i>
              </a>
            </div>
          </form>
        </div>
      </div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url('assets/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/tilt/tilt.jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/wow.js')?>"></script>
  <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
  <script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/js/main.js')?>"></script>

</body>
</html>