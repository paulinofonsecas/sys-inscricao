<x-filament-widgets::widget>
    <x-filament::section class="flex gap-4 items-center justify-center">
        <h1 class="text-3xl font-bold">Para concluir sua inscrição, clique no botão abaixo.</h1>
        <br>
        <div class="flex flex-col gap-4 items-center justify-center">
            <div class="info">
                <h3>Nome: {{ $candidato->name }}</h3>
                <h3>Email: {{ $candidato->email }}</h3>
            </div>
            <br>
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
