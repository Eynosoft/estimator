<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content'); ?>

<!-- Begin Page Content -->

<div class="container-fluid">

  <!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">Garage "<?php echo $garage[0]['garage_name']; ?>" <small>About</small> </h1>

  </div>

  <div class="row">

    <!-- Left Column -->

  <div class="col-lg-3 mb-4">

    <a href="<?php echo base_url('garage/update') . '/' . $garage[0]['id']; ?>" class="btn btn-md btn-warning btn-block  mb-4">Edit</a>

      <!-- Left Other HTML -->

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Pages</h6>

        </div>

        <div class="card-body">

          <div class="vertical-menu iconNone">

            <a href="#">About<span class="badge badge-primary"></span></a>

            <a href="#">Notifications<span class="badge badge-primary"></span></a>

            <a href="#">Contacts <span class="badge badge-primary"></span></a>

            <a href="#">Location <span class="badge badge-primary"></span></a>

            <a href="#">Requests <span class="badge badge-primary">5</span></a>

            <a href="#"><strong>Estimations <span class="badge badge-primary">10</span></strong></a>

          </div>

        </div>

      </div>


      <div class="card primary mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Actions</h6>

        </div>

        <div class="card-body">

          <div class="vertical-menu iconNone">

            <a href="#">About<span class="badge badge-primary"></span></a>

          </div>

        </div>

      </div>


      <div class="card primary mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Notes</h6>

        </div>

        <div class="card-body">

          <div class="vertical-menu iconNone">

            <p>Notes Content Dummy text</p>

          </div>

        </div>

      </div>

    </div>

    <!-- Right Column -->

    <div class="col-lg-9 mb-4">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">About</h6>

        </div>

        <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

              <tbody>

                <tr>

                  <td><strong>Active</strong></td>

                  <td>
                    <?php 
                    if($garage[0]['active'] == 1){ ?>
                      
                      <i style="color: green;" class="fa fa-check-circle" aria-hidden="true"></i>

                    <?php } else { ?>

                      <i class="fa fa-close" style="font-size:20px;color:red"></i>
                    
                    <?php } ?>
                    
                  </td>

                </tr>

                <tr>
                  <td><strong>Created</strong></td>

                  <?php
                  $created = $garage[0]['created_at'];
                  $newDate = date("d-m-Y", strtotime($created));
                  ?>
                  <td><?php echo $newDate; ?></td>

                </tr>

                <tr>

                  <td><strong>Garage Name</strong></td>

                  <td><?php echo $garage[0]['garage_name']; ?></td>

                </tr>

                <tr>

                  <td><strong>Repair Time Rate</strong></td>

                  <td></td>

                </tr>

                <tr>

                  <td><strong>Emails</strong></td>

                  <td><?php echo $garage[0]['email']; ?></td>

                </tr>

                <tr>

                  <td><strong>Land Lines</strong></td>

                  <td><?php echo $garage[0]['landline']; ?></td>

                </tr>

                <tr>

                  <td><strong>Mobiles</strong></td>

                  <td><?php echo $garage[0]['mobile']; ?></td>

                </tr>

                <tr>

                  <td><strong>Faxes</strong></td>

                  <td><?php echo $garage[0]['fax']; ?></td>

                </tr>

                <tr>

                  <td><strong>Locale</strong></td>

                  <td></td>

                </tr>

              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>

    <!-- /.container-fluid -->
  </div>

  <!-- End of Main Content -->


  <?php echo $this->endSection(); ?>