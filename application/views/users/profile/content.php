<section id="section-works-profil" class="section appear clearfix" style="background-image:url('<?php echo base_url('assets/images/bright_squares.png')?>');">
	<?php foreach($profile as $p){ ?>
	<div class="head-profil">
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-3">
				<p class="baris-foto-profil">
					<div class="foto-profil"></div>
					<span class="nama-foto-profil" style="text-transform:capitalize;">
						<?php echo $p->fullname ?>
					</span>
				</p>
			</div>
			<div class="col-md-2 padding-button-follow">
				<button type="button" class="btn btn-info btn-sm" data-toggle="modal" title="Notification" data-target="#modal-followers">followers
					<b>
						<?php echo $totalfollower ?>
					</b>
				</button>
			</div>
			<div class="col-md-2 padding-button-follow">
				<button type="button" class="btn btn-info btn-sm" data-toggle="modal" title="Notification" data-target="#modal-following">following
					<b>
						<?php echo $totalfollowing ?>
					</b>
				</button>
			</div>
			<div class="col-md-2 padding-button-follow">
				<input type="hidden" id="user_id" value="<?php echo $this->session->userdata('Id'); ?>">
				<input type="hidden" id="followed_id" value="<?php echo $this->uri->segment(3); ?>">
				<?php if($this->session->userdata('Id')!=$this->uri->segment(3)){ ?>
				<button type="button" class="btn btn-info btn-sm" id="followbtn">
					Follow
				</button>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="container container-profil">

		<a href="#" class="button-tab">Galeri Saya</a>
		<a href="#" class="button-tab">Upvote</a>
		<a href="#" class="button-tab">Galeri Lelang</a>
		<div class="col-md-12 border-content-profil">
			<div class="portfolio-items isotopeWrapper clearfix ">
				<div class="row">

					<article class="col-md-4 col-lg-3 isotopeItem webdesign">
						<div class="space">
							<div class="portfolio-item">
								<button type="button" class="btn btn-info btn-lg modal-right " data-backdrop="static" data-keyboard="false" data-toggle="modal"
								title="New Post" data-target="#myModal">
									<i class="material-icons " style="font-size:40px;">file_upload</i>
								</button>
							</div>
						</div>
					</article>

					<div id="show_dataprofile"></div>

				</div>
			</div>
		</div>

	</div>

	<!-- madal input new post -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">What do you have today?</h4>
				</div>
				<div class="modal-body ">
					<div class="row">
						<div class="col-md-6">
							<div class="padding-modal-body">
								<form method="POST" enctype="multipart/form-data" id="form-upload" autocomplete="off" action="<?php echo site_url('c_dashboard/do_upload');?>">
									<table>
										<tr>
											<div class="wrap-input100">
												<div class="input-group stylish-input-group">
													<input class="input100 form-control" type="hidden" name="txtsession" id="txtsession" value="<?=$this->session->userdata('Id');?>"
													style="width:30em;" readOnly />
													<span class="focus-input100"></span>
												</div>
											</div>
										</tr>
										<tr>
											<div class="wrap-input100">
												<div class="input-group stylish-input-group">
													<input class="input100 form-control" type="text" name="txttitle" id="txttitle" placeholder="Title" require style="width:30em;"
													required="required">
													<span class="focus-input100"></span>
												</div>
											</div>
										</tr>
										<tr>
											<textarea name="txtdesc" rows="3" cols="30" placeholder="Description" class="form-control" id="txtdesc" require style="width:30em;"
											required="required"></textarea>
										</tr>
										<tr>
											Categories
											</td>
											<td>
												<div class="row">
													<div class="col-md-3">
														<div class="form-check">
															<select name="txtcategories" id="txtcategories">
																<option value=""></option>
																<option value="1">Ilustrasi</option>
																<option value="2">Surealism</option>
																<option value="3">Mural</option>
																<option value="4">Impresionisme</option>
																<option value="5">Neo-Impresionisme</option>
															</select>
														</div>
													</div>
												</div>
											</td>
										</tr>
									</table>
							</div>
						</div>
						<div class="col-md-6 ">
							<div id="drop-area">
								<p class="text-center">Upload files by click or drag files to this area</p>
								<input type="file" id="fileElem" name="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
								<label class="button text-center" for="fileElem">
									<i class="material-icons " style="font-size:60px;">file_upload</i>
								</label>
								<progress id="progress-bar" max=100 value=0></progress>
								<div id="gallery" /></div>
						</div>

						<p class="error">

						</p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="btnpost">
					<i class="fa fa-paper-plane" aria-hidden="true"></i> Post</button>
				</form>
				<div id="uploaded_image"></div>
			</div>
		</div>

	</div>
	</div>
	<!-- end modal upload new post-->

	<!-- modal followers -->
	<div class="modal fade" id="modal-followers" role="dialog">
		<div class="modal-dialog modal-body-follow">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Followers</h4>
				</div>
				<div class="modal-body">
					<?php foreach($follower as $fer){ ?>
					<div class="content-modal-follow">
						<div class="foto-profil-modal-follow">
						</div>
						<span class="modal-nama" style="text-transform:capitalize">
							<p>
								<b>
									<?php echo $fer->fullname ?>
								</b>
							</p>
							<?php echo $fer->phone ?>
						</span>
						<button class="button-modal-follow btn-info"> follow</button>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<!-- end modal followers -->

	<!-- modal following -->
	<div class="modal fade" id="modal-following" role="dialog">
		<div class="modal-dialog modal-body-follow">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Following</h4>
				</div>
				<div class="modal-body">
					<?php foreach($following as $fing){ ?>
					<div class="content-modal-follow">
						<div class="foto-profil-modal-follow">
						</div>
						<span class="modal-nama" style="text-transform:capitalize">
							<p>
								<b>
									<?php echo $fing->fullname ?>
								</b>
							</p>
							<?php echo $fing->phone ?>
						</span>
						<button class="button-modal-follow btn-info"> follow</button>
					</div>
					<?php } ?>
				</div>
			</div>

		</div>
	</div>
	<!-- end modal following -->
</section>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil gambar.
        
        function tampil_data_barang(){
			var varUser = $('#followed_id').val();
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>c_profile/m_getContentsUser/'+varUser,
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html +=                         
                        '<article class="col-md-4 col-lg-3 isotopeItem webdesign">'+
                            '<div class="space">'+
                                '<div class="gantungan">'+
                                    '<div class="pin text-center">'+
                                    '<b>'+data[i].namalengkap.trim().substr(0,1).toUpperCase()+'</b>'+
                                    '</div>'+
                                '</div> '+
                                '<div class="portfolio-item">'+
                                '<a href=<?=base_url('c_dashboard/m_detailContent/');?>'+data[i].idcontent+'/'+data[i].iduser+'>'+
                                    '<img class="img-content img-responsive" src=<?php echo base_url("assets/images/content/'+data[i].photos+'")?> alt="'+data[i].photos+'" />'+                              
                                    '</a>'+
                                    '<div class="portfolio-desc align-center">'+
                                        '<div class="folio-info">'+
                                            '<div class="row image-icons">'+
                                                '<div class="col-md-4 col-lg-4">'+
                                                    '<ol class="grid">'+
                                                        '<li class="grid__item">'+
                                                            '<a class="like icobutton icobutton--thumbs-up" data-contentid="'+data[i].idcontent+'" data-sessionuserid="<?php echo $this->session->userdata("Id");?>"><span class="fa fa-thumbs-up"></span></a><sup class="badge">'+data[i].total_like+'</sup>'+
                                                        '</li>'+
                                                    '</ol>'+
                                                '</div>'+
                                                '<div class="col-md-4 col-lg-4">'+
                                                    '<a><i class="fa fa-comment"></i><sup class="badge">'+data[i].total_comment+'</sup></a>'+
                                                '</div>'+
                                                '<div class="col-md-4 col-lg-4">'+
                                                    '<a class="a2a_dd" href="https://www.addtoany.com/share"><i class="fa fa-share-alt"></i></a>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+  
                                '</div>'+
                                
                            '</div>'+
                        '</article>';
                    }
                    $('#show_dataprofile').html(html);
                }
                
                
            });
        }
        $(document).on("click",".like",function() {
            var content_id = $(this).attr("data-contentid");
            var user_id = $(this).attr("data-sessionuserid");
            $.ajax({
                url: "<?php echo base_url(); ?>" + "c_dashboard/m_like/",
                type: 'post',
                data: { "content_id": content_id, "user_id": user_id},
                success: function(response) 
                { 
                    tampil_data_barang();
                }
            });
        });
    });
  </script>
