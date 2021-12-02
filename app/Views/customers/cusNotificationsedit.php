<!-- Content Column -->
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Notifications</h6>

      </div>

      <?php

      if (!empty($customer)) {
        $customer_id = $customer['id'];
        if (!empty($customer['notifications'])) {
          for ($i = 0; $i < count($customer['notifications']); $i++) {
            if (isset($customer['notifications'][$i]) && ($customer['notifications'][$i] == 'email')) {
              $email = 'checked';
            } else {
              $push = 'checked';
            }
          }
        }
      }

      ?>

      <?php

      echo form_input(array('type' => 'hidden', 'name' => 'customer_id', 'value' => $customer_id));

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

                  <input type="checkbox" <?php echo $email; ?> data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="email" name="notification[]">

                </td>

                <td>

                  <input type="checkbox" <?php echo $push; ?> data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="push" name="notification[]">

                </td>

              </tr>

            </tbody>

          </table>

        </div>

      </div>

    </div>

  </div>

  <!-- Save Button row -->

</div>