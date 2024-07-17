<?php

namespace App\Filament\Tecnico\Resources;

use App\Filament\Tecnico\Resources\CandidatoResource\Pages;
use App\Models\Candidato;
use App\Models\Curso;
use App\Models\Genero;
use Filament\Forms\Components\DatePicker;
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
                        DatePicker::make('nascimento')
                            ->required()
                            ->native(false)
                            ->hint('Data de nascimento')
                            ->displayFormat('d/m/Y'),
                        Select::make('genero_id')
                            ->required()
                            ->searchable()
                            ->options(Genero::all()->pluck('desc', 'id')),
                        TextInput::make('telefone')
                            ->tel(),
                    ]),

                Section::make('Espcialidade pretendida')
                    ->columns(2)
                    ->schema([
                        Select::make('curso_opcao_1')
                            ->required()
                            ->label('Opção 1')
                            ->searchable()
                            ->options(Curso::all()->pluck('name', 'id')),
                        Select::make('curso_opcao_2')
                            ->required()
                            ->label('Opção 2')
                            ->searchable()
                            ->options(Curso::all()->pluck('name', 'id')),

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
                            ->label('Certificado de habilitação/Ficha de encaminhamento'),
                        FileUpload::make('foto_url')
                            ->required()
                            ->preserveFilenames(false)
                            ->directory('candidaturas/files')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(2024)
                            ->label('fotografia meio corpo'),
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
                Tables\Columns\TextColumn::make('telefone')
                    ->sortable(),
                Tables\Columns\TextColumn::make('opcaoCurso1.name')
                    ->label('Classe inscrita')
                    ->sortable(),
                Tables\Columns\TextColumn::make('opcaoCurso2.name')
                    ->label('Curso inscrito')
                    ->sortable(),
                Tables\Columns\TextColumn::make('estadoDaCandidatura.estado')
                    ->label('Curso feito')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pendente' => 'warning',
                        'Em análise' => 'info',
                        'Aceite' => 'success',
                        'Recusado' => 'danger',
                        'Lista de espera' => 'info',
                        'Desistido' => 'danger',
                        'Inválido' => 'danger',
                        'Em processo de matrícula' => 'info',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Candidatura submetida em')
                    ->date('d-m-Y H:s')
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
