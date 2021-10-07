<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content');  ?>

<div class="container-fluid">
  <!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">Estimation Request <small>About</small> </h1>

  </div>

  <div class="row">
    <!-- Left Column -->
    <div class="col-lg-3 mb-4">

      <a href="<?php echo base_url('requests/update') . '/' . $requestor['id']; ?>" class="btn btn-md btn-warning btn-block  mb-4">Edit</a>

      <!-- Left Other HTML -->

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Pages</h6>

        </div>

        <div class="card-body">

          <div class="vertical-menu iconNone">

            <a id="about" href="javascript:void(0)">About<span class="badge badge-primary"></span></a>

            <a href="#">Insurance Details<span class="badge badge-primary"></span></a>

            <a id="persons" href="javascript:void(0)">Persons <span class="badge badge-primary" style="font-size: 15px;"><?php echo count($person_data); ?></span></a>

            <a id="docs" href="javascript:void(0)">Documents <span class="badge badge-primary" style="font-size: 15px;"><?php echo count($person_doc); ?></span></a>

            <a href="#"><strong>Timeline <span class="badge badge-primary" style="font-size: 15px;">0</span></strong></a>

          </div>

        </div>

      </div>
      
      <div class="card primary mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Actions</h6>

        </div>

        <div class="card-body">

          <div class="vertical-menu iconNone">

            <a id="assignjobestimation" href="javascript:void(0)"> <i class="fa fa-arrow-right" aria-hidden="true"></i>&nbspAssign<span class="badge badge-primary fa fa-arrow-right"></span></a>

            <a href="#"> <i class="fa fa-arrow-right" aria-hidden="true"></i>&nbspWithdraw<span class="badge badge-primary fa fa-arrow-right"></span></a>

            <!-- Show Notes Data Dynamically -->

            <?php if (!empty($requestor['assign_id'])) { ?>

              <a href="#" id="notes">

                <i id='icon' class="fa fa-minus" aria-hidden="true"></i>&nbspNote<span class="badge badge-primary fa fa-arrow-right"></span></a>

              <div style="background-color: #808080;padding:5px 5px 5px 5px;" id='assign_notes'><?php echo $requestor['assign_note']; ?></div>

            <?php } ?>

            <!-- Show Notes data Dynamically Ends -->

            <a href="<?php echo base_url('requests/delete_request') . '/' . $requestor['id']; ?>">

              <i class="fa fa-trash" aria-hidden="true"></i>&nbspDelete<span class="badge badge-primary fa fa-arrow-right"></span></a>

          </div>

        </div>

      </div>

    </div>

    <!-- Right Column -->
    <!-- About tabs Starts -->

    <div class="col-lg-9 mb-4" id="about_requests">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">About</h6>

        </div>

        <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

              <tbody>

                <tr>

                  <td><strong>Status</strong></td>

                  <?php
                  
                  switch ($requestor['status']) {

                    case '0':
                      echo "<td><button class='btn btn-danger' disabled>Unassigned</button></td>";
                      break;

                    default:
                      echo "<td><button class='btn btn-success' disabled>Assigned</button></td>";
                      break;
                  }
                  
                  ?>

                </tr>

                <tr>

                  <td><strong>Created</strong></td>

                  <?php

                    $originalDate = $requestor['created_at'];
                    $newDate = date("d/m/Y h:i:sa", strtotime($originalDate));

                  ?>

                  <td><?php echo $newDate; ?></td>

                </tr>

                <tr>


                  <?php if (!empty($requestor['assign_id'])) {  ?>

                    <td><strong>Visit Date</strong></td>

                    <td><?php echo $requestor['visit_date']; ?></td>

                </tr>

              <?php } ?>

              <tr>

                <td><strong>Created By</strong></td>
                <td>-</td>

              </tr>

              <tr>

                <td><strong>Request Number</strong></td>
                <td><?php echo $requestor['request_no']; ?></td>

              </tr>

              <tr>
                <td><strong>Customer</strong></td>
                <td><?php echo $requestor['customer']; ?></td>
              </tr>


              <tr>
                <td><strong>Requested</strong></td>
                <td><?php echo $requestor['requested_date']; ?></td>
              </tr>

              <tr>
                <td><strong>Requested By</strong></td>
                <td><?php echo $requestor['requestor']; ?></td>
              </tr>

              <tr>

                <td><strong>Vehicle</strong></td>

                <td><?php echo $requestor['vehicle']; ?></td>

              </tr>

              <tr>

                <td><strong>Garage</strong></td>

                <td><?php echo $requestor['garage']; ?></td>

              </tr>

              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>

    <!-- About Tab Ends  -->
    <!-- Assign Tab starts -->

    <div class="col-lg-9 mb-4" id="assign" style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-body">

          <div class="col-lg-12 mb-4">

            <div class="tabbable-wrapper">

              <ul class="nav nav-tabs">

                <li class="active"><a data-toggle="tab" href="#assignjob">Assign Job</a></li>

                <li><a data-toggle="tab" href="#assignnotes">Assign Notes</a></li>

              </ul>


              <?php

              $frmattribute = [
                'id' => 'garage_create',
                'method' => 'post',
              ];

              echo form_open('requests/assignJob', $frmattribute);

              ?>

              <?php

              form_input(array('type' => 'hidden', 'id' => 'request_id', 'name' => 'request_id', 'value' => $requestor['id']));

              ?>

              <div class="tab-content">

                <div id="assignjob" class="tab-pane fade in active">

                  <?php echo $this->include('requests/assignjob'); ?>

                </div>


                <div id="assignnotes" class="tab-pane fade">

                  <?php echo $this->include('requests/assignnotes'); ?>

                </div>

              </div>

              <?php echo form_close(); ?>

            </div>

          </div>

        </div>

      </div>

    </div>

    <!-- Assign Data Ends -->

    <!-- Person data starts -->

    <div class="col-lg-9 mb-4" style="display: none;" id="person">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Persons Data </h6>

        </div>

        <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="person_data" width="100%" cellspacing="0">

              <thead>

                <tr>

                  <th>S.no.</th>

                  <th>Person Type </th>

                  <th>Persson Name</th>

                  <th>Person Number</th>

                </tr>

              </thead>

              <tbody>

                <?php

                $i = 1;

                foreach ($person_data as $persons) {  ?>

                  <tr>

                    <td><?php echo $i; ?></td>

                    <td><?php echo $persons['person_type']; ?></td>

                    <td><?php echo $persons['person_name']; ?></td>

                    <td><a class="btn btn-primary btn-sm" href="tel:<?php echo $persons['person_number']; ?>"><?php echo $persons['person_number']; ?></a></td>

                  </tr>

                <?php $i++;
                }

                ?>

              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>

    <!-- Person data ends -->
    <!-- document Data starts -->

    <div class="col-lg-9 mb-4" id="document" style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Documents</h6>

        </div>

        <div class="card-body">

          <div class="row">

            <?php
            $j = 0;
            foreach ($person_doc as $docs) { ?>

              <div class="card">

                <div class="card-body">
                  <div>
                    <img src="<?php echo base_url(); ?>/assets/uploads/<?php echo $docs['document_name']; ?>" height="145" width="154">
                  </div>
                  <hr>

                  <div>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#editModal<?php echo $j; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal<?php echo $j; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                  </div>
                </div>

              </div>

            <?php

              $j++;
            }

            ?>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- Document Data Ends -->
  <!-- /.container-fluid -->

