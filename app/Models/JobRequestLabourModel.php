<?php

namespace App\Models;

use CodeIgniter\Model;

class JobRequestLabourModel extends Model
{
  protected $table = 'job_labours';
  protected $primaryKey = 'id';
  protected $allowedFields = ['job_id', 'labour', 'cost','cost_total','vat_cost', 'description_labour', 'vat', 'created_at', 'updated_at'];
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

  function labourInsert($data = null, $job_request_id=null)
  {
    try {
      $this->db->query("SELECT * from job_labours where job_id='".$job_request_id."'");
      $this->db->query("DELETE from job_labours where job_id='".$job_request_id."'");
      if (!empty($data)) {
        $count = count($data['labour']);
        for ($a = 0; $a < $count; $a++) {
          $this->db->query("INSERT INTO job_labours(job_id,labour,cost,cost_total,vat_cost,description_labour,vat)VALUES('" . $data["job_id"] . "','" . $data["labour"][$a] . "', '" . $data["cost"][$a] . "', '" . $data["cost_total"][$a] . "','" . $data["vat_cost"][$a] . "', '" . $data["description_labour"][$a] . "', '" . $data["vat"][$a] . "')");
        }
        return true;
      } else {
        return $this->errors();
      }
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }


  // Get All Labours by id 
  public function getJobLaboursDataById($job_id = null)
  {
    try {
      $return_labours = $this->where('job_id', $job_id)->findAll();
      return $return_labours;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

  // Get All Labours By Id 


  public function getVehicleDataById($id = null)
  {
    try {
      $vehicle_data = $this->where('id', $id)->findAll();
      return $vehicle_data;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }
}
