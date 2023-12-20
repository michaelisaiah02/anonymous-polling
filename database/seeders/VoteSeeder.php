<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            PollSeeder::class,
            OptionSeeder::class,
        ]);

        WithoutModelEvents::disable();

        Vote::factory(10)->create();
    }
}
