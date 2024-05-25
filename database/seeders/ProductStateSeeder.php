<?php

namespace Database\Seeders;

use App\Models\ProductState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductState::insert([
            [
                'name' => 'IN PROVA',
                'description' => 'apparecchio in prova al paziente',
            ],
            [
                'name' => 'VENDUTO',
                'description' => 'apparecchio venduto',
            ],
            [
                'name' => 'MAGAZZINO',
                'description' => 'apparecchio in magazzino',
            ],
            [
                'name' => 'ORDINATO',
                'description' => 'apparecchio ordinato',
            ],
            [
                'name' => 'IN VIAGGIO',
                'description' => 'apparecchio ordinato in viaggio per la filiale',
            ],
        ]);
    }
}
