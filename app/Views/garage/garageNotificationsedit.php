<!-- Content Column -->
<br>

<div class="row">

  <div class="col-lg-12 mb-4">

    <!-- Project Card Example -->

    <div class="card shadow">
      
      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Notifications</h6>

      </div>

      <?php

      $gid = $garage['id'];
      if (!empty($garage['notifications'])) {
        for ($i = 0; $i < count($garage['notifications']); $i++) {
          if (isset($garage['notifications'][$i]) && ($garage['notifications'][$i] == 'email')) {
            $email = 'checked';
          } else {
            $push = 'checked';
          }
        }
      }

      ?>

      <div class="card-body">

        <?php

        $lblAttributes = ['class' => 'fieldLabel mb-1'];

        ?>

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
                  <input type="checkbox" <?php echo $email; ?> data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="email" name="notifications[]">
                </td>

                <td>
                  <input type="checkbox" <?php echo $push; ?> data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="push" name="notifications[]">
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