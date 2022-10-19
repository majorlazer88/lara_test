<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceProvider>
 */
class ServiceProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'provider' => substr($this->faker->catchPhrase(), 0, 30),
            'company' => $this->faker->company(),
            'contact_details' => $this->faker->freeEmail(),
            'contact_name' => $this->faker->firstName(),
            // 'deleted' => 0,
            'created_at' => $this->faker->dateTimeThisMonth(),
        ];
    }

    public function deleted()
    {
        return $this->state(function (array $attributes) {
            return [
                'deleted' => 1,
            ];
        });
    }
}
