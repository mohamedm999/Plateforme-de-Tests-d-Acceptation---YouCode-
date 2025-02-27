<?php

namespace App\Http\Controllers\Candidate\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $documents = $user->documents;

        return view('candidate.documents.index', compact('documents'));
    }

    public function uploadIdDocument(Request $request)
    {
        $request->validate([


