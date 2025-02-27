<?php

namespace App\Http\Controllers\Candidate\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DocumentsController extends Controller
{

        public function index()
        {
            $user = Auth::user();

            dd($user);

           $documents = $user->documents;

            return view('candidate.documents.index', compact('documents'));
        }
}




