<?php

namespace App\Models;

use CodeIgniter\Model;

class GarageModel extends Model
{
	 protected $table = 'garage';
	 protected $primaryKey = 'id';
	 protected $allowedFields = ['garage_name','owner_name','reports_password','email','mobile','landline','fax','notes','active']; 
}
