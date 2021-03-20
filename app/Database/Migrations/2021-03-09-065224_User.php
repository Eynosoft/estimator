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
				'constraint' => 80,
			],

			'last_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => 80,
			],

			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => 100,
			],

			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => 50,
			],

			'created_at datetime default current_timestamp',
    	'updated_at datetime default current_timestamp on update current_timestamp'

		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('user');
		// this is a user migration table
		// This is another migration request
	}
	//

	public function down()
	{
		$this->forge->dropTable('user');
		//
	}


}
