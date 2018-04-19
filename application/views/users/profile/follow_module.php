<!-- Follow Profile AJAX -->
<script type="text/javascript">
	$(document).ready(function () {
		$("#btnfollow").click(function () {
			var varUserid = $('#user_id').val();
			var varFollowedid = $('#followed_id').val();
			page_load();
			follower_counter();
			follow();
			isfollowing();
			function page_load(){
				$.ajax({ 
					url: '<?php echo base_url()?>c_profile/m_followercounter/' + '<?php echo $this->uri->segment(3) ?>',
					context: document.body,
					success : function(data){
						follower_counter();
					}
				});
			}
			function follower_counter(){
				$.ajax({
					type  : 'ajax',
					url   : '<?php echo base_url()?>c_profile/m_followercounter/' + '<?php echo $this->uri->segment(3) ?>',
					async : false,
					dataType : 'json',
					success : function(data){
						var html = '';
						var i;
						html += 'followers ' + data;
						$('#followercounter').html(html);
					}
				});
			}
			function following_counter(){
				$.ajax({
					type  : 'ajax',
					url   : '<?php echo base_url()?>c_profile/m_followingcounter/' + '<?php echo $this->uri->segment(3) ?>',
					async : false,
					dataType : 'json',
					success : function(data){
						var html = '';
						var i;
						html += 'following ' + data;
						$('#followingcounter').html(html);
					}
				});
			}
			function follow(){
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "C_profile/m_follows",
					data: {
						"userid": varUserid,
						"followedid": varFollowedid
					}
				});
			}
			function isfollowing(){
				$.ajax({
					type: "ajax",
					url: "<?php echo base_url(); ?>" + "C_profile/m_cekfollowing/"+"<?php echo $this->session->userdata('Id')?>/" + "<?php echo $this->uri->segment(3)?>",
					async : false,
					dataType : 'json',
					success : function(data){
						var html = '';
						if(!$.trim(data))
						{
							html += 'follow';
						}else {
							html += 'unfollow';
						}
						$('#statusfollow').html(html);
					}
				});
			}
		});
	});

</script>
<!-- END Follow Profile AJAX -->

<!-- Load status follow -->
<script type="text/javascript">
	$(document).ready(function () {
		isfollowing();
		function isfollowing(){
			var userid = $('#user_id').val();
			var followedid = $('#followed_id').val();
			$.ajax({
				type  : 'post',
				url   : '<?php echo base_url()?>c_profile/m_isfollowing/'+userid+'/'+followedid,
				data:{
					"userid": userid,
					"followedid": followedid,
				},
				success : function(html){
					$('#statusfollow').html(html);
				}
			});
		}
	});
</script>
<!-- Ajax tampil follower -->
<script type="text/javascript">
    $('#btnfollower').on('click',function () {
		var button = $('#btnfollower') // Button that triggered the modal
		var modal = $('#modal-follower');
        tampil_follower();   //pemanggilan fungsi tampil gambar.
        
        function tampil_follower(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>c_profile/m_follower/' + '<?php echo $this->uri->segment(3) ?>',
                async : false,
				dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
						if(!$.trim(data[i].fotoprofil)){
						html += '<div class="content-modal-follow">' +
									'<div class="foto-profil-modal-follow">' +
										'<img class="img-responsive" src=<?php echo base_url("assets/images/profilepicture/unknown.png")?> />' +
									'</div>' +
									'<span class="modal-nama" style="text-transform:capitalize">' +
									'<p>' +
										'<b><a href=<?=base_url("c_profile/m_users/'+data[i].userId+'")?>>' + data[i].fullname + '</a></b>' +
									'</p>' + data[i].phone +
									'</span>' +
								'</div>';
						}else{
                        html += '<div class="content-modal-follow">' +
									'<div class="foto-profil-modal-follow">' +
										'<img class="img-responsive" src=<?php echo base_url("assets/images/profilepicture/'+data[i].fotoprofil+'")?> />' +
									'</div>' +
									'<span class="modal-nama" style="text-transform:capitalize">' +
									'<p>' +
										'<b><a href=<?=base_url("c_profile/m_users/'+data[i].userId+'")?>>' + data[i].fullname + '</a></b>' +
									'</p>' + data[i].phone +
									'</span>' +
								'</div>';
						}
					}
					modal.find('#show_follower').html(html);
				}
			});
		}
	});
