<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function StaffDashboard(){
        return view('dashboards.staff');
    }

    public function MentorDashboard(){
        return view('dashboards.mentor');
    }
}
