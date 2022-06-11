<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Modifyproduct extends Migration
{
	public function up()
	{
		$fields = [
			'id' => [
				'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
			],
		];

		$this->forge->modifyColumn('products', $fields);
	}

	public function down()
	{
		//
	}
}
