<?php

namespace App\Models;
use CodeIgniter\Model;

class PersonDocumentModel extends Model
{
  protected $table = 'person_docs';
  protected $primaryKey = 'id';
  protected $allowedFields = ['request_id', 'document_name', 'document_type','file_path','created_at','updated_at'];
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
  // -----------------------------------------------------------------------------------------------// 
  // Get Requestor all data Starts

  function documentInsert($data = null) {
    try {
      foreach ($data as $docdata) {
      if ($this->save($docdata)) {
        //return true;
      }
      else {
        return $this->errors();
      }
    }
    return true;
    }
  catch (\Exception $e) {
      die($e->getMessage());
  }
}

// Get person document data by Request Id 

public function getPersonDocDataById($request_id = null)
{
  try {

    $person_doc = $this->where('request_id', $request_id)->findAll();
    return $person_doc;
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

// Get person document data by Request Id

}
