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





}


