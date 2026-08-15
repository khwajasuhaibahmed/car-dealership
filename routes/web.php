<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'sendInquiry'])->name('contact.send');
Route::get('/about', [PublicController::class, 'about'])->name('about');

// User Dashboard & Profile
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/inventory', [PublicController::class, 'inventory'])->name('inventory.index');
    Route::get('/inventory/{car}', [PublicController::class, 'show'])->name('inventory.show');

    Route::get('/dashboard', [\App\Http\Controllers\UserDashboardController::class, 'index'])->name('dashboard');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes (Role Check)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        
        // Car Management
        Route::resource('cars', AdminController::class);
        Route::delete('/cars/{car}/image/{index}', [AdminController::class, 'removeImage'])->name('cars.remove-image');

        
        // Inquiries
        Route::get('/inquiries', [AdminController::class, 'inquiries'])->name('inquiries.index');
        Route::patch('/inquiries/{inquiry}/status', [AdminController::class, 'updateInquiryStatus'])->name('inquiries.update-status');

        // Users
        Route::get('/users', [AdminController::class, 'users'])->name('users.index');
        Route::post('/users/{user}/approve', [AdminController::class, 'approveUser'])->name('users.approve');
    });
});


Route::get('/pending-approval', function () {
    return view('auth.pending-approval');
})->name('pending-approval');

require __DIR__.'/auth.php';

