<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">Jobs <span>Estimations</span> </h1>

  </div>

  <div class="row">
    <!-- Left Column -->
    <div class="col-lg-3 mb-4">
      <!-- Left Other HTML -->
      <div class="card shadow mb-4">

        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Statistics</h6>
        </div>

        <div class="card-body">

          <div class="vertical-menu iconNone">

            <a href="#">Pending <span class="badge badge-primary" style="font-size: 15px;">0</span></a>

            <a href="#">In progress <span class="badge badge-danger" style="font-size: 15px;">0</span></a>

            <a href="#">Completed <span class="badge badge-success" style="font-size: 15px;">0</span></a>

            <a href="#">Finish <span class="badge badge-primary" style="font-size: 15px;">0</span></a>

            <a href="#"><strong>Total <span class="badge badge-primary" style="font-size: 17px;">0</span></strong></a>

          </div>

        </div>

      </div>

    </div>

    <!-- Right Column -->

    <div class="col-lg-9 mb-4">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Estimations</h6>

        </div>

        <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="requestors" width="100%" cellspacing="0">

              <thead>
                <tr>
                  <th>Customer</th>
                  <th>Assessor</th>
                  <th>Garage</th>
                  <th>Created</th>
                  <th>Requested</th>
                  <th>Vehicle</th>
                  <th>Status</th>
                  <th style="width: 20px;">View</th>
                </tr>
              </thead>

              <tbody>

              <?php  
              
              foreach ($jobs as $row)  {

              ?>

                <tr>

                  <td><?php echo  $row['customer']; ?></td>

                  <td><?php echo $row['assessor']; ?></td>

                  <td><?php echo $row['garage']; ?></td>

                  <td><?php echo $row['created_at']; ?></td>

                  <td><?php echo $row['requestor']; ?></td>

                  <td><?php echo $row['vehicle']; ?></td>

                  <td><button class="btn btn-success" disabled>Pending</button></td>

                  <td class="actionCol">

                    <a class="mr-2" href="<?php echo base_url('requests/job_estimations'); ?> ">

                      <i class="fa fa-eye" aria-hidden="true"></i>

                    </a>

                  </td>

                </tr>

              <?php } ?>

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