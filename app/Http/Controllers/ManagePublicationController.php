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
        
    }

    public function index()
    {
        $publications = Publication::where('user_id', Auth::id())->get();
        return view('ManagePublicationView.Platinum.MyPublication', compact('publications'));
    }

    public function create()
    {
        return view('ManagePublicationView.Platinum.AddPublication');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type-of-publication' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'page-number' => 'required|integer',
            'detail' => 'required|string|max:255',
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
            'PB_Page' => $request->input('page-number'),
            'PB_Detail' => $request->input('detail'),
            'PB_Date' => $request->input('date-of-published'),
            'file_path' => $filePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('publications.index')->with('success', 'Publication added successfully.');
    }

    public function edit($id)
    {
        $publication = Publication::findOrFail($id);
        return view('ManagePublicationView.Platinum.EditPublication', compact('publication'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type-of-publication' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'page-number' => 'required|integer',
            'detail' => 'required|string|max:255',
            'date-of-published' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
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
            'PB_Page' => $request->input('page-number'),
            'PB_Detail' => $request->input('detail'),
            'PB_Date' => $request->input('date-of-published'),
            'file_path' => $filePath,
        ]);

        return redirect()->route('publications.index')->with('success', 'Publication updated successfully.');
    }

    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        Storage::delete($publication->file_path);
        $publication->delete();

        return redirect()->route('publications.index')->with('success', 'Publication deleted successfully.');
    }

    public function show($id)
    {
        $publication = Publication::findOrFail($id);
        return view('ManagePublicationView.Platinum.ViewPublication', compact('publication'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $publications = Publication::where('PB_Title', 'like', "%{$query}%")
                            ->orWhere('PB_Detail', 'like', "%{$query}%")
                            ->get();

        return view('ManagePublicationView.Platinum.SearchPublication', compact('publications'));
    }
}
