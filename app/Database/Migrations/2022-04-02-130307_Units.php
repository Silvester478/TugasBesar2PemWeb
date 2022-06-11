<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Units extends Migration
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
            'unit_code' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'desription' => [
                'type'           => 'TEXT',
                'null'     		 => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('units');
	}

	public function down()
	{
		$this->forge->dropTable('units');
	}
}
