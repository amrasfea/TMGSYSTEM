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
use App\Http\Controllers\ManageDraftThesisPerformanceController;


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

    Route::get('/profile/{id}/expert', [ProfileController::class, 'viewExpert'])->name('expert.show');
});

require __DIR__.'/auth.php';


Route::middleware('auth', 'role:Staff')->group(function () {
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
    Route::get('/expertDomains/add', [ExpertDomainController::class, 'AddExpertDomainView'])->name('expertDomains.add');//add expert
    Route::post('/expertDomains/store', [ExpertDomainController::class, 'store'])->name('expertDomains.store');

    Route::get('/expertDomains', [ExpertDomainController::class, 'ListExpertDomainView'])->name('expertDomains.list');//list own expert
    Route::get('/AllexpertDomains', [ExpertDomainController::class, 'ListAllExpertDomainView'])->name('expertDomains.listAll');//list own expert
    Route::get('/expertDomains/edit/{id}', [ExpertDomainController::class, 'UpdateExpertDomainView'])->name('expertDomains.edit'); // This is the GET route
    Route::put('/expertDomains/update/{id}', [ExpertDomainController::class, 'update'])->name('expertDomains.update'); // This is the PUT route

    Route::delete('/expertDomains/{ED_ID}', [ExpertDomainController::class, 'destroy'])->name('expertDomains.destroy');//delete expert

    Route::get('/expertDomains/view/{id}', [ExpertDomainController::class, 'view'])->name('expertDomains.view');//list details
    Route::get('/add-research-publication', [ExpertDomainController::class, 'AddResearchPublicationView'])->name('researchPublications.add');
    Route::get('/DisplayResearchPublication', [ExpertDomainController::class, 'DisplayResearchPublicationView'])->name('researchPublications.display');
    Route::post('/expertDomains/store-research-publication', [ExpertDomainController::class, 'storeResearchPublication'])->name('researchPublications.store');

    Route::get('/GenerateReport',[ExpertDomainController::class, 'GenerateReport'])->name('platinum.report');
    Route::get('/ReportResult', [ExpertDomainController::class, 'GenerateReportSubmit'])->name('platinum.reportResult');
    
});

//WeeklyFocus

Route::get('/focus-block-view', [ManageWeeklyFocusController::class, 'focusBlockView']);
Route::get('/weekly-block-view', [ManageWeeklyFocusController::class, 'weeklyBlockView']);
Route::get('/weekly-focus-date-view', [ManageWeeklyFocusController::class, 'weeklyFocusDateView']);
Route::get('/weekly-focus-info-view', [ManageWeeklyFocusController::class, 'weeklyFocusInfoView']);
Route::get('/all-platinum-weekly-block-view', [ManageWeeklyFocusController::class, 'allPlatinumWeeklyBlockView']);
Route::get('/all-platinum-weekly-focus-date-view', [ManageWeeklyFocusController::class, 'allPlatinumWeeklyFocusDateView']);
Route::get('/all-platinum-weekly-focus-info-view', [ManageWeeklyFocusController::class, 'allPlatinumWeeklyFocusInfoView']);
Route::get('/platinum-weekly-block-view', [ManageWeeklyFocusController::class, 'platinumWeeklyBlockView']);
Route::get('/platinum-weekly-focus-date-view', [ManageWeeklyFocusController::class, 'platinumWeeklyFocusDateView']);
Route::get('/platinum-weekly-focus-info-view', [ManageWeeklyFocusController::class, 'platinumWeeklyFocusInfoView']);
Route::get('/admin-block-view', [ManageWeeklyFocusController::class, 'adminBlockView']);
Route::get('/recovery-block-view', [ManageWeeklyFocusController::class, 'recoveryBlockView']);
Route::get('/social-block-view', [ManageWeeklyFocusController::class, 'socialBlockView']);
Route::get('/generate-weekly-focus-report', [ManageWeeklyFocusController::class, 'generateWeeklyFocusReport']);


//DTA
Route::get('/DTAView',[ManageDraftThesisPerformanceController::class, 'DTAView']);
Route::get('/PlatinumReportDTA',[ManageDraftThesisPerformanceController::class, 'PlatinumReportDTA']);

Route::get('/AllDTAView',[ManageDraftThesisPerformanceController::class, 'AllDTAView']);
Route::get('/MentorReportDTA',[ManageDraftThesisPerformanceController::class, 'MentorReportDTA']);

Route::get('/PlatinumDTAView',[ManageDraftThesisPerformanceController::class, 'PlatinumDTAView']);
Route::get('/CRMPReportDTA',[ManageDraftThesisPerformanceController::class, 'CRMPReportDTA']);



//ManagePublication
Route::get('publications', [ManagePublicationController::class, 'index'])->name('publications.index');
Route::get('publications/create', [ManagePublicationController::class, 'create'])->name('publications.create');
Route::post('publications', [ManagePublicationController::class, 'store'])->name('publications.store');
Route::get('publications/{id}/edit', [ManagePublicationController::class, 'edit'])->name('publications.edit');
Route::put('publications/{id}', [ManagePublicationController::class, 'update'])->name('publications.update');
Route::delete('publications/{id}', [ManagePublicationController::class, 'destroy'])->name('publications.destroy');
Route::get('publications/{id}', [ManagePublicationController::class, 'show'])->name('publications.show');
Route::get('publications/search', [ManagePublicationController::class, 'search'])->name('publications.search');











