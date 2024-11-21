<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => 1,
            'name' => 'Chijindu Nwokeohuru',
            'email' => 'chijindu.nwokeohuru@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => time()
        ]);
        User::factory()->create([
            'id' => 2,
            'name' => 'Ceejay Newman',
            'email' => 'ceejay@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => time()
        ]);

        Project::factory()
            ->count(10)
            ->hasTasks(10)
            ->create();
    }
}
