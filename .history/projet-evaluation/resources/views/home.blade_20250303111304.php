<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Système d\'Évaluation des Candidats') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="mb-6 overflow-hidden bg-white border border-gray-100 shadow-lg sm:rounded-lg">
                <div class="p-6 bg-gradient-to-r from-blue-50 to-white">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="flex items-center text-xl font-bold text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Bienvenue sur la plateforme d'évaluation
                        </h3>
                        <div class="text-sm text-gray-600">
                            <span class="px-2 py-1 text-blue-800 bg-blue-100 rounded-md">
                                Système d'Évaluation YouCode
                            </span>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-700">
                        Cette plateforme vous permet de gérer efficacement toutes les étapes du processus d'évaluation:
                    </p>
                    <ul class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-3">
                        <li class="flex items-start p-3 rounded-lg bg-blue-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span>Soumettre et valider vos documents</span>
                        </li>
                        <li class="flex items-start p-3 rounded-lg bg-blue-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <span>Passer des tests d'évaluation en ligne</span>
                        </li>
                        <li class="flex items-start p-3 rounded-lg bg-blue-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Planifier des rendez-vous d'évaluation</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Role Specific Actions -->
            <div class="overflow-hidden bg-white border border-gray-100 shadow-lg sm:rounded-lg">
                <div class="p-6">
                    @if (auth()->user()->role === 'candidat')
                        <div class="pl-4 border-l-4 border-blue-500">
                            <h4 class="text-lg font-bold text-gray-800">Espace Candidat</h4>
                            <p class="mb-4 text-sm text-gray-600">Complétez votre profil et soumettez vos documents pour commencer votre parcours d'évaluation.</p>

                            <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-2">
                                <a href="" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800">
                                    <div class="p-3 mr-4 bg-blue-800 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Compléter votre profil</span>
                                        <span class="text-sm opacity-75">Mettez à jour vos informations personnelles</span>
                                    </div>
                                </a>

                                <a href="{{ route('documents.index') }}" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-gray-700 to-gray-800 hover:from-gray-800 hover:to-gray-900">
                                    <div class="p-3 mr-4 bg-gray-900 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Soumettre vos documents</span>
                                        <span class="text-sm opacity-75">Téléchargez vos fichiers et dossiers</span>
                                    </div>
                                </a>

                                <a href="" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800">
                                    <div class="p-3 mr-4 bg-green-800 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Passer vos tests</span>
                                        <span class="text-sm opacity-75">Accédez aux évaluations disponibles</span>
                                    </div>
                                </a>

                                <a href="{{ route('candidate.index') }}" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800">
                                    <div class="p-3 mr-4 bg-purple-800 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Rendez-vous</span>
                                        <span class="text-sm opacity-75">Planifiez vos sessions présentielles</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @elseif (auth()->user()->role === 'examinateur')
                        <div class="pl-4 border-l-4 border-green-500">
                            <h4 class="text-lg font-bold text-gray-800">Espace Examinateur</h4>
                            <p class="mb-4 text-sm text-gray-600">Gérez vos sessions d'évaluation et suivez la progression des candidats.</p>

                            <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-2">
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800">
                                    <div class="p-3 mr-4 bg-green-800 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Gérer vos disponibilités</span>
                                        <span class="text-sm opacity-75">Définir vos créneaux horaires</span>
                                    </div>
                                </a>

                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-gray-700 to-gray-800 hover:from-gray-800 hover:to-gray-900">
                                    <div class="p-3 mr-4 bg-gray-900 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Sessions planifiées</span>
                                        <span class="text-sm opacity-75">Consultez votre calendrier d'évaluation</span>
                                    </div>
                                </a>

                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800">
                                    <div class="p-3 mr-4 bg-blue-800 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Évaluer des candidats</span>
                                        <span class="text-sm opacity-75">Notation et commentaires</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @elseif (auth()->user()->role === 'administrateur')
                        <div class="pl-4 border-l-4 border-purple-500">
                            <h4 class="text-lg font-bold text-gray-800">Espace Administration</h4>
                            <p class="mb-4 text-sm text-gray-600">Gérez l'ensemble de la plateforme et supervisez les processus d'évaluation.</p>

                            <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-3">
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800">
                                    <div class="p-3 mr-4 bg-purple-800 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Gestion des utilisateurs</span>
                                        <span class="text-sm opacity-75">Ajouter et modifier les comptes</span>
                                    </div>
                                </a>

                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800">
                                    <div class="p-3 mr-4 bg-blue-800 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Validation de documents</span>
                                        <span class="text-sm opacity-75">Examiner les pièces soumises</span>
                                    </div>
                                </a>

                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800">
                                    <div class="p-3 mr-4 bg-green-800 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Création de quiz</span>
                                        <span class="text-sm opacity-75">Élaborez des tests d'évaluation</span>
                                    </div>
                                </a>

                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800">
                                    <div class="p-3 mr-4 bg-red-800 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Statistiques et rapports</span>
                                        <span class="text-sm opacity-75">Analysez les performances</span>
                                    </div>
                                </a>

                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-gray-700 to-gray-800 hover:from-gray-800 hover:to-gray-900">
                                    <div class="p-3 mr-4 bg-gray-900 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Paramètres système</span>
                                        <span class="text-sm opacity-75">Configuration de la plateforme</span>
                                    </div>
                                </a>

                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700">
                                    <div class="p-3 mr-4 bg-yellow-700 rounded-full bg-opacity-30">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Annonces</span>
                                        <span class="text-sm opacity-75">Publiez des informations</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- System Status -->
            <div class="mt-6 overflow-hidden bg-white border border-gray-100 shadow-sm sm:rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h3 class="flex items-center font-medium text-gray-700 text-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Statut du système
                    </h3>
                </div>
                <div class="flex flex-wrap items-center justify-between p-6 text-sm">
                    <div class="flex items-center text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Tous les services sont opérationnels
                    </div>
                    <span class="text-gray-500">Dernière mise à jour: {{ now()->format('d/m/Y à H:i') }}</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

