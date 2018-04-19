<?php
    foreach($varambilnama as $vau){
?>
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
                        Rp.<?=number_format($vau->starting_price);?>
                    </div>

                        <div class="text-center">
                            <h3>Harga Saat ini</h3>
                        </div>
                        <div class="harga-lelang-awal text-center">
                            Rp.<?=number_format($vau->winner_price);?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wrap-detail-content text-center">
                    <div class="padding-form-harga-lelang">
                        <h4> Masukkan harga untuk melelang</h4>
                        <div class="padding-form-lelang">
                                <form action="#" method="POST">
                                    <div class="row wrap-input-lelang">
                                        <div class="col-md-5">
                                        <p>Masukkan Harga:</p>
                                        </div>
                                        <div class="col-md-7">
                                            <input id="input-lelang" type="number" name="txtharga" placeholder="Harga">
                                            <input type="hidden" id="winner_id" value="<?php echo $this->session->userdata('Id'); ?>">
                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-default submit-edit-profil">Masukkan harga</button>
                            </form>                
                        </div>
                    </div>
                    <div class="wrap-riwayat-input-harga-lelang">
                        <div class="colom-komentar">
                            <div class="wrap-komentar">
                                <div class="wrap-nama-orang-komentar">
                                    <a href="#" class="nama-orang-komentar">
                                        @namaorang
                                    </a>
                                </div>
                                <div class="isi-komentar">
                                    ini isi nya ini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nya
                                    ini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nya
                                    ini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nya
                                </div>
                            </div>
                        </div>

                        <div class="colom-komentar">
                            <div class="wrap-komentar">
                                <div class="wrap-nama-orang-komentar">
                                    <a href="#" class="nama-orang-komentar">
                                        @namaorang
                                    </a>
                                </div>
                                <div class="isi-komentar">
                                    ini isi nya ini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nya
                                    ini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nya
                                    ini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nyaini isi nya
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        </section>
<?php
    }
?>