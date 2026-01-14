<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CompanyProfileController;
use App\Http\Controllers\Frontend\CandidateProfileController;
use App\Http\Controllers\Frontend\CompanyDashboardController;
use App\Http\Controllers\Frontend\CandidateDashboardController;

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
