<?php

namespace Database\Seeders;

use App\Models\Pivote;
use Illuminate\Database\Seeder;

class PivoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pivote::factory()->count(20)->create();
    }
}
