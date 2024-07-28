<?php

namespace App\Filament\Candidato\Pages;

use App\Models\Candidato;
use App\Models\Curso;
use App\Models\Matricula;
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

class RealizarMatricula extends Page implements HasForms
{
    use InteractsWithForms;
    use InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.candidato.pages.realizar-matricula';

    public Matricula $matricula;

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
                        TextInput::make('nome_pai')
                            ->label('Nome do pai')
                            ->required(),
                        TextInput::make('profissao_pai')
                            ->label('Profissão do pai'),
                        TextInput::make('nome_mae')
                            ->label('Nome da mãe')
                            ->required(),
                        TextInput::make('profissao_mae')
                            ->label('Profissão do mãe'),
                        TextInput::make('telefone')
                            ->label('Telefone')
                            ->required()
                            ->tel(),
                        TextInput::make('local_trabalho')
                            ->label('Local de Trabalho'),
                        TextInput::make('profissao')
                            ->label('Profissão'),
                        TextInput::make('religiao')
                            ->label('Religião')
                            ->required(),
                        TextInput::make('funsao_igreja')
                            ->label('Funsão na Igreja')
                            ->required(),
                    ]),

                Section::make('Escola do ensino basico')
                    ->columns(2)
                    ->schema([
                        TextInput::make('escola_ensino_basico')
                            ->label('Nome da escola do ensino basico')
                            ->required(),
                        TextInput::make('ano_de_formatura_basico')
                            ->label('Ano de formatura do ensino basico')
                            ->numeric()
                            ->required(),
                    ]),
                Section::make('Matricula')
                    ->columns(2)
                    ->schema([
                        Select::make('curso_id')
                            ->label('Especialidade')
                            ->options(Curso::all()->pluck('name', 'id'))
                    ])
            ])
            ->statePath('data')
            ->columns([
                'sm' => 2,
                'lg' => 3,
            ]);
    }

    public function realizarMatricula()
    {
        $dados = $this->form->getState();

        // dd($dados);

        /*
        "nome_pai" => "kjsa;dlfkaj;"
        "profissao_pai" => "lkja;sldkfj"
        "nome_mae" => ";lkasjd;flk"
        "profissao_mae" => "jlskdjfalskdj"
        "telefone" => "925412030"
        "local_trabalho" => "lwekhrweru9"
        "profissao" => "8ue9r8uwe9r8"
        "religiao" => "u98r"
        "funsao_igreja" => "u9we8ru"
        "escola_ensino_basico" => "9w8eu"
        "ano_de_formatura_basico" => "2017"
        "curso_id" => "3"
        */

        $matricula = Matricula::create([
            'nome_pai' => $dados['nome_pai'],
            'nome_mae' => $dados['nome_mae'],
            'profissao_pai' => $dados['profissao_pai'],
            'profissao_mae' => $dados['profissao_mae'],
            'telefone' => $dados['telefone'],
            'local_trabalho' => $dados['local_trabalho'],
            'profissao' => $dados['profissao'],
            'religiao' => $dados['religiao'],
            'funsao_igreja' => $dados['funsao_igreja'],
            'escola_ensino_basico' => $dados['escola_ensino_basico'],
            'ano_de_formatura_basico' => $dados['ano_de_formatura_basico'],
            'curso_id' => $dados['curso_id'],
            'candidato_id' => Candidato::where('user_id', '=', Auth::user()->id)->first()->id,
        ]);

        Notification::make()
            ->title('Sucesso!')
            ->body('Matricula realizada com sucesso!')
            ->success()
            ->send();

        // if ($matricula) {
        //     // dispara uma notificação
        //     return redirect('/candidato/candidato-dashboard');
        // }
    }

    public function cancelar()
    {
        return redirect('/candidato/candidato-dashboard');
    }
}
