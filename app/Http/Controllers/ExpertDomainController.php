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

        $newExpertDomain = ExpertDomain::create($data);

    }

    public function AddResearchPublicationView() {
        return view('ExpertDomainView.Platinum.AddResearchPublicationView');
    }

    public function DeleteExpertDomainView() {
        return view('ExpertDomainView.Platinum.DeleteExpertDomainView');
    }

    public function DeleteResearchPublicationView() {
        return view('ExpertDomainView.Platinum.DeleteResearchPublicationView');
    }

    public function DisplayExpertDomainDetailsView() {
        return view('ExpertDomainView.Platinum.DisplayExpertDomainDetailsView');
    }

    public function DisplayResearchPublicationView() {
        return view('ExpertDomainView.Platinum.DisplayResearchPublicationView');
    }

    public function GenerateReport() {
        return view('ExpertDomainView.Platinum.GenerateReport');
    }

    public function SearchPlatinumExpertDomainView() {
        return view('ExpertDomainView.Platinum.SearchPlatinumExpertDomainView');
    }

    public function SearchResearchPublicationView() {
        return view('ExpertDomainView.Platinum.SearchResearchPublicationView');
    }

    public function UpdateExpertDomainView() {
        return view('ExpertDomainView.Platinum.UpdateExpertDomainView');
    }

    public function UpdateResearchPublicationView() {
        return view('ExpertDomainView.Platinum.UpdateResearchPublicationView');
    }

    public function ViewPlatinumExpertDomain() {
        return view('ExpertDomainView.Mentor.ViewPlatinumExpertDomain');
    }

    public function MentorSearchPlatinumExpertDomainView() {
        return view('ExpertDomainView.Mentor.MentorSearchPlatinumExpertDomainView');
    }

}
