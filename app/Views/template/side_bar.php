<!-- Side Bar section starts  -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Dashboard'); ?>">

  <div class="sidebar-brand-icon rotate-n-15">

    <i class="fa fa-laugh-wink"></i>

  </div>

  <div class="sidebar-brand-text mx-3">Estimation Program</div>

</a>

<!-- Divider -->

<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">

  <a class="nav-link" href="<?php echo base_url('dashboard/'); ?>">

    <i class="fa fa-home" aria-hidden="true"></i>

    <span>Dashboard</span>

  </a>

</li>

<!-- Nav Item - Pages Collapse Menu -->

<li class="nav-item">

  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
    aria-controls="collapseOne">

    <i class="fa fa-users" aria-hidden="true"></i>

  <span>Customers</span>

  </a>

  <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

    <div class="py-2 collapse-inner">

      <a class="collapse-item" href="<?php echo base_url('customer'); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i>
        List</a>

      <a class="collapse-item" href="<?php echo base_url('customer/create/'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>Create</a>

    </div>

  </div>

</li>

<!-- List and create section of the garage starts -->

<li class="nav-item">

  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOnegarage"
    aria-expanded="true" aria-controls="collapseOne">

    <i class="fa fa-wrench" aria-hidden="true"></i>
    <span>Garage</span>

  </a>

  <div id="collapseOnegarage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

    <div class="py-2 collapse-inner">

      <a class="collapse-item" href="<?php echo base_url('garage'); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i>
        List</a>

      <a class="collapse-item" href="<?php echo base_url('garage/create/') ?>"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>

    </div>

  </div>

</li>

<!-- List and creat section of the garage ends -->

<!-- Nav Item - Pages Collapse Menu -->

<li class="nav-item">

  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

    <i class="fa fa-car" aria-hidden="true"></i>

    <span>Vehicles</span>

  </a>

  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

    <div class="py-2 collapse-inner">

      <a class="collapse-item" href="<?php echo base_url('vehicles'); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i>
        List
      </a>

      <a class="collapse-item" href="<?php echo base_url('vehicles/create/'); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>

    </div>

  </div>

</li>

<!--Nav Item - Pages Collapse Menu -->

<li class="nav-item">

  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">

<i class="fa fa-users" aria-hidden="true"></i>
  <span>Users</span>

  </a>

<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

    <div class="py-2 collapse-inner">

      <a class="collapse-item" href="<?php echo base_url('users'); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i> List</a>

      <a class="collapse-item" href="<?php echo base_url('users/create/'); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>

    </div>

</div>

</li>

<!-- Nav Item - Pages Collapse Menu -->

<li class="nav-item">

  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">

    <i class="fa fa-file-text-o" aria-hidden="true"></i>

  <span>Requests</span>

  </a>

  <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

    <div class="py-2 collapse-inner">

      <a class="collapse-item" href="<?php echo base_url('requests/'); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i>
        List</a>

      <a class="collapse-item" href="<?php echo base_url('requests/create/'); ?>"><i class="fa fa-plus" aria-hidden="true"></i> New
        estimation request</a>

    </div>

  </div>

</li>

<!-- Nav Item - Pages Collapse Menu -->

<li class="nav-item">

  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
    aria-controls="collapseFive">

    <i class="fa fa-rocket" aria-hidden="true"></i>

    <span>Jobs</span>

  </a>

  <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

    <div class="py-2 collapse-inner">

      <a class="collapse-item" href="<?php echo base_url('jobsestimation/'); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i>
        Estimations</a>

    </div>

  </div>

</li>

<!-- Nav Item - Pages Collapse Menu -->

<!-- <li class="nav-item">

  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true"
    aria-controls="collapseSix">

    <i class="fa fa-link" aria-hidden="true"></i>

    <span>Links</span>

  </a>

  <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

    <div class="py-2 collapse-inner">

      <a class="collapse-item" href="/links/links-estimations.php"><i class="fa fa-chevron-right"
          aria-hidden="true"></i> Estimations</a>

    </div>

  </div>

</li> -->

<!-- Nav Item - Pages Collapse Menu -->

<li class="nav-item active">

  <a class="nav-link" href="<?php echo base_url('reports'); ?>">

    <i class="fa fa-files-o" aria-hidden="true"></i>

    <span>Reports</span>

  </a>

</li>
<!-- Divider -->


<li class="nav-item">

  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFourlist" aria-expanded="true" aria-controls="collapseFour">

    <i class="fa fa-file-text-o" aria-hidden="true"></i>

  <span>Lists</span>

  </a>

  <div id="collapseFourlist" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

    <div class="py-2 collapse-inner">

      <a class="collapse-item" href="<?php echo base_url('parts/'); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i>Parts</a>

      <a class="collapse-item" href="<?php echo base_url('parts/partsaction/') ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i>Parts Actions</a>

      <a class="collapse-item" href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i>Shortcuts</a>

    </div>

  </div>

</li>

<hr class="sidebar-divider d-none d-md-block">
<!-- Sidebar Toggler (Sidebar) -->

<div class="text-center d-none d-md-inline">

  <button class="rounded-circle border-0" id="sidebarToggle"></button>

</div>

</ul>


<!-- Side bar section ends -->
