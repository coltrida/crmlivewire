<?php

namespace Database\Seeders;

use App\Models\AppointmentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppointmentType::insert([
            [
                'name' => 'Prima Visita'
            ],
            [
                'name' => 'Consegna'
            ],
            [
                'name' => 'Controllo Prova'
            ],
            [
                'name' => 'Assistenza'
            ],
        ]);
    }
}
