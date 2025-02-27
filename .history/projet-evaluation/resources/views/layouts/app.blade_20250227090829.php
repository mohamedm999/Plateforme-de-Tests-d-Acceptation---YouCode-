<!-- filepath: /c:/github/Plateforme-de-Tests-d-Acceptation---YouCode-/projet-evaluation/resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="YouCode - Plateforme d'évaluation des candidats">
    <meta name="theme-color" content="#4F46E5">

    <title>{{ config('app.name', 'YouCode') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🚀</text></svg>">

    <!-- Modern Fonts with display=swap for better loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Latest TailwindCSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css">

    <!-- Alpine.js with defer to not block rendering -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js" defer></script>

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }

        /* Page transitions */
        .page-transition {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Focus styles for accessibility */
        *:focus-visible {
            outline: 2px solid #4F46E5;
            outline-offset: 2px;
        }
    </style>
</head>
<body class="font-sans antialiased h-full bg-gray-50 text-gray-800">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen flex flex-col">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow-sm sticky top-0 z-10">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <div class="page-transition">
                    {{ $header }}
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 page-transition">
                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <div class="mb-4 sm:mb-0">
                        <p class="text-sm text-gray-500">&copy; {{ date('Y') }} YouCode. Tous droits réservés.</p>
                    </div>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Facebook</span>
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">LinkedIn</span>
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">GitHub</span>
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Toast Notifications -->
        <div id="toast-container" class="fixed bottom-4 right-4 z-50"></div>
    </div>

    <!-- Optional: Toast notification script -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('notifications', () => ({
                notifications: [],
                add(message, type = 'success') {
                    const id = Date.now()
                    this.notifications.push({ id, message, type })
                    setTimeout(() => {
                        this.remove(id)
                    }, 5000)
                },
                remove(id) {
                    this.notifications = this.notifications.filter(notification => notification.id !== id)
                }
            }))
        })
    </script>
</body>
</html>
