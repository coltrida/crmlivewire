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
        $cacao = User::create([
            'name' => 'cacao cacao',
            'email' => 'cacao@cacao.it',
            'role_id' => 2,
            'password' => Hash::make('123456')
        ]);

        $cacao->shops()->attach([1,2]);

        $cacao2 = User::create([
            'name' => 'cacao2 cacao2',
            'email' => 'cacao2@cacao.it',
            'role_id' => 2,
            'password' => Hash::make('123456')
        ]);

        $cacao2->shops()->attach([3]);

        User::insert([
            [
                'name' => 'admin admin',
                'email' => 'admin@admin.it',
                'role_id' => 1,
                'password' => Hash::make('123456')
            ],
        ]);
    }
}
