<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Cria um endereço
        $addressId = DB::table('addresses')->insertGetId([
            'street' => 'Gym Street',
            'complement' => 'Room 101',
            'zip_code' => '12345-678',
            'state' => 'SP',
            'city' => 'São Paulo',
            'neighborhood' => 'Downtown',
            'longitude' => '-46.633308',
            'latitude' => '-23.550520',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Cria status
        DB::table('statuses')->insert([
            ['name' => 'Active', 'description' => 'User is active in the system', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Inactive', 'description' => 'User is inactive in the system', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Cria grupos de usuários
        $adminGroupId = DB::table('user_groups')->insertGetId([
            'name' => 'Administrator',
            'description' => 'Group of system administrators',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $studentGroupId = DB::table('user_groups')->insertGetId([
            'name' => 'Student',
            'description' => 'Group of gym students',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $teacherGroupId = DB::table('user_groups')->insertGetId([
            'name' => 'Teacher',
            'description' => 'Group of gym teachers',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $adminGroupId = DB::table('user_groups')->insertGetId([
            'name' => 'Proprietário',
            'description' => 'Proprietário dos estabelecimentos',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Cria usuários
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'address_id' => $addressId,
                'birth_date' => '1990-01-01',
                'gender' => 'Male',
                'cpf' => '123.456.789-00',
                'phone' => '(11) 99999-9999',
                'email' => 'admin@gymfit.com',
                'password' => Hash::make('password123'),
                'user_group_id' => $adminGroupId,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Student',
                'address_id' => $addressId,
                'birth_date' => '2000-05-15',
                'gender' => 'Male',
                'cpf' => '987.654.321-00',
                'phone' => '(11) 88888-8888',
                'email' => 'john@gymfit.com',
                'password' => Hash::make('password123'),
                'user_group_id' => $studentGroupId,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mary Teacher',
                'address_id' => $addressId,
                'birth_date' => '1985-10-20',
                'gender' => 'Female',
                'cpf' => '456.789.123-00',
                'phone' => '(11) 77777-7777',
                'email' => 'mary@gymfit.com',
                'password' => Hash::make('password123'),
                'user_group_id' => $teacherGroupId,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}