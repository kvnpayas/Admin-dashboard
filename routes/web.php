<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/vue', function () {
    return view('app');
})
->name('application');
Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/product', [AdminController::class, 'index']);
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/product/create', [ProductController::class, 'create']);
    // Route::get('/admin/product/{id}', [ProductController::class, 'edit']);
    Route::get('/', function () {
        return view('welcome');
    })->middleware('auth');
});

require __DIR__.'/auth.php';
