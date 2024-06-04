<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        $query = User::query();

        if ($request->has('batch')) {
            $query->where('P_batch', 'like', '%' . $request->batch . '%');
        }

        if ($request->has('university')) {
            $query->where('P_edu_institute', 'like', '%' . $request->university . '%');
        }

        $users = $query->paginate(10);

        return view('users.report', compact('users'));
    }

    public function generatePdf(Request $request)
    {
        $query = User::query();

        if ($request->has('batch')) {
            $query->where('P_batch', 'like', '%' . $request->batch . '%');
        }

        if ($request->has('university')) {
            $query->where('P_edu_institute', 'like', '%' . $request->university . '%');
        }

        $users = $query->get();

        $pdf = PDF::loadView('pdf.report', compact('users'));

        return $pdf->download('report.pdf');
    }
}
