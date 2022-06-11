<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 150
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 150
            ],
            'phone_no' => [
                'type'           => 'VARCHAR',
                'constraint'     => 15
            ],
            'role' => [
                'type'           => 'VARCHAR',
                'constraint'     => 25
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => 225
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
