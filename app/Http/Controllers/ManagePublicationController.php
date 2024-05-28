<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManagePublicationController extends Controller
{
    // Display the user's own publications
    public function index()
    {
        $publications = Publication::where('id', auth()->id())->get();
        return view('ManagePublicationView.Platinum.OwnPublicationView', compact('publications'));
    }

    // Show the form for creating a new publication
    public function create()
    {
        return view('ManagePublicationView.Platinum.AddPublicationView');
    }

    // Store a newly created publication in storage
    public function store(Request $request)
    {
        $request->validate([
            'type-of-publication' => 'required',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'keyword' => 'required|string|max:255',
            'date-of-published' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = $request->file('file')->store('publications', 'public');

        Publication::create([
            'ED_ID' => $request->input('ED_ID'), // Assuming you have ED_ID in your form
            'PB_Type' => $request->input('type-of-publication'),
            'PB_Title' => $request->input('title'),
            'PB_Author' => $request->input('author'),
            'PB_Uni' => $request->input('university'),
            'PB_Course' => $request->input('field'),
            'PB_Page' => $request->input('pages'), // Assuming you have pages in your form
            'PB_Detail' => $request->input('details'), // Assuming you have details in your form
            'PB_Date' => $request->input('date-of-published'),
            'id' => auth()->id(), // Assuming the currently authenticated user
            'file_path' => $filePath,
        ]);

        return redirect()->route('platinum.ownPublications')->with('success', 'Publication added successfully.');
    }

    // Show the form for editing the specified publication
    public function edit($id)
    {
        $publication = Publication::findOrFail($id);

        return view('ManagePublicationView.Platinum.EditPublicationView', compact('publication'));
    }

    // Update the specified publication in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'type-of-publication' => 'required',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'keyword' => 'required|string|max:255',
            'date-of-published' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $publication = Publication::findOrFail($id);

        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            if ($publication->file_path) {
                Storage::disk('public')->delete($publication->file_path);
            }

            // Store the new file
            $filePath = $request->file('file')->store('publications', 'public');
            $publication->file_path = $filePath;
        }

        $publication->update([
            'PB_Type' => $request->input('type-of-publication'),
            'PB_Title' => $request->input('title'),
            'PB_Author' => $request->input('author'),
            'PB_Uni' => $request->input('university'),
            'PB_Course' => $request->input('field'),
            'PB_Page' => $request->input('pages'), // Assuming you have pages in your form
            'PB_Detail' => $request->input('details'), // Assuming you have details in your form
            'PB_Date' => $request->input('date-of-published'),
        ]);

        return redirect()->route('platinum.ownPublications')->with('success', 'Publication updated successfully.');
    }

    // Remove the specified publication from storage
    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);

        // Delete the file if it exists
        if ($publication->file_path) {
            Storage::disk('public')->delete($publication->file_path);
        }

        $publication->delete();

        return redirect()->route('platinum.ownPublications')->with('success', 'Publication deleted successfully.');
    }
}


