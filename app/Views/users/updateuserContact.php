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

              <?php echo form_label('Email', 'email', $lblAttributes); ?><br>

              <input name="email" id="update_user_email_data" placeholder="Enter Email Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="form-control" value=<?php echo $user['emails']; ?> data-role="tagsinput" type="text"><br>
              <span class="text-danger">Seperate multiple emails with <b>Enter.</b> Key </span>


              <?php if (isset($validation)) { ?>
                <div style="color: red;">
                  <?= $validation->getError('email'); ?>
                </div>
              <?php  }  ?>

            </div>

            <div class="form-group col-md-6">

              <?php echo form_label('Mobile', 'mobile', $lblAttributes); ?><br>

              <input name="mobile" id="update_user_mobile_data" placeholder="Enter Mobile Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="form-control" value=<?php echo $user['mobile']; ?> data-role="tagsinput" type="text"><br>
              <span class="text-danger">Seperate multiple Mobile Number with <b>Enter.</b> Key </span>


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

              <?php echo form_label('Fax', 'fax', $lblAttributes); ?><br>

              <input name="fax" id="update_user_fax_data" placeholder="Enter Fax Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="form-control" value=<?php echo $user['fax']; ?> data-role="tagsinput" type="text"><br>
              <span class="text-danger">Seperate multiple Fax with <b>Enter.</b> Key </span>

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

<script>

    $(function(){
    $('#update_user_email_data').tagsinput({
      maxTags : 5
    });
    });

    $(function(){
    $('#update_user_mobile_data').tagsinput({
    maxTags : 5
    });
    });

    $(function(){
    $('#update_user_fax_data').tagsinput({
     maxTags : 5
    });
    });

</script>