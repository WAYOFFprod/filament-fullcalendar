<?php

namespace Saade\FilamentFullCalendar\Widgets\Forms;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Support\Enums\Alignment;

trait CreateEventForm
{
    public $createEventFormState = [];

    public function submitCreateForm(): Action
    {
        return Action::make('submitCreateForm')
            ->label($this->getModalSubmitLabel())
            ->icon('heroicon-m-plus-circle')
            ->button()
            ->action(function (): void {
                $this->createEvent($this->createEventForm->getState());
                $this->dispatch('close-modal', id: 'fullcalendar--create-event-modal');
            });
    }

    public function createEvent(array $data): void
    {
        // Override this function and do whatever you want with $data
    }

    protected static function getCreateEventFormSchema(): array
    {
        return [
            TextInput::make('title')
                ->required(),
            Fieldset::make('dates')->schema([
                DatePicker::make('start')
                    ->required(),
                DatePicker::make('end')
                    ->default(null),
            ])
        ];
    }

    public function createEventForm(Form $form): Form
    {
        return $form
            ->schema(static::getCreateEventFormSchema())
            ->statePath('createEventFormState');
    }

    public function getCreateEventModalTitle(): string
    {
        return __('filament::resources/pages/create-record.title', ['label' => $this->getModalLabel()]);
    }

    public function getCreateEventModalSubmitButtonLabel(): string
    {
        return __('filament::resources/pages/create-record.form.actions.create.label');
    }

    public function getCreateEventModalCloseButtonLabel(): string
    {
        return __('filament::resources/pages/create-record.form.actions.cancel.label');
    }
}
