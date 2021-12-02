<!-- Content Column -->
<style>
  #output_image {
    max-width: 150px;
    height: 100px;
  }

</style>

<div class="row">

  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Account</h6>
      </div>

      <div class="card-body">

        <form>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="fieldLabel mb-1">User name</label>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'account_username', 'id' => 'account_username')); ?>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="fieldLabel mb-1">Locale</label>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'account_locale', 'id' => 'account_locale')); ?>
            </div>
          </div>

          <div class="form-row">

            <div class="form-group col-md-6">
              <label class="fieldLabel mb-1">Signature</label>
              <?php
              echo form_input(array('type' => 'file', 'class' => 'form-control', 'id' => 'account_signature', 'name' => 'account_signature', 'onchange' => 'preview_image(event)'));
              ?>
            </div>

            <div class="col-md-6">

              <img id="output_image" />

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">
              <label class="fieldLabel mb-1">Emails</label>

              <input name="account_email" id="user_account_email_data" placeholder="Enter Email Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="form-control" value="" data-role="tagsinput" type="text"><br>
              <span class="text-danger">Seperate multiple emails with <b>Enter.</b> Key </span>

            </div>

            <div class="form-group col-md-6">
              <label class="fieldLabel mb-1">Mobile</label>

              <input name="account_mobile" id="user_account_mobile_data" placeholder="Enter Mobile Numbers&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="form-control" value="" data-role="tagsinput" type="text"><br>
              <span class="text-danger">Seperate multiple Mobile Numbers with <b>Enter.</b> Key </span>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">
              <label class="fieldLabel mb-1">Land Lines</label>
              <?php echo form_input(array('type' => 'text', 'name' => 'account_landline', 'id' => 'account_landline', 'class' => 'form-control')); ?>
              <span class="noteText"></span>
            </div>

            <div class="form-group col-md-6">
              <label class="fieldLabel mb-1">Faxes</label>

              <input name="account_fax" id="user_account_fax_data" placeholder="Enter Fax Numbers&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="form-control" value="" data-role="tagsinput" type="text"><br>
              <span class="text-danger">Seperate multiple Fax Numbers with <b>Enter.</b> Key </span>

            </div>

          </div>

        </form>

      </div>

    </div>

  </div>

</div>

<script type='text/javascript'>
  function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('output_image');
      output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
  }
</script>

<script>

$(function(){
    $('#user_account_email_data').tagsinput({
      maxTags : 5
    });
    });

$(function(){
 $('#user_account_mobile_data').tagsinput({
   maxTags : 5
 });
});

$(function(){
$('#user_account_fax_data').tagsinput({
maxTags : 5
});
});


</script>