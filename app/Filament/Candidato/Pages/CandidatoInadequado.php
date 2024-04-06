<?php

namespace App\Filament\Candidato\Pages;

use App\Models\Candidato;
use App\Models\User;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Pages\Page;
use Filament\Support\Enums\Alignment;
use Illuminate\Support\Facades\Auth;

class CandidatoInadequado extends Page implements HasInfolists
{
    use InteractsWithInfolists;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.candidato.pages.candidato-inadequado';

    protected static ?string $title = 'Candidatura encerrada';

    protected int | string | array $columnSpan = 'full';

    public function productInfolist(Infolist $infolist): Infolist
    {
        $candidatura = Candidato::where('user_id', '=', Auth::user()->id)->first();

        return $infolist
            ->record($candidatura)
            ->schema([
                TextEntry::make('info')
                    ->label('O estado da sua candidatura é "' . $candidatura->estadoDaCandidatura->estado .
                     '", entre em contacto com a administração da escola para mais informação'),
                Actions::make([
                    Action::make('resetStars')
                        ->icon('heroicon-m-trash')
                        ->label('Deletar a conta')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(function () {
                            $user = User::find(Auth::user()->id);
                            $user->isActive = false;
                            $user->save();

                            Auth::logout();
                            redirect('/candidato');
                        }),
                    ])->alignment(Alignment::Center),
            ]);
    }
}
