<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Configuration::create([
           'setConfiguration' => 1,
           'companyName' => 'Tommy ora',
           'piva' => 32154632135,
           'companyAddress' => 'via Armando Diaz 23',
           'companyCity' => 'San Bendetto del Tronto',
           'companyPr' => 'AS',
           'companyCountry' => 'Italy',
           'companyEmail' => 'info@tommyora.it',
           'warehouse' => 'centralized',
           'companyPec' => 'info@tommypec.it',
           'primaryColor' => '#1e846a',
           'secondaryColor' => '#9b8218',
        ]);
    }
}
