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

        $file = $request->file('document');
        $path = $file->store('documents');


        $document = Document::create([
            'user_id' => Auth::id(),
            'file_path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'type' => $request->input('type'),
            'status' => 'pending',
        ]);



        if ($document) {
            return redirect()->route('documents.index')->with('success', 'Document uploaded successfully');
        }else{
            return redirect()->route('documents.index')->with('error', 'Document not uploaded');
        }
    }


    public function download(Document $document)
    {
        return Storage::download($document->file_path, $document->original_name);
    }


    public function preview(Document $document)
    {
        return view('candidate.documents.preview', compact('document'));
    }


    public function stream(Document $document)
    {
        return Storage::response($document->file_path);
    }

}

