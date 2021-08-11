<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class Requestor extends Migration
{
	public function up()
	{
	   $this->forge->addField([

          'id'=>[
						'type' => 'int',
						'constraint' => 11,
						'unsigned' => true,
						'auto_increament' => true
					],

			   'customer' => [
					 'type' => 'int',
					 'constraint' => 11,
					 'unsigned' => true,
				 ],

				 'requested_date' => [
					 'type' => 'date',
				 ],

				 'requestor' => [
					 'type' => 'varchar',
					 'constraint' => 20,
					 'null' => true,
				 ],

			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',

		 ]);

		 $this->forge->addkey('id',true);
		 $this->forge->createTable('requestor');

	}

	public function down()
	{
		$this->forge->dropTable('requestor');
	}
}
