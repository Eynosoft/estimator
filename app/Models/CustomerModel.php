<?php

namespace App\Models;
use CodeIgniter\Model;
class CustomerModel extends Model
{
	
	public function __construct()
	{
		parent::__construct();
		$db = \Config\Database::connect();
	}

	protected $table = 'customer';
	protected $primaryKey = 'id';
	protected $allowedFields = ['client_name', 'locale', 'report_password', 'emails', 'mobile', 'land_line', 'fax', 'notes'];

	// Get dropdown

	function masterGetAllData() {
		$customer = new CustomerModel();
		try {
		return $customer->findAll();
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
