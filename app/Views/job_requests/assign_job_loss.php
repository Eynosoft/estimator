<!-- Content Column -->
<div class="row">

  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->

    <div class="card shadow">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Total Loss</h6>
      </div>

      <?php

      $lblAttributes = ['class' => 'fieldLabel mb-1'];

      ?>

      <?php if (!empty($job_request_data)) { ?>


        <div class="card-body">

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php echo form_label('Total Loss', 'total_loss', $lblAttributes); ?>

              <?php

              $options = [
                '' => 'Select Option',
                'economical' => 'Economical',
                'structural' => 'Structural',

              ];

              echo form_dropdown('total_loss_type', $options,$job_request_data['total_loss_type'], 'class="form-control" id="total_loss"');

              ?>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php echo form_label('Estimated Market Value', 'estimated_market_value', $lblAttributes); ?>

              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'estimated_market_value', 'name' => 'estimated_market_value', 'value' => $job_request_data['estimated_market_value'])); ?>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-12">
              <?php echo form_label('Approximated Salvage Value', 'approximated_salvage_value', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'reserves', 'name' => 'approximated_salvage_value', 'value' => $job_request_data['approximated_salvage_value'])); ?>
            </div>

          </div>


        </div>


      <?php } else { ?>

        <div class="card-body">

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php echo form_label('Total Loss', 'total_loss', $lblAttributes); ?>

              <?php

              $options = [
                '' => 'Select Option',
                'economical' => 'Economical',
                'structural' => 'Structural',

              ];

              echo form_dropdown('total_loss_type', $options, '', 'class="form-control" id="total_loss"');

              ?>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php echo form_label('Estimated Market Value', 'estimated_market_value', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'estimated_market_value', 'name' => 'estimated_market_value', 'value' => '')); ?>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-12">
              <?php echo form_label('Approximated Salvage Value', 'approximated
            _salvage_value', $lblAttributes); ?>
              <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'reserves', 'name' => 'approximated_salvage_value', 'value' => '')); ?>
            </div>

          </div>


        </div>

      <?php } ?>

    </div>

  </div>

</div>