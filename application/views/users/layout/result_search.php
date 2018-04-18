<section id="section-works" class="section appear clearfix" style="background-image:url('<?php echo base_url('assets/images/bright_squares.png')?>');min-height:600px;">
        <div class="container">
            <div class="col-md-12 border-content">
                <div class="row">

                <div class="col-md-1 col-lg-1">
                </div>
                <div class="col-md-10 col-lg-10">
                    <div class="wrap-border-result-search">
                        <?php
                            if(is_array($pencariankategori) || is_object($pencariankategori)){
                                foreach($pencariankategori as $result){
                                    ?>
                                        <a href="<?=base_url('c_dashboard/m_detailContent/'.$result->Idcontent.'/'.$result->Iduser);?>">
                                            <div class="line-result-search">
                                                <div class="wrap-foto-content-search-result">
                                                    <img onmousedown="return false" oncontexmenu="return false" onselectstart="return false" class="foto-content-search-result" src="<?php echo base_url('assets/images/content/'.$result->photos)?>"></img>
                                                </div>

                                                <div class="wrap-mini-foto-profil">
                                                    <div class="mini-foto-profil">
                                                        <p><?php echo substr(trim(ucfirst($result->namalengkap)),0,1); ?></p>
                                                    </div>
                                                    <div class="nama-mini-foto-profil">
                                                        <?=$result->namalengkap;?>
                                                    </div> 
                                                </div>
                                                <div class="judul-search-result">
                                                    <h2><?=$result->judulcontent;?><h2>
                                                </div> 
                                                <div class="deskripsi-search-result">
                                                    <?=substr($result->desccontent,0,80) . '...';?>
                                                </div> 
                                            </div>
                                        </a>
                                    <?php
                                }
                            }else if(is_array($pencarianuser) || is_object($pencarianuser)){
                                foreach($pencarianuser as $resultuser){
                                    ?>
                                        <!-- <a href="<?=base_url('c_profile/m_users/'.$resultuser->userId);?>">
                                            <div class="line-result-search"> -->
                                                <!-- <div class="wrap-foto-content-search-result">
                                                    <img onmousedown="return false" oncontexmenu="return false" onselectstart="return false" class="foto-content-search-result" src="<?php echo base_url('assets/images/content/'.$result->photos)?>"></img>
                                                </div> -->

                                                <!-- <div class="wrap-mini-foto-profil">
                                                    <div class="mini-foto-profil">
                                                        <p><?php echo substr(trim(ucfirst($resultuser->namalengkap)),0,1); ?></p>
                                                    </div>
                                                    <div class="nama-mini-foto-profil">
                                                        <?=$resultuser->namalengkap;?>
                                                    </div> 
                                                </div>
                                                <!-- <div class="judul-search-result"> -->
                                                    <!-- <h2><?=$result->judulcontent;?><h2>
                                                </div> 
                                                <div class="deskripsi-search-result">
                                                    <?=substr($result->desccontent,0,80) . '...';?>
                                                </div>  -->
                                            <!-- </div>
                                        </a> -->

                                        <div class="content">
                                            <div class="card">
                                                <div class="firstinfo"><img src="http://www.doyoubuzz.com/var/users/_/2016/11/15/18/1300826/avatar/1253797/avatar_cp_630.jpg?t=1504470047" />
                                                    <div class="profileinfo">
                                                        <h1>HARUN PEHLİVAN</h1>
                                                        <h3> FOUNDER,CEO BLOGGER</h3>
                                                        <p class="bio"> <a href="http://www.doyoubuzz.com/harun-pehlivan" target="_blank">E-CV</a> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="badgescard"> 
                                                <span class="fa fa-facebook"></span>
                                                <span class="fa fa-twitter"> </span>
                                                <span class="fa fa-google-plus"></span>
                                                <span class="fa fa-youtube"></span>
                                                <span class="fa fa-dribble"></span>
                                                <span class="fa fa-google"></span>
                                                <span class="fa fa-android"> </span>
                                            </div>
                                        </div>
                                        <br />
                                    <?php
                                }
                            }else{
                                if($this->session->flashdata('no_data')){
                                    ?>
                                    <script>
                                        swal({
                                                title: "Try Again",
                                                text: "<?php echo $this->session->flashdata('no_data'); ?>",
                                                timer: 3000,
                                                showConfirmButton: false,
                                                type: 'error'
                                            }, function() {
                                            window.location = "<?=base_url('c_dashboard/');?>";
                                        });
                                    </script>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-1 col-lg-1">
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