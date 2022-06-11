<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stockdetails extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'stock_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'product_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'qty' 	=> [
				'type'           => 'INT',
				'constraint'     => 150
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('stock_details');
	}

	public function down()
	{
		$this->forge->dropTable('stock_details');
	}
}
