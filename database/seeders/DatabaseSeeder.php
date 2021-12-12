<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();
        $this->call(CoreDataSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(MaritalStatusSeeder::class);
        $this->call(MedicineTypeSeeder::class);
        $this->call(ProblemSeeder::class);
        $this->call(SpecialitySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(TestModelSeeder::class);
        \App\Models\NationalIdCard::factory(100)->create();
        \App\Models\BirthCertificate::factory(100)->create();
    }

}
