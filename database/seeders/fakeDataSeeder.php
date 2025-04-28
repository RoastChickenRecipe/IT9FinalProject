<?php

namespace Database\Seeders;

use App\Models\BrgyModel;
use App\Models\CitizenModel;
use App\Models\EmployeeModel;
use App\Models\HouseholdModel;
use App\Models\MunModel;
use App\Models\SubdModel;
use Carbon\Carbon;
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

        MunModel::create([
            'mun_name' => 'Davao City',
            'region' => 'XI'
        ]);
        BrgyModel::create([
            'brgy_name' => 'Buhangin (Pob.)',
            'municipality_id' => 1
        ]);
        SubdModel::create([
            'subd_name' => 'Zone 1 San Vicente',
            'barangay_id' => 1
        ]);
        SubdModel::create([
            'subd_name' => 'Zone 2 San Vicente',
            'barangay_id' => 1
        ]);
        SubdModel::create([
            'subd_name' => 'Zone 3 San Vicente',
            'barangay_id' => 1
        ]);
        SubdModel::create([
            'subd_name' => 'Zone 4 San Vicente',
            'barangay_id' => 1
        ]);
        SubdModel::create([
            'subd_name' => 'NHA',
            'barangay_id' => 1
        ]);
        SubdModel::create([
            'subd_name' => 'Rose Vill.',
            'barangay_id' => 1
        ]);

        HouseholdModel::create([
            'household_type' => 'own house',
            'municipality_id' => 1,
            'barangay_id' => 1,
            'subdivision_id' => 1,
            'employee_id' => 1
        ]);
        CitizenModel::create([
            'fname' => 'Gar Christian',
            'mname' => 'Pallon',
            'lname' => 'Flores',
            'suffix' => '', 

            'sex' => 'Male',
            'age' => '19',
            'family_role' => 'Child',
            'birth_date' => Carbon::createFromDate('2005', '07', '09'),
            'place_of_birth' => 'Davao City',
            'blood_type' => 'Type O',
            'religion' => 'Catholic',

            'contactNum' => '12331232',
            'years_of_residency' => '7',
            'educational_attainment' => 'Highschool Graduate',
            'citizen_status' => '',
            'employment_status' => 'Student',
            'income' => 1000,

            'household_id' => 1
        ]);
        CitizenModel::create([
            'fname' => 'Richard',
            'mname' => 'Edward',
            'lname' => 'Romeo',
            'suffix' => '', 

            'sex' => 'Male',
            'age' => '24',
            'family_role' => 'Child',
            'birth_date' => Carbon::createFromDate('2001', '09', '18'),
            'place_of_birth' => '4196 Edgewood Road',
            'blood_type' => 'Type O',
            'religion' => 'Catholic',

            'contactNum' => '12331232',
            'years_of_residency' => '7',
            'educational_attainment' => 'College Graduate',
            'citizen_status' => '',
            'employment_status' => 'Employed',
            'income' => 10000,

            'household_id' => 1
        ]);
        CitizenModel::create([
            'fname' => 'Hazel',
            'mname' => 'Hester',
            'lname' => 'Honoria',
            'suffix' => '', 

            'sex' => 'Female',
            'age' => '35',
            'family_role' => 'Mother',
            'birth_date' => Carbon::createFromDate('1970', '09', '09'),
            'place_of_birth' => 'Davao City',
            'blood_type' => 'Type O',
            'religion' => 'Catholic',

            'contactNum' => '12331232',
            'years_of_residency' => '7',
            'educational_attainment' => 'College Graduate',
            'citizen_status' => '',
            'employment_status' => 'Employed',
            'income' => 25000,

            'household_id' => 1
        ]);
        CitizenModel::create([
            'fname' => 'John',
            'mname' => 'Cesar',
            'lname' => 'Yoho',
            'suffix' => 'III', 

            'sex' => 'Male',
            'age' => '37',
            'family_role' => 'Father',
            'birth_date' => Carbon::createFromDate('1988', '04', '26'),
            'place_of_birth' => '3579 Hillview Street',
            'blood_type' => 'Type O',
            'religion' => 'Catholic',

            'contactNum' => '8037466832',
            'years_of_residency' => '7',
            'educational_attainment' => 'College Graduate',
            'citizen_status' => '',
            'employment_status' => 'Employed',
            'income' => 30000,

            'household_id' => 1
        ]);

    }
}
