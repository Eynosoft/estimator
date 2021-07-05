<?php echo $this->extend('template/layout_main'); ?>

<?php echo $this->section('content'); ?>

        <!-- Begin Page Content -->

        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h1 class="h3 mb-0 text-gray-800">Vehicles List</h1>

          </div>

          <!-- DataTales Example -->

          <div class="card shadow mb-4">

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      <th style="width: 50px;">S.No</th>

                      <th>Registration Plate</th>

                      <th>Registration Date</th>

                      <th>Manufacture Date</th>

                      <th>Vin Number</th>

                      <th>Model</th>

                      <th style="width: 70px;">View</th>

                      <th>Action</th>

                    </tr>

                  </thead>

                  <tbody>

                  <?php if($vehicle): ?>
                    
                  <?php foreach($vehicle as $row): ?>

                    <tr>

                      <td><?php echo $row['id']; ?></td>

                      <td><?php echo $row['registration_plate']; ?></td>

                      <td><?php echo $row['registration_date']; ?></td>

                      <td><?php echo $row['manufacturing_date'] ?></td>

                      <td><?php echo $row['vin_number']; ?></td>

                      <td><?php echo $row['model']; ?></td>

                      <td class="actionCol">

                         <a class="btn btn-datatable btn-icon btn-transparent-dark mr-2" href="javascript:void(0)" data-url="<?php echo base_url('Vehicles/View/').'/'.$row['id']; ?>" data-toggle="modal" data-target="#vehicleModal">

                         <i class="fa fa-eye" aria-hidden="true"></i>

                        </a>

                      </td>

                      <td class="actionCol">

                        <a class="btn btn-datatable btn-icon btn-transparent-dark mr-2"
                          href="<?php echo base_url('Vehicles/create').'/'.$row['id']; ?>">

                          <i class="fa fa-pencil" aria-hidden="true"></i>

                        </a>

                        <a class="btn btn-datatable btn-icon btn-transparent-dark"
                          href="<?php echo base_url('Vehicles/delete').'/'.$row['id']; ?>"><i class="fa fa-trash-o"
                            aria-hidden="true"></i>
                        </a>

                      </td>


                    </tr>

                  <?php endforeach; ?>
                  <?php endif; ?>

                   
                  </tbody>

                </table>

                 <div class="col-sm-12 col-md-7">

                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">

                       <ul class="pagination">

                          <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>

                          <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>

                          <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>

                          <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>

                          <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>

                          <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>

                          <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>

                          <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>

                       </ul>

                    </div>

              </div>

              </div>

            </div>

          </div>


        </div>

        <!-- /.container-fluid -->


<?php echo $this->endSection(); ?>