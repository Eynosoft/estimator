<?php echo $this->extend('template/layout_main'); ?>
  <?php echo $this->section('content'); ?>

  <!-- Begin Page Content -->

  <div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

      <h1 class="h3 mb-0 text-gray-800">Update User</h1>

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

            <li class="active"><a data-toggle="tab" href="#updateuserContact">Contact</a></li>

            <li><a data-toggle="tab" href="#updateuserNotifications">Notifications</a></li>

            <li><a data-toggle="tab" href="#userAccount">Account</a></li>

            <li><a data-toggle="tab" href="#updateuserPermissions">Permissions</a></li>

          </ul>

          <?php

          $frmattribute = [
            'id' => 'user_create',  //imageupload
            'method' => 'post',
            'enctype' => 'multipart/form-data',
            //'class' => 'dropzone',
          ];

          echo form_open('users/store', $frmattribute);

          ?>

          <div class="tab-content">

            <div id="updateuserContact" class="tab-pane fade in active">
              <?php echo $this->include('users/updateuserContact'); ?>
            </div>

            <div id="updateuserNotifications" class="tab-pane fade">
              <?php echo $this->include('users/updateuserNotifications'); ?>
            </div>

            <div id="userAccount" class="tab-pane fade">
              <?php echo $this->include('users/updateuserAccount'); ?>
            </div>


            <div id="updateuserPermissions" class="tab-pane fade">

              <?php echo $this->include('users/updateuserPermissions'); ?>

            </div>

          </div>

          <?php echo form_close(); ?>
          
        </div>

      </div>

    </div>

  </div>
  <!-- /.container-fluid -->

  <?php echo $this->endSection(); ?>