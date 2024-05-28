<?php

// app/Http/Controllers/HomeController.php

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

    public function PlatinumDashboard(){
        return view('dashboards.platinum');
    }
}
