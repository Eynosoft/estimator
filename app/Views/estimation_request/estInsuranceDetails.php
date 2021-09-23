<!-- Content Column -->
<style>
  .glyphicon{
    z-index: 10000;
  }

</style>

<div class="row">

  <div class="col-lg-12 mb-4">

    <!-- Project Card Example -->

    <div class="card shadow">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Insurance Details</h6>

      </div>

      <div class="card-body">

          <div class="form-row">

            <div class="form-group col-md-6">

              <label class="fieldLabel mb-1">Insured's Reference</label>

              <input class="form-control" type="text" name='insured_reference'>

            </div>

            <div class="form-group col-md-6">

              <label class="fieldLabel mb-1">Date of accident</label>

              <input name="date_accident" class="form-control datetimepicker" type="text" />

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">

              <label class="fieldLabel mb-1">Policy number</label>

              <input class="form-control" type="text" name = 'policy_number'>

            </div>

            <div class="form-group col-md-6">

              <label class="fieldLabel mb-1">Claim number</label>

              <input class="form-control" type="text" name= 'claim_number'>

            </div>

          </div>



          <div class="form-row">

            <div class="form-group col-md-4">

              <label class="fieldLabel mb-1">Inspection</label>

              <select name='inspection' class="form-control">

                <option value="Unknown">Unknown</option>

                <option value="Insured Vehicle">Insured Vehicle</option>

                <option value="Third Party Vehicle">Third Party Vehicle</option>

              </select>

            </div>

            <div class="form-group col-md-4">

              <label class="fieldLabel mb-1">Insured amount</label>

              <input class="form-control" type="text" name='insured_amount'>

            </div>

            <div class="form-group col-md-4">

              <label class="fieldLabel mb-1">Exemption amount</label>

              <input class="form-control" type="text" name='exemption_amount'>

            </div>

          </div>


          <div class="form-row">

            <div class="form-group col-md-6">

              <label class="fieldLabel mb-1">Responsibility</label>

              <select name='responsibility' class="form-control">

                <option value="Unknown">Unknown</option>

                <option value="Yes">Yes</option>

                <option value="No">No</option>

              </select>

            </div>

            <div class="form-group col-md-6">

              <label class="fieldLabel mb-1">Liability</label>

              <input class="form-control" type="text" name="liability" placeholder="Enter In %">

            </div>

          </div>

          <!-- Save Button row -->

      </div>
    </div>
  </div>
</div>


