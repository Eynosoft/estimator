<br>

<div class="col-md-12">
  <div class="row">
    <div class="col-md-6" style="text-align: left;">
      <h4>List Documents</h4>
    </div>
  </div>
</div>

<br>

<div class="row">

  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Settings</h6>
      </div>
     
  <?php

      if(!empty($customer_doc)) {

        $customer_id = $customer_doc['customer_id'];
        if(!empty($customer_doc['doc_type']))
        {
          for($i=0; $i < count($customer_doc['doc_type']); $i++) {

            if(isset($customer_doc['doc_type'][$i]) && ($customer_doc['doc_type'][$i] == 'image'))
            {
             $image = 'checked'; 
            }
            elseif(isset($customer_doc['doc_type'][$i]) && ($customer_doc['doc_type'][$i] == 'document'))
            {
             $document = 'checked'; 
            }
            elseif(isset($customer_doc['doc_type'][$i]) && ($customer_doc['doc_type'][$i] == 'timing'))
            {
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
            'id' => 'customer_doc',
            'method' => 'post',
          ];

          echo form_open('Customer/updateDoc'.'/'.$customer_id, $frmattribute);

          ?>

          <?php

          echo form_input(array('type' => 'hidden', 'name' => 'customer_id', 'value' => $customer_id));

          ?>

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <tbody>

              <tr>

                <td style="width: 80%;">Images As Attachment </td>

                <td>

                  <input type="checkbox" <?php echo $image; ?> data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" name="files[]" data-offstyle="danger" value="image">

                </td>

              </tr>

              <tr>

                <td> Documents As Attachment </td>

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

          <?php echo form_submit(array('type' => 'submit', 'class' => 'btn btn-md btn-primary', 'id' => 'savedoctype', 'value' => 'Save')) ?>

          <?php

          echo form_close();

          ?>

        </div>

      </div>

    </div>

  </div>

  <!-- Save Button row -->

</div>

<!-- Modal -->

<style>
  .kv-file-upload {
    display: none !important;
  }
</style>