<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'username' => 'pendaftaran',
                'password' => Hash::make('password'),
                'name' => 'Staff Pendaftaran',
                'email' => 'staff@gmail.com',
                'role' => 'pendaftaran',
            ],
            [
                'username' => 'perawat',
                'password' => Hash::make('password'),
                'name' => 'Perawat Klinik',
                'email' => 'perawat@gmail.com',
                'role' => 'perawat',
            ],
            [
                'username' => 'dokter',
                'password' => Hash::make('password'),
                'name' => 'Dokter Klinik',
                'email' => 'dokter@gmail.com',
                'role' => 'dokter',
            ],
            [
                'username' => 'apoteker',
                'password' => Hash::make('password'),
                'name' => 'Apoteker Klinik',
                'email' => 'apoteker@gmail.com',
                'role' => 'apoteker',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}