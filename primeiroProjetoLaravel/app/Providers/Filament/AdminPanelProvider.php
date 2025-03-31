<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Filament\Enums\ThemeMode;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Pages\CustomDashboard;
use Filament\FontProviders\GoogleFontProvider;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->colors([
                // https://tailwindcss.com/docs/colors
                'danger' => Color::Rose,
                'gray' => Color::Zinc,          // fundo
                'info' => Color::Blue,
                'primary' => Color::Blue,     // cor da escolha selecionada
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->font('Poppins')
            // ->font('Inter', provider: GoogleFontProvider::class)

            ->discoverResources(in: app_path('Filament/Admin/Resources'), for: 'App\\Filament\\Admin\\Resources')
            ->discoverPages(in: app_path('Filament/Admin/Pages'), for: 'App\\Filament\\Admin\\Pages')
            ->pages([
                CustomDashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
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
            ])

            // Sobre o tema
            // Naturalmente, o usuário tem opção de escolha no próprio dashboard de tema claro/escuro
            // darkMode(false) => desativa a opção darkmode e o usuário não tem mais opção de escolha (disponível apenas o lightmode)
            ->darkMode(true)
            ->defaultThemeMode(ThemeMode::Dark)


            ->sidebarCollapsibleOnDesktop(true)    //Menu lateral encolhe
            // ->sidebarWidth('full');

            ->brandName(config('company.name'))

            // ->brandLogo(fn () => ('\real-invest-logo.png'))
            // ->brandLogoHeight('2rem')

            ->favicon(asset('/real-invest-favicon.png'));
            
    }
}
