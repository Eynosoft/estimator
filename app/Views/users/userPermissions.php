    <!-- Content Column -->
    <div class="row">
      <div class="col-lg-12 mb-4">
        <!-- Project Card Example -->
        <div class="card shadow">

          <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>

          </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <tbody>

                    <tr>

                      <th colspan="2">Permissions</th>

                    </tr>

                    <tr>

                      <td><input type="text" placeholder="Search..." class="form-control"></td>

                      <td style="width: 40px;">
                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="all" name="permissions[]">
                      </td>

                    </tr>

                  </tbody>

                </table>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <tbody>

                    <tr>

                      <td>Contact</td>

                      <td style="width: 40px;">

                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="contact" name="permissions[]">

                      </td>

                    </tr>

                    <tr>

                      <td>Customers</td>

                      <td style="width: 40px;">
                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="customers" name="permissions[]">
                      </td>

                    </tr>

                    <tr>

                      <td>Estimations</td>

                      <td style="width: 40px;">
                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="estimations" name="permissions[]">
                      </td>

                    </tr>

                    <tr>

                      <td>Externals</td>

                      <td style="width: 40px;">
                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="externals" name="permissions[]">
                      </td>

                    </tr>

                    <tr>

                      <td>Finish Jobs</td>

                      <td style="width: 40px;">

                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="finish_job" name="permissions[]">

                      </td>

                    </tr>

                    <tr>

                      <td>Garages</td>

                      <td style="width: 40px;">

                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="garages" name="permissions[]">

                      </td>

                    </tr>

                    <tr>

                      <td>Links</td>

                      <td style="width: 40px;">

                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="links" name="permissions[]">

                      </td>

                    </tr>

                    <tr>

                      <td>Lists</td>

                      <td style="width: 40px;">
                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="list" name="permissions[]">
                      </td>

                    </tr>

                    <tr>

                      <td>Reports</td>

                      <td style="width: 40px;">
                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="reports" name="permissions[]">
                      </td>

                    </tr>

                    <tr>

                      <td>Requests</td>

                      <td style="width: 40px;">

                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="requests" name="permissions[]">

                      </td>

                    </tr>

                    <tr>

                      <td>Users</td>

                      <td style="width: 40px;">

                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="users" name="permissions[]">

                      </td>

                    </tr>

                    <tr>

                      <td>Vehicles</td>
                      <td style="width: 40px;">
                        <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="vehicles" name="permissions[]">
                      </td>

                    </tr>

                  </tbody>

                </table>

              </div>

              <div class="col-lg-12 mb-4">

                <?php echo form_input(
                  array('type' => 'submit', 'value' => 'Save', 'name' => 'user', 'class' => 'btn btn-md btn-primary', 'id' => 'user_create')
                ) ?>

              </div>
            </div>

        </div>

      </div>

    </div>