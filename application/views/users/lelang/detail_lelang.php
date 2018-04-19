<body>
<section id="section-works" class="section appear clearfix" style="background-image:url('<?php echo base_url('assets/images/bright_squares.png')?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="wrap-detail-content-foto">
                    <h4 class="text-center margin-top-judul"><b>Judul Karya Seni</b></h4>
                    <img class="img-detail-content" src="<?php echo base_url('assets/images/1.png')?>">
                        <div class="wrap-pin-detail-content">
                            <button type="button" class="pin-edit-content" data-toggle="modal" title="Edit Content" data-target="#modal-edit-detail-content">
                                <img src="<?php echo base_url('assets/images/iconpng/edit.png')?>" class="img-detail-content"></img>                                        
                            </button>
                            <button type="button" class="pin-delete-content" data-toggle="modal" title="Delete Content" data-target="#modal-delete-detail-content">
                                <img src="<?php echo base_url('assets/images/iconpng/x.png')?>" class="img-detail-content"></img>                    
                            </button>
                        </div>
                    </img>
                </div>            
            </div>
            <div class="col-md-4">
                <div class="wrap-detail-content-lelang">
                    <div class="text-center">
                        <h3>Harga Awal</h3>
                    </div>
                    <div class="harga-lelang-awal text-center">
                        RP. 700.000
                    </div>

                    <div class="text-center">
                        <h3>Harga Saat ini</h3>
                    </div>
                    <div class="harga-lelang-awal text-center">
                        RP. 750.000
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="wrap-detail-content text-center">
                    <h4> Masukkan harga untuk melelang</h4>
                    <div class="padding-form-lelang">
                            <form action="#" method="POST">
                                <div class="row wrap-input-lelang">
                                    <div class="col-md-5">
                                    <p>Masukkan Harga:</p>
                                    </div>
                                    <div class="col-md-7">
                                        <input id="input-lelang" type="number" name="txtharga" placeholder="Harga">
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-default submit-edit-profil">Masukkan harga</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- modal delete content -->
        <div class="modal fade" id="modal-delete-detail-content" role="dialog">
            <div class="modal-dialog modal-body-follow modal-content-delete">
            
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Content</h4>
                    </div>
                    <div class="modal-body row modal-body-delete-detail-content text-center">
                        <p>Are you sure to delete this content?</p>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-3">
                            <button class="button-delete-detail-content">Delete</button>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-3">
                            <button class="button-delete-detail-content">Cancel</button>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>        
        <!-- end modal delete content -->

        <!-- modal Edit Content -->
        <div class="modal fade" id="modal-edit-detail-content" role="dialog">
        <div class="modal-dialog modal-body-follow">
        
        <!-- Modal content-->
        <div class="modal-content">
                    <div class="modal-header text-center ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Content</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="padding-modal-body">
                            <form action="#" method="POST">
                                <table>
                                    <tr>
                                        Judul :                                       
                                            <div class="wrap-input100">
                                            <input class="input100" type="text" name="txtjudul" placeholder="Judul">
                                            <span class="focus-input100"></span>
                                            </div>
                                    </tr>
                                    <tr>
                                       Description :
                                            <textarea name="txtbio" rows="3" cols="30" placeholder="Descrption"></textarea>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-default submit-edit-profil">Edit</button>
						</div>
					 </form>
                </div>
            </div>
            
        </div>
    </div>        
    <!-- end modal edit content -->

</body>