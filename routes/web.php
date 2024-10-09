<?php

use App\Http\Controllers\productController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


route::get('/home',[HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(productController::class)->group(function () {
    Route::get('/product', 'productView')->name('productsView');
    Route::post('/productadd', 'productAdd')->name('productsAdd');
    Route::get('/productdelete/{id}', 'productDelete')->name('productsDelete');
    Route::get('/update', 'update');
    Route::post('/productupdate', 'productUpdate')->name('productsUpdate');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('loginPost');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerPost')->name('registerPost');
});


require __DIR__.'/auth.php';
Route::get('/allproducts', [HomeController::class, 'AllProducts'])->name('AllProducts');
Route::get('/logout',[HomeController::class, 'logout'])->name('logout');