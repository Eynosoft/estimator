<!-- Content Column -->
<div class="row">

  <div class="col-lg-12 mb-4">

    <!-- Project Card Example -->

    <div class="card shadow">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Settings</h6>

      </div>

      <?php

      if (!empty($garage_doctype)) {
        $gid = $garage_doctype['gid'];
        if (!empty($garage_doctype['doc_type'])) {
          for ($i = 0; $i < count($garage_doctype['doc_type']); $i++) {
            if (isset($garage_doctype['doc_type'][$i]) && ($garage_doctype['doc_type'][$i] == 'image')) {
              $image = 'checked';
            } elseif (isset($garage_doctype['doc_type'][$i]) && ($garage_doctype['doc_type'][$i] == 'document')) {
              $document = 'checked';
            } elseif (isset($garage_doctype['doc_type'][$i]) && ($garage_doctype['doc_type'][$i] == 'timing')) {
              $timing = 'checked';
            }
          }
        }
      }

      ?>

      <div class="card-body">

        <div class="table-responsive">

          <?php

          $lblAttributes = ['class' => 'fieldLabel mb-1'];

          $frmattribute = [
            'id' => 'garage_doc',
            'method' => 'post',
          ];

          echo form_open('garage/updateDoc' . '/' . $gid, $frmattribute);

          ?>

          <?php

          echo form_input(array('type' => 'hidden', 'name' => 'gid', 'value' => $gid));

          ?>


          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <tbody>

              <tr>

                <td style="width: 96%;">Images As Attachment </td>

                <td>
                  <input type="checkbox" <?php echo $image; ?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" name="files[]" data-offstyle="danger" value="image">
                </td>

              </tr>

              <tr>

                <td>Documents As Attachment</td>

                <td>
                  <input type="checkbox" <?php echo $document; ?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" name="files[]" data-offstyle="danger" value="document">
                </td>

              </tr>

              <tr>

                <td>Timings on Report</td>

                <td style="width: 20px;">
                  <input type="checkbox" <?php echo $timing; ?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" name="files[]" data-offstyle="danger" value="timing">
                </td>

              </tr>

            </tbody>

          </table>

        </div>

      </div>


    <div class="col-lg-12 mb-4">

      <?php echo form_input(array('type'=>'submit','name'=>'updatedoc','id'=>'updatedoc','name'=>'updatedoc','value'=>'Save','class'=>'btn btn-md btn-primary')); ?>

    </div>

    <?php echo form_close(); ?>

    </div>

  </div>

  <!-- Save Button row -->

</div>