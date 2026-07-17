<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $staffRole = Role::where('name', 'staff')->first();

        $companyA = Company::where('name', 'PT Tendri Dharma Samudera')->first();
        $companyB = Company::where('name', 'PT Barakah Oseania Sukses')->first();

        User::firstOrCreate(
            ['email' => 'adminA@example.com'],
            [
                'name' => 'Admin A',
                'password' => bcrypt('password'),
                'role_id' => $adminRole->id,
                'company_id' => $companyA->id, //how to make nullable
            ]
        );

        User::firstOrCreate(
            ['email' => 'staffA@example.com'],
            [
                'name' => 'Staff A',
                'password' => bcrypt('password'),
                'role_id' => $staffRole->id,
                'company_id' => $companyA->id,
            ]
        );

        User::firstOrCreate(
            ['email' => 'adminB@example.com'],
            [
                'name' => 'Admin B',
                'password' => bcrypt('password'),
                'role_id' => $adminRole->id,
                'company_id' => $companyB->id,
            ]
        );
    }
}