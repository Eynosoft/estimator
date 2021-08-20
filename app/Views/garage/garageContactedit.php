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

      $frmattribute = [
        'id' => 'garage_create',
        'method' => 'post',

      ];

      echo form_open('garage/updateGarage', $frmattribute);

      // echo '<pre>';
      // print_r($garage);
      // die('####');

      if (!empty($garage)) {

        foreach ($garage as $cdata) {

          $id =  $cdata['id'];
          $garage_name = $cdata['garage_name'];
          $owner_name = $cdata['owner_name'];
          $repair_rate = $cdata['repair_rate'];
          $reports_password = $cdata['reports_password'];
          $email = $cdata['email'];
          $mobile = $cdata['mobile'];
          $landline = $cdata['landline'];
          $fax = $cdata['fax'];
          $active = $cdata['active'];
          $notes = $cdata['notes'];

      ?>

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

                <?php echo form_label('Repair Time Rate','repair_rate',$lblAttributes); ?>
                <?php echo form_input(array('type'=>'text','class'=>'form-control','id'=>'repair_rate','name'=>'repair_rate','placeholder'=> 'Enter Repair Time Rate','value'=>$repair_rate)); ?>

              </div>

            </div>


            <div class="form-row">

              <div class="form-group col-md-12">

                <?php echo form_label('Reports Password', 'reports_password', $lblAttributes); ?>
                <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'reports_password', 'name' => 'reports_password', 'placeholder' => 'Enter Reports Password', 'value' => $reports_password)); ?>
                <span class="noteText">Password used to protect the report generated.</span>
                
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

            <!-- Material checked -->

        <div class="col-lg-12 mb-4">

         <?php echo form_submit(array('type' => 'submit', 'class' => 'btn btn-md btn-primary', 'id' => 'savegarage', 'value' => 'Save')) ?>

      </div>
      
    </div>

    <?php echo form_close(); ?>

    <?php } } ?>

    </div>

  </div>

</div>
      