<script>
	$(document).ready(function () {

		$('#form-upload').submit(function (e) {
			e.preventDefault();
			var formData = new FormData($(this)[0]);

			var varTitle = $('#txttitle').val();
			var varDesc = $('#txtdesc').val();
			var varCat = $('#txtcategories').val();
			var varPic = $('#fileElem').val();
			if (varTitle == '') {
				swal({
					type: 'error',
					title: 'The title is required',
					animation: true,
					customClass: 'animated tada'
				})
			} else if (varDesc == '') {
				swal({
					type: 'error',
					title: 'The description is required',
					animation: true,
					customClass: 'animated tada'
				})
			} else if (varCat == '') {
				swal({
					type: 'error',
					title: 'The category is required',
					animation: true,
					customClass: 'animated tada'
				})
			} else if (varPic == '') {
				swal({
					type: 'error',
					title: 'Picture is required',
					animation: true,
					customClass: 'animated tada'
				})
			} else {
				//reset error messsage
				$('.error').html('');
				$.ajax({
					url: $(this).attr("action"),
					type: 'POST',
					dataType: 'json',
					data: formData,
					async: true,
					beforeSend: function () {
						$('#btnpost').prop('disabled', true);
					},
					success: function (response) {
						if (!response.status) {
							$('.error').html(response.error);
						}
					},
					complete: function () {
						$('#btnpost').prop('disabled', false);
						location.reload();
					},
					cache: false,
					contentType: false,
					processData: false
				});
			}
		});
	});

