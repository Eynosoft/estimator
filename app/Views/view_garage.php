<?php echo $this->extend('template/layout_main'); ?>

<?php echo $this->section('content'); ?>

<!-- Begin Page Content -->

<div class="container-fluid">


  <!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">Garage <b>"<?php echo $garage['garage_name']; ?>"</b> <small>About</small> </h1>

  </div>

  <div class="row">

    <!-- Left Column -->

    <div class="col-lg-3 mb-4">

      <a href="<?php echo base_url('garage/update') . '/' . $garage['id']; ?>" class="btn btn-md btn-warning btn-block  mb-4">Edit</a>

      <!-- Left Other HTML -->

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Pages</h6>

        </div>

        <div class="card-body">

          <div class="vertical-menu iconNone">

            <a id='about' href="javascript:void();">About<span class="badge badge-primary"></span></a>

            <a href="#">Notifications<span class="badge badge-primary"></span></a>

            <a href="#">Contacts <span class="badge badge-primary"></span></a>

            <a href="#">Location <span class="badge badge-primary"></span></a>

            <a id='requests_data' href="javascript:void(0);">Requests <span class="badge badge-primary" style="font-size: 15px;"><?php echo !empty($garage['request']) ? $garage['request'] : '0'; ?></span></a>

            <a id='estimation_data' href="javascript:void(0);"><strong>Estimations <span class="badge badge-primary" style="font-size: 15px;"><?php echo !empty($garage['estimations']) ? $garage['estimations'] : '0'; ?></span></strong></a>

          </div>

        </div>

      </div>

      <div class="card primary mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Actions</h6>

        </div>

        <div class="card-body">

          <div class="vertical-menu iconNone">

            <a href="javascript:void();">About<span class="badge badge-primary"></span></a>

          </div>

        </div>

      </div>

      <div class="card primary mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Notes</h6>

        </div>

        <div class="card-body">

          <div class="vertical-menu iconNone">

            <?php echo $garage['notes'] ?>

          </div>

        </div>

      </div>

    </div>

    <!-- Right Column -->

    <div class="col-lg-9 mb-4" id='about_garage'>

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

                  <td>
                    <?php

                    if (!empty($garage['status'])) { ?>

                      <i style="color: green;font-size:25px;" class="fa fa-check-circle" aria-hidden="true"></i>

                    <?php } else { ?>

                      <i class="fa fa-times-circle" style="font-size:25px;color:red"></i>

                    <?php } ?>

                  </td>

                </tr>

                <tr>
                  <td><strong>Created</strong></td>

                  <?php

                  $created = $garage['created_at'];
                  $newDate = date("d/m/Y h:i:sa", strtotime($created));
                  ?>

                  <td><?php echo $newDate; ?></td>

                </tr>

                <tr>

                  <td><strong>Garage Name</strong></td>

                  <td><?php echo $garage['garage_name']; ?></td>

                </tr>

                <tr>

                  <td><strong>Repair Time Rate</strong></td>

                  <td><?php echo $garage['repair_rate']; ?></td>

                </tr>

                <tr>

                  <td><strong>Emails</strong></td>

                  <td><?php echo $garage['emails']; ?></td>

                </tr>

                <tr>

                  <td><strong>Land Lines</strong></td>

                  <td><?php echo $garage['land_line']; ?></td>

                </tr>

                <tr>

                  <td><strong>Mobiles</strong></td>

                  <td><?php echo $garage['mobile']; ?></td>

                </tr>

                <tr>

                  <td><strong>Faxes</strong></td>

                  <td><?php echo $garage['fax']; ?></td>

                </tr>

                <tr>

                  <td><strong>Locale</strong></td>

                  <td><?php echo $garage['locale']; ?></td>

                </tr>

                <tr>

                  <td><strong>City</strong></td>

                  <td><?php echo $garage['city']; ?></td>

                </tr>

                <tr>

                  <td><strong>Address</strong></td>

                  <td><?php echo $garage['address']; ?></td>

                </tr>

              </tbody>

            </table>

          </div>

        </div>

      </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Request Section Starts Here -->

    <div class="col-lg-9 mb-4" id='requests' style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Total Requests</h6>

        </div>

        <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="requestsdata" width="100%" cellspacing="0">

            <thead>

                <tr>
                  <th>Request No.</th>
                  <th>Vehicle</th>
                  <th>Customer</th>
                  <th>Requestor</th>
                  <th>Requested Date</th>
                </tr>

            </thead>

              <tbody>

                <?php if (!empty($requests)) {
                  foreach ($requests as $row) {  ?>

                    <tr>
                      <td><?php echo $row['request_no']; ?></td>
                      <td><?php echo $row['vehicle']; ?></td>
                      <td><?php echo $row['customer']; ?></td>
                      <td><?php echo $row['requestor'];  ?></td>
                      <td><?php echo $row['requested_date']; ?></td>
                    </tr>

                <?php } } ?>

              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>

    <!-- Request Section Ends Here -->
    <!-- Estimation Section Starts Here  -->

    <div class="col-lg-9 mb-4" id='estimations' style="display: none;">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Total Estimations</h6>

        </div>

        <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="estimationsdata" width="100%" cellspacing="0">

              <thead>

                <tr>
                  <th>Request No.</th>
                  <th>Vehicle</th>
                  <th>Customer</th>
                  <th>Requestor</th>
                  <th>Requested Date</th>
                </tr>

              </thead>

                <tbody>

                <?php if (!empty($estimations)) {
                  foreach ($estimations as $row_value) {  ?>

                    <tr>
                      <td><?php echo $row_value['request_no']; ?></td>
                      <td><?php echo $row_value['vehicle']; ?></td>
                      <td><?php echo $row_value['customer']; ?></td>
                      <td><?php echo $row_value['requestor'];  ?></td>
                      <td><?php echo $row_value['requested_date']; ?></td>
                    </tr>

                <?php }
                } ?>

              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>

  <!-- Estimation Section Ends Here -->

  </div>

  <!-- End of Main Content -->

  <?php echo $this->endSection(); ?>