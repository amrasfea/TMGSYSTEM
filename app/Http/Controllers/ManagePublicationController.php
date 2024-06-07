<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Platinum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ManagePublicationController extends Controller
{
    public function __construct()
    {
        // Middleware for authentication can be added here
    }

    public function index()
    {
        $platinum = Platinum::where('id', Auth::id())->first();
        $publications = $platinum ? $platinum->publications : [];
        return view('ManagePublicationView.Platinum.MyPublication', compact('publications'));
    }

    /**
     * Show the form for creating new publication
     */

    public function create()
    {
        return view('ManagePublicationView.Platinum.AddPublication');
    }

    /**
     * Store a newly created publication in storage
     */

    public function store(Request $request)
    {
        
        $publication_data = $request->validate([
            'PB_Type' => 'required|string|max:255',
            'PB_Title' => 'required|string|max:255',
            'PB_Author' => 'required|string|max:255',
            'PB_Uni' => 'required|string|max:255',
            'PB_Course' => 'required|string|max:255',
            'PB_Page' => 'required|integer',
            'PB_Detail' => 'required|string|max:255',
            'PB_Date' => 'required|date',
            'file_path' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        // Handle file upload

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $path = $file->store('public/documents'); // Store the file and get the path

            // Save the path to the database
                $publication_data['file_path'] = $path;
        }
        
         Publication::create($publication_data);
                    
         return redirect()->route('publications.index')->with('success', 'Publication added successfully.');
         }
            
    
    /**
     * 
     *  Show the form for editing the specified resource
     */

    public function edit($PB_ID)
    {
        $publication = Publication::where('PB_ID', $PB_ID)->first();
        return view('ManagePublicationView.Platinum.EditPublication')->with('publication',$publication);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $PB_ID)
    {
        $publication_data = $request->validate([
            'PB_Type' => 'required|string|max:255',
            'PB_Title' => 'required|string|max:255',
            'PB_Author' => 'required|string|max:255',
            'PB_Uni' => 'required|string|max:255',
            'PB_Course' => 'required|string|max:255',
            'PB_Page' => 'required|integer',
            'PB_Detail' => 'required|string|max:255',
            'PB_Date' => 'required|date',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        // Handle file upload
        if ($request->hasFile('file_path')) 
        {
            $file = $request->file('file_path');
            $path = $file->store('public/documents'); // Store the file and get the path

            // Save the path to the database
            $publication_data['file_path'] = $path;
        }

        Publication::where('PB_ID', $PB_ID)->update($publication_data);

        return redirect()->route('publications.index')->with('success', 'Publication updated successfully.');
    }

    /**
     * Remove the specified publication from storage
     */

    public function destroy($PB_ID)
    {
        Publication::where('PB_ID', $PB_ID)->delete();
        return redirect()->route('publications.index')->with('success', 'Publication deleted successfully.');
    }

    public function show($PB_ID)
    {
        $publication = Publication::where('PB_ID', $PB_ID)->firstOrFail();
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
