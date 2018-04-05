<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>

<body>
	<?php if($this->uri->segment(3) == $this->session->userdata('Id')) { ?>
	<button type="button" id="editbtn" name="editform">Edit Profile</button>
	<div id="editform">
		<form action="<?=base_url("c_profile/m_editusers")?>" method="post">
		<?php foreach($profile as $p) { ?>
			Nama Lengkap<input type="text" name="nama" id="varNama" style="text-transform:capitalize" value="<?php echo $p->fullname; ?>"><br>
			Nomor Telfon<input type="number" name="phone" id="varPhone" style="text-transform:capitalize" value="<?php echo $p->phone; ?>"><br>
			Bio <textarea name="bio" id="varBio" cols="30" rows="10"><?php echo $p->bio; ?></textarea>
			<input type="hidden" id="varId" name="id" value="<?php echo $p->Id; ?>">
			<input type="button" id="editprofile" name="editprofile" value="Edit">
		<?php } ?>
		</form>
	</div>
	<?php }elseif(!empty($this->session->userdata('status'))){ ?>
	<input type="button" id="followbtn" name="followbtn" value="Follow">
	<?php } ?>
	<input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('Id'); ?>">
	<input type="hidden" name="followed_id" id="followed_id" value="<?php echo $this->uri->segment(3); ?>">
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
	<!-- Edit toggle -->
	<script>
		$(function () {
			$("#editform").hide();
			$("#editbtn").click(function () {
				$("#editform").toggle();
			});
		});
	</script>
	<!-- End Edit toggle -->

	<!-- Edit Profile AJAX -->
	<script type="text/javascript">
		$(document).ready(function(){
			$("#editprofile").click(function(){
				var varId  = $('#varId').val();
				var varNama  = $('#varNama').val();
				var varPhone     = $('#varPhone').val();
				var varBio        = $('#varBio').val();
				// var name     = $('#name').val();
				$.ajax({
					type:"POST",
					url :"<?php echo base_url(); ?>" + "C_profile/m_editusers",
					data:
					{
						"id":varId,
						"nama":varNama,
						"phone":varPhone,
						"bio":varBio
					}
				});
			});
		});
	</script>
	<!-- END Edit Profile AJAX -->

	<!-- Follow Profile AJAX -->
	<script type="text/javascript">
		$(document).ready(function(){
			$("#followbtn").click(function(){
				var varUserid  = $('#user_id').val();
				var varFollowedid  = $('#followed_id').val();
				$.ajax({
					type:"POST",
					url :"<?php echo base_url(); ?>" + "C_profile/m_follows",
					data:
					{
						"userid":varUserid,
						"followedid":varFollowedid
					}
				});
			});
		});
	</script>
	<!-- END Follow Profile AJAX -->
</body>

</html>
