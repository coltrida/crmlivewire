<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(ConfigurationSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        Storage::disk('public')->deleteDirectory('/images/');
        Storage::disk('public')->makeDirectory('/images');
        Storage::copy('logo.jpg', 'public/images/logo.jpg');
    }
}
