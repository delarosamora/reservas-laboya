<?php

namespace App\Ai\Tools;

use App\Models\Booking;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\Log;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;
use Throwable;

class SearchAllBookings implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Obtener todas las reservas de la asociación';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        try{

          $bookings = Booking::with(['shift', 'status'])->get();

          return json_encode($bookings->map(fn($booking) => ['date' => $booking->date->format('d/m/Y'), 'shift' => $booking->shift->time, 'status' => $booking->status->name, 'number_of_guests' => $booking->number_of_guests, 'observations' => $booking->observations])->toArray());

        }catch(Throwable $e){
          Log::error($e->getMessage());
          Log::error($e->getTraceAsString());
          return json_encode(['success' => false, 'error' => 'error', 'message' => 'Error']);
        }
    }

    /**
     * Get the tool's schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [];
    }
}
