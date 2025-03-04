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
            'document' => 'required|file|max:10240', // 10MB max
            'type' => 'required|in:identity,certificate,other',
        ]);

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            // Create a unique filename
            $filename = Str::uuid() . '.' . $extension;

            // Store file in private storage
            $path = $file->storeAs('documents', $filename, 'private');

            // Create document record in database
            $document = new Document();
            $document->id = Str::uuid();
            $document->user_id = Auth::id();
            $document->type = $request->type;
            $document->file_path = $path;
            $document->original_name = $originalName;
            $document->status = 'pending';
            $document->save();

            return redirect()->route('candidate.documents.index')->with('success', 'Document uploaded successfully and is pending review.');
        }

        return redirect()->back()->with('error', 'Failed to upload document.');
    }

    /**
     * Download a document.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $document = Document::where('user_id', Auth::id())->findOrFail($id);

        if (!Storage::disk('private')->exists($document->file_path)) {
            return redirect()->back()->with('error', 'File not found.');
        }

        $file = Storage::disk('private')->get($document->file_path);
        $type = Storage::disk('private')->mimeType($document->file_path);
        
        return response($file, 200)
            ->header('Content-Type', $type)
            ->header('Content-Disposition', 'attachment; filename="'.$document->original_name.'"');
    }

    /**
     * Preview a document.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function preview($id)
    {
        $document = Document::where('user_id', Auth::id())->findOrFail($id);

        if (!Storage::disk('private')->exists($document->file_path)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        $extension = pathinfo($document->file_path, PATHINFO_EXTENSION);
        $type = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'pdf';

        // Generate a temporary URL for the file
        $url = route('candidate.documents.stream', $document->id);

        return response()->json([
            'type' => $type,
            'url' => $url,
        ]);
    }

    /**
     * Stream a document (for preview).
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
    public function stream($id)
    {
        $document = Document::where('user_id', Auth::id())->findOrFail($id);

        if (!Storage::disk('private')->exists($document->file_path)) {
            abort(404);
        }

        $file = Storage::disk('private')->get($document->file_path);
        $path = Storage::disk('private')->path($document->file_path);
        $type = mime_content_type($path);

        return response($file, 200)->header('Content-Type', $type);
    }
    }

    /**
     * Remove the specified document.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::where('user_id', Auth::id())->findOrFail($id);

        // Only allow deletion of pending documents
        if ($document->status !== 'pending') {
            return redirect()->back()->with('error', 'Only pending documents can be deleted.');
        }

        // Delete file from storage
        if (Storage::disk('private')->exists($document->file_path)) {
            Storage::disk('private')->delete($document->file_path);
        }

        // Delete record from database
        $document->delete();

        return redirect()->route('candidate.documents.index')->with('success', 'Document deleted successfully.');
    }
}
