<!-- Content Column -->
<div class="row">

  <div class="col-lg-12 mb-4">

  <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Insurance Details</h6>

      </div>

      <div class="card-body">

        <?php

        $lblattributes = [
          'class' => 'fieldLabel mb-1',
        ];

        ?>

      <div class="form-row">

        <div class="form-group col-md-6">

          <?php echo form_label("Insured's Reference", '', $lblattributes); ?>

          <?php echo form_input(array('name' => 'insured_reference', 'class' => 'form-control', 'id' => 'insured_reference', 'placeholder' => 'Enter Insured Reference')); ?>

        </div>

        <div class="form-group col-md-6">

            <?php echo form_label('Date of accident', '', $lblattributes); ?>

            <?php echo form_input(array('name' => 'date_of_accident', 'class' => 'form-control', 'id' => 'date_of_accident')); ?>

        </div>

      </div>

      <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label("Policy number", '', $lblattributes); ?>

            <?php echo form_input(array('name' => 'policy_number', 'class' => 'form-control', 'id' => 'policy_number', 'placeholder' => 'Enter Policy Number')); ?>

          </div>

        <div class="form-group col-md-6">

          <?php echo form_label('Claim Number', '', $lblattributes); ?>

          <?php echo form_input(array('name' => 'Claim Number', 'class' => 'form-control', 'id' => 'claim_number', 'placeholder' => 'Enter Claim Number')); ?>

        </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-4">

            <?php echo form_label('Inspection', 'Inspection', $lblattributes); ?>

            <?php
            $options = [
              '' => 'Select Options',
              'Unknown' => 'Unknown',
              'Insured Vehicle' => 'Insured Vehicle',
              'Third Party Vehicle' => 'Third Party Vehicle',
            ];

            ?>

          <?php echo form_dropdown('inspection', $options, '', 'class="form-control" id="inspection"'); ?>

        </div>

        <div class="form-group col-md-4">

          <?php echo form_label('Insured Amount', 'insured Amount', $lblattributes); ?>

          <?php echo form_input(array('name' => 'insured_amount', 'class' => 'form-control', 'id' => 'insured_amount', 'placeholder' => 'Enter Insured Amount')); ?>

        </div>

        <div class="form-group col-md-4">

          <?php echo form_label('Exemption Amount', 'exemption_amount', $lblattributes); ?>

          <?php echo form_input(array('name' => 'exemption_amount', 'class' => 'form-control', 'id' => 'exemption_amount', 'placeholder' => 'Exemption Amount')); ?>

        </div>

      </div>

        <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label('Responsibility', 'Responsibility', $lblattributes); ?>

            <?php

            $options = [

              '' => 'Select Options',
              'Unknown' => 'Unknown',
              'Yes' => 'Yes',
              'No' => 'No',

            ];

            ?>

            <?php echo form_dropdown('responsibility', $options, '', 'class="form-control" id="responsibility"'); ?>

          </div>

          <div class="form-group col-md-6">

            <?php echo form_label('Liability', 'Liability', $lblattributes); ?>

            <?php echo form_input(array('name' => 'liability', 'class' => 'form-control', 'id' => 'liability', 'placeholder' => 'Enter Liability')); ?>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>