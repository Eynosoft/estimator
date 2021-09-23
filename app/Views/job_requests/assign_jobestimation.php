<!-- Content Column -->
<div class="row">

  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->

    <div class="card shadow">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Job Estimation</h6>
      </div>

      <?php

      $lblAttributes = ['class' => 'fieldLabel mb-1'];

      ?>

      <?php if (!empty($job_request_data)) {  ?>


        <div class="card-body">

          <div class="form-row">

            <div class="form-group col-md-6">

              <?php echo form_label('Pre Accident Condition', 'pre_accident_condition', $lblAttributes); ?>

              <?php

              $options = [
                '' => 'Select Option',
                'new' => 'New',
                'very good' => 'Very Good',
                'good' => 'Good',
                'fair' => 'Fair',
                'poor' => 'Poor',
              ];

              echo form_dropdown('pre_accident_condition', $options,$job_request_data['pre_accident_condition'], 'class="form-control" id="pre_accident_condition"');

              ?>

            </div>

            <div class="form-group col-md-6">

              <?php echo form_label('Condition Of Tyres', 'condition_of_tyres', $lblAttributes); ?>

              <?php

              $options = [
                '' => 'Select Option',
                'new' => 'New',
                'very good' => 'Very Good',
                'good' => 'Good',
                'fair' => 'Fair',
                'poor' => 'Poor',
              ];

              echo form_dropdown('tyre_condition', $options,$job_request_data['tyre_condition'], 'class="form-control" id="tyre_condition"');

              ?>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php echo form_label('Speedo Reading', 'speedo reading', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'speedo_reading', 'name' => 'speedo_reading', 'value' => $job_request_data['speedo_reading'])); ?>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-12">
              <?php echo form_label('Reserves', 'reserves', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'reserves', 'name' => 'reservers', 'value' => $job_request_data['reservers'])); ?>
            </div>

          </div>

        </div>

      <?php } else { ?>

        <div class="card-body">

          <div class="form-row">

            <div class="form-group col-md-6">

              <?php echo form_label('Pre Accident Condition', 'pre_accident_condition', $lblAttributes); ?>

              <?php

              $options = [
                '' => 'Select Option',
                'new' => 'New',
                'very good' => 'Very Good',
                'good' => 'Good',
                'fair' => 'Fair',
                'poor' => 'Poor',
              ];

              echo form_dropdown('pre_accident_condition', $options, '', 'class="form-control" id="pre_accident_condition"');

              ?>

            </div>

            <div class="form-group col-md-6">

              <?php echo form_label('Condition Of Tyres', 'condition_of_tyres', $lblAttributes); ?>

              <?php

              $options = [
                '' => 'Select Option',
                'new' => 'New',
                'very good' => 'Very Good',
                'good' => 'Good',
                'fair' => 'Fair',
                'poor' => 'Poor',
              ];

              echo form_dropdown('tyre_condition', $options, '', 'class="form-control" id="tyre_condition"');

              ?>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php echo form_label('Speedo Reading', 'speedo reading', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'speedo_reading', 'name' => 'speedo_reading', 'value' => '')); ?>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-12">
              <?php echo form_label('Reserves', 'reserves', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'reserves', 'name' => 'reservers', 'value' => '')); ?>
            </div>

          </div>

        </div>


      <?php  }  ?>

    </div>

  </div>

</div>