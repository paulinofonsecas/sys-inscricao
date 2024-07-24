<?php

namespace App\Filament\Tecnico\Resources\MatriculaResource\Pages;

use App\Filament\Tecnico\Resources\MatriculaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMatricula extends CreateRecord
{
    protected static string $resource = MatriculaResource::class;

    function mutateFormDataBeforeCreate(array $data): array
    {
        $data['candidato_id'] = intval($data['candidato']['user']['name']);
        unset($data['candidato']);
        unset($data['curso_id']);

        $data['turma_id'] = intval($data['turma_id']);
        return $data;
    }
}
