<?php

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model
{
	protected $table = 'user';
	protected $primaryKey = 'id';
	protected $allowedFields = ['user_name', 'locale', 'email', 'mobile', 'land_line', 'fax', 'contact_signature', 'contact_signature_type','account_username','account_locale','account_email','	account_mobile','account_landline','account_fax','account_signature','account_signature_type','notifications', 'permissions', 'created_at', 'updated_at'];

// Validation rules

	protected $validationRules = [
		'user_name' => 'required',
		'locale' => 'required',
		'email' => 'required',
		'mobile' => 'required',
		'land_line' => 'required',
		'fax' => 'required',
	];

	// Validation messages

	protected $validationMessages = [
		'user_name' => [
			'required' 	 => 'This field is required',
			'max_length' => 'This field cannot exceed {param} characters in length.',
		],
		'locale' => [
			'required' 	 => 'This field is required',
			'max_length' => 'This field field cannot exceed {param} characters in length.',
		],
		'email' => [
			'required' 	 => 'This field is required',
			'max_length' => 'This field field cannot exceed {param} characters in length.',
		],
		'mobile' => [
			'required'   => 'This field is required',
		],
		'land_line' => [
			'required'   => 'This field is required',
		],
		'fax' => [
			'required' => 'This field is required',
		],
	];

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
		$this->skipValidation 		 =  false;
		parent::__construct();
	}


	//---------------------------------------------------------------------------------------------// 
	// Get Users All Data starts
	

	public function getUsersAllData()
	{
		try {
			$user_data = $this->orderBy('id', 'DESC')->findAll();
			return $user_data;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
		return false;
	}

	//Get Users All Data Ends
	//----------------------------------------------------------------------------------------------//



	//---------------------------------------------------------------------------------------------// 
	// Insert user Model Starts

	public function insertUsersData($data = null, $id = null)
	{
		// This is for the validation rules Starts
		$this->setValidationRules($this->validationRules);
		$this->setValidationMessages($this->validationMessages);
		// This is for the validation rules Ends 
		try {

			if (!empty($id)) {
				if ($this->update($id, $data)) {
					return true;
				} else {
					return $this->errors();
				}
			} else {
				if ($this->save($data)) {
					$uid = $this->getInsertID();
					return $uid;
				} else {
					return $this->errors();
				}
			}
		} catch (\Exception $e) {
			die($e->getMessage());
		}
		return false;
	}

	//Insert User Model Ends
	//----------------------------------------------------------------------------------------------//


	// --------------------------------------------------------------------------------------------//
	// Delete User by Id

	public function deletUserById($id = null)
	{
		try {
			$result = $this->where('id', $id)->delete($id);
			return $result;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}
	// Delete Garage By Id
	// ----------------------------------------------------------------------------------------------// 

	//---------------------------------------------------------------------------------------------//
	//Get Users Data by id Starts

	public function getDataById($id = null)
	{
		try {
			$user_data = $this->where('id', $id)->findAll();
			return $user_data;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	// Get Users Data by id Ends
	//-------------------------------------------------------------------------------------------//

	// Get user Data by Id
	// --------------------------------------------------------------------------------------------//

	public function getUserDataById($id = null)
	{
		try {
			$user_data = $this->where('id', $id)->findAll();
			// echo "<pre>";
			// print_r($user_data);
			// die('####');
			if (!empty($user_data)) {
				foreach ($user_data as $data) {
					$user['id'] = $data['id'];
					$user['user_name'] = $data['user_name'];
					$user['locale'] = $data['locale'];
					$user['emails'] = $data['email'];
					$user['mobile'] = $data['mobile'];
					$user['land_line'] = $data['land_line'];
					$user['fax'] = $data['fax'];
					$user['contact_signature'] = $data['contact_signature'];
					$user['contact_signature_type'] = $data['contact_signature_type'];
					$user['account_username'] = $data['account_username'];
					$user['account_locale'] = $data['account_locale'];
					$user['account_email'] = $data['account_email'];
					$user['account_mobile'] = $data['account_mobile'];
					$user['account_landline'] = $data['account_landline'];
					$user['account_fax'] = $data['account_fax'];
					$user['account_signature'] = $data['account_signature'];
					$user['account_signature_type'] = $data['account_signature_type'];
					$user['notifications'] = json_decode($data['notifications']);
					$user['permissions'] = json_decode($data['permissions']);
					$user['created_at'] = $data['created_at'];
				}
			}
			return $user;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}


	//  Get user Data by id Ends
	// --------------------------------------------------------------------------------------------//

	//  insert image Data start
	// --------------------------------------------------------------------------------------------//

	public function insertImage($data = null, $id = null)
	{
		// This is for the validation rules Starts
		$this->setValidationRules($this->validationRules);
		$this->setValidationMessages($this->validationMessages);
		// This is for the validation rules Ends 
		try {

			if (!empty($id)) {
				if ($this->update($id, $data)) {
					return true;
				} else {
					return $this->errors();
				}
			} else {
				if ($this->save($data)) {
					$uid = $this->getInsertID();
					return $uid;
				} else {
					return $this->errors();
				}
			}
		} catch (\Exception $e) {
			die($e->getMessage());
		}
		return false;
	}

	//  insert image Data end
	// --------------------------------------------------------------------------------------------//


	// --------------------------------------------------------------------------------//
	// Get dropdown list 

	function getallusersData()
	{
		$userdata = $this->getUsersAllData();
		$options = array('' => 'Select Options');
		if (!empty($userdata)) {
			foreach ($userdata as $cData) {
				$options[$cData['id']] = $cData['user_name'];
			}
		}
		return $options;
	}

	// Get dropdown list
	// --------------------------------------------------------------------------------//

	//-----------------------------------------------------------------------------------------------//
	// Get Users Name by Id

	public function getusersNameById($id)
	{
		try {
			$user_name = $this->where('id', $id)->findColumn('user_name');
			return $user_name[0];
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	// Get Users Nam by id ends 
	// ----------------------------------------------------------------------------------------------//


}
