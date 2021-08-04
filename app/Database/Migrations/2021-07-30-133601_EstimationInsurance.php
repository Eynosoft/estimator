<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EstimationInsurance extends Migration
{
	public function up()
	{
		$this->forge->addField([
					
		'id' => ['type'=>'int', 'constraints' => '11' , 'unsigned' => true, 'auto_increament' => true],
    'cid' => ['type'=>'int', 'constraints' => '11', 'unsigned' => true],
    'insuerd_reference' => ['type' =>'varchar','constraints' => '100','unsigned' => true],
		'date_accident' => ['type'=>'date','constraints' => '50','unsigned'=> true],
		'policy_number' => ['type'=>'varchar','constraints'=> '100','unsigned'=>true],
		'claim_number' => ['type'=>'varchar','constarints'=>'80','unsigned'=>true],
		'inspection' => ['type'=> 'varchar','constraints'=>'80','unsigned'=>true],
		'insured_amount' => ['type'=>'varchar','constraints' =>'80','unsigned'=>true],
    'exemption_amount' =>['type'=>'varchar','constraints'=>'80','unsigned'=>true],
		'responsibility' => ['type'=>'varchar','constraints'=>'80','unsigned'=>true],
		'liability' => ['type'=>'varchar','constraints'=>'80','unsigned'=>true]
		]);

	}

	public function down()
	{
		//
	}
}
