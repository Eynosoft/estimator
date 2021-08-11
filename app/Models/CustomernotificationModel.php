<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomernotificationModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'customer_notification';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['customer_id','notifications'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];


	public function __construct()
	{
		parent::__construct();
	}

	public function insertNofication($data = null)
	{
		$this->db->disableForeignKeyChecks();
	  try {
			if($this->save($data)) {
				$this->db->enableForeignKeyChecks();
				return true;
			}
			else {
				$this->db->enableForeignKeyChecks();
				return $this->errors();
			}
	}
	 catch(\Exception $e) {
			$this->db->enableForeignKeyChecks();
			die($e->getMessage());
		}
		return false;
	}
}
