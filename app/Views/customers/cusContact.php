<!-- Content Column -->
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Contact</h6>

      </div>

      <?php 
      
        $lblAttributes = ['class' => 'fieldLabel mb-1']; 
        $frmattribute = [
              'id' => 'customer_create',
              'method' => 'post',
            ];
        
       echo form_open('Customer/Store',$frmattribute);

       if(!empty($customer))
       {
         foreach($customer as $cdata)
         {
          $id =  $cdata['id'] ;
          $client_name =$cdata['client_name'];
          $locale = $cdata['locale'];
          $report_password = $cdata['report_password'];
          $emails = $cdata['emails'];
          $mobile = $cdata['mobile'] ;
          $land_line = $cdata['land_line'] ;
          $fax = $cdata['fax'];

        ?>

      <div class="card-body">

        <?php //$validation = \Config\Services::validation(); ?>

        <div class="form-row">

          <?php
                    $data = [
                        'type'  => 'hidden',
                        'name' => 'id',
                        'value' => $id
                    ];

                    echo form_input($data);

                    ?>

          <div class="form-group col-md-12">

            <?php echo form_label('Client name', 'Client name', $lblAttributes); ?>

            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'client_name', 'name' => 'client_name', 'placeholder' => 'Enter Client Name','value' =>$client_name)); ?>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Locale', 'locale' , $lblAttributes); ?>

            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'locale', 'name' => 'locale', 'placeholder' => 'Enter Locale', 'value' => $locale)) ?>

            <span class="noteText">The language that reports will be generated with</span>

          </div>

        </div>


        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Report Password','Report Password', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'password', 'class' => 'form-control','id' => 'report_pass', 'name' => 'report_pass', 'placeholder' => 'Report Password', 'value' => $report_password)); ?>

            <span class="noteText">Password used to protect the report generated.</span>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label('Emails', 'emails', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'email', 'class' => 'form-control', 'id' => 'emails', 'name' => 'emails', 'placeholder' => 'Enter Emails', 'value' => $emails)); ?>

            <span class="noteText">Seperate multiple emails with comma.</span>

          </div>

          <div class="form-group col-md-6">

            <?php echo form_label('Mobile','mobile',$lblAttributes); ?>
            <?php  echo form_input(array('type' => 'tel', 'class'=> 'form-control', 'id' => 'mobile', 'name' => 'mobile', 'placeholder' => 'Enter Mobile', 'value' => $mobile)); ?>

            <span class="noteText">Seperate multiple mobile numbers with comma.</span>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label('Land Lines','land lines', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'tel', 'class' => 'form-control', 'id' => 'land_line', 'name'=> 'land_line', 'placeholder'=> 'Enter Land Line', 'value' => $land_line)); ?>

            <span class="noteText"></span>

          </div>


          <div class="form-group col-md-6">

            <?php echo form_label('Faxes','faxes', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'faxes', 'name'=> 'faxes', 'placeholder' => 'Enter Faxes', 'value' => $fax)); ?>

            <span class="noteText">Seperate multiple faxes numbers with comma.</span>

          </div>

        </div>

        <div class="col-lg-12 mb-4">

          <?php echo form_submit(array('type'=> 'submit','class' => 'btn btn-md btn-primary', 'id'=> 'savecustomer', 'value' => 'Save')) ?>

        </div>

      </div>

      <?php } }  else  { ?>


      <div class="card-body">

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Client name', 'Client name', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'client_name', 'name' => 'client_name', 'placeholder' => 'Enter Client Name','value' =>'')); ?>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('client_name');?>
            </div>
            <?php
              }
            ?>
          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Locale', 'locale' , $lblAttributes); ?>

            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'locale', 'name' => 'locale', 'placeholder' => 'Enter Locale', 'value' => '')) ?>

            <span class="noteText">The language that reports will be generated with</span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('locale'); ?>
            </div>
            <?php
              }
            ?>

          </div>

        </div>


        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Report Password','Report Password', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'password', 'class' => 'form-control','id' => 'report_pass', 'name' => 'report_pass', 'placeholder' => 'Report Password', 'value' => '')); ?>

            <span class="noteText">Password used to protect the report generated.</span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('report_pass');?>
            </div>
            <?php

              }

            ?>

          </div>

        </div>


        <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label('Emails', 'emails', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'email', 'class' => 'form-control', 'id' => 'emails', 'name' => 'emails', 'placeholder' => 'Enter Emails', 'value' => '')); ?>

            <span class="noteText">Seperate multiple emails with comma.</span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('email');?>
            </div>

            <?php

              }

            ?>

          </div>

          <div class="form-group col-md-6">

            <?php echo form_label('Mobile','mobile',$lblAttributes); ?>
            <?php  echo form_input(array('type' => 'tel', 'class'=> 'form-control', 'id' => 'mobile', 'name' => 'mobile', 'placeholder' => 'Enter Mobile', 'value' => '')); ?>

            <span class="noteText">Seperate multiple mobile numbers with comma.</span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('mobile');?>
            </div>
            <?php
              }
            ?>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label('Land Lines','land lines', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'tel', 'class' => 'form-control', 'id' => 'land_line', 'name'=> 'land_line', 'placeholder'=> 'Enter Land Line', 'value' => '')); ?>

            <span class="noteText"></span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('land_line');?>
            </div>
            <?php
              }
            ?>

          </div>


          <div class="form-group col-md-6">

            <?php echo form_label('Faxes','faxes', $lblAttributes); ?>
            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'faxes', 'name'=> 'faxes', 'placeholder' => 'Enter Faxes', 'value' => '')); ?>

            <span class="noteText">Seperate multiple faxes numbers with comma.</span>
            <?php if(isset($validation)) {?>
            <div class='alert alert-danger mt-2'>
              <?= $validation->getError('faxes');?>
            </div>
            <?php
              }
            ?>

          </div>

        </div>

        <div class="col-lg-12 mb-4">

          <?php echo form_submit(array('type'=> 'submit','class' => 'btn btn-md btn-primary', 'id'=> 'savecustomer', 'value' => 'Save')) ?>

        </div>

      </div>

      <?php } ?>


    </div>

  </div>

</div>