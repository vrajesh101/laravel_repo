<?php

namespace Database\Seeders;

use App\Models\Manytomany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManytomanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Manytomany::factory()->count(10)->create();

    }
}
