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
            'firstName' => 'admin',
            'lastName' => 'ADM',
            'email' => 'vitor.adm@teste.com',
            'password' => Hash::make('1234'),
            'country' => strtolower('Brasil'),
            'streetAddress' => 'rua teste',
            'postalCode' => '12345678',
            'neighborhood' => 'vila alzira',
            'city' => 'cidade admin',
            'region' => 'regiao teste',
            'roles' => 'admin'
        ]);
    }
}
