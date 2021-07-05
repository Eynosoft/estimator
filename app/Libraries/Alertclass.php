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

        $this->sessionValue = $this->session->get('message');
        //echo $_SESSION['message'];die('...');
        switch ($this->sessionValue) {
            case 'success':
                $swmessage = 'Record Saved Successfully!';
                $swtype = 'success';
                $swsubmessage = 'Success';
            break;
            default:
                # code...
            break;
        }

        $this->session->remove('message');
        //unset($_SESSION['message']);
        if(!empty($swtype) && !empty($swmessage)) {
            ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
            <script type="text/javascript">
            swal("<?php  echo $swmessage ?>", "<?php  echo $swsubmessage ?>", "<?php  echo $swtype ?>")
            </script>

            <?php
        }
    }
}
