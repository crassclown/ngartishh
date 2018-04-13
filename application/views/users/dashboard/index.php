<?php $this->session->userdata("Id"); ?>
    <section  class="section appear clearfix" style="background:url('<?php echo base_url('assets/images/bright_squares.png')?>')">
        <div class="container">
            <div class="row">
                <div class="col-md-12 border-content">
                    <div class="portfolio-items isotopeWrapper clearfix ">
                        <div class="row">
                            <div id="show_data"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button Scroll Up -->
        <a id="back-to-top" href="#" class="btn-floating btn-large waves-effect waves-light red back-to-top" role="button" title="Klik untuk kembali ke Atas" data-toggle="tooltip" data-placement="left">
            <span class="fa fa-chevron-circle-up"></span>
        </a>
        <!-- Button Scroll Up -->
 
        <button type="button" class="btn btn-info btn-lg modal-new-post-dashboard " data-backdrop="static" data-keyboard="false" data-toggle="modal" title="New Post" data-target="#myModal"><i class="material-icons " style="font-size:40px;">file_upload</i></button>
 
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
                                                        <input class="input100 form-control" type="hidden" name="txtsession" id="txtsession" value="<?=$this->session->userdata('Id');?>" style="width:30em;" readOnly />
                                                        <span class="focus-input100"></span>
                                                    </div>
                                                </div>
                                            </tr>
                                            <tr>                                      
                                                    <div class="wrap-input100">
                                                        <div class="input-group stylish-input-group">
                                                            <input class="input100 form-control" type="text" name="txttitle" id="txttitle" placeholder="Title" require style="width:30em;">
                                                            <span class="focus-input100"></span>
                                                        </div>
                                                    </div>
                                            </tr>
                                            <tr>
                                                    <textarea name="txtdesc" rows="3" cols="30" placeholder="Description" class="form-control" id="txtdesc" require style="width:30em;"></textarea>
                                            </tr>
                                            <tr>
                                                    Categories
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <!-- <input type="checkbox" id="txtcheckbox" name="txtcheckbox" value=""/> -->
                                                            <?php
                                                                foreach($categories as $category){
                                                                    ?>
                                                                        <div class="form-check">
                                                                            <label>
                                                                                <input type="radio" name="txtcategories" id="txtcategories" value="<?=$category->Id;?>" /> <?=$category->name;?>
                                                                            </label>
                                                                        </div>
                                                                    <?php
                                                                }
                                                            ?>
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
                                        <label class="button text-center" for="fileElem"><i class="material-icons " style="font-size:60px;">file_upload</i></label>
                                    <progress id="progress-bar" max=100 value=0></progress>
                                    <div id="gallery" /></div>
                                    </div>

                                    <p class="error">
			
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnpost"><i class="fa fa-paper-plane" aria-hidden="true"></i> Post</button>
                        </form>
                        <div id="uploaded_image"></div>
                     </div>
                </div>
                
            </div>
        </div>
    </section>

<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil gambar.
        
        function tampil_data_barang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>c_dashboard/m_getContents',
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
                                '<a href=<?=base_url('c_dashboard/m_detailContent/');?>'+data[i].idcontent+'/'+data[i].iduser+'>'+
                                '<div class="portfolio-item">'+
                                    '<img class="img-content img-responsive" src=<?php echo base_url("assets/images/content/'+data[i].photos+'")?> alt="'+data[i].photos+'" />'+                              
                                    '<div class="portfolio-desc align-center">'+
                                        '<div class="folio-info">'+
                                            '<div class="row image-icons">'+
                                                '<div class="col-md-4 col-lg-4">'+
                                                    '<ol class="grid">'+
                                                        '<li class="grid__item">'+
                                                            '<a class="like icobutton icobutton--thumbs-up" data-contentid="'+data[i].idcontent+'" data-sessionuserid="<?php echo $this->session->userdata("Id");?>"><span class="fa fa-thumbs-up"></span></a>'+data[i].total_like+
                                                        '</li>'+
                                                    '</ol>'+
                                                '</div>'+
                                                '<div class="col-md-4 col-lg-4">'+
                                                    '<a href="#"><i class="fa fa-comment"></i><span>'+data[i].total_comment+'</span></a>'+
                                                '</div>'+
                                                '<div class="col-md-4 col-lg-4">'+
                                                    '<a class="a2a_dd" href="https://www.addtoany.com/share"><i class="fa fa-share-alt"></i></a>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+  
                                '</div>'+
                                '</a>'+
                            '</div>'+
                        '</article>';
                    }
                    $('#show_data').html(html);
                }
                
                
            });
        }
        $('.like').click(function() {
            var content_id = $(this).attr("data-contentid");
            var user_id = $(this).attr("data-sessionuserid");
            $.ajax({
                url: "<?php echo base_url(); ?>" + "c_dashboard/m_like/",
                type: 'post',
                data: { "content_id": content_id, "user_id": user_id},
                success: function(response) 
                { 
                    tampil_data_barang();
                    setTimeout(function(){
                        location.reload();
                    },1000);
                }
            });
        });
    });
  </script>

  <script>
    // $(document).ready(function() {
    //     $('.like').click(function() {
    //         var content_id = $(this).attr("data-contentid");
    //         var user_id = $(this).attr("data-sessionuserid");
    //         $.ajax({
    //             url: "<?php echo base_url(); ?>" + "c_dashboard/m_like/",
    //             type: 'post',
    //             data: { "content_id": content_id, "user_id": user_id},
    //             success: function(response) 
    //             { 
    //                 location.reload();
    //             }
    //         });
    //     });
    // });
  </script>

  <script>
		$(document).ready(function(){

			$('#form-upload').submit(function(e) {
				e.preventDefault();
				var formData = new FormData($(this)[0]);
                
                var varTitle    = $('#txttitle').val();
                var varDesc     = $('#txtdesc').val();
                var varCat      = $('#txtcategories').val();
                var varPic      = $('#fileElem').val();
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
                    //reset error messsage
                    $('.error').html('');
                    $.ajax({
                        url: $(this).attr("action"),
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        async: true,
                        beforeSend: function() {
                            $('#btnpost').prop('disabled', true);
                        },
                        success: function(response) {
                            if(!response.status) {
                                $('.error').html(response.error);
                            }
                        },
                        complete: function() {
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

