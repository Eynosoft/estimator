<?php

namespace App\Models;
use CodeIgniter\Model;

class RequestPersonModel extends Model
{
  
  protected $table = 'request_person';
  protected $primaryKey = 'id';
  protected $allowedFields = ['request_id', 'person_type', 'person_name','created_at','updated_at'];
  protected $skipValidation   = false;
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
    //$this->documentation_model = new DocumentationModel();
  }

//-----------------------------------------------------------------------------------------------//
// insert requestor Starts

  public function insertrequestor($data = null, $id = null)
  {
    try {
      if (!empty($id)) {
        if ($this->update($this->update($id, $data))) {
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
    }
    catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

  // Insert Requestor Ends
  //------------------------------------------------------------------------------------------------//
  

  public function insertPersonData($data = null,$request_id = null)
  {
    try {
      $count = count($data['person_type']);
      if(!empty($data)) {
      for($a = 0; $a < $count; $a++)
      {
        $this->db->query("INSERT INTO request_person(request_id,person_type,person_name,person_number)VALUES('$request_id','" . $data["person_type"][$a] . "', '" . $data["person_name"][$a] . "', '" . $data["person_number"][$a] . "')");
      }
    }
    return true;
  }

    catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;

  }


  // -----------------------------------------------------------------------------------------------// 
  // Get Requestor all data Starts

  // Request Person Data 
  
  public function getPersonDataById($request_id = null) {
    try {
      $person_data = $this->where('request_id', $request_id)->findAll();
      return $person_data;
      // if (!empty($requestors)) {
      //   $i = 0;
      //   foreach ($requestors as $requestor_data) {
      //     $returndata[$i]['id'] =  $requestor_data['id'];
      //     $customer_data = !empty($requestor_data['customer']) ? $customer->getCustomerNameById($requestor_data['customer']) : 'N/A';
      //     $returndata[$i]['customer'] = $customer_data;
      //     $returndata[$i]['requestor'] =  $requestor_data['requestor'];
      //     $returndata[$i]['created_at'] =  $requestor_data['created_at'];
      //     $i++;
      //   }
      // }
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

  // Request Person Data Ends


}
