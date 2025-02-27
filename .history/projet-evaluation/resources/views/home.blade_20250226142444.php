<!-- filepath: /c:/github/Plateforme-de-Tests-d-Acceptation---YouCode-/projet-evaluation/resources/views/home.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Système d\'Évaluation des Candidats') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 overflow-hidden shadow-xl sm:rounded-lg mb-6">
                <div class="p-8 sm:p-10 flex flex-col md:flex-row items-center justify-between">
                    <div class="mb-6 md:mb-0 md:mr-8">
                        <h1 class="text-3xl font-bold text-white mb-2">Bienvenue, {{ auth()->user()->name }}!</h1>
                        <p class="text-blue-100 text-lg max-w-2xl">
                            Accédez à tous les outils nécessaires pour votre parcours d'évaluation YouCode.
                        </p>
                    </div>
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                         alt="Évaluation" class="w-32 h-32 object-contain hidden md:block">
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Info Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg lg:col-span-2">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 rounded-full p-2 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Plateforme d'Évaluation YouCode</h3>
                        </div>

                        <p class="text-gray-600 mb-6">
                            Cette plateforme vous accompagne tout au long de votre processus d'évaluation, en facilitant chaque étape.
                        </p>

                        <div class="bg-gray-50 rounded-lg p-5 mb-6">
                            <h4 class="text-md font-semibold text-gray-700 mb-3">Fonctionnalités principales:</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Soumission sécurisée de documents et de dossiers</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Tests d'évaluation en ligne avec suivi automatique</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Planification des rendez-vous pour les tests présentiels</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Suivi en temps réel de votre progression</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Action Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white">
                        @if (auth()->user()->role === 'candidat')
                            <div class="border-l-4 border-blue-500 pl-4">
                                <h4 class="text-lg font-semibold text-gray-800 mb-1">Espace Candidat</h4>
                                <p class="text-sm text-gray-600 mb-4">Complétez les prochaines étapes de votre candidature</p>
                            </div>

                            <div class="space-y-3 mt-6">
                                <a href="#" class="flex items-center justify-between px-4 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-medium">Compléter votre profil</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <a href="{{ route('dashboard') }}" class="flex items-center justify-between px-4 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-800 rounded-lg transition-all duration-200 shadow-sm hover:shadow">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-medium">Soumettre vos documents</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <a href="#" class="flex items-center justify-between px-4 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-800 rounded-lg transition-all duration-200 shadow-sm hover:shadow">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-medium">Planifier un test</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>

                        @elseif (auth()->user()->role === 'examinateur')
                            <div class="border-l-4 border-indigo-500 pl-4">
                                <h4 class="text-lg font-semibold text-gray-800 mb-1">Espace Examinateur</h4>
                                <p class="text-sm text-gray-600 mb-4">Gérez vos sessions d'évaluation</p>
                            </div>

                            <div class="space-y-3 mt-6">
                                <a href="{{ route('dashboard') }}" class="flex items-center justify-between px-4 py-3 bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-medium">Gérer vos disponibilités</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <a href="{{ route('dashboard') }}" class="flex items-center justify-between px-4 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-800 rounded-lg transition-all duration-200 shadow-sm hover:shadow">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                        </svg>
                                        <span class="font-medium">Sessions planifiées</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <a href="#" class="flex items-center justify-between px-4 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-800 rounded-lg transition-all duration-200 shadow-sm hover:shadow">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-medium">Évaluer un candidat</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>

                        @elseif (auth()->user()->role === 'administrateur')
                            <div class="border-l-4 border-purple-500 pl-4">
                                <h4 class="text-lg font-semibold text-gray-800 mb-1">Administration</h4>
                                <p class="text-sm text-gray-600 mb-4">Gérez la plateforme et ses utilisateurs</p>
                            </div>

                            <div class="space-y-3 mt-6">
                                <a href="{{ route('dashboard') }}" class="flex items-center justify-between px-4 py-3 bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                        </svg>
                                        <span class="font-medium">Gérer les utilisateurs</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <a href="{{ route('dashboard') }}" class="flex items-center justify-between px-4 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-800 rounded-lg transition-all duration-200 shadow-sm hover:shadow">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-medium">Valider les documents</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <a href="{{ route('dashboard') }}" class="flex items-center justify-between px-4 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-800 rounded-lg transition-all duration-200 shadow-sm hover:shadow">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-medium">Créer des quiz</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        @endif

                        <!-- Stats Overview -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <h4 class="text-sm font-medium uppercase tracking-wider text-gray-500 mb-4">Aperçu</h4>

                            <div class="flex flex-col space-y-3">
                                @if (auth()->user()->role === 'candidat')
                                    <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                                        <span class="text-blue-800 font-medium">Progression du profil</span>
                                        <span class="text-blue-600 font-bold">60%</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                        <span class="text-gray-800 font-medium">Documents à fournir</span>
                                        <span class="text-gray-600 font-bold">2/5</span>
                                    </div>
                                @elseif (auth()->user()->role === 'examinateur')
                                    <div class="flex justify-between items-center p-3 bg-indigo-50 rounded-lg">
                                        <span class="text-indigo-800 font-medium">Sessions aujourd'hui</span>
                                        <span class="text-indigo-600 font-bold">3</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                        <span class="text-gray-800 font-medium">Évaluations en attente</span>
                                        <span class="text-gray-600 font-bold">7</span>
                                    </div>
                                @elseif (auth()->user()->role === 'administrateur')
                                    <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg">
                                        <span class="text-purple-800 font-medium">Candidats actifs</span>
                                        <span class="text-purple-600 font-bold">42</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                        <span class="text-gray-800 font-medium">Documents en attente</span>
                                        <span class="text-gray-600 font-bold">12</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informational Footer -->
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row items-center justify-between">
                        <div class="flex items-center mb-4 sm:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500 mr<!-- filepath: /c:/github/Plateforme-de-Tests-d-Acceptation---YouCode-/projet-evaluation/resources/views/home.blade.php -->


