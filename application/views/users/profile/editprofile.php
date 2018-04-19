<!-- modal edit profile -->
<div class="modal fade" id="modal-edit-profile" role="dialog">
	<div class="modal-dialog modal-body-follow">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header text-center header-edit-profil">
				<button type="button" class="close close-left" data-dismiss="modal">&larr;</button>
				<h4 class="modal-title">Pengaturan Akun</h4>
			</div>
			<div class="modal-body ">
				<div class="padding-modal-body">
					<form enctype="multipart/form-data" method="post" action="<?=base_url('c_profile/m_editusers')?>" id="editprofile">
						<?php foreach($profile as $p){ ?>
						<div id="wrap-input-foto-profil">
							<img id="sebelum-blah" src="#"></img>
							<input type="hidden" name="txtid" id="txtid" value="<?php echo $this->session->userdata('Id');?>">

							<input type="file" id="foto-profil" onchange="readURL(this);" accept="image/jpeg, image/png" name="fotoprofil" class="fotoprofil" value="<?php echo $p->fotoprofil; ?>">
							<label class="button text-center" for="foto-profil">
								<i class="fa fa-camera" style="font:24px;margin:15px;"></i>
							</label>
						</div>
						<table>
							<tr>
								Username :
								<div class="wrap-input100">
									<input class="input100" type="text" name="txtusername" id="txtusername" placeholder="Username" value="<?php echo $p->username; ?>">
									<span class="focus-input100"></span>
								</div>
							</tr>
							<tr>
								No Telp :
								<div class="wrap-input100">
									<input class="input100" type="number" name="txtnotelp" id="txtnotelp" placeholder="No Telpon" value="<?php echo $p->phone; ?>">
									<span class="focus-input100"></span>
								</div>
							</tr>
							<tr>
								Bio :
								<textarea name="txtbio" rows="3" cols="30" placeholder="Descrption" id="txtbio"><?php echo $p->bio; ?></textarea>
							</tr>
						</table>
				</div>
			</div>
			<div class="modal-footer footer-edit-profil">
				<input type="submit" class="btn btn-default submit-edit-profil" value="Submit">
			</div>
			<?php } ?>
			</form>
		</div>
		<!-- modal edit profile -->
