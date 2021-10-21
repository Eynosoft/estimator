<?php

namespace App\Models;

use CodeIgniter\Model;

class JobRequestDamageModel extends Model
{
  protected $table = 'job_damage_part';
  protected $primaryKey = 'id';
  protected $allowedFields = ['job_id', 'damages', 'created_at', 'updated_at'];
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
    $this->db = \Config\Database::connect();
    //$this->documentation_model = new DocumentationModel();
  }

  // -----------------------------------------------------------------------------------------------//
  // Get Requestor all data Starts

  function damageInsert($data = null, $job_request_id = null)
  {
    try {
      $this->db->query("SELECT * from job_damage_part where job_id='".$job_request_id."'");
      $this->db->query("DELETE from job_damage_part where job_id='".$job_request_id."'");
      if (!empty($data)) {
        $this->db->query("INSERT INTO job_damage_part(job_id,damages)VALUES('" . $job_request_id . "','" . $data . "')");
      }
      return true;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // Get parts data by the job it data ends

  public function getDamageDataById($job_id = null)
  {
    try {
      $damage_parts = $this->where('job_id', $job_id)->findAll();
      if(!empty($damage_parts)){
       foreach ($damage_parts as $value) {
        $damage_areas = json_decode($value['damages']);
       }
      }
    $result_data = json_decode(json_encode($damage_areas), true);
    return $result_data;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }
}
