<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content'); ?>

<!-- Begin Page Content -->

<div class="container-fluid">

  <!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">Jobs Estimation</h1>

  </div>

  <div class="row">

    <!-- Left Column -->

    <div class="col-lg-3 mb-4">

      <a href="<?php echo base_url('requests/create/'); ?>" class="btn btn-md btn-warning btn-block  mb-4">Create</a>

      <!-- Left Other HTML -->

      <div class="card shadow mb-4">

        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Statistics</h6>
        </div>

        <div class="card-body">

          <div class="vertical-menu iconNone">

            <a href="#">External <span class="badge badge-primary" style="font-size: 15px;">0</span></a>

            <a href="#">Unassigned <span class="badge badge-danger" style="font-size: 15px;"><?php echo !empty($requestor['0']['unassigned_total']) ? $requestor['0']['unassigned_total'] : '0'; ?></span></a>

            <a href="#">Assigned <span class="badge badge-success" style="font-size: 15px;"><?php echo !empty($requestor['0']['assign_total']) ? $requestor['0']['assign_total'] : '0'; ?></span></a>

            <a href="#">Withdrawn <span class="badge badge-primary" style="font-size: 15px;">0</span></a>

            <a href="#"><strong>Total <span class="badge badge-primary" style="font-size: 17px;"><?php echo  !empty($requestor['0']['total']) ? $requestor['0']['total'] : '0'; ?></span></strong></a>

          </div>

        </div>

      </div>

    </div>

    <!-- Right Column -->

    <div class="col-lg-9 mb-4">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Requests</h6>

        </div>

        <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="requestors" width="100%" cellspacing="0">

              <thead>

                <tr>

                  <th>Customer</th>

                  <th>Created</th>

                  <th>Claim Number</th>

                  <th>Vehicles</th>

                  <th>Type</th>

                  <th>Status</th>

                  <th style="width: 20px;">View</th>

                </tr>

              </thead>

              <tbody>

                <?php

                foreach ($requestor as $rows) {

                ?>

                  <tr>

                    <td> <?php echo $rows['customer']; ?> </td>

                    <?php

                    $originalDate = $rows['created_at'];
                    $newDate = date("d/m/Y h:i:sa", strtotime($originalDate));

                    ?>

                    <td><?php echo $newDate; ?></td>

                    <td><?php echo $rows['claim_number']; ?></td>

                    <td><?php echo $rows['vehicle']; ?></td>

                    <td><span class="badge badge-primary" style="font-size: 13px;">Estimation</span></td>


                    <?php

                    switch ($rows['status']) {

                      case '0':
                        echo "<td><span class='badge badge-danger' style='font-size: 13px;'>Unassigned</span></td>";
                        break;

                      default:
                        echo "<td><span class='badge badge-success' style='font-size: 13px;'>Assigned</span></td>";
                        break;

                    }

                    ?>

                    <td class="actionCol">

                    <a class="mr-2" href="<?php echo base_url('requests/view_estimations') . '/' .   $rows['id']; ?> ">

                      <i class="fa fa-eye" aria-hidden="true"></i>

                    </a>

                    </td>

                  </tr>

                <?php $i++; } ?>

              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>

    <!-- /.container-fluid -->
  </div>

  <!-- End of Main Content -->

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#requestors').DataTable();
    });
  </script>


  <?php echo $this->endSection(); ?>