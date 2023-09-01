
<x-filament-actions::modals id="fullcalendar--edit-event-modal" width="2xl">
    <x-slot name="header">
        <x-filament::modal.heading>
            {{ $this->getCreateEventModalTitle() }}
        </x-filament::modal.heading>
    </x-slot>
    {{ $this->createEventForm }}
    <x-slot name="footerActions" class="justify-end">
        {{$this->submitEditForm}}
    </x-slot>
</x-filament-actions::modals>
