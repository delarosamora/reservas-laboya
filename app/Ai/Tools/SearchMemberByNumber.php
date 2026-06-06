<?php

namespace App\Ai\Tools;

use App\Models\Member;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;
use Throwable;

class SearchMemberByNumber implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Obtener los detalles de un socio de la asociación, dado el número de socio';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        try{
          $member = Member::where('number', $request['number'])->firstOrFail();
          return json_encode(
            [
              'name' => $member->name,
              'surname' => $member->surname,
              'number' => $member->number,
            ]
          );

        }catch(ModelNotFoundException $e){
          return json_encode(['success' => false, 'error' => 'not_found', 'message' => 'Socio no encontrado']);
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
            'number' => $schema->integer()->required(),
        ];
    }
}
