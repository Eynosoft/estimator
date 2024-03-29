<?php

namespace App\Models;
use CodeIgniter\Model;

class UserNotificationsModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'user_notification';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['uid', 'notifications','created_at','updated_at'];

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

	// Insert data into the notification table
	public function insertNotification($data = null)
	{
		
		$this->db->disableForeignKeyChecks();
		try {
			if($this->save($data)) {
				$this->db->enableForeignKeyChecks();
				return true;
			} else {
				$this->db->enableForeignKeyChecks();
				return $this->errors();
			}
		} catch(\Exception $e) {
			$this->db->enableForeignKeyChecks();
			die($e->getMessage());
		}
		return false;
	}
// Insert data into the database ends

// Update Notification 

public function updateNotificationdata($data = null,$id = null)
{
	$this->db->disableForeignKeyChecks();
  // Update notification by the customer id 
	try{
		if(!empty($id)) {
		 $this->where('uid', [$id])->set($data)->update();
			// echo $this->getLastQuery()->getQuery();
			// die('####');
			$this->db->enableForeignKeyChecks();
			return true;
		}  else {
			$this->db->enableForeignKeyChecks();
			return $this->errors();
		}
	}

	catch (\Exception $e) 
		{
			$this->db->enableForeignKeyChecks();
			die($e->getMessage());
		}
}

// Update NOtification Ends


// Get Customer notification Data by id Starts 

  public function getUserNotificationById($id = null)
	{
		try {
			$user_notification = $this->where('uid', $id)->findAll();
			if(!empty($user_notification))
			{
				foreach($user_notification as $data) {
				  $notice['uid'] 		  = $data['uid'];
					$notice['notifications'] = json_decode($data['notifications']);
				}
			}
			return $notice;
		  } catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	// Get notification data by id Ends 



}
