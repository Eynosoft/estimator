<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerDocModel extends Model
{
	 protected $table = 'customer_doc';
	 protected $primaryKey = 'id';
	 protected $allowedFields = ['cid','doc_name','doc_type','file_path','last_modified_by']; 
}


