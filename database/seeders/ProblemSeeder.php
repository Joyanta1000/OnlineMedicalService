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
            ['name' => 'Fever'],
            ['name' => 'Joint Pain'],
            ['name' => 'Back Pain'],
            ['name' => 'Mental Illness'],
            ['name' => 'Brain Cancer'],
            ['name' => 'Bone Cancer'],
            ['name' => 'Skin Cancer'],
            ['name' => 'Blood Cancer'],
            ['name' => 'Gastroesophageal Reflux Disease'],
            ['name' => 'Peptic Ulcer Disease (PUD) and Gastritis'],
            ['name' => 'Stomach Flu'],
            ['name' => 'Gluten Sensitivity and Celiac Disease'],
            ['name' => 'Inflammatory Bowel Disease (IBD)'],
            ['name' => 'Irritable Bowel Syndrome (IBS)'],
            ['name' => 'Constipation'],
            ['name' => 'Hemorrhoids'],
            ['name' => 'Others'],
        ];

        foreach ($problems as $problem) {
            problems::create([
                'problems_name' => $problem['name'],
            ]);
        }
    }
}
