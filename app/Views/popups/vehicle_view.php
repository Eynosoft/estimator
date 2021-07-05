<!-- Modal -->

<div id="vehicleModal" class="modal fade" role="dialog">
   <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

         <div class="modal-header">
            <h4 class="modal-title">Vehicles</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

<div class="modal-body">

<!-- Begin Page Content -->
   <div class="container-fluid">

  <!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">Add Vehicles</h1>

  </div>

  <!-- Content Row -->
  <div class="row">

    <div class="col-lg-12 mb-4">

      <!-- Content Column -->

      <div class="row">

        <div class="col-lg-12 mb-4">

          <?php 
      
      $lblAttributes = ['class' => 'fieldLabel mb-1']; 

      ?>
          <!-- Project Card Example -->
          <div class="card shadow">

            <div class="card-body">

              <?php 
               
               $frmAttribute = [
                'id' => 'vehicle_create',
                'method' => 'post',
               ];

               echo form_open('Vehicles/store',$frmAttribute);

               if(!empty($vehicle))
               {
                 foreach($vehicle as $vdata)
                  {
                    $id = $vdata['id'];
                    $registration_plate = $vdata['registration_plate'];
                    $manufacturing_date = $vdata['manufacturing_date'];
                    $vin_number = $vdata['vin_number'];
                    $registration_date = $vdata['registration_date'];
                    $make = $vdata['make'];
                    $model = $vdata['model'];
                    $body_type = $vdata['body_type'];
                    $engine_capacity = $vdata['engine_capacity'];
                    $engine_power = $vdata['engine_power'];
                    $condition_when_imported = $vdata['condition_when_imported'];
                    $gearbox_type = $vdata['gearbox_type'];
                    $main_color = $vdata['main_color'];
                    $pcode = $vdata['pcode'];

              ?>


              <div class="form-row">

              <?php
                    $data = [
                        'type'  => 'hidden',
                        'name' => 'id',
                        'value' => $id
                    ];
                    echo form_input($data);
              ?>

                <div class="form-group col-md-6">

                  <?php echo form_label('Registration Plate','Registration Plate',$lblAttributes); ?>
                  <?php echo form_input(array('type'=>'text','class'=>'form-control','id'=>'registration_plate','name'=>'registration_plate','placeholder'=>'Enter Registration Plate','value'=> $registration_plate,'readonly' => 'readonly')) ?>

                </div>

                <div class="form-group col-md-6">

                  <?php echo form_label('Manufacture Date','Manufacture Date',$lblAttributes); ?>
                  <?php echo form_input(array('type'=>'date','class'=>'form-control','id'=>'manufacture_date','name'=>'manufacture_date','placeholder'=>'Enter Manufacture Date','value'=> $manufacturing_date,'readonly' => 'readonly')); ?>

                </div>

              </div>

              <div class="form-row">

                <div class="form-group col-md-6">

                  <?php echo form_label('Vin Number','Vin Number',$lblAttributes); ?>
                  <?php echo form_input(array('type'=>'text','class'=>'form-control','id'=>'vin_number','name'=>'vin_number','placeholder'=>'Enter Vin Number','value'=>$vin_number,'readonly' => 'readonly')); ?>

                </div>

                <div class="form-group col-md-6">

                  <?php echo form_label('Registration Date','Registration Date',$lblAttributes); ?>
                  <?php echo form_input(array('type'=>'date','class'=>'form-control','id'=>'registration_date','name'=>'registration_date','value'=>$registration_date,'readonly' => 'readonly')); ?>

                </div>

              </div>

              <div class="form-row">

                <div class="form-group col-md-4">

                  <?php echo form_label('Make','make',$lblAttributes); ?>
                  <?php echo form_input(array('type'=>'text','class'=>'form-control','id'=>'make','name'=>'make','value'=>$make,'placeholder'=>'Enter Make','readonly' => 'readonly')); ?>

                </div>

                <div class="form-group col-md-4">

                  <?php echo form_label('Model','model',$lblAttributes); ?>
                  <?php echo form_input(array('type'=>'text','class'=>'form-control','id'=>'model','name'=>'model','value'=>$model,'placeholder'=>'Enter Model','readonly' => 'readonly')) ?>

                </div>

                <div class="form-group col-md-4">

                  <?php echo form_label('Body Type','body type',$lblAttributes); ?>
                  <?php echo form_input(array('type'=>'text','class'=>'form-control','id'=>'body_type','name'=>'body_type','value'=>$body_type, 'placeholder'=>'Enter Body Type','readonly' => 'readonly')); ?>

                </div>

              </div>

              <div class="form-row">

                <div class="form-group col-md-4">

                  <?php echo form_label('Engine Capacity', 'Engine Capacity', $lblAttributes); ?>
                  <?php echo form_input(array('type'=>'text','class'=>'form-control','id'=>'engine_capacity','name'=>'engine_capacity','value'=>$engine_capacity,'Placeholder'=>'Enter Engine Capacity','readonly' => 'readonly')); ?>

                </div>

                <div class="form-group col-md-4">

                  <?php echo form_label('Engine Power','Engine Power',$lblAttributes); ?>
                  <?php echo form_input(array('type'=>'text','class'=>'form-control','id'=>'engine_power','name'=>'engine_power','value'=>$engine_power,'placeholder'=>'Enter Engine power','readonly' => 'readonly')); ?>

                </div>

                <div class="form-group col-md-4">

                  <?php echo form_label('Condition When Imported','Condition When Imported',$lblAttributes); ?>
                  <?php echo form_input(array('type'=>'text','class'=>'form-control','id'=>'condition_import','name'=>'condition_import','value'=>$condition_when_imported,'Placeholder'=>'Enter Imported Condition','readonly' => 'readonly')); ?>

                </div>

              </div>

              <div class="form-row">

                <div class="form-group col-md-4">

                  <?php echo form_label('Gearbox Type','Gearbox Type',$lblAttributes); ?>
                  <?php echo form_input(array('type'=>'text','class'=>'form-control','id'=>'gearbox_type','name'=>'gearbox_type','placeholder'=>'Enter Gearbox Type','value'=>$gearbox_type,'readonly' => 'readonly')); ?>

                </div>

                <div class="form-group col-md-4">

                  <?php echo form_label('Main Color','Main Color',$lblAttributes); ?>
                  <?php echo form_input(array('type'=>'text','class'=>'form-control','id'=>'main_color','name'=>'main_color','placeholder'=>'Enter Main Color','value'=>$main_color,'readonly' => 'readonly')); ?>

                </div>

                <div class="form-group col-md-4">

                  <?php echo form_label('Pcode','pcode',$lblAttributes); ?>
                  <?php echo form_input(array('type'=>'text','class'=>'form-control','id'=>'pcode','name'=>'pcode','value'=>$pcode,'placeholder'=>'Enter Pcode','readonly' => 'readonly')); ?>

                </div>

              </div>

              <?php } } ?>


              <?php echo form_close(); ?>

            </div>

          </div>

        </div>

        <!-- Save Button row -->

      </div>

    </div>

  </div>

  </div>

 <!-- /.container-fluid -->

        </div>

      </div>

   </div>

</div>

</div>






