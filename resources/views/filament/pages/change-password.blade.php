<x-filament::page>
    <div class="mb-6 text-lg font-semibold">
        Usuario autenticado: {{ auth()->user()->name }}
    </div>
    <form wire:submit.prevent="submit">
        <div class="space-y-6">
            {{ $this->form }}
            <x-filament::button type="submit">
                Cambiar contraseña
            </x-filament::button>
        </div>
    </form>
</x-filament::page>
