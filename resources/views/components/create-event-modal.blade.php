<x-filament::modal id="fullcalendar--create-event-modal" :width="$this->getModalWidth()">
    <x-slot name="header">
        <x-filament::modal.heading>
            {{ $this->getCreateEventModalTitle() }}
        </x-filament::modal.heading>
    </x-slot>
    {{ $this->createEventForm }}
</x-filament::modal>
