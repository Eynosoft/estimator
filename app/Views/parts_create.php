<!-- Content Column -->
<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content'); ?>

<div class="container-fluid">

  <div class="row">
    <div class="col-lg-12 mb-4">
      <!-- Project Card Example -->
      <div class="card shadow">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Parts</h6>

        </div>

        <?php

        $lblAttributes = ['class' => 'fieldLabel mb-1'];

        $frmattribute = [
          'id' => 'part_create',
          'method' => 'post',
        ];

        echo form_open('parts/savedata', $frmattribute);


        ?>

        <div class="card-body">


          <div id="inputFormRow">

            <div class="form-row">

              <div class="form-group col-md-12">

                <?php

                $part_list_url =  base_url('parts/partslist');

                ?>

                <?php echo form_input(array('type'=>'hidden','name'=>'part_list','id'=>'part_list_url','value'=>$part_list_url)); ?>

                <?php echo form_label('Part name', 'Part name', $lblAttributes); ?>
                <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'part_name', 'name' => 'part_name[]', 'placeholder' => 'Enter Part Name', 'value' => '')); ?>
                <?php if (isset($validation)) { ?>
                  <div class='alert alert-danger mt-2'>
                    <?= $validation->getError('part_name'); ?>
                  </div>
                <?php
                }
                ?>
              </div>

            </div>

            <div class="form-row">

              <div class="form-group col-md-12">

              <label class="label-control">Part Note</label>

                <?php

                $options = [
                  'name'        => 'part_note[]',
                  'id'          => 'sysnotes_descriptions',
                  'value'       => '',
                  'rows'        => '3',
                  'cols'        => '3',
                  'class'       => 'form-control'
                ];
                echo form_textarea($options);

                ?>

              </div>

            </div>

          </div>

          <div id="newRow"></div>

          <button id="addRow" type="button" class="col-md-12 btn btn-info">Add More Parts</button>

        </div>

      </div>

      <div class="col-lg-12 mb-4">

        <?php

        echo form_input(array('type' => 'submit', 'class' => 'btn btn-md btn-primary', 'id' => 'saveform', 'value' => 'Save')) ?>

      </div>

    <?php echo form_close(); ?>

    </div>

  </div>

</div>

</div>

<?php echo $this->endSection(); ?>