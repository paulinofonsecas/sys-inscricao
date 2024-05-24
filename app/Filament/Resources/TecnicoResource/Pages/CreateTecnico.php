<?php

namespace App\Filament\Resources\TecnicoResource\Pages;

use App\Filament\Resources\TecnicoResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use App\Utils\PasswordUtils;

class CreateTecnico extends CreateRecord
{
    protected static string $resource = TecnicoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $name = $data['user.name'];
        $email = $data['user.email'];
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => PasswordUtils::DEFAULT_PASSWORD,
        ]);

        $model = [
            'bi' => $data['bi'],
            'nascimento' => $data['nascimento'],
            'telefone' => $data['telefone'],
            'endereco' => $data['endereco'],
            'tipo_usuario_id' => $data['tipo_usuario_id'],
            'status_id' => $data['status_id'],
            'user_id' => $user->id,
        ];
        dd($model);
        return [];
    }
}
