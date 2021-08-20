<!-- Content Column -->
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Notifications</h6>
      </div>

      <?php
      
      $lblAttributes = ['class' => 'fieldLabel mb-1'];

      $frmattribute = [
        'id' => 'garage_notification',
        'method' => 'post',
      ];

      echo form_open('garage/storeNotifications', $frmattribute);

      ?>

      <?php 
        
        echo form_input(array('type'=>'hidden','name'=>'gid','value'=>$gid));

      ?>

      <div class="card-body">

        <div class="table-responsive">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <thead>

              <tr>

                <th class="firstCol">Type</th>

                <th>Email</th>

                <th>Push</th>

              </tr>

            </thead>

            <tbody>

              <tr>

                <td>Estimation Job Completed</td>

                <td>
                  <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="email" name="notifications[]">
                </td>

                <td>
                  <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="push" name="notifications[]">
                </td>

              </tr>

            </tbody>

          </table>

        </div>

      </div>

      <div class="col-lg-12 mb-4">


      <?php echo form_input(array('type'=>'submit','name'=>'save','value'=>'Save','class'=>'btn btn-md btn-primary')); ?>

      </div>


    <?php echo form_close(); ?>

    </div>

  </div>

  <!-- Save Button row -->

  

</div>