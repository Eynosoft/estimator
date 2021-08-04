<!-- Content Column -->
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Request</h6>
      </div>

      <div class="card-body">

        <?php

        $formattribute = [
          'method' => 'post',
          'id' => 'request',
          'class' => 'addrequest',
        ]

        ?>

        <?php echo form_open('Request/store', $formattribute); ?>

        <div class="form-row">

          <div class="form-group col-md-12">

            <label class="fieldLabel mb-1">Customer</label>

            <?php

            $options = $customer;
            echo form_dropdown('customer', $options, '', 'class="form-control" id="customer"');

            ?>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Requested', 'requested'); ?>
            <?php echo form_input(array('name'=> 'requested_date','type' => 'date', 'class' => 'form-control', 'id' => 'requested',)); ?>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Requested By', 'requested by'); ?>

            <?php

            $requestor = [
              '' => 'Select Requestor',
              '1' => 'Maria',
              '2' => 'John',
              '3' => 'Mary'
            ];

            ?>

            <?php echo form_dropdown('requestor', $requestor, '', 'class="form-control" id="requestor"'); ?>

          </div>

        </div>

        <!-- Save Button row -->

        <div class="row">

          <div class="col-lg-12 mb-4">

            <?php

            echo  form_submit(array('name' => 'save', 'class' => "btn btn-md btn-primary", 'value' => 'Save'))

            ?>

          </div>

        </div>

        <?php echo form_close(); ?>

      </div>

    </div>

  </div>

</div>