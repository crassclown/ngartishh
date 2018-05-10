        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">What do you have today?</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="padding-modal-body">
                                    <?php
                                        if($this->session->flashdata('titlereq')){
                                            ?>
                                              <script>
                                                swal({
                                                  title: "Required",
                                                  text: "<?php echo $this->session->flashdata('titlereq'); ?>",
                                                  timer: 2000,
                                                  showConfirmButton: false,
                                                  type: 'error'
                                                });
                                              </script>
                                            <?php
                                        }else if($this->session->flashdata('descreq')){
                                            ?>
                                              <script>
                                                swal({
                                                  title: "Required",
                                                  text: "<?php echo $this->session->flashdata('descreq'); ?>",
                                                  timer: 3000,
                                                  showConfirmButton: false,
                                                  type: 'error'
                                                });
                                              </script>
                                            <?php
                                        }else if($this->session->flashdata('bigger_file')){
                                            ?>
                                              <script>
                                                swal({
                                                  title: "Oops",
                                                  text: "<?php echo $this->session->flashdata('bigger_file'); ?>",
                                                  timer: 2000,
                                                  showConfirmButton: false,
                                                  type: 'error'
                                                });
                                              </script>
                                            <?php
                                        }
                                    ?>
                                    <form method="POST" enctype="multipart/form-data" id="form-upload" autocomplete="off" action="<?php echo site_url('c_dashboard/do_upload');?>">
                                        <table>
                                            <tr>                                      
                                                <div class="wrap-input100">
                                                    <div class="input-group stylish-input-group">
                                                        <input class="input100 form-control" type="hidden" name="txtsession" id="txtsession" value="<?=$this->session->userdata('Id');?>" style="width:30em;" readOnly />
                                                        <span class="focus-input100"></span>
                                                    </div>
                                                </div>
                                            </tr>
                                            <tr>                                      
                                                <div class="wrap-input100">
                                                    <div class="input-group stylish-input-group">
                                                        <input class="input100 form-control" type="text" autofocus name="txttitle" id="txttitle" placeholder="Title" style="width:30em;" required title="The title is required" oninvalid="this.setCustomValidity('Sorry, The title cannot be empty')" oninput="setCustomValidity('')" />
                                                        <span class="focus-input100"></span>
                                                    </div>
                                                </div>
                                            </tr>
                                            <tr>
                                                <textarea name="txtdesc" rows="3" cols="30" placeholder="Description" class="form-control" id="txtdesc" required style="width:30em;" title="The description is required" oninvalid="this.setCustomValidity('Sorry, The description cannot be empty')" oninput="setCustomValidity('')"></textarea>
                                            </tr>
                                            <tr>
                                                Categories
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-3">                                                            
                                                            <div class="form-check">
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
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                </div>
                            </div>
                                <div class="col-md-6 ">
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
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnpost"><i class="fa fa-paper-plane" aria-hidden="true"></i> Post</button>
                        </form>
                        <div id="uploaded_image"></div>
                     </div>
                </div>
                
            </div>
        </div>
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
