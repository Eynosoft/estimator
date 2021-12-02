<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Stmt\TryCatch;

class GarageModel extends Model
{

  protected $table = 'garage';
  protected $primaryKey = 'id';
  protected $allowedFields = ['garage_name', 'owner_name', 'repair_rate', 'reports_password', 'email', 'mobile', 'landline', 'fax', 'locale', 'city', 'address', 'notifications', 'doc_type', 'notes', 'status'];
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
    $this->db = \Config\Database::connect();
  }

//------------------------------------------------------------------------------------------------//
// Get Garage All Data Starts

  public function getGarageAllData()
  {
    try {
      $garage_data = $this->orderBy('id', 'DESC')->findAll();
      return $garage_data;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }


// Get Garage ALl Data Ends
// ----------------------------------------------------------------------------------------------//

// Get Total Request By the Id Starts

  public function getRequestById($id = null)
  {
    try {
      $requests = $this->db->query('SELECT * FROM requestor where status=0 AND garage="' . $id . '"');
      $total_result = $requests->getResult();
      $result_data = json_decode(json_encode($total_result), true);
      $vehicle = new VehicleModel();
      $customer = new CustomerModel();
      if (!empty($result_data)) {
        $i = 0;
        foreach ($result_data as $value) {
          $request_final[$i]['id'] = $value['id'];
          $request_final[$i]['request_no'] = $value['request_no'];
          $vehicle_data = !empty($value['vehicle']) ? $vehicle->getVehicleNameById($value['vehicle']) : 'N/A';
          $request_final[$i]['vehicle'] =  $vehicle_data;
          $customer_data = !empty($value['customer']) ? $customer->getCustomerNameById($value['customer']) : 'N/A';
          $request_final[$i]['customer'] = $customer_data;
          $request_final[$i]['requested_date'] = $value['requested_date'];
          $request_final[$i]['requestor'] = $value['requestor'];
          $i++;
        }
      }
      return $request_final;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

// Get Total Request By the Id Ends


//Get Total Estimation Reqeust By the Id Starts

public function getEstimationRequestById($id= null) {
  try {
  $estimations = $this->db->query('SELECT * from requestor where status>=1 AND garage="'.$id.'"');
  $total_estimation = $estimations->getResult();
  $estimation_result = json_decode(json_encode($total_estimation), true);
  $vehicle = new VehicleModel();
  $customer = new CustomerModel();
  if(!empty($estimation_result)){
    $i=0;
     foreach ($estimation_result as $estimation_value) {
          $estimation_final[$i]['id'] = $estimation_value['id'];
          $estimation_final[$i]['request_no'] = $estimation_value['request_no'];
          $vehicle_data = !empty($estimation_value['vehicle']) ? $vehicle->getVehicleNameById($estimation_value['vehicle']) : 'N/A';
          $estimation_final[$i]['vehicle'] =  $vehicle_data;
          $customer_data = !empty($estimation_value['customer']) ? $customer->getCustomerNameById($estimation_value['customer']) : 'N/A';
          $estimation_final[$i]['customer'] = $customer_data;
          $estimation_final[$i]['requested_date'] = $estimation_value['requested_date'];
          $estimation_final[$i]['requestor'] = $estimation_value['requestor'];
          $i++;
     }
  }
  return $estimation_final;
  }catch (\Exception $e) {
    die($e->getMessage());
  }
}
// Get Total Estimation Request By the Id ends

// ---------------------------------------------------------------------------------------------//
// Get Garage Data by Id

  public function getGarageDataById($id = null)
  {
    try {
      $garage_data = $this->where('id', $id)->findAll();
      // Requests starts
      $requests = $this->db->query('SELECT garage, COUNT(garage) as total_request FROM requestor where status=0 AND garage="' . $id . '"');
      $request_result = $requests->getResult();
      $final_request = $request_result[0]->total_request;
      // Requests Ends

      // Estimation starts

      $estimation = $this->db->query('SELECT garage, COUNT(garage) as total_estimation FROM requestor where status>=1 AND garage="' . $id . '"');
      $estimation_result = $estimation->getResult();
      $final_estimation = $estimation_result[0]->total_estimation;

      // Estimation Ends

      if(!empty($garage_data)) {
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
          $garage['request'] = $final_request;
          $garage['estimations'] = $final_estimation;
          $garage['created_at'] = $data['created_at'];
        }
      }
      return $garage;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // Get Garage Data by id Ends
  // ---------------------------------------------------------------------------------------------//


  // ---------------------------------------------------------------------------------------------//
  // Insert and  Update Garage data


  public function insertgarage($data = null, $id = null)
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

  public function deletGarageById($id = null)
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


// ---------------------------------------------------------------------------------------------//
// Get All Data by Id Starts

  public function getAllDataById($id = null)
  {
    try {
      $result = $this->where('id', $id)->findAll();
      return $result;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }


// Get All Data by id Ends
//----------------------------------------------------------------------------------------------//



//----------------------------------------------------------------------------------------------//
// Get Garage Dropdown data

  public function getGarageDropdownData($search = null)
  {
    try {
      $dropdowndata = $this->select('garage_name')
        ->like('garage_name', $search)
        ->where('status','1')
        ->orderBy('garage_name')
        ->findAll(5);
      return $dropdowndata;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

// Get Garage Dropwdon data
//----------------------------------------------------------------------------------------------//

public function getGarageByAjax($search_data = null)
{
    try {
      $data = [];
      $db      = \Config\Database::connect();
      $builder = $db->table('garage');
      $query = $builder->like('garage_name', $search_data)
        ->select('id,garage_name as text')
        ->where('status','1')
        ->limit(10)->get();
      $data = $query->getResult();
      return json_encode($data);
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
}

// Get Garage Name By Id

  public function getGarageNameById($id = null)
  {
    try {
      $garage_data = $this->where('id', $id)->findColumn('garage_name');
      return $garage_data[0];
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

// Get gagare Name By Id

}
