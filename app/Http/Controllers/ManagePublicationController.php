<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ManagePublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $publications = Publication::where('user_id', Auth::id())->get();
        return view('ManagePublicationView.Platinum.OwnPublicationView', compact('publications'));
    }

    public function create()
    {
        return view('ManagePublicationView.Platinum.AddPublicationView');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type-of-publication' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'keyword' => 'required|string|max:255',
            'date-of-published' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = $request->file('file')->store('publications');

        Publication::create([
            'PB_Type' => $request->input('type-of-publication'),
            'PB_Title' => $request->input('title'),
            'PB_Author' => $request->input('author'),
            'PB_Uni' => $request->input('university'),
            'PB_Course' => $request->input('field'),
            'PB_Keyword' => $request->input('keyword'),
            'PB_Date' => $request->input('date-of-published'),
            'file_path' => $filePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('platinum.ownPublications')->with('success', 'Publication added successfully.');
    }

    public function edit($id)
    {
        $publication = Publication::findOrFail($id);
        return view('ManagePublicationView.Platinum.EditPublicationView', compact('publication'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type-of-publication' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'keyword' => 'required|string|max:255',
            'date-of-published' => 'required|date',
            'file' => 'sometimes|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $publication = Publication::findOrFail($id);
        $filePath = $publication->file_path;

        if ($request->hasFile('file')) {
            Storage::delete($filePath);
            $filePath = $request->file('file')->store('publications');
        }

        $publication->update([
            'PB_Type' => $request->input('type-of-publication'),
            'PB_Title' => $request->input('title'),
            'PB_Author' => $request->input('author'),
            'PB_Uni' => $request->input('university'),
            'PB_Course' => $request->input('field'),
            'PB_Keyword' => $request->input('keyword'),
            'PB_Date' => $request->input('date-of-published'),
            'file_path' => $filePath,
        ]);

        return redirect()->route('platinum.ownPublications')->with('success', 'Publication updated successfully.');
    }

    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        Storage::delete($publication->file_path);
        $publication->delete();

        return redirect()->route('platinum.ownPublications')->with('success', 'Publication deleted successfully.');
    }
}
