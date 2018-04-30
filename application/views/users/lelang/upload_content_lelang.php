<div class="modal fade" id="modal-upload-content-lelang" role="dialog">
            <div class="modal-dialog" id="modal-content-upload-lelang">
            
            <!-- Modal content-->
                <div class="modal-content ">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">What do you have today?</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="padding-modal-body">
                            <form method="POST" enctype="multipart/form-data" id="form-upload" autocomplete="off" action="<?php echo site_url('c_profile/m_uploadlelang');?>">
                                <table>
                                    <tr>                                      
                                        <div class="wrap-input100">
											<select name="txttitle" class="combo-box-lelang" required title="The category is required" oninvalid="this.setCustomValidity('Sorry, The Category cannot be empty')" oninput="setCustomValidity('')" />
												<?php foreach($content as $c){ ?>
												<option value="<?php echo $c->Id ?>"><?php echo $c->title ?></option>
												<?php } ?>
											</select> 
                                            <span class="focus-input100"></span>
                                        </div>
                                    </tr>
                                    <tr>                                      
                                        <div class="wrap-input100">
                                            <input class="input100 form-control" type="number" autofocus name="txthargaawal" placeholder="Harga Min" required title="The title is required" oninvalid="this.setCustomValidity('Sorry, The title cannot be empty')" oninput="setCustomValidity('')" />
                                            <span class="focus-input100"></span>
                                        </div>
                                    </tr>
                                </table>
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
    </section>
<script>
		$(document).ready(function(){

			$('#btnpost').on('submit',function() {
				var formData = new FormData($(this)[0]);
                var varTitle    = $('#txttitle').val();
                var varStartingprice     = $('#txthargaawal').val();
                if(varTitle == ''){
                    swal({
                        type: 'error',
                        title: 'The title is required',
                        animation: true,
                        customClass: 'animated tada'
                    })
                }else if(varStartingprice == ''){
                	swal({
                    type: 'error',
                    title: 'The description is required',
                    animation: true,
                    customClass: 'animated tada'
                })
                }else{
                    //reset error messsage
                    // $('.error').html('');
                    $.ajax({
                        url: $(this).attr("action"),
                        type: 'POST',
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
