<?php echo  $this->extend('template/layout_main'); ?>
<?php echo  $this->section('content'); ?>

<div class="container-fluid">

  <!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">Users List</h1>
    <a href="<?php echo base_url('users/create/'); ?>" class="btn btn-primary">Create New User</a>

  </div>

  <!-- DataTales Example -->

  <div class="card shadow mb-4">

    <div class="card-body">

      <div class="table-responsive">

        <table class="table table-bordered" id="user-list" width="100%" cellspacing="0">

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

              <th>Action</th>

            </tr>

          </thead>

          <tbody>

          <?php

          if(!empty($user)) :

            $count = 1;
            foreach($user as $row) :

            ?>

                <tr>

                  <td><?php echo $count; ?></td>

                  <td><?php echo $row['user_name']; ?></td>

                  <td><?php echo $row['locale']; ?></td>

                  <td><img src="<?php echo base_url('') ?>/assets/uploads/<?php echo $row['contact_signature']; ?>" height="70" width="100"></td>

                  <td><?php echo $row['email']; ?></td>

                  <td><?php echo $row['mobile']; ?></td>

                  <td><?php echo $row['land_line']; ?></td>

                  <td><?php echo $row['fax']; ?></td>

                  <td class="actionCol">

                    <a class="btn btn-datatable btn-icon btn-transparent-dark mr-2" href="#">

                      <i class="fa fa-eye" aria-hidden="true"></i>

                    </a>

                  </td>

                  <td class="actionCol">

                    <a class="btn btn-datatable btn-icon btn-transparent-dark mr-2" href="<?php echo base_url('users/update_user') . '/' . $row['id']; ?>">

                    <i class="fa fa-pencil" aria-hidden="true"></i>

                    </a>

                    <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?php echo base_url('users/delete') . '/' . $row['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>
                    
                  </a>

                  </td>

                </tr>

                <?php $count++;  ?>

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
    $('#user-list').DataTable();
  });
</script>

<!-- /.container-fluid -->

<?php echo  $this->endSection(); ?>