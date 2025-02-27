<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Système d\'Évaluation des Candidats') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg mb-6 border border-gray-100">
                <div class="p-6 bg-gradient-to-r from-blue-50 to-white">
                    <h3 class="text-xl font-bold text-gray-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Bienvenue dans la plateforme d'évaluation
                    </h3>
                    <p class="mt-4 text-gray-700">
                        Cette plateforme vous permet de gérer efficacement toutes les étapes du processus d'évaluation:
                    </p>
                    <ul class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <li class="bg-blue-50 p-3 rounded-lg flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span>Soumettre et valider vos documents</span>
                        </li>
                        <li class="bg-blue-50 p-3 rounded-lg flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <span>Passer des tests d'évaluation en ligne</span>
                        </li>
                        <li class="bg-blue-50 p-3 rounded-lg flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Planifier des rendez-vous d'évaluation</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Role Specific Actions -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
                <div class="p-6">
                    @if (auth()->user()->role === 'candidat')
                        <div class="border-l-4 border-blue-500 pl-4">
                            <h4 class="text-lg font-bold text-gray-800">Espace Candidat</h4>
                            <p class="text-sm text-gray-600 mb-4">Complétez votre profil et soumettez vos documents pour commencer votre parcours d'évaluation.</p>
                            
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <a href="{{ route('profile.edit') }}" class="flex items-center p-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg shadow hover:from-blue-700 hover:to-blue-800 transition duration-150">
                                    <div class="mr-4 bg-blue-800 bg-opacity-30 p-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Compléter votre profil</span>
                                        <span class="text-sm opacity-75">Mettez à jour vos informations personnelles</span>
                                    </div>
                                </a>
                                
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 bg-gradient-to-r from-gray-700 to-gray-800 text-white rounded-lg shadow hover:from-gray-800 hover:to-gray-900 transition duration-150">
                                    <div class="mr-4 bg-gray-900 bg-opacity-30 p-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Soumettre vos documents</span>
                                        <span class="text-sm opacity-75">Téléchargez vos fichiers et dossiers</span>
                                    </div>
                                </a>
                                
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg shadow hover:from-green-700 hover:to-green-800 transition duration-150">
                                    <div class="mr-4 bg-green-800 bg-opacity-30 p-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Passer vos tests</span>
                                        <span class="text-sm opacity-75">Accédez aux évaluations disponibles</span>
                                    </div>
                                </a>
                                
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg shadow hover:from-purple-700 hover:to-purple-800 transition duration-150">
                                    <div class="mr-4 bg-purple-800 bg-opacity-30 p-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                        <div class="border-l-4 border-green-500 pl-4">
                            <h4 class="text-lg font-bold text-gray-800">Espace Examinateur</h4>
                            <p class="text-sm text-gray-600 mb-4">Gérez vos sessions d'évaluation et suivez la progression des candidats.</p>
                            
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg shadow hover:from-green-700 hover:to-green-800 transition duration-150">
                                    <div class="mr-4 bg-green-800 bg-opacity-30 p-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Gérer vos disponibilités</span>
                                        <span class="text-sm opacity-75">Définir vos créneaux horaires</span>
                                    </div>
                                </a>
                                
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 bg-gradient-to-r from-gray-700 to-gray-800 text-white rounded-lg shadow hover:from-gray-800 hover:to-gray-900 transition duration-150">
                                    <div class="mr-4 bg-gray-900 bg-opacity-30 p-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Sessions planifiées</span>
                                        <span class="text-sm opacity-75">Consultez votre calendrier d'évaluation</span>
                                    </div>
                                </a>
                                
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg shadow hover:from-blue-700 hover:to-blue-800 transition duration-150">
                                    <div class="mr-4 bg-blue-800 bg-opacity-30 p-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                        <div class="border-l-4 border-purple-500 pl-4">
                            <h4 class="text-lg font-bold text-gray-800">Espace Administration</h4>
                            <p class="text-sm text-gray-600 mb-4">Gérez l'ensemble de la plateforme et supervisez les processus d'évaluation.</p>
                            
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg shadow hover:from-purple-700 hover:to-purple-800 transition duration-150">
                                    <div class="mr-4 bg-purple-800 bg-opacity-30 p-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Gestion des utilisateurs</span>
                                        <span class="text-sm opacity-75">Ajouter et modifier les comptes</span>
                                    </div>
                                </a>
                                
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg shadow hover:from-blue-700 hover:to-blue-800 transition duration-150">
                                    <div class="mr-4 bg-blue-800 bg-opacity-30 p-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Validation de documents</span>
                                        <span class="text-sm opacity-75">Examiner les pièces soumises</span>
                                    </div>
                                </a>
                                
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg shadow hover:from-green-700 hover:to-green-800 transition duration-150">
                                    <div class="mr-4 bg-green-800 bg-opacity-30 p-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Création de quiz</span>
                                        <span class="text-sm opacity-75">Élaborez des tests d'évaluation</span>
                                    </div>
                                </a>
                                
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg shadow hover:from-red-700 hover:to-red-800 transition duration-150">
                                    <div class="mr-4 bg-red-800 bg-opacity-30 p-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block font-bold">Statistiques et rapports</span>
                                        <span class="text-sm opacity-75">Analysez les performances</span>
                                    </div>
                                </a>
                                
                                <a href="{{ route('dashboard') }}" class="flex items-center p-4 bg-gradient-to-r from-gray-700 to-gray-800 text-white rounded-lg shadow hover:from-gray-800 hover:to-gray-900 transition duration-150">
                                    <div class="mr-4 bg-gray-900 bg-opacity-30 p-3 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">

