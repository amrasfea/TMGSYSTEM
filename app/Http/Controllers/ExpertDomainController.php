<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpertDomain;

class ExpertDomainController extends Controller
{
    public function AddExpertDomainView() {
        
        return view('ExpertDomainView.Platinum.AddExpertDomainView');
    }
    
    public function store(Request $request){
        $data = $request->validate([
            //'ED_ID' => 'required|string',
            //'id' => 'required|string',
            //'M_mentorID' => 'required|string',
            'ED_Name' => 'required|string',
            'ED_Uni' => 'required|string',
            'ED_Email' => 'required|string',
            'ED_PhoneNum' => 'required|string',
            'ED_Research' => 'required|string',
            'ED_Paper' => 'required|string',
            'ED_address' => 'required|string',
            'ED_fbname' => 'required|string',
            'ED_edu_level' => 'required|string',
            'ED_edu_field' => 'required|string',
            // 'ED_edu_institute' => 'required|string',
            'ED_occupation' => 'required|string',
            'ED_sponsorship' => 'required|string',
            'ED_gender' => 'required|string',
            'E_title' => 'required|string',
        ]);

        ExpertDomain::create($data);

        return redirect()->route('expertDomains.list')->with('success', 'Expert Domain Information added successfully!');

    }

    public function DeleteExpertDomainView(ExpertDomain $expertdomain) {
        return view('ExpertDomainView.Platinum.DeleteExpertDomainView');
    }

    public function UpdateExpertDomainView(ExpertDomain $expertdomain) {
        return view('ExpertDomainView.Platinum.UpdateExpertDomainView');
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
            // Save Research data
            $research = new Research();
            $research->id = Auth::id();
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
