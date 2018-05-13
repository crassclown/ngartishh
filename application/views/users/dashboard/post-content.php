<section  class="section" style="background:url('<?php echo base_url('assets/images/bright_squares.png')?>');min-height:600PX;">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 border-content">
                <div class="row">
                    <form method="POST">
                        <div class="background-post">
                            <div class="group-input">
                                <div class="row">
                                    <label class="col-md-2 label-input">Title :</label>
                                    <input type="text" class="col-md-10 input-post" name="judul" placeholder="Title"/>
                                </div>
                            </div>
                            <div class="group-input">
                                <div class="row">
                                    <label class="col-md-2 label-input">Description:</label>
                                    <input type="text" class="col-md-10 input-post" name="Description" placeholder="Description "/>
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