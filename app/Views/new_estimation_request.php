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

          <li class="active"><a data-toggle="tab" href="#estRequest">Request</a></li>

          <li><a data-toggle="tab" href="#estVehicle">Vehicle</a></li>

          <li><a data-toggle="tab" href="#estGarage">Garage</a></li>

          <li><a data-toggle="tab" href="#estInsuranceDetails">Insurance Details</a></li>

          <li><a data-toggle="tab" href="#estPersons">Persons</a></li>

          <li><a data-toggle="tab" href="#estDocuments">Documents</a></li>

        </ul>



        <div class="tab-content">



          <div id="estRequest" class="tab-pane fade in active">

            <?php echo $this->include('estimation_request/estRequest'); ?>

          </div>



          <div id="estVehicle" class="tab-pane fade">

            <?php echo $this->include('estimation_request/estVehicle'); ?>

          </div>



          <div id="estGarage" class="tab-pane fade">

            <?php echo $this->include('estimation_request/estGarage'); ?>

          </div>



          <div id="estInsuranceDetails" class="tab-pane fade">

            <?php echo $this->include('estimation_request/estInsuranceDetails'); ?>

          </div>



          <div id="estPersons" class="tab-pane fade">

            <?php echo $this->include('estimation_request/estPersons'); ?>

          </div>



          <div id="estDocuments" class="tab-pane fade">

            <?php echo $this->include('estimation_request/estDocuments'); ?>

          </div>



        </div>

      </div>

    </div>



  </div>



</div>

<!-- /.container-fluid -->



<?php echo $this->endSection(); ?>