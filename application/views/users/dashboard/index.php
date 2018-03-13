<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $this->session->userdata("email"); ?></h2>
	<a href="<?php echo base_url('c_loginusers/m_logout'); ?>">Logout</a>
</body>
</html>