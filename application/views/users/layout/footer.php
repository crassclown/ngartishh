
  </body>
  <section id="footer">
    <a href="<?=base_url('c_dashboard/aboutus');?>" class="">About Us</a>
  </section>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url('assets/js/sweetalert.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/select2.min.js')?>"></script>
    <!--==================================== End Back end pandhu ===========================================-->
  
  <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>

  <script src="<?php echo base_url('assets/js/jquery.isotope.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/fancybox/jquery.fancybox.pack.js')?>"></script>
  <script src="<?php echo base_url('assets/js/wow.js')?>"></script>
  <!-- <script src="<?php echo base_url('assets/js/functions.js')?>"></script> -->
  <script src="<?php echo base_url('assets/js/upload.js')?>"></script>
  <script src="<?php echo base_url('assets/js/like.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/Animocons/js/mo.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/Animocons/js/demo.js')?>"></script>
  <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
  <script src="<?php echo base_url('assets/js/font-awesome.js')?>"></script>

  
  <script type="text/javascript">
    new WOW().init();
  </script>
  <script>
//   $(document).ready(function(){
//       $('[data-toggle="tooltip"]').tooltip();   
//   });
  </script>
  
  <!-- put image after selected in edit -->
  <script>
    function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#sebelum-blah')
                      .attr('src', e.target.result)
                      .attr('id', 'blah')
              };

              reader.readAsDataURL(input.files[0]);
          }
      }
  </script>
  <script>
    function liveSearch() {
        var input_data = $('#search_data').val();
        if (input_data.length === 0) {
            $('#suggestions').hide();
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>c_dashboard/m_searchbox",
                data: {'search_data': input_data},
                success: function (data) {
                    // return success
                    if (data.length > 0) {
                        $('#suggestions').show();
                        $('#autoSuggestionsList').addClass('auto_list');
                        $('#autoSuggestionsList').html(data);
                    }
                }
            });
        }
    }
</script>

</html>
