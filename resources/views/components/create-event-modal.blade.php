<x-filament::modal id="fullcalendar--create-event-modal" :width="$this->getModalWidth()">
    <x-slot name="header">
        <x-filament::modal.heading>
            {{ $this->getCreateEventModalTitle() }}
        </x-filament::modal.heading>
    </x-slot>
    {{ $this->createEventForm }}
    <x-slot name="footer">
        <div class="flex justify-end">
            {{$this->submitCreateForm}}
        </div>
    </x-slot>
</x-filament::modal>
