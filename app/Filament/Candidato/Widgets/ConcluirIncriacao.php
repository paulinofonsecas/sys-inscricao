<?php

namespace App\Filament\Candidato\Widgets;

use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class ConcluirIncriacao extends Widget
{
    protected static string $view = 'filament.candidato.widgets.concluir-incriacao';

    protected int | string | array $columnSpan = 'full';

    protected function getViewData() : array {
        return [
            'candidato' => Auth::user()
        ];
    }

    public function concluirInscricao() {
        // go to CandidatoFinalizacao, via url
        return redirect()->route('filament.candidato.pages.finalizar-inscricao');
    }

}
