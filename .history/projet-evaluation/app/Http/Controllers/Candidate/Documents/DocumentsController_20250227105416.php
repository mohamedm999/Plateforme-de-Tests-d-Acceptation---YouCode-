<?php

namespace App\Http\Controllers\Candidate\Documents;

use App\Http\Controllers\Controller;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the candidate's documents.
     *
     * @return \Illuminate\Http\Response
        public function index()
        {
            $user = \Auth::user();
            $documents = $user->documents;
            $documents = $user->documents;
    
            return view('candidate.documents.index', compact('documents'));
        }
    }




