<!-- filepath: /c:/github/Plateforme-de-Tests-d-Acceptation---YouCode-/projet-evaluation/resources/views/candidate/Documents/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestion des Documents') }}
            </h2>
            <a href="{{ route('candidate.documents.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('Nouveau Document') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Application Progress -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-base font-medium text-gray-700">Progression du dossier</h3>
                    <span class="text-sm font-medium text-indigo-600">{{ $documents->count() > 0 ? min(100, 25 * $documents->count()) : 0 }}% complété</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-indigo-600 h-2.5 rounded-full transition-all duration-500" style="width: {{ $documents->count() > 0 ? min(100, 25 * $documents->count()) : 0 }}%"></div>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mt-1">
                    <span>Démarré</span>
                    <span>Documents téléversés</span>
                    <span>Documents validés</span>
                    <span>Dossier complet</span>
                </div>
            </div>

            <!-- Status Summary -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden transform transition duration-200 hover:scale-105 hover:shadow-md">
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Documents en attente</p>
                                <h3 class="text-xl font-bold text-gray-700">{{ $documents->where('status', 'pending')->count() }}</h3>
                                <p class="text-xs text-gray-500 mt-1">En cours d'examen par l'administration</p>
                            </div>
                            <div class="h-14 w-14 bg-amber-50 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden transform transition duration-200 hover:scale-105 hover:shadow-md">
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Documents validés</p>
                                <h3 class="text-xl font-bold text-gray-700">{{ $documents->where('status', 'approved')->count() }}</h3>
                                <p class="text-xs text-gray-500 mt-1">Vérifiés et acceptés par l'administration</p>
                            </div>
                            <div class="h-14 w-14 bg-green-50 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden transform transition duration-200 hover:scale-105 hover:shadow-md">
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Documents rejetés</p>
                                <h3 class="text-xl font-bold text-gray-700">{{ $documents->where('status', 'rejected')->count() }}</h3>
                                <p class="text-xs text-gray-500 mt-1">Nécessitent une nouvelle soumission</p>
                            </div>
                            <div class="h-14 w-14 bg-red-50 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages -->
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-md animate__animated animate__fadeIn">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                        <button type="button" onclick="this.parentElement.parentElement.remove()" class="ml-auto pl-3">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-md animate__animated animate__fadeIn">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="text-sm text-red-700">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" onclick="this.parentElement.parentElement.remove()" class="ml-auto pl-3">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Documents List -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="border-b border-gray-200 bg-gray-50 px-4 py-3 sm:px-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900">Mes Documents</h3>
                        <div class="text-sm text-gray-500">
                            Total : {{ $documents->count() }} document{{ $documents->count() != 1 ? 's' : '' }}
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    @if($documents->isEmpty())
                        <div class="bg-gray-50 rounded-lg py-10 px-6 flex flex-col items-center justify-center text-center">
                            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-indigo-100 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-800 mb-1">Aucun document soumis</h3>
                            <p class="text-gray-600 mb-6 max-w-md">Pour compléter votre candidature, vous devez téléverser les documents requis. Cliquez sur le bouton ci-dessous pour commencer.</p>
                            <a href="{{ route('candidate.documents.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-sm transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                Soumettre votre premier document
                            </a>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom du fichier</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de soumission</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($documents as $document)
                                        <tr class="hover:bg-gray-50 transition duration-150">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    @if($document->isImage())
                                                        <div class="flex-shrink-0 h-10 w-10 rounded-lg bg-blue-50 flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    @elseif($document->isPdf())
                                                        <div class="flex-shrink-0 h-10 w-10 rounded-lg bg-red-50 flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    @else
                                                        <div class="flex-shrink-0 h-10 w-10 rounded-lg bg-gray-50 flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    @endif
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-900">{{ ucfirst($document->type) }}</p>
                                                        <p class="text-xs text-gray-500">{{ strtoupper($document->extension) }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 truncate max-w-xs">{{ $document->original_name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $document->created_at->format('d/m/Y') }}</div>
                                                <div class="text-xs text-gray-500">{{ $document->created_at->format('H:i') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($document->isPending())
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        <svg class="mr-1 h-3 w-3 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                        </svg>
                                                        En attente
                                                    </span>
                                                @elseif($document->isApproved())
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        <svg class="mr-1 h-3 w-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                        </svg>
                                                        Validé
                                                    </span>
                                                @elseif($document->isRejected())
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        <svg class="mr-1 h-3 w-3 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                        </svg>
                                                        Rejeté
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-3">
                                                    <button type="button" onclick="previewDocument('{{ $document->id }}')" class="text-indigo-600 hover:text-indigo-900 transition duration-150" title="Voir">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>

                                                    @if($document->isPending() || $document->isRejected())
                                                        <form action="{{ route('candidate.documents.destroy', $document) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" onclick="confirmDelete(this.parentElement)" class="text-red-600 hover:text-red-900 transition duration-150" title="Supprimer">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if($document->isRejected())
                                                        <span x-data="{ open: false }" class="relative">
                                                            <button @click="open = !open" class="text-gray-600 hover:text-gray-900 transition duration-150" title="Raison du rejet">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                            <div x-show="open" @click.away="open = false" class="absolute z-10 w-72 right-0 mt-2 origin-top-right rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none divide-y divide-gray-100" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                                                <div class="py-2 px-3" role="none">
                                                                    <p class="text-xs font-medium text-gray-700">Raison du rejet:</p>
                                                                    <p class="text-sm text-gray-600 mt-1">{{ $document->rejection_reason }}</p>
                                                                </div>
                                                                <div class="py-2 px-3">
                                                                    <a href="{{ route('candidate.documents.create') }}" class="text-xs font-medium text-indigo-600 hover:text-indigo-800">
                                                                        Soumettre un nouveau document →
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6 flex justify-center">
                            <a href="{{ route('candidate.documents.create') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Ajouter un nouveau document
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Document Upload Requirements -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 mt-6">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-md font-medium text-gray-700 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        À propos des documents requis
                    </h3>
                </div>
                <div class="p-6 text-sm text-gray-600">
                    <div class="grid grid-cols-1 <!-- filepath: /c:/github/Plateforme-de-Tests-d-Acceptation---YouCode-/projet-evaluation/resources/views/candidate/Documents/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestion des Documents') }}
            </h2>
            <a href="{{ route('candidate.documents.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('Nouveau Document') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Application Progress -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-base font-medium text-gray-700">Progression du dossier</h3>
                    <span class="text-sm font-medium text-indigo-600">{{ $documents->count() > 0 ? min(100, 25 * $documents->count()) : 0 }}% complété</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-indigo-600 h-2.5 rounded-full transition-all duration-500" style="width: {{ $documents->count() > 0 ? min(100, 25 * $documents->count()) : 0 }}%"></div>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mt-1">
                    <span>Démarré</span>
                    <span>Documents téléversés</span>
                    <span>Documents validés</span>
                    <span>Dossier complet</span>
                </div>
            </div>

            <!-- Status Summary -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden transform transition duration-200 hover:scale-105 hover:shadow-md">
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Documents en attente</p>
                                <h3 class="text-xl font-bold text-gray-700">{{ $documents->where('status', 'pending')->count() }}</h3>
                                <p class="text-xs text-gray-500 mt-1">En cours d'examen par l'administration</p>
                            </div>
                            <div class="h-14 w-14 bg-amber-50 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden transform transition duration-200 hover:scale-105 hover:shadow-md">
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Documents validés</p>
                                <h3 class="text-xl font-bold text-gray-700">{{ $documents->where('status', 'approved')->count() }}</h3>
                                <p class="text-xs text-gray-500 mt-1">Vérifiés et acceptés par l'administration</p>
                            </div>
                            <div class="h-14 w-14 bg-green-50 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden transform transition duration-200 hover:scale-105 hover:shadow-md">
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Documents rejetés</p>
                                <h3 class="text-xl font-bold text-gray-700">{{ $documents->where('status', 'rejected')->count() }}</h3>
                                <p class="text-xs text-gray-500 mt-1">Nécessitent une nouvelle soumission</p>
                            </div>
                            <div class="h-14 w-14 bg-red-50 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages -->
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-md animate__animated animate__fadeIn">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                        <button type="button" onclick="this.parentElement.parentElement.remove()" class="ml-auto pl-3">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-md animate__animated animate__fadeIn">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="text-sm text-red-700">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" onclick="this.parentElement.parentElement.remove()" class="ml-auto pl-3">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Documents List -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="border-b border-gray-200 bg-gray-50 px-4 py-3 sm:px-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900">Mes Documents</h3>
                        <div class="text-sm text-gray-500">
                            Total : {{ $documents->count() }} document{{ $documents->count() != 1 ? 's' : '' }}
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    @if($documents->isEmpty())
                        <div class="bg-gray-50 rounded-lg py-10 px-6 flex flex-col items-center justify-center text-center">
                            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-indigo-100 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-800 mb-1">Aucun document soumis</h3>
                            <p class="text-gray-600 mb-6 max-w-md">Pour compléter votre candidature, vous devez téléverser les documents requis. Cliquez sur le bouton ci-dessous pour commencer.</p>
                            <a href="{{ route('candidate.documents.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-sm transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                Soumettre votre premier document
                            </a>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom du fichier</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de soumission</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($documents as $document)
                                        <tr class="hover:bg-gray-50 transition duration-150">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    @if($document->isImage())
                                                        <div class="flex-shrink-0 h-10 w-10 rounded-lg bg-blue-50 flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    @elseif($document->isPdf())
                                                        <div class="flex-shrink-0 h-10 w-10 rounded-lg bg-red-50 flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    @else
                                                        <div class="flex-shrink-0 h-10 w-10 rounded-lg bg-gray-50 flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    @endif
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-900">{{ ucfirst($document->type) }}</p>
                                                        <p class="text-xs text-gray-500">{{ strtoupper($document->extension) }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 truncate max-w-xs">{{ $document->original_name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $document->created_at->format('d/m/Y') }}</div>
                                                <div class="text-xs text-gray-500">{{ $document->created_at->format('H:i') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($document->isPending())
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        <svg class="mr-1 h-3 w-3 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                        </svg>
                                                        En attente
                                                    </span>
                                                @elseif($document->isApproved())
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        <svg class="mr-1 h-3 w-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                        </svg>
                                                        Validé
                                                    </span>
                                                @elseif($document->isRejected())
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        <svg class="mr-1 h-3 w-3 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                        </svg>
                                                        Rejeté
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-3">
                                                    <button type="button" onclick="previewDocument('{{ $document->id }}')" class="text-indigo-600 hover:text-indigo-900 transition duration-150" title="Voir">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>

                                                    @if($document->isPending() || $document->isRejected())
                                                        <form action="{{ route('candidate.documents.destroy', $document) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" onclick="confirmDelete(this.parentElement)" class="text-red-600 hover:text-red-900 transition duration-150" title="Supprimer">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if($document->isRejected())
                                                        <span x-data="{ open: false }" class="relative">
                                                            <button @click="open = !open" class="text-gray-600 hover:text-gray-900 transition duration-150" title="Raison du rejet">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                            <div x-show="open" @click.away="open = false" class="absolute z-10 w-72 right-0 mt-2 origin-top-right rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none divide-y divide-gray-100" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                                                <div class="py-2 px-3" role="none">
                                                                    <p class="text-xs font-medium text-gray-700">Raison du rejet:</p>
                                                                    <p class="text-sm text-gray-600 mt-1">{{ $document->rejection_reason }}</p>
                                                                </div>
                                                                <div class="py-2 px-3">
                                                                    <a href="{{ route('candidate.documents.create') }}" class="text-xs font-medium text-indigo-600 hover:text-indigo-800">
                                                                        Soumettre un nouveau document →
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6 flex justify-center">
                            <a href="{{ route('candidate.documents.create') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Ajouter un nouveau document
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Document Upload Requirements -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 mt-6">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-md font-medium text-gray-700 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        À propos des documents requis
                    </h3>
                </div>
                
