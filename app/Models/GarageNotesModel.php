<?php

namespace App\Models;
use CodeIgniter\Model;

class GarageNotesModel extends Model
{
	protected $table = 'garage_notes';
	protected $primaryKey = 'id';
	protected $allowedFields = ['gid','notes']; 
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

	public function insertGarageNotes($data = null)
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

public function getGarageNotesDatabyId($id = null)
{
  try {
    $garage_notes = $this->where('gid',$id)->findAll();
    if(!empty($garage_notes))
    {
      foreach ($garage_notes as $data) {
        $doc['gid'] = $data['gid'];
        $doc['notes'] = $data['notes'];
      }
    }
    return $doc;
  }
  catch(\Exception $e){
    die($e->getMessage());
  }
}

// Get customer Docment data by id ends

public function updateNotesData($data = null,$id = null)
{
  $this->db->disableForeignKeyChecks();
  try {  
    if(!empty($id)) {
      $this->where('gid',[$id])->set($data)->update();
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


