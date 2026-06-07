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

class UpdateBooking implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Busca una reserva por el ID o Código y la actualiza. Solo se puede actualizar la fecha y turno';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        try{

          if (Booking::where('shift_id', $request['shift_id'])->where('date', $request['date'])->whereNot('status_id', BookingStatus::CANCELLED)->exists()){
            return json_encode(['success' => false, 'error' => 'error', 'message' => 'Reserva existente para ese día']);
          }

          if (Holiday::where('date', $request['date'])->exists()){
            return json_encode(['success' => false, 'error' => 'error', 'message' => 'Vacaciones de la asociación en ese día']);
          }


          $booking = Booking::whereKey($request['id'] ?? 0)->orWhere('code', $request['code'])->firstOrFail();
          $booking->date = $request['date'];
          $booking->shift_id = $request['shift_id'];
          $booking->save();
          $booking->sendNotification();
          return json_encode(['success' => true, 'message' => 'Reserva actualizada con exito']);


        }catch(ModelNotFoundException $e){
          return json_encode(['success' => false, 'error' => 'not_found', 'message' => 'Reserva no encontrada']);
        }catch(Throwable $e){
          Log::error($e->getMessage());
          Log::error($e->getTraceAsString());
          return json_encode(['success' => false, 'error' => 'error', 'message' => 'Error al modificar la reserva']);
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
          'date' => $schema->string()->format('date')->required()->description('Fecha en formato YYYY-MM-DD'),
          'shift_id' => $schema->integer()->required()->description('EL id de turno, los turnos disponibles son ' . Shift::all()->implode(fn($shift) => $shift->id . ': ' . $shift->time, ', ')),
        ];
    }
}
