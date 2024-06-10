<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Platinum;
use App\Models\User;
use App\Models\ExpertDomain;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Log;  // Import Log facade


class ManagePublicationController extends Controller
{
    // Display the list of publications for the currently authenticated user
    public function index()
    {
        $publications = Publication::where('P_platinumID', Auth::id())->get();
        return view('ManagePublicationView.Platinum.MyPublication', compact('publications'));
    }


    // Show the form to create a new publication
    // Add this in your create() method in the controller to pass expert domains to the view
public function create()
{
    $expertDomains = ExpertDomain::all();
    return view('ManagePublicationView.Platinum.AddPublication', compact('expertDomains'));
}

    // Store a new publication in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'type-of-publication' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'page-number' => 'required|integer',
            'detail' => 'required|string|max:255',
            'date-of-published' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10485760',
            'expert-domain' => 'required|exists:expertDomains,ED_ID',
        ]);
    
        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('publications', $fileName, 'public');
        }
    
        // Get the currently logged-in user
        $loggedInUser = Auth::user();
        Log::info('Authenticated User ID: ' . $loggedInUser->id);

    
        // Ensure the logged-in user is a Platinum user
        if ($loggedInUser->roleType !== 'Platinum') {
            Log::error('User is not a Platinum user.');
            return redirect()->back()->withErrors(['user' => 'The current user is not a Platinum user.']);
        }
    
        // Fetch the platinum user details
        $platinum = Platinum::where('id', $loggedInUser->id)->first();
        if (!$platinum) {
            Log::error('No platinum user found for user ID: ' . $loggedInUser->id);
            return redirect()->back()->withErrors(['platinum' => 'No platinum user found for the current user.']);
        }
    
        // Prepare data for publication creation
        $data['P_platinumID'] = $loggedInUser->id; // Associate the publication with the platinum user ID
        $data['ED_ID'] = $request->input('expert-domain');  // Save expert domain ID
        $data['PB_Type'] = $request->input('type-of-publication'); 
        $data['PB_Title'] = $request->input('title'); 
        $data['PB_Author'] = $request->input('author'); 
        $data['PB_Uni'] = $request->input('university'); 
        $data['PB_Course'] = $request->input('field');
        $data['PB_Page'] = $request->input('page-number'); 
        $data['PB_Detail'] = $request->input('detail'); 
        $data['PB_Page'] = $request->input('page-number'); 
        $data['PB_Date'] = $request->input('date-of-published');
        $data['file_path'] = $filePath;
    
        // Create a new publication record in the database
        Publication::create($data);
    
        return redirect()->route('publications.index')->with('success', 'Publication added successfully.');
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
        $publication = Publication::with('expertDomain')->findOrFail($id);
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

    public function showReportForm()
    {
        return view('ManagePublicationView.Mentor.ReportForm');
    }

    // Generate PDF report based on search criteria
    public function generatePdfReport(Request $request)
    {
        $query = Publication::query();

        if ($request->has('title')) {
            $query->where('PB_Title', 'like', '%' . $request->title . '%');
        }

        if ($request->has('author')) {
            $query->where('PB_Author', 'like', '%' . $request->author . '%');
        }

        if ($request->has('university')) {
            $query->where('PB_Uni', 'like', '%' . $request->university . '%');
        }

        $publications = $query->get();

        $pdf = FacadePdf::loadView('ManagePublicationView.Mentor.PublicationReport', compact('publications'));

        return $pdf->download('publication_report.pdf');
    }
}


   



