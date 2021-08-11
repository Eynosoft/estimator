<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Customerdoc extends Migration
{
	public function up()
	{
	  $this->forge->addField([

       'id' => [
				 'type' => 'INT',
				 'constraint' => 11,
				 'unsigned' => true,
				 'auto_increment' => true
			 ],

			 'customer_id' => [
				 'type' => 'INT',
			 ],

			 'doc_type' => [
				 'type' => 'varchar',
				 'constraint' => 100,
				 'null' => true,
			 ],

			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update 
			current_timestamp',

		]);
		
		$this->forge->addkey('id',true);
		$this->forge->addForeignKey('customer_id','customer','id','CASCADE','CASCADE');
		$this->forge->createTable('customer_doc');

	}

	public function down()
	{
		$this->forge->dropTable('customer_doc');
	}
}
