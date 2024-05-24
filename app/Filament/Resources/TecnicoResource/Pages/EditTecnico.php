<?php

namespace App\Filament\Resources\TecnicoResource\Pages;

use App\Filament\Resources\TecnicoResource;
use App\Models\Tecnico;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditTecnico extends EditRecord
{
    protected static string $resource = TecnicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $tecnico = Tecnico::where('id', $data['id'])->with('user')->first();

        $data['user']['name'] = $tecnico->user->name;
        $data['user']['email'] = $tecnico->user->email;
        $data['user_id'] = $tecnico->user->id;

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $user = User::where('id', $record->user->id)->first();
        $this->updateUser($user, $data);
        unset($data['user']);

        return parent::handleRecordUpdate($record, $data);
    }

    protected function updateUser($user, $data)
    {
        $isChanged = false;

        if ($user->name != $data['user']['name']) {
            $user->name = $data['user']['name'];
            $isChanged = true;
        }

        if ($user->email != $data['user']['email']) {
            $user->email = $data['user']['email'];
            $isChanged = true;
        }

        if ($isChanged) {
            $user->save();
        }
    }
}
