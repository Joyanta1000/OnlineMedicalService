<?php

namespace Database\Seeders;

use App\Models\gender;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDefaultGenders();
    }

    private function createDefaultGenders()
    {
        $genders = [
            ['name' => 'Male'],
            ['name' => 'Female'],
            ['name' => 'Others'],
        ];

        foreach ($genders as $gender) {
            gender::create([
                'gender' => $gender['name'],
            ]);
        }
    }
}
