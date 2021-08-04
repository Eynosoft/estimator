            <?php

            $lblAttributes = ['class' => 'fieldLabel mb-1'];

            ?>

            <!-- Content Column -->

            <div class="row">

              <div class="col-lg-12 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow">

                  <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold text-primary">Contact</h6>

                  </div>

                  <div class="card-body">

                    <?php

                    $frmAttribute = [
                      'id' => 'vehicle_create',
                      'method' => 'post',
                    ];

                    echo form_open_multipart('Users/store', $frmAttribute);

                    ?>

                    <?php

                    if (!empty($users)) {

                    foreach($users as $row)

                    {

                    ?>

                      <div class="form-row">

                        <div class="form-group col-md-12">

                          <?php echo form_label('User Name', 'User Name', $lblAttributes); ?>
                          <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'user_name', 'name' => 'user_name', 'placeholder' => 'Enter User Name','value' => $row['user_name'])); ?>

                          <?php if (isset($validation)) { ?>

                            <div style="color: red;">
                              <?= $validation->getError('user_name'); ?>
                            </div>

                          <?php

                          }

                          ?>

                        </div>

                      </div>

                      <div class="form-row">

                        <div class="form-group col-md-12">

                          <?php echo form_label('Locale', 'Locale', $lblAttributes); ?>
                          <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'locale', 'name' => 'locale', 'placeholder' => 'Enter Locale','value' => $row['locale'])); ?>

                          <?php if (isset($validation)) { ?>
                            <div style="color: red;">
                              <?= $validation->getError('locale'); ?>
                            </div>

                          <?php

                            }

                          ?>

                        </div>

                      </div>

                      <div class="form-row">

                        <div class="form-group col-md-12">

                          <?php echo form_label('Signature', 'signature', $lblAttributes); ?>
                          <?php echo form_input(array('type' => 'file', 'class' => 'form-control', 'id' => 'signature', 'name' => 'file', 'placeholder' => 'Enter Signature')); ?>

                          <?php if (isset($validation)) { ?>
                            <div style="color: red;">
                              <?= $validation->getError('error'); ?>
                            </div>

                          <?php

                          }

                        ?>

                        </div>

                      </div>

                      <div class="form-row">

                        <div class="form-group col-md-6">
                          <?php echo form_label('Email', 'email', $lblAttributes); ?>
                          <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'email', 'name' => 'email', 'placeholder' => 'Enter Email','value'=>$row['email'])); ?>

                          <span class="noteText">Seperate multiple emails with comma.</span>
                          <?php if (isset($validation)) { ?>
                            <div style="color: red;">
                              <?= $validation->getError('email'); ?>
                            </div>
                          <?php

                          }

                          ?>

                        </div>


                        <div class="form-group col-md-6">

                          <?php echo form_label('Mobile', 'mobile', $lblAttributes); ?>
                          <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'mobile', 'name' => 'mobile', 'placeholder' => 'Enter Mobile','value' => $row['mobile'])); ?>
                          <span class="noteText">Seperate multiple mobile numbers with comma.</span>
                          <?php if (isset($validation)) { ?>
                            <div style="color: red;">
                              <?= $validation->getError('mobile'); ?>
                            </div>
                          <?php
                          }
                          ?>

                        </div>

                      </div>

                      <div class="form-row">

                        <div class="form-group col-md-6">
                          <?php echo form_label('Land Line', 'Land Line', $lblAttributes); ?>
                          <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'land_line', 'name' => 'land_line', 'placeholder' => 'Enter Landline','value'=>$row['land_line'])); ?>
                          <span class="noteText"></span>
                          <?php if (isset($validation)) { ?>
                            <div style="color: red;">
                              <?= $validation->getError('land_line'); ?>
                            </div>
                          <?php
                          }
                          ?>

                        </div>

                        <div class="form-group col-md-6">

                          <?php echo form_label('Fax', 'fax', $lblAttributes); ?>

                          <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'fax', 'name' => 'fax', 'placeholder' => 'Enter Fax','value'=>$row['fax'])); ?>

                          <span class="noteText">Seperate multiple faxes numbers with comma.</span>

                          <?php if (isset($validation)) { ?>
                            <div style="color: red;">
                              <?= $validation->getError('fax'); ?>
                            </div>
                          <?php

                          }

                          ?>

                        </div>

                      </div>

                  </div>

                <?php }  } else {  ?>

                  <div class="form-row">

                    <div class="form-group col-md-12">

                      <?php echo form_label('User Name', 'User Name', $lblAttributes); ?>
                      <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'user_name', 'name' => 'user_name', 'placeholder' => 'Enter User Name')); ?>

                      <?php if (isset($validation)) { ?>
                        <div style="color: red;">
                          <?= $validation->getError('user_name'); ?>
                        </div>
                      <?php

                      }

                      ?>

                    </div>

                  </div>

                  <div class="form-row">

                    <div class="form-group col-md-12">

                      <?php echo form_label('Locale', 'Locale', $lblAttributes); ?>
                      <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'locale', 'name' => 'locale', 'placeholder' => 'Enter Locale')); ?>

                      <?php if (isset($validation)) { ?>
                        <div style="color: red;">
                          <?= $validation->getError('locale'); ?>
                        </div>
                      <?php

                      }

                      ?>

                    </div>

                  </div>

                  <div class="form-row">

                    <div class="form-group col-md-12">

                      <?php echo form_label('Signature', 'signature', $lblAttributes); ?>
                      <?php echo form_input(array('type' => 'file', 'class' => 'form-control', 'id' => 'signature', 'name' => 'file', 'placeholder' => 'Enter Signature')); ?>
                      <?php if (isset($validation)) { ?>
                        <div style="color: red;">
                          <?= $validation->getError('file'); ?>
                        </div>
                      <?php
                      }
                      ?>

                    </div>

                  </div>

                  <div class="form-row">

                    <div class="form-group col-md-6">

                      <?php echo form_label('Email', 'email', $lblAttributes); ?>
                      <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'email', 'name' => 'email', 'placeholder' => 'Enter Email')); ?>
                      <span class="noteText">Seperate multiple emails with comma.</span>
                      <?php if (isset($validation)) { ?>
                        <div style="color: red;">
                          <?= $validation->getError('email'); ?>
                        </div>
                      <?php
                      }
                      ?>

                    </div>

                    <div class="form-group col-md-6">

                      <?php echo form_label('Mobile', 'mobile', $lblAttributes); ?>
                      <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'mobile', 'name' => 'mobile', 'placeholder' => 'Enter Mobile')); ?>
                      <span class="noteText">Seperate multiple mobile numbers with comma.</span>
                      <?php if (isset($validation)) { ?>
                        <div style="color: red;">
                          <?= $validation->getError('mobile'); ?>
                        </div>
                      <?php
                      }
                      ?>

                    </div>

                  </div>

                  <div class="form-row">

                    <div class="form-group col-md-6">
                      <?php echo form_label('Land Line', 'Land Line', $lblAttributes); ?>
                      <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'land_line', 'name' => 'land_line', 'placeholder' => 'Enter Landline')); ?>
                      <span class="noteText"></span>
                      <?php if (isset($validation)) { ?>
                        <div style="color: red;">
                          <?= $validation->getError('land_line'); ?>
                        </div>
                      <?php
                      }
                      ?>

                    </div>


                    <div class="form-group col-md-6">

                      <?php echo form_label('Fax', 'fax', $lblAttributes); ?>
                      <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'id' => 'fax', 'name' => 'fax', 'placeholder' => 'Enter Fax')); ?>
                      <span class="noteText">Seperate multiple faxes numbers with comma.</span>

                      <?php if (isset($validation)) { ?>
                        <div style="color: red;">
                          <?= $validation->getError('fax'); ?>
                        </div>
                      <?php
                      }
                      ?>

                    </div>

                  </div>

                </div>

              <?php } ?>

              </div>

            </div>

            <!-- Save Button row -->

            <div class="col-lg-12 mb-4">

              <?php echo form_submit(array('type' => 'submit', 'class' => 'btn btn-md btn-primary', 'id' => 'saveusercontact', 'value' => 'Save')); ?>

            </div>

            <?php echo form_close(); ?>

            </div>