</script>


<!-- AddToAny BEGIN -->
<script>
	var a2a_config = a2a_config || {};
	a2a_config.linkurl = "http://[::1]/Kuliah/PBF/Ngartish/ngartish/c_dashboard/";
	a2a_config.onclick = 1;

</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
<!-- <script>
    $(document).ready(function(){
        $('#upload_form').on('submit',function(e){

            var varTitle    = $('#txttitle').val();
            var varDesc     = $('#txtdesc').val();
            var varCat      = $('#txtcategories').val();
            var varPic      = $('#fileElem').val();
            var varSession  = $('#txtsession').val();
            if(varTitle == ''){
              swal({
                type: 'error',
                title: 'The title is required',
                animation: true,
                customClass: 'animated tada'
              })
            }else if(varDesc == ''){
              swal({
                type: 'error',
                title: 'The description is required',
                animation: true,
                customClass: 'animated tada'
              })
            }else if(varCat == ''){
              swal({
                type: 'error',
                title: 'The category is required',
                animation: true,
                customClass: 'animated tada'
              })
            }else if(varPic == ''){
                swal({
                type: 'error',
                title: 'Picture is required',
                animation: true,
                customClass: 'animated tada'
              })
            }else{
                $.ajax({
                url : "<?php echo base_url();?>c_dashboard/m_post",
                method : "POST",
                data : new FormData(this),
                contentType: false,
                cache: false,
                processData:false
              });
            }
        });
    });
</script> -->
<script>
	$(document).ready(function () {
		$("#txtcategories").select2({
			placeholder: "Please select the category"
		});
	});

</script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
	$(document).ready(function () {
		$("#editprofile").click(function () {
			var varId = $('#varId').val();
			var varNama = $('#varNama').val();
			var varPhone = $('#varPhone').val();
			var varBio = $('#varBio').val();
			// var name     = $('#name').val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "C_profile/m_editusers",
				data: {
					"id": varId,
					"nama": varNama,
					"phone": varPhone,
					"bio": varBio
				}
			});
		});
	});

</script>
<!-- END Edit Profile AJAX -->

