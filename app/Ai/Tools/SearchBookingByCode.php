<?php

namespace App\Ai\Tools;

use App\Models\Booking;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;
use Throwable;

class SearchBookingByCode implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Obtener los detalles de una reserva a través del código de reserva';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        try{
          $booking = Booking::where('code', $request['code'])->firstOrFail();
          return json_encode(
            [
              'date' => $booking->date->format('d/m/Y'),
              'shift' => $booking->shift->time,
              'status' => $booking->status->name,
              'name' => $booking->name,
              'surname' => $booking->surname,
              'member_number' => $booking->member_number,
              'number_of_guests' => $booking->number_of_guests,
              'observations' => $booking->observations,
              'code' => $booking->code
            ]
          );

        }catch(ModelNotFoundException $e){
          return json_encode(['success' => false, 'error' => 'not_found', 'message' => 'Socio no encontrado']);
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
        return [
            'code' => $schema->string()->required(),
        ];
    }
}
