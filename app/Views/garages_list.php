<?php echo $this->extend('template/layout_main'); ?>

<?php echo $this->section('content');  ?>

<div class="container-fluid">

<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">

  <h1 class="h3 mb-0 text-gray-800">Garages</h1>
  <a class="btn btn-primary" href="<?php echo base_url('Garage/create'); ?>">Add Garage</a>

</div>

<!-- DataTales Example -->

<div class="card shadow mb-4">

  <div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-primary">Garages List</h6>

  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="garage-list" width="100%" cellspacing="0">

        <thead>

          <tr>

            <th style="width: 50px;">S.No</th>

            <th>Garage name</th>

            <th>Owner</th>

            <th>Landlines</th>

            <th>Mobiles</th>

            <th>Faxes</th>

            <th style="width: 70px;">Actions</th>

          </tr>

      </thead>

        <tbody>

            <?php if($garage): ?>

            <?php foreach($garage as $row): ?>

            <tr>

              <td><?php echo $row['id']; ?></td>

              <td><?php echo $row['garage_name']; ?></td>

              <td><?php echo $row['owner_name']; ?></td>

              <td><?php echo $row['landline']; ?></td>

              <td><?php echo $row['mobile']; ?></td>

              <td><?php echo $row['fax']; ?></td>

              <td class="actionCol">

                <a class="btn btn-datatavle btn-icon btn-transparent-dark mr-2" href="<?php echo base_url('Garage/view').'/'.$row['id']; ?>">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </a>

                <a class="btn btn-datatable btn-icon btn-transparent-dark"
                  href="<?php echo base_url('Garage/delete').'/'.$row['id']; ?>"><i class="fa fa-trash-o"
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
      $('#garage-list').DataTable();
  });
</script>


<?php echo $this->endSection(); ?>