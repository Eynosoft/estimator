<!-- Content Column -->
<!-- <button style="text-align: right;" type="button" class="btn btn-info" data-toggle="modal" data-target="#documentsModal">Add Documents</button> -->

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

                <td style="width: 96%;">Images As Attachment </td>
                <td><input type="checkbox"></td>

              </tr>

              <tr>

                <td>Documents As Attachment</td>

                <td><input type="checkbox"></td>

              </tr>

            </tbody>

          </table>

        </div>

      </div>

    </div>

  </div>

  <!-- Save Button row -->

  <div class="col-lg-12 mb-4">

    <button type="button" class="btn btn-md btn-primary">Save</button>

  </div>

</div>

<!-- Modal -->
<style>

.kv-file-upload
{
    display: none !important;
}

</style>

<div id="documentsModal" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Add Documents</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>      
            
            <div class="modal-body">

                <?php
              
                $frmAttributes =  array(
                    'id' => 'customerdoc',
                    'method' => 'post',
                    'class' => 'claimcity'
                );


                ?>
               
                <?php echo form_open_multipart('Customer/insertDocuments', $frmAttributes); ?>

                <?php echo form_input(array('type' => 'hidden', 'class' => 'form-control', 'id' => 'cid', 'name' => 'cid', 'value' => $cid)); ?>


                <div class="form-row">
                    <div class="form-group col-md-12">
                        <?php echo form_label('<strong>Upload File</strong>'); ?>
                        <div class="file-loading">
                            <?php echo form_input(array('type' => 'file', 'class' => 'file form-control', 'id' => 'file-5', 'name' => 'upload_file[]','multiple'=> '', 'placeholder' => 'Upload File', 'data-upload-url' => '#', 'data-theme' => 'fa')); ?>
                        </div>
                    </div>
                </div>
                
                <!-- Save Button row -->

                <div class="form-row">
                    <div class="col-lg-12 mb-4">
                        <?php echo form_submit(array('class' => 'btn btn-md btn-primary', 'value' => 'Save')); ?>
                    </div>
                </div>

                <?php echo form_close(); ?>
                
            </div>
        </div>
    </div>
</div>

