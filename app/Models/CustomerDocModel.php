<?php

namespace App\Models;
use CodeIgniter\Model;

class CustomerDocModel extends Model
{
	protected $table = 'customer_doc';
	protected $primaryKey = 'id';
	protected $allowedFields = ['customer_id','doc_type','last_modified_by']; 
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
    parent :: __construct();
	}

	public function insertcustomerDoc($data = null)
  {
       $this->db->disableForeignKeyChecks();
        try{
          if($this->save($data)) {
            $this->db->enableForeignKeyChecks();
          return true;
          }
          else {
            $this->db->enableForeignKeyChecks();
            return $this->errors();
          } 
        }
      
      catch (\Exception $e) {
        $this->db->enableForeignKeyChecks();
        die($e->getMessage());
      }

  return false;

}

// Get customer Document data by id starts

 public function getcustomerDocDatabyId($id = null)
 {
  try {
    $customer_doc = $this->where('customer_id',$id)->findAll();
    if(!empty($customer_doc))
    {
      foreach ($customer_doc as $data) {
        $doc['customer_id'] = $data['customer_id'];
        $doc['doc_type'] = json_decode($data['doc_type']);
      }
    }
    return $doc;
  }
  catch(\Exception $e){
    die($e->getMessage());
  }
}

// Get customer Docment data by id ends

public function updateDocdata($data = null,$id = null)
{
  $this->db->disableForeignKeyChecks();
  try{
    if(!empty($id)){
      $this->where('customer_id',[$id])->set($data)->update();
      $this->db->enableForeignKeyChecks();
      return true;
    } else {
      $this->db->enableForeignKeyChecks();
      return $this->errors();
    }
  }

  catch(\Exception $e){
     $this->db->enableForeignKeyChecks();
     die($e->getMessage());
  }
}



}


