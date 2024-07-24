<?php

namespace App\Filament\Tecnico\Resources;

use App\Filament\Tecnico\Resources\MatriculaResource\Pages;
use App\Models\Candidato;
use App\Models\Curso;
use App\Models\Matricula;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MatriculaResource extends Resource
{
    protected static ?string $model = Matricula::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('curso_id')
                    ->label('Candidato')
                    ->native(false)
                    ->searchable()
                    ->required()
                    ->options(Candidato::all()->pluck('user.name', 'id')),
                TextInput::make('escola_ensino_basico')
                    ->maxLength(255),
                TextInput::make('nome_pai')
                    ->required()
                    ->maxLength(255),
                TextInput::make('profissao_pai')
                    ->maxLength(255),
                TextInput::make('nome_mae')
                    ->required()
                    ->maxLength(255),
                TextInput::make('profissao_mae')
                    ->maxLength(255),
                TextInput::make('profissao')
                    ->maxLength(255),
                TextInput::make('local_trabalho')
                    ->maxLength(255),
                TextInput::make('religiao')
                    ->maxLength(255),
                TextInput::make('funsao_igreja')
                    ->maxLength(255),
                TextInput::make('ano_de_formatura_basico')
                    ->maxLength(255),
                Textarea::make('observacao')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('curso_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nome_pai')
                    ->searchable(),
                TextColumn::make('nome_mae')
                    ->searchable(),
                TextColumn::make('profissao_pai')
                    ->searchable(),
                TextColumn::make('profissao_mae')
                    ->searchable(),
                TextColumn::make('telefone')
                    ->searchable(),
                TextColumn::make('local_trabalho')
                    ->searchable(),
                TextColumn::make('profissao')
                    ->searchable(),
                TextColumn::make('religiao')
                    ->searchable(),
                TextColumn::make('funsao_igreja')
                    ->searchable(),
                TextColumn::make('escola_ensino_basico')
                    ->searchable(),
                TextColumn::make('ano_de_formatura_basico')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
            'index' => Pages\ListMatriculas::route('/'),
            'create' => Pages\CreateMatricula::route('/create'),
            'edit' => Pages\EditMatricula::route('/{record}/edit'),
        ];
    }
}
