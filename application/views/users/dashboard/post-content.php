<section  class="section" style="background:url('<?php echo base_url('assets/images/bright_squares.png')?>');min-height:600PX;">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 border-content">
                <div class="row">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('C_dashboard/do_upload');?>">
                        <div class="background-post">
						<input type="hidden" name="txtsession" value="<?php echo $this->session->userdata('Id');?>">
                            <div class="group-input">
                                <div class="row">
                                    <label class="col-md-2 label-input">Title :</label>
                                    <input type="text" class="col-md-10 input-post" name="txttitle" placeholder="Title"/>
                                </div>
                            </div>
                            <div class="group-input">
                                <div class="row">
                                    <label class="col-md-2 label-input">Description:</label>
                                    <input type="text" class="col-md-10 input-post" name="txtdesc" placeholder="Description "/>
                                </div>
                            </div>
                            <div class="group-input">
                                <div class="row">
                                    <label class="col-md-2 label-input">Kategori :</label>
                                </div>
                                <select name="txtcategories" id="txtcategories" required title="The category is required" oninvalid="this.setCustomValidity('Sorry, The Category cannot be empty')" oninput="setCustomValidity('')" />
                                    <option value=""></option>
                                <?php
                                    foreach($categories as $cat){
                                        ?>
                                            <option value="<?=$cat->Id;?>"><?=$cat->name;?></option>
                                        <?php
                                    }
                                ?>
                                </select>                             
                            </div>

                                <div class="col-md-12 ">
                                    <div id="drop-area">
                                        <p class="text-center">Upload files by click or drag files to this area</p>
                                        <input type="file" id="fileElem" name="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
                                        <label class="button text-center" for="fileElem"><i class="material-icons " style="font-size:60px;">file_upload</i></label>
                                    <progress id="progress-bar" max=100 value=0></progress>
                                    <div id="gallery" /></div>
                                    </div>

                                    <p class="error">
			
                                    </p>
                                </div>

                            <input type="submit" class="col-md-3 col-md-offset-4" name="Description"/>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
		$(document).ready(function(){

			$('#btnpost').on('submit',function() {
				var formData = new FormData($(this)[0]);
                var varTitle    = $('#txttitle').val();
                var varDesc     = $('#txtdesc').val();
                var varCat      = $('#txtcategories').val();
                var varPic      = $('#fileElem').val();
                if(varTitle == ''){
                    swal({
                        type: 'error',
                        title: 'The title is required',
                        animation: true,
                        customClass: 'animated tada'
                    })
                }else if(varDesc == ''){
                swal({
                    type: 'error',
                    title: 'The description is required',
                    animation: true,
                    customClass: 'animated tada'
                })
                }else if(varCat == ''){
                swal({
                    type: 'error',
                    title: 'The category is required',
                    animation: true,
                    customClass: 'animated tada'
                })
                }else if(varPic == ''){
                    swal({
                    type: 'error',
                    title: 'Picture is required',
                    animation: true,
                    customClass: 'animated tada'
                })
                }else{
                    //reset error messsage
                    $('.error').html('');
                    $.ajax({
                        url: $(this).attr("action"),
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        async: true,
                        beforeSend: function() {
                            $('#btnpost').prop('disabled', true);
                        },
                        complete: function() {
                            $('#btnpost').prop('disabled', false);
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                }
			});
		});
    </script>
