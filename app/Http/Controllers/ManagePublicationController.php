<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Platinum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class ManagePublicationController extends Controller
{
    // Display the list of publications for the currently authenticated user
    public function index()
    {
        $publications = Publication::where('P_platinumID', Auth::id())->get();
        return view('ManagePublicationView.Platinum.MyPublication', compact('publications'));
    }

    // Show the form to create a new publication
    public function create()
    {
        return view('ManagePublicationView.Platinum.AddPublication');
    }

    // Store a new publication in the database
    public function store(Request $request)
    {
        

        // Validate the incoming request data
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

        // Handle file upload
        if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('publications', $fileName, 'public');


                // Create a new publication record in the database
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
                    'P_platinumID' => Auth::id(), // Associate the publication with the currently authenticated user
                ]);

                return redirect()->route('publications.index')->with('success', 'Publication added successfully.');
            } 
        } 

    // Display all publications (for admin or general view)
    public function viewPublications()  
    {
        $publications = Publication::all();
        return view('ManagePublicationView.Platinum.ViewPublication', compact('publications'));
    }

    // Show a single publication details
    public function show($id, Request $request)
    {
        $publication = Publication::findOrFail($id);
        $backUrl = $request->input('backUrl', route('publications.viewAll')); // Default to viewAll if not provided
        return view('ManagePublicationView.Platinum.ShowPublicationView', compact('publication', 'backUrl'));
    }


    // Show the form to edit an existing publication
    public function edit($id)
    {
        $publication = Publication::findOrFail($id);
        return view('ManagePublicationView.Platinum.EditPublication', compact('publication'));
    }

    // Update an existing publication in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
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

        // Handle file upload if a new file is provided
        if ($request->hasFile('file')) {
            Storage::delete($filePath);
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('publications', $fileName, 'public');
        }

        // Update the publication record in the database
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

    // Delete an existing publication from the database
    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        Storage::delete($publication->file_path);
        $publication->delete();

        return redirect()->route('publications.index')->with('success', 'Publication deleted successfully.');
    }

    // Search for publications based on a query
    public function search(Request $request)
    {
        $query = $request->input('query');
        $publications = Publication::where('PB_Title', 'like', "%{$query}%")
                        ->orWhere('PB_Detail', 'like', "%{$query}%")
                        ->get();
        return view('ManagePublicationView.Platinum.SearchPublication', compact('publications', 'query'));
    }

    public function viewPlatinumList()
    {
        $platinums = Platinum::all();
        return view('ManagePublicationView.Mentor.ViewPlatinum', compact('platinums'));
    }

    public function viewPlatinumPublications($id)
    {
        $publications = Publication::where('P_platinumID', $id)->get();
        return view('ManagePublicationView.Mentor.PlatinumPublication', compact('publications'));
    }

    public function viewPublicationDetails($id)
    {

        $publication = Publication::findOrFail($id);
        return view('ManagePublicationView.Mentor.ViewPublication', compact('publication'));

    }

    public function mentorSearch(Request $request)
    {
    $query = $request->input('query');
    $publications = Publication::where('PB_Title', 'like', "%{$query}%")
                    ->orWhere('PB_Detail', 'like', "%{$query}%")
                    ->get();
    return view('ManagePublicationView.Mentor.SearchPublication', compact('publications', 'query'));
    }


   

}

