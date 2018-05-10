<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - Ngartist</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/Kuas.png')?>"/>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
<!--===============================================================================================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100 wow fadeIn delay-1s">
			<div class="wrap-login100 wow fadeIn delay-1s">
        <div class="row"> 
          <div class="login100-pic js-tilt col-lg-6 wow fadeIn delay-1s" data-tilt>
            <img src="<?php echo base_url('assets/images/toa-heftiba-526250-unsplash.jpg')?>" alt="IMG">
          </div>

          <form class="login100-form validate-form col-lg-6 wow fadeIn delay-1s">
					<input type="hidden" name="txtemail" id="txtemail" value="<?php echo $this->uri->segment(3) ?>">
            <span class="login100-form-title text-center">
              Lupa Password
            </span>
            <span class="login100-form-description text-center">
              Masukkan Password Baru
            </span>
            <div class="wrap-input100 validate-input" data-validate = "Password is required">
              <input class="input100" type="password" name="txtpassword" id="txtpassword" placeholder="Password Baru" maxlength="20" pattern=".{8,20}" title="8 to 20 characters">
              <span class="focus-input100"></span>
            </div>

            <div class="container-login100-form-btn">
            
              <button type="button" class="login100-form-btn" name="btnreset" id="btnreset">
                Reset Password
              </button>
            </div>

            <!-- <div class="text-center p-t-12">
              <span class="txt1">
                Forgot
              </span>
              <a class="txt2" href="#">
                Username / Password?
              </a>
            </div> -->

            <div class="text-center p-t-12">
              <a class="txt2" href="<?=base_url('c_loginusers/m_moveregister');?>">
                Create your Account
                <i class="m-l-5" aria-hidden="true"></i>

            <div class="text-center p-t-12">
              <a class="txt2" href="<?=base_url('c_loginusers/');?>">
                Already have account
                <i class="m-l-5" aria-hidden="true"></i>
              </a>
            </div>

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
  <script>
    $(document).ready(function(){
        $('#btnreset').click(function(){
            var txtemail      = $('#txtemail').val();
            // var txtfullname   = $('#txtfullname').val();
            var txtpassword   = $('#txtpassword').val();
            // var quantity     = $('#' + produk_id).val();
            if(txtpassword == ''){
              swal({
                type: 'error',
                title: 'Password is required',
                animation: true,
                customClass: 'animated tada'
              })
            }else{
							$.ajax({
								type: "POST",
								url: "<?php echo base_url(); ?>" + "C_loginusers/m_resetpassword",
								data: {
									"email": txtemail,
									"password": txtpassword
								},
								complete: function(){
									swal({
										type: 'success',
										title: 'Berhasil',
										text: 'Password Anda Berhasil Diubah! Silahkan Login!',
										timer: 3000,
										showConfirmButton: false
									},function() {
											window.location = "<?=base_url('C_loginusers/index')?>";
									})
								}
							});
						}
        });
    });
  </script>
</body>
</html>
