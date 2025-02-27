<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Système d\'Évaluation des Candidats') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Bienvenue dans la plateforme d'évaluation</h3>
                    <p class="mt-4">
                        Cette plateforme vous permet de:
                    </p>
                    <ul class="list-disc pl-5 mt-2">
                        <li>Soumettre vos documents</li>
                        <li>Passer des tests d'évaluation</li>
                        <li>Planifier des rendez-vous pour les tests présentiels</li>
                    </ul>

                    @if (auth()->user()->role === 'candidat')
                        <div class="mt-6">
                            <h4 class="text-md font-medium text-gray-700">Prochaines étapes:</h4>
                            <div class="mt-3 flex flex-col space-y-2">
                                <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Compléter votre profil
                                </a>
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Soumettre vos documents
                                </a>
                            </div>
                        </div>
                    @elseif (auth()->user()->role === 'examinateur')
                        <div class="mt-6">
                            <h4 class="text-md font-medium text-gray-700">Actions disponibles:</h4>
                            <div class="mt-3 flex flex-col space-y-2">
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Gérer vos disponibilités
                                </a>
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Voir vos sessions planifiées
                                </a>
                            </div>
                        </div>
                    @elseif (auth()->user()->role === 'administrateur')
                        <div class="mt-6">
                            <h4 class="text-md font-medium text-gray-700">Administration:</h4>
                                </a>
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Créer des quiz
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
