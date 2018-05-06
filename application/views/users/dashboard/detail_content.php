    <?php
        foreach($varambilusers as $vau){
            ?>
            <section id="section-works" class="section appear clearfix" style="background-image:url('<?php echo base_url('assets/images/bright_squares.png')?>');">
                <div class="container">
				<input type="hidden" id="user_ids" value="<?php echo $this->session->userdata('Id'); ?>">
				<input type="hidden" id="followed_id" value="<?php echo $this->uri->segment(4); ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="wrap-detail-content">
                                <?php
                                    foreach($varambilnama as $van){
                                ?>
                                        <a href="<?=base_url('c_profile/m_users/'.$van->Iduser);?>">
                                            <div class="wrap-nama-foto-profil">
                                                <div class="foto-profil-detail-content">
                                                    <center style="font-size:32px;margin-top:30px;"><b><?php echo substr(trim(ucfirst($van->namalengkap)),0,1); ?></b></center>
                                                </div>
                                                
                                                <span class="nama-detail-content"><?=$van->namalengkap;?></span>
                                            </div>
                                        </a>                                    
                                        <div class="deskripsi-singkat-detail-content">
                                            <?php
                                            $namabulan = array(
                                                1=>"Januari",
                                                2=>"Februari",
                                                3=>"Maret",
                                                4=>"April",
                                                5=>"Mei",
                                                6=>"Juni",
                                                7=>"Juli",
                                                8=>"Agustus",
                                                9=>"September",
                                                10=>"Oktober",
                                                11=>"November",
                                                12=>"Desember"
                                            );
                                            $explode=explode(" ",$van->tgl_publish);

                                            $d=list($thn,$bln,$tgl)=explode('-',$explode[0]);
                                            $indate=$tgl.' '.$namabulan[(int)$d[1]].' '.$thn;
                                            $time = strtotime($van->tgl_publish);
                                            ?>
                                            <sub data-toggle="tooltip" title="<?php echo $indate.' . '.$explode[1];?>"><time class="timeago" datetime="<?php echo $indate.' . '.$explode[1];?>"></time></sub> | <small class="label label-info"><?=$van->namakat;?></small>
                                            <h5><b class="judul"><?=$vau->title;?></b></h5>
                                            <p><?=$vau->desc;?></p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
											<?php if($this->session->userdata('Id')!=$this->uri->segment(4)){ ?>
                                                <button class="button-detail-content" data-toggle="tooltip" title="Follow" id="btnfollows"><div id="statusfollows"></div></button>
											<?php } ?>
                                            </div>
                                            <div class="col-md-3">
                                                <div id="show_data"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <a class="a2a_dd" href="https://www.addtoany.com/share" data-toggle="tooltip" title="Share"><i class="fa fa-share-alt icon-detail-content"></i></a>
                                            </div>
                                            <!-- <div class="col-md-3">
                                            <button class="button-detail-content" data-toggle="tooltip" data-placement="bottom" title="Akan dilelang 12-12-1212">Status</button>
                                            </div> -->
                                        </div>  
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="wrap-detail-content page-content-perbesar content-zoom">
                                    <img class="img-detail-content" onmousedown="return false" oncontexmenu="return false" onselectstart="return false" id="perbesar" src="<?php echo base_url('assets/images/content/'.$vau->photos)?>" alt="<?=$vau->photos;?>"></img>
                                    <h4 class="text-center margin-top-judul"><b><?=$vau->title;?></b></h4>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="wrap-detail-content">
                                <form method="post" action="#" data-contentidc="<?=$vau->Id;?>" data-sessionuseridc="<?php echo $this->session->userdata("Id");?>">
                                <!-- onkeyup="getVal()" onclick="this.value = &#39;&#39;;" onkeydown="this.style.color = &#39;#000000&#39; " -->
                                    <!-- <div class="no-padding-detail-content">
                                        <input class="komentar-detail-content comment" autocomplete="off" type="text" rows="1" data-contentidc="<?=$vau->Id;?>" data-sessionuseridc="<?php echo $this->session->userdata("Id");?>" name="txtcomment" placeholder="Write a comment..." id="txtcomment"/>
                                        <button class="btn btn-primary" id="comments" type="button" data-contentidc="<?=$vau->Id;?>" data-sessionuseridc="<?php echo $this->session->userdata("Id");?>">Comment</button>
                                        <!-- <div id="icard" class="drag"></div> -->
                                        <!-- <input type="hidden" name="content_id" id="content_id" value="<?=$vau->Id;?>"> -->
                                    <!-- </div> -->
                                    <div class="row">
                                        <div class="col-md-9 no-right-padding">
                                            <div class="no-padding-detail-content">
                                                <input class="komentar-detail-content comment" autocomplete="off" type="text" rows="1" data-contentidc="<?=$vau->Id;?>" data-sessionuseridc="<?php echo $this->session->userdata("Id");?>" name="txtcomment" placeholder="Write a comment..." id="txtcomment"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 no-left-padding">
                                            <button class="btn btn-primary submit-komentar" id="comments" type="button" data-toggle="tooltip" title="Comments" data-contentidc="<?=$vau->Id;?>" data-sessionuseridc="<?php echo $this->session->userdata("Id");?>">Comment</button>
                                            <!-- <div id="icard" class="drag"></div> -->
                                            <input type="hidden" name="content_id" id="content_id" value="<?=$vau->Id;?>">
                                        </div>
                                    </div>
                                </form>
                                <div class="section-komentar">
                                    <div id="list_status"></div>
                                <div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <input type="hidden" name="user_id" id="user_id" value="<?=$vau->user_id;?>">
            <?php
        }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil gambar.
        
        function tampil_data_barang(){
            var content_id  = $('#content_id').val();
            var user_id     = $('#user_id').val();
            $.ajax({
                type  : 'POST',
                url   : '<?php echo base_url()?>c_dashboard/m_getDetailContentLike',
                async : false,
                data: { "content_id": content_id, "user_id": user_id},
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html +=                         
                        '<a style="cursor: pointer;" class="like" data-toggle="tooltip" title="Like" data-contentid="'+data[i].idcontent+'" data-sessionuserid="<?php echo $this->session->userdata("Id");?>"><i class="fa fa-thumbs-up icon-detail-content"></i><sup class="badge">'+data[i].total_like+'</sup>';
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
    
    <script type="text/javascript">
    $(document).ready(function(){
        $('.comment').keypress(function(e) {
            if (e.which == 13) {
                $(this).next('#comments').focus();
                e.preventDefault();
            }
        });
        $("#comments").click(function(){
            var content_id  = $(this).attr("data-contentidc");
            var user_id     = $(this).attr("data-sessionuseridc");
            var desc        = $("input#txtcomment").val();
            
            if(desc != ''){

                $.ajax({
                    type:"POST",
                    url :"<?php echo base_url(); ?>" + "c_dashboard/m_added_comments",
                    data:{
                        "content_id":content_id,
                        "user_id":user_id,
                        "desc":desc
                    },
                    success:function(html){
                        // $(desc).val('');
                        document.getElementById('txtcomment').value = "";
                        m_load_comments();
                    }
                });
            }else{
                $('#comments').bind('keypress', function(e)
                {
                    if(e.keyCode == 13)
                    {
                        return false;
                    }
                });
            }
        });
    });
    m_load_comments();
    function m_load_comments(){
        var content_id = $('#content_id').val();
        $.ajax({
            type:"POST",
            url :"<?php echo base_url(); ?>" + "c_dashboard/m_load_comments",
            data:{
                "content_id":content_id
            },
            success:function(html){
                $('#list_status').html(html);
            }
        });
        return false;
    }
</script>
<!-- AddToAny BEGIN -->
<script>
    var a2a_config = a2a_config || {};
    a2a_config.linkurl = "<?=base_url();?>"+"c_dashboard/m_detailContent/<?=$vau->Id;?>/<?=$vau->user_id;?>";
    a2a_config.onclick = 1;
</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
<script>
//     function getVal() {
//     var x = document.getElementById("txtcomment");
//     document.getElementById("icard").innerHTML = x.value;
// }
</script>
<script src="<?=base_url('assets/js/zoom.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.timeago.js');?>" type="text/javascript"></script>
<script>
    document.querySelector( '.content-zoom' ).addEventListener( 'click', function( event ) {
        event.preventDefault();
        zoom.to({ element: event.target });
    } );
</script>

<script>
    /* Initiate Magnify Function
    with the id of the image, and the strength of the magnifier glass:*/
    // magnify("perbesar", 5);
</script>
<script>
    jQuery(document).ready(function() {
        jQuery("time.timeago").timeago();
    });
</script>
<script>

function liveSearch() {

    var input_data = $('#search_data').val();
    if (input_data.length === 0) {
        $('#suggestions').hide();
    } else {


        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>c_dashboard/search",
            data: {'search_data': input_data},
            success: function (data) {
                // return success
                if (data.length > 0) {
                    $('#suggestions').show();
                    $('#autoSuggestionsList').addClass('auto_list');
                    $('#autoSuggestionsList').html(data);
                }
            }
        });
    }
}

</script>

<?php $this->load->view('users/profile/follow_module'); ?>

<noscript>
    Sorry...JavaScript is needed to go ahead.
</noscript>
