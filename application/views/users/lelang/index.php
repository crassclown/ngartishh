    <section id="section-works" class="section appear clearfix" style="background-image:url('<?php echo base_url('assets/images/bright_squares.png')?>');">
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

        <a id="back-to-top" href="#" class="btn-floating btn-large waves-effect waves-light red back-to-top" role="button" title="Klik untuk kembali ke Atas"
            data-toggle="tooltip" data-placement="left">
            <span class="fa fa-chevron-circle-up"></span>
        </a>
        <!-- end Button Scroll Up -->
    </section>
    <script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil gambar.
        
        function tampil_data_barang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>c_lelang/m_getlelang',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        if(data[i].durasi < 1){
                            html +=
                            '<article class="col-md-4 col-lg-3 isotopeItem webdesign">'+
                                '<div class="space">'+
                                    '<div class="gantungan">'+
                                        '<div class="pin text-center">'+
                                        '<b>'+data[i].fullname.trim().substr(0,1).toUpperCase()+'</b>'+
                                        '</div>'+
                                    '</div>'+
                                '<div class="portfolio-item">'+
                                '<a data-toggle="tooltip" title="Oops, The content cannot be clicked" href="javascript: void(0)">'+
                                        '<img class="img-responsive" onmousedown="return false" oncontexmenu="return false" onselectstart="return false" src=<?php echo base_url("assets/images/content/'+data[i].photos+'")?> alt="'+data[i].photos+'" alt="gambar" />'+                              
                                        '</a>'+
                                        '<div class="portfolio-desc align-center">'+
                                            '<div class="folio-info">'+
                                                '<div class="row info-sisa-hari-lelang">'+
                                                    '<span>'+
                                                        '<div class="label label-danger">The Auction has been finished</div>'+                                        
                                                    '</span>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+  
                                    '</div>'+
                                '</div>'+
                            '</article>';
                        }else{
                            html +=
                            '<article class="col-md-4 col-lg-3 isotopeItem webdesign">'+
                                '<div class="space">'+
                                    '<div class="gantungan">'+
                                        '<div class="pin text-center">'+
                                        '<b>'+data[i].fullname.trim().substr(0,1).toUpperCase()+'</b>'+
                                        '</div>'+
                                    '</div>'+
                                '<div class="portfolio-item">'+
                                '<a href=<?=base_url('c_lelang/m_detail_lelang/');?>'+data[i].idcontent+'/'+data[i].userId+'/'+data[i].idlela+'>'+
                                        '<img class="img-responsive" onmousedown="return false" oncontexmenu="return false" onselectstart="return false" src=<?php echo base_url("assets/images/content/'+data[i].photos+'")?> alt="'+data[i].photos+'" alt="gambar" />'+                              
                                        '</a>'+
                                        '<div class="portfolio-desc align-center">'+
                                            '<div class="folio-info">'+
                                                '<div class="row info-sisa-hari-lelang">'+
                                                    '<span>'+
                                                        data[i].durasi+' day left'+                                              
                                                    '</span>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+  
                                    '</div>'+
                                '</div>'+
                            '</article>';
                        }
                        
                    }
                    $('#show_data').html(html);
                }
                // 'sisa '+data[i].durasi+' hari lagi'+
                
            });
        }
    });
  </script>
