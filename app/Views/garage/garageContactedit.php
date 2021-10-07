
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Contact</h6>
      </div>

      <?php

      $lblAttributes = ['class' => 'fieldLabel mb-1'];

      ?>

      <?php

      if (!empty($garage)) {

        $id =  $garage['id'];
        $garage_name = $garage['garage_name'];
        $owner_name = $garage['owner_name'];
        $repair_rate = $garage['repair_rate'];
        $reports_password = $garage['reports_password'];
        $email = $garage['emails'];
        $mobile = $garage['mobile'];
        $landline = $garage['land_line'];
        $fax = $garage['fax'];
        $status = !empty($garage['status']) ? 'checked' : '';
        $locale = $garage['locale'];
        $city = $garage['city'];
        $address = $garage['address'];

      ?>

      <?php // echo $status; die('####'); ?>

        <div class="card-body">

          <div class="form-row">
            <?php
            $data = [
              'type'  => 'hidden',
              'name' => 'id',
              'value' => $id
            ];
            echo form_input($data);

            ?>

            <div class="form-group col-md-12">
              <?php echo form_label('Garage name', 'garage_name', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'garage_name', 'name' => 'garage_name', 'placeholder' => 'Enter Garage Name', 'value' => $garage_name)); ?>
            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">
              <?php echo form_label('Person in charge', 'owner_name', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'owner_name', 'name' => 'owner_name', 'placeholder' => 'Enter Owner Name', 'value' => $owner_name)); ?>
              <span class="noteText">The language that reports will be generated with</span>
            </div>

            <div class="form-group col-md-6">

              <?php echo form_label('Repair Time Rate', 'repair_rate', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'repair_rate', 'name' => 'repair_rate', 'placeholder' => 'Enter Repair Time Rate', 'value' => $repair_rate)); ?>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">

              <?php echo form_label('Emails', 'email', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'email', 'name' => 'email', 'placeholder' => 'Enter Email Address', 'value' => $email)); ?>

              <span class="noteText">Seperate multiple emails with comma.</span>

            </div>

            <div class="form-group col-md-6">

              <?php echo form_label('Mobile', 'mobile', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'mobile', 'name' => 'mobile', 'placeholder' => 'Enter Mobile No.', 'value' => $mobile)); ?>

              <span class="noteText">Seperate multiple mobile numbers with comma.</span>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">

              <?php echo form_label('Land Lines', 'landline', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'landline', 'name' => 'landline', 'placeholder' => 'Enter Landline No.', 'value' => $landline)); ?>
              <span class="noteText"></span>

            </div>

            <div class="form-group col-md-6">

              <?php echo form_label('Fax', 'fax', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'fax', 'name' => 'fax', 'placeholder' => 'Enter Fax No.', 'value' => $fax)); ?>
              <span class="noteText">Seperate multiple faxes numbers with comma.</span>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">

              <?php echo form_label('Locale', 'locale', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'locale', 'name' => 'locale', 'placeholder' => 'Enter Locale', 'value' => $locale)); ?>
            
            </div>

            <div class="form-group col-md-6">

              <?php echo form_label('City', 'city', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'city', 'name' => 'city', 'placeholder' => 'Enter City', 'value' => $city)); ?>
            
            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php echo form_label('Address', 'address', $lblAttributes); ?>

              <?php echo form_textarea(array('type' => 'text', 'class' => 'form-control', 'id' => 'address', 'name' => 'address', 'placeholder' => 'Enter Address', 'value' => $address, 'rows' => '3', 'cols' => '2')); ?>

            </div>

          </div>


          <div class="form-row">
              <div class="form-group col-md-12">
              <input type="checkbox" <?php echo $status; ?> data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" value="1" name="status">
              </div>
          </div>

          <!-- Material checked -->
        </div>

      <?php } ?>

    </div>

  </div>

</div>