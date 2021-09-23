<!-- Footer section starts -->
<!-- Scroll to Top Button-->

  <a class="scroll-to-top rounded" href="#page-top">

    <i class="fa fa-angle-up"></i>

  </a>

<!-- Logout Modal-->

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    
    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>

          <button class="close" type="button" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">×</span>

          </button>

        </div>

      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>

        <div class="modal-footer">

        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

        <a class="btn btn-primary" href="<?php echo base_url(route_to('logout')); ?>">Logout</a>

      </div>

      </div>

    </div>

  </div>

  </div>

</body>

  <!-- Bootstrap core JavaScript-->
  
<?php echo $this->include('template/salert'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
<script src="<?php echo base_url(); ?>/assets/js/custom.js?v="<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>/assets/js/ep-style.js"></script>
  <!-- Page level plugins -->
  <!-- <script src="<?php // echo base_url(); ?>/assets/js/demo/jquery.validate.js"></script>
  <script src="<?php // echo base_url(); ?>/assets/js/demo/validations.js"></script> -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<!-- Date time picker -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>

<!-- Date time Picker -->


<script>
  $(document).ready(function() {
    // Initialize
    $("#autocompleteuser").autocomplete({
      source: function(request, response) {
        // CSRF Hash
        var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash
        // Fetch data
        $.ajax({
          url: "<?= site_url('Garage/getGarages'); ?>",
          type: 'post',
          dataType: "json",
          data: {
            search: request.term,
            [csrfName]: csrfHash // CSRF Token
          },
          success: function(data) {
            // Update CSRF Token
            $('.txt_csrfname').val(data.token);
            response(data.data);
          }
        });
      },
      select: function(event, ui) {
        // Set selection
        $('#autocompleteuser').val(ui.item.label); // display the selected text
        // $('#userid').val(ui.item.value); // save selected id to input
        return false;
      },

        focus: function(event, ui) {
        $("#autocompleteuser").val(ui.item.label);
        // $( "#userid" ).val( ui.item.value );
        return false;
      },
    });

  });
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


</html>


<!-- Footer section ends -->