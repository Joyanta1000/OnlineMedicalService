<?php

namespace Database\Factories;

use App\Models\NationalIdCard;
use Illuminate\Database\Eloquent\Factories\Factory;

class NationalIdCardFactory extends Factory
{
    protected $model = NationalIdCard::class;

    public function definition()
    {
        return [
            "nid" => $this->faker->unique()->numberBetween($min = 100000000, $max = 900000000),
        ];
    }
}
