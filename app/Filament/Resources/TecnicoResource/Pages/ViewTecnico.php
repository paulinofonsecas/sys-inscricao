<?php

namespace App\Filament\Resources\TecnicoResource\Pages;

use App\Filament\Resources\TecnicoResource;
use App\Models\Tecnico;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTecnico extends ViewRecord
{
    protected static string $resource = TecnicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
