<?php

namespace App\Libraries;
use CodeIgniter\Session\Session;

class Alertclass {

    protected $session;
    protected $swmessage;
    protected $swtype;
    protected $swsubmessage;
    protected $sessionValue;

    public function __construct() {
       // initiate the Session library
		$this->session = \Config\Services::session();
        $this->session->start();
        $this->swmessage = '';
        $this->swtype = '';
        $this->swsubmessage = '';
        $this->sessionValue = '';
    }

    public function display() {

    $result  = $this->session->get('message');

    if(!empty($result)) {

        switch($result) {

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

            case 'error':
                $swmessage = 'Record Not Saved!';
                $swtype = 'error';
                $swsubmessage = 'Error';
            break;

            case 'uerror':
                $swmessage = 'Record Not Updated!';
                $swtype = 'error';
                $swsubmessage = 'Something Went Wrong!';
            break;

            case 'dsuccess':
                $swmessage = 'Record Deleted Successfully!';
                $swtype = 'success';
                $swsubmessage = 'Success';
            break;

            case 'derror':
               $swmessage = 'Record Not Deleted!';
               $swtype = 'error';
               $swsubmessage = 'Something went wrong';
            break;

            case 'emailsuccess':
                $swmessage = 'Email has been sent successfully!';
                $swtype = 'success';
                $swsubmessage = 'Success';
            break;

            case 'uemailsuccess':
                $swmessage = 'Email Not Sent';
                $swtype = 'error';
                $swsubmessage = 'Something Went Wrong';
            break;

            default:
            $swmessage = 'OOPs!';
            $swtype = 'error';
            $swsubmessage = 'Something Went Wrong';
            break;
        }
    }

        $this->session->remove('message');

        //unset($_SESSION['message']);

        if(!empty($swtype) && !empty($swmessage)) {
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
            <script type="text/javascript">
            swal("<?php  echo $swmessage ?>", "<?php  echo $swsubmessage ?>", "<?php  echo $swtype ?>")
            </script>

            <?php
        }
    }
}
