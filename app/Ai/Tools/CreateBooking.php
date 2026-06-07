<?php

namespace App\Ai\Tools;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Holiday;
use App\Models\Shift;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\Log;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;
use Throwable;

class CreateBooking implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Crear una reserva a partir de los datos aportados. Esta herramienta retorna éxito si la reserva ha sido creada con los datos de la reserva. En caso contrario, retornará que ya hay otra reserva existente o vacaciones ese día';
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

          $booking = Booking::create($request->all());
          $booking->sendNotification();
          return json_encode(['success' => true, [
              'date' => $booking->date->format('d/m/Y'),
              'shift' => $booking->shift->time,
              'status' => $booking->status->name,
              'name' => $booking->name,
              'surname' => $booking->surname,
              'nif' => $booking->nif,
              'member_number' => $booking->member_number,
              'number_of_guests' => $booking->number_of_guests,
              'observations' => $booking->observations,
              'code' => $booking->code
            ]]);



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
          'name' => $schema->string()->required(),
          'surname' => $schema->string()->required(),
          'email' => $schema->string()->format('email')->nullable(),
          'phone' => $schema->string()->required(),
          'nif' => $schema->string()->required()->description('NIF o NIE'),
          'member_number' => $schema->integer()->required()->description('Número de socio'),
          'number_of_guests' => $schema->integer()->required()->description('Número de comensales'),
          'observations' => $schema->string()->nullable(),
          'date' => $schema->string()->format('date')->required()->description('Fecha en formato YYYY-MM-DD'),
          'shift_id' => $schema->integer()->required()->description('EL id de turno, los turnos disponibles son ' . Shift::all()->implode(fn($shift) => $shift->id . ': ' . $shift->time, ', ')),
        ];
    }
}
