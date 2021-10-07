<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Result;
use CodeIgniter\Model;

class PartsActionModel extends Model
{
  protected $table = 'part_action';
  protected $primaryKey = 'id';
  protected $allowedFields = ['part_action_name','created_at','updated_at'];
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
    parent::__construct();
  }

  // ------------------------------------------------------------------------------------------//
  // Get dropdown starts 

  function masterGetAllData()
  {
    $part_action = new PartsActionModel();
    try {
      return $part_action->findAll();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // Get Dropdown Ends 
  // --------------------------------------------------------------------------------------------//


  // ---------------------------------------------------------------------------------------------//
  // Get All Customers Data 

  public function getAllpartsactionData()
  {
    try {
      $partactiondata = $this->findAll();
      return $partactiondata;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

  // Get all Customers Data Ends 
  //-----------------------------------------------------------------------------------------------//


  // ---------------------------------------------------------------------------------------------//
  // Insert and Update the customer data starts

  public function insertpartaction($data = null, $id = null)
  {
    try {
      if (!empty($id)) {
        if ($this->update($id,$data)) {
          return true;
        } else {
          return $this->errors();
        }
      } else {
        if (!empty($data)) {
          $count = count($data['part_action_name']);
          if(!empty($data)) {
          for($a = 0; $a < $count; $a++)
          {
            $this->db->query("INSERT INTO part_action(part_action_name)VALUES('" . $data["part_action_name"][$a] . "')");
          }
        }
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

  // Insert and update the customer data ends
  //----------------------------------------------------------------------------------------------//


  // ----------------------------------------------------------------------------------------------//
  // Get Customer Name by id starts

  public function getPartsactionNameById($id)
  {
    try {
      $parts_action_data = $this->where('id', $id)
        ->findColumn('part_action_name');
      return $parts_action_data[0];
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // Get Customer name by id Ends 
  // ----------------------------------------------------------------------------------------------//

  // ---------------------------------------------------------------------------------------------//
  // Get Customer data by id starts

  public function getPartsActionDataById($id = null)
  {
    try {
      $part_action_data = $this->where('id', $id)->findAll();
      if (!empty($part_action_data)) {
        foreach ($part_action_data as $data) {
          $part['id'] = $data['id'];
          $part['part_action_name'] = $data['part_action_name'];
          $part['created_at'] = $data['created_at'];
          $part['updated_at'] = $data['updated_at'];
        }
      }
      return $part;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // Get customer Data by customer is ends
  // --------------------------------------------------------------------------------//


  // --------------------------------------------------------------------------------//
  // Delete Customer Data Starts

  public function deletepartsaction($id = null)
  {
    try {
      $result = $this->where('id', $id)->delete($id);
      return $result;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }


// Delete Customer data Ends
// -------------------------------------------------------------------------------//


// Get dropdown list
// --------------------------------------------------------------------------------//

  public function setPartsactionDropdown(){
    $partsactiondata = $this->getAllpartsactionData();
    $options = array(''=>'');
    if(!empty($partsactiondata)){
      foreach($partsactiondata as $cdata){
        $options[$cdata['id']] = $cdata['part_action_name'];
      }
    }
    return $options;
  }


}