</div>

<!-- End of Main Content -->

<?php

$i = 0;

foreach ($person_doc as $person_image) { ?>

  <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Documents Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="<?php echo base_url(); ?>/assets/uploads/<?php echo $person_image['document_name']; ?>" height="350" width="470">
        </div>
      </div>
    </div>
  </div>

<?php $i++;

}

?>

<?php

$k = 0;

foreach ($person_doc as $person_image) { ?>

  <div class="modal fade" id="editModal<?php echo $k; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Document Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <div class="form-group">
            <div class="dropzone dz-clickable" id="myDropdoc">
              <div class="dz-default dz-message" data-dz-message="">
                <span>Click Here for Browse or <br> Drop files here to upload</span>
              </div>
            </div>
          </div>

          <input type="hidden" name="doc_id" id="doc_id" value="<?php echo $person_image['id']; ?>">

          <div class="form-group">
            <button type="submit" id="add_file_doc" name="save_request" class="btn btn-primary">Save</button>
          </div>

        </div>

      </div>
    </div>
  </div>

<?php

  $k++;
}

?>

<?php

$method = base_url('requests/updateDoc');

?>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Dropzone CSS and JS -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>

<script>
  //Dropzone script

  $(document).ready(function() {
    $("#add_file_doc").on('click', function(e) {
      e.preventDefault();
    });
  });

  var id = $('#doc_id').val();

  Dropzone.autoDiscover = false;

  var myDropzone = new Dropzone("div#myDropdoc", {

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

      title: "Request Data Inserted Successfully..!",
      text: "Message!",
      type: "success",
      dangerMode: true,
      buttons: true

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

<?php echo $this->endSection();  ?>