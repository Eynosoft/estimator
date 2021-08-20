<?php

namespace App\Models;
use CodeIgniter\Model;

class garageDocTypeModel extends Model
{
	protected $table = 'garage_doc';
	protected $primaryKey = 'id';
	protected $allowedFields = ['gid','doc_type']; 
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


	public function insertGarageDoc($data = null)
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

public function getGarageDocDatabyId($id = null)
{
  try {
    $garage_doc = $this->where('gid',$id)->findAll();
    if(!empty($garage_doc))
    {
      foreach ($garage_doc as $data) {
        $doc['gid'] = $data['gid'];
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
  try {  
    if(!empty($id)){
      $this->where('gid',[$id])->set($data)->update();
      $this->db->enableForeignKeyChecks();
      return true;
    }  else {
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


