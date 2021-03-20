<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class Garage extends Migration
{
	public function up()
	{
	   $this->forge->addField([
        
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],

			'garage_name' => [
				'type'  => 'VARCHAR',
				'constraint' => 80,
				'null' => true,
			],

			'owner_name' => [
				'type' => 'VARCHAR',
				'constraint' => 80,
				'null' => true,
			],

			'reports_password' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true,
			],

			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true,
			],

			'mobile' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true,
			],

			'landline' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null'    => true,
			],

			'fax' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true,
			],

			'notes' => [
				'type' => 'text',
				'null' => true,
			],

			'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp on update current_timestamp'

		 ]);

		 $this->forge->addKey('id',true);
		 $this->forge->createTable('garage');
		 
	}

	public function down()
	{
		//
		$this->forge->dropTable('garage');
	}
}
