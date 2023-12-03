<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// ==================company route================================
Route::resource('company', CompanyController::class);
// ==================employee route================================
Route::resource('employee', EmployeeController::class);
Route::get('/product', [ProductController::class, 'index'])->name('productData');
Route::post('/product/add', [ProductController::class, 'store'])->name('productStore');
Route::post('/product/store', [ProductController::class, 'storeJquery'])->name('storeJquery');
