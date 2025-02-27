<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css">
        
        <!-- Custom styles -->
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-800">
        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow-sm border-b border-gray-200">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-grow py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
            
            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 py-4">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <p class="text-sm text-gray-500 text-center">
                        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                    </p>
                </div>
            </footer>
        </div>
        
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js" defer></script>
    </body>
</html>
