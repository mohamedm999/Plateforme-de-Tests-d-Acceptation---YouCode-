<?php

namespace App\Http\Controllers\Candidate\Documents;


class DocumentsController extends Controller
{
    /**
     * Display a listing of the candidate's documents.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $documents = $user->documents;
        
        return view('candidate.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new document.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidate.documents.create');
    }

    /**
     * Store a newly created document in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|max:10240', // 10MB max
        ]);

        $file = $request->file('file');
        $path = $file->store('documents/'.Auth::id());

        $document = Auth::user()->documents()->create([
            'title' => $request->title,
            'path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
        ]);

        return redirect()->route('candidate.documents.index')
            ->with('success', 'Document uploaded successfully');
    }

    /**
     * Display the specified document.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Auth::user()->documents()->findOrFail($id);
        
        return view('candidate.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified document.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Auth::user()->documents()->findOrFail($id);
        
        return view('candidate.documents.edit', compact('document'));
    }

    /**
     * Update the specified document in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function
