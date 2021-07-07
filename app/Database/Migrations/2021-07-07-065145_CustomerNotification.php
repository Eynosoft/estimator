<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CustomerNotification extends Migration
{
		public function up()
		{
			$this->forge->addField([
					
				'id' => ['type'=>'int', 'constraints' => '11' , 'unsigned' => true, 'auto_increament' => true],
				'cid' => ['type'=>'int', 'constraints' => '11', 'unsigned' => true, 'auto_incerament' => true],
				'job_type' => ['type'=> 'int', 'contraints' => '11', 'unsigned' => true],
				'email' => ['type' => 'int', 'constraints' => '11', 'unsigned' => true],
				'sms' => ['type'=> 'int', 'constraints' => '11', 'unsigned' => true],
				'push' => ['type'=> 'int', 'constraints' => '11', 'unsigned' => true],
				'created_at' => ['type' => 'bigint', 'null' => true],
				'updated_at' => ['type' => 'bigint', 'null' => true],
			]);
			$this->forge->addKey('id', true);
			$this->forge->createTable('customer_notification',true);
		}

		public function down()
		{
			$this->forge->dropTable('customer_notification', true);
		}

}
