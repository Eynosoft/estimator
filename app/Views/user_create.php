<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content'); ?>

<!-- Begin Page Content -->

<div class="container-fluid">

  <!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">Add User</h1>

  </div>
  
  <!-- Content Row -->

  <div class="row">

    <div class="col-lg-12 mb-4">

      <div class="tabbable-wrapper">

        <ul class="nav nav-tabs">

          <li class="active"><a data-toggle="tab" href="#userContact">Contact</a></li>

          <li><a data-toggle="tab" href="#userNotifications">Notifications</a></li>

          <li><a data-toggle="tab" href="#userAccount">Account</a></li>

          <li><a data-toggle="tab" href="#userPermissions">Permissions</a></li>

        </ul>

        <div class="tab-content">



          <div id="userContact" class="tab-pane fade in active">

            <?php echo $this->include('users/userContact'); ?>

          </div>



          <div id="userNotifications" class="tab-pane fade">

            <?php echo $this->include('users/userNotifications'); ?>

          </div>



          <div id="userAccount" class="tab-pane fade">

            <?php echo $this->include('users/userAccount'); ?>

          </div>



          <div id="userPermissions" class="tab-pane fade">

            <?php echo $this->include('users/userPermissions'); ?>

          </div>



        </div>

      </div>

    </div>



  </div>



</div>

<!-- /.container-fluid -->



<?php echo $this->endSection(); ?>