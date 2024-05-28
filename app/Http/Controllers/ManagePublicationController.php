<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;

class ManagePublicationController extends Controller
{
    public function AddPublicationView()
    {
        return view('ManagePublicationView.Platinum.AddPublicationView');
    }

    public function store(Request $request)
    {
        $data = $request-> validate
        ([
            'PB_Type'    => 'required|string',
            'PB_Title'   => 'required|string',
            'PB_Author'  => 'required|string',
            'PB_Uni'     => 'required|string',
            'PB_Course'  => 'required|string',
            'PB_Keyword' => 'required|string',
            'PB_Date'    => 'required|date'  ,
            'PB_File'    => 'required|file'
        ]);

        

    

       
    }
}

