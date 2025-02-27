<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tableau de Bord') }}
            </h2>
            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                {{ ucfirst(Auth::user()->role ?? 'candidat') }}
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Profile Completion -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Profil</p>
                                <h3 class="text-xl font-bold text-gray-700">65% Complet</h3>
                            </div>
                            <div class="h-12 w-12 bg-blue-50 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-3 w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 65%"></div>
                        </div>
                        <div class="mt-2 text-xs text-gray-500">Complétez votre profil pour débloquer toutes les fonctionnalités</div>
                    </div>
                </div>

                <!-- Documents Status -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Documents</p>
                                <h3 class="text-xl font-bold text-gray-700">1 en attente</h3>
                            </div>
                            <div class="h-12 w-12 bg-amber-50 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-3 flex space-x-2">
                            <span class="px-2 py-1 text-xs rounded-full bg-amber-100 text-amber-800">
                                1 En attente
                            </span>
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                0 Validés
                            </span>
                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">
                                0 Rejetés
                            </span>
                        </div>
                        <div class="mt-2 text-xs text-gray-500">Tous les documents doivent être validés</div>
                    </div>
                </div>

                <!-- Next Step -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Prochaine étape</p>
                                <h3 class="text-xl font-bold text-gray-700">Téléverser vos documents</h3>
                            </div>
                            <div class="h-12 w-12 bg-indigo-50 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-3 text-sm text-gray-600">
                            Ajoutez votre pièce d'identité pour continuer votre candidature
                        </div>
                        <div class="mt-2 text-xs text-gray-500">Requis avant le 05/03/2025</div>
                    </div>
                </div>
            </div>

            <!-- Document Upload Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 mb-6">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-900 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                            Téléversement de Pièce d'Identité
                        </h3>
                        <div class="text-sm">
                            <span class="bg-amber-100 text-amber-800 px-2 py-1 rounded-md">
                                En attente de validation
                            </span>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-4">
                        <div x-data="documentUploader()" class="space-y-6">
                            <!-- Instructions -->
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-md">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-blue-800">
                                            Veuillez téléverser une pièce d'identité valide (carte nationale d'identité, passeport ou permis de conduire).
                                            <br>Formats acceptés: JPEG, PNG, PDF. Taille maximum: 5 MB.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Upload Area -->
                                <div>
                                    <form action="{{ route('candidate.documents.store') }}" method="POST" enctype="multipart/form-data"
                                        @submit="submitting = true" class="space-y-4">
                                        @csrf

                                        <div
                                            x-show="!fileChosen"
                                            @click="$refs.fileInput.click()"
                                            class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center cursor-pointer hover:bg-gray-50 transition duration-150">
                                            <input type="file" name="identity_document" x-ref="fileInput" class="hidden"
                                                @change="onFileChange" accept=".jpeg,.jpg,.png,.pdf">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>

                                            <p class="mt-2 text-gray-600">
                                                Cliquez pour sélectionner un fichier ou glissez-le ici
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                JPEG, PNG ou PDF jusqu'à 5MB
                                            </p>
                                        </div>

                                        <div x-show="fileChosen" class="bg-gray-50 rounded-lg p-4">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-2">
                                                    <svg x-show="fileType === 'pdf'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg x-show="fileType === 'image'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                                    </svg>
                                                    <div>
                                                        <p x-text="fileName" class="text-sm font-medium text-gray-700"></p>
                                                        <p x-text="fileSize" class="text-xs text-gray-500"></p>
                                                    </div>
                                                </div>
                                                <button type="button" @click="resetFile" class="text-sm text-red-600 hover:text-red-800">
                                                    Supprimer
                                                </button>
                                            </div>
                                        </div>

                                        <div x-show="errorMessage" class="text-sm text-red-600 mt-2" x-text="errorMessage"></div>

                                        <div class="flex justify-end">
                                            <button type="submit"
                                                :disabled="submitting || !fileChosen"
                                                :class="{'opacity-50 cursor-not-allowed': submitting || !fileChosen}"
                                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                <svg x-show="submitting" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                                <span x-text="submitting ? 'Envoi en cours...' : 'Téléverser'"></span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Document Preview -->
                                <div>
                                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 h-full">
                                        <h4 class="text-sm font-medium text-gray-700 mb-2">Prévisualisation</h4>

                                        <div x-show="!fileChosen" class="flex flex-col items-center justify-center h-48 bg-gray-100 rounded border border-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <p class="mt-2 text-sm text-gray-500">Aucun document sélectionné</p>
                                        </div>

                                        <div x-show="fileChosen && fileType === 'image'" class="h-48 bg-gray-800 rounded flex items-center justify-center overflow-hidden">
                                            <img :src="filePreview" class="max-h-full max-w-full object-contain" alt="Prévisualisation du document">
                                        </div>

                                        <div x-show="fileChosen && fileType === 'pdf'" class="flex flex-col items-center justify-center h-48 bg-gray-100 rounded border border-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            <p class="mt-2 text-sm text-gray-700">Document PDF</p>
                                            <p class="text-xs text-gray-500">(Prévisualisation non disponible)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Document History -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-md font-medium text-gray-700 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Historique des Documents
                    </h3>
                </div>
                <div class="p-6">
                    <div class="relative">
                        <div class="absolute left-3 top-0 bottom-0 w-0.5 bg-gray-200"></div>
                        <div class="space-y-6 relative">
                            <div class="flex">
                                <div class="flex flex-col items-center mr-4">
                                    <div class="h-6 w-6 rounded-full bg-amber-500 flex items-center justify-center z-10">
                                        <svg class="h-3 w-3 text-white" viewBox="0 0 12 12" fill="currentColor">
                                            <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                                        </svg>
                                    </div>
                                    <div class="h-full w-px bg-gray-200"></div>
                                </div>
                                <div class="bg-white border border-gray-200 rounded-lg p-4 flex-1 shadow-sm">
                                    <p class="text-sm font-medium text-gray-900">Pièce d'identité en attente de validation</p>
                                    <p class="text-sm text-gray-500 mt-1">Le document a été téléversé et est en attente d'examen par un administrateur.</p>
                                    <div class="mt-2 text-xs text-gray-400">27 février 2025, 14:30</div>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="flex flex-col items-center mr-4">
                                    <div class="h-6 w-6 rounded-full bg-gray-500 flex items-center justify-center z-10">
                                        <svg class="h-3 w-3 text-white" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="bg-white border border-gray-200 rounded-lg p-4 flex-1 shadow-sm">
                                    <p class="text-sm font-medium text-gray-900">Début du processus</p>
                                    <p class="text-sm text-gray-500 mt-1">Veuillez téléverser votre pièce d'identité pour poursuivre le processus d'acceptation.</p>
                                    <div class="mt-2 text-xs text-gray-400">27 février 2025, 10:15</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js component script -->
    <script>
        function documentUploader() {
            return {
                fileChosen: false,
                fileName: '',
                fileSize: '',
                fileType: '',
                filePreview: null,
                errorMessage: '',
                submitting: false,
                maxFileSize: 5 * 1024 * 1024, // 5MB in bytes

                onFileChange(event) {
                    const file = event.target.files[0];
                    if (!file) return;

                    // Check file type
                    const validTypes = ['image/jpeg', 'image/png', 'application/pdf'];
                    if (!validTypes.includes(file.type)) {
                        this.errorMessage = 'Format de fichier non supporté. Veuillez utiliser JPEG, PNG ou PDF.';
                        event.target.value = '';
                        return;
                    }

                    // Check file size
                    if (file.size > this.maxFileSize) {
                        this.errorMessage = 'Le fichier est trop volumineux. La taille maximum est de 5 MB.';
                        event.target.value = '';
                        return;
                    }

                    this.errorMessage = '';
                    this.fileChosen = true;
                    this.fileName = file.name;
                    this.fileSize = this.formatFileSize(file.size);

                    // Set file type for UI display
                    this.fileType = file.type.startsWith('image/') ? 'image' : 'pdf';

                    // Create preview for images
                    if (this.fileType === 'image') {
                        const reader = new FileReader();
                        reader.onload = e => this.filePreview = e.target.result;
                        reader.readAsDataURL(file);
                    }
                },

                resetFile() {
                    this.fileChosen = false;
                    this.fileName = '';
                    this.fileSize = '';
                    this.fileType = '';
                    this.filePreview = null;
                    this.errorMessage = '';
                    this.$refs.fileInput.value = '';
                },

                formatFileSize(size) {
                    if (size < 1024) {
                        return size + ' octets';
                    } else if (size < 1024 * 1024) {
                        return (size / 1024).toFixed(2) + ' KB';
                    } else {
                        return (size / (1024 * 1024)).toFixed(2) + ' MB';
                    }
                }
            }
        }
    </script>
</x-app-layout>
