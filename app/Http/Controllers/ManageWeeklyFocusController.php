<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeeklyFocusBlock; // Import the WeeklyFocusBlock model

class ManageWeeklyFocusController extends Controller
{
    public function focusBlockView()
    {
        $data = WeeklyFocusBlock::all();
        return view('ManageWeeklyFocusView.FocusBlockView', compact('data'));
    }

    public function adminBlockView()
    {
        $data = WeeklyFocusBlock::all();
        return view('ManageWeeklyFocusView.AdminBlockView', compact('data'));
    }

    public function recoveryBlockView()
    {
        $data = WeeklyFocusBlock::all();
        return view('ManageWeeklyFocusView.RecoveryBlockView', compact('data'));
    }

    public function socialBlockView()
    {
        $data = WeeklyFocusBlock::all();
        return view('ManageWeeklyFocusView.SocialBlockView', compact('data'));
    }

    public function weeklyFocusView()
    {
        $data = WeeklyFocusBlock::all();
        return view('ManageWeeklyFocusView.Platinum.weeklyFocusView', compact('data'));
    }

    public function platinumWeeklyFocusReport()
    {
        $data = WeeklyFocusBlock::all();
        return view('ManageWeeklyFocusView.Platinum.platinumWeeklyFocusReport', compact('data'));
    }

    public function allWeeklyFocusView()
    {
        $data = WeeklyFocusBlock::all();
        return view('ManageWeeklyFocusView.Mentor.allWeeklyFocusView', compact('data'));
    }

    public function mentorWeeklyFocusReport()
    {
        $data = WeeklyFocusBlock::all();
        return view('ManageWeeklyFocusView.Mentor.mentorWeeklyFocusReport', compact('data'));
    }

    public function platinumWeeklyFocusView()
    {
        $data = WeeklyFocusBlock::all();
        return view('ManageWeeklyFocusView.CRMP.platinumWeeklyFocusView', compact('data'));
    }

    public function crmpWeeklyFocusReport()
    {
        $data = WeeklyFocusBlock::all();
        return view('ManageWeeklyFocusView.CRMP.crmpWeeklyFocusReport', compact('data'));
    }

    public function storeWeeklyFocus(Request $request)
    {
        $request->validate([
            'P_platinumID' => 'required|exists:platinums,P_platinumID',
            'M_mentorID' => 'required|exists:mentors,M_mentorID',
            'FB_BlockType' => 'required|string',
            'FB_BlockDesc' => 'required|string',
            'FB_StartDate' => 'required|date',
            'FB_EndDate' => 'required|date|after:FB_StartDate',
        ]);

        $weeklyFocusBlock = WeeklyFocusBlock::create([
            'P_platinumID' => $request->P_platinumID,
            'M_mentorID' => $request->M_mentorID,
            'FB_BlockType' => $request->FB_BlockType,
            'FB_BlockDesc' => $request->FB_BlockDesc,
            'FB_StartDate' => $request->FB_StartDate,
            'FB_EndDate' => $request->FB_EndDate,
        ]);

        return response()->json(['message' => 'Weekly focus saved successfully', 'data' => $weeklyFocusBlock], 201);
    }

    public function updateWeeklyFocus($id, Request $request)
    {
        $request->validate([
            'P_platinumID' => 'required|exists:platinums,P_platinumID',
            'M_mentorID' => 'required|exists:mentors,M_mentorID',
            'FB_BlockType' => 'required|string',
            'FB_BlockDesc' => 'required|string',
            'FB_StartDate' => 'required|date',
            'FB_EndDate' => 'required|date|after:FB_StartDate',
        ]);

        $weeklyFocusBlock = WeeklyFocusBlock::findOrFail($id);

        $weeklyFocusBlock->update([
            'P_platinumID' => $request->P_platinumID,
            'M_mentorID' => $request->M_mentorID,
            'FB_BlockType' => $request->FB_BlockType,
            'FB_BlockDesc' => $request->FB_BlockDesc,
            'FB_StartDate' => $request->FB_StartDate,
            'FB_EndDate' => $request->FB_EndDate,
        ]);

        return redirect()->route('weeklyFocusView')->with('success', 'Weekly focus updated successfully');
    }

    public function deleteWeeklyFocus($id)
    {
        $weeklyFocusBlock = WeeklyFocusBlock::findOrFail($id);
        $weeklyFocusBlock->delete();
        return redirect()->route('weeklyFocusView')->with('success', 'Weekly focus deleted successfully');
    }

    public function edit($id)
    {
        $weeklyFocus = WeeklyFocusBlock::findOrFail($id);
        return view('ManageWeeklyFocusView.Platinum.edit', compact('weeklyFocus'));
    }

    public function create()
    {
        return view('ManageWeeklyFocusView.Platinum.create');
    }
}