
<section id="section-works-profil" class="section appear clearfix" style="background-image:url('<?php echo base_url('assets/images/bright_squares.png')?>');">
	<!-- <?php foreach($profile as $p){ ?>
	<div class="head-profil">
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-3">
				<p class="baris-foto-profil">
					<?php if(isset($p->fotoprofil)&&$p->fotoprofil!=''){ ?>
					<div class="foto-profil">
						<img onmousedown="return false" oncontexmenu="return false" onselectstart="return false" class="img-responsive" src=<?php echo base_url("assets/images/profilepicture/".$p->fotoprofil."")?>/>
					</div>
					<?php }else{ ?>
					<div class="foto-profil">
						<!-- <?php echo substr(trim(ucfirst($p->fullname)),0,1); ?> -->
					</div>
					<?php } ?>
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
				<?php }else{ ?>
				<button type="button" class="btn btn-info btn-sm" data-toggle="modal" title="Edit" data-target="#modal-edit-profile">
					Edit Profile
				</button>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?> -->
	<div class="container container-profil">

		<a href="#" class="button-tab">Galeri Saya</a>
		<a href="#" class="button-tab">Upvote</a>
		<a href="#" class="button-tab">Galeri Lelang</a>
		<div class="col-md-12 border-content-profil">
		<section class="gallery-block cards-gallery">
	    <div class="container">

	        <div class="row">
	            <div class="col-md-6 col-lg-4">
	                <div class="card border-0 transform-on-hover">
	                	<a class="lightbox" href="<?php echo base_url('assets/images/image1.jpg')?>">
	                		<img src="<?php echo base_url('assets/images/image1.jpg')?>" alt="Card Image" class="card-img-top">
	                	</a>
	                    <div class="card-body">
	                        <h6><a href="#">Tersisa 1 Hari !</a></h6>
	                       
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6 col-lg-4">
	                <div class="card border-0 transform-on-hover">
						<a class="lightbox" href="<?php echo base_url('assets/images/image1.jpg')?>">
						<img src="<?php echo base_url('assets/images/image1.jpg')?>" alt="Card Image" class="card-img-top">
		                </a>
	                    <div class="card-body">
	                        <h6><a href="#">Tersisa 2 Hari !</a></h6>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6 col-lg-4">
	                <div class="card border-0 transform-on-hover">
	                	<a class="lightbox" href="<?php echo base_url('assets/images/image1.jpg')?>">
	                	<img src="<?php echo base_url('assets/images/image1.jpg')?>" alt="Card Image" class="card-img-top">
	                	</a>
	                    <div class="card-body">
	                        <h6><a href="#">Tersisa 3 Hari !</a></h6>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6 col-lg-4">
	                <div class="card border-0 transform-on-hover">
	                	<a class="lightbox" href="<?php echo base_url('assets/images/image1.jpg')?>">
	                	<img src="<?php echo base_url('assets/images/image1.jpg')?>" alt="Card Image" class="card-img-top">
	                	</a>
	                    <div class="card-body">
	                        <h6><a href="#">Tersisa 2 Hari !</a></h6>
	                        
	                    </div>
	                </div>
	            </div>
				
	        
	        </div>
	    </div>
    </section>
		</div>

	</div>

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
						<form action="<?=base_url('c_profile/m_follows')?>" method="post">
							<input type="hidden" name="followedid" value="<?php echo $fer->Id ?>">
							<input type="hidden" name="userid" value="<?php $this->session->userdata('Id') ?>">
						<input type="submit" class="button-modal-follow btn-info" value="Follow">
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
						<form action="<?=base_url('c_profile/m_follows')?>" method="post">
							<input type="hidden" name="followedid" value="<?php echo $fing->Id ?>">
							<input type="hidden" name="userid" value="<?php echo $this->session->userdata('Id') ?>">
						<input type="submit" class="button-modal-follow btn-info" value="Follow">
						</form>
					</div>
					<?php } ?>
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
                    <div class="modal-header text-center header-edit-profil">
						<button type="button" class="close close-left" data-dismiss="modal">&larr;</button>
						<h4 class="modal-title">Pengaturan Akun</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="padding-modal-body">
                            <form enctype="multipart/form-data" id="editprofile">
								<div id="wrap-input-foto-profil">
                                    <img id="sebelum-blah" src="#" ></img>
									<input type="hidden" name="txtid" id="txtid" value="<?php echo $this->session->userdata('Id');?>">

                                    <input type="file" id="foto-profil" onchange="readURL(this);" accept="image/jpeg, image/png" name="fotoprofil" class="fotoprofil">
                                    <label class="button text-center" for="foto-profil"><i class="fa fa-camera" style="font:24px;margin:15px;"></i></label>
								</div>
                                <table>
                                    <tr>
                                        Username :                                       
                                            <div class="wrap-input100">
                                            <input class="input100" type="text" name="txtusername" id="txtusername" placeholder="Username">
                                            <span class="focus-input100"></span>
                                            </div>
                                    </tr>
                                    <tr>
                                        No Telp :                                       
                                            <div class="wrap-input100">
                                            <input class="input100" type="number" name="txtnotelp" id="txtnotelp" placeholder="No Telpon">
                                            <span class="focus-input100"></span>
                                            </div>
                                    </tr>
                                    <tr>
                                       Bio :
                                                    <textarea name="txtbio" rows="3" cols="30" placeholder="Descrption" id="txtbio"></textarea>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer footer-edit-profil">
                        <input type="submit" class="btn btn-default submit-edit-profil" value="Submit">
						</div>
					 </form>

                </div>
		<!-- modal edit profile -->
