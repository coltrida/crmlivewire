<?php

namespace Database\Seeders;

use App\Models\TrialState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrialStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrialState::insert([
            [
                'name' => 'In Corso'
            ],
            [
                'name' => 'Under Construction'
            ],
            [
                'name' => 'Positiva'
            ],
            [
                'name' => 'Reso'
            ],
        ]);
    }
}
