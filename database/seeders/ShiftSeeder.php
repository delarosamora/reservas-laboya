<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shift::updateOrCreate(
          ['time' => '15:00']
        );

        Shift::updateOrCreate(
          ['time' => '21:00']
        );
    }
}
