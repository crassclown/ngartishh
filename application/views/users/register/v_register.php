<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <div id="ajax_registration">
    <!-- method="POST" -->
        <form id="form">
            <input type="email" name="txtemail" id="txtemail" placeholder="Your Email" value="<?php echo set_value('txtemail');?>" />
            <div class="errorMessage"><?php echo form_error('txtemail'); ?></div>
            
            <input type="text" name="txttxtfullname" id="txtfullname" placeholder="Your Fullname" value="<?php echo set_value('txtfullname');?>" />
            <div class="errorMessage"><?php echo form_error('txtfullname'); ?></div>

            <input type="password" name="txtpassword" id="txtpassword" placeholder="Your Password" value="<?php echo set_value('txtpassword');?>" />
            <div class="errorMessage"><?php echo form_error('txtpassword'); ?></div>

            <input type="button" id="btn_insert"  value="Register"/>
        </form>
    </div>

        <a href="<?=base_url('C_loginusers/');?>">Log In?</a>

    <div id="divresult"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">  
            	//insert book 
            $("#btn_insert").click(function(){
                
                    var txtemail = $("#txtemail").val();
                    var txtfullname = $("#txtfullname").val();
                    var txtpassword = $("#txtpassword").val();
                
                    $.ajax({
                        url: "<?php echo base_url(); ?>" + "C_RegisterUsers/m_register/",
                        type: 'post',
                        data: { "txtemail": txtemail, "txtfullname": txtfullname, "txtpassword" : txtpassword},
                        success: function(response) 
                        { 
                            console.log("OK");
                        }
                
                    });
            });
    </script>
</body>
</html>
