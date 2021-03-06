<section id="section-works" class="section appear clearfix" style="background-image:url('<?php echo base_url('assets/images/bright_squares.png')?>');min-height:600px;">
        <div class="container ">
            <div class="col-md-12 border-content">
                <div class="row ">

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
                                    <div class="card profil text-center">
                                        <a href="<?=base_url('c_profile/m_users/'.$resultuser->userId);?>" class="a-profile-user">
                                            <div class="background-profile">
                                                <img class="img-background-profile" src="https://images.pexels.com/photos/34199/pexels-photo.jpg?w=1260&h=750&auto=compress&cs=tinysrgb"></img>
                                                <div class="image-profil">
                                                <img class="wrap-border-profile"src="https://images.pexels.com/photos/34199/pexels-photo.jpg?w=1260&h=750&auto=compress&cs=tinysrgb"></img>
                                                </div>
                                            </div>
                                            <div class="wrapper">
                                                <h1><?php echo $resultuser->namalengkap; ?></h1>
                                                <?php
                                                    if($resultuser->biousers){
                                                        ?>
                                                            <p><?=$resultuser->biousers;?></p>
                                                        <?php
                                                    }else{
                                                        echo "Bio masih kosong";
                                                    }
                                                ?>
                                                
                                                    <!-- <i class="fab fa-instagram"></i>
                                                    <i class="fab fa-twitter-square"></i> -->
                                            </div>
                                        </a>
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