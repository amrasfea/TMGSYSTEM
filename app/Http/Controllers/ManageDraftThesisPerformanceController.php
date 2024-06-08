<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DraftThesisPerformance; // Import the DraftThesisPerformance model

class ManageDraftThesisPerformanceController extends Controller
{
    //
    public function ManageDraftThesisPerformanceView()
    {
        $data = DraftThesisPerformance::all(); // Corrected model reference
        return view('ManageDraftThesisPerformanceView.platinum.DTAView');
    }

    public function deleteAction($id)
    {
        DraftThesisPerformance::find($id)->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function addAction(Request $request)
    {
        // Implement the logic for adding a new record
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
        // Implement the logic for editing a record
        // You can use the $id parameter to find the record to be edited
        // Then update the record with the new data from the request

        return redirect()->back()->with('success', 'Record edited successfully');
    }

   // Add this method
   public function PlatinumReportDTA()
   {
       $data = DraftThesisPerformance::all();
       return view('ManageDraftThesisPerformanceView.Platinum.PlatinumReportDTA', compact('data'));
   }

    // Add this method
    public function CRMPReportDTA()
    {
        $data = DraftThesisPerformance::all();
        return view('ManageDraftThesisPerformanceView.CRMP.CRMPReportDTA', compact('data'));
    }

      // Add this method
      public function AllDTAView()
      {
          $data = DraftThesisPerformance::all();
          return view('ManageDraftThesisPerformanceView.Mentor.AllDTAView', compact('data'));
      }

      // Add this method
      public function DTAView()
      {
          $data = DraftThesisPerformance::all();
          return view('ManageDraftThesisPerformanceView.Platinum.DTAView', compact('data'));
      }

         // Add this method
         public function PlatinumDTAView()
         {
             $data = DraftThesisPerformance::all();
             return view('ManageDraftThesisPerformanceView.CRMP.PlatinumDTAView', compact('data'));
         }

      public function destroyAction($id)
{
    try {
        // Attempt to find the record
        $record = DraftThesisPerformance::find($id);

        // Check if the record exists
        if (!$record) {
            return redirect()->back()->with('error', 'Record not found');
        }

        // Check for authorization (optional)
        // if (!auth()->user()->can('delete', $record)) {
        //     return redirect()->back()->with('error', 'Unauthorized');
        // }

        // Attempt to delete the record
        $record->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Record deleted successfully');
    } catch (\Exception $e) {
        // Handle any errors that occur during the delete operation
        return redirect()->back()->with('error', 'An error occurred while deleting the record');
    }
}

}
