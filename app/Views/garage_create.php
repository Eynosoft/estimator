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

      <?php 

    $currentTab = isset($_SESSION['currentTab']) ? $_SESSION['currentTab'] : '';

    echo form_input(array('type' => 'hidden', 'id' => 'currentTab', 'name' => 'currentTab', 'value' => $currentTab));

    unset($_SESSION['currentTab']);

      ?>

  <div class="col-lg-12 mb-4">

    <div class="tabbable-wrapper">

      <ul class="nav nav-tabs">

        <li class="active"><a data-toggle="tab" href="#garageContact">Contact</a></li>

        <li><a data-toggle="tab" href="#garageNotifications">Notifications</a></li>

        <li><a data-toggle="tab" href="#garageSettings">Settings</a></li>

        <li><a data-toggle="tab" href="#garageNotes">Notes</a></li>

      </ul>

      <div class="tab-content">

        <div id="garageContact" class="tab-pane fade in active">

          <?php echo $this->include('garage/garageContact'); ?>

        </div>


        <div id="garageNotifications" class="tab-pane fade">

          <?php echo $this->include('garage/garageNotifications'); ?>

        </div>

        
        <div id="garageSettings" class="tab-pane fade">

          <?php echo $this->include('garage/garageSettings'); ?>

        </div>


        <div id="garageNotes" class="tab-pane fade">

          <?php echo $this->include('garage/garageNotes'); ?>

        </div>

      </div>

    </div>

  </div>

</div>

</div>
<!-- /.container-fluid -->


<?php echo $this->endSection(); ?>