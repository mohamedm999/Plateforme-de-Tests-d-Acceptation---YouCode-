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

