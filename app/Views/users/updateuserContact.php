<?php

$lblAttributes = [
  'class' => 'label-control',
]

?>

<!-- Content Column -->
<div class="row">

  <div class="col-lg-12 mb-4">

    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Contact</h6>

      </div>

      <div class="card-body">
        
        <?php

        if (!empty($user)) {

          echo form_input(array('type' => 'hidden', 'class' => 'form-control', 'id' => 'userid', 'name' => 'id', 'value' => $uid)); ?>

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php echo form_label('User Name', 'User Name', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'user_name', 'name' => 'user_name', 'placeholder' => 'Enter User Name', 'value' => $user['user_name'])); ?>

              <?php if (isset($validation)) { ?>

                <div style="color: red;">
                  <?= $validation->getError('user_name'); ?>
                </div>

              <?php } ?>

            </div>

          </div>

          <div class="form-row">


            <div class="form-group col-md-12">

              <?php echo form_label('Locale', 'Locale', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'locale', 'name' => 'locale', 'placeholder' => 'Enter Locale', 'value' => $user['locale'])); ?>

              <?php if (isset($validation)) { ?>
                
                <div style="color: red;">
                  <?= $validation->getError('locale'); ?>
                </div>

              <?php }  ?>

            </div>

          </div>


          <div class="form-row">

            <div class="form-group col-md-6">

              <?php echo form_label('Signature', 'signature', $lblAttributes); ?>

              <?php echo form_input(array('type' => 'file', 'name' => 'contact_signature', 'id' => 'contact_signature','class'=>'form-control', 'value'=>$user['contact_signature'])) ?>

              <?php echo form_input(array('type'=>'hidden','name'=>'contact_signature_hidden','value'=>$user['contact_signature'])); ?>

              <?php if (isset($validation)) { ?>
                <div style="color: red;">
                  <?php $validation->getError('file'); ?>
                </div>
              <?php  }  ?>

            </div>

            <div class="col-md-5 col-md-offset-1 ">
              <div id="preview">
                <img src="<?php echo base_url(); ?>/assets/uploads/<?php echo $user['contact_signature'];  ?>" height="100" width="150">
              </div>
            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">
              <?php echo form_label('Email', 'email', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'email', 'name' => 'email', 'placeholder' => 'Enter Email', 'value' => $user['emails'])); ?>

              <span class="noteText">Seperate multiple emails with comma.</span>
              <?php if (isset($validation)) { ?>
                <div style="color: red;">
                  <?= $validation->getError('email'); ?>
                </div>
              <?php  }  ?>

            </div>

            <div class="form-group col-md-6">

              <?php echo form_label('Mobile', 'mobile', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'mobile', 'name' => 'mobile', 'placeholder' => 'Enter Mobile', 'value' => $user['mobile'])); ?>
              <span class="noteText">Seperate multiple mobile numbers with comma.</span>
              <?php if (isset($validation)) { ?>
                <div style="color: red;">
                  <?= $validation->getError('mobile'); ?>
                </div>
              <?php }  ?>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">
              <?php echo form_label('Land Line', 'Land Line', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'land_line', 'name' => 'land_line', 'placeholder' => 'Enter Landline', 'value' => $user['land_line'])); ?>
              <span class="noteText"></span>
              <?php if (isset($validation)) { ?>
                <div style="color: red;">
                  <?= $validation->getError('land_line'); ?>
                </div>
              <?php } ?>

            </div>

            <div class="form-group col-md-6">

              <?php echo form_label('Fax', 'fax', $lblAttributes); ?>

              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'fax', 'name' => 'fax', 'placeholder' => 'Enter Fax', 'value' => $user['fax'])); ?>

              <span class="noteText">Seperate multiple faxes numbers with comma.</span>

              <?php if (isset($validation)) { ?>
                <div style="color: red;">
                  <?= $validation->getError('fax'); ?>
                </div>
              <?php } ?>

            </div>

          </div>

      </div>

    <?php } ?>

    </div>

  </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

  function imagePreview(fileInput) {

    if(fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function(event) {
          $('#preview').html('<img src="'+event.target.result+'" width="150" height="100"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    } 
  }

  $("#contact_signature").on('change',function () {
      imagePreview(this);
  });

</script>