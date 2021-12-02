<?php echo  $this->include('template/header'); ?>

<?php echo $this->include('template/side_bar'); ?>

<?php echo $this->include('template/top_bar'); ?>


  <div class="container-fluid">

  <?= $this->renderSection('content') ?>

  </div>


<?php echo $this->include('template/footer'); ?>
<?php echo $this->include('template/salert'); ?>