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
              <?php echo form_input(array('type' => 'email', 'class' => 'form-control', 'name' => 'account_email')); ?>
              <span class="noteText">Seperate multiple emails with comma.</span>
            </div>

            <div class="form-group col-md-6">
              <label class="fieldLabel mb-1">Mobile</label>
              <?php echo form_input(array('type' => 'text', 'name' => 'account_mobile', 'class' => 'form-control', 'id' => 'account_mobile')); ?>
              <span class="noteText">Seperate multiple mobile numbers with comma.</span>
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
              <?php echo form_input(array('type' => 'text', 'name' => 'account_fax', 'class' => 'form-control', 'id' => 'account_fax')); ?>
              <span class="noteText">Seperate multiple faxes numbers with comma.</span>
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