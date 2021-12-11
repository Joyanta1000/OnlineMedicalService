<?php

namespace Database\Seeders;

use App\Models\specialities_of_doctor;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDefaultSpeciality();
    }

    private function createDefaultSpeciality()
    {
        $specialities = [
            ['name' => 'Radilogist'],
            ['name' => 'Cardiologist'],
            ['name' => 'Neurologist'],
            ['name' => 'Otolaryngologists'],
            ['name' => 'Dernatologist'],
            ['name' => 'Gynaecologist'],
            ['name' => 'Geriatricist'],
            ['name' => 'Urologist'],
            ['name' => 'Oncologist'],
            ['name' => 'Pathologist'],
            ['name' => 'Psychitrist'],
            ['name' => 'Pediatrician'],
            ['name' => 'Others'],
        ];

        foreach ($specialities as $speciality) {
            specialities_of_doctor::create([
                'speciality' => $speciality['name'],
            ]);
        }
    }
}
