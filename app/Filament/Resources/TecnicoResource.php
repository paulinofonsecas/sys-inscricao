<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TecnicoResource\Pages;
use App\Filament\Resources\TecnicoResource\RelationManagers;
use App\Models\Tecnico;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset as ComponentsFieldset;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class TecnicoResource extends Resource
{
    protected static ?string $model = Tecnico::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()
                ->schema([
                    TextInput::make('user.name')
                        ->required(),
                    TextInput::make('user.email')
                        ->email()->required(),
                    TextInput::make('bi')
                        ->label('Bilhete de Identidade')
                        ->required(),
                    DatePicker::make('nascimento')
                        ->label('Data de Nascimento')
                        ->required(),
                    TextInput::make('telefone')
                        ->label('Telefone')
                        ->required(),
                    TextInput::make('endereco')
                        ->label('Endereço')
                        ->required(),
                    Select::make('tipo_usuario_id')
                        ->label('Tipo de Usuário')
                        ->relationship('tipoUsuario', 'descricao') // Assuming the relationship name and display column
                        ->required(),
                    Select::make('status_id')
                        ->label('Status')
                        ->relationship('status', 'descricao') // Assuming the relationship name and display column
                        ->required(),
                ]),

            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Fieldset::make('Informações do tecnico')
                ->schema([
                    TextEntry::make('user.name')
                        ->label('Nome do tecnico'),
                    TextEntry::make('user.email')
                        ->label('Email do tecnico'),
                    TextEntry::make('bi')
                        ->label('Bilhete de identidade'),
                    TextEntry::make('nascimento')
                        ->label('Data de nascimento'),
                    TextEntry::make('telefone')
                        ->label('Telefone'),
                    TextEntry::make('endereco')
                        ->label('Endereço'),
                    TextEntry::make('status.descricao')
                        ->label('Estado da conta'),
                ])
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nome do tecnico'),
                TextColumn::make('telefone')
                    ->label('Número de telefone'),
                TextColumn::make('endereco')
                    ->label('Endereço'),
                TextColumn::make('status.descricao')
                    ->label('Estado da conta'),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListTecnicos::route('/'),
            'create' => Pages\CreateTecnico::route('/create'),
            'view' => Pages\ViewTecnico::route('/{record}'),
            'edit' => Pages\EditTecnico::route('/{record}/edit'),
        ];
    }

}
