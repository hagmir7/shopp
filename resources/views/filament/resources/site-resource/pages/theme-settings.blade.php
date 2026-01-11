{{-- File: resources/views/filament/pages/theme-settings.blade.php --}}

<x-filament-panels::page>
    {{-- Theme Preview --}}
    <x-filament::section>
        <x-slot name="heading">
            Theme Preview
        </x-slot>

        <div class="space-y-4">
            <div class="flex gap-4 items-center">
                <div class="w-24 h-24 rounded-lg transition-colors"
                    style="background-color: var(--color-primary, #fbbf24);" id="primary-preview">
                </div>
                <div>
                    <p class="font-semibold">Primary Color</p>
                    <p class="text-sm text-gray-500">Main brand color</p>
                </div>
            </div>

            <div class="flex gap-4 items-center">
                <div class="w-24 h-24 rounded-lg transition-colors"
                    style="background-color: var(--color-primary-hover, #f59e0b);" id="hover-preview">
                </div>
                <div>
                    <p class="font-semibold">Hover Color</p>
                    <p class="text-sm text-gray-500">Button hover state</p>
                </div>
            </div>

            <div class="flex gap-4 items-center">
                <div class="w-24 h-24 rounded-lg border-2 transition-colors"
                    style="color: var(--color-primary-text, #111827); border-color: var(--color-primary-text, #111827);"
                    id="text-preview">
                    <div class="flex items-center justify-center h-full font-bold text-2xl">
                        Aa
                    </div>
                </div>
                <div>
                    <p class="font-semibold">Text Color</p>
                    <p class="text-sm text-gray-500">Primary text color</p>
                </div>
            </div>

            {{-- Interactive Button Preview --}}
            <div class="mt-6">
                <button type="button" class="px-6 py-3 rounded-lg font-semibold transition-all duration-200"
                    style="background-color: var(--color-primary, #fbbf24); color: var(--color-primary-text, #111827);"
                    id="button-preview"
                    onmouseover="this.style.backgroundColor = getComputedStyle(document.documentElement).getPropertyValue('--color-primary-hover')"
                    onmouseout="this.style.backgroundColor = getComputedStyle(document.documentElement).getPropertyValue('--color-primary')">
                    Preview Button
                </button>
            </div>
        </div>
    </x-filament::section>

    <form wire:submit="save" class="mt-6">
        {{ $this->form }}

        <div class="mt-6">
            <x-filament::button type="submit">
                Save Theme
            </x-filament::button>
        </div>
    </form>

    @script
    <script>
        // Apply theme on page load
        function applyTheme(primary, hover, text) {
            document.documentElement.style.setProperty('--color-primary', primary);
            document.documentElement.style.setProperty('--color-primary-hover', hover);
            document.documentElement.style.setProperty('--color-primary-text', text);

            // Update previews
            document.getElementById('primary-preview').style.backgroundColor = primary;
            document.getElementById('hover-preview').style.backgroundColor = hover;
            const textPreview = document.getElementById('text-preview');
            textPreview.style.color = text;
            textPreview.style.borderColor = text;

            const buttonPreview = document.getElementById('button-preview');
            buttonPreview.style.backgroundColor = primary;
            buttonPreview.style.color = text;
        }

        // Listen for theme changes from the component
        $wire.on('apply-theme', (event) => {
            const { primary, hover, text } = event[0];
            applyTheme(primary, hover, text);
        });

        // Real-time color picker updates
        document.addEventListener('livewire:init', () => {
            Livewire.hook('morph.updated', ({ el, component }) => {
                const primaryInput = document.querySelector('input[wire\\:model="data.primary"]');
                const hoverInput = document.querySelector('input[wire\\:model="data.hover"]');
                const textInput = document.querySelector('input[wire\\:model="data.text"]');

                if (primaryInput || hoverInput || textInput) {
                    const primary = primaryInput?.value || getComputedStyle(document.documentElement).getPropertyValue('--color-primary');
                    const hover = hoverInput?.value || getComputedStyle(document.documentElement).getPropertyValue('--color-primary-hover');
                    const text = textInput?.value || getComputedStyle(document.documentElement).getPropertyValue('--color-primary-text');

                    applyTheme(primary, hover, text);
                }
            });
        });
    </script>
    @endscript
</x-filament-panels::page>