</section>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

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
                                '<div class="portfolio-item">'+
                                '<a href=<?=base_url('c_dashboard/m_detailContent/');?>'+data[i].idcontent+'/'+data[i].iduser+'>'+
                                    '<img onmousedown="return false" oncontexmenu="return false" onselectstart="return false" class="img-content img-responsive" src=<?php echo base_url("assets/images/content/'+data[i].photos+'")?> alt="'+data[i].photos+'" />'+                              
                                    '</a>'+
                                    '<div class="portfolio-desc align-center">'+
                                        '<div class="folio-info">'+
                                            '<div class="row image-icons">'+
                                                '<div class="col-md-4 col-lg-4">'+
                                                    '<ol class="grid">'+
                                                        '<li class="grid__item">'+
                                                            '<a style="cursor: pointer;" class="like icobutton icobutton--thumbs-up" data-contentid="'+data[i].idcontent+'" data-sessionuserid="<?php echo $this->session->userdata("Id");?>"><span class="fa fa-thumbs-up"></span></a><sup class="badge">'+data[i].total_like+'</sup>'+
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
<?php $this->load->view('users/dashboard/upload_content'); ?>


<!-- AddToAny BEGIN -->
<script>
	var a2a_config = a2a_config || {};
	a2a_config.linkurl = "http://[::1]/Kuliah/PBF/Ngartish/ngartish/c_dashboard/";
	a2a_config.onclick = 1;

</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>

<script>
	$(document).ready(function () {
		$("#txtcategories").select2({
			placeholder: "Please select the category"
		});
	});

</script>

<!-- Edit Profile AJAX -->
<script type="text/javascript">
	$(document).ready(function () {
		$("#editprofile").submit(function(e){
			var formData = new FormData($(this)[0]);
			var varId = $('#txtid').val();
			var varFotoprofil = $('.fotoprofil').val();
			var varUsername = $('#txtusername').val();
			var varPhone = $('#txtnotelp').val();
			var varBio = $('#txtbio').val();
			
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "C_profile/m_editusers",
				data: formData,
				processData:false,
                contentType:false,
                cache:false,
                async:true,
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.cards-gallery', { animation: 'slideIn'});
    </script>


