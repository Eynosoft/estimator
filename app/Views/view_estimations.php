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

      <a href="<?php echo base_url('requests/update'); ?>" class="btn btn-md btn-warning btn-block  mb-4">Edit</a>

      <!-- Left Other HTML -->

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Pages</h6>

        </div>

        <div class="card-body">

          <div class="vertical-menu iconNone">

            <a href="#">About<span class="badge badge-primary"></span></a>

            <a href="#">Insurance Details<span class="badge badge-primary"></span></a>

            <a href="#">Persons <span class="badge badge-primary"></span></a>

            <a href="#">Pictures <span class="badge badge-primary"></span></a>

            <a href="#">Documents <span class="badge badge-primary">5</span></a>

            <a href="#"><strong>Timeline <span class="badge badge-primary">10</span></strong></a>

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

            <a href="#"> <i class="fa fa-plus" aria-hidden="true"></i>&nbspNote<span class="badge badge-primary fa fa-arrow-right"></span></a>

            <a href="#"> <i class="fa fa-trash" aria-hidden="true"></i>&nbspDelete<span class="badge badge-primary fa fa-arrow-right"></span></a>



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
                  <td><strong>Created</strong></td>

                  <td><button class="btn btn-success sm" disabled>assigned</button></td>

                </tr>

                <tr>
                  <td><strong>Created</strong></td>

                  <td>-</td>

                </tr>

                <tr>

                  <td><strong>Created By</strong></td>

                  <td>-</td>

                </tr>

                <tr>

                  <td><strong>Number</strong></td>

                  <td></td>

                </tr>

                <tr>

                  <td><strong>Customer</strong></td>

                  <td>-</td>

                </tr>

                <tr>

                  <td><strong>Requested</strong></td>

                  <td>-</td>

                </tr>

                <tr>

                  <td><strong>Requested By</strong></td>

                  <td>-</td>

                </tr>

                <tr>

                  <td><strong>Vehicle</strong></td>

                  <td>-</td>

                </tr>

                <tr>

                  <td><strong>Garage</strong></td>

                  <td></td>

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

              <div class="tab-content">


                <div id="assignjob" class="tab-pane fade in active">

                  <?php echo $this->include('requests/assignjob'); ?>

                </div>


                <div id="assignnotes" class="tab-pane fade">

                  <?php echo $this->include('requests/assignnotes'); ?>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <!-- Assign Tab Ends  -->

    <!-- /.container-fluid -->

  </div>

  <!-- End of Main Content -->
  

<?php echo $this->endSection();  ?>

