<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CostumerService;
use App\Models\User;
use App\Models\Tour;
use App\Models\Accommodation;



class CostumerServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CostumerService::factory(20)->create();
    }
}
