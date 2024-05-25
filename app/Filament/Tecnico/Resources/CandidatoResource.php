<?php

namespace App\Filament\Tecnico\Resources;

use App\Filament\Tecnico\Resources\CandidatoResource\Pages;
use App\Models\Candidato;
use App\Models\Classe;
use App\Models\Curso;
use App\Models\Genero;
use App\Models\Periodo;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CandidatoResource extends Resource
{
    protected static ?string $model = Candidato::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Dados Pessoais')
                ->columns(2)
                ->schema([
                TextInput::make('bi')
                    ->label('BI')
                    ->required(),
                Select::make('genero')
                    ->required()
                    ->searchable()
                    ->options(Genero::all()->pluck('desc', 'id')),
                TextInput::make('telefone')
                    ->required()
                    ->tel(),
                TextInput::make('endereco')
                    ->required()
                    ->columnSpan(2),
                ]),

            Section::make('Informacão Acadêmica')
                ->columns(2)
                ->schema([
                TextInput::make('curso_feito')
                    ->required()
                    ->label('Selecione o curso estudado'),
                Select::make('curso_pretendido')
                    ->required()
                    ->searchable()
                    ->label('Selecione o curso pretendido')
                    ->options(Curso::all()->pluck('name', 'id')),
                Select::make('classe_feita')
                    ->searchable()
                    ->required()
                    ->label('Ano/classe feita')
                    ->options(Classe::all()->pluck('name', 'id')),
                Select::make('classe_pretendida')
                    ->searchable()
                    ->required()
                    ->label('Ano/classe feita')
                    ->options(Classe::all()->pluck('name', 'id')),
                Select::make('periodo')
                    ->searchable()
                    ->label('Periodo')
                    ->columnSpan(2)
                    ->options(Periodo::all()->pluck('desc', 'id')),
                ]),
            Section::make('Documentos')
                ->columns(2)
                ->schema([
                    FileUpload::make('copia_bi')
                        ->required()
                        ->visibility('private')
                        ->directory('candidaturas/files')
                        ->preserveFilenames(false)
                        ->acceptedFileTypes(['application/pdf'])
                        ->maxSize(2024)
                        ->label('Copia do BI'),
                    FileUpload::make('certificado')
                        ->required()
                        ->preserveFilenames(false)
                        ->directory('candidaturas/files')
                        ->acceptedFileTypes(['application/pdf'])
                        ->maxSize(2024)
                        ->label('Certificado de habilitação'),
                ])
        ])
        ->statePath('data')
        ->columns([
            'sm' => 2,
            'lg' => 3,
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nome do candidato')
                    ->sortable(),
                Tables\Columns\TextColumn::make('bi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('telefone')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('classe.name')
                    ->label('Classe inscrita')
                    ->sortable(),
                Tables\Columns\TextColumn::make('curso.name')
                    ->label('Curso inscrito')
                    ->sortable(),
                Tables\Columns\TextColumn::make('curso_feito')
                    ->label('Curso feito')
                    ->sortable(),
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCandidatos::route('/'),
            'create' => Pages\CreateCandidato::route('/create'),
            'view' => Pages\ViewCandidato::route('/{record}'),
            'edit' => Pages\EditCandidato::route('/{record}/edit'),
        ];
    }
}
