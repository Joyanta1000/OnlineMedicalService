<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CoreDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDefaultRolePermissions();
        $this->createDefaultUsers();
    }

    private function createDefaultRolePermissions()
    {
        $permissions = [
            ['name' => 'admin'],
            ['name' => 'doctor_dashboard'],
            ['name' => 'patient_dashboard'],
            ['name' => 'pharmacist_dashboard'],
            ['name' => 'insert_gender'],
            ['name' => 'genders'],
            ['name' => 'edit_gender'],
            ['name' => 'update_gender'],
            ['name' => 'delete_genders_information'],
            ['name' => 'add_country'],
            ['name' => 'insert_country'],
            ['name' => 'countries'],
            ['name' => 'edit_country'],
            ['name' => 'update_country'],
            ['name' => 'delete_countries_information'],
            ['name' => 'add_city'],
            ['name' => 'insert_city'],
            ['name' => 'cities'],
            ['name' => 'edit_city'],
            ['name' => 'update_city'],
            ['name' => 'delete_cities_information'],
            ['name' => 'add_thana'],
            ['name' => 'get_city_for_thana'],
            ['name' => 'insert_thana'],
            ['name' => 'thanas'],
            ['name' => 'edit_thana'],
            ['name' => 'update_thana'],
            ['name' => 'delete_thanas_information'],
            ['name' => 'add_area'],
            ['name' => 'get_thana_for_area'],
            ['name' => 'insert_area'],
            ['name' => 'areas'],
            ['name' => 'edit_area'],
            ['name' => 'update_area'],
            ['name' => 'delete_areas_information'],
            ['name' => 'get_area_for_address'],
            ['name' => 'add_specialities_of_doctor'],
            ['name' => 'insert_speciality'],
            ['name' => 'specialities'],
            ['name' => 'edit_speciality'],
            ['name' => 'update_speciality'],
            ['name' => 'delete_specialities_information'],
            ['name' => 'add_marital_status'],
            ['name' => 'insert_marital_status'],
            ['name' => 'marital_statuses'],
            ['name' => 'edit_marital_status'],
            ['name' => 'update_marital_status'],
            ['name' => 'delete_marital_status'],
            ['name' => 'add_problem'],
            ['name' => 'insert_problem'],
            ['name' => 'problems'],
            ['name' => 'change_status_of_problem'],
            ['name' => 'edit_problems_info'],
            ['name' => 'update_problems_info'],
            ['name' => 'delete_problems_info'],
            ['name' => 'add_schedule'],
            ['name' => 'add_doctors_schedule'],
            ['name' => 'appointment.checkout.index'],
            ['name' => 'appointment.checkout.store'],
            ['name' => 'appointment.list'],
            ['name' => 'appointment.status_change'],
            ['name' => 'prescription.prescriptions.index'],
            ['name' => 'prescription.prescriptions.store'],
            ['name' => 'prescription.prescriptions.show'],
            ['name' => 'prescription.prescriptions.update'],
            ['name' => 'prescription.prescriptions.destroy'],
            ['name' => 'chat.index'],
            ['name' => 'chat.store'],
            ['name' => 'chat.show'],
            ['name' => 'chat.update'],
            ['name' => 'chat.destroy'],
            ['name' => 'message.contactList'],
            ['name' => 'message.chatData'],
            ['name' => 'message.submitMsg'],
            ['name' => 'doctors'],
            ['name' => 'add_medicine_type'],
            ['name' => 'insert_medicine_type'],
            ['name' => 'medicine_types'],
            ['name' => 'edit_medicine_type'],
            ['name' => 'update_medicine_type'],
            ['name' => 'delete_medicine_type'],
            ['name' => 'add_medicine'],
            ['name' => 'insert_medicine'],
            ['name' => 'medicines'],
            ['name' => 'changeStatus'],
            ['name' => 'edit_medicines_info'],
            ['name' => 'update_medicines_info'],
            ['name' => 'delete_medicines_info'],
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission["name"]
            ]);
        };

    
        Role::create([
            'name' => 'Admin'
        ])->givePermissionTo('genders');
        Role::create([
            'name' => 'Doctor'
        ]);
        Role::create([
            'name' => 'Patient'
        ]);
        Role::create([
            'name' => 'Pharmacist'
        ]);
        
    }

    private function createDefaultUsers()
    {
        User::create([
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => md5('12345'), // password
            'role' => 1,
            'is_active' => 1,
            'remember_token' => Str::random(10),
        ])->assignRole('Admin');
    }

}
