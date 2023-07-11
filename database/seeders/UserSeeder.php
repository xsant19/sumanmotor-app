<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Admin',
            'email' => 'Admin123@gmailcom',
            'password' => Hash::make('123'),
            'alamat' => 'Jalan Cekomaria 20',
            'no_telp' => '081339115093',
            'role_id' => '1',
        ]);
        User::create([
            'nama' => 'Sumantara',
            'email' => 'Sumantara13@gmailcom',
            'password' => Hash::make('123'),
            'alamat' => 'Jalan Cekomaria 25',
            'no_telp' => '081339115092',
            'role_id' => '2',
        ]);
    }
}
