<?=  $this->extend('template/layout_main') ?>
<?=  $this->section('content') ?>

            <!-- <div class="col-xxl-12 col-xl-12 mb-4">
              <div class="card card-header-actions border-bottom-info">
                  <div class="card-header">
									Welcome To Dashboard
                  </div>
                  <div class="card-body">
                    <div class="dashboard_listing_items">
                      <ul class="list-unstyled">
                        <li>Hello <b><?php // echo $username; ?>...!</b><span class="badge badge-primary mr-2"><a href="<?php // echo base_url(route_to('logout')); ?>" class="btn btn-primary">Log Out</a></span></li>
                      </ul>
                    </div>
                  </div>
            </div> -->
            <!-- Page Heading -->

		    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xxl-12 col-xl-12 mb-4">

              <div class="card card-header-actions border-bottom-info">

                  <div class="card-header">
                      Requests
                  </div>

                  <div class="card-body">
                    <div class="dashboard_listing_items">
                      <ul class="list-unstyled">
                        <li>External <span class="badge badge-primary mr-2" style="font-size:15px;">0</span></li>
                        <li>Unassigned <span class="badge badge-warning mr-2" style="font-size:15px;"><?php echo !empty($request_data['unassigned_total']) ? $request_data['unassigned_total'] : '0' ; ?></span></li>
                        <li>Assigned<span class="badge badge-success mr-2" style="font-size:15px;"><?php echo !empty($request_data['assign_total']) ? $request_data['assign_total'] : '0'; ?></span></li>
                        <li>Withdrawn <span class="badge badge-danger mr-2" style="font-size:15px;">0</span></li>
                        <li><strong>Total <span class="badge badge-info mr-2" style="font-size:17px;"><?php echo !empty($request_data['total_requests']) ? $request_data['total_requests'] : '0'; ?></span></strong></li>
                      </ul>
                    </div>
                  </div>

              </div>

              <div class="card card-header-actions border-bottom-info">
                  <div class="card-header">
                      My Account
                  </div>
                  <div class="card-body">
                    <div class="dashboard_listing_items">
                      <ul class="list-unstyled">
                        <li><strong>Estimations</strong></li>
                        <li>Pending <span class="badge badge-primary mr-2" style="font-size:15px;"><?php echo  !empty($request_data['pending_total']) ? $request_data['pending_total'] : '0'; ?></span></li>
                        <li>In Progress <span class="badge badge-warning mr-2" style="font-size:15px;"><?php echo !empty($request_data['inprogress']) ? $request_data['inprogress'] : '0'; ?></span></li>
                        <li>Completed <span class="badge badge-success mr-2" style="font-size:15px;"><?php echo !empty($request_data['completed']) ? $request_data['completed'] : '0'; ?></span></li>
                        <li>Finished <span class="badge badge-danger mr-2" style="font-size:15px;">0</span></li>
                        <li><strong>Total <span class="badge badge-info mr-2" style="font-size:17px;"><?php echo !empty($request_data['total_estimation']) ? $request_data['total_estimation'] : '0'; ?></span></strong></li>
                      </ul>
                    </div>
                  </div>
              </div>

          </div>
          </div>

<?= $this->endSection() ?>




