<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Système d\'Évaluation des Candidats') }}
            </h2>
            <div class="text-sm text-gray-600">
                <span class="mr-4">{{ now()->format('Y-m-d H:i:s') }}</span>
                <span class="font-medium">{{ auth()->user()->name ?? auth()->user()->email }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Bienvenue dans la plateforme d'évaluation</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Connecté en tant que: <span class="font-medium">{{ auth()->user()->name }}</span> ({{ auth()->user()->email }})
                            </p>
                        </div>
                        <div class="bg-gray-100 p-3 rounded-lg text-sm">
                            <div class="text-gray-500">Date actuelle:</div>
                            <div class="font-medium">{{ now()->format('d/m/Y') }}</div>
                            <div class="text-gray-500 mt-1">Heure:</div>
                            <div class="font-medium">{{ now()->format('H:i:s') }}</div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <p class="text-gray-700">
                            Cette plateforme vous permet de:
                        </p>
                        <ul class="list-disc pl-5 mt-2 text-gray-600">
                            <li>Soumettre vos documents</li>
                            <li>Passer des tests d'évaluation</li>
                            <li>Planifier des rendez-vous pour les tests présentiels</li>
                        </ul>
                    </div>

                    @if (auth()->user()->role === 'candidat')
                        <div class="mt-8 bg-blue-50 p-4 rounded-lg border border-blue-100">
                            <h4 class="text-md font-medium text-blue-800">Prochaines étapes:</h4>
                            <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
                                <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Compléter votre profil
                                </a>
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Soumettre vos documents
                                </a>
                            </div>
                        </div>
                    @elseif (auth()->user()->role === 'examinateur')
                        <div class="mt-8 bg-green-50 p-4 rounded-lg border border-green-100">
                            <h4 class="text-md font-medium text-green-800">Actions disponibles:</h4>
                            <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Gérer vos disponibilités
                                </a>
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    Voir vos sessions planifiées
                                </a>
                            </div>
                        </div>
                    @elseif (auth()->user()->role === 'administrateur')
                        <div class="mt-8 bg-purple-50 p-4 rounded-lg border border-purple-100">
                            <h4 class="text-md font-medium text-purple-800">Administration:</h4>
                            <div class="mt-3 grid grid-cols-1 md:grid-cols-3 gap-3">
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    Gérer les utilisateurs
                                </a>
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Valider les documents
                                </a>
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Créer des quiz
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="mt-6 text-gray-500 text-xs">
                        <p>© 2025 Système d'Évaluation des Candidats - Dernière mise à jour: {{ now()->format('Y-m-d H:i:s') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
