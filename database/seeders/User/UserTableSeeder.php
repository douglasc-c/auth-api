<?php

namespace Database\Seeders\User;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();

        User::create([
            'name' => 'Cliente Eloca',
            'type' => 'PF',
            'document' => '000.000.000-00',
            'social_reason' => 'Eloca LTDA',
            'company' => $company->code
        ]);
    }
}
