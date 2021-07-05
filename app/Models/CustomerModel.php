<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
	 protected $table = 'customer';
	 protected $primaryKey = 'id';
	 protected $allowedFields = ['client_name','locale','report_password','emails','mobile','land_line','fax','notes']; 
}
