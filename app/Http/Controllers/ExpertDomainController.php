<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpertDomain;
use App\Models\Research; 
use App\Models\Publication;
use App\Models\Platinum;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ExpertDomainController extends Controller
{
    //function to Add ExpertDomain
    public function AddExpertDomainView() {
        //to display Add interface
        return view('ExpertDomainView.Platinum.AddExpertDomainView');
    }
    
    //function to store data expert domain
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'ED_Name' => 'required|string',
            'ED_Uni' => 'required|string',
            'ED_Email' => 'required|string',
            'ED_PhoneNum' => 'required|string',
            'ED_address' => 'required|string',
            'ED_fbname' => 'required|string',
            'ED_edu_level' => 'required|string',
            'ED_edu_field' => 'required|string',
            'ED_occupation' => 'required|string',
            'ED_sponsorship' => 'required|string',
            'ED_gender' => 'required|string',
            'E_title' => 'required|string',
        ]);

        // Get the currently logged-in user
        $loggedInUser = Auth::user();

        // Fetch the user by email
        $user = User::where('email', $loggedInUser->email)->first();

        if ($user) {
            // Set p_platinumID to the user's ID
            $data['p_platinumID'] = $user->id;
        } else {
            // Handle the case where the user is not found
            return redirect()->back()->withErrors(['ED_Email' => 'User with this email not found.']);
        }

        // Automatically set M_mentorID to 1
        $data['M_mentorID'] = '1';

        // Create the new ExpertDomain entry
        ExpertDomain::create($data);

        // Redirect to the list route with a success message
        return redirect()->route('expertDomains.list')->with('success', 'Expert Domain Information added successfully!');
    }
    //function to delete expert domain
    public function destroy($ED_ID)
    {
        // Find the ExpertDomain record by ED_ID
        $expertDomain = ExpertDomain::findOrFail($ED_ID);

        // Delete the record
        $expertDomain->delete();

        // Redirect back with a success message
        return redirect()->route('expertDomains.list')->with('success', 'Expert Domain Information deleted successfully!');
    }
    //function to edit expert domain details
    public function UpdateExpertDomainView($ED_ID)
    {
        $expertDomain = ExpertDomain::findOrFail($ED_ID);
        return view('ExpertDomainView.Platinum.UpdateExpertDomainView', compact('expertDomain'));
    }
    //function to update the edited expert domains details
    public function update(Request $request, $ED_ID)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'ED_Name' => 'required|string',
            'ED_Uni' => 'required|string',
            'ED_Email' => 'required|string',
            'ED_PhoneNum' => 'required|string',
            'ED_address' => 'required|string',
            'ED_fbname' => 'required|string',
            'ED_edu_level' => 'required|string',
            'ED_edu_field' => 'required|string',
            'ED_occupation' => 'required|string',
            'ED_sponsorship' => 'required|string',
            'ED_gender' => 'required|string',
            'E_title' => 'required|string',
        ]);

        // Find the ExpertDomain record by ED_ID
        $expertDomain = ExpertDomain::findOrFail($ED_ID);

        // Update the record with the new data
        $expertDomain->update($data);

        // Redirect to the list route with a success message
        return redirect()->route('expertDomains.list')->with('success', 'Expert Domain Information updated successfully!');
    }
    //function to view the expert domain details
    public function view($id)
    {
        $expertDomain = ExpertDomain::findOrFail($id);
        return view('ExpertDomainView.Platinum.DisplayExpertDomainDetailsView', compact('expertDomain'));
    }

    //function to list own expert domain for the current platinum user
    public function ListExpertDomainView(Request $request){
        $userId = Auth::id(); // Get the currently authenticated user's ID
        $query = $request->input('search');
        
        if ($query) {
            // Search the expert domains by name for the current user
            $expertDomains = ExpertDomain::where('p_PlatinumID', $userId)
                                         ->where('ED_Name', 'LIKE', '%' . $query . '%')
                                         ->get();
        } else {
            // If no search query, get all expert domains for the current user
            $expertDomains = ExpertDomain::where('p_PlatinumID', $userId)->get();
        }
    
        return view('ExpertDomainView.Platinum.ListExpertDomainView', compact('expertDomains'));
    }
    //function to liss all expert domain that have been added by all platinum
    public function ListAllExpertDomainView(Request $request){
        $query = $request->input('search');
        
        if ($query) {
            // Search the expert domains by name
            $expertDomains = ExpertDomain::where('ED_Name', 'LIKE', '%' . $query . '%')->get();
        } else {
            // If no search query, get all expert domains
            $expertDomains = ExpertDomain::all();
        }
    
        return view('ExpertDomainView.Platinum.ListAllExpertDomainView', compact('expertDomains'));
    }
    


    public function AddResearchPublicationView($ED_ID)
{
    $expertDomain = ExpertDomain::find($ED_ID);

    if (!$expertDomain) {
        return redirect()->route('expertDomains.list')->with('error', 'User not found.');
    }

    return view('ExpertDomainView.Platinum.AddResearchPublicationView', compact('expertDomain'));
}
//function to store research and publication data
public function storeResearchPublication(Request $request)
{
    $data = $request->validate([
        'ED_ID' => 'required|exists:expertdomains,ED_ID',
        'R_title' => 'required|string',
        'PB_Type' => 'required|string',
        'PB_Title' => 'required|string',
        'PB_Author' => 'required|string',
        'PB_Uni' => 'required|string',
        'PB_Page' => 'required|integer',
        'PB_Detail' => 'required|string',
        'PB_Date' => 'required|date',
    ]);

    $userId = Auth::id();

    if (!User::where('id', $userId)->exists()) {
        return redirect()->route('expertDomains.list')->with('error', 'User does not have a corresponding Platinum record.');
    }

    $research = new Research();
    $research->R_title = $data['R_title'];
    $research->ED_ID = $data['ED_ID'];
    $research->save();

    $publication = new Publication();
    $publication->P_platinumID = $userId;
    $publication->ED_ID = $data['ED_ID'];
    $publication->PB_Type = $data['PB_Type'];
    $publication->PB_Title = $data['PB_Title'];
    $publication->PB_Author = $data['PB_Author'];
    $publication->PB_Uni = $data['PB_Uni'];
    $publication->PB_Page = $data['PB_Page'];
    $publication->PB_Detail = $data['PB_Detail'];
    $publication->PB_Date = $data['PB_Date'];
    $publication->save();

    return redirect()->route('researchPublications.display', ['ED_ID' => $request->input('ED_ID')])->with('success', 'Research and Publication added successfully!');
}
//function to display research and publication details
public function displayResearchPublication($ED_ID)
{
    $expertDomain = ExpertDomain::findOrFail($ED_ID);

    // Retrieve research and publication data based on the ED_ID
    $research = Research::where('ED_ID', $ED_ID)->first();
    $publication = Publication::where('ED_ID', $ED_ID)->first();

    if (!$research || !$publication) {
        return redirect()->route('expertDomains.list')->with('error', 'Research or Publication not found.');
    }

    return view('ExpertDomainView.Platinum.DisplayResearchPublicationView', compact('expertDomain', 'research', 'publication'));
}
//function to list research and publication that have been added
public function ListResearchPublication(Request $request)
{
    // Get the current logged-in user
    $currentUser = auth()->user();

    // Fetching all expert domains along with their research and publications for the current user
    $query = ExpertDomain::with(['research', 'publications'])
        ->where('P_platinumID', $currentUser->id);

    // Apply search filter if search query is present
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->whereHas('research', function ($q) use ($search) {
            $q->where('R_title', 'LIKE', '%' . $search . '%');
        });
    }

    $expertDomains = $query->get();

    // Returning the view with the fetched data
    return view('ExpertDomainView.Platinum.ListResearchPublication', compact('expertDomains'));
}
//function to edit research and publication
public function editResearchPublication($ED_ID, $id)
{
    $expertDomain = ExpertDomain::findOrFail($ED_ID);
    $research = Research::where('ED_ID', $ED_ID)->where('id', $id)->first();
    $publication = Publication::where('ED_ID', $ED_ID)->where('id', $id)->first();

    if (!$research || !$publication) {
        return redirect()->route('researchPublications.view', ['id' => $ED_ID])->with('error', 'Research or Publication not found.');
    }

    return view('ExpertDomainView.Platinum.EditResearchPublicationView', compact('expertDomain', 'research', 'publication'));
}
//function to update research and publication
public function updateResearchPublication(Request $request, $ED_ID, $id)
{
    $data = $request->validate([
        'R_title' => 'required|string',
        'PB_Type' => 'required|string',
        'PB_Title' => 'required|string',
        'PB_Author' => 'required|string',
        'PB_Uni' => 'required|string',
        'PB_Page' => 'required|integer',
        'PB_Detail' => 'required|string',
        'PB_Date' => 'required|date',
    ]);

    $research = Research::where('ED_ID', $ED_ID)->where('id', $id)->first();
    $publication = Publication::where('ED_ID', $ED_ID)->where('id', $id)->first();

    if (!$research || !$publication) {
        return redirect()->route('researchPublications.view', ['id' => $ED_ID])->with('error', 'Research or Publication not found.');
    }

    $research->update(['R_title' => $data['R_title']]);
    $publication->update([
        'PB_Type' => $data['PB_Type'],
        'PB_Title' => $data['PB_Title'],
        'PB_Author' => $data['PB_Author'],
        'PB_Uni' => $data['PB_Uni'],
        'PB_Page' => $data['PB_Page'],
        'PB_Detail' => $data['PB_Detail'],
        'PB_Date' => $data['PB_Date'],
    ]);

    return redirect()->route('researchPublications.view', ['id' => $ED_ID])->with('success', 'Research and Publication updated successfully!');
}
//function to delete research and publication
public function destroyResearchPublication($ED_ID, $id)
{
    $research = Research::where('ED_ID', $ED_ID)->where('id', $id)->first();
    $publication = Publication::where('ED_ID', $ED_ID)->where('id', $id)->first();

    if ($research) {
        $research->delete();
    }

    if ($publication) {
        $publication->delete();
    }

    return redirect()->route('researchPublications.view', ['id' => $ED_ID])->with('success', 'Research and Publication deleted successfully!');
}

    //function to generate report
    public function GenerateReport(){
        return view('ExpertDomainView.Platinum.GenerateReport');
    }
    //function to display the generate report
    public function GenerateReportSubmit(Request $request)
{
    // Validate the request data
    $data = $request->validate([
        'report_type' => 'required|string',
        'report_date' => 'required|date',
        'expertise' => 'required|string',
    ]);

    // Fetch expert domains based on the selected expertise
    $expertDomains = ExpertDomain::where('ED_edu_field', $data['expertise'])->get();

    // Pass the data and expert domains to the view
    return view('ExpertDomainView.Platinum.ReportResult', compact('data', 'expertDomains'));
}

// Mentor view all expert domains
public function MentorListAllExpertDomainView(Request $request){
    $query = $request->input('search');
    
    if ($query) {
        // Search the expert domains by name
        $expertDomains = ExpertDomain::where('ED_Name', 'LIKE', '%' . $query . '%')->get();
    } else {
        // If no search query, get all expert domains
        $expertDomains = ExpertDomain::all();
    }

    return view('ExpertDomainView.Mentor.ViewSearchPlatinumExpertDomain', compact('expertDomains'));
}

// Mentor view specific expert domain details
public function MentorViewExpertDomainDetails($id)
{
    $expertDomain = ExpertDomain::findOrFail($id);
    return view('ExpertDomainView.Mentor.ViewDetails', compact('expertDomain'));
}

}
