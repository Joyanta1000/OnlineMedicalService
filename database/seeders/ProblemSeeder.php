<?php

namespace Database\Seeders;

use App\Models\problems;
use Illuminate\Database\Seeder;

class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDefaultProblem();
    }

    private function createDefaultProblem()
    {
        $problems = [
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

        foreach ($problems as $problem) {
            problems::create([
                'problems_name' => $problem['name'],
            ]);
        }
    }
}
