<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Système d\'Évaluation des Candidats') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Bienvenue dans la plateforme d'évaluation</h3>
                    <p class="text-gray-600 mb-6 text-lg">
                        Cette plateforme vous permet de:
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-blue-50 p-5 rounded-lg border-l-4 border-blue-500 shadow-sm">
                            <div class="flex items-center mb-2">
                                <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <h4 class="font-semibold text-gray-800">Soumettre vos documents</h4>
                            </div>
                            <p class="text-gray-600 text-sm">Téléchargez vos diplômes, CV et autres pièces justificatives</p>
                        </div>
                        
                        <div class="bg-green-50 p-5 rounded-lg border-l-4 border-green-500 shadow-sm">
                            <div class="flex items-center mb-2">
                                <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                <h4 class="font-semibold text-gray-800">Passer des tests</h4>
                            </div>
                            <p class="text-gray-600 text-sm">Évaluez vos compétences à travers divers questionnaires</p>
                        </div>
                        
                        <div class="bg-purple-50 p-5 rounded-lg border-l-4 border-purple-500 shadow-sm">
                            <div class="flex items-center mb-2">
                                <svg class="w-6 h-6 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <h4 class="font-semibold text-gray-800">Planifier des rendez-vous</h4>
                            </div>
                            <p class="text-gray-600 text-sm">Organisez vos sessions d'évaluation présentielles</p>
                        </div>
                    </div>

                    @if (auth()->user()->role === 'candidat')
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg shadow-sm p-6 border border-blue-100">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Prochaines étapes</h4>
                            <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-3">
                                <a href="#" class="inline-flex items-center justify-center px-5 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Compléter votre profil
                                </a>
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-5 py-2 bg-gray-800 border border-transparent rounded-md font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                    </svg>
                                    Soumettre vos documents
                                </a>
                            </div>
                        </div>
                    @elseif (auth()->user()->role === 'examinateur')
                        <div class="bg-gradient-to-r from-green-50 to-teal-50 rounded-lg shadow-sm p-6 border border-green-100">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Actions disponibles</h4>
                            <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-3">
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-5 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Gérer vos disponibilités
                                </a>
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-5 py-2 bg-gray-800 border border-transparent rounded-md font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
