<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Gestion des Documents') }}</h2>
            <a href="{{ route('candidate.documents.create') }}" class="btn-primary flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('Nouveau Document') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Status Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                @php
                    $statusData = [
                        ['name' => 'En attente', 'status' => 'pending', 'bg' => 'bg-yellow-100', 'text' => 'text-yellow-600', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />'],
                        ['name' => 'Validés', 'status' => 'validated', 'bg' => 'bg-green-100', 'text' => 'text-green-600', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />'],
                        ['name' => 'Rejetés', 'status' => 'rejected', 'bg' => 'bg-red-100', 'text' => 'text-red-600', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />']
                    ];
                @endphp

                @foreach($statusData as $item)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">{{ $item['name'] }}</p>
                                <h3 class="text-xl font-bold text-gray-700">{{ $documents->where('status', $item['status'])->count() }}</h3>
                            </div>
                            <div class="h-12 w-12 {{ $item['bg'] }} rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ $item['text'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    {!! $item['icon'] !!}
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Flash Messages -->
            @if (session('success'))
                <x-alert type="success" :message="session('success')" class="mb-6" />
            @endif
            
            @if (session('error'))
                <x-alert type="error" :message="session('error')" class="mb-6" />
            @endif

            <!-- Main Content -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-6">Documents soumis</h3>

                    @if ($documents->isEmpty())
                        <x-empty-state
                            icon="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                            title="Aucun document"
                            message="Commencez par téléverser votre pièce d'identité"
                            :action-url="route('candidate.documents.create')"
                            action-text="Ajouter un document"
                        />
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom du fichier</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($documents as $document)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ ucfirst($document->type) }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $document->original_name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $document->created_at->format('d/m/Y') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if ($document->status == 'pending')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        En attente
                                                    </span>
                                                @elseif($document->status == 'validated')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Validé
                                                    </span>
                                                @elseif($document->status == 'rejected')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        Rejeté
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('candidate.documents.show', $document->id) }}" class="text-indigo-600 hover:text-indigo-900">Voir</a>
                                                    
                                                    @if ($document->status != 'validated')
                                                        <form action="{{ route('candidate.documents.destroy', $document->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                                Supprimer
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
