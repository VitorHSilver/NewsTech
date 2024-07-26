<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAdminProfile extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'vitor.adm@teste.com',
            'password' => Hash::make('123456'),
            'country' => 'Brasil',
            'streetAddress' => 'Rua Teste',
            'postalCode' => '12345678',
            'neighborhood' => 'Bairro Teste',
            'city' => 'Cidade Teste',
            'region' => 'Região Teste',
            'roles' => 'admin'
        ]);
    }
}
