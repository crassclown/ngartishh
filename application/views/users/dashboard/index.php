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
    <section id="section-works" class="section appear clearfix">
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
         
        // $('#mydata').dataTable();
          
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
                                                    '<a href="#"><i class="fa fa-thumbs-up "></i><span>'+data[i].total_like+'</span></a>'+
                                                '</div>'+
                                                '<div class="col-md-4 border-icons">'+
                                                    '<a href="#"><i class="fa fa-comment"></i><span>'+data[i].total_comment+'</span></a>'+
                                                '</div>'+
                                                '<div class="col-md-4">'+
                                                    '<a href="#"><i class="fa fa-share-alt"></i>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+  
                                '</div>'+
                            '</div>'+
                        '</article>'
                        '</a>';
                        
                        // '<tr>'+
                        //         '<td>'+data[i].idcontent+'</td>'+
                        //         '<td>'+data[i].title+'</td>'+
                        //         '<td>'+data[i].desc+'</td>'+
                        //         '<td>'+data[i].total_like+'</td>'+
                        //         '<td>'+data[i].total_comment+'</td>'+
                        //         '<td>'+data[i].namalengkap+'</td>'+
                        //         '<td>'+data[i].tgl_posting+'</td>'+
                        //         '<td><a href=<?=base_url('c_dashboard/m_detailContent/');?>'+data[i].idcontent+'/'+data[i].iduser+'>Detil</td>'+
                        //         // '<td><form id="bookmark" action="" method="POST"><input type="text" id="content_id" value='+data[i].idcontent+'><input type="text" id="user_id" value='+data[i].iduser+'><input type="button" value="Bookmark"></form></td>'+
                        //         '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }
    });
 
</script>
</body>
</html>
