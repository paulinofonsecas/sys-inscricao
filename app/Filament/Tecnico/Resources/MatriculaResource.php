<?php

namespace App\Filament\Tecnico\Resources;

use App\Filament\Tecnico\Resources\MatriculaResource\Pages;
use App\Models\Candidato;
use App\Models\Curso;
use App\Models\Matricula;
use App\Models\Periodo;
use App\Models\Status;
use App\Models\Turma;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
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
                    ->native(false)
                    ->required()
                    ->label('Candidato')
                    ->options(Candidato::all()->pluck('user.name', 'id'))
                    ->searchable(),
                Select::make('curso_id')
                    ->native(false)
                    ->label('Curso')
                    ->required()

                    ->reactive()
                    ->searchable()
                    ->options(Curso::all()->pluck('name', 'id')),
                Select::make('turma_id')
                    ->native(false)
                    ->required()
                    ->label('Turma')
                    ->reactive()
                    ->options(function (callable $get) {
                        $curso = $get('curso_id');

                        if ($curso) {
                            return Turma::where('curso_id', $curso)->get()->pluck('nome', 'id');
                        }
                    }),
                Select::make('periodo_id')
                    ->native(false)
                    ->label('Periodo')
                    ->required()
                    ->default(1)
                    ->searchable()
                    ->options(Periodo::all()->pluck('desc', 'id')),
                Select::make('status_id')
                    ->native(false)
                    ->label('Estado')
                    ->required()
                    ->searchable()
                    ->default(1)
                    ->options(Status::all()->pluck('descricao', 'id')),
                Textarea::make('observacao')
                    ->label('Observação')
                    ->rows(3)
                    ->required(false)
                    ->columnSpan(2)
                    ->placeholder('Observação')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('candidato.user.name')
                    ->searchable()
                    ->label('Aluno')
                    ->sortable(),
                Tables\Columns\TextColumn::make('turma.nome')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('turma.curso.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periodo.desc')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status.descricao')
                    ->label('Estado da matricula')
                    ->badge()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-m-Y')
                    ->label('Matriculado em')
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
