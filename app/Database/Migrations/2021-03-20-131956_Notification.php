<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class Notification extends Migration
{
	public function up()
	{
		$this->forge->addField([

			'id'        => [
          'type' => 'INT',
					'constraint' => 10,
					'unsigned' => true,
					'auto_increment' => true,
			],

			'type'   => [
           'type' => 'VARCHAR',
					 'constraint' => 100,
			],

			'customer_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned'    => true,
			],

			'garage_id'  => [
				'type'  => 'INT',
				'constraint' => 11,
				'unsigned'    => true,
			],

			'user_id' => [
        'type' => 'INT',
				'constraint' => 11,
				'unsigned'    => true,
			],

			'email'  => [
				'type' => 'BOOLEAN',
			//	'constraint' => 5,
			],

			'sms'  => [
				'type' => 'BOOLEAN',
			//	'constraint' => 5,
			],

			'push'  => [
				'type' => 'BOOLEAN',
			//	'constraint' => 5
			],

			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',

		]);

		$this->forge->addkey('id',true);
		$this->forge->addForeignKey('customer_id','customer','id','CASCADE','CASCADE');
		$this->forge->addForeignKey('garage_id','garage','id','CASCADE','CASCADE');
		$this->forge->addForeignKey('user_id','user','id','CASCADE','CASCADE');
		$this->forge->createTable('notification');

	}

	public function down()
	{
		//
   $this->forge->dropTable('notification');
	 
	}


}
