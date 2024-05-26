<?php

namespace Database\Seeders;

use App\Models\Codeclient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodeclientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Codeclient::insert([
            [
                'name' => 'CL',
                'description' => 'cliente',
                'daysOfRecall' => 60
            ],
            [
                'name' => 'PC',
                'description' => 'Possibile Cliente',
                'daysOfRecall' => 90
            ],
            [
                'name' => 'CLC',
                'description' => 'cliente concorrenza',
                'daysOfRecall' => 360
            ],
            [
                'name' => 'NU',
                'description' => 'normoudente',
                'daysOfRecall' => 360
            ],
            [
                'name' => 'TAPPO',
                'description' => 'tappo cerume',
                'daysOfRecall' => 60
            ],
            [
                'name' => 'DEC',
                'description' => 'deceduto',
                'daysOfRecall' => null
            ],
        ]);
    }
}
