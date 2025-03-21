<?php
namespace App\Http\Controllers\Condidate;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CandidateController extends Controller
{

    public function index()
    {
        return view('candidate/dashboard');
    }



    // public function create()
    // {
    //     return view('candidates.create');
    // }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:candidates',
    //         'phone' => 'required|string|max:20',
    //         // Add other validation rules as needed
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     Candidate::create($request->all());

    //     return redirect()->route('candidates.index')->with('success', 'Candidate created successfully');
    // }


    // public function show($id)
    // {
    //     $candidate = Candidate::findOrFail($id);
    //     return view('candidates.show', compact('candidate'));
    // }


    // public function edit($id)
    // {
    //     $candidate = Candidate::findOrFail($id);
    //     return view('candidates.edit', compact('candidate'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:candidates,email,'.$id,
    //         'phone' => 'required|string|max:20',
    //         // Add other validation rules as needed
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $candidate = Candidate::findOrFail($id);
    //     $candidate->update($request->all());

    //     return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully');
    // }


    // public function destroy($id)
    // {
    //     $candidate = Candidate::findOrFail($id);
    //     $candidate->delete();

    //     return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully');
    // }
}
