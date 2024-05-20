<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpertDomainController extends Controller
{
    public function AddExpertDomainInformation() {
        return view('ExpertDomainView.Platinum.AddExpertDomainView');
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
