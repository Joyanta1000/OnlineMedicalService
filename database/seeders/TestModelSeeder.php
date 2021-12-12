<?php

namespace Database\Seeders;

use App\Models\TestModel;
use Illuminate\Database\Seeder;

class TestModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDefaultTest();
    }

    private function createDefaultTest()
    {
        $tests = [
            ['name' => 'Cardiovascular'],
            ['name' => 'Dermatology'],
            ['name' => 'Gastrointestinal'],
            ['name' => 'Hematology'],
            ['name' => 'Bicarnate'],
            ['name' => 'Biopsy'],
            ['name' => 'Clothing Time'],
            ['name' => 'Albumin'],
            ['name' => 'Aldolasi'],
            ['name' => 'Ammonia'],
            ['name' => 'Amylase'],
            ['name' => 'Anti-Mullerian Hormone'],
            ['name' => 'Others'],
        ];

        foreach ($tests as $test) {
            TestModel::create([
                'test' => $test['name'],
            ]);
        }
    }
}
