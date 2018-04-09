<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    <!-- <link rel="stylesheet" href="<?=base_url('assets/css/checkbox-style.css');?>"> -->


    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <!--===============================================================================================-->
    <title>Home</title>
</head>
<body style="background:url('<?php echo base_url('assets/images/bright_squares.png')?>') no-repeat center center fixed;-webkit-background-size: 100% 100%;
                -moz-background-size: 100% 100%;
                -o-background-size: 100% 100%;
                background-size: 100% 100%;height:100%;">
    <?php $this->session->userdata("Id"); ?>
    <section  class="section appear clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12 border-content">
                    <div class="portfolio-items isotopeWrapper clearfix " id="4">
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
    </section>
 
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
                                    <form method="POST" enctype="multipart/form-data">
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
                                                    <textarea name="description" rows="3" cols="30" placeholder="Description" class="form-control" id="txtdesc" require style="width:30em;"></textarea>
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
                                        <input type="file" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
                                        <label class="button text-center" for="fileElem"><i class="material-icons " style="font-size:60px;">file_upload</i></label>
                                    <progress id="progress-bar" max=100 value=0></progress>
                                    <div id="gallery" /></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="btnpost">Post</button>
                        </form>
                     </div>
                </div>
                
            </div>
        </div>
    </section>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
         
        // $('#mydata').dataTable();
        // fa fa-share-alt
        //fungsi tampil barang
        <?php 
        // echo substr(trim(ucfirst($this->session->userdata("name"))),0,1); 
        ?>
        
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
                        '<article class="col-md-3 isotopeItem webdesign">'+
                            '<div class="space">'+
                                '<div class="gantungan">'+
                                    '<div class="pin text-center">'+
                                    '<b>'+data[i].namalengkap.trim().substr(0,1).toUpperCase()+'</b>'+
                                    '</div>'+
                                '</div> '+
                                '<a href=<?=base_url('c_dashboard/m_detailContent/');?>'+data[i].idcontent+'/'+data[i].iduser+'>'+
                                '<div class="portfolio-item">'+
                                    '<img src=<?php echo base_url("assets/images/content/'+data[i].photos+'")?> alt="'+data[i].photos+'" />'+                              
                                    '<div class="portfolio-desc align-center">'+
                                        '<div class="folio-info">'+
                                            '<div class="row image-icons">'+
                                                '<div class="col-md-4 ">'+
                                                        '<a href="#" id="like" class="like" data-contentid="'+data[i].idcontent+'" data-sessionuserid="<?php echo $this->session->userdata("Id");?>"><i class="fa fa-thumbs-up"></i><span>'+data[i].total_like+'</span></a>'+
                                                '</div>'+
                                                '<div class="col-md-4 border-icons">'+
                                                    '<a href="#"><i class="fa fa-comment"></i><span>'+data[i].total_comment+'</span></a>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                    // '<a href="#"><i class="fa fa-share-alt"></i>'+
                                                    // '<div class="dropdown">'+
                                                        '<a class="a2a_dd" href="https://www.addtoany.com/share"><i class="fa fa-share-alt"></i></a>'+
                                                    // '</div>'+
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
    });
</script>

</body>
</html>

<script>
    $(document).ready(function() {
        $('.like').click(function() {
            // var content_id = $("#content_id").val();
            // var user_id = $("#user_id").val();
            // var txtpassword = $("#txtpassword").val();

            var content_id = $(this).attr("data-contentid");
            var user_id = $(this).attr("data-sessionuserid");
            // alert(content_id);
            $.ajax({
                url: "<?php echo base_url(); ?>" + "c_dashboard/m_like/",
                type: 'post',
                data: { "content_id": content_id, "user_id": user_id},
                success: function(response) 
                { 
                    location.reload();
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#btnpost').click(function(){
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
                data : {'varTitle': varTitle, 'varDesc': varDesc, 'varCat': varCat, 'varPic':varPic, 'varSession':varSession}
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