<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory(10)->create();
        Category::factory()->create([
            'name' => 'Pants',
        ]);
        Category::factory()->create([
            'name' => 'Shorts',
        ]);
        Category::factory()->create([
            'name' => 'T-shirts',
        ]);
        User::factory(5)->has(
            Product::factory(5)
        )->create();

        User::factory()->has(
            Product::factory(5)
        )->create([
            'name' => 'Admin',
            'username' => 'Admin1',
            'email' => 'admin@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
        ]);

    }
}
