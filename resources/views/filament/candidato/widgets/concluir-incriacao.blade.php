<x-filament-widgets::widget>
    <x-filament::section>
        <h1 class="text-3xl font-bold">Para concluir sua inscrição, clique no botão abaixo.</h1>
        <br>
        <div>
            <h3>Nome: {{ $candidato->name }}</h3>
            <h3>Email: {{ $candidato->email }}</h3>
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
