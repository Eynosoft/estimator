<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Garagedocument extends Migration
{
	public function up()
	{
	  $this->forge->addField([
         'id'   =>   [
				  'type' => 'int',
          'constraint' => 10,
				  'unsigned' => true,
					'auto_increament' => true
				 ],

				 'gid' => [
					 'type' => 'int',
					 'constraint' => 11,
					 'unsigned' => true,
				 ],

				 'doc_name' => [
					 'type' => 'varchar',
					 'constraint' => 100,
					 'null' => true
				 ],

				 'doc_type' => [
					 'type' => 'varchar',
					 'constraint' => 100,
					  'null' => true
				 ],

				 'file_path' => [
					 'type' => 'varchar',
					 'constraint' => 100,
					 'null' => true
				 ],

			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp   on update current_timestamp',

		]);

		$this->forge->addkey('id',true);
		$this->forge->addForeignKey('gid','garage','id','CASCADE','CASCADE');
		$this->forge->createTable('garage_doc');
	}

	public function down()
	{
		$this->forge->dropTable('garage_doc');
	}

}
