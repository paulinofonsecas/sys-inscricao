<?php

namespace App\Filament\Tecnico\Resources\CandidatoResource\Pages;

use App\Filament\Tecnico\Resources\CandidatoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCandidato extends ViewRecord
{
    protected static string $resource = CandidatoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
