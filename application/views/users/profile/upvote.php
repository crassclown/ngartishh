<section id="section-works-profil" class="section appear clearfix" style="background-image:url('<?php echo base_url('assets/images/bright_squares.png')?>');">
	<?php foreach($profile as $p){ ?>
	<div class="head-profil">
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-3">
				<p class="baris-foto-profil">
					<?php if(isset($p->fotoprofil)&&$p->fotoprofil!=''){ ?>
					<div class="foto-profil" style="padding-top:0">
						<img class="img-responsive img-border-radius-profil" src=<?php echo base_url("assets/images/profilepicture/".$p->fotoprofil."")?>></img>
					</div>
					<?php }else{ ?>
					<div class="foto-profil">
						<?php echo substr(trim(ucfirst($p->fullname)),0,1); ?>
					</div>
					<?php } ?>
					<span class="nama-foto-profil" style="text-transform:capitalize;">
						<?php echo $p->fullname ?>
					</span>
				</p>
			</div>
			<div class="col-md-2 padding-button-follow">
				<button type="button" class="btn btn-info btn-sm" data-toggle="modal" title="Notification" data-target="#modal-follower" id="btnfollower">
					<b>
						<div id="followercounter">followers <?php echo $totalfollower ?></div>
					</b>
				</button>
			</div>
			<div class="col-md-2 padding-button-follow">
				<button type="button" class="btn btn-info btn-sm" data-toggle="modal" title="Notification" data-target="#modal-following" id="btnfollowing">
					<b>
						<div id="followingcounter">following <?php echo $totalfollowing ?></div>
					</b>
				</button>
			</div>
			<div class="col-md-2 padding-button-follow">
				<input type="hidden" id="user_id" value="<?php echo $this->session->userdata('Id'); ?>">
				<input type="hidden" id="followed_id" value="<?php echo $this->uri->segment(3); ?>">
				<?php if($this->session->userdata('Id')!=$this->uri->segment(3)){ ?>
				<button type="button" class="btn btn-info btn-sm" id="btnfollow">
					<div id="statusfollow">
						
					</div>
				</button>
				<?php }else{ ?>
				<button type="button" class="btn btn-info btn-sm" data-toggle="modal" title="Edit" data-target="#modal-edit-profile">
					Edit Profile
				</button>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="container container-profil">

		<a href="<?=base_url('c_profile/m_users/'.$this->uri->segment(3));?>" class="button-tab">Galeri Saya</a>
        <a href="<?=base_url('c_profile/m_upvote/'.$this->uri->segment(3));?>" class="button-tab">Upvote</a>
        <a href="<?=base_url('c_profile/m_galeri_lelang/'.$this->uri->segment(3));?>" class="button-tab">Galeri Lelang</a>
		<div class="col-md-12 border-content-profil">
			<div class="portfolio-items isotopeWrapper clearfix ">
				<div class="row">

					<div id="show_dataprofile"></div>

				</div>
			</div>
		</div>

	</div>

	<!-- modal followers -->
	<div class="modal fade" id="modal-follower" role="dialog">
		<div class="modal-dialog modal-body-follow">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Followers</h4>
				</div>
				<div class="modal-body">
					<div id="show_follower">
					</div>
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
					<div id="show_following">
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end modal following -->

<?php $this->load->view('users/profile/editprofile'); ?>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil gambar.
        
        function tampil_data_barang(){
			var varUser = $('#followed_id').val();
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>c_profile/m_getLikedContentsUser/'+varUser,
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
<!-- <script type="text/javascript">
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

</script> -->
<!-- END Edit Profile AJAX -->

<!-- Follow Module -->
<!-- <?php $this->load->view('users/profile/follow_module'); ?> -->
<!-- Follow Module -->

</section>


