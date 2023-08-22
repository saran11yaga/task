<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('home');
});


Route::get('admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/home', [HomeController::class, 'index'])->name('home')->withoutMiddleware(['auth']);

Route::get('admin/login', [HomeController::class, 'adminLogin'])->name('admin.login')->withoutMiddleware(['auth']);
Route::get('user/dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');

Auth::routes([
   // 'register' => false, // Routes of Registration
   // 'reset' => false,    // Routes of Password Reset
   // 'verify' => false,   // Routes of Email Verification
  ]);
  