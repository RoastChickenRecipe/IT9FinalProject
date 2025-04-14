<?php

namespace Database\Seeders;

use App\Models\EmployeeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class fakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeeModel::create([
            'e_fname' => 'John',
            'e_lname' => 'Doe',
            'position' => 'Manager',
            'e_address' => 'Zone 3 Buhangin San Vicente Davao City',
            'e_contact_number' => '0995211444',
            'e_username' => 'j.doe@admin.com',
            'e_password' => Hash::make('test')
        ]);
    }
}
