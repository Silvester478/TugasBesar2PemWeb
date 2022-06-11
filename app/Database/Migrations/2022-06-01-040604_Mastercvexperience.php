<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mastercvexperience extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'master_cv_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'title' => [
				'type'           => 'VARCHAR',
				'constraint'     => 85,
			],
			'company_name' => [
				'type'           => 'VARCHAR',
				'constraint'     => 85,
			],
			'description' => [
				'type'           => 'TEXT',
				'null'     		 => true
			],
			'start_date' => [
				'type'           => 'DATE',
				'null'     		 => true
			],
			'end_date' => [
				'type'           => 'DATE',
				'null'     		 => true
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('master_cv_experiences');
	}

	public function down()
	{
		//
	}
}
