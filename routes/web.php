<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('index', [ProfileController::class,'index'])->name('index');
    Route::post('store', [LinkController::class,'store'])->name('store');
    Route::get('links', [LinkController::class,'showLinks'])->name('links');
    Route::delete('links/delete/{link}', [LinkController::class,'destroy'])->name('delete');
});
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::post('/contact/send', [PageController::class, 'send'])->name('contact.send');


 Route::get('/r/{slug}', [RedirectController::class,'redirect'])->name('redirect');
require __DIR__.'/auth.php';
