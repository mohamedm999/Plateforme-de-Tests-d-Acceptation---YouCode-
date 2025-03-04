<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="flex justify-center">
                <x-application-logo class="w-24 h-24 fill-current text-primary-600" />
            </a>
        </x-slot>

        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-gray-800">{{ __('Create an Account') }}</h1>
            <p class="mt-2 text-gray-600">{{ __('Join our community today') }}</p>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Fields - Two Column Layout -->
            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                <div>
                    <x-label for="firstname" :value="__('First Name')" class="font-medium" />
                    <x-input id="firstname" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50"
                        type="text" name="firstname" :value="old('firstname')" required placeholder="John" />
                </div>

                <div>
                    <x-label for="lastname" :value="__('Last Name')" class="font-medium" />
                    <x-input id="lastname" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50"
                        type="text" name="lastname" :value="old('lastname')" required placeholder="Doe" />
                </div>
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-label for="email" :value="__('Email Address')" class="font-medium" />
                <x-input id="email" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50"
                    type="email" name="email" :value="old('email')" required placeholder="your@email.com" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-label for="password" :value="__('Password')" class="font-medium" />
                <x-input id="password" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50"
                    type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                <p class="mt-1 text-xs text-gray-500">{{ __('Must be at least 8 characters') }}</p>
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <x-label for="password_confirmation" :value="__('Confirm Password')" class="font-medium" />
                <x-input id="password_confirmation" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50"
                    type="password" name="password_confirmation" required placeholder="••••••••" />
            </div>

            <div class="flex flex-col items-center justify-between gap-4 mt-6 sm:flex-row">
                <a class="order-2 text-sm text-primary-600 hover:text-primary-800 hover:underline sm:order-1" href="{{ route('login') }}">
                    {{ __('Already registered? Login') }}
                </a>

                <x-button class="order-1 w-full px-6 py-2 font-bold text-white transition duration-150 ease-in-out rounded-lg sm:w-auto bg-primary-600 hover:bg-primary-700 sm:order-2">
                    {{ __('Create Account') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
