<x-filament-widgets::widget>
    <x-filament::section class="flex gap-4 items-center justify-center">
        <h1 class="text-3xl font-bold">🎉Sua candidatura foi aceite🎉</h1>
        <br>
        <div class="flex flex-col gap-4 items-center justify-center">
            <div class="info">
                <h3>Clique abaixo para efetuar a sua matricula</h3>
            </div>
            <br>
            <x-filament::button
            color="info"
            wire:click="realizarMatricula"
            wire:loading.attr="disabled"
            >
            Realizar matricula
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
