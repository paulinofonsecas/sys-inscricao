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
                            ->columns(4)
                            ->schema([
                                TextEntry::make('estadoDaCandidatura.estado')
                                    ->label('Estado da candidatura')
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
                                    }),
                                TextEntry::make('opcaoCurso1.name')
                                    ->label('Opção de curso 1'),
                                TextEntry::make('opcaoCurso2.name')
                                    ->label('Opção de curso 2'),
                                TextEntry::make('created_at')
                                    ->label('Candidatura submetida em')
                                    ->date('d-m-Y H:s'),

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

                            ]),

                    ]),
            ]);
    }
}
