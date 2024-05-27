<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ExpertDomainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
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

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/AddExpert',[ExpertDomainController::class, 'AddExpertDomainInformation']);
Route::get('/AddResearch',[ExpertDomainController::class, 'AddResearchPublicationView']);
Route::get('/DeleteExpert',[ExpertDomainController::class, 'DeleteExpertDomainView']);
Route::get('/DeleteResearch',[ExpertDomainController::class, 'DeleteResearchPublicationView']);
Route::get('/DisplayExpertDetails',[ExpertDomainController::class, 'DisplayExpertDomainDetailsView']);
Route::get('/DisplayResearch',[ExpertDomainController::class, 'DisplayResearchPublicationView']);
Route::get('/GenerateReport',[ExpertDomainController::class, 'GenerateReport']);
Route::get('/SearchPlatinumExpDom',[ExpertDomainController::class, 'SearchPlatinumExpertDomainView']);
Route::get('/SearchResearch',[ExpertDomainController::class, 'SearchResearchPublicationView']);
Route::get('/UpdateExpert',[ExpertDomainController::class, 'UpdateExpertDomainView']);
Route::get('/UpdateResearch',[ExpertDomainController::class, 'UpdateResearchPublicationView']);
Route::get('/MentorSearch',[ExpertDomainController::class, 'SearchPlatinumExpertDomainView']);
Route::get('/MentorView',[ExpertDomainController::class, 'ViewPlatinumExpertDomain']);

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
Route::get('ViewExpertDomainPublication',[ManagePublicationController::class,'ExpertDomainPublicationView']);
Route::get('ViewPlatinumPublication',[ManagePublicationController::class,'PlatinumPublicationView']);
Route::get('ViewPublicationReport',[ManagePublicationController::class,'PublicationReportView']);
Route::get('ViewRegisteredPlatinum',[ManagePublicationController::class,'RegisteredPlatinumView']);
Route::get('SearchForPlatinum',[ManagePublicationController::class,'SearchPlatinumVIew']);

Route::get('AddPublication',[ManagePublicationController::class,'AddPublicationView']);
Route::post('EditPublication',[ManagePublicationController::class,'EditPublicationView']);
Route::get('ViewOwnPublication/{id}',[ManagePublicationController::class,'OwnPublicationView']);
Route::post('SearchForPublication/{id}',[ManagePublicationController::class,'SearchPublicationView']);
Route::get('ViewOtherPublication',[ManagePublicationController::class,'ViewOtherPublicationView']);










