<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TechStackController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('projects', ProjectController::class)->only(['index', 'store', 'destroy']);
    Route::post('/profile/upload-cv', [DashboardController::class, 'uploadCv'])->name('profile.uploadCv');
    Route::post('/add-skill', [TechStackController::class, 'addSkill'])->name('add.skill');
    Route::delete('/destroy-skill/{skill}', [TechStackController::class, 'destroySkill'])->name('destroy.skill');
    Route::put('/update-information', [DashboardController::class, 'updateInformation'])->name('update.information');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
