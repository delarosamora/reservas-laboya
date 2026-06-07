<?php

namespace App\Ai\Tools;

use App\Models\Holiday;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\Log;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;
use Throwable;

class SearchAllHolidays implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Obtener todas las vacaciones de la asociación, cuando las instalaciones no podrán ser reservadas';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        try{

          return json_encode(Holiday::all()->map(fn($holiday) => ['date' => $holiday->date->format('d/m/Y'), 'description' => $holiday->description])->toArray());

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
