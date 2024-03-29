<?php

namespace App\Models;
use CodeIgniter\Model;
class GarageModel extends Model
{
  
	protected $table = 'garage';
	protected $primaryKey = 'id';
	protected $allowedFields = ['garage_name','owner_name','repair_rate','reports_password','email','mobile','landline','fax','locale','city','address','notifications','doc_type','notes','status'];
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
    if(!empty($garage_data)){
      foreach ($garage_data as $data) {
        $garage['id'] = $data['id'];
        $garage['garage_name'] = $data['garage_name'];
        $garage['owner_name'] = $data['owner_name'];
        $garage['repair_rate'] = $data['repair_rate'];
        $garage['reports_password'] = $data['reports_password'];
        $garage['emails'] = $data['email'];
        $garage['mobile'] = $data['mobile'];
        $garage['land_line'] = $data['landline'];
        $garage['fax'] = $data['fax'];
        $garage['locale'] = $data['locale'];
        $garage['city'] = $data['city'];
        $garage['address'] = $data['address'];
        $garage['doc_type'] = json_decode($data['doc_type']);
        $garage['notifications'] = json_decode($data['notifications']);
        $garage['notes'] = $data['notes'];
        $garage['status'] = $data['status'];
        $garage['created_at'] = $data['created_at'];
      }
    }
    return $garage;
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
          return true;
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



