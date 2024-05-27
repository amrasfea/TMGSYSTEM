<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ExpertDomainController;
use App\Http\Controllers\ManageWeeklyFocusController;
use App\Http\Controllers\RegistrationUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User; // Ensure this line is present


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:Mentor'])->group(function () {
    Route::get('/mentor/dashboard', [HomeController::class, 'MentorDashboard'])->name('mentor.dashboard');
});

Route::middleware(['auth', 'role:Staff'])->group(function () {
    Route::get('/staff/dashboard', [HomeController::class, 'StaffDashboard'])->name('staff.dashboard');
});
Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
    Route::get('/EditProfile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/EditProfile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/EditProfile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';

//registration
Route::get('/platinum', [RegistrationController::class, 'index'])->name('platinum.index');
Route::get('/platinum/create', [RegistrationController::class, 'create'])->name('platinum.create');
Route::post('/platinum', [RegistrationController::class, 'store'])->name('platinum.store');
Route::get('/platinum/{platinum}/edit', [RegistrationController::class, 'edit'])->name('platinum.edit');
Route::put('/platinum/{platinum}/update', [RegistrationController::class, 'update'])->name('platinum.update');
Route::delete('/platinum/{platinum}/destroy', [RegistrationController::class, 'destroy'])->name('platinum.destroy');
Route::get('/platinum/{platinum}', [RegistrationController::class, 'show'])->name('platinum.show');


Route::middleware('auth')->group(function () {
    Route::get('/users', [RegistrationUser::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [RegistrationUser::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [RegistrationUser::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [RegistrationUser::class, 'destroy'])->name('users.destroy');
    Route::get('/register', [RegistrationUser::class, 'create'])->name('register');
    Route::post('/register', [RegistrationUser::class, 'store']);
    Route::get('/users/{user}', [RegistrationUser::class, 'show'])->name('users.show');

});


Route::get('/AddExpert',[ExpertDomainController::class, 'AddExpertDomainInformation'])->name('platinum.save');
Route::get('/AddResearch',[ExpertDomainController::class, 'AddResearchPublicationView']);
Route::get('/DeleteExpert',[ExpertDomainController::class, 'DeleteExpertDomainView']);
Route::get('/DeleteResearch',[ExpertDomainController::class, 'DeleteResearchPublicationView']);
Route::get('/DisplayExpertDetails',[ExpertDomainController::class, 'DisplayExpertDomainDetailsView']);
Route::get('/DisplayResearch',[ExpertDomainController::class, 'DisplayResearchPublicationView']);
Route::get('/GenerateReport',[ExpertDomainController::class, 'GenerateReport']);
Route::get('/UpdateExpert',[ExpertDomainController::class, 'UpdateExpertDomainView']);

//WeeklyFocus
Route::get('/WeeklyBlockView',[ManageWeeklyFocusController::class, 'WeeklyBlockView']);
Route::get('/WeeklyFocusDateView',[ManageWeeklyFocusController::class, 'WeeklyfocusDateView']);
Route::get('/WeeklyFocusInfoView',[ManageWeeklyFocusController::class, 'WeeklyFocusInfoView']);

Route::get('/AllPlatinumWeeklyBlockView',[ManageWeeklyFocusController::class, 'AllPlatinumWeeklyBlockView']);
Route::get('/AllPlatinumWeeklyFocusDateView',[ManageWeeklyFocusController::class, 'AllPlatinumWeeklyfocusDateView']);
Route::get('/AllPlatinumWeeklyFocusInfoView',[ManageWeeklyFocusController::class, 'AllPlatinumWeeklyFocusInfoView']);

Route::get('/PlatinumWeeklyBlockView',[ManageWeeklyFocusController::class, 'PlatinumWeeklyBlockView']);
Route::get('/PlatinumWeeklyFocusDateView',[ManageWeeklyFocusController::class, 'PlatinumWeeklyfocusDateView']);
Route::get('/PlatinumWeeklyFocusInfoView',[ManageWeeklyFocusController::class, 'PlatinumWeeklyFocusInfoView']);

Route::get('/AdminBlockView',[ManageWeeklyFocusController::class, 'AdminBlockView']);
Route::get('/FocusBlockView',[ManageWeeklyFocusController::class, 'BlockBlockView']);
Route::get('/RecoveryBlockView',[ManageWeeklyFocusController::class, 'RecoveryBlockView']);
Route::get('/SocialBlockView',[ManageWeeklyFocusController::class, 'SocialBlockView']);
Route::get('/WeeklyFocusReport',[ManageWeeklyFocusController::class, 'GenerateWeeklyFocusReport']);

//DTA
Route::get('/CompletionDate',[ManageWeeklyFocusController::class, 'DraftCompletionDateView']);
Route::get('/DaysToPrepare',[ManageWeeklyFocusController::class, 'DraftDaystoPrepareView']);
Route::get('/DraftNumber',[ManageWeeklyFocusController::class, 'DraftNumView']);
Route::get('/StartDate',[ManageWeeklyFocusController::class, 'DraftTotalPageView']);
Route::get('/TotalPage',[ManageWeeklyFocusController::class, 'DraftTotalPageView']);
Route::get('/ThesisTitle',[ManageWeeklyFocusController::class, 'ThesisTitleView']);

Route::get('/AllPlatinumCompletionDate',[ManageWeeklyFocusController::class, 'AllPlatinumDraftCompletionDateView']);
Route::get('/AllPlatinumDaysToPrepare',[ManageWeeklyFocusController::class, 'AllPlatinumDraftDaystoPrepareView']);
Route::get('/AllPlatinumDraftNumber',[ManageWeeklyFocusController::class, 'AllPlatinumDraftNumView']);
Route::get('/AllPlatinumStartDate',[ManageWeeklyFocusController::class, 'AllPlatinumDraftTotalPageView']);
Route::get('/AllPlatinumTotalPage',[ManageWeeklyFocusController::class, 'AllPlatinumDraftTotalPageView']);
Route::get('/AllPlatinumThesisTitle',[ManageWeeklyFocusController::class, 'AllPlatinumThesisTitleView']);

Route::get('/PlatinumCompletionDate',[ManageWeeklyFocusController::class, 'PlatinumDraftCompletionDateView']);
Route::get('/PlatinumDaysToPrepare',[ManageWeeklyFocusController::class, 'PlatinumDraftDaystoPrepareView']);
Route::get('/PlatinumDraftNumber',[ManageWeeklyFocusController::class, 'PlatinumDraftNumView']);
Route::get('/PlatinumStartDate',[ManageWeeklyFocusController::class, 'PlatinumDraftTotalPageView']);
Route::get('/PlatinumTotalPage',[ManageWeeklyFocusController::class, 'PlatinumDraftTotalPageView']);
Route::get('/PlatinumThesisTitle',[ManageWeeklyFocusController::class, 'PlatinumThesisTitleView']);

Route::get('/DTAReport',[ManageWeeklyFocusController::class, 'GenerateDraftThesisPerformanceReport']);