</script>
<!-- Ajax tampil follower -->

<!-- Ajax tampil following -->
<script type="text/javascript">
    $('#btnfollowing').on('click',function () {
		var button = $('#btnfollowing') // Button that triggered the modal
		var modal = $('#modal-following');
        tampil_following();   //pemanggilan fungsi tampil gambar.
        
        function tampil_following(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>c_profile/m_following/' + '<?php echo $this->uri->segment(3) ?>',
                async : false,
				dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        if(!$.trim(data[i].fotoprofil)){
						html += '<div class="content-modal-follow">' +
									'<div class="foto-profil-modal-follow">' +
										'<img class="img-responsive" src=<?php echo base_url("assets/images/profilepicture/unknown.png")?> />' +
									'</div>' +
									'<span class="modal-nama" style="text-transform:capitalize">' +
									'<p>' +
										'<b><a href=<?=base_url("c_profile/m_users/'+data[i].userId+'")?>>' + data[i].fullname + '</a></b>' +
									'</p>' + data[i].phone +
									'</span>' +
								'</div>';
						}else{
                        html += '<div class="content-modal-follow">' +
									'<div class="foto-profil-modal-follow">' +
										'<img class="img-responsive" src=<?php echo base_url("assets/images/profilepicture/'+data[i].fotoprofil+'")?> />' +
									'</div>' +
									'<span class="modal-nama" style="text-transform:capitalize">' +
									'<p>' +
										'<b><a href=<?=base_url("c_profile/m_users/'+data[i].userId+'")?>>' + data[i].fullname + '</a></b>' +
									'</p>' + data[i].phone +
									'</span>' +
								'</div>';
						}
					}
					modal.find('#show_following').html(html);
				}
			});
		}
	});
</script>
<!-- Ajax tampil following -->

<!-- ================================================================================== -->

<!-- Follow Profile AJAX -->
<script type="text/javascript">
	$(document).ready(function () {
		$("#btnfollows").click(function () {
			var varUserid = $('#user_ids').val();
			var varFollowedid = $('#followed_id').val();
			follow();
			isfollowing();
			function follow(){
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "C_profile/m_follows",
					data: {
						"userid": varUserid,
						"followedid": varFollowedid
					}
				});
			}
			function isfollowing(){
				$.ajax({
					type: "ajax",
					url: "<?php echo base_url(); ?>" + "C_profile/m_cekfollowing/"+"<?php echo $this->session->userdata('Id')?>/" + "<?php echo $this->uri->segment(4)?>",
					async : false,
					dataType : 'json',
					success : function(data){
						var html = '';
						if(!$.trim(data))
						{
							html += 'follow';
						}else {
							html += 'unfollow';
						}
						$('#statusfollows').html(html);
					}
				});
			}
		});
	});

</script>
<!-- END Follow Profile AJAX -->

<!-- Load status follow -->
<script type="text/javascript">
	$(document).ready(function () {
		isfollowing();
		function isfollowing(){
			var varUserid = $('#user_ids').val();
			var varFollowedid = $('#followed_id').val();
			$.ajax({
				type  : 'post',
				url   : '<?php echo base_url()?>c_profile/m_isfollowing/'+varUserid+'/'+varFollowedid,
				data:{
					"userid": varUserid,
					"followedid": varFollowedid,
				},
				success : function(html){
					$('#statusfollows').html(html);
				}
			});
		}
	});
</script>
<!-- ================================================================================== -->

