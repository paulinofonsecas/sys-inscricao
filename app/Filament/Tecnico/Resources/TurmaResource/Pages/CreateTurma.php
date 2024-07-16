<?php

namespace App\Filament\Tecnico\Resources\TurmaResource\Pages;

use App\Filament\Tecnico\Resources\TurmaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTurma extends CreateRecord
{
    protected static string $resource = TurmaResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {

        $data['ano_lectivo'] = now()->year . '/' . now()->year + 1;

        return $data;
    }
}
