<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCustomerController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Models\BookDetail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [HomeController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('p', function () {
    return view('admin.dashboard');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::middleware(['auth', 'user-access:manager'])->group(function () {
        Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
        Route::resource('users', UserController::class);
    });

    Route::middleware(['auth', 'user-access:admin'])->group(function () {  
        Route::resource('books', BookController::class);
        Route::resource('categories', CategoriesController::class);
        Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
        Route::resource('reviews', ReviewController::class);
        Route::get('export-pdf', [BorrowingController::class, 'generatePDF'])->name('export-pdf');
        Route::get('book-pdf', [BookController::class, 'generatePDF'])->name('book-pdf');
        Route::resource('dashboards', DashboardController::class);
    });

    Route::middleware(['auth', 'user-access:user'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/', [HomeController::class, 'index']);
        Route::resource('details', BookDetailController::class);
        Route::resource('bks', BookCustomerController::class);
        Route::resource('borrowings', BorrowingController::class);
        Route::delete('/borrowings/{borrowing}', [BorrowingController::class, 'destroy'])->name('borrowings.destroy');
        Route::post('/profile/change-password', [ForgotPasswordController::class, 'updatePassword'])->name('user.updatePassword');
    });
});
