<div class="space-y-4">
    <div class="mb-6" x-data="{ quantity: @entangle('quantity') }">
        <div class="flex items-cente w-full input-primary py-2">
            <button @click='quantity > 1 ? quantity-- : null'
                class="px-4 py-1 text-gray-600 hover:bg-gray-100 text-xl font-bold overflow-hidden">
                -
            </button>
            <input type="number" x-model="quantity"
                class="w-full text-center border-x border-gray-300 py-1 overflow-hidden" />
            <button @click="quantity++"
                class="px-4 py-1 text-gray-600 hover:bg-gray-100 text-xl font-bold overflow-hidden">
                +
            </button>
        </div>
    </div>
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <input type="text" wire:model="full_name" class="input-primary" placeholder="{{ __(" Full name") }}">
        </div>
        <div>
            <input type="tel" wire:model="phone" class="input-primary" placeholder="{{ __(" Phone") }}">
        </div>
    </div>

    <div>
        <input type="email" wire:model="email" class="input-primary" placeholder="{{  __(" Email") }}">
    </div>

    <div>
        <input type="text" wire:model="address" class="input-primary mb-3" placeholder="{{ __(" Street Address") }}">
        <div class="grid grid-cols-2 gap-4">
            <input type="text" wire:model="city" class="input-primary" placeholder="{{ __(" City") }}">
            <input type="text" wire:model="zip" class="input-primary" placeholder="{{ __(" ZIP Code") }}">
        </div>
    </div>

    <button type="submit"
        wire:click='save()'
        class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors">
        {{ __("Buy Now") }}
    </button>
</div>
