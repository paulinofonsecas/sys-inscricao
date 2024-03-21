<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdministradorResource\Pages;
use App\Models\Administrador;
use App\Models\TipoUsuario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AdministradorResource extends Resource
{
    protected static ?string $model = Administrador::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('usuario.nome')
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
                Forms\Components\TextInput::make('usuario.email')
                    ->required()
                    ->email()
                    ->maxLength(50),
                Forms\Components\TextInput::make('usuario.password')
                    ->required()
                    ->password()
                    ->autocomplete()
                    ->maxLength(64),
                Forms\Components\TextInput::make('bi')
                    ->required()
                    ->maxLength(14),
                Forms\Components\DatePicker::make('nascimento')
                    ->date('dd-mm-YYYY')
                    ->maxDate(now())
                    ->minDate('01-01-1900')
                    ->hint('Formato: 04-23-1998')
                    ->required(),
                Forms\Components\TextInput::make('telefone')
                    ->tel()
                    ->required()
                    ->maxLength(9),
                Forms\Components\TextInput::make('endereco')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nascimento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('endereco')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_usuario_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdministradors::route('/'),
            'create' => Pages\CreateAdministrador::route('/create'),
            'edit' => Pages\EditAdministrador::route('/{record}/edit'),
        ];
    }
}
