<?php

namespace App\Ai\Tools;

use App\Models\Booking;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;
use Throwable;

class SearchMemberBookings implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Obtener las reservas de un número de socio de la asociacion';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        try{

          return json_encode(Booking::where('member_number', $request['member_number'])->get()->map(fn($booking) => ['date' => $booking->date->format('d/m/Y'), 'shift' => $booking->shift->time, 'status' => $booking->status->name, 'number_of_guests' => $booking->number_of_guests, 'observations' => $booking->observations])->toArray());

        }catch(Throwable $e){
          return json_encode(['success' => false, 'error' => 'error', 'message' => 'Error']);
        }
    }

    /**
     * Get the tool's schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'member_number' => $schema->integer()->required(),
        ];
    }
}
