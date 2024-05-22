<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Codeclient;
use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Shop::factory()
            ->count(1)
            ->has(Client::factory()->count(5))
            ->create([
                'name' => 'Civitanova',
                'address' => 'Via Vittorio Veneto 12',
                'city' => 'Civitanova marche',
                'province' => 'MC',
                'postcode' => '06012',
                'phone' => '0733565485',
            ]);

        Shop::factory()
            ->count(1)
            ->has(Client::factory()->count(10))
            ->create([
                'name' => 'Fabriano',
                'address' => 'Via Roma 4',
                'city' => 'Fabriano',
                'province' => 'AN',
                'postcode' => '55665',
                'phone' => '073556544',
            ]);
    }
}
