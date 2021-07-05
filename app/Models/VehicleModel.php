<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
	
	protected $table = 'vehicle';
	protected $primaryKey = 'id';
	protected $allowedFields = ['registration_plate','manufacturing_date','vin_number','registration_date','make','model','body_type','engine_capacity','engine_power','condition_when_imported','gearbox_type','main_color','pcode'];

}
