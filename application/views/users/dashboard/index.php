<?php $this->session->userdata("Id"); ?>
    <section  class="section appear clearfix" onmousedown="return false" oncontexmenu="return false" onselectstart="return false" style="background:url('<?php echo base_url('assets/images/bright_squares.png')?>');min-height:600PX;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 border-content">
                    <div class="portfolio-items isotopeWrapper clearfix">
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
 
        <button type="button" class="btn btn-info btn-lg modal-new-post-dashboard" data-toggle="modal" title="New Post" data-target="#myModal"><i class="material-icons" style="font-size:40px;">file_upload</i></button>
        <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
        <?php $this->load->view('users/dashboard/upload_content'); ?>

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
                                    '<div class="portfolio-item">'+
                                    '<a href=<?=base_url('c_dashboard/m_detailContent/');?>'+data[i].idcontent+'/'+data[i].iduser+'>'+
                                        '<img class="img-content img-responsive" onmousedown="return false" oncontexmenu="return false" onselectstart="return false" src=<?php echo base_url("assets/images/content/'+data[i].photos+'")?> alt="'+data[i].photos+'">'+'</img>'+                              
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
                                                    '<a style="cursor: pointer;"><i class="fa fa-comment"></i><sup class="badge">'+data[i].total_comment+'</sup></a>'+
                                                '</div>'+
                                                '<div class="col-md-4 col-lg-4">'+
                                                    '<a class="a2a_dd" href="https://www.addtoany.com/share"><i class="fa fa-share-alt"></i></a>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+  
                                '</div>'+                                
                           '</article>';
                        }
                        $('#show_data').html(html);
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

        <!-- AddToAny BEGIN -->
        <script>
            var a2a_config = a2a_config || {};
            a2a_config.linkurl = "<?=base_url('c_dashboard/');?>";
            a2a_config.onclick = 1;
        </script>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
        <!-- AddToAny END -->

        <script>
            $(document).ready(function () {
                $("#txtcategories").select2({
                    placeholder: "Please select the category"
                });
            });
        </script>
        <script>
            $('#txttitle').keyup(function() {
                $(this).val($(this).val().substr(0, 1).toUpperCase() + $(this).val().substr(1).toLowerCase());
            });

            $('#txtdesc').keyup(function() {
                $(this).val($(this).val().substr(0, 1).toUpperCase() + $(this).val().substr(1).toLowerCase());
            });
        </script>
        <noscript>
        Sorry...JavaScript is needed to go ahead.
        </noscript>
</section>