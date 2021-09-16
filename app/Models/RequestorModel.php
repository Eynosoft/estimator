<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestorModel extends Model
{

  protected $table = 'requestor';
  protected $primaryKey = 'id';
  protected $allowedFields = ['customer', 'requested_date', 'requestor', 'vehicle', 'garage', 'insured_reference', 'date_accident', 'policy_number', 'claim_number', 'inspection', 'insured_amount', 'exemption_amount', 'responsibility', 'liability', 'created_at', 'updated_at'];
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
          $request_id = $this->getInsertID();
          return $request_id;
        } else {
          return $this->errors();
        }
      }
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

  // Insert Requestor Ends
  //------------------------------------------------------------------------------------------------//


  // -----------------------------------------------------------------------------------------------// 
  // Get Requestor all data Starts

  public function requestorGetAllData()
  {
    $requestors = new RequestorModel();
    $customer = new CustomerModel();
    $users = new UsersModel();
    $returndata = [];
    
    try {
      $this->table('requestor');
      $this->select('*');
      $this->join('request_assign_job', 'request_assign_job.requestor_id = requestor.id');
      $request_data =  $this->findAll();
      $assign_total = count($request_data);
      if(!empty($request_data)) {
          $i = 0;
          foreach ($request_data as $requestor)  {
            $returndata[$i]['id'] = $requestor['id'];
            $returndata[$i]['assign_id'] = $requestor['assign_id'];
            $returndata[$i]['assign_note'] = $requestor['assign_note'];
            $returndata[$i]['visit_date'] = $requestor['visit_date'];
            $returndata[$i]['assessor'] = $requestor['assessor'];
            $customer_data = !empty($requestor['customer']) ? $customer->getCustomerNameById($requestor['customer']) : 'N/A';
            $returndata[$i]['customer'] = $customer_data;
            $returndata[$i]['requestor'] = $requestor['requestor'];
            $returndata[$i]['vehicle'] = $requestor['vehicle'];
            $returndata[$i]['garage'] = $requestor['garage'];
            $returndata[$i]['insured_reference'] = $requestor['insured_reference'];
            $returndata[$i]['date_accident'] = $requestor['date_accident'];
            $returndata[$i]['policy_number'] = $requestor['policy_number'];
            $returndata[$i]['claim_number'] = $requestor['claim_number'];
            $returndata[$i]['inspection'] = $requestor['inspection'];
            $returndata[$i]['insured_amount'] = $requestor['insured_amount'];
            $returndata[$i]['exemption_amount'] = $requestor['exemption_amount'];
            $returndata[$i]['responsibility'] = $requestor['responsibility'];
            $returndata[$i]['liability'] = $requestor['liability'];
            $returndata[$i]['created_at'] =  $requestor['created_at'];
            $returndata[$i]['assign_total'] = $assign_total;
            $i++;
          }
      }

      $data = $requestors->findAll();
      if (!empty($data)) {
        $i = 0;
        foreach ($data as $requestor)  {
          $returndata[$i]['id'] = $requestor['id'];
          $customer_data = !empty($requestor['customer']) ? $customer->getCustomerNameById($requestor['customer']) : 'N/A';
          $returndata[$i]['customer'] = $customer_data;
          $returndata[$i]['requestor'] = $requestor['requestor'];
          $returndata[$i]['vehicle'] = $requestor['vehicle'];
          $returndata[$i]['garage'] = $requestor['garage'];
          $returndata[$i]['insured_reference'] = $requestor['insured_reference'];
          $returndata[$i]['date_accident'] = $requestor['date_accident'];
          $returndata[$i]['policy_number'] = $requestor['policy_number'];
          $returndata[$i]['claim_number'] = $requestor['claim_number'];
          $returndata[$i]['inspection'] = $requestor['inspection'];
          $returndata[$i]['insured_amount'] = $requestor['insured_amount'];
          $returndata[$i]['exemption_amount'] = $requestor['exemption_amount'];
          $returndata[$i]['responsibility'] = $requestor['responsibility'];
          $returndata[$i]['liability'] = $requestor['liability'];
          $returndata[$i]['created_at'] =  $requestor['created_at'];
          $i++;
      }
    }
    
    return $returndata;
    } catch (\Exception $e) {
      die($e->getMessage());
    }

  }

  // Get Requestor All data ends 
  // ---------------------------------------------------------------------------------------------//

  public function requestorGetAllDataById($id = null)
  {
    $requestors = new RequestorModel();
    try {
      return $requestors->find($id);
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function requestGetDataById($id = null)
  {
    try { 
      $customer = new CustomerModel();
      $users = new UsersModel();
      $this->table('requestor');
      $this->select('*');
      $this->join('request_assign_job', 'request_assign_job.requestor_id = requestor.id');
      $this->where('requestor.id',$id);
      $requestors =  $this->findAll();

      if (!empty($requestors)) {
        $i = 0;
        foreach ($requestors as $requestor_data) {
          $returndata[$i]['id'] =  $requestor_data['id'];
          $customer_data = !empty($requestor_data['customer']) ? $customer->getCustomerNameById($requestor_data['customer']) : 'N/A';
          $returndata[$i]['customer'] = $customer_data;
          $returndata[$i]['requestor'] =  $requestor_data['requestor'];
          $returndata[$i]['assign_id'] = $requestor_data['assign_id'];
          $returndata[$i]['assign_note'] = $requestor_data['assign_note'];
          $returndata[$i]['visit_date'] = $requestor_data['visit_date'];
          $returndata[$i]['assessor'] = $requestor_data['assessor'];
          $returndata[$i]['vehicle'] = $requestor_data['vehicle'];
          $returndata[$i]['garage'] = $requestor_data['garage'];
          $returndata[$i]['insured_reference'] = $requestor_data['insured_reference'];
          $returndata[$i]['date_accident'] = $requestor_data['date_accident'];
          $returndata[$i]['policy_number'] = $requestor_data['policy_number'];
          $returndata[$i]['claim_number'] = $requestor_data['claim_number'];
          $returndata[$i]['inspection'] = $requestor_data['inspection'];
          $returndata[$i]['insured_amount'] = $requestor_data['insured_amount'];
          $returndata[$i]['exemption_amount'] = $requestor_data['exemption_amount'];
          $returndata[$i]['responsibility'] = $requestor_data['responsibility'];
          $returndata[$i]['liability'] = $requestor_data['liability'];
          $returndata[$i]['created_at'] =  $requestor_data['created_at'];
          $i++;
        }
      }

      else {
      $requestors_value = $this->where('id', $id)->findAll();
      if (!empty($requestors_value)) {
        $i = 0;
        foreach ($requestors_value as $requestor_data) {
          $returndata[$i]['id'] =  $requestor_data['id'];
          $customer_data = !empty($requestor_data['customer']) ? $customer->getCustomerNameById($requestor_data['customer']) : 'N/A';
          $returndata[$i]['customer'] = $customer_data;
          $returndata[$i]['requestor'] =  $requestor_data['requestor'];
          $returndata[$i]['vehicle'] = $requestor_data['vehicle'];
          $returndata[$i]['garage'] = $requestor_data['garage'];
          $returndata[$i]['insured_reference'] = $requestor_data['insured_reference'];
          $returndata[$i]['date_accident'] = $requestor_data['date_accident'];
          $returndata[$i]['policy_number'] = $requestor_data['policy_number'];
          $returndata[$i]['claim_number'] = $requestor_data['claim_number'];
          $returndata[$i]['inspection'] = $requestor_data['inspection'];
          $returndata[$i]['insured_amount'] = $requestor_data['insured_amount'];
          $returndata[$i]['exemption_amount'] = $requestor_data['exemption_amount'];
          $returndata[$i]['responsibility'] = $requestor_data['responsibility'];
          $returndata[$i]['liability'] = $requestor_data['liability'];
          $returndata[$i]['created_at'] =  $requestor_data['created_at'];
          $i++;
        }
      }
     }

    return $returndata;

    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }


  public function deleteRequestById($id = null)
  {
    try {
      $result = $this->where('id', $id)->delete($id);
      return $result;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

  // Select Reuqestor by Id 
   
  // --------------------------------------------------------------------------------//

	// Get dropdown list 


  // Select Requestor by Id
}
