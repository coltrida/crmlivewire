<?php

namespace Database\Seeders;

use App\Models\Canal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CanalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Canal::insert([
            [
                'name' => 'SCREENING'
            ],
            [
                'name' => 'PASSAPAROLA'
            ],
            [
                'name' => 'TLK FILIALE'
            ],
            [
                'name' => 'MEDICO'
            ],
            [
                'name' => 'VETRINA'
            ],
        ]);
    }
}
