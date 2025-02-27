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
