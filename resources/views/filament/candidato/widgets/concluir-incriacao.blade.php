<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex justify-between items-center">
            <span class="font-bold">Clique no botão ao lado para concluir sua inscrição</span>
            <x-filament::button
            color="success"
            wire:click="concluirInscricao"
            wire:loading.attr="disabled"
            >
            Concluir Inscrição
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
