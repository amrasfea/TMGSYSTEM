<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Platinum;

class RegistrationController extends Controller{

    public function index(){
        $platinums = Platinum::all();
        return view('platinums.index', ['platinums' => $platinums]);
        
    }

    public function create(){
        return view('platinums.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'P_registration_type' => 'required|string',
            'P_title' => 'required|string',
            'P_full_name' => 'required|string',
            'P_identity_card' => 'required|string',
            'P_gender' => 'required|string',
            'P_religion' => 'required|string',
            'P_race' => 'required|string',
            'P_citizenship' => 'required|string',
            'P_edu_level' => 'required|string',
            'P_edu_field' => 'required|string',
            'P_edu_institute' => 'required|string',
            'P_occupation' => 'required|string',
            'P_sponsorship' => 'required|string',
            'P_address' => 'required|string',
            'P_email' => 'required|string',
            'P_phone' => 'required|string',
            'P_fb_name' => 'required|string',
            'P_program' => 'required|string',
            'P_batch' => 'required|integer',
            'P_referral' => 'required|boolean',
            'P_referral_name' => 'nullable|string',
            'P_referral_batch' => 'nullable|string',
        ]);

        $newPlatinum = Platinum::create($data);

        return redirect(route('platinum.index'))->with('success', 'Platinum Registered Succesffully');

    }

    public function edit(Platinum $platinum){
        return view('platinums.edit', ['platinum' => $platinum]);
    }

    public function update(Platinum $platinum, Request $request){
        $data = $request->validate([
            'P_registration_type' => 'required|string',
            'P_title' => 'required|string',
            'P_full_name' => 'required|string',
            'P_identity_card' => 'required|string',
            'P_gender' => 'required|string',
            'P_religion' => 'required|string',
            'P_race' => 'required|string',
            'P_citizenship' => 'required|string',
            'P_edu_level' => 'required|string',
            'P_edu_field' => 'required|string',
            'P_edu_institute' => 'required|string',
            'P_occupation' => 'required|string',
            'P_sponsorship' => 'required|string',
            'P_address' => 'required|string',
            'P_email' => 'required|string',
            'P_phone' => 'required|string',
            'P_fb_name' => 'required|string',
            'P_program' => 'required|string',
            'P_batch' => 'required|integer',
            'P_referral' => 'required|boolean',
            'P_referral_name' => 'nullable|string',
            'P_referral_batch' => 'nullable|string',
        ]);

        $platinum->update($data);

        return redirect(route('platinum.index'))->with('success', 'Platinum Updated Succesffully');

    }

    public function destroy(Platinum $platinum){
        $platinum->delete();
        return redirect(route('platinum.index'))->with('success', 'Platinum deleted Succesffully');
    }
}
