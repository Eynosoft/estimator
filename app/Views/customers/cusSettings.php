<br>
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Settings</h6>
      </div>

      <div class="card-body">
        
        <div class="table-responsive">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <tbody>

              <tr>

                <td style="width: 80%;">Images As Attachment </td>

                <td>

                  <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" name="files[]" data-offstyle="danger" value="image">

                </td>

              </tr>

              <tr>

                <td> Documents As Attachment </td>

                <td>

                  <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" name="files[]" data-offstyle="danger" value="document">

                </td>

              </tr>

              <tr>

                <td>Timings on Report</td>

                <td style="width: 20px;">
                  <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" name="files[]" data-offstyle="danger" value="timing">
                </td>

              </tr>

            </tbody>

          </table>

          <?php // echo form_submit(array('type'=> 'submit','class' => 'btn btn-md btn-primary', 'id'=> 'savedoctype', 'value' => 'Save'))  
          ?>

        </div>

      </div>

    </div>

  </div>

  <div class="col-lg-12 mb-4">

  <?php echo form_submit(array('type' => 'submit', 'class' => 'btn btn-md btn-primary', 'id' => 'savecustomer', 'value' => 'Save')) ?>

  </div>

  <!-- Save Button row -->

</div>

<!-- Modal -->
<style>
  .kv-file-upload {
    display: none !important;
  }
</style>