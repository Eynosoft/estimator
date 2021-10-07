<!-- Content Column -->
<div class="row">

  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">
      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Garage</h6>

      </div>
      <div class="card-body">

        <div class="form-row">

          <div class="form-group col-md-12">

            <label class="fieldLabel mb-1">Garage</label>

            <select style="max-width: 600px;" class="search form-control" name="garage"></select>

          </div>

        </div>
        <!-- Save Button row -->
      </div>

    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
  $('.search').select2({
    placeholder: '--- Choose Garage  ---',
    ajax: {
      url: '<?php echo base_url('garage/ajaxSearch'); ?>',
      dataType: 'json',
      delay: 250,
      processResults: function(data) {
        return {
          results: data
        };
      },
      cache: true
    }
  });
</script>
