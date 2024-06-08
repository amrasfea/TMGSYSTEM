<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Platinum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ManagePublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::where('P_platinumID', Auth::id())->get();
        return view('ManagePublicationView.Platinum.MyPublication', compact('publications'));
    }

    public function create()
    {
        return view('ManagePublicationView.Platinum.AddPublication');
    }

    public function store(Request $request)
    {
        Log::info('Store method called');

        $request->validate([
            'type-of-publication' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'page-number' => 'required|integer',
            'detail' => 'required|string|max:255',
            'date-of-published' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10485760',
        ]);

        if ($request->hasFile('file')) {
            Log::info('File is present');

            try {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('publications', $fileName, 'public');

                Log::info('File stored at: ' . $filePath);

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
                    'P_platinumID' => Auth::id(),
                ]);

                return redirect()->route('publications.index')->with('success', 'Publication added successfully.');
            } catch (\Exception $e) {
                Log::error('File upload error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'File upload failed.');
            }
        } 
    }

    public function viewPublications()  
    {
        $publications = Publication::all();
        return view('ManagePublicationView.Platinum.ViewPublication', compact('publications'));
    }


    public function show($id)
    {
        $publication = Publication::findOrFail($id);
        return view('ManagePublicationView.Platinum.ShowPublicationView', compact('publication'));
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
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10485760',
        ]);

        $publication = Publication::findOrFail($id);
        $filePath = $publication->file_path;

        if ($request->hasFile('file')) {
            Storage::delete($filePath);
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('publications', $fileName, 'public');
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

    public function search(Request $request)
    {
       $query = $request->input('query');
       Log::info('Search query: ' . $query);
       $publications = Publication::where('PB_Title', 'like', "%{$query}%")
                        ->orWhere('PB_Detail', 'like', "%{$query}%")
                        ->get();
        return view('ManagePublicationView.Platinum.SearchPublication', compact('publications', 'query'));
   }


   
}
