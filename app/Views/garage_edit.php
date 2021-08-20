<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content'); ?>

<!-- Begin Page Content -->

<div class="container-fluid">

<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">

  <h1 class="h3 mb-0 text-gray-800">Update Garage</h1>

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

        <li class="active"><a data-toggle="tab" href="#garageContactedit">Contact</a></li>

        <li><a data-toggle="tab" href="#garageNotificationsedit">Notifications</a></li>

        <li><a data-toggle="tab" href="#garagecusSettingsedit">Settings</a></li>

        <li><a data-toggle="tab" href="#garageNotesedit">Notes</a></li>

      </ul>

      <div class="tab-content">


        <div id="garageContactedit" class="tab-pane fade in active">

          <?php echo $this->include('garage/garageContactedit'); ?>

        </div>


      <div id="garageNotificationsedit" class="tab-pane fade">

        <?php echo $this->include('garage/garageNotificationsedit'); ?>

      </div>

        
        <div id="garagecusSettingsedit" class="tab-pane fade">

          <?php echo $this->include('garage/garageSettingsedit'); ?>

        </div>


        <div id="garageNotesedit" class="tab-pane fade">

        <?php echo $this->include('garage/garageNotesedit'); ?>

        </div>

      </div>

    </div>

  </div>

</div>

</div>
<!-- /.container-fluid -->


<?php echo $this->endSection(); ?>