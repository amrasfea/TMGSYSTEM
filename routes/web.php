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
    Route::get('/expert-domains', [ExpertDomainController::class, 'ListExpertDomainView'])->name('expertDomains.list');//search funtion for own expert domain

    Route::get('/AllexpertDomains', [ExpertDomainController::class, 'ListAllExpertDomainView'])->name('expertDomains.listAll');//list All expert
    Route::get('/expert-domains/all', [ExpertDomainController::class, 'ListAllExpertDomainView'])->name('expertDomains.listAll');//search funtion for all expert domain

    Route::get('/expertDomains/edit/{id}', [ExpertDomainController::class, 'UpdateExpertDomainView'])->name('expertDomains.edit'); // This is the GET route
    Route::put('/expertDomains/update/{id}', [ExpertDomainController::class, 'update'])->name('expertDomains.update'); // This is the PUT route

    Route::delete('/expertDomains/{ED_ID}', [ExpertDomainController::class, 'destroy'])->name('expertDomains.destroy');//delete expert

    Route::get('/expertDomains/view/{id}', [ExpertDomainController::class, 'view'])->name('expertDomains.view');//list details
    Route::get('/add-research-publication', [ExpertDomainController::class, 'AddResearchPublicationView'])->name('researchPublications.add');
    Route::get('/AddResearchPublication/{id}', [ExpertDomainController::class, 'AddResearchPublicationView'])->name('researchPublications.add');
    Route::get('/DisplayResearchPublication', [ExpertDomainController::class, 'DisplayResearchPublicationView'])->name('researchPublications.display');
    Route::post('/expertDomains/store-research-publication', [ExpertDomainController::class, 'storeResearchPublication'])->name('researchPublications.store');

    Route::get('/GenerateReport',[ExpertDomainController::class, 'GenerateReport'])->name('platinum.report');
    Route::get('/ReportResult', [ExpertDomainController::class, 'GenerateReportSubmit'])->name('platinum.reportResult');
    
});

//WeeklyFocus

Route::middleware('auth')->group(function() {
    // Routes related to weekly focus selection
    Route::get('/weekly-focus-selection', [ManageWeeklyFocusController::class, 'showWeeklyFocusSelectionForm'])->name('weeklyFocusSelectionForm');
    Route::post('/weekly-focus-selection', [ManageWeeklyFocusController::class, 'processWeeklyFocusSelection'])->name('processWeeklyFocusSelection');

    // Other existing routes...
    Route::get('/focus-block-view', [ManageWeeklyFocusController::class, 'focusBlockView'])->name('focusBlockView');
    Route::get('/admin-block-view', [ManageWeeklyFocusController::class, 'adminBlockView'])->name('adminBlockView');
    Route::get('/recovery-block-view', [ManageWeeklyFocusController::class, 'recoveryBlockView'])->name('recoveryBlockView');
    Route::get('/social-block-view', [ManageWeeklyFocusController::class, 'socialBlockView'])->name('socialBlockView');
    Route::get('/weekly-focus-view', [ManageWeeklyFocusController::class, 'weeklyFocusView'])->name('weeklyFocusView');
    Route::get('/platinum-weekly-focus-report', [ManageWeeklyFocusController::class, 'platinumWeeklyFocusReport'])->name('platinumWeeklyFocusReport');
    Route::get('/all-weekly-focus-view', [ManageWeeklyFocusController::class, 'allWeeklyFocusView'])->name('allWeeklyFocusView');
    Route::get('/mentor-weekly-focus-report', [ManageWeeklyFocusController::class, 'mentorWeeklyFocusReport'])->name('mentorWeeklyFocusReport');
    Route::get('/platinum-weekly-focus-view', [ManageWeeklyFocusController::class, 'platinumWeeklyFocusView'])->name('platinumWeeklyFocusView');
    Route::get('/crmp-weekly-focus-report', [ManageWeeklyFocusController::class, 'crmpWeeklyFocusReport'])->name('crmpWeeklyFocusReport');
});


//DTA
Route::middleware('auth')->group(function() {
    Route::get('/DTAView', [ManageDraftThesisPerformanceController::class, 'index'])->name('DTAView.index');
    Route::delete('/DTAView/{id}/delete', [ManageDraftThesisPerformanceController::class, 'destroy'])->name('DTAView.delete');
    Route::get('/DTAView/{id}/create', [ManageDraftThesisPerformanceController::class, 'create'])->name('DTAView.create');
    Route::post('/DTAView/{id}/store', [ManageDraftThesisPerformanceController::class, 'store'])->name('DTAView.store');
    Route::get('/DTAView/{id}/edit', [ManageDraftThesisPerformanceController::class, 'edit'])->name('DTAView.edit');
    Route::put('/DTAView/{id}', [ManageDraftThesisPerformanceController::class, 'update'])->name('DTAView.update');

    Route::get('/PlatinumReportDTA', [ManageDraftThesisPerformanceController::class, 'PlatinumReportDTA']);
    Route::get('/AllDTAView', [ManageDraftThesisPerformanceController::class, 'index'])->name('AllDTAView.index');
    Route::get('/MentorReportDTA', [ManageDraftThesisPerformanceController::class, 'MentorReportDTA']);
    Route::get('/PlatinumDTAView', [ManageDraftThesisPerformanceController::class, 'show'])->name('PlatinumDTAView.show');
    Route::get('/CRMPReportDTA', [ManageDraftThesisPerformanceController::class, 'CRMPReportDTA']);
    Route::resource('draft-thesis-performances', 'App\Http\Controllers\ManageDraftThesisPerformanceController');
});



//ManagePublication
Route::middleware('auth')->group(function(){
    Route::get('publications', [ManagePublicationController::class, 'index'])->name('publications.index');
    Route::get('publications/create', [ManagePublicationController::class, 'create'])->name('publications.create');
    Route::post('publications', [ManagePublicationController::class, 'store'])->name('publications.store');
    Route::get('publications/{id}', [ManagePublicationController::class, 'show'])->name('publications.show');
    Route::get('publications/{id}/edit', [ManagePublicationController::class, 'edit'])->name('publications.edit');
    Route::put('publications/{id}', [ManagePublicationController::class, 'update'])->name('publications.update');
    Route::delete('publications/{id}', [ManagePublicationController::class, 'destroy'])->name('publications.destroy');
    Route::get('/search', [ManagePublicationController::class, 'search'])->name('publications.search');
    Route::get('/view-publications', [ManagePublicationController::class, 'viewPublications'])->name('publications.viewAll');
});

Route::middleware('auth', 'role:Mentor')->group(function () {
    Route::get('/viewPlatinumList', [ManagePublicationController::class, 'viewPlatinumList'])->name('mentor.viewPlatinumList');
    Route::get('/mentor/platinum/{platinumId}/publications', [ManagePublicationController::class, 'viewPlatinumPublications'])->name('mentor.viewPlatinumPublications');
    Route::get('/mentor/publications/{publicationId}/details', [ManagePublicationController::class, 'viewPublicationDetails'])->name('mentor.viewPublicationDetails');
});














