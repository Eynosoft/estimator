<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Customer extends Migration
{
	public function up()
	{
		$this->forge->addField([

			'id'           => [
				    'type'        => 'INT',
						'constraint' =>  11,
						'unsigned'    => true,
						'auto_increment' => true,
			  ],

			'client_name'  => [
             'type'   => 'VARCHAR',
						 'constraint' => 80,
						 'null'  => true,
			  ],

			'locale'   => [
				     'type'  => 'VARCHAR',
						 'constraint' => 200,
						 'null' => true,
			],

			'report_password' => [
				      'type' => 'VARCHAR',
							'constraint' => 80,
							'null' => true,
			],

			'emails'     => [
				       'type' => 'VARCHAR',
							 'constraint' => 80,
							 'null' => true,
			],

			'mobile'    => [
				       'type' => 'VARCHAR',
							 'constraint' => 20,
							 'null'  => true,
			],

			'land_line'  => [
				        'type' => 'VARCHAR',
								'constraint' => 30,
								'null'  => true,
			],

			'fax'        => [
				          'type' => 'VARCHAR',
									'constraint' => 30,
									'null' => true,
			],

			'notes'      => [
				           'type' => 'TEXT',
									 'null'  => true,
			],

      'created_at datetime default current_timestamp',
      'updated_at datetime default current_timestamp on update current_timestamp'

		]);

		$this->forge->addkey('id',true);
		$this->forge->createTable('customer');
		//
	}

	public function down()
	{
		$this->forge->dropTable('customer');
	}

}