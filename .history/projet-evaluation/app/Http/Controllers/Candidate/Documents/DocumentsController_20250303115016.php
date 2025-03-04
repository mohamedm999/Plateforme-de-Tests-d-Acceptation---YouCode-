<?php

namespace App\Http\Controllers\Candidate\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class DocumentsController extends Controller
{

    public function index()
    {
        $documents = Document::where('user_id', Auth::id())->latest()->get();
        return view('candidate.documents.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'document' => 'required|file|max:10240',
            'type' => 'required|in:identity,certificate,other',
        ]);

        // Make sure to use the correct input name
        $file = $request->file('document');
        $path = $file->store('documents');

        // Generate a UUID for the document ID if your model requires it
        $documentId = (string) Str::uuid();

        $document = Document::create([
            'id' => $documentId, // Add this if using UUID as primary key
            'user_id' => Auth::id(),
            'file_path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'type' => $request->input('type'),
            'status' => 'pending',
        ]);



        if ($document) {
            return redirect()->route('candidate.documents.index')->with('success', 'Document uploaded successfully');
        }else{
            return redirect()->route('candidate.documents.index')->with('error', 'Document not uploaded');
        }
    }

}

