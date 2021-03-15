<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([

			'id'         => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],

			'first_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '80',
			],

			'last_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '80',
			],

			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],

			'password'       => [
				'type'       => 'MD5',
				'constraint' => '20',
			],

			'status'       => [
				'type'      => 'SMALLINT',
				'constraint' => '5',
				'null'       => 'YES',
				'default'    =>  '1',
			],

			'creation_date'       => [
				'type'       => 'DATETIME',
				'default'    =>  'CURRENT_TIMESTAMP',
				//	'constraint' => '100',
			],

			'updation_date'       => [
				'type'       => 'DATETIME',
				'default'    =>  'CURRENT_TIMESTAMP',
				'ON UPDATE CURRENT_TIMESTAMP' => TRUE,
				//		'constraint' => '100',
			],

		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('user');
		// this is a user migration table

	}
	//

	public function down()
	{
		$this->forge->dropTable('user');
		//
	}
}
