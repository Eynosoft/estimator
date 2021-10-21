<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Result;
use CodeIgniter\Model;

class PartsModel extends Model
{
  protected $table = 'part';
  protected $primaryKey = 'id';
  protected $allowedFields = ['part_name','part_note','created_at', 'updated_at'];
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
    $part = new PartsModel();
    try {
      return $part->findAll();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // Get Dropdown Ends
  // --------------------------------------------------------------------------------------------//


  // ---------------------------------------------------------------------------------------------//
  // Get All Customers Data

  public function getAllpartsData()
  {
    try {
      $partdata = $this->findAll();
      return $partdata;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

  // Get all Customers Data Ends
  //-----------------------------------------------------------------------------------------------//


  // ---------------------------------------------------------------------------------------------//
  // Insert and Update the customer data starts

  public function insertpart($data = null, $id = null)
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
          $count = count($data['part_name']);
          if(!empty($data)) {
          for($a = 0; $a < $count; $a++)
          {
            $this->db->query("INSERT INTO part(part_name,part_note)VALUES('" . $data["part_name"][$a] . "', '" . $data["part_note"][$a] . "')");
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

  public function getPartsNameById($id)
  {
    try {
      $parts_data = $this->where('id', $id)
        ->findColumn('part_name');
      return $parts_data[0];
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // Get Customer name by id Ends
  // ----------------------------------------------------------------------------------------------//

  // ---------------------------------------------------------------------------------------------//
  // Get Customer data by id starts

  public function getPartsDataById($id = null)
  {
    try {
      $part_data = $this->where('id', $id)->findAll();
      if (!empty($part_data)) {
        foreach ($part_data as $data) {
          $part['id'] = $data['id'];
          $part['part_name'] = $data['part_name'];
          $part['part_note'] = $data['part_note'];
          $part['created_at'] = $data['created_at'];
          $part['updated_at'] = $data['updated_at'];
        }
      }
      return $part;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }


  // --------------------------------------------------------------------------------//
  // Delete Customer Data Starts

  public function deleteparts($id = null)
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

  public function setPartsDropdown(){
    $partsdata = $this->getAllpartsData();
    $options = array(''=>'');
    if(!empty($partsdata)){
      foreach($partsdata as $cdata){
        $options[$cdata['id']] = $cdata['part_name'];
      }
    }
    return $options;
  }


public function getPartsByAjax($search_data = null)
{
  try {
    $response = array();
    if(isset($search_data['search']) ){
      // Select record
      $db  = \Config\Database::connect();
      $builder = $db->table('part');
      $query = $builder->like('part_name', $search_data['search'])
        ->select('id,part_name as text')
        ->limit(10)->get();
      $data = $query->getResult();

      if(!empty($data)){

      foreach($data as $row ) {
         $response[] = array("value"=>$row->id,"label"=>$row->text);
      } } else{
        $response[] = array("value"=>$search_data['search'],"label"=>$search_data['search']);
      }
    }
    return $response;
  } catch (\Exception $e) {
    die($e->getMessage());
  }
  return false;
}


}
