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

              <a href="<?php echo base_url('Requests/create/'); ?>" class="btn btn-md btn-warning btn-block  mb-4">Create</a>

              <!-- Left Other HTML -->

              <div class="card shadow mb-4">

                <div class="card-header py-3">

                  <h6 class="m-0 font-weight-bold text-primary">Statistics</h6>

                </div>

                <div class="card-body">

                  <div class="vertical-menu iconNone">

                    <a href="#">External <span class="badge badge-primary">0</span></a>

                    <a href="#">Unassigned <span class="badge badge-primary">5</span></a>

                    <a href="#">Assigned <span class="badge badge-primary">5</span></a>

                    <a href="#">Withdrawn <span class="badge badge-primary">5</span></a>

                    <a href="#"><strong>Total <span class="badge badge-primary">5</span></strong></a>

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

                  <!-- <div class="row mb-3">

                    <div class="col">

                      <div class="searchHeadBar">

                        <div class="input-group md-form form-sm form-2 pl-0">

                          <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search" aria-label="Search">

                          <div class="input-group-append">

                            <span class="input-group-text amber lighten-3" id="basic-text1"><i class="fa fa-search" aria-hidden="true"></i></span>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div> -->

                  <div class="table-responsive">

                    <table class="table table-bordered" id="requestors" width="100%" cellspacing="0">

                      <thead>

                        <tr>

                          <th>Customer</th>

                          <th>Created</th>

                          <th>Number</th>

                          <th>Vehicles</th>

                          <th>Type</th>

                          <th>Status</th>

                          <th style="width: 20px;">&nbsp;</th>

                        </tr>

                      </thead>

                      <tbody>

                      <?php
                        
                       foreach ($requestor as $rows) 
                       {
                        

                      ?>

                        <tr>

                          <td><?php echo $rows['customer']; ?></td>

                          <td><?php echo $rows['created_at']; ?></td>

                          <td><?php echo $rows['requestor']; ?></td>

                          <td>MBK993</td>

                          <td><span class="badge badge-primary">Estimation</span></td>

                          <td><span class="badge badge-success">Assigned</span></td>

                          <td class="actionCol">

                            <a class="mr-2" href="view-estimation-requests.php">

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