<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::firstOrCreate(['name' => 'PT Tendri Dharma Samudera']);
        Company::firstOrCreate(['name' => 'PT Barakah Oseania Sukses']);
    }
}