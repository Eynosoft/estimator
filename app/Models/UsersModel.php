<?php

namespace App\Models;
use CodeIgniter\Model;
class UsersModel extends Model
{

	protected $table = 'user';
	protected $primaryKey = 'id';
	protected $allowedFields = ['user_name', 'locale', 'email', 'mobile', 'land_line', 'fax', 'file', 'file_type'];

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
			'max_length' => 'This field cannot exceed {param} characters in length.'
		],
		'locale' => [
			'required' 	 => 'This field is required',
			'max_length' => 'This field field cannot exceed {param} characters in length.'
		],
		'email' => [
			'required' 	 => 'This field is required',
			'max_length' => 'This field field cannot exceed {param} characters in length.'
		],
		'mobile' => [
			'required'   => 'This field is required'
		],
		'land_line' => [
			'required'   => 'This field is required'
		],
		'fax' => [
			'required' => 'This field is required'
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
	try{
    $user_data = $this->orderBy('id', 'DESC')->findAll();
		return $user_data;
	}catch(\Exception $e){
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
		} catch(\Exception $e) {
			die($e->getMessage());
		}
		return false;
	}

//Insert User Model Ends
//----------------------------------------------------------------------------------------------//


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

}
