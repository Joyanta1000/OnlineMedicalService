<?php

namespace Database\Seeders;

use App\Models\marital_status;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDefaultMaritalStatus();
    }

    private function createDefaultMaritalStatus()
    {
        $maritalStatuses = [
            ['name' => 'Married'],
            ['name' => 'Unamarried'],
            ['name' => 'Divorced'],
            ['name' => 'Widowed'],
            ['name' => 'Others'],
        ];

        foreach ($maritalStatuses as $maritalStatus) {
            marital_status::create([
                'marital_status' => $maritalStatus['name'],
            ]);
        }
    }
}
