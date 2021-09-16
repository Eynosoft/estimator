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

    
    <?php echo form_input(array('type' => 'hidden', 'class' => 'form-control', 'id' => 'requestor_id', 'name' => 'requestor_id', 'value' => $requestor[0]['id'])); ?>


      <?php if (!empty($requestor[0]['assign_id'])) { ?>

        <div class="card-body">

          <div class="form-row">

            <?php echo form_input(array('type' => 'hidden', 'name' => 'assign_id', 'value' => $requestor[0]['assign_id'])); ?>

            <div class="form-group col-md-12">

              <?php echo form_label('Assessor', 'assessor_name', $lblAttributes); ?>

              <?php

              $options = $assessors;
              echo form_dropdown('assessor', $options, $requestor[0]['assessor'], 'class="form-control" id="assessor_name"');

              ?>

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

              <?php echo form_label('Visit Date', 'visit', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'datepicker', 'name' => 'visit_date', 'value' => $requestor[0]['visit_date'])); ?>

              <?php if (isset($validation)) { ?>

                <div class='alert alert-danger mt-2'>
                  <?= $validation->getError('reports_password'); ?>
                </div>

              <?php

              }

              ?>

            </div>

          </div>

        </div>

      <?php } else { ?>

        <div class="card-body">

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php echo form_label('Assessor', 'assessor_name', $lblAttributes); ?>

              <?php

              $options = $assessors;
              echo form_dropdown('assessor', $options, '', 'class="form-control" id="assessor_name"');

              ?>

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
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'datepicker1', 'name' => 'visit_date', 'value' => '')); ?>
              <?php if (isset($validation)) { ?>
                <div class='alert alert-danger mt-2'>
                  <?= $validation->getError('reports_password'); ?>
                </div>

              <?php

              }

              ?>

            </div>

          </div>

        </div>

      <?php } ?>

    </div>

  </div>

</div>