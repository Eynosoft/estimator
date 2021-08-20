<!-- Content Column -->
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Assign Job</h6>
      </div>

      <?php

      $lblAttributes = ['class' => 'fieldLabel mb-1'];

      ?>

      <?php

      $frmattribute = [
        'id' => 'garage_create',
        'method' => 'post',
      ];

      echo form_open('requests/assignjob', $frmattribute);

      ?>

      <div class="card-body">

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Assessor', 'assessor_name', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'assessor_name', 'name' => 'assessor_name', 'placeholder' => 'Enter Assesor Name', 'value' => '')); ?>

            <?php if (isset($validation)) { ?>
              <div class='alert alert-danger mt-2'>
                <?= $validation->getError('assessor_name'); ?>
              </div>

              <?php
              }
              ?>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Visit', 'visit', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'date', 'class' => 'form-control', 'id' => 'visit', 'name' => 'visit','value' => '')); ?>
            
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

        <div class="col-lg-12 mb-4">

          <?php echo form_submit(array('type' => 'submit', 'class' => 'btn btn-md btn-primary', 'id' => 'savegarage', 'value' => 'Save')) ?>

        </div>

      </div>

      <?php echo form_close(); ?>

    </div>

  </div>

</div>