<?php

namespace App\Filament\Candidato\Pages;

use App\Models\Candidato;
use App\Models\Classe;
use App\Models\Curso;
use App\Models\Genero;
use App\Models\Periodo;
use Filament\Facades\Filament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
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
use Illuminate\Support\Facades\Auth;

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

    public function concluirInscricao()
    {
        $dados = $this->form->getState();

        $candidato = Candidato::create([
            'user_id' => Auth::user()->id,
            'bi' => $dados['bi'],
            'nascimento' => $dados['nascimento'],
            'genero_id' => $dados['genero_id'],
            'telefone' => $dados['telefone'],
            'estado_candidatura_id' => 1,
            'curso_opcao_1' => $dados['curso_opcao_1'],
            'curso_opcao_2' => $dados['curso_opcao_2'],
            'copia_bi_url' => $dados['copia_bi'],
            'certificado_url' => $dados['certificado'],
            'foto_url' => $dados['foto_url'],
        ]);

        if ($candidato) {
            // dispara uma notificação
            return redirect('/candidato/candidato-dashboard');
        }
    }

    public function cancelar()
    {
        return redirect('/candidato/candidato-dashboard');
    }
}
