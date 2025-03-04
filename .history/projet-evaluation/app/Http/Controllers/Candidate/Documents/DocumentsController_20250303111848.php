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
            'file' => 'required|file|max:10240',
        ]);

        $path = $request->file('file')->store('documents');

        Document::create([
            'user_id' => Auth::id(),
            'path' => $path,
            'name' => $request->file('file')->getClientOriginalName(),
            'size' => $request->file('file')->getSize(),
        ]);

        return redirect()->route('documents.index');
    }

}

