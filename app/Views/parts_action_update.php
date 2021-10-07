<!-- Content Column -->
<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content'); ?>

<div class="container-fluid">


  <div class="row">
    <div class="col-lg-12 mb-4">
      <!-- Project Card Example -->
      <div class="card shadow">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Parts Action</h6>

        </div>

        <?php

        $lblAttributes = ['class' => 'fieldLabel mb-1'];

        $frmattribute = [
          'id' => 'part_create',
          'method' => 'post',
        ];

        echo form_open('parts/partactionsave/'.'/'.$parts_action_data['id'], $frmattribute);

        ?>

        <div class="card-body">

          <div id="inputFormRow">

            <div class="form-row">

             <?php echo form_input(array('type'=>'hidden','id'=>'part_id','name'=>'id', 'value'=>$parts_action_data['id'])); ?>

              <div class="form-group col-md-12">

                <?php echo form_label('Part Action name', 'Part Action name', $lblAttributes); ?>
                <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'part_name', 'name' => 'part_action_name', 'placeholder' => 'Enter Part Action Name', 'value' =>$parts_action_data['part_action_name'])); ?>
                <?php if (isset($validation)) { ?>
                  <div class='alert alert-danger mt-2'>
                    <?= $validation->getError('part_name'); ?>
                  </div>
                <?php
                }
                ?>
              </div>

            </div>

          </div>

        </div>

      </div>

      <div class="col-lg-12 mb-4">

      <?php

      echo form_input(array('type' => 'submit', 'class' => 'btn btn-md btn-primary', 'id' => 'saveform', 'value' => 'Save')) 
      
      ?>

      </div>

  <?php echo form_close(); ?>

  </div>

</div>

</div>

</div>


<?php echo $this->endSection(); ?>