
            <!-- Content Column -->
            <div class="row">

              <div class="col-lg-12 mb-4">

                <!-- Project Card Example -->

                <div class="card shadow">

                  <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold text-primary">Notes</h6>

                  </div>

                  <div class="card-body">

                    <?php

                    if (!empty($garage)) {
                      $notes = $garage['notes'];
                    }

                    ?>

                    <?php

                    $lblAttributes = ['class' => 'fieldLabel mb-1'];

                  ?>

                    <div class="form-row">

                      <div class="form-group col-md-12">

                        <?php

                        $options = [
                          'name'        => 'notes',
                          'id'          => 'sysnotes_description',
                          'value'       => $notes,
                          'rows'        => '05',
                          'cols'        => '10',
                          'class'       => 'form-control'
                        ];
                        echo form_textarea($options);

                        ?>

                      </div>

                    </div>

                  <div class="col-lg-12 mb-4">

                  <?php echo form_input(array('type'=>'submit','name'=>'updatenotes','value'=>'Save','id'=>'update_notes','class'=>'btn btn-md btn-primary')); ?>

                  </div>

                  </div>

                </div>

            </div>

              <!-- Save Button row -->

          </div>