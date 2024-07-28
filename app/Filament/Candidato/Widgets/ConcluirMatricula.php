<?php

namespace App\Filament\Candidato\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class ConcluirMatricula extends Widget
{
    protected static string $view = 'filament.candidato.widgets.concluir-matricula';

    protected int | string | array $columnSpan = 'full';

    protected function getViewData() : array {
        return [
            'candidato' => Auth::user()
        ];
    }

    public function realizarMatricula() {
        // go to CandidatoFinalizacao, via url
        return redirect()->route('filament.candidato.pages.realizar-matricula');
    }

}
