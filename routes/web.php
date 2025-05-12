<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\StudentSubmissionController;

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






// Group routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Dashboard - List all forms
    Route::get('/dashboard', [FormController::class, 'index'])->name('dashboard');
    
    // Create a new form
    Route::get('/forms/create', [FormController::class, 'create'])->name('forms.create');
    Route::post('/forms', [FormController::class, 'store'])->name('forms.store');
    Route::get('/forms', [FormController::class, 'index'])->name('forms.index');
    // View form submissions (for the teacher)
    Route::get('/forms/{form}/submissions', [FormController::class, 'submissions'])->name('forms.submissions');
    
Route::get('/forms/{form}/export', [FormController::class, 'exportCSV']);
});

// Public routes for students to view and submit forms
Route::get('/form/{uuid}', [StudentSubmissionController::class, 'showForm'])->name('form.view');
// Route::post('/form/{uuid}', [StudentSubmissionController::class, 'submit'])->name('form.submit');
Route::post('/forms/{uuid}', [StudentSubmissionController::class, 'submitForm'])->name('forms.submit');

require __DIR__.'/auth.php';
