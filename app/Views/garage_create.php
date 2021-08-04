<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content'); ?>

   <!-- Begin Page Content -->


<div class="container-fluid">

<!-- Page Heading -->


<div class="d-sm-flex align-items-center justify-content-between mb-4">

  <h1 class="h3 mb-0 text-gray-800">Add Garage</h1>

</div>

<!-- Content Row -->

<div class="row">

  <div class="col-lg-12 mb-4">

    <div class="tabbable-wrapper">

      <ul class="nav nav-tabs">

        <li class="active"><a data-toggle="tab" href="#cusContact">Contact</a></li>

        <li><a data-toggle="tab" href="#cusNotifications">Notifications</a></li>

        <li><a data-toggle="tab" href="#cusSettings">Settings</a></li>

        <li><a data-toggle="tab" href="#cusNotes">Notes</a></li>

      </ul>

      <div class="tab-content">

        

        <div id="cusContact" class="tab-pane fade in active">

          <?php echo $this->include('garage/garageContact'); ?>

        </div>


        <div id="cusNotifications" class="tab-pane fade">

          <?php echo $this->include('garage/garageNotifications'); ?>

        </div>

        
        <div id="cusSettings" class="tab-pane fade">

          <?php echo $this->include('garage/garageSettings'); ?>

        </div>


        <div id="cusNotes" class="tab-pane fade">

          <?php echo $this->include('garage/garageNotes'); ?>

        </div>

      </div>

    </div>

  </div>

</div>

</div>
<!-- /.container-fluid -->


<?php echo $this->endSection(); ?>