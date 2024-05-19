<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platinum;

class RegistrationController extends Controller
{
    public function index(){
        $platinums = Platinum::all();
        return view('platinums.index', ['platinums' => $platinums]);
    }

    public function create(){
        return view('platinums.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'registration_type' => 'required|string',
            'title' => 'required|string',
            'full_name' => 'required|string',
            'identity_card' => 'required|string',
            'gender' => 'required|string',
            'religion' => 'required|string',
            'race' => 'required|string',
            'citizenship' => 'required|string',
            'edu_level' => 'required|string',
            'edu_field' => 'required|string',
            'edu_institute' => 'required|string',
            'occupation' => 'required|string',
            'sponsorship' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email',
            'fb_name' => 'required|string',
            'program' => 'required|string',
            'batch' => 'required|integer',
            'referral' => 'required|boolean',
            'referral_name' => 'nullable|string',
            'referral_batch' => 'nullable|string',
        ]);

         Platinum::create($data);

         return redirect()->route('platinum.index')->with('success', 'New product saved successfully!');
    }

    public function edit(Platinum $platinum){
        return view('platinums.edit', ['platinum' => $platinum]);
    }

    public function update(Request $request, Platinum $platinum){
        $data = $request->validate([
            'registration_type' => 'required|string',
            'title' => 'required|string',
            'full_name' => 'required|string',
            'identity_card' => 'required|string',
            'gender' => 'required|string',
            'religion' => 'required|string',
            'race' => 'required|string',
            'citizenship' => 'required|string',
            'edu_level' => 'required|string',
            'edu_field' => 'required|string',
            'edu_institute' => 'required|string',
            'occupation' => 'required|string',
            'sponsorship' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email',
            'fb_name' => 'required|string',
            'program' => 'required|string',
            'batch' => 'required|integer',
            'referral' => 'required|boolean',
            'referral_name' => 'nullable|string',
            'referral_batch' => 'nullable|string',
        ]);

        $platinum->update($data);

        return redirect(route('platinum.index'))->with('success', 'Platinum registration updated successfully.');
    }

    public function destroy(Platinum $platinum){
        $platinum->delete();
        return redirect(route('platinum.index'))->with('success', 'Platinum registration deleted successfully.');
    }
}
