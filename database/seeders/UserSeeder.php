<?php

namespace Database\Seeders;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '1',
            'name' => 'Admin CRM',
            'email' => 'admin@gmail.com',
            'phone' => '12345678901',
            'password' => '123456',
            'role_id' => 1,
        ]);
        Staff::create([
            'id' => '1',
            'firstname' => 'Admin ',
            'lastname' => 'CRM',
            'email' => 'admin@gmail.com',
            'phone' => '12345678901',
            'password' => '123456',
            'role' => 1,
        ]);
    }
}
