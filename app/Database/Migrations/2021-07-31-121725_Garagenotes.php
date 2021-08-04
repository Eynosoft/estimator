<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Garagenotes extends Migration
{
	public function up()
	{
		 $this->forge->addField([

          'id' => [
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

          'notes' => [
						'type' => 'varchar',
						'constraint' => 200,
						'null' => true,
					],

			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp    on update current_timestamp',

		 ]);
     
		 $this->forge->addkey('id',true);
		 $this->forge->addForeignKey('gid','garage','id','CASCADE','CASCADE');
		 $this->forge->createTable('garage_notes');

	}

	public function down()
	{
		$this->forge->dropTable('garage_notes');
	}
}
