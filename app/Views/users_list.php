<?php echo  $this->extend('template/layout_main'); ?>

<?php echo  $this->section('content'); ?>

<div class="container-fluid">

  <!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">Users List</h1>

  </div>

  <!-- DataTales Example -->

  <div class="card shadow mb-4">

    <div class="card-body">

      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          <thead>

            <tr>

              <th style="width: 50px;">S.No</th>

              <th>User Name</th>

              <th>Locale</th>

              <th>Signature</th>

              <th>Email</th>

              <th>Mobile</th>

              <th>Land line</th>

              <th>Fax</th>

              <th style="width: 70px;">View</th>

            </tr>

          </thead>

          <tbody>

            <?php

            if (!empty($user)) :

              $count = 1;
              foreach ($user as $row) :

            ?>

                <tr>

                  <td><?php echo $count; ?></td>

                  <td><?php echo $row['user_name']; ?></td>

                  <td><?php echo $row['locale']; ?></td>

                  <td><?php echo $row['file']; ?></td>

                  <td><?php echo $row['email']; ?></td>

                  <td><?php echo $row['mobile']; ?></td>

                  <td><?php echo $row['land_line']; ?></td>

                  <td><?php echo $row['fax']; ?></td>


                  <td class="actionCol">

                    <a class="btn btn-datatable btn-icon btn-transparent-dark mr-2" href="vehicles-create.php">

                      <i class="fa fa-eye" aria-hidden="true"></i>

                    </a>

                  </td>

                </tr>

                <?php $count++;  ?>

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




<?php echo  $this->endSection(); ?>