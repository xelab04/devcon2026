<?php

namespace Database\Seeders;

use App\Models\Registration;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'name' => 'Conference Admin',
            'email' => 'admin@mscc.mu',
        ]);

        User::factory()->squad()->create([
            'name' => 'Squad Member',
            'email' => 'squad@mscc.mu',
        ]);

        Registration::factory(45)->create();
    }
}
