<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content'); ?>
<!-- Begin Page Content -->

<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">

<!-- <h1 class="h3 mb-0 text-gray-800">Add Customer</h1> -->
</div>

<?php

$activeClass = '';
$currentTab = isset($_SESSION['currentTab']) ? $_SESSION['currentTab'] : ' ';
echo form_input(array('type' => 'hidden', 'id' => 'currentTab', 'name' => 'currentTab', 'value' => $currentTab));

unset($_SESSION['currentTab']);

?>

<!-- Content Row -->

<div class="row">

  <div class="col-lg-12 mb-4">

    <div class="tabbable-wrapper">

    <ul class="nav nav-tabs">

    <li class="active">

      <a data-id="customerContactTab" data-toggle="tab" href="#cusContact">Contact</a>

    </li>

    <li>

    <a data-id="customerNotificationTab" data-toggle="tab" href="#cusNotifications">Notifications</a>

    </li>


    <li>

      <a data-id="customerSettingTab" data-toggle="tab" href="#cusSettings">Settings</a>

    </li>

  <!-- <li class="<?php // echo $activeClass; ?>"><a data-toggle="tab" href="#cusNotes">Notes</a></li> -->

  </ul>

      <?php

      $lblAttributes = ['class' => 'fieldLabel mb-1'];
      $frmattribute = [
              'id' => 'customer_create',
              'method' => 'post',
              ];

      echo form_open('customer/updateCustomer',$frmattribute);

      ?>

      <div class="tab-content">

        <div id="cusContact" class="tab-pane fade in active">

          <?php echo $this->include('customers/cusContactedit'); ?>

        </div>


        <div id="cusNotifications" class="tab-pane fade">

          <?php echo $this->include('customers/cusNotificationsedit');  ?>

        </div>


        <div id="cusSettings" class="tab-pane fade">

          <?php echo $this->include('customers/cusSettingsedit'); ?>

        </div>

        <div id="cusNotes" class="tab-pane fade">

          <?php echo $this->include('customers/cusNotesedit'); ?>

        </div>

      </div>

    <?php echo form_close(); ?>

    </div>

  </div>

</div>

</div>

<?php echo $this->endSection(); ?>