<!-- Content Column -->
<style>
  .parts-input input {
    padding: 0px 0px 0px 0px !important;
    margin: 0px 0px 0px 0px;
  }

  .parts-input .input-val {
    padding: 3px;
  }

  .parts-input .input-valvat {
    padding: 4px;
  }

  .parts-input .input-radio_val {
    text-align: center;
  }

</style>
<div class="row">

  <div class="col-lg-12 mb-4">

    <!-- Project Card Example -->
    
    <div class="card shadow">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Parts</h6>
      </div>

      <?php

      $lblAttributes = ['class' => 'fieldLabel mb-1'];

      ?>

      <div class="card-body">

        <?php

        if (!empty($part_action_options)) {
          $partsactiondata  = json_encode($part_action_options);
          echo form_input(array('type' => 'hidden', 'id' => 'part_action_data', 'name' => 'part
          _action_data', 'value' => $partsactiondata));
        }

        ?>

        <div class="form-row">

          <?php

          $options = $part;

          ?>

          <label>Select Parts : </label>

          <input type="text" id="parts_data" class="form-control" value=''>

          <div class="col-md-12">

            <br>
            
            <?php if(!empty($job_request_data['job_parts'])) { ?>

            <div class="row" id="label_values"><br>

            <?php } else { ?>

            <div class="row" id="label_values" style="display: none;"><br>

            <?php } ?>

              <div class="col-md-2">
                <label class="label-control"><b>Damage</b></label>
              </div>

              <div class="col-md-2">
                <label class="label-control"><b>Action</b></label>
              </div>

              <div class="col-md-2">
                <label class="label-control"><b>Status</b></label>
              </div>

              <div class="col-md-1">
                <label class="label-control"><b>Qty</b></label>
              </div>

              <div class="col-md-2">
                <label class="label-control"><b>Cost</b></label>
              </div>

              <div class="col-md-1">
                <label class="label-control"><b>Dis(%)</b></label>
              </div>

              <div class="col-md-1">
                <label class="label-control"><b>Vat</b></label>
              </div>

            </div>

          </div>

          <?php

          $i= 0;
          
          if (!empty($job_request_data['job_parts'])) {
            
            $tpart = count($job_request_data['job_parts']);
            
            foreach ($job_request_data['job_parts'] as $job_parts) { ?>

              <div class='row parts-input' id='removeparts<?php echo $i; ?>'>
                <div class='col-md-12'>
                  <label><b><?php echo $job_parts['part_name']; ?></b></label>
                </div>
                <input type='hidden' name='part_name[]' value='<?php echo $job_parts['part_name']; ?>'>

                <div class='col-md-2 input-val'>

                  <?php

                  $options_damage = [
                  " "=> "--Select--",
                  "Bent" => "Bent",
                  "Broken" =>"Broken",
                  'burnt'  => 'burnt',
                  'Chipped' => 'Chipped',
                  'Crushed' => 'Crushed',
                  'Cut' => 'Cut',
                  'Dented' => 'Dented',
                  'Drill' => 'Drill',
                  'Flooded' => 'Flooded',
                  'Missing' => 'Missing',
                  'Old Repair' => 'Old Repair',
                  'Scratched' => 'Scratched',
                  'Shorted' => 'Shorted',
                  'Twisted' => 'Twisted',
                  ];
                  
                  ?>

                <?php echo form_dropdown('damage_type[]',$options_damage,$job_parts['damage_type'],'class="form-control"'); ?>
                </div>

                <div class='col-md-2 input-val'>

                <?php echo form_dropdown('action_type[]',$part_action_options,$job_parts['action_type'],'class="form-control"'); ?>

                </div>

                <div class='col-md-2 input-val'>

                <?php  
                
                $options_status = [
                  '' => '--Select--',
                  'New' => 'New',
                  'Second Hand' => 'Second Hand',
                  'Imitation' => 'Imitation',
                ];

                echo form_dropdown('status[]',$options_status,$job_parts['part_status'],'class="form-control"');
                
                ?>
                </div>

                <div class='col-md-1 input-val'>
                  <input type='number' min='1' name='quantity[]' value="<?php echo $job_parts['quantity']; ?>" class='form-control part_qty' id='quantity<?php echo $i; ?>' value='1' data-id=<?php echo $i; ?>>
                </div>

                <div id='part_cost_class<?php echo $i; ?>' class='col-md-1 input-val'>
                  <input type='text' name='part_cost[]' value="<?php echo $job_parts['part_cost']; ?>" class='form-control part_cost' data-id=<?php echo $i; ?> id='part_cost<?php echo $i; ?>'>
                </div>

                <div id='part_cost_vat<?php echo $i; ?>' class='col-md-1 input-val'>
                  <input type='text' class='form-control' name='part_cost_vat[]' value="<?php echo $job_parts['part_cost_vat']; ?>" id='part_cost_val<?php echo $i; ?>'>
                </div>

                <div class='col-md-1 input-val'>
                  <input type='text' class='form-control discount' name='discount[]' id='part_discount<?php echo $i; ?>' value="<?php echo $job_parts['discount']; ?>" data-id=<?php echo $i; ?>>
                </div>

                <div class='col-md-1 input-val input-radio_val'>
                  <input type='checkbox' class='vat_parts' checked name='parts_vat[]' data-id=<?php echo $i; ?> value='' id='parts_vat<?php echo $i; ?>'>
                </div>

                <div class='col-md-1'>
                  <button class='btn btn-danger' data-id='<?php echo $i; ?>' id='removeparts'><i class='fa fa-trash'></i>
                  </button>
                </div>

                <br><br>

                <div class='col-md-12'>
                  <input type='text' name='notes[]' value='<?php echo $job_parts['parts_note']; ?>' id='parts_note' class='form-control' placeholder='Notes'>
                  <input type='hidden' name='total_parts[]' value='<?php echo $job_parts['total_amount']; ?>' id='parts_agreegate_amount<?php echo $i; ?>' class='form-control'>
                </div>

              </div>

          <?php  $i++; }  } ?>


          <?php if(!empty($job_request_data['job_parts'])) { ?>

          <input type="hidden"  id='count_parts' value="<?php echo $tpart; ?>">

          <?php } else { ?>

          <input type="hidden"  id='count_parts' value="0">            

          <?php } ?>

          <div class="col-md-12">

            <div id="newParts">

            </div>

          </div>

        </div>

        <hr>

        <div class="col-md-12">
          <div class="row" id="part_amount_total" style="color:red;font-size:20px;"> <?php if(!empty($job_request_data['job_parts'])) { ?>Total Amount : <?php } ?><?php echo $job_parts['total_amount']; ?> </div>
        </div>

      </div>

    </div>

  </div>

</div>

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type='text/javascript'>
  $(document).ready(function() {
    // Initialize 
    var count_delete = $('#count_parts').val();

    $("#parts_data").autocomplete( {
      source: function(request, response) {
        // Fetch data
        $.ajax({
          url: '<?php echo base_url('parts/partslist'); ?>',
          type: 'post',
          dataType: "json",
          data: {
            search: request.term
          },
          success: function(data) {
            response(data);
          }
        });
      },

      select: function(event, ui) {
        // Set selection
        $('#parts_data').val(ui.item.label); // display the selected text
        $('#userid').val(ui.item.value); // save selected id to input
        var parts_label = ui.item.label;
        if (parts_label == "Others") {
          var parts_data = ui.item.value;
        } else {
          var parts_data = $('#parts_data').val();
        }

        if (parts_data) {

          $('#part_labels').show();
          $('#parts_labels').append(label_values);
          $('#label_values').show();

          var damageoptions = '<option value="">--Select--</option><option value="Bent">Bent</option><option value="Broken">Broken</option><option value="burnt">burnt</option><option value="Chipped">Chipped</option><option value="Crushed">Crushed</option><option value="Cut">Cut</option><option value="Dented">Dented</option><option value="Drill">Drill</option><option value="Flooded">Flooded</option><option value="Missing">Missing</option><option value="Old Repair">Old Repair</option><option value="Scratched">Scratched</option><option value="Shorted">Shorted</option><option value="Twisted">Twisted</option>';

          var actionoptions = $("#part_action_data").val();
          if (typeof actionoptions != 'undefined' || actionoptions != '') {

            var options = $.parseJSON(actionoptions);
            var optionsHtml = '<option value="">--Select--</option>';
            for (var p in options) {
              if (p != '') {
                optionsHtml += '<option value="' + p + '">' + options[p] + '</option>';
              }
            }
          }

          var statusoptions = '<option value="">--Select--</option><option value="New">New</option><option value="Second Hand">Second Hand</option><option value="Imitation">Imitation</option>';

          var html = "<div class='row parts-input' id='removeparts" + count_delete + "'><div class='col-md-12'><label><b>" + parts_data + ":</b></label></div><input type='hidden' name='part_name[]' value='" + parts_data + "'><div class='col-md-2 input-val'><select name='damage_type[]' class='form-control'>" + damageoptions + "</select></div><div class='col-md-2 input-val'><select name='action_type[]' class='form-control'>" + optionsHtml + "</select></div><div class='col-md-2 input-val'><select name='status[]' class='form-control'>" + statusoptions + "</select></div><div class='col-md-1 input-val'><input type='number' min='1' name='quantity[]' class='form-control part_qty' id='quantity" + count_delete + "' value='1' data-id='" + count_delete + "'></div><div id='part_cost_class" + count_delete + "' class='col-md-1 input-val'><input type='text' name='part_cost[]' class='form-control part_cost' data-id='" + count_delete + "' id='part_cost" + count_delete + "'></div><div id='part_cost_vat" + count_delete + "' class='col-md-1 input-val'><input type='text' class='form-control' name='part_cost_vat[]' id='part_cost_val" + count_delete + "'></div><div class='col-md-1 input-val'><input type='text' class='form-control discount' name='discount[]' id='part_discount" + count_delete + "' data-id='" + count_delete + "'></div><div class='col-md-1 input-val input-radio_val'><input type='checkbox' class='vat_parts' checked name='parts_vat[]' data-id='" + count_delete + "' value='' id='parts_vat" + count_delete + "'></div><div class='col-md-1'><button class='btn btn-danger' data-id='" + count_delete + "' id='removeparts'><i class='fa fa-trash'></i></button></div><br><br><div class='col-md-12'><input type='text' name='notes[]' value='' id='parts_note' class='form-control' placeholder='Notes'><input type='hidden' name='total_parts[]' value='' id='parts_agreegate_amount" + count_delete + "' class='form-control' placeholder='Notes'></div></div>";
          $('#newParts').show();
          $('#newParts').append(html);
          count_delete++;
        } else {
          $("#newParts").hide();
        }

        return false;

      }
    });

  });
</script>