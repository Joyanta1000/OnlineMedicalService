<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->name,
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => md5('12345'), // password
            'role' => 1,
            'is_active' => 1,
            'remember_token' => Str::random(10),
        ];
    }
}