<!-- Follow Profile AJAX -->
<script type="text/javascript">
	$(document).ready(function () {
		$("#followbtn").click(function () {
			var varUserid = $('#user_id').val();
			var varFollowedid = $('#followed_id').val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "C_profile/m_follows",
				data: {
					"userid": varUserid,
					"followedid": varFollowedid
				}
			});
		});
	});

</script>
<!-- END Follow Profile AJAX -->
<!-- modal following -->
<div class="modal fade" id="modal-edit-profil" role="dialog">
	<div class="modal-dialog modal-body-follow">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Following</h4>
			</div>
			<div class="modal-body">
				<div class="content-modal-follow">
					<div class="foto-profil-modal-follow">
					</div>
					<span class="modal-nama">
						<p>
							<b>Nama Lengkap</b>
						</p>Username</span>
					<button class="button-modal-follow btn-info"> follow</button>
				</div>
				<div class="content-modal-follow">
					<div class="foto-profil-modal-follow">
					</div>
					<span class="modal-nama">
						<p>
							<b>Nama Lengkap</b>
						</p>Username</span>
					<button class="button-modal-follow btn-info"> unfollow</button>
				</div>
				<div class="content-modal-follow">
					<div class="foto-profil-modal-follow">
					</div>
					<span class="modal-nama">
						<p>
							<b>Nama Lengkap</b>
						</p>Username</span>
					<button class="button-modal-follow btn-info"> follow</button>
				</div>
				<div class="content-modal-follow">
					<div class="foto-profil-modal-follow">
					</div>
					<span class="modal-nama">
						<p>
							<b>Nama Lengkap</b>
						</p>Username</span>
					<button class="button-modal-follow btn-info"> unfollow</button>
				</div>
				<div class="content-modal-follow">
					<div class="foto-profil-modal-follow">
					</div>
					<span class="modal-nama">
						<p>
							<b>Nama Lengkap</b>
						</p>Username</span>
					<button class="button-modal-follow btn-info"> unfollow</button>
				</div>
				<div class="content-modal-follow">
					<div class="foto-profil-modal-follow">
					</div>
					<span class="modal-nama">
						<p>
							<b>Nama Lengkap</b>
						</p>Username</span>
					<button class="button-modal-follow btn-info"> follow</button>
				</div>
				<div class="content-modal-follow">
					<div class="foto-profil-modal-follow">
					</div>
					<span class="modal-nama">
						<p>
							<b>Nama Lengkap</b>
						</p>Username</span>
					<button class="button-modal-follow btn-info"> follow</button>
				</div>
				<div class="content-modal-follow">
					<div class="foto-profil-modal-follow">
					</div>
					<span class="modal-nama">
						<p>
							<b>Nama Lengkap</b>
						</p>Username</span>
					<button class="button-modal-follow btn-info"> follow</button>
				</div>
				<div class="content-modal-follow">
					<div class="foto-profil-modal-follow">
					</div>
					<span class="modal-nama">
						<p>
							<b>Nama Lengkap</b>
						</p>Username</span>
					<button class="button-modal-follow btn-info"> follow</button>
				</div>

			</div>
		</div>

	</div>
</div>
<!-- end modal following -->

<!-- modal edit profile -->
<div class="modal fade" id="modal-edit-profile" role="dialog">
	<div class="modal-dialog modal-body-follow">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">New Posting</h4>
			</div>
			<div class="modal-body ">
				<div class="padding-modal-body">
					<form action="#" method="POST" enctype="multipart/form-data">
						<table>
							<tr>
								Username :
								<div class="wrap-input100">
									<input class="input100" type="text" name="txtusername" placeholder="Username">
									<span class="focus-input100"></span>
								</div>
							</tr>
							<tr>
								No Telp :
								<div class="wrap-input100">
									<input class="input100" type="number" name="txtnotelp" placeholder="No Telpon">
									<span class="focus-input100"></span>
								</div>
							</tr>
							<tr>
								Bio :
								<textarea name="txtbio" rows="3" cols="30" placeholder="Descrption"></textarea>
							</tr>
						</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-default">Submit</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>

	</div>
</div>
<!-- end modal edit profile -->
</section>


