<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Seeder;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookingStatus::updateOrCreate(
          ['id' => BookingStatus::PENDING_CONFIRM],
          ['name' => 'Pte. confirmar', 'class' => 'primary'],
        );

        BookingStatus::updateOrCreate(
          ['id' => BookingStatus::CONFIRMED],
          ['name' => 'Confirmada', 'class' => 'success'],
        );

        BookingStatus::updateOrCreate(
          ['id' => BookingStatus::CANCELLED],
          ['name' => 'Cancelado', 'class' => 'danger'],
        );
    }
}
