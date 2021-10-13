<?php echo $this->extend('template/layout_main'); ?>
<?php echo $this->section('content'); ?>

<!-- Begin Page Content -->

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">Reports</h1>

  </div>

  <div class="row">

    <!-- Left Column -->

    <div class="col-lg-4 mb-4">
      <!-- Left Other HTML -->

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Pages</h6>

        </div>

        <div class="card-body">

          <div class="vertical-menu">

            <a href="#" class="active">Estimations</a>

            <a href="#">Estimations without quotation</a>

          </div>

        </div>

      </div>

    </div>

    <!-- Right Column -->

    <div class="col-lg-8 mb-4">

      <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Estimations</h6>

        </div>

        <div class="card-body">

          <?php

          $frmattribute = [
            'id' => 'report_generate',
            'method' => 'post',
          ];

          echo form_open('reports/estimation_report', $frmattribute);

          ?>

          <div class="form-row">

            <div class="form-group col-md-12">

              <label class="fieldLabel mb-1">Customer</label>

              <?php

              $frmattribute = [
                'class' => 'form-control',
              ];

              ?>

              <?php $options = $customer; ?>

              <?php echo form_dropdown('customer', $options, '', $frmattribute); ?>

            </div>

          </div>


          <div class="form-row">

            <div class="form-group col-md-12">

              <label class="fieldLabel mb-1">Data Filter</label>

              <select class="form-control">

                <option>Requested</option>

                <option>Unrequested</option>

              </select>

            </div>

          </div>


          <div class="form-row">

            <div class="form-group col-md-6">

              <label class="fieldLabel mb-1">From</label>

              <input name='form_date' class="form-control" type="datetime-local" id="birthdaytime" name="birthdaytime">

            </div>

            <div class="form-group col-md-6">

              <label class="fieldLabel mb-1">To</label>

              <input name='till_date' class="form-control" type="datetime-local" id="birthdaytime" name="birthdaytime">

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-12">

              <label class="fieldLabel mb-1">Setting</label>

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <tbody>

                    <tr>

                    <td>Show unassigned requests</td>

                      <td style="width: 40px;">
                        <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" value="0" name="unassigned">
                      </td>

                    </tr>

                    <tr>

                    <td>Show estimators analysis</td>

                    <td style="width: 40px;"><input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" value="1" name="assigned"></td>

                    </tr>

                  </tbody>

                </table>

              </div>

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-12">

              <label class="fieldLabel mb-1">Permissions</label>

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <tbody>

                    <tr>

                      <td><input type="text" placeholder="Search..." class="form-control"></td>

                      <td style="width: 40px;"> <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" value="1" name="status"></td>

                    </tr>

                  </tbody>

                </table>



                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <tbody>

                    <tr>

                      <td>Complete</td>

                      <td style="width: 40px;"> <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" value="3" name="status_completed"></td>

                    </tr>

                    <tr>

                      <td>Finish</td>

                      <td style="width: 40px;">
                        <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" value="4" name="status_finished">
                      </td>

                    </tr>

                    <tr>

                      <td>In progress</td>

                      <td style="width: 40px;">
                        <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" value="2" name="status_progress">
                      </td>

                    </tr>

                    <tr>

                      <td>Pending</td>

                      <td style="width: 40px;">
                        <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" value="1" name="status_pending">
                      </td>

                    </tr>

                  </tbody>

                </table>

              </div>

            </div>

          </div>

          <!-- Save Button row -->

          <div class="row">

            <div class="col-lg-12 mb-4">

              <button type="submit" class="btn btn-md btn-primary">Submit</button>

            </div>

          </div>

          <?php echo form_close(); ?>

        </div>

      </div>

    </div>

  </div>

  <!-- /.container-fluid -->



  <?php echo $this->endSection(); ?>