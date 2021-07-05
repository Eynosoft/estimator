<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class Vehicle extends Migration
{
	public function up()
	{
		 $this->forge->addField([
      
			 'id' => [
              'type' => 'INT',
							'constraint' => 10,
							'unsigned'   => true,
							'auto_increment' =>true,
			 ],

			 'registration_plate' => [
				 'type'=> 'VARCHAR',
				 'constraint' => 80,
				 'null' => true,
			 ],

			 'manufacturing_date' => [
				 'type' => 'Date',
				 'null' => true,
			 ],

			 'vin_number' => [
				 'type' => 'VARCHAR',
				 'constraint' => 100,
				 'null' => true,
			 ],

			 'registration_date' => [
				 'type' => 'Date',
				 'null' => true,
			 ],

			 'make' => [
				 'type' => 'VARCHAR',
				 'constraint' => 100,
				 'null' => true,
			 ],

			 'model' => [
				 'type' => 'VARCHAR',
				 'constraint' => 100,
				 'null' => true,
			 ],

			 'body_type' => [
				 'type' => 'VARCHAR',
				 'constraint' => 100,
				 'null' => true,
			 ],

			 'engine_capacity' => [
				 'type' => 'VARCHAR',
				 'constraint' => 100,
				 'null' => true,
			 ],

			 'engine_power' => [
				 'type' => 'VARCHAR',
				 'constraint' => 100,
				 'null' => true,
			 ],

			 'condition_when_imported' => [
				 'type' => 'VARCHAR',
				 'constraint' => 100,
				 'null' => true,
			 ],

			 'gearbox_type' => [
				 'type' => 'VARCHAR',
				 'constraint' => 100,
				 'null' => true,
			 ],

			 'main_color' => [
				 'type' => 'VARCHAR',
				 'constraint' => 20,
				 'null' => true,
			 ],

			 'pcode' => [
				 'type' => 'VARCHAR',
				 'constraint' => 20,
				 'null' => true,
			 ],

			'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp on update current_timestamp'

		 ]);
		 
		 $this->forge->addKey('id',true);
		 $this->forge->createTable('vehicle');

	}

	public function down()
	{
		//
		$this->forge->dropTable('vehicle');
	}

}
