<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeeklyFocusBlock;


class ManageWeeklyFocusController extends Controller
{
    public function focusBlockView() {
        $focusBlocks = WeeklyFocusBlock::all();
        return view('ManageWeeklyFocusView.FocusBlockView', compact('focusBlocks'));
    }

    public function weeklyBlockView() {
        return view('ManageWeeklyFocusView.WeeklyBlockView');
    }

    public function weeklyFocusDateView() {
        return view('ManageWeeklyFocusView.WeeklyFocusDateView');
    }

    public function weeklyFocusInfoView() {
        return view('ManageWeeklyFocusView.WeeklyFocusInfoView');
    }

    public function allPlatinumWeeklyBlockView() {
        return view('ManageWeeklyFocusView.AllPlatinumWeeklyBlockView');
    }

    public function allPlatinumWeeklyFocusDateView() {
        return view('ManageWeeklyFocusView.AllPlatinumWeeklyFocusDateView');
    }

    public function allPlatinumWeeklyFocusInfoView() {
        return view('ManageWeeklyFocusView.AllPlatinumWeeklyFocusInfoView');
    }

    public function platinumWeeklyBlockView() {
        return view('ManageWeeklyFocusView.PlatinumWeeklyBlockView');
    }

    public function platinumWeeklyFocusDateView() {
        return view('ManageWeeklyFocusView.PlatinumWeeklyFocusDateView');
    }

    public function platinumWeeklyFocusInfoView() {
        return view('ManageWeeklyFocusView.PlatinumWeeklyFocusInfoView');
    }

    public function adminBlockView() {
        return view('ManageWeeklyFocusView.AdminBlockView');
    }

    public function recoveryBlockView() {
        return view('ManageWeeklyFocusView.RecoveryBlockView');
    }

    public function socialBlockView() {
        return view('ManageWeeklyFocusView.SocialBlockView');
    }

    public function generateWeeklyFocusReport() {
        // Implement your logic here
        return view('ManageWeeklyFocusView.GenerateWeeklyFocusReport');
    }
}
