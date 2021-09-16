<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Result;
use CodeIgniter\Model;

class CustomerModel extends Model
{
	protected $table = 'customer';
	protected $primaryKey = 'id';
	protected $allowedFields = ['client_name', 'locale', 'report_password', 'emails', 'mobile', 'land_line', 'fax', 'notifications','doc_type','created_at', 'updated_at'];
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
		parent::__construct();
	}

	// ------------------------------------------------------------------------------------------//
	// Get dropdown starts 

	function masterGetAllData()
	{
		$customer = new CustomerModel();
		try {
			return $customer->findAll();
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	// Get Dropdown Ends 
	// --------------------------------------------------------------------------------------------//


	// ---------------------------------------------------------------------------------------------//
	// Get All Customers Data 

	public function getAllCustomerData()
	{
		try {
			$customer_data = $this->findAll();
			return $customer_data;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
		return false;
	}

	// Get all Customers Data Ends 
	//-----------------------------------------------------------------------------------------------//


	// ---------------------------------------------------------------------------------------------//
	// Insert and Update the customer data starts

	public function insertcustomer($data = null, $id = null)
	{
		try {
			if (!empty($id)) {
				if ($this->update($id, $data)) {
					return true;
				} else {
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
	//----------------------------------------------------------------------------------------------//


	// ----------------------------------------------------------------------------------------------//
	// Get Customer Name by id starts

	public function	getCustomerNameById($id)
	{
		try {
			$customer_data = $this->where('id', $id)
				->findColumn('client_name');
			return $customer_data[0];
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	// Get Customer name by id Ends 
	// ----------------------------------------------------------------------------------------------//

	// ---------------------------------------------------------------------------------------------//
	// Get Customer data by id starts

	public function getCustomersDataById($id = null)
	{
		try {
			$customer_data = $this->where('id', $id)->findAll();
			if(!empty($customer_data)){
				foreach ($customer_data as $data) {
					$customer['id'] = $data['id'];
					$customer['client_name'] = $data['client_name'];
					$customer['locale'] = $data['locale'];
					$customer_data['report_password'] = $data['report_password'];
					$customer['emails'] = $data['emails'];
					$customer['mobile'] = $data['mobile'];
					$customer['land_line'] = $data['land_line'];
					$customer['fax'] = $data['fax'];
					$customer['doc_type'] = json_decode($data['doc_type']);
					$customer['notifications'] = json_decode($data['notifications']);
				}
			}
			return $customer;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	// Get customer Data by customer is ends
	// --------------------------------------------------------------------------------//


	// --------------------------------------------------------------------------------//
	// Get dropdown list 

	function setCustomerDropdown()
	{
		$customerData = $this->masterGetAllData();
		$options = array('' => 'Select Options');
		if (!empty($customerData)) {
			foreach ($customerData as $cData) {
				$options[$cData['id']] = $cData['client_name'];
			}
		}
		return $options;
	}

	// Get dropdown list
	// --------------------------------------------------------------------------------//


	// --------------------------------------------------------------------------------//
	// Delete Customer Data Starts

	public function deleteCustomer($id = null)
	{
		try {
			$result = $this->where('id', $id)->delete($id);
			return $result;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	// Delete Customer data Ends
	// -------------------------------------------------------------------------------//

}
