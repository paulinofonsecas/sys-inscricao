<?php

namespace App\Providers\Filament;

use App\Filament\Candidato\Pages\CandidatoDashboard;
use App\Filament\Pages\Login\CustomLoginPage;
use App\Http\Middleware\CandidatoLoginCheck;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Pages\Auth\Register;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class CandidatoPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('candidato')
            ->path('candidato')
            ->login(CustomLoginPage::class)
            ->registration(Register::class)
            ->passwordReset()
            ->profile()
            ->colors([
                'primary' => Color::Indigo,
            ])
            ->navigation(false)
            ->discoverResources(in: app_path('Filament/Candidato/Resources'), for: 'App\\Filament\\Candidato\\Resources')
            ->discoverPages(in: app_path('Filament/Candidato/Pages'), for: 'App\\Filament\\Candidato\\Pages')
            ->pages([
                CandidatoDashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Candidato/Widgets'), for: 'App\\Filament\\Candidato\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                CandidatoLoginCheck::class,
            ]);
    }
}
