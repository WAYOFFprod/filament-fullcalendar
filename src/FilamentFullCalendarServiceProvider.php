<?php

namespace Saade\FilamentFullCalendar;

use Filament\PluginServiceProvider;
use Illuminate\Support\ServiceProvider;
use Saade\FilamentFullCalendar\Commands\UpgradeFilamentFullCalendarCommand;
use Spatie\LaravelPackageTools\Package;

class FilamentFullCalendarServiceProvider extends ServiceProvider
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
            ->hasViews()
            ->hasCommand(UpgradeFilamentFullCalendarCommand::class);
    }
}
