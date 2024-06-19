<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'admin admin',
                'email' => 'admin@admin.it',
                'role_id' => 1,
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'cacao cacao',
                'email' => 'cacao@cacao.it',
                'role_id' => 2,
                'password' => Hash::make('123456')
            ],
        ]);
    }
}
