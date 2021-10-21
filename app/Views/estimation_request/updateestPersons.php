<!-- Content Column -->
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">
      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Persons</h6>

      </div>

      <div class="card-body">

      <?php

      $lblattribute = [
      'class' => 'fieldLabel mb-1',
      ];

      ?>

          <div class="form-row">

            <div class="form-group col-md-12">

              <?php echo form_label('Name','',$lblattribute); ?>

              <?php echo form_input(array('type'=>'text','name'=>'name','class'=>'form-control','id'=>'person_name','placeholder' => 'Enter Person Name')); ?>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">

              <label class="fieldLabel mb-1">Emails</label>

              <input class="form-control" type="email">

            </div>

            <div class="form-group col-md-6">

              <label class="fieldLabel mb-1">Phone number</label>

              <input class="form-control" type="tel">

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-12">

              <label class="fieldLabel mb-1">Locate</label>

              <input class="form-control" type="text">

            </div>

          </div>

      </div>

    </div>

  </div>

</div>