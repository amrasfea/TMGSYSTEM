<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ExpertDomainController;
use App\Http\Controllers\ManageWeeklyFocusController;
use App\Http\Controllers\RegistrationUser;
use App\Http\Controllers\ManagePublicationController;
use App\Http\Controllers\ReportController;


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

Route::middleware(['auth', 'role:Platinum'])->group(function () {
    Route::get('/platinum/dashboard', [HomeController::class, 'PlatinumDashboard'])->name('platinum.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
    Route::get('/EditProfile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/EditProfile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/EditProfile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route to list all profiles (restricted by role)
    Route::get('/profiles', [ProfileController::class, 'listProfiles'])->name('profile.list');

    // Route to view a specific profile by ID
    Route::get('/profiles/{id}', [ProfileController::class, 'viewProfile'])->name('profile.view');

});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/users', [RegistrationUser::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [RegistrationUser::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [RegistrationUser::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [RegistrationUser::class, 'destroy'])->name('users.destroy');
    Route::get('/register', [RegistrationUser::class, 'create'])->name('register');
    Route::post('/register', [RegistrationUser::class, 'store']);
    Route::get('/users/{user}', [RegistrationUser::class, 'show'])->name('users.show');

    Route::get('/report', [ReportController::class, 'report'])->name('users.report');
    Route::get('/users/report/pdf', [ReportController::class, 'generatePdf'])->name('users.report.pdf');
});

Route::middleware('auth')->group(function(){
    Route::get('/expertDomains/add', [ExpertDomainController::class, 'AddExpertDomainView'])->name('expertDomains.add');
    Route::post('/expertDomains/store', [ExpertDomainController::class, 'store'])->name('expertDomains.store');
    Route::get('/expertDomains', [ExpertDomainController::class, 'ListExpertDomainView'])->name('expertDomains.list');
    Route::get('/expertDomains/edit/{id}', [ExpertDomainController::class, 'UpdateExpertDomainView'])->name('expertDomains.edit');
    Route::delete('/expertDomains/{id}', [ExpertDomainController::class, 'destroy'])->name('expertDomains.destroy');
    Route::get('/add-research-publication', [ExpertDomainController::class, 'AddResearchPublicationView'])->name('researchPublications.add');
    Route::get('/DisplayResearchPublication', [ExpertDomainController::class, 'DisplayResearchPublicationView'])->name('researchPublications.display');
    Route::post('/expertDomains/store-research-publication', [ExpertDomainController::class, 'storeResearchPublication'])->name('researchPublications.store');
    Route::get('/GenerateReport',[ExpertDomainController::class, 'GenerateReport'])->name('platinum.report');
    Route::get('/ReportResult', [ExpertDomainController::class, 'GenerateReportSubmit'])->name('platinum.reportResult');
    
});

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

//ManagePublication
Route::get('/publications', [ManagePublicationController::class, 'index'])->name('publications.index');
Route::get('/publications/create', [ManagePublicationController::class, 'create'])->name('publications.create');
Route::post('/publications', [ManagePublicationController::class, 'store'])->name('publications.store');
Route::get('/publications/{id}/edit', [ManagePublicationController::class, 'edit'])->name('publications.edit');
Route::put('/publications/{id}', [ManagePublicationController::class, 'update'])->name('publications.update');
Route::delete('/publications/{id}', [ManagePublicationController::class, 'destroy'])->name('publications.destroy');
Route::get('/publications/{id}', [ManagePublicationController::class, 'show'])->name('publications.show');
Route::get('/publications/platinum', [ManagePublicationController::class, 'viewOtherPublications'])->name('publications.platinum');
Route::get('/publications/search', [ManagePublicationController::class, 'search'])->name('publications.search');












