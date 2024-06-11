<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Publication;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;


class ReportController extends Controller
{
    public function report(Request $request)
    {
        
        $query = User::query();

        //check if batch parameter exists in the request
        if ($request->has('batch')) {
            //add a condition to filter users by batch
            $query->where('P_batch', 'like', '%' . $request->batch . '%');
        }

        //check if 'university' parameter exists in the request
        if ($request->has('university')) {
            //add a condition to filter users by university
            $query->where('P_edu_institute', 'like', '%' . $request->university . '%');
        }

        //retrieve paginated user based on the query
        $users = $query->paginate(10);

        //return the view to display the PDF report form with the filteres users
        return view('pdf.reportForm', compact('users'));
    }

    public function generatePdf(Request $request)
    {
        //start buldiing the query to fetch users
        $query = User::query();

        //check if 'batch' parameter exists in the request
        if ($request->has('batch')) {
            //add a condiiton to filter users by batch
            $query->where('P_batch', 'like', '%' . $request->batch . '%');
        }

        // Check if 'university' parameter exists in the request
        if ($request->has('university')) {
            // Add a condition to filter users by university
            $query->where('P_edu_institute', 'like', '%' . $request->university . '%');
        }

        //retrieve users based on the query
        $users = $query->get();

        //generate PDF using the report view and filtered user data
        $pdf = FacadePDF::loadView('pdf.report', compact('users'));

        //download the generated PDf report
        return $pdf->download('report.pdf');
    }

    public function reportPublications(Request $request)
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

        $publications = $query->paginate(10);

        return view('pdf.reportPublicationsForm', compact('publications'));
    }

    // Method to generate PDF report for publications
    public function generatePublicationsPdf(Request $request)
    {
    // Get the start date and end date from the request
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Initialize the query for publications
    $query = Publication::query();

    // Add conditions to filter publications based on start date and end date
    if ($startDate && $endDate) {
        // Assuming PB_Date is the column representing the publication date
        $query->whereBetween('PB_Date', [$startDate, $endDate]);
    }

    // Retrieve the filtered publications
    $publications = $query->get();

    // Generate the PDF using DomPDF
    $pdf = FacadePdf::loadView('pdf.reportPublications', compact('publications'));

    // Download the generated PDF
    return $pdf->download('publications_report.pdf');
    }


}
