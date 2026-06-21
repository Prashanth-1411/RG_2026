<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('frontend.home');
Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('frontend.about');
Route::get('/services', [App\Http\Controllers\Frontend\AmbulanceServicesController::class, 'index'])->name('frontend.services');
Route::get('/services/{slug}', [App\Http\Controllers\Frontend\ServiceController::class, 'show'])->name('frontend.services.show');
Route::get('/fleet', [App\Http\Controllers\Frontend\FleetController::class, 'index'])->name('frontend.fleet');
Route::get('/fleet/{slug}', [App\Http\Controllers\Frontend\FleetController::class, 'show'])->name('frontend.fleet.show');
Route::get('/mortuary', [App\Http\Controllers\Frontend\MortuaryController::class, 'index'])->name('frontend.mortuary');
Route::get('/testimonials', [App\Http\Controllers\Frontend\TestimonialController::class, 'index'])->name('frontend.testimonials');
Route::get('/faq', [App\Http\Controllers\Frontend\FaqController::class, 'index'])->name('frontend.faq');
Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('frontend.contact');
Route::post('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'store'])->name('frontend.contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
