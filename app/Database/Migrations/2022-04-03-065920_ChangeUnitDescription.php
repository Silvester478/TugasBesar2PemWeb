<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeUnitDescription extends Migration
{
	public function up()
	{
		$fields = [
			'desription' => [
				'name' => 'description',
				'type' => 'TEXT'
			],
		];

		$this->forge->modifyColumn('units', $fields);
	}

	public function down()
	{
		//
	}
}
