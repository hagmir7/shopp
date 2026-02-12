<div class="flex items-center px-2">
    <input type="color" wire:model.debounce.300ms="primary" title="Primary Color"
        class="w-8 h-8 p-0 border-0 rounded-full cursor-pointer">
    <input type="color" wire:model.debounce.300ms="hover" title="Hover Color"
        class="w-8 h-8 p-0 border-0 rounded-full cursor-pointer">
    <input type="color" wire:model.debounce.300ms="text" title="Text Color"
        class="w-8 h-8 p-0 border-0 rounded-full cursor-pointer">
</div>

<script>
    window.addEventListener('apply-theme', event => {
        eval(event.detail.js);
    });
</script>
