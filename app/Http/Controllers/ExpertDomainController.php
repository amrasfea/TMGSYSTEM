<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpertDomain;
use App\Models\Research; 
use App\Models\Publication;
use App\Models\Platinum;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ExpertDomainController extends Controller
{
    public function AddExpertDomainView() {
        
        return view('ExpertDomainView.Platinum.AddExpertDomainView');
    }
    
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

    public function destroy($ED_ID)
    {
        // Find the ExpertDomain record by ED_ID
        $expertDomain = ExpertDomain::findOrFail($ED_ID);

        // Delete the record
        $expertDomain->delete();

        // Redirect back with a success message
        return redirect()->route('expertDomains.list')->with('success', 'Expert Domain Information deleted successfully!');
    }

    public function UpdateExpertDomainView($ED_ID)
    {
        $expertDomain = ExpertDomain::findOrFail($ED_ID);
        return view('ExpertDomainView.Platinum.UpdateExpertDomainView', compact('expertDomain'));
    }

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

    public function ListExpertDomainView(){
        $expertDomains = ExpertDomain::all();
        return view('ExpertDomainView.Platinum.ListExpertDomainView', compact('expertDomains'));
    }

    public function AddResearchPublicationView(){
        return view('ExpertDomainView.Platinum.AddResearchPublicationView');
    }

    public function storeResearchPublication(Request $request){
        $data = $request->validate([
            'R_title' => 'required|string',
            'PB_Type' => 'required|string',
            'PB_Title' => 'required|string',
            'PB_Author' => 'required|string',
            'PB_Uni' => 'required|string',
            'PB_Course' => 'required|string',
            'PB_Page' => 'required|integer',
            'PB_Detail' => 'required|string',
            'PB_Date' => 'required|date',
        ]);

        $userId = Auth::id();

    // Check if the user has a corresponding platinums record
    if (!Platinum::where('id', $userId)->exists()) {
        return redirect()->route('expertDomains.list')->with('error', 'User does not have a corresponding Platinum record.');
    }
            // Save Research data
            $research = new Research();
            $research->id = $userId;
            $research->R_title = $data['R_title'];
            $research->save();

            // Save Publication data
            $publication = new Publication();
            $publication->ED_ID = Auth::id(); // Adjust this as needed
            $publication->PB_Type = $data['PB_Type'];
            $publication->PB_Title = $data['PB_Title'];
            $publication->PB_Author = $data['PB_Author'];
            $publication->PB_Uni = $data['PB_Uni'];
            $publication->PB_Course = $data['PB_Course'];
            $publication->PB_Page = $data['PB_Page'];
            $publication->PB_Detail = $data['PB_Detail'];
            $publication->PB_Date = $data['PB_Date'];
            $publication->id = Auth::id();
            $publication->save();

        return redirect()->route('expertDomains.list')->with('success', 'Research and Publication added successfully!');
    } 

    public function GenerateReport(){
        return view('ExpertDomainView.Platinum.GenerateReport');
    }

    public function GenerateReportSubmit(Request $request)
{
    // Validate the request data
    $data = $request->validate([
        'report_type' => 'required|string',
        'report_date' => 'required|date',
    ]);

    // Process the data and generate the report as needed
    // For now, we'll just return the data to the view for demonstration

    return view('ExpertDomainView.Platinum.ReportResult', compact('data'));
}

}
