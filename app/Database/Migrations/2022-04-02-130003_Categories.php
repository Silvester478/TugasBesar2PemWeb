<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
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
            'category_code' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 150
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('categories');
	}

	public function down()
	{
		$this->forge->dropTable('categories');
	}
}
