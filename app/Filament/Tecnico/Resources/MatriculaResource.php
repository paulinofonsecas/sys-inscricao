<?php

namespace App\Filament\Tecnico\Resources;

use App\Filament\Tecnico\Resources\MatriculaResource\Pages;
use App\Models\Candidato;
use App\Models\Curso;
use App\Models\Matricula;
use App\Models\Periodo;
use App\Models\Status;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MatriculaResource extends Resource
{
    protected static ?string $model = Matricula::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('candidato.user.name')
                    ->label('Candidato')
                    ->options(Candidato::all()->pluck('user.name', 'id'))
                    ->searchable(),
                TextInput::make('turma_id')
                    ->required()
                    ->numeric(),
                Select::make('curso_id')
                    ->label('Curso')
                    ->required()
                    ->searchable()
                    ->options(Curso::all()->pluck('name', 'id')),
                Select::make('periodo_id')
                    ->label('Periodo')
                    ->required()
                    ->searchable()
                    ->options(Periodo::all()->pluck('desc', 'id')),
                Select::make('status_id')
                    ->label('Estado')
                    ->required()
                    ->searchable()
                    ->default(1)
                    ->options(Status::all()->pluck('descricao', 'id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('aluno_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('turma_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('curso_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periodo_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
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
            'index' => Pages\ListMatriculas::route('/'),
            'create' => Pages\CreateMatricula::route('/create'),
            'edit' => Pages\EditMatricula::route('/{record}/edit'),
        ];
    }
}
