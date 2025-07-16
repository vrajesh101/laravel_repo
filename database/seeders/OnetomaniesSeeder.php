<?php

namespace Database\Seeders;

use App\Models\Onetomanies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OnetomaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Onetomanies::factory()->count(10)->create();
        //
    
    }
}
