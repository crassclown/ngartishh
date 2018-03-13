<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
</head>
<body>
    <form action="<?=base_url('c_loginusers/m_auth');?>" method="post">
        <input type="email" value="" id="txtemail" name="txtemail" placeholder="Your Email" />

        <input type="password" value="" id="txtpassword" name="txtpassword" placeholder="Your Password" />
        <input type="submit" name="btnlogin" id="btnlogin" value="Log In" />
    </form>

    <a href="<?=base_url('c_loginusers/m_moveregister');?>">Do not have an account yet?</a>

</body>
</html>