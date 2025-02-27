<x-dropdown align="right" width="64">
    <x-slot name="trigger">
        <button class="flex items-center text-sm font-medium text-white hover:text-indigo-100 focus:outline-none transition duration-150 ease-in-out bg-indigo-600 bg-opacity-50 rounded-full p-1 pr-4 hover:bg-opacity-70 shadow-md">
            <div class="relative">
                <img class="h-8 w-8 rounded-full object-cover border-2 border-purple-300 mr-2" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF" alt="{{ Auth::user()->name }}">
                <span class="absolute bottom-0 right-1 h-3 w-3 bg-green-500 rounded-full border-2 border-white"></span>
            </div>
            <div class="font-semibold">{{ Auth::user()->firstname }}</div>

            <div class="ml-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </button>
    </x-slot>

    <x-slot name="content">
        <!-- User Profile Header -->
        <div class="px-4 py-3 border-b border-gray-100 bg-gradient-to-r from-indigo-50 to-purple-50">
            <div class="flex items-center">
                <img class="h-10 w-10 rounded-full object-cover border-2 border-indigo-300 mr-3" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF" alt="{{ Auth::user()->name }}">
                <div>
                    <p class="text-sm font-bold text-gray-800">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

        <!-- Profile settings -->
        <div class="py-1">
            <x-dropdown-link href="#" class="flex items-center px-4 py-2 hover:bg-indigo-50 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500 group-hover:text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                </svg>
                <span class="group-hover:text-indigo-600">{{ __('Your Profile') }}</span>
            </x-dropdown-link>

            <x-dropdown-link href="#" class="flex items-center px-4 py-2 hover:bg-indigo-50 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500 group-hover:text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                </svg>
                <span class="group-hover:text-indigo-600">{{ __('Settings') }}</span>
            </x-dropdown-link>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-100 my-1"></div>

        <!-- Status toggles -->
        <div class="px-4 py-2">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Dark Mode</span>
                <button class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-gray-200 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" role="switch" aria-checked="false">
                    <span class="translate-x-0 pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                        <span class="absolute inset-0 flex h-full w-full items-center justify-center opacity-100 transition-opacity duration-200 ease-in">
                            <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </span>
                </button>
            </div>
        </div>

        <!-- Authentication -->
        <div class="py-1 border-t border-gray-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center px-4 py-2 text-red-700 hover:bg-red-50 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:text-red-800" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                    </svg>
                    <span class="group-hover:text-red-800 font-medium">{{ __('Log Out') }}</span>
                </x-dropdown-link>
            </form>
        </div>
    </x-slot>
</x-dropdown>
