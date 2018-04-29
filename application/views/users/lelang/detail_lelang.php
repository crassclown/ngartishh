<?php
    foreach($varambilnama as $vau){
?>
<input type="hidden" name="lelang_id" id="lelang_id" value="<?=$vau->lelaid;?>" />
<section id="section-works" class="section appear clearfix" style="background-image:url('<?php echo base_url('assets/images/bright_squares.png')?>');">
    <div class="container">
    <input type="hidden" id="user_ids" value="<?php echo $this->session->userdata('Id'); ?>">
    
        <div class="row">
            <div class="col-md-4">
                <div class="wrap-detail-content-foto">
                    <h4 class="text-center margin-top-judul"><b><?=$vau->judulcontent;?></b></h4>
                    <img class="img-detail-content img-responsive" onmousedown="return false" oncontexmenu="return false" onselectstart="return false" id="perbesar" src="<?php echo base_url('assets/images/content/'.$vau->photocontent)?>" alt="<?=$vau->photocontent;?>">
                    </img>
                </div>            
            </div>
            <div class="col-md-4">
                <div class="wrap-detail-content-lelang">
                    <div class="text-center">
                        <h3>Harga Awal</h3>
                    </div>
                    <div class="harga-lelang-awal text-center">
                        Rp.<?=number_format($vau->starting_price,2,",",".");?>
                    </div>

                        <div class="text-center">
                            <h3>Harga Saat ini</h3>
                        </div>
                        <div class="harga-lelang-awal text-center" id="loadprice">
                            <!-- Di dalam sini isi harga sekarang -->
                        </div>
                        <!-- <div class="harga-lelang-awal text-center">
                            Rp.<?=number_format($vau->winner_price);?>
                        </div> -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="wrap-detail-content-lelang text-center">
                    <div class="padding-form-harga-lelang">
                        <h4> Masukkan harga untuk melelang</h4>
                        <div class="padding-form-lelang">
                        Kelipatan harga berdasarkan harga saat ini 
                            <div class="row wrap-input-lelang">
                                <div class="col-md-3">
                                <button class="btn btn-default submit-edit-profil">2x</button>
                                </div>
                                <div class="col-md-3">
                                <button class="btn btn-default submit-edit-profil">3x</button>
                                </div>
                                <div class="col-md-3">
                                <button class="btn btn-default submit-edit-profil">7x</button>
                                </div>
                                <div class="col-md-3">
                                <button class="btn btn-default submit-edit-profil">10x</button>
                                </div>
                            </div>
                        </div>

                        <div class="padding-form-lelang or">
                            <h4> Atau </h4>
                                <form action="#" method="POST" data-lelaid="<?=$vau->lelaid;?>" data-winner_id="<?php echo $this->session->userdata("Id");?>">
                                    Masukkan Kelipatan yang anda inginkan
                                    <div class="row wrap-input-lelang">
                                        <div class="col-md-5">
                                        <p>Masukkan Kelipatan:</p>
                            <?php 
                                if($vau->durasi < 0){
                                    ?>      
                                        <div class="alert alert-danger">
                                            <strong>Oops!</strong> The Auction has been finished
                                        </div>
                                        <input type="hidden" name="lela_id" id="lela_id" value="<?=$vau->lelaid;?>">
                                    <?php
                                }else{
                                    ?>
                                        <form action="#" method="POST" data-lelaid="<?=$vau->lelaid;?>" data-winner_id="<?php echo $this->session->userdata("Id");?>">
                                            <div class="row wrap-input-lelang">
                                                <div class="col-md-5">
                                                <p>Masukkan Harga:</p>
                                                </div>
                                                <div class="col-md-7">
                                                    <input id="input-lelang" class="comment form-control" autocomplete="off" type="number" name="txtharga" placeholder="Harga">
                                                </div>
                                            </div>
                                        <button id="comments" type="button" data-toggle="tooltip" title="Comments" class="btn btn-default submit-edit-profil" data-lelaid="<?=$vau->lelaid;?>" data-winner_id="<?php echo $this->session->userdata("Id");?>">Masukkan harga</button>
                                        <input type="hidden" name="lela_id" id="lela_id" value="<?=$vau->lelaid;?>">
                                    </form>         
                                    <?php
                                }
                            ?>
                                       
                        </div>
                    </div>
                    <div class="wrap-riwayat-input-harga-lelang">
                        <div id="list_status"></div>
                    </div>
                </div>
            </div>
        </div>
        </section>
<?php
    }
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.comment').keypress(function(e) {
            if (e.which == 13) {
                $(this).next('#comments').focus();
                e.preventDefault();
            }
        });
        $("#comments").click(function(){
            var psharga     = $('#input-lelang').val();
            var winner_id   = $(this).attr("data-winner_id");
            var lelaid      = $(this).attr("data-lelaid");
                        
            if(psharga != ''){

                $.ajax({
                    type:"POST",
                    url :"<?php echo base_url(); ?>" + "c_lelang/m_added_lelang",
                    data:{
                        "winner_price":psharga,
                        "winner_id":winner_id,
                        "lela_id":lelaid
                    },
                    success:function(html){
                        $('#input-lelang').val('');
                        m_load_lelang();
                        m_harga_lelang();
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
    m_load_lelang();
    function m_load_lelang(){
        var lela_id = $('#lela_id').val();
        $.ajax({
            type:"POST",
            url :"<?php echo base_url(); ?>" + "c_lelang/m_load_lelang",
            data:{
                "lela_id":lela_id
            },
            success:function(html){
                $('#list_status').html(html);
            }
        });
        return false;
    }

    m_harga_lelang();
    function m_harga_lelang(){
        var lela_id = $('#lelang_id').val();
        $.ajax({
            type:"POST",
            url :"<?php echo base_url(); ?>" + "c_lelang/m_harga_lelang",
            data:{
                "lelang_id":lela_id
            },
            success:function(html){
                $('#loadprice').html(html);
            }
        });
        return false;
    }
</script>