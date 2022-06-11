<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'category_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
			'unit_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'code' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 150,
            ],
            'date' => [
                'type'           => 'DATE',
                'null'     		 => true
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('products');
	}

	public function down()
	{
		$this->forge->dropTable('products');
	}
}