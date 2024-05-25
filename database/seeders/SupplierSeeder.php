<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductList;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::factory()
            ->count(1)
            ->has(
                ProductList::factory()->count(5)
                    ->has(Product::factory()->count(6))
            )
            ->create([
                'name' => 'Gn Resound',
                'iban' => 'IT3434342342300000C2323',
                'phone' => '055956415',
                'email' => 'info@gnresound.it',
            ]);

        Supplier::factory()
            ->count(1)
            ->has(ProductList::factory()->count(5))
            ->create([
                'name' => 'Rexton',
                'iban' => 'IT34343432343430C2323',
                'phone' => '0653434',
                'email' => 'info@rexton.it',
            ]);
    }
}
