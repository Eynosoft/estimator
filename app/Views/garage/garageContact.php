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

      echo form_open('garage/store', $frmattribute);

      ?>

      <div class="card-body">

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Garage name', 'garage_name', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'garage_name', 'name' => 'garage_name', 'placeholder' => 'Enter Garage Name', 'value' => '')); ?>

            <?php if (isset($validation)) { ?>
              <div class='alert alert-danger mt-2'>
                <?= $validation->getError('garage_name'); ?>
              </div>

              <?php
              }
              ?>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label('Person in charge', 'owner_name', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'owner_name', 'name' => 'owner_name', 'placeholder' => 'Enter Person in Charge', 'value' => '')); ?>

            <span class="noteText">The language that reports will be generated with</span>

            <?php if (isset($validation)) { ?>
              <div class='alert alert-danger mt-2'>
                <?= $validation->getError('owner_name'); ?>
              </div>
            <?php

            }

            ?>

          </div>
       
          <div class="form-group col-md-6">

          <?php echo form_label('Repair Time Rate', 'repair_time_rate', $lblAttributes); ?>

           <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'reapir_time_rate', 'name' => 'repair_rate', 'placeholder' => 'Enter Repair Time Rate', 'value' => ''));  ?>

           <?php if (isset($validation)) { ?>

              <div class='alert alert-danger mt-2'>
                <?= $validation->getError('repair_rate'); ?>
              </div>
              
            <?php

            }

            ?>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Reports Password', 'reports_password', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'password', 'class' => 'form-control', 'id' => 'reports_password', 'name' => 'reports_password', 'placeholder' => 'Enter Reports Password', 'value' => '')); ?>
            <span class="noteText">Password used to protect the report generated.</span>
            <?php if (isset($validation)) { ?>
              <div class='alert alert-danger mt-2'>
                <?= $validation->getError('reports_password'); ?>
              </div>
            <?php

            }

            ?>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label('Emails', 'email', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'email', 'name' => 'email', 'placeholder' => 'Enter Email Address', 'value' => '')); ?>

            <span class="noteText">Seperate multiple emails with comma.</span>
            <?php if (isset($validation)) { ?>
              <div class='alert alert-danger mt-2'>
                <?= $validation->getError('email'); ?>
              </div>

            <?php

            }

            ?>

          </div>

          <div class="form-group col-md-6">

            <?php echo form_label('Mobile', 'mobile', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'mobile', 'name' => 'mobile', 'placeholder' => 'Enter Mobile No.', 'value' => '')); ?>

            <span class="noteText">Seperate multiple mobile numbers with comma.</span>
            <?php if (isset($validation)) { ?>
              <div class='alert alert-danger mt-2'>
                <?= $validation->getError('mobile'); ?>
              </div>
            <?php

            }

            ?>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label('Land Lines', 'landline', $lblAttributes); ?>

            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'landline', 'name' => 'landline', 'placeholder' => 'Enter Landline No.', 'value' => '')); ?>
            <span class="noteText"></span>

            <?php if (isset($validation)) { ?>
              <div class='alert alert-danger mt-2'>
                <?= $validation->getError('landline'); ?>
              </div>
            <?php

            }

            ?>

          </div>


          <div class="form-group col-md-6">

            <?php echo form_label('Fax', 'fax', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'fax', 'name' => 'fax', 'placeholder' => 'Enter Fax No.', 'value' => '')); ?>
            <span class="noteText">Seperate multiple faxes numbers with comma</span>

            <?php if (isset($validation)) { ?>

              <div class='alert alert-danger mt-2'>
                <?= $validation->getError('fax'); ?>
              </div>

            <?php

            }

            ?>

          </div>

        </div>

        <div class="col-lg-12 mb-4">

          <?php echo form_submit(array('type' => 'submit', 'class' => 'btn btn-md btn-primary', 'id' => 'savegarage', 'value' => 'Save')) ?>

        </div>

      </div>


      <?php echo form_close(); ?>


    </div>

  </div>

</div>