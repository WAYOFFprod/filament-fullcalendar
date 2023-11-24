<x-filament::modal id="fullcalendar--create-event-modal" :width="$this->getModalWidth()">
    <x-slot name="header">
        <x-filament::modal.heading>
            {{ $this->getCreateEventModalTitle() }}
        </x-filament::modal.heading>
    </x-slot>
    <form wire:submit="create">
        {{ $this->createEventForm }}
    </form>
</x-filament::modal>
