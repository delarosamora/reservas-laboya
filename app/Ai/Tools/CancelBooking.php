<?php

namespace App\Ai\Tools;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Holiday;
use App\Models\Shift;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;
use Throwable;

class CancelBooking implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Busca una reserva por el ID o Código y la cancela';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        try{


          $booking = Booking::whereKey($request['id'] ?? 0)->orWhere('code', $request['code'])->firstOrFail();
          $booking->status_id = BookingStatus::CANCELLED;
          $booking->save();
          $booking->sendNotification();
          return json_encode(['success' => true, 'message' => 'Reserva cancelada con éxito']);


        }catch(ModelNotFoundException $e){
          return json_encode(['success' => false, 'error' => 'not_found', 'message' => 'Reserva no encontrada']);
        }catch(Throwable $e){
          Log::error($e->getMessage());
          Log::error($e->getTraceAsString());
          return json_encode(['success' => false, 'error' => 'error', 'message' => 'Error al cancelar la reserva']);
        }
    }

    /**
     * Get the tool's schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
          'id' => $schema->string()->required(),
          'code' => $schema->string()->nullable()->description('Si se desconoce el ID de la reserva, introducir 0 como ID de la reserva y- se buscará por el código'),
        ];
    }
}
