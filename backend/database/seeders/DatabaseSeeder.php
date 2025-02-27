<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MoonShine\Laravel\Database\Factories\MoonshineUserFactory;
use MoonShine\Laravel\Models\MoonshineUserRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'email' => 'todouser@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Todo user',
        ]);

        $this->callWith(BoardSeeder::class, [ 'userId' => $user->id ]);
    }
}
