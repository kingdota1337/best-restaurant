<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Supplies\SupplyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Users
Route::resource('users', UserController::class);
Route::controller(UserController::class)->group(function () {
    // Route::get('/users/{id}', 'show');
    // Route::post('/orders', 'store');
});

// Orders
Route::resource('orders', OrderController::class);

// Products
Route::resource('products', ProductController::class);
Route::controller(ProductController::class)->group(function () {
    Route::post('/products/predict-subtype', 'predictSubtype')->name('products.predict-subtype');
});

// Supplies
Route::resource('supplies', SupplyController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
