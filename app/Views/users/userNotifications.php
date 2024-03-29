      <!-- Content Column -->
      <div class="row">

        <div class="col-lg-12 mb-4">
          <!-- Project Card Example -->
          <div class="card shadow">

            <div class="card-header py-3">

              <h6 class="m-0 font-weight-bold text-primary">Notifications</h6>

            </div>

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

                          <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="jobcompleted_email" name="usernotifications[]">

                        </td>


                        <td>

                          <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="jobcompleted_push" name="usernotifications[]">

                        </td>

                      </tr>


                      <tr>

                        <td>Estimation Job Work Order</td>

                        <td>
                          <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="work_order_email" name="usernotifications[]">
                        </td>

                        <td>
                          <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="work_order_push" name="usernotifications[]">
                        </td>

                      </tr>


                      <tr>

                        <td>Estimation Request External Created</td>

                        <td>
                          <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="request_created_email" name="usernotifications[]">
                        </td>

                        <td>
                          <input type="checkbox" checked data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" value="request_created_push" name="usernotifications[]">
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