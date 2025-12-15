<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

      $this->call([
          BookingStatusSeeder::class,
          MemberSeeder::class,
          ShiftSeeder::class,
      ]);
        User::factory()->create([
            'name' => 'Álvaro de la Rosa Mora',
            'email' => 'alvarodelarosamora@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
                User::factory()->create([
            'name' => 'Jose Ramón González García',
            'email' => 'jr-gg@hotmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
