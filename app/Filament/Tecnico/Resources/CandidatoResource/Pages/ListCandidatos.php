<?php

namespace App\Filament\Tecnico\Resources\CandidatoResource\Pages;

use App\Filament\Tecnico\Resources\CandidatoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCandidatos extends ListRecords
{
    protected static string $resource = CandidatoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
