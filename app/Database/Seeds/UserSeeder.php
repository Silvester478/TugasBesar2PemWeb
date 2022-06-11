<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'phone_no' => '09820084444',
                'role' => 'Admin',
                'password' => sha1('P@ssw0rd')
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'phone_no' => '0934858585234',
                'role' => 'User',
                'password' => sha1('P@ssw0rd')
            ]
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
