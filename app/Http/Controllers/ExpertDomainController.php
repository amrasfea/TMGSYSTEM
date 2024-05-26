<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpertDomain;

class ExpertDomainController extends Controller
{
    public function AddExpertDomainInformation() {
        return view('ExpertDomainView.Platinum.AddExpertDomainView');
    }

    public function store(Request $request){
        $data = $request->validate([
            'E_title' => 'required|string',
            'E_full_name' => 'required|string',
            'E_gender' => 'required|string',
            'E_edu_level' => 'required|string',
            'E_edu_field' => 'required|string',
            'E_edu_institute' => 'required|string',
            'E_occupation' => 'required|string',
            'E_sponsorship' => 'required|string',
            'E_address' => 'required|string',
            'E_phone' => 'required|string',
            'E_email' => 'required|string',
            'E_fb_name' => 'required|string',
        ]);

        ExpertDomain::create($data);

        return redirect()->route('platinum.list')->with('success', 'Expert Domain Information added successfully!');

    }

    public function DeleteExpertDomainView(ExpertDomain $expertdomain) {
        return view('ExpertDomainView.Platinum.DeleteExpertDomainView');
    }

    public function UpdateExpertDomainView(ExpertDomain $expertdomain) {
        return view('ExpertDomainView.Platinum.UpdateExpertDomainView');
    }

    public function ListExpertDomainView(){
        //$expertDomains = ExpertDomain::all();
        return view('ExpertDomainView.Platinum.ListExpertDomainView');//, compact('expertDomains'));
    }

    public function AddResearchPublicationView(){
        return view('ExpertDomainView.Platinum.AddResearchPublicationView');
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
