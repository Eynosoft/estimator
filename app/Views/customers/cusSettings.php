<br>
<div class="col-md-12">
    <div class="row">

            <div class="col-md-6" style="text-align: left;">
                <h4>List Documents</h4>
            </div>
        <div class="col-md-6" style="text-align: right;">
           <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#documentsModal">Add Documents</button>
        </div>
</div>
</div><br>

<div class="row">
  <div class="col-lg-12 mb-4">

    <!-- Project Card Example -->
    <div class="card shadow">

      <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">Settings</h6>

      </div>

      <div class="card-body">

        <div class="table-responsive">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <!-- <tbody>

              <tr>

                <td style="width: 96%;">Images As Attachment </td>
                <td><input type="checkbox"></td>

              </tr>

              <tr>

                <td>Documents As Attachment</td>

                <td><input type="checkbox"></td>

              </tr> -->

            </tbody>

          </table>

        </div>

      </div>

    </div>

  </div>

  <!-- Save Button row -->

  <div class="col-lg-12 mb-4">

    <button type="button" class="btn btn-md btn-primary">Save</button>

  </div>

</div>

<!-- Modal -->

<style>

.kv-file-upload
{
    display: none !important;
}

</style>

<div id="documentsModal" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Add Documents</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>      
            
            <div class="modal-body">

            <div class="form-group">
                    <div class="dropzone dz-clickable" id="myDrop">
                        <div class="dz-default dz-message" data-dz-message="">
                            <span>Click Here for Browse or <br> Drop files here to upload</span>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <button type="submit" id="add_file" class="btn btn-primary" name="submit"><i class="fa fa-upload"></i> Upload Files</button>        
            </div>

            </div>
        </div>
    </div>
</div>
</div>

<?php 

$method = base_url('Customer/insertDocuments');

?>

<link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>
<script>
	//Dropzone script
   $(document).ready(function(){
       $("#add_file").on('click',function(e){
           e.preventDefault();
       })
   });
	Dropzone.autoDiscover = false;
	var myDropzone = new Dropzone("div#myDrop", 
	 { 
		 paramName: "files", // The name that will be used to transfer the file
		 addRemoveLinks: true,
         timeout: 200000,
		 uploadMultiple: true,
		 autoProcessQueue: false,
		 parallelUploads: 50,
		 maxFilesize: 1024, // MB
		 acceptedFiles: ".png, .jpeg, .jpg, .gif, .pdf , .doc, .docx , .xls, .xlsx",
		 url: "<?php echo $method; ?>",
	 });

	 /* Add Files Script*/
	 myDropzone.on("success", function(file, message){
		//$("#msg").html(message);
                swal({
                title: "File Inserted Successfully..!",
                text: "Message!",
                type: "success",
                dangerMode: true,  
                buttons: true
                },
                function(){
                  $(".close").trigger('click');
                  window.location.href= document.getElementById("redirectDocUrl").value;
                }
                ); 
	    });
	 
	 myDropzone.on("error", function (data) {
		 $("#msg").html('<div class="alert alert-danger">There is some thing wrong, Please try again!</div>');
	 });
	 
	 myDropzone.on("complete", function(file) {
		myDropzone.removeFile(file);
	 });
	 
	 $("#add_file").on("click",function (){
		myDropzone.processQueue();
	 });

	</script>   


