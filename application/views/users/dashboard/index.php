<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Home</title>
</head>
<body>
    <?php $this->session->userdata("Id"); ?>
    <section id="section-works" class="section appear clearfix" style="background-image:url('<?php echo base_url('assets/images/bright_squares.png')?>');">
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
 
        <button type="button" class="btn btn-info btn-lg modal-new-post-dashboard " data-toggle="modal" title="New Post" data-target="#myModal"><i class="material-icons " style="font-size:40px;">file_upload</i></button>
 
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Posting</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="padding-modal-body">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        <table>
                                            <tr>
                                                    Judul :                                       
                                                    <div class="wrap-input100">
                                                    <input class="input100" type="text" name="txtemail" placeholder="Judul Post">
                                                    <span class="focus-input100"></span>
                                                    </div>
                                            </tr>
                                            <tr>
                                                    Description :
                                                    <textarea name="Deskripsi" rows="3" cols="30" placeholder="Descrption"></textarea>
                                            </tr>
                                            <tr>
                                                    Kategori
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <p>
                                                                <input type="checkbox" id="test1" />
                                                                <label for="test1">Red</label>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p>
                                                                <input type="checkbox" id="test1" />
                                                                <label for="test1">Red</label>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p>
                                                                <input type="checkbox" id="test1" />
                                                                <label for="test1">Red</label>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p>
                                                                <input type="checkbox" id="test1" />
                                                                <label for="test1">Red</label>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p>
                                                                <input type="checkbox" id="test1" />
                                                                <label for="test1">Red</label>
                                                            </p>
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
                        <button type="submit" class="btn btn-default">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </form>
                     </div>
                </div>
                
            </div>
        </div>
    </section>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
         
        // $('#mydata').dataTable();
        // fa fa-share-alt
        //fungsi tampil barang
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
                        '<a href=<?=base_url('c_dashboard/m_detailContent/');?>'+data[i].idcontent+'/'+data[i].iduser+'>'+                         
                        '<article class="col-md-3 isotopeItem webdesign">'+
                            '<div class="space">'+
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
                            '</div>'+
                        '</article>'
                        '</button>';
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
        $('#like').click(function() {
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
<!-- AddToAny BEGIN -->
<script>
var a2a_config = a2a_config || {};
a2a_config.linkurl = "http://[::1]/Kuliah/PBF/Ngartish/ngartish/c_dashboard/";
a2a_config.onclick = 1;
</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->