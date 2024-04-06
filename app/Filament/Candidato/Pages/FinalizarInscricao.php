<?php

namespace App\Filament\Candidato\Pages;

use App\Models\Candidato;
use App\Models\Classe;
use App\Models\Curso;
use App\Models\Genero;
use App\Models\Periodo;
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
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

    public function concluirInscricao() {
        $dados = $this->form->getState();

        $candidato = Candidato::create([
            'bi' => $dados['bi'],
            'genero_id' => $dados['genero'],
            'telefone' => $dados['telefone'],
            'endereco' => $dados['endereco'],
            'estado_candidatura_id' => 1,
            'curso_feito' => $dados['curso_feito'],
            'curso_id' => $dados['curso_pretendido'],
            'classe_feita_id' => $dados['classe_feita'],
            'classe_id' => $dados['classe_pretendida'],
            'periodo_id' => $dados['periodo'],
            'copia_bi_url' => $dados['copia_bi'],
            'certificado_url' => $dados['certificado'],
        ]);

        if ($candidato) {
            // dispara uma notificação

            Notification::make()
                ->title('Inscrição concluída com sucesso')
                ->success()
                ->send();

            return redirect('/candidato/candidato-dashboard');
        }
    }

    public function cancelar()
    {
        return redirect('/candidato/candidato-dashboard');
    }

}
