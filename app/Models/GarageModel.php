<?php

namespace App\Models;
use CodeIgniter\Model;
class GarageModel extends Model
{
	protected $table = 'garage';
	protected $primaryKey = 'id';
	protected $allowedFields = ['garage_name','owner_name','repair_rate','reports_password','email','mobile','landline','fax','notes','active'];
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


//------------------------------------------------------------------------------------------------// 
// Get Garage All Data Starts

public function getGarageAllData()
{
  try{
    $garage_data = $this->orderBy('id', 'DESC')->findAll();
    return $garage_data;
  }
  catch(\Exception $e){
    die($e->getMessage());
	}
  return false;
}

// Get Garage ALl Data Ends
// ----------------------------------------------------------------------------------------------//



// ---------------------------------------------------------------------------------------------//
// Get Garage Data by Id

public function getGarageDataById($id = null) {
  try {
		$garage_data = $this->where('id',$id)->findAll();
		return $garage_data;
	 }
	catch(\Exception $e){
		die($e->getMessage());
	}
}

// Get Garage Data by id Ends
// ---------------------------------------------------------------------------------------------//



// ---------------------------------------------------------------------------------------------//
// Insert and  Update Garage data

public function insertgarage($data = null,$id = null)
  {
    try {
      if(!empty($id)) {
      if($this->update($id, $data)) {
          return true;
        }  else {
          return $this->errors();
        }
      }  else {
        if ($this->save($data)) {
          $gid = $this->getInsertID();
          return $gid;
        } else {
          return $this->errors();
        }
      }
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

// Insert And Update Customer data
//---------------------------------------------------------------------------------------------//


// --------------------------------------------------------------------------------------------//
// Delete Garage by Id

public function deletGarageById( $id = null) {
	try{
		$result = $this->where('id', $id)->delete($id);
		return $result;
  }
	catch(\Exception $e)
	{
		die($e->getMessage());
	}		
}
// Delete Garage By Id
// ----------------------------------------------------------------------------------------------// 


// ---------------------------------------------------------------------------------------------//
// Get All Data by Id Starts

public function getAllDataById($id = null)
{
  try{
    $result = $this->where('id',$id)->findAll();
    return $result;
  }
  catch(\Exception $e)
  {
    die($e->getMessage());
  }
}  

// Get All Data by id Ends
// ----------------------------------------------------------------------------------------------//


//----------------------------------------------------------------------------------------------//
// Get Garage Dropdown data 

public function getGarageDropdownData($search = null)
{
  try{
  $dropdowndata = $this->select('garage_name')
  ->like('garage_name', $search)
  ->orderBy('garage_name')
  ->findAll(5);
  return $dropdowndata;
  }catch(\Exception $e){
    die($e->getMessage());
  }
  return false;
}

// Get Garage Dropwdon data
//----------------------------------------------------------------------------------------------//

}



