<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content');  ?>

<div>

  <!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Estimation Request &nbsp<b>"<?php echo $requestor['request_no'] ?>"</b> </h1>
  </div>

  <div class="row">

    <!-- Left Column -->
    <div class="col-lg-3 mb-4">

      <a id="edit_job_request" href="javascript:void(0);" class="btn btn-md btn-warning btn-block  mb-4">Edit</a>

      <!-- Left Other HTML -->

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Pages</h6>

        </div>

        <div class="card-body">

          <div class="vertical-menu iconNone">

            <?php

            switch ($requestor['status']) {

              case '1':
                echo "<a id='about' href='javascript:void(0)'>About<span class='badge badge-primary'>Pending</span></a>";
                break;

              case '2':
                echo "<a id='about' href='javascript:void(0)'>About<span class='badge badge-success'>Progress</span></a>";
                break;

              case '3':
                echo "<a id='about' href='javascript:void(0)'>About<span class='badge badge-warning'>Completed</span></a>";
                break;

              default:
                echo "<a id='about' href='javascript:void(0)'>About<span class='badge badge-danger'>Finish</span></a>";
                break;
            }

            ?>

            <a id="vehicle" href="javascript:void(0)">Vehicle<span class="badge badge-danger"><?php echo $requestor['vehicle']; ?></span></a>

            <a id="garage" href="javascript:void(0)">Garage<span class="badge badge-success"><?php echo $requestor['garage']; ?></span></a>

            <a href="#">Insurance Details<span class="badge badge-primary"></span></a>

            <a id="persons" href="javascript:void(0)">Persons <span class="badge badge-primary" style="font-size: 15px;"></span></a>

            <a id="docs" href="javascript:void(0)">Documents <span class="badge badge-primary" style="font-size: 15px;"></span></a>

            <?php

            if (!empty($job_request_data)) {  ?>

              <a id="assesment" href="javascript:void(0)">Assesments<span class="badge badge-primary" style="font-size: 15px;"></span></a>

              <a id="parts" href="javascript:void(0)">Parts <span class="badge badge-primary" style="font-size: 15px;"></span></a>

              <a id="labours" href="javascript:void(0)">Labours<span class="badge badge-primary" style="font-size: 15px;"></span></a>

            <?php } ?>

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

            <a id="requests" href="<?php echo base_url('jobsestimation'); ?>"> <i class="fa fa-file" aria-hidden="true"></i>&nbspRequests<span class="badge badge-primary"></span>
            </a>

            <?php

            $report_link = base_url('requests/estimation_report') . '/' . $requestor['id'];

            switch ($requestor['status']) {

              case '1':
                echo "<a href='javascript:void(0);' id='status_inprogress'><i class='fa fa-spinner' aria-hidden='true'></i>&nbspIn progress<span class='badge badge-primary fa fa-arrow-right'></span>
                </a>";
                break;

              case '2':
                echo "<a href='javascript:void(0);' id='status_inprogress'><i class='fa fa-arrow-right' aria-hidden='true'></i>&nbspComplete<span class='badge badge-primary fa fa-arrow-right'></span>
                  </a>";
                break;

              case '3':
                echo "<a href='" . $report_link . "' target='_blank'><i class='fa fa-file-pdf-o' aria-hidden='true' style='font-size:19px;color:red'></i>&nbspReport<span class='badge badge-primary fa fa-arrow-right'></span>
                  </a>";
                break;

              default:
                echo "<a href='javascript:void(0);' id='status_inprogress'><i class='fa fa-arrow-right' aria-hidden='true'></i>&nbspN/A<span class='badge badge-primary fa fa-arrow-right'></span>
                </a>";
                break;
            }  ?>


            <a href="javascript:void(0);">
              <i class="fa fa-plus" aria-hidden="true"></i>&nbspPictures<span class="badge badge-primary fa fa-arrow-right"></span>
            </a>

            <a href="javascript:void(0);">
              <i class="fa fa-plus" aria-hidden="true"></i>&nbspNotifications<span class="badge badge-primary"></span>
            </a>

            <?php if (!empty($requestor['assign_id'])) { ?>

              <a href="#" id="notes">

                <i id='icon' class="fa fa-minus" aria-hidden="true"></i>&nbspNote<span class="badge badge-primary fa fa-arrow-right"></span></a>

              <div style="background-color: #808080;padding:5px 5px 5px 5px;" id='assign_notes'><?php echo $requestor['assign_note']; ?></div>

            <?php } ?>

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

                    case '1':
                      echo "<td><button class='btn btn-primary' disabled>Pending</button></td>";
                      break;

                    case '2':
                      echo "<td><button class='btn btn-success' disabled>Progress</button></td>";
                      break;

                    case '3':
                      echo "<td><button class='btn btn-warning' disabled>Completed</button></td>";
                      break;

                    default:
                      echo "<td><button class='btn btn-secondry' disabled>Finish</button></td>";
                      break;
                  }

                  ?>

                </tr>

                <tr>

                  <td> <strong>Created</strong> </td>

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
                <td><strong>Assigned By</strong></td>
                <td><?php echo $requestor['assessor']; ?></td>
              </tr>

              <tr>
                <td><strong>Vehicle</strong></td>
                <td><?php echo $requestor['vehicle']; ?></td>
              </tr>

              <tr>
                <td><strong>Garage</strong></td>
                <td><?php echo $requestor['garage']; ?></td>
              </tr>

              <tr>
                <td><strong>Assessor</strong></td>
                <td><?php echo $requestor['assessor']; ?></td>
              </tr>

              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>

    <!-- Assign Jobs fields  -->

    <!-- Assign Tab starts -->

    <div class="col-lg-9 mb-4" id="assign_jobs" style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-body">

          <div class="col-lg-12 mb-4">

            <div class="tabbable-wrapper">

              <ul class="nav nav-tabs">

                <li class="active"><a data-toggle="tab" href="#assignjob">Assign</a></li>

                <li><a data-toggle="tab" href="#job_estimation">Estimation</a></li>

                <li><a data-toggle="tab" href="#job_damage">Damage</a></li>

                <li><a data-toggle="tab" href="#job_parts">Part</a></li>

                <li><a data-toggle="tab" href="#job_labours">Labour</a></li>

                <li><a data-toggle="tab" href="#job_loss">Total Loss</a></li>

                <li><a data-toggle="tab" href="#assign_job_remarks">Remark</a></li>

                <li><a data-toggle="tab" href="#job_document">Document</a></li>

              </ul>


              <?php

              $frmattribute = [
                'id' => 'garage_create',
                'method' => 'post',
              ];

              echo form_open('Jobestimation/job_request_store', $frmattribute);

              echo form_input(array('type' => 'hidden', 'id' => 'request_id', 'name' => 'request_id', 'value' => $requestor['id']));

              echo form_input(array('type' => 'hidden', 'id' => 'assign_id', 'name' => 'assign_id', 'value' => $requestor['assign_id']));

              ?>

              <div class="tab-content">

                <div id="assignjob" class="tab-pane fade in active">

                  <?php echo $this->include('job_requests/assignjob'); ?>

                </div>

                <div id="job_estimation" class="tab-pane fade">

                  <?php echo $this->include('job_requests/assign_jobestimation'); ?>

                </div>

                <div id="job_damage" class="tab-pane fade">

                  <?php echo $this->include('job_requests/assign_damage_area'); ?>

                </div>

                <div id='job_parts' class="tab-pane fade">

                  <?php echo $this->include('job_requests/assign_jobparts'); ?>

                </div>

                <div id="job_labours" class="tab-pane fade">

                  <?php echo $this->include('job_requests/assign_labours'); ?>

                </div>

                <div id="job_loss" class="tab-pane fade">

                  <?php echo $this->include('job_requests/assign_job_loss'); ?>

                </div>

                <div id="assign_job_remarks" class="tab-pane fade">

                  <?php echo $this->include('job_requests/assign_job_remarks'); ?>

                </div>

                <div id="job_document" class="tab-pane fade">

                  <?php echo $this->include('job_requests/assign_document'); ?>

                </div>


              </div>

              <?php echo form_close(); ?>

            </div>

          </div>

        </div>

      </div>

    </div>

    <!-- Assign Job fields -->

  </div>

  <?php echo $this->endSection();  ?>