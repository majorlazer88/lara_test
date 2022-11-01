<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recipient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->has(Recipient::factory()->count(3))
            ->count(20)
            ->create();
    }
}
