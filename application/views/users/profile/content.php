<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>

<body>
	<button type="button" id="editbtn" name="editform">Edit Profile</button>
	<div id="editform">
		<form action="<?=base_url("c_profile/m_editusers")?>" method="post">
		<?php foreach($profile as $p) { ?>
			Nama Lengkap<input type="text" name="nama" id="" style="text-transform:capitalize" value="<?php echo $p->fullname; ?>"><br>
			Nomor Telfon<input type="number" name="phone" id="" style="text-transform:capitalize" value="<?php echo $p->phone; ?>"><br>
			Bio <textarea name="bio" id="" cols="30" rows="10"><?php echo $p->bio; ?></textarea>
			<input type="hidden" name="id" value="<?php echo $p->Id; ?>">
			<input type="submit" name="simpanbtn" value="Simpan">
		<?php } ?>
		</form>
	</div>
	<table border=1>
		<tr>
			<th>Nama</th>
			<th>Email</th>
		</tr>
		<?php 
		foreach($profile as $p)
		{
	?>
		<tr>
			<td>
				<?php echo $p->fullname; ?>
			</td>
			<td>
				<?php echo $p->email; ?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<br>
	<br>
	<table border=1>
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Desc</th>
		</tr>
		<?php 
		foreach($content as $c)
		{
	?>
		<tr>
			<td>
				<?php echo $c->Id; ?>
			</td>
			<td>
				<?php echo $c->title; ?>
			</td>
			<td>
				<?php echo $c->desc; ?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<a href="<?php echo base_url('c_dashboard/index');?>">back</a>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script>
		$(function () {
			$("#editform").hide();
			$("#editbtn").click(function () {
				$("#editform").toggle();
			});
		});
	</script>
</body>

</html>
