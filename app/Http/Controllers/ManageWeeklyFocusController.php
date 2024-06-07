<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeeklyFocusBlock; // Import the WeeklyFocusBlock model

class WeeklyFocusController extends Controller
{
    public function focusBlockView()
    {
        return view('focusBlockView');
    }

    public function adminBlockView()
    {
        return view('adminBlockView');
    }

    public function recoveryBlockView()
    {
        return view('recoveryBlockView');
    }

    public function socialBlockView()
    {
        return view('socialBlockView');
    }

    public function weeklyFocusView()
    {
        return view('weekly-focus-view');
    }

    public function platinumWeeklyFocusReport()
    {
        return view('platinumWeeklyFocusReport');
    }

    public function allWeeklyFocusView()
    {
        return view('allWeeklyFocusView');
    }

    public function mentorWeeklyFocusReport()
    {
        return view('mentorWeeklyFocusReport');
    }

    public function platinumWeeklyFocusView()
    {
        return view('platinumWeeklyFocusView');
    }

    public function crmpWeeklyFocusReport()
    {
        return view('crmpWeeklyFocusReport');
    }

    public function storeWeeklyFocus(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'P_platinumID' => 'required|exists:platinums,P_platinumID',
            'M_mentorID' => 'required|exists:mentors,M_mentorID',
            'FB_BlockType' => 'required|string',
            'FB_BlockDesc' => 'required|string',
            'FB_StartDate' => 'required|date',
            'FB_EndDate' => 'required|date|after:FB_StartDate',
        ]);

        // Create a new WeeklyFocusBlock instance and save it to the database
        $weeklyFocusBlock = WeeklyFocusBlock::create([
            'P_platinumID' => $request->P_platinumID,
            'M_mentorID' => $request->M_mentorID,
            'FB_BlockType' => $request->FB_BlockType,
            'FB_BlockDesc' => $request->FB_BlockDesc,
            'FB_StartDate' => $request->FB_StartDate,
            'FB_EndDate' => $request->FB_EndDate,
        ]);

        // Optionally, you can return a response indicating success or failure
        return response()->json(['message' => 'Weekly focus saved successfully', 'data' => $weeklyFocusBlock], 201);
    }

    public function updateWeeklyFocus($id, Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'P_platinumID' => 'required|exists:platinums,P_platinumID',
            'M_mentorID' => 'required|exists:mentors,M_mentorID',
            'FB_BlockType' => 'required|string',
            'FB_BlockDesc' => 'required|string',
            'FB_StartDate' => 'required|date',
            'FB_EndDate' => 'required|date|after:FB_StartDate',
        ]);

        // Retrieve the weekly focus block from the database
        $weeklyFocusBlock = WeeklyFocusBlock::findOrFail($id);

        // Update the attributes of the retrieved weekly focus block
        $weeklyFocusBlock->update([
            'P_platinumID' => $request->P_platinumID,
            'M_mentorID' => $request->M_mentorID,
            'FB_BlockType' => $request->FB_BlockType,
            'FB_BlockDesc' => $request->FB_BlockDesc,
            'FB_StartDate' => $request->FB_StartDate,
            'FB_EndDate' => $request->FB_EndDate,
        ]);

        // Optionally, you can return a response indicating success or failure
        return redirect()->route('weeklyFocusView')->with('success', 'Weekly focus updated successfully');
    }

    public function deleteWeeklyFocus($id)
    {
        // Retrieve the weekly focus block from the database
        $weeklyFocusBlock = WeeklyFocusBlock::findOrFail($id);

        // Delete the retrieved weekly focus block
        $weeklyFocusBlock->delete();

        // Optionally, you can return a response indicating success or failure
        return redirect()->route('weeklyFocusView')->with('success', 'Weekly focus deleted successfully');
    }
}
