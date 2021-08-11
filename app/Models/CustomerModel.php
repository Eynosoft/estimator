<?php

namespace App\Models;
use CodeIgniter\Database\MySQLi\Result;
use CodeIgniter\Model;

class CustomerModel extends Model
{
	protected $table = 'customer';
	protected $primaryKey = 'id';
	protected $allowedFields = ['client_name', 'locale', 'report_password', 'emails', 'mobile', 'land_line', 'fax', 'notes'];
	protected $skipValidation   =    false;
  protected $allowCallbacks       = true;
  protected $beforeInsert         = [];
  protected $afterInsert          = [];
  protected $beforeUpdate         = [];
  protected $afterUpdate          = [];
  protected $beforeFind           = [];
  protected $afterFind            = [];
  protected $beforeDelete         = [];
  protected $afterDelete          = [];


	function __construct()
	{
		parent:: __construct();
	}

// Get dropdown
 
	function masterGetAllData() {
		$customer = new CustomerModel();
			try{
			return $customer->findAll();
			}
			catch (\Exception $e) {
			die($e->getMessage());
			}	
		}

// Insert and Update the csutomer data starts

	public function insertcustomer($data = null, $id = null)
  {
    try {
      if(!empty($id)) {
       if($this->update($this->update($id, $data))) {
          return true;
         }  else {
          return $this->errors();
        }
      } else {

        if ($this->save($data)) {
          $customer_id = $this->getInsertID();
          return $customer_id;
        } else {
          return $this->errors();
        }
      }
     } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }


	// Insert and update the customer data ends

	public function	getCustomerNameById($id) {
		try {
		 $customer_data = $this->where('id', $id)
			->findColumn('client_name');
			return $customer_data[0];
		}

		catch (\Exception $e) {
			die($e->getMessage());
  	}

	}
  
	// Get dropdown list 

		function setCustomerDropdown() {
				$customerData = $this->masterGetAllData();
				$options = array('' => 'Select Options');
				if(!empty($customerData)) {
				foreach($customerData as $cData) {
				$options[$cData['id']] = $cData['client_name'];
			   }
		}
		return $options;

	}

		//Get dropdown list

}
