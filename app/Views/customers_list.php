<?php echo $this->extend('template/layout_main'); ?>

<?php echo $this->section('content');  ?>


<div class="container-fluid">
  <!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">Customer List</h1>
    <a class="btn btn-primary" href="<?php echo base_url('Customer/create'); ?>">Add Customer</a>

  </div>

  <!-- DataTales Example -->

  <div class="card shadow mb-4">

    <div class="card-header py-3">

      <h6 class="m-0 font-weight-bold text-primary">Customer List</h6>

    </div>

    <div class="card-body">

      <div class="table-responsive">

        <table class="table table-bordered" id="users-list" width="100%" cellspacing="0">

          <thead>

            <tr>

              <th style="width: 50px;">S.No</th>

              <th>Client name</th>

              <th>Emails</th>

              <th>Mobile</th>

              <th>Faxes</th>

              <th>Locale</th>

              <th style="width: 70px;">Actions</th>

            </tr>

          </thead>

          <tbody>

            <?php if($customer): ?>

            <?php foreach($customer as $row): ?>

            <tr>

              <td><?php echo $row['id']; ?></td>

              <td><?php echo $row['client_name']; ?></td>

              <td><?php echo $row['emails']; ?></td>

              <td><?php echo $row['mobile']; ?></td>

              <td><?php echo $row['fax']; ?></td>

              <td><?php echo $row['locale']; ?></td>

              <td class="actionCol">

                <a class="btn btn-datatable btn-icon btn-transparent-dark mr-2"
                  href="<?php echo base_url('Customer/create').'/'.$row['id']; ?>">

                  <i class="fa fa-pencil" aria-hidden="true"></i>

                </a>

                <a class="btn btn-datatable btn-icon btn-transparent-dark"
                  href="<?php echo base_url('Customer/delete').'/'.$row['id']; ?>"><i class="fa fa-trash-o"
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
      $('#users-list').DataTable();
  });
</script>



<?php echo $this->endSection() ?>