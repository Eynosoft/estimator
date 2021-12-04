<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Stmt\Catch_;

class VehicleModel extends Model
{
	protected $table = 'vehicle';
	protected $primaryKey = 'id';
	protected $allowedFields = ['registration_plate', 'manufacturing_date', 'vin_number', 'registration_date', 'make', 'model', 'body_type', 'engine_capacity', 'engine_power', 'condition_when_imported', 'gearbox_type', 'main_color', 'pcode'];
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

	//-------------------------------------------------------------------------//
	// Get All Vehicle Data Starts

	public function getVehicleData()
	{
		try {
			$vehicle_data =  $this->orderBy('id', 'ASC')->findAll();
			return $vehicle_data;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
		return false;
	}

	// Get All Vehicle Data Ends
	// -------------------------------------------------------------------------//


	// -------------------------------------------------------------------------//
	// Get All vehicle Data by Id Starts

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

	// Get All Vehicle Data by id Ends
	// ---------------------------------------------------------------------------- //


	// -------------------------------------------------------------------------------//
	// Store and Update For the Vechile Starts

	public function insertVehicle($data = null, $id = null)
	{
		try {
			if (!empty($id)) {
				if ($this->update($id, $data)) {
					return true;
				} else {
					return $this->errors();
				}
			} else {
				if ($this->save($data)) {
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

	// Store and Update for the Vehicle Ends
	// --------------------------------------------------------------------------------//


	// --------------------------------------------------------------------------------//
	// Delete Vehicle BY id Starts

	public function deleteVehicleById($id = null)
	{
		try {
			$result = $this->where('id', $id)->delete($id);
			return $result;
		} catch (\Exception $e) {
			die($e->getMessage());
		}
		return false;
	}

	// Delete Vehcile By id Ends
	// ---------------------------------------------------------------------------------//

	public function getVehicleByAjax($search_data = null)
	{
		try {
			$data = [];
			$db      = \Config\Database::connect();
			$builder = $db->table('vehicle');
			$query = $builder->like('registration_plate', $search_data)
				->select('id,registration_plate as text')
				->limit(10)->get();
			$data = $query->getResult();
			return json_encode($data);
		} catch (\Exception $e) {
			die($e->getMessage());
		}
		return false;
	}

	//Get Vehicle name by the is id

	public function getVehicleNameById($id = null)
	{
		try {
			$vehicle_data = $this->where('id', $id)->findColumn('registration_plate');
			return $vehicle_data[0];
		} catch (\Exception $e) {
			die($e->getMessage());
		}
		return false;
	}

	// Get Vehicle name by its id details


}
