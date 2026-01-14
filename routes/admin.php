<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\ExportExcelController;
use App\Http\Controllers\Admin\ImportExcelController;
use App\Http\Controllers\Admin\IndustryTypeController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\OrganizationTypeController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;

Route::permanentRedirect('/', '/admin/dashboard');


Route::middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth:admin')->group(function () {

    //--------------------------------------------- Index
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');

    //--------------------------------------------- Excel
    Route::post('/import/excel', ImportExcelController::class)->name('import.excel');
    Route::get('/export/excel', ExportExcelController::class)->name('export.excel');

    //---------------------------------------------  industry-types
    Route::resource('industry-types', IndustryTypeController::class);
    //---------------------------------------------  organization-types
    Route::resource('organization-types', OrganizationTypeController::class);
    //---------------------------------------------  countries
    Route::resource('countries', CountryController::class);
    //---------------------------------------------  states
    Route::resource('states', StateController::class);
    //---------------------------------------------  cites
    Route::resource('cities', CityController::class);
    //---------------------------------------------  languages
    Route::resource('languages', LanguageController::class);
    //---------------------------------------------  professions
    Route::resource('professions', ProfessionController::class);

    Route::get('/get-states/{country_id}', [CountryController::class, 'getStates']);
    Route::get('/get-cities/{state_id}', [CountryController::class, 'getCities']);



    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
