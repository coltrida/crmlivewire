<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $surname = fake()->lastName();

        return [
            'name' => $name,
            'surname' => $surname,
            'address' => fake()->address(),
            'city' => fake()->city(),
            'postcode' => fake()->postcode(),
            'province' => fake()->word(),
            'phone1' => fake()->phoneNumber(),
            'phone2' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'codeclient_id' => rand(1,4),
            'canal_id' => rand(1,4),
            'fullname' => $name.' '.$surname,
            'fullnamereverse' => $surname.' '.$name,
        ];
    }
}
