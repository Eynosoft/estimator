<!-- Content Column -->
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
        
       echo form_open('Garage/Store',$frmattribute);

       if(!empty($garage))
       {
         foreach($garage as $cdata)
         {
        
          $id =  $cdata['id'] ;
          $garage_name =$cdata['garage_name'];
          $owner_name = $cdata['owner_name'];
          $reports_password = $cdata['reports_password'];
          $email = $cdata['email'];
          $mobile = $cdata['mobile'] ;
          $landline = $cdata['landline'] ;
          $fax = $cdata['fax'];
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
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'garage_name', 'name' => 'garage_name', 'placeholder' => 'Enter Garage Name','value' =>$garage_name)); ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-12">
            <?php echo form_label('Owner', 'owner_name', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'owner_name', 'name' => 'owner_name', 'placeholder' => 'Enter Owner Name','value' =>$owner_name)); ?>
            <span class="noteText">The language that reports will be generated with</span>
          </div>
        </div>


        <div class="form-row">

          <div class="form-group col-md-12">
            <?php echo form_label('Reports Password', 'reports_password', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'reports_password', 'name' => 'reports_password', 'placeholder' => 'Enter Reports Password','value' =>$reports_password)); ?>
            <span class="noteText">Password used to protect the report generated.</span>
          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label('Emails', 'email', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'email', 'name' => 'email', 'placeholder' => 'Enter Email Address','value' =>$email)); ?>

            <span class="noteText">Seperate multiple emails with comma.</span>

          </div>

          <div class="form-group col-md-6">
            <?php echo form_label('Mobile', 'mobile', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'mobile', 'name' => 'mobile', 'placeholder' => 'Enter Mobile No.','value' =>$mobile)); ?>

            <span class="noteText">Seperate multiple mobile numbers with comma.</span>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-6">
            <?php echo form_label('Land Lines', 'landline', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'landline', 'name' => 'landline', 'placeholder' => 'Enter Landline No.','value' =>$landline)); ?>
            <span class="noteText"></span>

          </div>

          <div class="form-group col-md-6">
            <?php echo form_label('Fax', 'fax', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'fax', 'name' => 'fax', 'placeholder' => 'Enter Fax No.','value' =>$fax)); ?>

            <span class="noteText">Seperate multiple faxes numbers with comma.</span>

          </div>

        </div>
        <div class="col-lg-12 mb-4">

          <?php echo form_submit(array('type'=> 'submit','class' => 'btn btn-md btn-primary', 'id'=> 'savegarage', 'value' => 'Save')) ?>

        </div>
      </div>
      <?php } }  else  { ?>

      <div class="card-body">


        <div class="form-row">

          <div class="form-group col-md-12">
            <?php echo form_label('Garage name', 'garage_name', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'garage_name', 'name' => 'garage_name', 'placeholder' => 'Enter Garage Name','value' =>$garage_name)); ?>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('garage_name');?>
            </div>
            <?php
          }
          ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-12">
            <?php echo form_label('Owner', 'owner_name', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'owner_name', 'name' => 'owner_name', 'placeholder' => 'Enter Owner Name','value' =>$owner_name)); ?>
            <span class="noteText">The language that reports will be generated with</span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('owner_name');?>
            </div>
            <?php
            }
            ?>
          </div>
        </div>


        <div class="form-row">

          <div class="form-group col-md-12">
            <?php echo form_label('Reports Password', 'reports_password', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'reports_password', 'name' => 'reports_password', 'placeholder' => 'Enter Reports Password','value' =>$reports_password)); ?>
            <span class="noteText">Password used to protect the report generated.</span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('reports_password');?>
            </div>
            <?php
            }
            ?>
          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label('Emails', 'email', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'email', 'name' => 'email', 'placeholder' => 'Enter Email Address','value' =>$email)); ?>

            <span class="noteText">Seperate multiple emails with comma.</span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('email');?>
            </div>
            <?php
            }
            ?>
          </div>

          <div class="form-group col-md-6">
            <?php echo form_label('Mobile', 'mobile', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'mobile', 'name' => 'mobile', 'placeholder' => 'Enter Mobile No.','value' =>$mobile)); ?>

            <span class="noteText">Seperate multiple mobile numbers with comma.</span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('mobile');?>
            </div>
            <?php
            }
            ?>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-6">
            <?php echo form_label('Land Lines', 'landline', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'landline', 'name' => 'landline', 'placeholder' => 'Enter Landline No.','value' =>$landline)); ?>
            <span class="noteText"></span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('landline');?>
            </div>
            <?php
            }
            ?>
          </div>

          <div class="form-group col-md-6">
            <?php echo form_label('Fax', 'fax', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'fax', 'name' => 'fax', 'placeholder' => 'Enter Fax No.','value' =>$fax)); ?>

            <span class="noteText">Seperate multiple faxes numbers with comma.</span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('fax');?>
            </div>
            <?php
            }
            ?>

          </div>

        </div>
        <div class="col-lg-12 mb-4">

          <?php echo form_submit(array('type'=> 'submit','class' => 'btn btn-md btn-primary', 'id'=> 'savegarage', 'value' => 'Save')) ?>

        </div>
      </div>
      <?php } ?>
      <?php echo form_close(); ?>
    </div>

  </div>

</div>