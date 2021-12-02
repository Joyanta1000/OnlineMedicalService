<?php

namespace Database\Seeders;

use App\Models\medicine_types;
use Illuminate\Database\Seeder;

class MedicineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDefaultMedicineType();
    }

    private function createDefaultMedicineType()
    {
        $medicineTypes = [
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

        foreach ($medicineTypes as $medicineType) {
            medicine_types::create([
                'medicine_type' => $medicineType['name'],
            ]);
        }
    }
}
