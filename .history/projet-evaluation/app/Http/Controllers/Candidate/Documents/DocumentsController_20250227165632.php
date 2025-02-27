<?php
namespace App\Http\Controllers\Candidate\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Document;

class DocumentsController extends Controller
{
    public function index()
    {
        // Get the authenticated user's documents
        $documents = Document::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        // Pass the documents to the view
        return view('candidate.documents.index', [
            'documents' => $documents
        ]);
    }

        public function uploadIdDocument(Request $request)
        {
            $request->validate([
                'id_document' => 'required|file|mimes:jpeg,png,pdf|max:5120' // 5MB limit
            ]);

            $user = Auth::user();

            // Generate anonymous filename
            $extension = $request->file('id_document')->getClientOriginalExtension();
            $filename = 'id_' . Str::uuid() . '.' . $extension;

            // Store file
            $path = $request->file('id_document')->storeAs(
                'candidate_documents/' . $user->id,
                $filename,
                'private' // Assuming you've set up a private disk in filesystem config
            );

            // Save document record in database (assuming you have a Document model)
            $document = $user->documents()->updateOrCreate(
                ['type' => 'id_document'],
                [
                    'path' => $path,
                    'original_name' => $request->file('id_document')->getClientOriginalName(),
                    'status' => 'pending',
                    'mime_type' => $request->file('id_document')->getMimeType(),
                ]
            );

            return redirect()->route('candidate.documents.index')
                ->with('success', 'Pièce d\'identité téléversée avec succès et en attente de validation.');
        }

        // public function showIdDocument()
        // {
        //     $user = Auth::user();
        //     $document = $user->documents()->where('type', 'id_document')->first();

        //     if (!$document) {
        //         return redirect()->route('candidate.documents.index')
        //             ->with('error', 'Aucune pièce d\'identité trouvée.');
        //     }

        //     return view('candidate.documents.show_id', compact('document'));
        // }
}

