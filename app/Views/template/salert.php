<?php 

$swmessage = '';
$swtype = '';
$swsubmessage = '';

if(isset($_SESSION['message']) && !empty($_SESSION['message']))
{
  switch($_SESSION['message'])
  {
    case 'success':
      $swmessage = 'Record Saved Successfully!';
      $swtype = 'success';
      $swsubmessage = 'Success';
    break;

    case 'usuccess':
      $swmessage = 'Record Updated Successfully!';
      $swtype = 'success';
      $swsubmessage = 'Success';
    break;

    case 'uerror':
      $swmessage = 'Record Not Updated!';
      $swtype = 'error';
      $swsubmessage = 'Something Went Wrong';
    break;

    case 'error':
      $swmessage = 'Record Not Saved!';
      $swtype = 'error';
      $swsubmessage = 'Something Went Wrong';
    break;

    case 'dsuccess':
      $swmessage = 'Record Deleted Successfully!';
      $swtype = 'success';
      $swsubmessage = 'Success';
    break;

    case 'derror':
      $swmessage = 'Record Not Deleted!';
      $swtype = 'error';
      $swsubmessage = 'Something Went Wrong';
    break;

    case 'emailsuccess':
      $swmessage = 'Email has been sent successfully';
      $swtype = 'success';
      $swsubmessage = 'Success';
    break;

    case 'uemailsuccess':
      $swmessage = 'Email Not Sent';
      $swtype = 'error';
      $swsubmessage = 'Something Went Wrong';
    break;

  }

}

unset($_SESSION['message']);

if(!empty($swtype) && !empty($swmessage))
{

?>

<script type="text/javascript">
swal("<?php echo $swmessage ?>", "<?php echo $swsubmessage ?>", "<?php echo $swtype ?>")
</script>

<?php  }  ?>


