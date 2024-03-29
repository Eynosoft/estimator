<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Result;
use CodeIgniter\Model;

class RequestAssignJobModel extends Model
{

	protected $table = 'request_assign_job';
	protected $primaryKey = 'assign_id';
	protected $allowedFields = ['requestor_id', 'assessor', 'visit_date','assign_note','created_at', 'updated_at'];
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
		$this->db = \Config\Database::connect();
	}

	// ------------------------------------------------------------------------------------------//
	// Get dropdown starts

	function masterGetAllData()
	{
		try {
			return $this->findAll();
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	// Get Dropdown Ends
	// --------------------------------------------------------------------------------------------//


	// ---------------------------------------------------------------------------------------------//
	// Get All Assign Request  Data

	public function getAllAssignData()
	{
		try {
			$customer_data = $this->findAll();
			return $customer_data;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
		return false;
	}

	// Get all Assign Request Data Ends
	//-----------------------------------------------------------------------------------------------//


	// ---------------------------------------------------------------------------------------------//
	// Insert and Update the Assign Request data starts

	public function insertAssignJob($data = null,$assign_id = null)
	{
		try {
			if(!empty($assign_id)) {
				if($this->update($assign_id,$data)) {
					return true;
				} else {
					return $this->errors();
				}
			} else {
				if ($this->save($data)) {
					$assign_id = $this->getInsertID();
					$query = $this->db->query('SELECT requestor_id FROM request_assign_job WHERE assign_id = "'.$assign_id.'" ');
					$request_data = $query->getResult();
					$request_id = $request_data[0]->requestor_id;

					$query_status_get = $this->db->query('SELECT status_timing FROM requestor WHERE id = "'.$request_id.'"');
					$timming_result = $query_status_get->getResult();
					$status_timing_result = $timming_result[0]->status_timing;

					$result_data = json_decode($status_timing_result);

					$statusarray = json_decode(json_encode($result_data), true);

					$updated_status = [
           'unassigned' => $statusarray['unassigned'],
					 'pending' => date("d/m/Y h:i:sa"),
           'inprogress' => $statusarray['inprogress'],
					 'completed' => $statusarray['completed'],
					];

					$pending_status = json_encode($updated_status);

					$final_query = $this->db->query("UPDATE requestor SET status =  1 , status_timing = '".$pending_status."' WHERE id = '".$request_id."'");

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

	// Insert and update the Assign data ends
	//----------------------------------------------------------------------------------------------//

	// ---------------------------------------------------------------------------------------------//
	// Get Assign data by id starts

	public function getAssignDataById($id = null)
	{
		try {
			$assign_data = $this->where('id', $id)->findAll();
			return $assign_data;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	// Get Assign Data by customer is ends
	// --------------------------------------------------------------------------------//

}
