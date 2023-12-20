<?php

namespace Database\Seeders;

use App\Models\Poll;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Poll::factory(10)->create();
    }
}
