<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <x-filament::button type="submit" class="mt-6">
            Save Theme
        </x-filament::button>
    </form>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('theme-updated', (event) => {
                const data = event[0];

                // Update CSS variables
                document.documentElement.style.setProperty('--color-primary', data.primary);
                document.documentElement.style.setProperty('--color-primary-hover', data.hover);
                document.documentElement.style.setProperty('--color-primary-text', data.text);
            });
        });
    </script>
</x-filament-panels::page>
