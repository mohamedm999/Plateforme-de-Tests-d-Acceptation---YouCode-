<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ config('app.description', 'A Laravel Application') }}">
        <meta name="theme-color" content="#ffffff" media="(prefers-color-scheme: light)">
        <meta name="theme-color" content="#1f2937" media="(prefers-color-scheme: dark)">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.5/dist/tailwind.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        @stack('styles')

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js" defer></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('head-scripts')
    </head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 h-full" 
          x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' || window.matchMedia('(prefers-color-scheme: dark)').matches }" 
          x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" 
          :class="{ 'dark': darkMode }">
        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                        <div>{{ $header }}</div>
            <main class="flex-grow">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        {{ $slot }}
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white dark:bg-gray-800 shadow py-4">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400">
                        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                    </div>
                </div>
            </footer>
        </div>

        @stack('scripts')
    </body>
</html>
