<?php

namespace Database\Seeders;

use App\Models\DomainsDb;
use App\Models\ServiceProvider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DomainsDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            $serviceProvider = ServiceProvider::factory()
                ->state(new Sequence(
                    fn ($sequence) => ['deleted' => rand(0, 1)],
                ))
                ->create();

            DomainsDb::factory()
            ->count(2)
            ->for($serviceProvider)
            ->create();
        }
    }
}
