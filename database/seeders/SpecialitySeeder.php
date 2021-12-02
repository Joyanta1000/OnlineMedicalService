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
            ['name' => 'Liquid'],
            ['name' => 'Tablet'],
            ['name' => 'Capsules'],
            ['name' => 'Topical'],
            ['name' => 'Suppositories'],
            ['name' => 'Drops'],
            ['name' => 'Inhalers'],
            ['name' => 'Drops'],
            ['name' => 'Inhalers'],
            ['name' => 'Injections'],
            ['name' => 'Implants or patches'],
            ['name' => 'Suspension'],
            ['name' => 'Ointment'],
            ['name' => 'Others'],
        ];

        foreach ($specialities as $speciality) {
            specialities_of_doctor::create([
                'speciality' => $speciality['name'],
            ]);
        }
    }
}
