<x-guest-layout>
    <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0 bg-gray-50">
        <div class="w-full px-6 py-8 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
            <div class="flex justify-center mb-6">
                <a href="/">
                    <x-application-logo class="w-24 h-24 text-gray-500 fill-current" />
                </a>
            </div>
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <h1 class="mb-6 text-2xl font-bold text-center text-gray-800">{{ __('Sign in to your account') }}</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" class="font-medium text-gray-700" />

                    <x-input id="email" 
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        placeholder="your@email.com" />
                </div>

                <!-- Password -->
                <div class="mt-5">
                    <x-label for="password" :value="__('Password')" class="font-medium text-gray-700" />

                    <x-input id="password" 
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password" 
                        placeholder="••••••••" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-5">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex flex-col items-center justify-between mt-6 sm:flex-row">
                    @if (Route::has('password.request'))
                        <a class="mb-3 text-sm font-medium text-indigo-600 hover:text-indigo-800 hover:underline sm:mb-0" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="w-full px-6 py-2 font-bold text-white transition duration-150 ease-in-out bg-indigo-600 rounded-md sm:w-auto hover:bg-indigo-700">
                        {{ __('Log in') }}
                    </x-button>
                </div>
                
                @if (Route::has('register'))
                <div class="mt-6 text-center">
                    <span class="text-sm text-gray-600">{{ __('Don\'t have an account?') }}</span>
                    <a href="{{ route('register') }}" class="ml-1 text-sm font-medium text-indigo-600 hover:text-indigo-800 hover:underline">
                        {{ __('Sign up') }}
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>
</x-guest-layout>
