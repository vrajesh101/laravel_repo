<?php

namespace Database\Seeders;

use App\Models\Masters;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MastersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Masters::factory()->count(10)->create();

    }
}
