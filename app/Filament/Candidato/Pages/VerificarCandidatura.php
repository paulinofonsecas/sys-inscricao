<?php

namespace App\Filament\Candidato\Pages;

use App\Models\Candidato;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

use Filament\Infolists\Components\Actions\Action;
use Filament\Support\Enums\Alignment;

class VerificarCandidatura extends Page implements HasInfolists
{
    use InteractsWithInfolists;

    protected static string $view = 'filament.candidato.pages.verificar-candidatura';

    protected int | string | array $columnSpan = 'full';

    protected static ?string $title = 'Estado da Candidatura';

    public Candidato $candidato;

    public function mount(): void
    {
        $cand = Candidato::where('user_id', '=', Auth::user()->id)->first();

        if ($cand) {
            $this->candidato = $cand;
        } else {
            redirect('/candidato/candidato-dashboard');
        }
    }

    public function productInfolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->candidato)
            ->schema([
                Actions::make([
                    Action::make('resetStars')
                        ->icon('heroicon-m-x-circle')
                        ->label('Cancelar Inscricão')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(function () {
                            Candidato::where('user_id', '=', Auth::user()->id)->first()->cancelarInscricao();
                            redirect('/candidato/candidato-dashboard');
                        }),
                    ])->alignment(Alignment::End),
                Tabs::make('Tabs')
                ->tabs([
                    Tab::make('Dados da candidatura')
                        ->columns(2)
                        ->schema([
                            TextEntry::make('estadoDaCandidatura.estado')
                                ->label('Nome completo')
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
                                ,
                            TextEntry::make('curso.name')
                                ->label('Curso escolhido'),
                            TextEntry::make('classe.name')
                                ->label('Classe escolhida'),
                            TextEntry::make('periodo.desc')
                                ->label('Periodo escolhido')
                                ->badge()
                                ->color(fn (string $state): string => match ($state) {
                                    'Manhã' => 'success',
                                    'Tarde' => 'warning',
                                    'Noite' => 'danger',
                                }),

                        ]),
                    Tab::make('Dados Pessoais')
                        ->columns(2)
                        ->schema([
                            TextEntry::make('user.name')
                                ->label('Nome completo'),
                            TextEntry::make('bi')
                                ->label('Bilhéio de Identidade'),
                            TextEntry::make('genero.desc')
                                ->label('Genero'),
                            TextEntry::make('telefone')
                                ->label('Número de telefone'),
                            TextEntry::make('endereco')
                                ->columnSpan(2)
                                ->label('Local de Residência'),

                        ]),
                    Tab::make('Informação Acadêmica')
                        ->columns(2)
                        ->schema([
                            TextEntry::make('curso_feito'),
                            TextEntry::make('classeFeita.name'),
                            TextEntry::make('ano_inicio'),
                            TextEntry::make('ano_conclusao'),
                    ]),
                ]),
            ]);
    }

}
