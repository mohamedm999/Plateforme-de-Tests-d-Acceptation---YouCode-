<?php

namespace App\Http\Controllers\Candidate\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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

            dd0
           $documents = $user->documents;

            return view('candidate.documents.index', compact('documents'));
        }
}




