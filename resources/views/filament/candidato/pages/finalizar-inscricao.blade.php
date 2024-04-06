<x-filament-panels::page>
    <div>
        <form wire:submit="create">
            {{ $this->form }}
        </form>
        <br>

        <div class="flex gap-4 items-center justify-end">
            <x-filament::button
            color="success"
            wire:click="concluirInscricao"
            wire:loading.attr="disabled"
            >
            Concluir Inscrição
            </x-filament::button>

            <x-filament::button
            color="danger"
            wire:click="cancelar"
            wire:loading.attr="disabled"
            >
            Cancelar
            </x-filament::button>
        </div>

        <x-filament-actions::modals />
    </div>
</x-filament-panels::page>
