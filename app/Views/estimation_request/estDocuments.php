<!-- Content Column -->
<div class="row">

  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->

    <div class="card shadow row">

      <div class="card-header py-3" style="height: 67px;">

        <div class="row">

          <div class="col-md-6" style="text-align: left;">
            <h6 class="m-0 font-weight-bold text-primary">Documents</h6>
          </div>

          <div class="col-md-6" style="text-align: right;">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#documentsModal">Add Documents</button>
          </div>

        </div>

      </div>

    <div class="card-body">
        
      <div class="table-responsive">

          <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="documents">

            <thead>
              <tr>
                <th>S.no.</th>
                <th>View Document</th>
                <th>Document Type</th>
              </tr>
            </thead>

            <tbody>

              <tr>
                <td>1</td>
                <td>Dummy Image</td>
                <td>png</td>
              </tr>
              <tr>
                <td>1</td>
                <td>Dummy Image</td>
                <td>png</td>
              </tr>
              <tr>
                <td>1</td>
                <td>Dummy Image</td>
                <td>png</td>
              </tr>
              <tr>
                <td>1</td>
                <td>Dummy Image</td>
                <td>png</td>
              </tr>
            </tbody>

          </table>
      
      </div>

      </div>

    </div>

  </div>

</div>

<!-- Modal code for the popup job request -->

<div id="documentsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Add Documents</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">

        <div class="form-group">
          <div class="dropzone dz-clickable" id="myDrop">
            <div class="dz-default dz-message" data-dz-message="">
              <span>Click Here for Browse or <br> Drop files here to upload</span>
            </div>
          </div>
        </div>

        <input type="hidden" id="redirectDocUrl" name="redirectDocUrl" value="<?php echo $redirectUrl ?>">

        <div class="form-group">
          <button type="submit" id="add_file" class="btn btn-primary" name="submit"><i class="fa fa-upload"></i> Upload Files</button>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Modal code for the popups job request -->


<?php

$method = base_url('requestor/insertDocuments') . '/' . $claim_id;

?>

<link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>

<script>
  //Dropzone script
  $(document).ready(function() {
    $("#add_file").on('click', function(e) {
      e.preventDefault();
    })
  });

  Dropzone.autoDiscover = false;
  var myDropzone = new Dropzone("div#myDrop", {
    paramName: "files", // The name that will be used to transfer the file
    addRemoveLinks: true,
    timeout: 200000,
    uploadMultiple: true,
    autoProcessQueue: false,
    parallelUploads: 50,
    maxFilesize: 1024, // MB
    acceptedFiles: ".png, .jpeg, .jpg, .gif, .pdf , .doc, .docx , .xls, .xlsx",
    url: "<?php echo $method; ?>",
  });

  /* Add Files Script*/
  myDropzone.on("success", function(file, message) {
    //$("#msg").html(message);
    swal({
        title: "File Inserted Successfully..!",
        text: "Message!",
        type: "success",
        dangerMode: true,
        buttons: true
      },

      function() {
        $(".close").trigger('click');
        window.location.href = document.getElementById("redirectDocUrl").value;
      }
    );
  });

  myDropzone.on("error", function(data) {
    $("#msg").html('<div class="alert alert-danger">There is some thing wrong, Please try again!</div>');
  });

  myDropzone.on("complete", function(file) {
    myDropzone.removeFile(file);
  });

  $("#add_file").on("click", function() {
    myDropzone.processQueue();
  });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
      $('#documents').DataTable();
  });
</script>