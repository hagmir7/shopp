<footer class="bg-gray-900 text-white py-10 px-4">
    <!-- Logo and Social Media Section -->
    <div class="max-w-7xl mx-auto mb-8 grid grid-cols-1 md:grid-cols-2">
        <div class="flex items-center">
            <img src="https://floorwarehouse.co.uk/wp-content/uploads/2023/04/WHITE-Artwork-COLOUR-72-DPI-300x63.png" alt="{{ app("site")->name }}" class="h-14">
        </div>

        <div class="flex items-center space-x-4 justify-start md:justify-end mt-4 md:mt-0">
            <a href="#" class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700">
                <span class="text-sm">fb</span>
            </a>
            <a href="#" class="w-8 h-8 bg-black rounded-full flex items-center justify-center hover:bg-gray-800">
                <span class="text-sm">X</span>
            </a>
            <a href="#" class="w-8 h-8 bg-pink-600 rounded-full flex items-center justify-center hover:bg-pink-700">
                <span class="text-sm">ig</span>
            </a>
            <a href="#" class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center hover:bg-red-700">
                <span class="text-sm">pt</span>
            </a>
            <a href="#" class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center hover:bg-green-700">
                <span class="text-sm">wa</span>
            </a>
        </div>
    </div>

    <!-- Main Footer Content -->
  <footer class="rounded-lg shadow dark:bg-gray-900 m-4">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <ul class="flex flex-wrap items-center mb-6 text-md font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="/" class="hover:underline me-4 md:me-6">{{ __("Home") }}</a>
                </li>
                <li>
                    <a href="/contact" class="hover:underline">{{ __("Contact") }}</a>
                </li>
            </ul>
        </div>
    </div>
</footer>

    <!-- Footer Bottom -->
    <div class="max-w-7xl mx-auto border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
        <div class="text-sm text-gray-400 mb-4 md:mb-0">
            20{{ now()->format('y') }} © {{ app('site')->name }}. {{ __("All rights reserved") }}.
            <br>
            {{ app("site")?->address }}
        </div>

        <!-- Payment Methods -->
        <div class="flex space-x-2">
            <img src="https://floorwarehouse.co.uk/wp-content/themes/woodmart/images/payments.png" alt="Payment methods" class="h-6">
        </div>
    </div>
</footer>
