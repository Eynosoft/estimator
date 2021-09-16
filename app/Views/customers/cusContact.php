<!-- Content Column -->
<br>
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Contact</h6>

      </div>

    <?php 
      
      $lblAttributes = ['class' => 'fieldLabel mb-1']; 
      $frmattribute = [
              'id' => 'customer_create',
              'method' => 'post',
              ];
      
      echo form_open('customer/store',$frmattribute);

      ?>

      <div class="card-body">

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Client name', 'Client name', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'client_name', 'name' => 'client_name', 'placeholder' => 'Enter Client Name','value' =>'')); ?>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('client_name');?>
            </div>
            <?php
              }
            ?>
          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Locale', 'locale' , $lblAttributes); ?>

            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'locale', 'name' => 'locale', 'placeholder' => 'Enter Locale', 'value' => '')) ?>

            <span class="noteText">The language that reports will be generated with</span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('locale'); ?>
            </div>
            <?php
              }
            ?>

          </div>

        </div>


        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Report Password','Report Password', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'password', 'class' => 'form-control','id' => 'report_pass', 'name' => 'report_pass', 'placeholder' => 'Report Password', 'value' => '')); ?>

            <span class="noteText">Password used to protect the report generated.</span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('report_pass');?>
            </div>
            <?php

              }

            ?>

          </div>

        </div>


        <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label('Emails', 'emails', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'email', 'class' => 'form-control', 'id' => 'emails', 'name' => 'emails', 'placeholder' => 'Enter Emails', 'value' => '')); ?>

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

            <?php echo form_label('Mobile','mobile',$lblAttributes); ?>
            <?php  echo form_input(array('type' => 'tel', 'class'=> 'form-control', 'id' => 'mobile', 'name' => 'mobile', 'placeholder' => 'Enter Mobile', 'value' => '')); ?>

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

            <?php echo form_label('Land Lines','land lines', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'tel', 'class' => 'form-control', 'id' => 'land_line', 'name'=> 'land_line', 'placeholder'=> 'Enter Land Line', 'value' => '')); ?>

            <span class="noteText"></span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('land_line');?>
            </div>
            <?php

              }

            ?>

          </div>

          <div class="form-group col-md-6">

            <?php echo form_label('Faxes','faxes', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'faxes', 'name'=> 'faxes', 'placeholder' => 'Enter Faxes', 'value' => '')); ?>

            <span class="noteText">Seperate multiple faxes numbers with comma.</span>

            <?php if(isset($validation)) { ?>

            <div class='alert alert-danger mt-2'>

              <?= $validation->getError('faxes');?>

            </div>
          
          <?php echo form_input(array('type'=>'hidden','id' => 'customer_details_changed','name' => 'customer_details_changed', 'value' => ''));?>      
          
          <?php

            }

            ?>

          </div>

        </div>

        <!-- <div class="col-lg-12 mb-4">

        <?php  //echo form_submit(array('type'=> 'submit','class' => 'btn btn-md btn-primary', 'id'=> 'savecustomer', 'value' => 'Save')) ?>
          
          <div class="change-message">You have unsaved changes.</div>

        </div> -->

      </div>

      
  
    <?php echo form_close(); ?>


    </div>

  </div>

</div>