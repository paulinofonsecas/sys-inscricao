<?php

namespace App\Filament\Candidato\Pages;

use App\Models\Candidato;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;

class FinalizarInscricao extends Page implements HasForms
    {
    use InteractsWithForms;
    use InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.candidato.pages.finalizar-inscricao';

    public $copia_bi;

    public Candidato $candidato;

    public ?array $data = [];


    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
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
                    ->options([
                        'Masculino', 'Feminino',
                    ]),
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
                    ->label('Selecione o curso pretendido')
                    ->options([
                        'Matemática', 'Fisica', 'Quimica',
                    ]),
                Select::make('classe_feita')
                    ->required()
                    ->label('Ano/classe feita')
                    ->options([
                        '1ª', '2ª', '3ª', '4ª', '5ª', '6ª', '7ª', '8ª', '9ª', '10ª', '11ª', '12ª', '13ª'
                    ]),
                Select::make('classe_pretendida')
                    ->required()
                    ->label('Ano/classe pretendida')
                    ->options([
                        '1ª', '2ª', '3ª', '4ª', '5ª', '6ª', '7ª', '8ª', '9ª', '10ª', '11ª', '12ª', '13ª'
                    ]),
                Select::make('periodo')
                    ->label('Periodo')
                    ->columnSpan(2)
                    ->options([
                        'Manhã', 'Tarde', 'Noite',
                    ]),
                ]),
            Section::make('Documentos')
                ->columns(2)
                ->schema([
                    FileUpload::make('copia_bi')
                        ->label('Copia do BI'),
                    FileUpload::make('certificado')
                        ->label('Certificado de habilitação'),
                ])
        ])
        ->statePath('data')
        ->columns([
            'sm' => 2,
            'lg' => 3,
        ]);
    }

    public function concluirInscricao() {
        dd($this->form->getState());
    }

    public function cancelar()
    {
        return redirect('/candidato/candidato-dashboard');
    }

}
