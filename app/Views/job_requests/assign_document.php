<!-- Content Column -->
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow row">

      <div class="card-header py-3" style="height: 67px;">
        <div class="row">
          <div class="col-md-6" style="text-align: left;">
            <h6 class="m-0 font-weight-bold text-primary">Add Documents</h6>
          </div>
        </div>
      </div>

      <div class="card-body">

        <div class="form-group">
          <div class="dropzone dz-clickable" id="myDrop">
            <div class="dz-default dz-message" data-dz-message="">
              <span>Click Here for Browse or <br> Drop files here to upload</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <button type="submit" id="add_file" name="save_request" class="btn btn-primary">Save</button>
        </div>

        <!-- <div class="form-group">
          <button type="submit" id="add_file" class="btn btn-primary" name="submit"><i class="fa fa-upload"></i> Upload Files</button>
        </div> -->

      </div>
    </div>
  </div>
</div>
</div>

<?php

if(!empty($job_request_data['job_id'])){
$method = base_url('Jobsestimation/job_request_store').'/'.$job_request_data['job_id'];
}else{
  $method = base_url('Jobsestimation/job_request_store');
}

$method_redirect = base_url('requests/viewjob') .'/'.$requestor['id'];

?>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Dropzone CSS and JS -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>

<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'>
</script>

<script>

  //Dropzone script

  $(document).ready(function() {
    $("#add_file").on('click', function(e) {
      e.preventDefault();
    });
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
  
  myDropzone.on('sending', function(file, xhr, formData) {
    var data = $('form').serializeArray();
    $.each(data, function(key, el) {
      formData.append(el.name, el.value);
    });
  });

  /* Add Files Script*/

  myDropzone.on("success", function(file, message) {
    //$("#msg").html(message);
    swal({
      title: "Job Request Data Inserted Successfully..!",
      text: "Message!",
      type: "success",
      dangerMode: true,
      buttons: true
    }).then(function() {
      window.location.href = "<?php echo $method_redirect; ?>";
    });
  });

  myDropzone.on("error", function(data) {
    $("#msg").html('<div class="alert alert-danger">There is some thing wrong, Please try again..!</div>');
  });

  myDropzone.on("complete", function(file) {
    myDropzone.removeFile(file);
  });

  $("#add_file").on("click", function() {
    myDropzone.processQueue();
  });

  
</script>