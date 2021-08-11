<?php

namespace App\Models;
use CodeIgniter\Model;

class RequestorModel extends Model
{
  protected $table = 'requestor';
  protected $primaryKey = 'id';
  protected $allowedFields = ['customer', 'requested_date', 'requestor'];
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
     } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }
  
  public function requestorGetAllData()
    {
      $requestors = new RequestorModel();
      $customer = new CustomerModel();
      $returndata = [];
	    try {
			$data = $requestors->findAll();
      // echo "<pre>";
      // print_r($data);
      // die('###');
        if(!empty($data))
        {
          $i=0;
          foreach ($data as $requestor) {
            $returndata[$i]['id'] = $requestor['id'];
            $customer_data = !empty($requestor['customer']) ? $customer->getCustomerNameById($requestor['customer']) : 'N/A';
            $returndata[$i]['customer'] = $customer_data;
            $returndata[$i]['requestor'] = $requestor['requestor'];
            $returndata[$i]['created_at'] = $requestor['created_at'];
            $i++;
          }
        }
      return $returndata;
		  }
		  catch (\Exception $e) {
		    die($e->getMessage());
		  }
    }

  public function requestorGetAllDataById($id = null)
  {
    $requestors = new RequestorModel();
    try{
      return $requestors->find($id);
    }
    catch(\Exception $e){
      die($e->getMessage());
    }
   }

}
