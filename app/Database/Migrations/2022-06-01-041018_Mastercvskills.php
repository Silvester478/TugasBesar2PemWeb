<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mastercvskills extends Migration
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
			'name' => [
				'type'           => 'VARCHAR',
				'constraint'     => 185,
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('master_cv_skills');
	}

	public function down()
	{
		//
	}
}
