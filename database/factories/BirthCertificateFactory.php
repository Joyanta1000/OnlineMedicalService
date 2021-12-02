<?php

namespace Database\Factories;

use App\Models\BirthCertificate;
use Illuminate\Database\Eloquent\Factories\Factory;

class BirthCertificateFactory extends Factory
{
    protected $model = BirthCertificate::class;

    public function definition()
    {
        return [
            "birth_certificate_registration_number" => $this->faker->unique()->numberBetween($min = 100000000, $max = 999999999),
        ];
    }
}
