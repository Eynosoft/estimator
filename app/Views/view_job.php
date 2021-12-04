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

      <a data-id="job_request_form" href="javascript:void(0);" class="btn btn-md btn-warning btn-block  mb-4 view_job">Edit</a>

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
                echo "<a class='view_job' data-id='about' href='javascript:void(0)'>About<span class='badge badge-primary'>Pending</span></a>";
                break;

              case '2':
                echo "<a class='view_job' data-id='about' href='javascript:void(0)'>About<span class='badge badge-success'>Progress</span></a>";
                break;

              case '3':
                echo "<a class='view_job' data-id='about' href='javascript:void(0)'>About<span class='badge badge-warning'>Completed</span></a>";
                break;

              default:
                echo "<a class='view_job' data-id='about' href='javascript:void(0)'>About<span class='badge badge-danger'>Finish</span></a>";
                break;
            }

            ?>

            <a class="view_job" data-id="vehicle_section" href="javascript:void(0)">Vehicle<span class="badge badge-danger"><?php echo $requestor['vehicle']; ?></span></a>

            <?php if (!empty($requestor['garage_whole'][0])) { ?>
              <a class="view_job" data-id="garage_section" href="javascript:void(0)">Garage<span class="badge badge-success"><?php echo $requestor['garage']; ?></span></a>
            <?php } ?>

            <a class="view_job" data-id='insurance_section' href="#">Insurance Details<span class="badge badge-primary"></span></a>

            <a class="view_job" data-id="persons_sections" href="javascript:void(0)">Persons <span class="badge badge-primary" style="font-size: 15px;"><?php echo !empty($person_data) ? count($person_data) : '0'; ?></span></a>

            <?php if(!empty($job_request_data['job_request_documents'])) { ?>

            <a class="view_job" data-id="docs_section" href="javascript:void(0)">Documents <span class="badge badge-primary" style="font-size: 15px;"><?php echo !empty($job_request_data['job_request_documents']) ? count($job_request_data['job_request_documents']) : '0'; ?></span></a>

            <?php } ?>

            <?php

            if (!empty($job_request_data)) {  ?>

              <a class="view_job" data-id="assesment_sections" href="javascript:void(0)">Assesments<span class="badge badge-primary" style="font-size: 15px;"></span></a>

              <a class="view_job" data-id="parts_sections" href="javascript:void(0)">Parts <span class="badge badge-primary" style="font-size: 15px;"><?php echo !empty($job_request_data['job_parts']) ? count($job_request_data['job_parts']) : '0'; ?></span></a>

              <a class="view_job" data-id="labours_sections" href="javascript:void(0)">Labours<span class="badge badge-primary" style="font-size: 15px;"><?php echo !empty($job_request_data['labours']) ? count($job_request_data['labours']) : '0'; ?></span></a>

            <?php } ?>

            <a class="view_job" data-id='timeline_section' href="#"><strong>Timeline <span class="badge badge-primary" style="font-size: 15px;">0</span></strong></a>

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
                echo "<a class='view_job' data-id='job_request_form' href='javascript:void(0);' id='status_inprogress'><i class='fa fa-spinner' aria-hidden='true'></i>&nbspIn progress<span class='badge badge-primary fa fa-arrow-right'></span>
                </a>";
                break;

              case '2':
                echo "<a class='view_job' data-id='job_request_form' href='javascript:void(0);' id='status_inprogress'><i class='fa fa-arrow-right' aria-hidden='true'></i>&nbspComplete<span class='badge badge-primary fa fa-arrow-right'></span>
                  </a>";
                break;

              case '3':
                echo "<a href='" . $report_link . "' target='_blank'><i class='fa fa-file-pdf-o' aria-hidden='true' style='font-size:19px;color:red'></i>&nbspReport<span class='badge badge-primary fa fa-arrow-right'></span>
                  </a>";
                break;

              default:
                echo "<a class='view_job' data-id='job_request_form' href='javascript:void(0);' id='status_inprogress'><i class='fa fa-arrow-right' aria-hidden='true'></i>&nbspN/A<span class='badge badge-primary fa fa-arrow-right'></span>
                </a>";
                break;
            }

            ?>

            <!-- <a class="view_job" data-id='pictures_section' href="javascript:void(0);">
              <i class="fa fa-plus" aria-hidden="true"></i>&nbspPictures<span class="badge badge-primary fa fa-arrow-right"></span>
            </a> -->

            <a class="view_job" data-id='notification_section' href="javascript:void(0);">
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

    <div class="col-lg-9 mb-4 remove_job_sections" id="about">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">About</h6>

        </div>

        <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">

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

    <!-- labours_sections  -->

    <div class="col-lg-9 mb-4 remove_job_sections" id='labours_sections' style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Labours Information</h6>

        </div>

        <div class="card-body">

          <div class="col-lg-12 mb-4">

            <table class="table table-bordered table-striped table-hover" id="labours_data" width="100%" cellspacing="0">

              <thead>

                <tr>

                  <th>S.no.</th>

                  <th>Labour</th>

                  <th>Cost</th>

                  <th>Total Cost</th>

                  <th>Vat Cost</th>

                  <th>Description</th>

                </tr>

              </thead>

              <tbody>

                <?php

                $i = 1;

                if (!empty($job_request_data['labours'])) {

                  foreach ($job_request_data['labours'] as $labours) {  ?>

                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $labours['labour']; ?></td>
                      <td><?php echo $labours['cost']; ?></td>
                      <td><?php echo $labours['cost_total']; ?></td>
                      <td><?php echo $labours['vat_cost']; ?></td>
                      <td><?php echo $labours['description_labour']; ?></td>
                    </tr>

                <?php $i++;
                  }
                }

                ?>

              </tbody>

            </table>

          </div>
        </div>

      </div>

    </div>

    <!-- labours_sections  -->

    <!-- assesment_sections  -->

    <div class="col-lg-9 mb-4 remove_job_sections" id='assesment_sections' style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Assesments Information</h6>

        </div>

        <div class="card-body">

          <div class="col-lg-12 mb-4">

            <p>This is the assesment_sections</p>

          </div>
        </div>

      </div>

    </div>

    <!-- assesment_sections  -->


    <!--docs_section  -->

    <div class="col-lg-9 mb-4 remove_job_sections" id='docs_section' style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Documents</h6>

        </div>

        <div class="card-body">

          <div class="row">

            <?php

            $j = 0;

            if (!empty($job_request_data['job_request_documents'])) {

              foreach ($job_request_data['job_request_documents'] as $docs) { ?>

                <div class="card">

                  <div class="card-body">

                    <div>
                      <img src="<?php echo base_url(); ?>/assets/uploads/<?php echo $docs['doc_name']; ?>" height="145" width="154">
                    </div>

                    <hr>

                    <div>

                      <a href="javascript:void(0);" data-toggle="modal" data-target="#editModal<?php echo $j; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                      <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal<?php echo $j; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                      <a href="javascript:void(0);" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                    </div>
                  </div>

                </div>

            <?php

                $j++;
              }
            }

            ?>
          </div>
        </div>

      </div>

    </div>

    <!-- docs_section  -->


    <!--persons_sections  -->

    <div class="col-lg-9 mb-4 remove_job_sections" id='persons_sections' style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Persons Information</h6>

        </div>

        <div class="card-body">

          <div class="col-lg-12 mb-4">

            <div class="table-responsive">

              <table class="table table-bordered table-striped table-hover" id="person_data" width="100%" cellspacing="0">

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

                  if (!empty($person_data)) {

                    foreach ($person_data as $persons) {  ?>

                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $persons['person_type']; ?></td>
                        <td><?php echo $persons['person_name']; ?></td>
                        <td><a class="btn btn-primary btn-sm" href="tel:<?php echo $persons['person_number']; ?>"><?php echo $persons['person_number']; ?></a></td>
                      </tr>

                  <?php $i++;
                    }
                  }

                  ?>

                </tbody>

              </table>

            </div>

          </div>
        </div>

      </div>

    </div>

    <!-- persons_sections -->


    <!--insurance_section  -->

    <div class="col-lg-9 mb-4 remove_job_sections" id='insurance_section' style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Insurance Information</h6>

        </div>

        <div class="card-body">

          <div class="col-lg-12 mb-4">

            <table class="table table-bordered table-striped table-hover" id="insurance_data" width="100%" cellspacing="0">

              <tbody>

                <tr>
                <th>Insured Reference</th>
                <td><?php echo $requestor['insured_reference']; ?></td>

                </tr>

                <tr>
                <th>Date Accident</th>
                <td><?php echo $requestor['date_accident']; ?></td>

                </tr>

                <tr>
                <th>Policy Number</th>
                <td><?php echo $requestor['policy_number']; ?></td>


                </tr>

                <tr>
                <th>Claim Number</th>
                <td><?php echo $requestor['claim_number']; ?></td>


                </tr>

                <tr>
                <th>Inspection</th>
                <td><?php echo $requestor['inspection']; ?></td>


                </tr>

                <tr>
                <th>Insured Amount</th>
                <td><?php echo $requestor['insured_amount']; ?></td>


                </tr>

                <tr>
                <th>Exemption Amount</th>
                <td><?php echo $requestor['exemption_amount']; ?></td>

                </tr>

                <tr>
                <th>Responsibility</th>
                <td><?php echo $requestor['responsibility']; ?></td>


                </tr>

                <tr>
                <th>Liability</th>
                <td><?php echo $requestor['liability']; ?></td>

                </tr>

              </tbody>

            </table>

          </div>
        </div>

      </div>

    </div>

    <!-- insurance_section -->

    <!--garage_section  -->

    <div class="col-lg-9 mb-4 remove_job_sections" id='garage_section' style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Garage Information</h6>

        </div>

        <div class="card-body">

          <div class="col-lg-12 mb-4">

            <table class="table table-bordered table-striped table-hover" id="garage_data_values" width="100%" cellspacing="0">

              <tbody>

                <tr>
                  <th>Garage Name</th>
                  <td><?php echo $requestor['garage_whole'][0]['garage_name']; ?></td>

                </tr>

                <tr>
                  <th>Owner</th>
                  <td><?php echo $requestor['garage_whole'][0]['owner_name']; ?></td>

                </tr>

                <tr>
                  <th>Landline</th>
                  <td><?php echo $requestor['garage_whole'][0]['landline']; ?></td>


                </tr>

                <tr>
                  <th>Mobiles</th>
                  <td><?php echo $requestor['garage_whole'][0]['mobile']; ?></td>


                </tr>

                <tr>
                  <th>Faxes</th>
                  <td><?php echo $requestor['garage_whole'][0]['fax']; ?></td>


                </tr>

                <tr>
                  <th>Address</th>
                  <td><?php echo $requestor['garage_whole'][0]['address']; ?></td>


                </tr>

                <tr>
                  <th>City Name</th>
                  <td><?php echo $requestor['garage_whole'][0]['city']; ?></td>

                </tr>

                <tr>
                  <th>Repair Rate</th>
                  <td><?php echo $requestor['garage_whole'][0]['repair_rate']; ?></td>

                </tr>

                <tr>
                  <th>Garage Notes</th>
                  <td><?php echo $requestor['garage_whole'][0]['notes']; ?></td>

                </tr>

                <tr>
                  <th>Status</th>
                  <td><?php if ($requestor['garage_whole'][0]['status'] == 1) {
                        echo "Active";
                      } else {
                        "Inactive";
                      } ?></td>
                </tr>

              </tbody>

            </table>

          </div>
        </div>

      </div>

    </div>

    <!-- garage_section -->


    <!--vehicle_section  -->

    <div class="col-lg-9 mb-4 remove_job_sections" id='vehicle_section' style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Vehicle Information</h6>

        </div>

        <div class="card-body">

          <div class="col-lg-12 mb-4">

            <table class="table table-bordered table-striped table-hover" id="vehicle_data_values" width="100%" cellspacing="0">

              <tr>

                <th>Registration Plate</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['registration_plate']; ?></td>

              </tr>

              <tr>

                <th>Manufacture Date</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['manufacturing_date']; ?></td>

              </tr>

              <tr>
                <th>Vin Number</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['vin_number']; ?></td>

              </tr>

              <tr>
                <th>Registration Date</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['registration_date']; ?></td>

              </tr>

              <tr>
                <th>Make</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['make']; ?></td>

              </tr>

              <tr>
                <th>Model</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['model']; ?></td>

              </tr>

              <tr>
                <th>Body Type</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['body_type']; ?></td>

              </tr>

              <tr>
                <th>Engine Capacity</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['engine_capacity']; ?></td>

              </tr>

              <tr>
                <th>Engine Power</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['engine_power']; ?></td>

              </tr>

              <tr>
                <th>Imported Condition</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['condition_when_imported']; ?></td>

              </tr>

              <tr>
                <th>Gearbox Type</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['gearbox_type']; ?></td>

              </tr>

              <tr>
                <th>Main Color</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['main_color']; ?></td>

              </tr>

              <tr>
                <th>P code</th>
                <td><?php echo $requestor['vehicle_whole_data'][0]['pcode']; ?></td>
              </tr>

              </tbody>

            </table>

          </div>
        </div>

      </div>

    </div>

    <!-- vehicle_section -->

    <!-- This is the notification section  Area Starts-->

    <div class="col-lg-9 mb-4 remove_job_sections" id="notification_section" style="display: none;">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Notification</h6>
        </div>
        <div class="card-body">
          <div class="col-lg-12 mb-4">
            <p>This is the notification section Area...!</p>
          </div>
        </div>
      </div>
    </div>

    <!-- This is the notification section area section ends -->


    <!-- This is the parts Area Starts.. -->

    <div class="col-lg-9 mb-4 remove_job_sections" id="parts_sections" style="display:none;">

      <div class="card shadow mb-4">

        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Parts Information</h6>
        </div>

        <div class="card-body">
          <div class="col-lg-12 mb-4">
            <table class="table table-responsive table-bordered table-striped table-hover" id="parts_data_values" width="100%" cellspacing="0">

              <thead>

                <tr>

                  <th>S.no.</th>
                  <th>Part Name</th>
                  <th>Damage Type</th>
                  <th>Part Action Name</th>
                  <th>Part Status</th>
                  <th>Quantity</th>
                  <th>Part Cost</th>
                  <th>Part Vat Cost</th>
                  <th>Discount(%)</th>
                  <th>Part Note</th>
                  <th>Total Amount</th>

                </tr>

              </thead>

              <tbody>

                <?php

                $i = 1;
                if (!empty($job_request_data['job_parts'])) {
                  foreach ($job_request_data['job_parts'] as $job_parts_data) {  ?>

                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $job_parts_data['part_name']; ?></td>
                      <td><?php echo $job_parts_data['damage_type']; ?></td>
                      <td><?php echo $job_parts_data['action_type_name']; ?></td>
                      <td><?php echo $job_parts_data['part_status']; ?></td>
                      <td><?php echo $job_parts_data['quantity']; ?></td>
                      <td><?php echo $job_parts_data['part_cost']; ?></td>
                      <td><?php echo $job_parts_data['part_cost_vat']; ?></td>
                      <td><?php echo $job_parts_data['discount']; ?></td>
                      <td><?php echo $job_parts_data['parts_note']; ?></td>
                      <td><?php echo $job_parts_data['total_amount']; ?></td>

                    </tr>

                <?php $i++;
                  }
                }

                ?>

              </tbody>

            </table>
          </div>
        </div>

      </div>

    </div>

    <!-- This is the parts Area Ends -->

    <!-- This is timeline Section Area -->

    <div class="col-lg-9 mb-4 remove_job_sections" id="timeline_section" style="display:none;">

      <div class="card shadow mb-4">

        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Timeline</h6>
        </div>

        <div class="card-body">
          <div class="col-lg-12 mb-4">
            <p>This is the Timeline Area ..!</p>
          </div>
        </div>

      </div>

    </div>

    <!-- This is the timeline Section Area -->

    <!-- Assign Tab starts -->

    <div class="col-lg-9 mb-4 remove_job_sections" id="job_request_form" style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-body">

          <div class="col-lg-12 mb-4">

            <div class="tabbable-wrapper">

              <ul class="nav nav-tabs">

                <li class="active"><a data-toggle="tab" href="#assignjob">Assign</a></li>

                <li><a data-toggle="tab" href="#job_estimation">Estimation</a></li>

                <li><a data-toggle="tab" href="#job_damage">Damage</a></li>

                <li><a data-toggle="tab" href="#job_parts">Parts</a></li>

                <li><a data-toggle="tab" href="#job_labours">Labour</a></li>

                <li><a data-toggle="tab" href="#job_loss">Total Loss</a></li>

                <li><a data-toggle="tab" href="#assign_job_remarks">Remark</a></li>

                <li><a data-toggle="tab" href="#job_document">Document</a></li>

                <!-- <li><a data-toggle="tab" href="#job_fees">Fees</a></li> -->

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

                <!-- <div id='job_fees' class="tab-pane fade">
                    <?php // echo $this->include('job_requests/assign_fees');
                    ?>
                </div> -->

              </div>

              <?php echo form_close(); ?>

            </div>

          </div>

        </div>

      </div>

    </div>

    <!-- Assign Job fields -->

  </div>


  <?php

  $i = 0;

  if (!empty($job_request_data['job_request_documents'])) {
    foreach ($job_request_data['job_request_documents'] as $person_image) { ?>

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
              <img src="<?php echo base_url(); ?>/assets/uploads/<?php echo $person_image['doc_name']; ?>" height="350" width="470">
            </div>
          </div>
        </div>
      </div>

  <?php $i++;
    }
  }

  ?>

  <?php echo $this->endSection();  ?>