<?php echo $this->extend('template/layout_main'); ?>

<?php echo $this->section('content'); ?>

        <!-- Begin Page Content -->

        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="d-sm-flex align-items-center justify-content-between mb-4">

          <h1 class="h3 mb-0 text-gray-800">Vehicles List</h1>
          <a class="btn btn-primary" href="<?php echo base_url('Vehicles/create'); ?>">Add Vehicle</a>

          </div>

          <!-- DataTales Example -->

          <div class="card shadow mb-4">

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="vehicle-list" width="100%" cellspacing="0">

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

                    <?php   

                    $created = $row['registration_date'];
                    $newDate = date("d-m-Y", strtotime($created));

                    $created_manufac = $row['manufacturing_date'];
                    $manufacturing_date = date("d-m-Y",strtotime($created_manufac));

                    ?>

                      <td><?php echo $newDate;  ?></td>

                      <td><?php echo $manufacturing_date; ?></td>

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

              </div>

            </div>

          </div>

        </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
   $(document).ready(function() {
     $('#vehicle-list').DataTable();
   })
</script>

<!-- /.container-fluid -->

<?php echo $this->endSection(); ?>