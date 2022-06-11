<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stocks extends Migration
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
			'transaction_code' => [
				'type'           => 'VARCHAR',
				'constraint'     => 150
			],
			'date' 	=> [
				'type'           => 'DATE',
				'null'     		 => true
			],
			'type'      => [
				'type'           => 'ENUM',
				'constraint'     => ['IN', 'OUT'],
				'default'        => 'IN',
			],
			'note' 		=> [
				'type'           => 'TEXT',
				'constraint'     => 150,
				'null'           => true,
			],
			'created_at' 		=> [
				'type'      => 'timestamp',
				'Default' 	=> 'CURRENT_TIMESTAMP'
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('stocks');
	}

	public function down()
	{

		$this->forge->dropTable('stocks');
	}
}
