<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\MemoLikeController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/memos/{memo}/like', [MemoLikeController::class, 'store'])->name('memos.like');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::redirect('/', '/memos');

Route::middleware('auth')->group(function () {
    Route::resource('memos', MemoController::class)->only([
        'index', 'store', 'edit', 'update', 'destroy',
    ]);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
