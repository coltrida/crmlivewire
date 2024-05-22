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
                'name' => 'CL'
            ],
            [
                'name' => 'PC'
            ],
            [
                'name' => 'CLC'
            ],
            [
                'name' => 'NU'
            ],
            [
                'name' => 'TAPPO'
            ],
        ]);
    }
}
