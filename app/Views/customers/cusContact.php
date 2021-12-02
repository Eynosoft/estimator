<!-- Content Column -->

<style>
  .bootstrap-tagsinput::input {
   width: 24em !important;
  }

</style>

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

      echo form_open('customer/store', $frmattribute);

    ?>

      <div class="card-body">

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Client name', 'Client name', $lblAttributes); ?>

            <?php

            echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'client_name', 'name' => 'client_name', 'placeholder' => 'Enter Client Name', 'value' => ''));

            ?>

            <?php if (isset($validation)) { ?>

              <div class='alert alert-danger mt-2'>
                <?= $validation->getError('client_name'); ?>
              </div>

            <?php

            }

            ?>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-12">

            <?php echo form_label('Locale', 'locale', $lblAttributes); ?>

            <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'locale', 'name' => 'locale', 'placeholder' => 'Enter Locale', 'value' => '')) ?>

            <span class="noteText">The language that reports will be generated with</span>

            <?php if(isset($validation)) { ?>

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

          <?php echo form_label('Report Password', 'Report Password', $lblAttributes); ?>

          <?php echo form_input(array('type' => 'password', 'class' => 'form-control', 'id' => 'report_pass', 'name' => 'report_pass', 'placeholder' => 'Report Password', 'value' => '')); ?>

            <span class="noteText">Password used to protect the report generated.</span>
            <?php if (isset($validation)) { ?>

              <div class='alert alert-danger mt-2'>
                <?= $validation->getError('report_pass'); ?>
              </div>

            <?php

            }

            ?>

          </div>

      </div>

        <div class="form-row">

          <div class="form-group col-md-6">

            <?php echo form_label('Emails', 'emails', $lblAttributes); ?><br>
            <input name="emails" id="customer_email_data" placeholder="Enter Email Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="form-control" value="" data-role="tagsinput" type="text"><br>
            <span class="text-danger">Seperate multiple emails with <b>Enter.</b> Key </span>
          </div>

          <!-- email with the saperation  -->
          <!-- Email with the saperation -->

          <div class="form-group col-md-6">

            <?php echo form_label('Mobile', 'mobile', $lblAttributes); ?><br>
            <input name="mobile" id="mobiles_data" class="form-control" value="" data-role="tagsinput" type="text" placeholder="Enter Mobile Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"><br>
            <span class="text-danger">Seperate multiple mobile numbers with <b>Enter.</b> Key.</span>
            <?php if (isset($validation)) { ?>

              <div class='alert alert-danger mt-2'>
                <?= $validation->getError('mobile'); ?>
              </div>

            <?php

            }

            ?>

          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-6">

          <?php echo form_label('Land Lines', 'land lines', $lblAttributes); ?>

          <?php echo form_input(array('type' => 'tel', 'class' => 'form-control', 'id' => 'land_line', 'name' => 'land_line', 'placeholder' => 'Enter Land Line', 'value' => '')); ?>

            <span class="noteText"></span>

            <?php if (isset($validation)) { ?>
              <div class='alert alert-danger mt-2'>
              <?= $validation->getError('land_line'); ?>
              </div>
            <?php
            }
            ?>
          </div>

          <div class="form-group col-md-6">

            <?php echo form_label('Faxes', 'faxes', $lblAttributes); ?><br>

            <?php // echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'faxes', 'name' => 'faxes', 'placeholder' => 'Enter Faxes', 'value' => '')); ?>

            <input name="faxes" id="fax_data" class="form-control" value="" data-role="tagsinput" type="text" placeholder="Enter Fax Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"><br>

            <span class="text-danger">Seperate multiple faxes numbers with <b>Enter</b> Key.</span>

            <?php if (isset($validation)) { ?>

              <div class='alert alert-danger mt-2'>

                <?= $validation->getError('faxes'); ?>

              </div>

          <?php echo form_input(array('type' => 'hidden', 'id' => 'customer_details_changed', 'name' => 'customer_details_changed', 'value' => '')); ?>

          <?php

          }

          ?>

          </div>

        </div>

        <!-- <div class="col-lg-12 mb-4">

        <?php

        //echo form_submit(array('type'=> 'submit','class' => 'btn btn-md btn-primary', 'id'=> 'savecustomer', 'value' => 'Save'))

        ?>

        <div class="change-message">You have unsaved changes.</div>
        </div> -->

      </div>

      <?php echo form_close(); ?>

    </div>
  </div>
</div>

    <script>
      $(function() {
        $('#mobiles_data').tagsinput({
          maxTags: 5
        });
      });
    </script>

    <script>
      $(function() {
        $('#fax_data').tagsinput({
          maxTags : 5
        });
      });
    </script>

    <script>
     $(function(){
     $('#customer_email_data').tagsinput({
      maxTags : 5
     });
    });
    </script>

