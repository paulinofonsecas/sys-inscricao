<?php

namespace App\Filament\Tecnico\Resources\CandidatoResource\Pages;

use App\Filament\Tecnico\Resources\CandidatoResource;
use App\Models\EstadoCandidatura;
use App\Models\User;
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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['estado_candidatura_id'] = $data['estado_candidatura']['id'];

        $user = User::where('email', $data['user']['email'])->first();
        $user->name = $data['user']['name'];
        $user->email = $data['user']['email'];
        $user->save();

        unset($data['estado_candidatura']);
        unset($data['user']);
        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['user'] = User::find($data['user_id']);
        $data['estado_candidatura'] = EstadoCandidatura::find($data['estado_candidatura_id']);
        return $data;
    }
}
