<aside id="cta-button-sidebar" class="w-64 transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('profile') }}" class="flex items-center p-2 text-primary rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                            <path d="M14.5 9.1a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0" />
                            <path d="M21 12a9 9 0 1 1-18 0a9 9 0 0 1 18 0" />
                            <path d="M17 19.2c-.317-6.187-9.683-6.187-10 0" />
                        </g>
                    </svg>
                    <span class="ms-3 text-md">{{ __("Profile") }}</span>
                </a>
            </li>
            {{-- <li>
                <a href="#!"
                    class="flex items-center p-2 text-primary rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M8.935 7H7.773c-1.072 0-1.962.81-2.038 1.858l-.73 10C4.921 20.015 5.858 21 7.043 21h9.914c1.185 0 2.122-.985 2.038-2.142l-.73-10C18.189 7.81 17.299 7 16.227 7h-1.162m-6.13 0V5c0-1.105.915-2 2.043-2h2.044c1.128 0 2.043.895 2.043 2v2m-6.13 0h6.13" />
                    </svg>
                    <span class="ms-3 text-md">{{ __("Your orders") }}</span>
                </a>
            </li> --}}

            <li>
                <a href="{{ route('auth.logout') }}"
                    class="flex items-center p-2 text-primary rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <g fill="currentColor">
                            <path
                                d="M6.5 3.75c-.526 0-1.25.63-1.25 1.821V18.43c0 1.192.724 1.821 1.25 1.821h6.996a.75.75 0 1 1 0 1.5H6.5c-1.683 0-2.75-1.673-2.75-3.321V5.57c0-1.648 1.067-3.321 2.75-3.321h7a.75.75 0 0 1 0 1.5z" />
                            <path
                                d="M16.53 7.97a.75.75 0 0 0-1.06 0v3.276H9.5a.75.75 0 0 0 0 1.5h5.97v3.284a.75.75 0 0 0 1.06 0l3.5-3.5a.75.75 0 0 0 .22-.532v-.002a.75.75 0 0 0-.269-.575z" />
                        </g>
                    </svg>
                    <span class="ms-3 text-md">{{ __("Logout") }}</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
