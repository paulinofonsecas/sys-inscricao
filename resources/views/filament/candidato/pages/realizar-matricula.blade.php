<x-filament-panels::page>
    <div>
        <div class="flex gap-4 items-center justify-end">
            <x-filament::button color="success" wire:click="realizarMatricula" wire:loading.attr="disabled">
                Realizar Matricula
            </x-filament::button>

            <x-filament::button color="danger" wire:click="cancelar" wire:loading.attr="disabled">
                Cancelar
            </x-filament::button>
        </div>

        <br>
        <form wire:submit="create">
            {{ $this->form }}
        </form>

        <x-filament-actions::modals />
    </div>
</x-filament-panels::page>
