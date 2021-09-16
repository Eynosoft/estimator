<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content'); ?>

<!-- Begin Page Content -->

<div class="container-fluid">

  <!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-3">

    <h1 class="h3 mb-0 text-gray-800">Add Estimation Requests</h1>

  </div>
  
  <!-- Content Row -->

  <div class="row">

    <div class="col-lg-12 mb-4">

      <div class="tabbable-wrapper">

        <ul class="nav nav-tabs">

          <li class="active"><a data-toggle="tab" href="#updateestRequest">Request</a></li>

          <li><a data-toggle="tab" href="#updateestVehicle">Vehicle</a></li>

          <li><a data-toggle="tab" href="#updateestGarage">Garage</a></li>

          <li><a data-toggle="tab" href="#updateestInsuranceDetails">Insurance Details</a></li>

          <li><a data-toggle="tab" href="#updateestPersons">Persons</a></li>

          <li><a data-toggle="tab" href="#updateestDocuments">Documents</a></li>

        </ul>

        <div class="tab-content">
          
          <div id="updateestRequest" class="tab-pane fade in active">

            <?php echo $this->include('estimation_request/updateestRequest'); ?>

          </div>


          <div id="updateestVehicle" class="tab-pane fade">

            <?php echo $this->include('estimation_request/updateestVehicle'); ?>

          </div>


          <div id="updateestGarage" class="tab-pane fade">

            <?php echo $this->include('estimation_request/updateestGarage'); ?>

          </div>


          <div id="updateestInsuranceDetails" class="tab-pane fade">

            <?php echo $this->include('estimation_request/updateestInsuranceDetails'); ?>

          </div>


          <div id="updateestPersons" class="tab-pane fade">

            <?php echo $this->include('estimation_request/updateestPersons'); ?>

          </div>



          <div id="updateestDocuments" class="tab-pane fade">

            <?php echo $this->include('estimation_request/updateestDocuments'); ?>

          </div>

        </div>

      </div>

    </div>



  </div>



</div>

<!-- /.container-fluid -->



<?php echo $this->endSection(); ?>