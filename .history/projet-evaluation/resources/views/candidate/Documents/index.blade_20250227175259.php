<h3 class="text-lg font-medium text-gray-900">
    {{ __('Documents requis pour votre candidature') }}
</h3>
</div>

<div class="p-6">
<div class="space-y-4">
    <div class="flex items-start">
        <div class="flex-shrink-0 pt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="ml-3">
            <h4 class="text-sm font-medium text-gray-800">CV à jour</h4>
            <p class="text-xs text-gray-500 mt-1">Format PDF recommandé, taille maximale de 5MB</p>
        </div>
    </div>

    <div class="flex items-start">
        <div class="flex-shrink-0 pt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="ml-3">
            <h4 class="text-sm font-medium text-gray-800">Pièce d'identité</h4>
            <p class="text-xs text-gray-500 mt-1">Carte d'identité nationale, passeport ou titre de séjour valide</p>
        </div>
    </div>

    <div class="flex items-start">
        <div class="flex-shrink-0 pt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="ml-3">
            <h4 class="text-sm font-medium text-gray-800">Diplôme le plus élevé</h4>
            <p class="text-xs text-gray-500 mt-1">Diplôme ou attestation de réussite</p>
        </div>
    </div>

    <div class="flex items-start">
        <div class="flex-shrink-0 pt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="ml-3">
            <h4 class="text-sm font-medium text-gray-800">Lettre de motivation</h4>
            <p class="text-xs text-gray-500 mt-1">Format PDF recommandé, expliquant votre intérêt pour la formation</p>
        </div>
    </div>
</div>

<div class="mt-6 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-md">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-sm text-yellow-700">
                <strong>Important :</strong> Tous les documents doivent être lisibles et complets. Les documents rejetés devront être soumis à nouveau.
            </p>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<!-- Document Preview Modal -->
<div id="documentPreviewModal" class="fixed inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeModal()"></div>
<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
<div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full sm:p-6">
<div class="absolute top-0 right-0 pt-4 pr-4">
<button type="button" onclick="closeModal()" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    <span class="sr-only">Fermer</span>
    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>
</div>
<div>
<div class="mt-3 sm:mt-0">
    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modal-title">
        Aperçu du document
    </h3>
    <div class="mt-2">
        <div id="documentPreview" class="overflow-hidden rounded-md border border-gray-200 bg-gray-100 flex items-center justify-center min-h-[400px]">
            <!-- Document content will be loaded here -->
            <div class="text-center p-6">
                <svg class="mx-auto h-12 w-12 text-gray-400 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <p class="mt-2 text-sm text-gray-500">Chargement de l'aperçu...</p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
<button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
    Fermer
</button>
<a id="documentDownloadLink" href="#" class="mr-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto sm:text-sm" download>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
    Télécharger
</a>
</div>
</div>
</div>
</div>

@push('scripts')
<script>
function previewDocument(documentId) {
const modal = document.getElementById('documentPreviewModal');
const previewContainer = document.getElementById('documentPreview');
const downloadLink = document.getElementById('documentDownloadLink');

// Show modal with loading state
modal.classList.remove('hidden');
previewContainer.innerHTML = `
<div class="text-center p-6">
<svg class="mx-auto h-12 w-12 text-gray-400 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
</svg>
<p class="mt-2 text-sm text-gray-500">Chargement de l'aperçu...</p>
</div>
`;

// Fetch document preview
fetch(`/candidate/documents/${documentId}/preview`)
.then(response => response.json())
.then(data => {
if (data.success) {
    if (data.type === 'image') {
        previewContainer.innerHTML = `<img src="${data.url}" alt="Document preview" class="max-w-full max-h-[600px] object-contain">`;
    } else if (data.type === 'pdf') {
        previewContainer.innerHTML = `<iframe src="${data.url}" class="w-full h-[600px]" frameborder="0"></iframe>`;
    } else {
        previewContainer.innerHTML = `<div class="text-center p-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <p class="mt-2 text-sm text-gray-500">L'aperçu n'est pas disponible pour ce type de fichier.</p>
            <p class="text-xs text-gray-400">Veuillez télécharger le fichier pour le consulter.</p>
        </div>`;
    }

    downloadLink.href = data.download_url;
    downloadLink.setAttribute('download', data.filename);
} else {
    previewContainer.innerHTML = `<div class="text-center p-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
        <p class="mt-2 text-sm text-red-500">Impossible de charger l'aperçu du document.</p>
    </div>`;
}
})
.catch(error => {
previewContainer.innerHTML = `<div class="text-center p-6">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
    </svg>
    <p class="mt-2 text-sm text-red-500">Erreur lors du chargement de l'aperçu.</p>
</div>`;
console.error('Error fetching document preview:', error);
});
}

function closeModal() {
document.getElementById('documentPreviewModal').classList.add('hidden');
}

function confirmDelete(form) {
if (confirm('Êtes-vous sûr de vouloir supprimer ce document ? Cette action est irréversible.')) {
form.submit();
}
}
</script>
@endpush
</x-app-layout>
