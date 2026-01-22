<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CheckoutPageController;
use App\Http\Controllers\Frontend\CompanyPageController;
use App\Http\Controllers\Frontend\CandidatePageController;
use App\Http\Controllers\Frontend\CompanyProfileController;
use App\Http\Controllers\Frontend\CandidateProfileController;
use App\Http\Controllers\Frontend\CompanyDashboardController;
use App\Http\Controllers\Frontend\CandidateDashboardController;
use App\Http\Controllers\Frontend\CandidateEducationController;
use App\Http\Controllers\Frontend\CandidateExperienceController;

Route::get('/', [HomeController::class, 'index']);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Candidate
Route::middleware(['auth', 'verified', 'user.role:candidate'])->prefix('candidate')->as('candidate.')->group(function () {
    Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [CandidateProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/basic-info-update', [CandidateProfileController::class, 'basicInfoUpdate'])->name('basic.info.update');
    Route::post('/profile/profile-info-update', [CandidateProfileController::class, 'profileInfoUpdate'])->name('profile.info.update');
    Route::post('/profile/candidate-account', [CandidateProfileController::class, 'updateCandidateAccount'])->name('profile.candidate-account');
    Route::post('/profile/candidate-password-update', [CandidateProfileController::class, 'updateCandidatePassword'])->name('profile.candidate-password');
    Route::resource('/candidate-experiences', CandidateExperienceController::class);
    Route::resource('/candidate-educations', CandidateEducationController::class);
});


// Company
Route::middleware(['auth', 'verified', 'user.role:company'])->prefix('company')->as('company.')->group(function () {
    Route::get('/dashboard', [CompanyDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [CompanyProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/company-info', [CompanyProfileController::class, 'updateCompanyInfo'])->name('profile.company-info');
    Route::post('/profile/company-founding', [CompanyProfileController::class, 'updateCompanyFounding'])->name('profile.company-founding');
    Route::post('/profile/company-account', [CompanyProfileController::class, 'updateCompanyAccount'])->name('profile.company-account');
    Route::post('/profile/company-password-update', [CompanyProfileController::class, 'updateCompanyPassword'])->name('profile.company-password');
});
Route::get('/companies', [CompanyPageController::class, 'index'])->name('companies.index');
Route::get('/company/{slug}', [CompanyPageController::class, 'show'])->name('company.show');
Route::get('/candidates', [CandidatePageController::class, 'index'])->name('candidates.index');
Route::get('/checkout/{plan_id}', CheckoutPageController::class)->name('checkout.index');
