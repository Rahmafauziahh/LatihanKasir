<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Rahma Fauziah',
                'email'=>'rahmafauziah776@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'petugas',
                'email'=>'petugas@gmail.com',
                'role'=>'petugas',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'pimpinan',
                'email'=>'pimpinan@gmail.com',
                'role'=>'pimpinan',
                'password'=>bcrypt('123456')
            ],
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
