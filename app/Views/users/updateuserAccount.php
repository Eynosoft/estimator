<!-- Content Column -->
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Account</h6>
      </div>

      <?php if (!empty($user)) { ?>

        <div class="card-body">

          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="fieldLabel mb-1">User name</label>
              <?php echo form_input(array('type' => 'text', 'name' => 'account_username', 'class' => 'form-control', 'id' => 'account_username', 'value' => $user['account_username'])); ?>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="fieldLabel mb-1">Locale</label>
              <?php echo form_input(array('type' => 'text', 'name' => 'account_locale', 'id' => 'account_locale', 'class' => 'form-control', 'value' => $user['account_locale'])); ?>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              
              <label class="fieldLabel mb-1">Signature</label>
              <?php echo form_input(array('type' => 'file', 'name' => 'account_signature','class'=>'form-control', 'id' => 'account_signature','onchange' => 'preview_image(event)')); ?>

              <?php echo form_input(array('type'=>'hidden','name' =>'account_signature_hidden','value'=>$user['account_signature'])); ?>

              <input type="hidden" name="image_name" value="<?=$rows['IMAGE_NAME'];?>" />

            </div>

            <div class="col-md-6">

              <img src="<?php echo base_url(); ?>/assets/uploads/<?php echo $user['account_signature']; ?>" id="output_image" height="100" width="150" />

            </div>


          </div>

          <div class="form-row">

            <div class="form-group col-md-6">
              <label class="fieldLabel mb-1">Emails</label>
              <?php echo form_input(array('type'=>'email','name'=>'account_email','id'=>'account_email','class'=>'form-control','value'=>$user['account_email'])); ?>
              <span class="noteText">Seperate multiple emails with comma.</span>
            </div>

            <div class="form-group col-md-6">
              <label class="fieldLabel mb-1">Mobile</label>
              <?php echo form_input(array('type'=>'text','name'=>'account_mobile','id'=>'account_mobile','value'=>$user['account_mobile'],'class'=>'form-control')) ?>
              <span class="noteText">Seperate multiple mobile numbers with comma.</span>
            </div>

          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="fieldLabel mb-1">Land Lines</label>
              <?php echo form_input(array('type'=>'text','name'=>'account_landline','id'=>'account_landline','class'=>'form-control','value'=>$user['account_landline'])); ?>
              <span class="noteText"></span>
            </div>

            <div class="form-group col-md-6">
              <label class="fieldLabel mb-1">Faxes</label>
              <?php echo form_input(array('type'=>'text','name'=>'account_fax','id'=>'account_fax','class'=>'form-control','value'=>$user['account_fax'])); ?>
              <span class="noteText">Seperate multiple faxes numbers with comma.</span>
            </div>
          </div>

        </div>

      <?php }   ?>


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