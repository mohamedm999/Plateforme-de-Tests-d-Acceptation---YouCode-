<!-- User Information Card -->
<div class="mb-6 bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-100">
    <div class="p-6 bg-gradient-to-r from-indigo-50 to-white">
        <h3 class="text-xl font-bold text-gray-900 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Informations importantes
        </h3>
        
        <div class="mt-4 p-4 bg-indigo-50 rounded-lg border border-indigo-100">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-indigo-800">Bonjour {{ auth()->user()->name }},</h3>
                    <div class="mt-2 text-sm text-indigo-700">
                        <p>Bienvenue sur notre plateforme. Voici quelques informations importantes pour vous :</p>
                        <ul class="list-disc list-inside mt-2 space-y-1 text-indigo-600">
                            <li>Votre rôle actuel : <span class="font-medium">{{ ucfirst(auth()->user()->role) }}</span></li>
                            <li>Dernière connexion : <span class="font-medium">{{ now()->format('d/m/Y à H:i') }}</span></li>
                            @if (auth()->user()->role === 'candidat')
                                <li>N'oubliez pas de compléter votre profil pour pouvoir accéder à toutes les fonctionnalités</li>
                            @elseif (auth()->user()->role === 'examinateur')
                                <li>Vous avez des évaluations en attente à traiter</li>
                            @elseif (auth()->user()->role === 'administrateur')
                                <li>Il y a de nouveaux candidats qui attendent la validation de leurs documents</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
