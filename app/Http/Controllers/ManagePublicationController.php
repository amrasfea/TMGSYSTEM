<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Platinum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ManagePublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $platinum = Platinum::where('id', Auth::id())->first();
        $publications = $platinum ? $platinum->publications : [];
        return view('ManagePublicationView.Platinum.MyPublication', compact('publications'));
    }

    public function create()
    {
        return view('ManagePublicationView.Platinum.AddPublication');
    }

    public function store(Request $request)
    {
        // Log that store method is called
        Log::info('Store method called');

        // Validate the request
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

        // Check if file is present in the request
        if ($request->hasFile('file')) {
            // Log that file is present
            Log::info('File is present');

            try {
                // Store the file on the public disk
                $filePath = $request->file('file')->store('publications', 'public');
                
                // Log the file path
                Log::info('File stored at: ' . $filePath);

                // Get the authenticated user's platinum record
                $platinum = Platinum::where('id', Auth::id())->first();

                // If platinum record is not found, redirect back with error
                if (!$platinum) {
                    Log::error('Platinum record not found');
                    return redirect()->back()->with('error', 'Platinum record not found.');
                }

                // Create the publication record
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
                    'P_platinumID' => $platinum->P_platinumID,
                ]);

                // Redirect with success message
                return redirect()->route('publications.index')->with('success', 'Publication added successfully.');
            } catch (\Exception $e) {
                // Log any errors
                Log::error('File upload error: ' . $e->getMessage());
                // Redirect back with error message
                return redirect()->back()->with('error', 'File upload failed.');
            }
        } else {
            // Log error if file is not found in request
            Log::error('File not found in request');
            // Redirect back with error message
            return redirect()->back()->with('error', 'File upload failed.');
        }
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
            Storage::disk('public')->delete($filePath);
            $filePath = $request->file('file')->store('publications', 'public');
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
        Storage::disk('public')->delete($publication->file_path);
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
