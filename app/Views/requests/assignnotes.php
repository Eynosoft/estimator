<div class="row">
  
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Notes</h6>
      </div>

      <?php if (!empty($requestor['assign_id'])) { ?>

        <div class="card-body">

          <?php

          echo form_input(array('type' => 'hidden', 'name' => 'gid', 'value' => $gid));

          ?>

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php

              $options = [
                'name'        => 'notes',
                'id'          => 'sysnotes_description',
                'value'       => $requestor['assign_note'],
                'rows'        => '05',
                'cols'        => '10',
                'class'       => 'form-control'
              ];

              echo form_textarea($options);

              ?>

            </div>

          </div>

        </div>

      <?php } else { ?>

        <div class="card-body">

          <?php

          echo form_input(array('type' => 'hidden', 'name' => 'gid', 'value' => $gid));

          ?>

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php

              $options = [
                'name'        => 'notes',
                'id'          => 'sysnotes_description',
                'value'       => '',
                'rows'        => '05',
                'cols'        => '10',
                'class'       => 'form-control'
              ];
              echo form_textarea($options);

              ?>

            </div>

          </div>

        </div>


      <?php } ?>

      <div class="col-lg-12 mb-4">

        <?php echo form_input(array('type' => 'submit', 'name' => 'savenotes', 'value' => 'Save', 'id' => 'savenotes', 'class' => 'btn btn-md btn-primary')); ?>

      </div>

    </div>

  </div>

  <!-- Save Button row -->

</div>