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
    Route::get('/profile/{user}/publications', [ProfileController::class, 'showPublications'])->name('profile.publications');

});

require __DIR__.'/auth.php';


Route::middleware('auth', 'role:Staff')->group(function () {
    Route::get('/register', [RegistrationUser::class, 'create'])->name('register');
    Route::post('/register', [RegistrationUser::class, 'store']);
    Route::get('/users', [RegistrationUser::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [RegistrationUser::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [RegistrationUser::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [RegistrationUser::class, 'destroy'])->name('users.destroy');
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
    // Route::get('/add-research-publication', [ExpertDomainController::class, 'AddResearchPublicationView'])->name('researchPublications.add');
    
    Route::get('/AddResearchPublication/{ED_ID}', [ExpertDomainController::class, 'AddResearchPublicationView'])->name('researchPublications.add');
    Route::post('/storeResearchPublication', [ExpertDomainController::class, 'storeResearchPublication'])->name('researchPublications.store');
    Route::get('/researchPublications/display/{ED_ID}', [ExpertDomainController::class, 'displayResearchPublication'])->name('researchPublications.display');
    Route::get('/researchPublications/edit/{ED_ID}/{id}', [ExpertDomainController::class, 'editResearchPublication'])->name('researchPublications.edit');
    Route::post('/researchPublications/update/{ED_ID}/{id}', [ExpertDomainController::class, 'updateResearchPublication'])->name('researchPublications.update');
    Route::delete('/researchPublications/destroy/{ED_ID}/{id}', [ExpertDomainController::class, 'destroyResearchPublication'])->name('researchPublications.destroy');
    Route::get('/researchPublications/view/{id}', [ExpertDomainController::class, 'ListResearchPublication'])->name('researchPublications.view');

    Route::get('/GenerateReport',[ExpertDomainController::class, 'GenerateReport'])->name('platinum.report');
    Route::get('/ReportResult', [ExpertDomainController::class, 'GenerateReportSubmit'])->name('platinum.reportResult');
    
});

//WeeklyFocus

Route::middleware('auth')->group(function() {
    Route::get('/weekly-focus-selection', [ManageWeeklyFocusController::class, 'showWeeklyFocusSelectionForm'])->name('weeklyFocusSelectionForm');
    Route::post('/weekly-focus-selection', [ManageWeeklyFocusController::class, 'processWeeklyFocusSelection'])->name('processWeeklyFocusSelection');

    Route::get('/focus-block-view', [ManageWeeklyFocusController::class, 'focusBlockView'])->name('focusBlockView');
    Route::get('/admin-block-view', [ManageWeeklyFocusController::class, 'adminBlockView'])->name('adminBlockView');
    Route::get('/recovery-block-view', [ManageWeeklyFocusController::class, 'recoveryBlockView'])->name('recoveryBlockView');
    Route::get('/social-block-view', [ManageWeeklyFocusController::class, 'socialBlockView'])->name('socialBlockView');

    Route::get('/weekly-focus-view/display', [ManageWeeklyFocusController::class, 'displayWeeklyFocusView'])->name('weeklyFocusView.display');
    Route::get('/weekly-focus-view/{id}/edit', [ManageWeeklyFocusController::class, 'edit'])->name('weeklyFocus.edit');
    Route::delete('/weekly-focus-view/{id}/delete', [ManageWeeklyFocusController::class, 'deleteWeeklyFocus'])->name('weeklyFocus.delete');
    Route::get('/weekly-focus-view/{id}/add', [ManageWeeklyFocusController::class, 'create'])->name('weeklyFocus.add');

    Route::get('/platinum-weekly-focus-report', [ManageWeeklyFocusController::class, 'platinumWeeklyFocusReport'])->name('platinum.Report');
    Route::get('/all-weekly-focus-view/display', [ManageWeeklyFocusController::class, 'displayAllWeeklyFocusView'])->name('allWeeklyFocusView.display');
    Route::get('/mentor-weekly-focus-report', [ManageWeeklyFocusController::class, 'mentorWeeklyFocusReport'])->name('mentor.Report');
    Route::get('/platinum-weekly-focus-view/display', [ManageWeeklyFocusController::class, 'displayPlatinumWeeklyFocusView'])->name('platinumWeeklyFocusView.display');
    Route::get('/crmp-weekly-focus-report', [ManageWeeklyFocusController::class, 'crmpWeeklyFocusReport'])->name('crmp.Report');
});



//DTA
Route::middleware('auth')->group(function() {
    Route::get('/DTAView', [ManageDraftThesisPerformanceController::class, 'DTAView'])->name('DTAView.index');
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
    Route::get('/mentor/search-publication', [ManagePublicationController::class, 'mentorSearch'])->name('mentor.find');
    Route::get('/mentor/report-form', [ManagePublicationController::class, 'showReportForm'])->name('mentor.reportForm');
    Route::get('/mentor/generate-report', [ManagePublicationController::class, 'generatePdfReport'])->name('mentor.generatePublicationReport');
});














