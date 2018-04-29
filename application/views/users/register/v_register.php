<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register - Ngartish</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
  <!-- <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/Ngartish.png')?>"/> -->
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/Kuas.png')?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animate/animate.css')?>">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
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
            <img src="<?php echo base_url('assets/images/1.png')?>" alt="IMG">
          </div>

          <form class="login100-form validate-form col-lg-6 wow fadeIn delay-1s" method="post" autocomplete="off">
            <span class="login100-form-title">
              Register Account
            </span>
            <span class="login100-form-description">
                Please complete to create your account
            </span>
            <?php
              if($this->session->flashdata('success')){
                ?>
                  <script>
                    swal({
                      title: "Joined",
                      text: "<?php echo $this->session->flashdata('success'); ?>",
                      timer: 2000,
                      showConfirmButton: false,
                      type: 'success'
                    });
                  </script>
                <?php
              }
              else if($this->session->flashdata('email_err')){
                ?>
                  <script>
                    swal({
                      title: "Error",
                      text: "<?php echo $this->session->flashdata('email_err'); ?>",
                      timer: 2000,
                      showConfirmButton: false,
                      type: 'error'
                    });
                  </script>
                <?php
              }else if($this->session->flashdata('exists_email')){
                ?>
                  <script>
                    swal({
                      title: "Error",
                      text: "<?php echo $this->session->flashdata('exists_email'); ?>",
                      timer: 2000,
                      showConfirmButton: false,
                      type: 'error'
                    });
                  </script>
                <?php
              }
            ?>
            
            <div class="container-login100-form-btn">
              <div class="wrap-input100 validate-input" data-validate = "Valid Email is required: ex@abc.xyz">
                <input class="input100" type="email" name="txtemail" id="txtemail" placeholder="Email" autofocus>
                <span class="focus-input100"></span>
              </div>
              <div class="wrap-input100 validate-input" data-validate = "Fullname is required">
                <input class="input100" type="text" name="txtfullname" id="txtfullname" placeholder="Fullname">
                <span class="focus-input100"></span>
              </div>

              <div class="wrap-input100 validate-input" data-validate = "Phone is requires">
                <input class="input100" type="text" name="txtphone" maxlength="13" id="txtphone" placeholder="Phone Number">
                <span class="focus-input100"></span>
              </div>


              <div class="wrap-input100 validate-input" data-validate = "Password is required">
                <input class="input100" type="password" name="txtpassword" id="txtpassword" placeholder="Password" pattern=".{8,20}" title="8 to 20 characters" maxlength="20">
                <span class="focus-input100"></span>
              </div>
              <div class="container-login100-form-btn">
              
                <button class="login100-form-btn" name="btnlogin" id="btnregister" onclick="checkPwd()">
                  Register
                </button>
            </div>

            <div class="text-center p-t-12">
              <a class="txt2" href="<?=base_url('c_loginusers/');?>">
                Already have account
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
  <script>
    $(document).ready(function(){
        $('#btnregister').click(function(){
            var txtemail      = $('#txtemail').val();
            var txtfullname   = $('#txtfullname').val();
            var txtpassword   = $('#txtpassword').val();
            var txtphone      = $('#txtphone').val();
            if(txtemail == ''){
              swal({
                type: 'error',
                title: 'Email is required',
                animation: true,
                customClass: 'animated tada'
              })
            }else if(txtfullname == ''){
              swal({
                type: 'error',
                title: 'Fullname is required',
                animation: true,
                customClass: 'animated tada'
              })
            }else if(txtphone == ''){
              swal({
                type: 'error',
                title: 'Phone Number is required',
                animation: true,
                customClass: 'animated tada'
              })
            }else if(txtpassword == ''){
              swal({
                type: 'error',
                title: 'Password is required',
                animation: true,
                customClass: 'animated tada'
              })
            }else if(txtpassword.length < 8){
              swal({
                type: 'error',
                title: 'Too Short : min. 8 character',
                animation: true,
                customClass: 'animated tada'
              });
              return ("too_short");
            }
            else if(txtpassword.length > 20){
              swal({
                type: 'error',
                title: 'Too Long',
                animation: true,
                customClass: 'animated tada'
              });
              return ("too_long");
            }else if(txtpassword.search(/\d/) == -1){
              swal({
                type: 'error',
                title: 'No Num',
                animation: true,
                customClass: 'animated tada'
              });
              return ("no_num");
            }
            else if(txtpassword.search(/[a-zA-Z]/) == -1){
              swal({
                type: 'error',
                title: 'No Letter',
                animation: true,
                customClass: 'animated tada'
              });
              return ("no_letter");
            }
            else if(txtpassword.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+\.\,\;\:]/) != -1){
              swal({
                type: 'error',
                title: 'Bad Char',
                animation: true,
                customClass: 'animated tada'
              });
              return ("bad_char");
            }else{
              $.ajax({
                url : "<?php echo base_url();?>C_RegisterUsers/m_register",
                method : "POST",
                data : {txtemail: txtemail, txtfullname: txtfullname, txtpassword: txtpassword, txtphone:txtphone},
								complete: function(){
									swal({
										type: 'success',
										title: 'Berhasil',
										text: 'Silahkan periksa email anda untuk konfirmasi!',
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
