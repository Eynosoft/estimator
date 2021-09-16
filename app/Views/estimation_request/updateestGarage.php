<!-- Content Column -->
<div class="row">
  
  <div class="col-lg-12 mb-4">
    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Garage</h6>

      </div>

      <div class="card-body">

    <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

        <div class="form-row">

          <div class="form-group col-md-12">

            <label class="fieldLabel mb-1">Garage</label>

            <input type="text" name="" class="form-control" placeholder="Search Garage" id="autocompleteuser">

          </div>

        </div>

        <!-- Save Button row -->

        <div class="row">

          <div class="col-lg-12 mb-4">

            <button type="button" class="btn btn-md btn-primary">Save</button>

          </div>

        </div>

      </div>

    </div>
  </div>
</div>