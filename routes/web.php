<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CustomerBranchController;
use App\Http\Controllers\CustomerBranchInfoController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerNoteController;
use App\Http\Controllers\JawalySMSController;
use App\Http\Controllers\NoticeCustomerController;
use App\Http\Controllers\ProfileController;
use App\Models\CustomerAdditionalnotes;
use App\Services\JawalySMSService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('customer',CustomerController::class);
Route::get('addInfo/{id}', [CustomerController::class, 'addInfo'])->name('addInfo');
Route::resource('customernote',CustomerNoteController::class);
Route::resource('NoticeCustomer',NoticeCustomerController::class);
Route::resource('Branches',CustomerBranchController::class);
Route::resource('BranchInfo',CustomerBranchInfoController::class);
Route::get('/sendsms', [App\Http\Controllers\sendSmsController::class, 'whatsapp']);
Route::get('/report', [App\Http\Controllers\ReportController::class, 'reports'])->name('report');
Route::get('/reportDay', [App\Http\Controllers\ReportController::class, 'reportDay'])->name('reportDay');
Route::get('/reportMonth', [App\Http\Controllers\ReportController::class, 'reportMonth'])->name('reportMonth');
Route::get('/reportSupportEndThisMonth', [App\Http\Controllers\ReportController::class, 'reportSupportEndThisMonth'])->name('reportSupportEndThisMonth');
Route::get('/reportSupportEndThisDay', [App\Http\Controllers\ReportController::class, 'reportSupportEndThisDay'])->name('reportSupportEndThisDay');
Route::get('/reportPerPeriod', [App\Http\Controllers\ReportController::class, 'reportPerPeriod'])->name('reportPerPeriod');
Route::get('/reportPerPeriodFilter', [App\Http\Controllers\ReportController::class, 'reportPerPeriodFilter'])->name('reportPerPeriodFilter');


Route::resource('agents',AgentController::class);
Route::resource('activity',ActivityController::class);


// Activity Routes
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/{id}', [ActivityController::class, 'show'])->name('activities.show');
Route::get('/activities/{id}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
Route::post('/activities/{id}/update', [ActivityController::class, 'update'])->name('activities.update');
Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])->name('activities.destroy');


Route::get('/balance', [JawalySMSService::class, 'checkBalance']);
Route::get('/senders', [JawalySMSService::class, 'getSenders']);
Route::get('send-sms', [JawalySMSService::class, 'sendSMS'])->name('send-sms');
