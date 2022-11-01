<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipient>
 */
class RecipientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_name' => fake()->company(),
            'company_address' => fake()->address(),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'state' => fake()->countryCode(),
            'zip_code' => fake()->randomNumber(5, true),
            'vat_number' => fake()->iban('EE', 'vat', 8),
            'reg_code' => fake()->randomNumber(8, true),
            'default_recipient' => fake()->numberBetween(0, 1),
            'active' => fake()->numberBetween(0, 1),
            'balance' => fake()->randomFloat(1, 10, 2),
        ];
    }
}
