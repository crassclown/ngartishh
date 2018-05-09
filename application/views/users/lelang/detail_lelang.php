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
                <div class="wrap-detail-content-lelang-harga">
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
                </div>
            </div>
            <div class="col-md-4">
                <div class="wrap-detail-content-lelang-input-harga text-center">
                    <div class="padding-form-harga-lelang">
                        <h4> Masukkan harga untuk melelang</h4>
                        <div class="padding-form-lelang or">
                                <form action="#" method="POST" data-lelaid="<?=$vau->lelaid;?>" data-winner_id="<?php echo $this->session->userdata("Id");?>">
                                    <div class="row wrap-input-lelang">
                                    <?php 
                                        if($vau->durasi < 1){
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
                                                <p>Tambahan harga yang telah disediakan sebesar</p>
                                                </div>
                                                <div class="col-md-7">
                                                    <?php
                                                        $tambahanharga      = $vau->starting_price;
                                                        $hargafinal         = ($tambahanharga * 1) / 100;        
                                                    ?>
                                                    <input id="tambahanharga" class="tambahanharga form-control" readonly type="text" name="tambahanharga" value="<?php echo $hargafinal;?>" style="width:50%;" onkeyup="sum();" />
                                                </div>
                                            </div>
                                            <div class="row wrap-input-lelang">
                                                <div class="col-md-5">
                                                <p>Anda berapa kali lipat dari harga sekarang?</p>
                                                </div>
                                                <div class="col-md-7">
                                                    <input id="kaliharga" class="kaliharga form-control" type="text" min="0" max="10" maxlength="2" name="kaliharga" style="width:50%;" placeholder="max 10x" onkeyup="sum();" />
                                                </div>
                                            </div>
                                            <div class="row wrap-input-lelang">
                                                <div class="col-md-7">
                                                    <input id="harganormal" class="harganormal form-control" onload="m_harga_normal()" autocomplete="off" type="hidden" name="harganormal" readonly onkeyup="sum();" />
                                                </div>
                                            </div>
                                            <div class="row wrap-input-lelang">
                                                <div class="col-md-5">
                                                <p>Harga yang telah disediakan</p>
                                                </div>
                                                <div class="col-md-7">
                                                    <input id="totalhargapasang" class="comment totalhargapasang form-control" onload="m_hargatambah_lelang()" autocomplete="off" type="number" name="txtharga" readonly />
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
    // Untuk button comment harga
    $(document).ready(function(){
        $('.comment').keypress(function(e) {
            if (e.which == 13) {
                $(this).next('#comments').focus();
                e.preventDefault();
            }
        });
        $("#comments").click(function(){
            var psharga     = $('#totalhargapasang').val();
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
                        $('#kaliharga').val('');
                        m_load_lelang();
                        m_harga_lelang();
                        m_hargatambah_lelang();
                        m_harga_normal();
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

    m_hargatambah_lelang();
    function m_hargatambah_lelang(){
        var lela_id = $('#lelang_id').val();
        $.ajax({
            type:"POST",
            url :"<?php echo base_url(); ?>" + "c_lelang/m_harga_tambah",
            data:{
                "lelang_id":lela_id
            },
            success:function(html){
                $('#totalhargapasang').val(html);
            }
        });
        return false;
    }
    m_harga_normal();
    function m_harga_normal(){
        var lela_id = $('#lelang_id').val();
        $.ajax({
            type:"POST",
            url :"<?php echo base_url(); ?>" + "c_lelang/m_harga_normal",
            data:{
                "lelang_id":lela_id
            },
            success:function(html){
                $('#harganormal').val(html);
            }
        });
        return false;
    }
    function sum(event) {
        var txtFirstNumberValue = document.getElementById('tambahanharga').value;
        var txtSecondNumberValue = document.getElementById('kaliharga').value;
        var txtThirdNumberValue = document.getElementById('harganormal').value;
        var result = (parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)) + parseInt(txtThirdNumberValue);
        if(txtSecondNumberValue <= 10 || txtSecondNumberValue == ''){
            if (!isNaN(result)) {
                document.getElementById('totalhargapasang').value = result;
            }
        }else{
            swal({
                title: 'Oops, tidak lebih dari 10',
                animation: false,
                customClass: 'animated tada'
            });
        }
    }
    
</script>
<script>
    $(document).ready(function(){
        var $kaliharga = $('#kaliharga');
        $kaliharga.on('keydown', function(key) {
            if(key.which != 8 && key.which != 0 && (key.which < 48 || key.which > 57)){
                key.stopImmediatePropagation();
                return validateQty(key);
            }
        });
    });

    function validateQty(event) {
        var key = window.event ? event.keyCode : event.which;
        if (event.keyCode == 8 || event.keyCode == 46
        || event.keyCode == 37 || event.keyCode == 39) {
            return true;
        }
        else if ( key < 48 || key > 57 ) {
            return false;
        }
        else return true;
    };
</script>