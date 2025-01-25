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
            @error('full_name') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror
        </div>
        <div>
            <input type="tel" wire:model="phone" class="input-primary" placeholder="{{ __(" Phone") }}">
            @error('phone') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror
        </div>
    </div>

    <div>
        <input type="email" wire:model="email" class="input-primary" placeholder="{{  __(" Email") }}">
        @error('email') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror
    </div>

    <div>
        <input type="text" wire:model="address" class="input-primary mb-3" placeholder="{{ __(" Street Address") }}">
        @error('address') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror
        <div class="grid grid-cols-2 gap-4">
            <input type="text" wire:model="city" class="input-primary" placeholder="{{ __(" City") }}">
            @error('city') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror
            <input type="text" wire:model="zip" class="input-primary" placeholder="{{ __(" ZIP Code") }}">
            @error('zip') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror
        </div>
    </div>

    <button type="submit" wire:click='save()' class="btn btn-primary w-full rounded-md">
        <span wire:loading>
            <svg aria-hidden="true" role="status"
                class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="#E5E7EB" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentColor" />
            </svg>

        </span>
        {{ __("Buy Now") }}
    </button>
</div>
