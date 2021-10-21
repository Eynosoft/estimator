<?php

namespace App\Models;

use CodeIgniter\Model;

class JobRequestPartsModel extends Model
{
  protected $table = 'job_parts';
  protected $primaryKey = 'id';
  protected $allowedFields = ['job_id', 'part_name', 'damage_type','action_type','part_status', 'quantity', 'part_cost', 'part_cost_vat', 'discount','parts_vat','parts_note','total_amount','created_at','updated_at'];
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

  function partsInsert($data = null, $job_request_id=null)
  {
    try {
      $this->db->query("SELECT * from job_parts where job_id='".$job_request_id."'");
      $this->db->query("DELETE from job_parts where job_id='".$job_request_id."'");
      if (!empty($data)) {
        $count = count($data['part_name']);
        for ($a = 0; $a < $count; $a++) {
          $this->db->query("INSERT INTO job_parts(job_id,part_name,damage_type,action_type,part_status,quantity,part_cost,part_cost_vat,discount,parts_vat,parts_note,total_amount)VALUES('" . $data["job_id"] . "','" . $data["part_name"][$a] . "', '" . $data["damage_type"][$a] . "', '" . $data["action_type"][$a] . "','" . $data["part_status"][$a] . "', '" . $data["quantity"][$a] . "', '" . $data["part_cost"][$a] . "', '" . $data["part_cost_vat"][$a] . "', '" . $data["discount"][$a] . "', '" . $data["parts_vat"][$a] . "','" . $data["parts_note"][$a] . "','" . $data["total_amount"][$a] . "')");
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
    public function getPartsDataById($job_id = null)
    {
      $part_action_data = new PartsActionModel();
      try {
        $return_parts = $this->where('job_id', $job_id)->findAll();
        $i = 0;
        foreach ($return_parts as $part_actions) {
          $returnpartaction[$i]['id'] = $part_actions['id'];
          $returnpartaction[$i]['job_id'] = $part_actions['job_id'];
          $returnpartaction[$i]['part_name'] = $part_actions['part_name'];
          $returnpartaction[$i]['damage_type'] = $part_actions['damage_type'];
          $returnpartaction[$i]['action_type'] = !empty($part_actions['action_type']) ? $part_action_data->getPartsactionNameById($part_actions['action_type']) : 'N/A';
          $returnpartaction[$i]['part_status'] = $part_actions['part_status'];
          $returnpartaction[$i]['quantity'] = $part_actions['quantity'];
          $returnpartaction[$i]['part_cost'] = $part_actions['part_cost'];
          $returnpartaction[$i]['part_cost_vat'] = $part_actions['part_cost_vat'];
          $returnpartaction[$i]['discount'] = $part_actions['discount'];
          $returnpartaction[$i]['parts_vat'] = $part_actions['parts_vat'];
          $returnpartaction[$i]['parts_note'] = $part_actions['parts_note'];
          $returnpartaction[$i]['total_amount'] = $part_actions['total_amount'];
          $i++;
        }
        return $returnpartaction;
      } catch (\Exception $e) {
        die($e->getMessage());
      }
      return false;
    }

    // Get All Labours By Id



// Get parts data by the job id data Starts

  public function getPartsDataByJobId($id = null)
  {
    try {
      $part_data = $this->where('job_id', $id)->findAll();
      return $part_data;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

// Get parts data by the job it data ends

}
