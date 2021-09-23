<div class="row">

  <div class="col-lg-12 mb-4">

    <!-- Project Card Example -->

    <div class="card shadow">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Remarks</h6>

      </div>

      <?php if ($job_request_data) { ?>


        <div class="card-body">

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php

              $options = [
                'name'        => 'remark',
                'id'          => 'sysnotes_description',
                'value'       => $job_request_data['remark'],
                'rows'        => '05',
                'cols'        => '10',
                'class'       => 'form-control'
              ];
              echo form_textarea($options);

              ?>

            </div>

          </div>

        </div>

      <?php  } else { ?>

        <div class="card-body">

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php

              $options = [
                'name'        => 'remark',
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

    </div>

  </div>

</div>

<!-- Save Button row -->