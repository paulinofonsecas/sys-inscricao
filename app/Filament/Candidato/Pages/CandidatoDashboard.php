<?php

namespace App\Filament\Candidato\Pages;

use App\Filament\Candidato\Widgets\ConcluirIncriacao;
use Filament\Pages\Page;

class CandidatoDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.candidato.pages.candidato-dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            ConcluirIncriacao::class,
        ];
    }

}
