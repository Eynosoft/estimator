<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Garagenotification extends Migration
{
	public function up()
	{
		$this->forge->addField([

        'id' => [
					'type'=>'int',
					'constraint'=>11,
					'unsigned'=>true,
					'auto_increament'=>true
				],

				'gid' => [
					'type'=>'int',
					'constraint' => 11, 
					'unsigned' => true,
				],

				'email' => [
					'type' => 'boolean',
				],

				'sms' => [
					'type' => 'boolean',
				],

				'push' => [
					'type' => 'boolean',
				],

			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',

		]);
		$this->forge->addkey('id',true);
		$this->forge->addForeignKey('gid','garage','id','CASCADE','CASCADE');
		$this->forge->createTable('garage_notification');
	}

	public function down()
	{
		$this->forge->dropTable('garage_notification');
	}
	
}
