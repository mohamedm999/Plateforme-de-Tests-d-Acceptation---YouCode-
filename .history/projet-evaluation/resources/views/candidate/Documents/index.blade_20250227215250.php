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
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    @php
                                                        $iconData = [
                                                            'identity' => ['bg' => 'bg-indigo-100', 'text' => 'text-indigo-600', 'path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />', 'label' => 'Pièce d\'identité'],
                                                            'certificate' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-600', 'path' => '<path d="M12 14l9-5-9-5-9 5 9 5z" /><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />', 'label' => 'Diplôme'],
                                                            'default' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-600', 'path' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />', 'label' => 'Autre document']
                                                        ];
                                                        
                                                        $icon = $iconData[$document->type] ?? $iconData['default'];
                                                    @endphp
                                                    
                                                    <div class="flex-shrink-0 h-10 w-10 {{ $icon['bg'] }} rounded-full flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $icon['text'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            {!! $icon['path'] !!}
                                                        </svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">{{ $icon['label'] }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $document->original_name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500">{{ $document->created_at->format('d/m/Y H:i') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @php
                                                    $statusClasses = [
                                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                                        'validated' => 'bg-green-100 text-green-800',
                                                        'rejected' => 'bg-red-100 text-red-800'
                                                    ];
                                                    $statusLabels = [
                                                        'pending' => 'En attente',
                                                        'validated' => 'Validé',
                                                        'rejected' => 'Rejeté'
                                                    ];
                                                @endphp
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$document->status] }}">
                                                    {{ $statusLabels[$document->status] }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex items-center space-x-4">
                                                    <button onclick="viewDocument('{{ $document->id }}')" class="text-indigo-600 hover:text-indigo-900">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </button>

                                                    @if ($document->status == 'pending' || $document->status == 'rejected')
                                                        <form action="{{ route('candidate.documents.destroy', $document->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce document ?')" class="text-red-600 hover:text-red-900">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if ($document->status == 'rejected' && $document->admin_comment)
                                                        <div x-data="{ open: false }" class="relative">
                                                            <button @click="open = !open" class="text-gray-600 hover:text-gray-900">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </button>
                                                            <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                                                                <div class="py-1 px-2">
                                                                    <p class="text-sm text-red-700 font-medium">Motif du rejet:</p>
                                                                    <p class="text-sm text-gray-700">{{ $document->admin_comment }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
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

            <!-- Required Documents Section -->
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Documents requis</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @php
                            $requiredDocs = [
                                [
                                    'type' => 'identity',
                                    'title' => 'Pièce d\'identité',
                                    'description' => 'Veuillez fournir une copie de votre carte d\'identité nationale, passeport ou permis de conduire en cours de validité.',
                                    'bg' => 'bg-indigo-100',
                                    'text' => 'text-indigo-600',
                                    'button' => 'bg-indigo-600 hover:bg-indigo-700',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />'
                                ],
                                [
                                    'type' => 'certificate',
                                    'title' => 'Diplôme ou certificat',
                                    'description' => 'Veuillez fournir une copie de votre dernier diplôme ou certificat de formation pertinent.',
                                    'bg' => 'bg-blue-100',
                                    'text' => 'text-blue-600',
                                    'button' => 'bg-blue-600 hover:bg-blue-700',
                                    'icon' => '<path d="M12 14l9-5-9-5-9 5 9 5z" /><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />'
                                ]
                            ];
                        @endphp

                        @foreach($requiredDocs as $doc)
                            <div class="bg-gray-50 p-4 rounded-md">
                                <div class="flex items-center mb-2">
                                    <div class="flex-shrink-0 h-10 w-10 {{ $doc['bg'] }} rounded-full flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $doc['text'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            {!! $doc['icon'] !!}
                                        </svg>
                                    </div>
                                    <h4 class="text-lg font-medium text-gray-900">{{ $doc['title'] }}</h4>
                                </div>
                                <p class="text-sm text-gray-600 ml-13">{{ $doc['description'] }}</p>
                                <div class="mt-2 text-xs text-gray-500 ml-13">Format accepté: JPEG, PNG, PDF (max 5 MB)</div>

                                @php $docItem = $documents->where('type', $doc['type'])->first(); @endphp
                                
                                @if (!$docItem)
                                    <div class="mt-4 ml-13">
                                        <a href="{{ route('candidate.documents.create', ['type' => $doc['type']]) }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white {{ $doc['button'] }} focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Téléverser
                                        </a>
                                    </div>
                                @else
                                    <div class="mt-2 ml-13">
                                        @php
                                            $statusClasses = [
                                                'pending' => 'bg-yellow-100 text-yellow-800',
                                                'validated' => 'bg-green-100 text-green-800',
                                                'rejected' => 'bg-red-100 text-red-800'
                                            ];
                                            $statusLabels = [
                                                'pending' => 'En attente de validation',
                                                'validated' => 'Document validé',
                                                'rejected' => 'Document rejeté'
                                            ];
                                        @endphp
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClasses[$docItem->status] }}">
                                            {{ $statusLabels[$docItem->status] }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Document Preview Modal -->
    <div id="document-modal" class="fixed inset-0 overflow-y-auto hidden" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Prévisualisation du document</h3>
                    <div class="mt-4">
                        <div id="document-preview-container" class="h-96 flex items-center justify-center bg-gray-100 rounded-md">
                            <img id="document-preview-image" src="" alt="Prévisualisation du document" class="max-h-full max-w-full hidden">
                            <div id="document-preview-pdf" class="text-center hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-600">Ce document est au format PDF</p>
                                <a id="pdf-download-link" href="#" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Télécharger le PDF
                                </a>
                            </div>
                            <div id="document-preview-loading" class="text-center">
                                <svg class="animate-spin h-12 w-12 text-gray-400 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <p class="mt-2 text-sm text-gray-500">Chargement du document...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="close-modal" class="btn-secondary">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewDocument(documentId) {
            const modal = document.getElementById('document-modal');
            modal.classList.remove('hidden');

            document.getElementById('document-preview-loading').classList.remove('hidden');
            document.getElementById('document-preview-image').classList.add('hidden');
            document.getElementById('document-preview-pdf').classList.add('hidden');

            fetch(`/candidate/documents/${documentId}/preview`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('document-preview-loading').classList.add('hidden');

                    if (data.type === 'image') {
                        const imgElement = document.getElementById('document-preview-image');
                        imgElement.src = data.url;
                        imgElement.classList.remove('hidden');
                    } else if (data.type === 'pdf') {
                        document.getElementById('document-preview-pdf').classList.remove('hidden');
                        document.getElementById('pdf-download-link').href = data.url;
                    }
                })
                .catch(error => {
                    console.error('Error loading document preview:', error);
                    document.getElementById('document-preview-loading').classList.add('hidden');
                    alert('Erreur lors du chargement du document');
                });
        }

        // Modal close handlers
        document.getElementById('close-modal').addEventListener('click', () => {
            document.getElementById('document-modal').classList.add('hidden');
        });

        window.addEventListener('click', (event) => {
            const modal = document.getElementById('document-modal');
            if (event.target === modal) modal.classList.add('hidden');
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') document.getElementById('document-modal').classList.add('hidden');
        });
    </script>
</x-app-layout>
