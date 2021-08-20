<?php

namespace App\Models;

use CodeIgniter\Model;

class JobestimationModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'jobestimations';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [];

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



function __construct()
{
  parent::__construct();
}


// ------------------------------------------------------------//
// Get all Job Data starts

public function getAllJobData()
{
	try {
   return true;
	}catch(\Exception $e){
    die($e->getMessage());
	}
	return false;
}


// Get all job Data ends
// ------------------------------------------------------------//


}
