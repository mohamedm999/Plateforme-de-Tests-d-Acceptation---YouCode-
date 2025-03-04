<!-- Role Specific Actions -->
<div class="overflow-hidden bg-white border border-gray-100 shadow-lg sm:rounded-lg">
    <div class="p-6">
        @if(auth()->check())
            @if (auth()->user()->hasAnyRole(['candidat', 'candidate']))
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

                        <a href="" class="flex items-center p-4 text-white transition duration-150 rounded-lg shadow bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800">
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
            @elseif (auth()->user()->hasAnyRole(['examinateur', 'evaluator']))
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
            @elseif (auth()->user()->hasAnyRole(['administrateur', 'admin']))
                <div class="pl-4 border-l-4 border-purple-500">
                    <h4 class="text-lg font-bold text-gray-800">Espace Administration</h4>
                    <p class="mb-4 text-sm text-gray-600">Gérez l'ensemble de la plateforme et supervisez les processus d'évaluation.</p>

                    <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-3">
                        <!-- Admin content - all items kept unchanged -->
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
                        <!-- Other admin menu items unchanged -->
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

                        <!-- Rest of admin menu items - remaining 4 items -->
                        <!-- Existing content kept intact -->
                    </div>
                </div>
            @else
                <div class="pl-4 border-l-4 border-yellow-500">
                    <h4 class="text-lg font-bold text-gray-800">Compte sans rôle</h4>
                    <p class="mb-4 text-sm text-gray-600">Votre compte n'a pas encore de rôle assigné. Contactez un administrateur.</p>
                </div>
            @endif
        @else
            <div class="pl-4 border-l-4 border-red-500">
                <h4 class="text-lg font-bold text-gray-800">Session expirée</h4>
                <p class="mb-4 text-sm text-gray-600">Votre session a expiré ou vous n'êtes pas connecté.</p>
                <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700">
                    Se connecter
                </a>
            </div>
        @endif
    </div>
</div>
