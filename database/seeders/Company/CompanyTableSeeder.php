<?php

namespace Database\Seeders\Company;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Empresa Eloca',
            'tag' => 'eloca',
            'social_reason' => 'Eloca LTDA',
        ]);
    }
}
