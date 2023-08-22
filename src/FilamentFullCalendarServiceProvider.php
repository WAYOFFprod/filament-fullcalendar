<?php

namespace Saade\FilamentFullCalendar;

use Filament\PluginServiceProvider;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\ServiceProvider;
use Saade\FilamentFullCalendar\Commands\UpgradeFilamentFullCalendarCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentFullCalendarServiceProvider extends PackageServiceProvider
{
    protected array $beforeCoreScripts = [
        'filament-fullcalendar-scripts' => __DIR__ . '/../dist/filament-fullcalendar.js',
    ];

    protected array $styles = [
        'filament-fullcalendar-styles' => __DIR__ . '/../dist/filament-fullcalendar.css',
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-fullcalendar')
            ->hasConfigFile()
            ->hasViews('filament-fullcalendar')
            ->hasCommand(UpgradeFilamentFullCalendarCommand::class);
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make('filament-fullcalendar-styles', __DIR__ . '/../dist/filament-fullcalendar.css'),
            Js::make('filament-fullcalendar-scripts', __DIR__ . '/../dist/filament-fullcalendar.js'),
        ], 'filament-fullcalendar');
    }
}
