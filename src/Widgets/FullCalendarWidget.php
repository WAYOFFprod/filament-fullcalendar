<?php

namespace Saade\FilamentFullCalendar\Widgets;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;
use Saade\FilamentFullCalendar\Widgets\Concerns\CanFetchEvents;
use Saade\FilamentFullCalendar\Widgets\Concerns\CanManageEvents;
use Saade\FilamentFullCalendar\Widgets\Concerns\CanRefreshEvents;
use Saade\FilamentFullCalendar\Widgets\Concerns\FiresEvents;
use Saade\FilamentFullCalendar\Widgets\Concerns\UsesConfig;

class FullCalendarWidget extends Widget implements HasForms, HasActions
{
    use InteractsWithForms, CanManageEvents, InteractsWithActions;
    use CanRefreshEvents;
    use CanFetchEvents;
    use FiresEvents;
    use UsesConfig;

    protected static string $view = 'filament-fullcalendar::fullcalendar';

    protected int | string | array $columnSpan = 'full';

    // public $instanceConfig = "this";
    public function mount(): void
    {
        $this->setUpForms();
    }

    protected function getForms(): array
    {
        return [
            'createEventForm',
            'editEventForm'
        ];
    }

    public function render(): View
    {
        // $this->instanceConfig = $this->getInstanceConfig()
        // dd($this->getInstanceConfig());
        return view(static::$view)
            ->with('events', $this->getViewData())
            ->with('instanceConfig', $this->getInstanceConfig());
    }

    public function getKey(): string
    {
        return $this->key ?? 'default';
    }

    public function openCreateForm(): Action
    {
        return Action::make('openCreateForm')
            ->icon('heroicon-m-pencil-square')
            ->button()
            ->form($this->getCreateEventFormSchema())
            ->action(function (array $data): void {
                dd($data);
            });
    }

    public function openEditForm(): Action
    {
        return Action::make('openEditForm')
            ->icon('heroicon-m-pencil-square')
            ->button()
            ->form($this->getEditEventFormSchema())
            ->action(function (array $data): void {
                dd($data);
            });
    }

    // public function openCreateForm(): Action
    // {
    //     return Action::make('otherForm')
    //         ->icon('heroicon-m-pencil-square')
    //         ->button()
    //         ->form(
    //             $this->getCreateEventFormSchema()
    //         )
    //         ->action(function (array $data): void {
    //             dd("Action triggered");
    //         });
    // }
}
