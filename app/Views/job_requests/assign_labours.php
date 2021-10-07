<!-- Content Column -->
<div class="row">

  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->

    <div class="card shadow">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Labours</h6>
      </div>

      <?php

      $lblAttributes = ['class' => 'fieldLabel mb-1'];

      ?>

      <div class="card-body">

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php

            $i = 0;
          
            if(!empty($job_request_data['labours'])) {

            $tlabour = count($job_request_data['labours']);

            foreach ($job_request_data['labours'] as $labours) { ?>

            <div class='row' id='removelabour'>

                  <?php

                  $labours_option = [
                    'Air Conditioning' => 'Air Conditioning',
                    'Chassis repair' => 'Chassis repair',
                    'Electrical' => 'Electrical',
                    'Exhaust repair' => 'Exhaust repair',
                    'Gearbox Rebuild' => 'Gearbox Rebuild',
                    'Geometry' => 'Geometry',
                    'Glazing Work' => 'Glazing Work',
                    'Mechanical' => 'Mechanical',
                    'Panel beating & Fitting' => 'Panel beating & Fitting',
                    'Plastics repair' => 'Plastics repair',
                    'Reprogramming' => 'Reprogramming',
                    'Respray' => 'Respray',
                    'Stickers Application' => 'Stickers Application',
                    'Trimming work' => 'Trimming work',
                    'Valeting' => 'Valeting',
                    'Wheel rim Repair' => 'Wheel rim Repair'
                  ]

                  ?>

                  <div class='col-md-3'>
                    <label class='label-control'>Labour</label>
                    <?php echo form_dropdown('labour[]', $labours_option, $labours['labour'], 'class="form-control" id="labour_value"') ?>
                  </div>

                  <div class='col-md-3'>
                    <label class='label-control'>Description</label>
                    <input type='text' class='form-control' name='description[]' value=<?php echo  $labours['description_labour']; ?>>
                  </div>

                  <div class='col-md-2' id='costt<?php echo $i; ?>'>
                    <label class='label-control'>Cost</label>
                    <input type='text' class='form-control cost' data-id="<?php echo $i; ?>" name='cost[]' value="<?php echo  $labours['cost']; ?>" id="cost<?php echo $i; ?>" autocomplete="off">
                  </div>

                  <div class='col-md-2' id="total_cost<?php echo $i; ?>">
                    <label class='label-control'>With Vat</label>
                    <input type='text' class='form-control total_cost_vat' name='total_cost[]' data-id='<?php echo $i; ?>' value="<?php echo $labours['vat_cost']; ?>" id="vat_cost<?php echo $i; ?>">
                  </div>

                  <div class='form-group col-md-1'>Vat:<input type='checkbox' checked value='' class='add_vat' data-id='<?php echo $i; ?>' name='vat[]'>
                    <input type='hidden' name='cost_total[]' value='<?php echo $labours['cost_total']; ?>' id="cost_total<?php echo $i; ?>">
                  </div>

                  <div class='col-md-1'><button style='float:right;' id='removeRow' type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button>
                  </div>

                  <?php $total_cost = $labours['cost_total']; ?>

            </div>

            <br>

            <?php $i++; } } ?>
            
            <?php  if(!empty($job_request_data['labours'])) { ?>
            
            <input type="hidden"  id='count_labours' value="<?php echo $tlabour; ?>">

            <?php } else { ?>

            <input type="hidden" id='count_labours' value="0">

            <?php  } ?>
            
          
            <div id="newLabour">

            </div>

            <div class="row col-md-12" id="agreegate_amount" style="text-align: right;color:red; font-size:20px;">
              <p>
                <?php if(!empty($job_request_data['labours'])) { ?> Total Cost: <?php } ?> <?php echo $total_cost; ?>
              </p>
            </div>

          </div>


        <button id="addRowlabour" type="button" class="col-md-12 btn btn-info">Create</button>

        </div>

      </div>

    </div>

  </div>

</div>