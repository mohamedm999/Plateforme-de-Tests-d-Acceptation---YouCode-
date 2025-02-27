<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ config('app.description', 'A Laravel Application') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        @stack('styles')
        
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
        @stack('head-scripts')
    </head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-gray-900" x-data="{ darkMode: false }" x-init="darkMode = localStorage.getItem('darkMode') === 'true'">
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
