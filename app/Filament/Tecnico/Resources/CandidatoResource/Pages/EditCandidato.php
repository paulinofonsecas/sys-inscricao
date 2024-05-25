<?php

namespace App\Filament\Tecnico\Resources\CandidatoResource\Pages;

use App\Filament\Tecnico\Resources\CandidatoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCandidato extends EditRecord
{
    protected static string $resource = CandidatoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
