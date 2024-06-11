<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DraftThesisPerformance; // Import the DraftThesisPerformance model

class ManageDraftThesisPerformanceController extends Controller
{
    public function ManageDraftThesisPerformanceView()
    {
        $data = DraftThesisPerformance::all();
        return view('ManageDraftThesisPerformanceView.platinum.DTAView', compact('data'));
    }

    public function deleteAction($id)
    {
        DraftThesisPerformance::find($id)->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function addAction(Request $request)
    {
        $request->validate([
            'crmps_id' => 'required|exists:crmps,id',
            'M_mentor_ID' => 'required|exists:mentors,id',
            'DTP_StartDate' => 'required|date',
            'DTP_CompletionDate' => 'required|date',
            'DTP_PagesNum' => 'required|integer',
            'DTP_DDCgroup' => 'required|string',
            'DTP_PrepareDays' => 'required|integer',
            'DTP_TotalPages' => 'required|integer',
        ]);

        DraftThesisPerformance::create([
            'C_ID' => $request->crmps_id,
            'M_mentor_ID' => $request->mentor_id,
            'DTP_StartDate' => $request->start_date,
            'DTP_CompletionDate' => $request->completion_date,
            'DTP_PagesNum' => $request->pages_num,
            'DTP_DDCgroup' => $request->ddc_group,
            'DTP_PrepareDays' => $request->prepare_days,
            'DTP_TotalPages' => $request->total_pages,
        ]);

        return redirect()->back()->with('success', 'Record added successfully');
    }

    public function editAction($id, Request $request)
    {
        $record = DraftThesisPerformance::find($id);
        if (!$record) {
            return redirect()->back()->with('error', 'Record not found');
        }

        $request->validate([
            'crmps_id' => 'required|exists:crmps,id',
            'M_mentor_ID' => 'required|exists:mentors,id',
            'DTP_StartDate' => 'required|date',
            'DTP_CompletionDate' => 'required|date',
            'DTP_PagesNum' => 'required|integer',
            'DTP_DDCgroup' => 'required|string',
            'DTP_PrepareDays' => 'required|integer',
            'DTP_TotalPages' => 'required|integer',
        ]);

        $record->update([
            'C_ID' => $request->crmps_id,
            'M_mentor_ID' => $request->mentor_id,
            'DTP_StartDate' => $request->start_date,
            'DTP_CompletionDate' => $request->completion_date,
            'DTP_PagesNum' => $request->pages_num,
            'DTP_DDCgroup' => $request->ddc_group,
            'DTP_PrepareDays' => $request->prepare_days,
            'DTP_TotalPages' => $request->total_pages,
        ]);

        return redirect()->back()->with('success', 'Record edited successfully');
    }

    public function show($id = null)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'Record ID not provided');
        }
    
        $data = DraftThesisPerformance::find($id);
        if (!$data) {
            return redirect()->back()->with('error', 'Record not found');
        }
        return view('ManageDraftThesisPerformanceView.show', compact('data'));
    }
    
    public function PlatinumReportDTA()
    {
        $data = DraftThesisPerformance::all();
        return view('ManageDraftThesisPerformanceView.Platinum.PlatinumReportDTA', compact('data'));
    }
    public function MentorReportDTA()
    {
        $data = DraftThesisPerformance::all();
        return view('ManageDraftThesisPerformanceView.Mentor.MentorReportDTA', compact('data'));
    }

    public function CRMPReportDTA()
    {
        $data = DraftThesisPerformance::all();
        return view('ManageDraftThesisPerformanceView.CRMP.CRMPReportDTA', compact('data'));
    }

    public function index()
    {
        $data = DraftThesisPerformance::all();
        return view('ManageDraftThesisPerformanceView.Mentor.AllDTAView', compact('data'));
    }

    public function DTAView()
    {
        $data = DraftThesisPerformance::all();
        return view('ManageDraftThesisPerformanceView.Platinum.DTAView', compact('data'));
    }

    public function PlatinumDTAView()
    {
        $data = DraftThesisPerformance::all();
        return view('ManageDraftThesisPerformanceView.CRMP.PlatinumDTAView', compact('data'));
    }

    public function showDraftThesisPerformances()
{
    $data = DraftThesisPerformance::all(); // Adjust your query as needed
    return view('ManageDraftThesisPerformanceView.Platinum.PlatinumReportDTA', compact('data'));
}

    public function destroyAction($id)
    {
        try {
            $record = DraftThesisPerformance::find($id);
            if (!$record) {
                return redirect()->back()->with('error', 'Record not found');
            }
            $record->delete();
            return redirect()->back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the record');
        }
    }
}