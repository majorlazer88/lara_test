<?php

namespace Database\Factories;

use App\Models\DomainsDb;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DomainsDbFactory extends Factory
{
    protected $model = DomainsDb::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'domain' => $this->faker->safeEmailDomain(),
            'TLD' => $this->faker->tld(),
            'region' => substr($this->faker->country(), 0, 50),
            'lang' => substr($this->faker->country(), 0, 40),
            'platform_price' => $this->faker->randomFloat(10, 1, 1000),
            'service_provider_id' => '',
            'spec_conditions' => $this->faker->sentence(8, true),
            // 'created_at' => '',
            // 'update_at' => '',
            // 'update_at' => '',
        ];
    }
}
