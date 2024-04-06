<?php

namespace App\Filament\Candidato\Pages;

use App\Filament\Candidato\Widgets\ConcluirIncriacao;
use App\Models\Candidato;
use App\Models\EstadoCandidatura;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class CandidatoDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.candidato.pages.candidato-dashboard';

    protected function getHeaderWidgets(): array
    {
        $data = [];
        $candidato = Candidato::where('user_id', '=', Auth::user()->id)->first();
        
        if ($candidato) {
            if ($this->candidatoInapto()) {
                redirect(CandidatoInadequado::getUrl());
            } else {
                redirect(VerificarCandidatura::getUrl());
            }
        } else {
            $data[] = ConcluirIncriacao::class;
        }

        return $data;
    }

    public function candidatoInapto(): bool
    {
        $candidato = Candidato::where('user_id', '=', Auth::user()->id)->first();

        if (
            $candidato->estado_candidatura_id == EstadoCandidatura::$DESISTIDO
            || $candidato->estado_candidatura_id == EstadoCandidatura::$INVALIDO
            || $candidato->estado_candidatura_id == EstadoCandidatura::$RECUSADO
            ) {
            return true;
        }

        return false;
    }

}
