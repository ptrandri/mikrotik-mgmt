<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MikrotikController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TicketController;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

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


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('page.home', [
        'title' => 'Home'
    ]);
});

Route::get('/about', function () {
    return view('page.about', [
        'title' => 'About',
        "name" => 'Andri Putra',
        "email" => 'ptrandri@hotmail.com'
    ]);
});

Route::get('/blogs', function () {
    return view('page.posts', [
        'title' => 'Posts'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name("login")->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// // Route::get('/ticket/', [TicketController::class, 'index'])->middleware('auth');
// Route::resource('tickets',TicketController::class)->middleware('auth');
// Route::get('/search', [TicketController::class, 'search'])->middleware('auth');

// Route::get('/report', [ReportController::class, 'index'])->middleware('auth','role:Administrator');
// Route::post('/report/export', [ReportController::class, 'export'])->middleware('auth','role:Administrator');
Route::resource('users',AdminUserController::class)->middleware('role:Administrator','auth');

// Mikrotik
Route::get('/mikrotik', [MikrotikController::class, 'index']);
Route::get('/block-client/{ip}', [MikrotikController::class, 'blockClient'])->name('block.client');
Route::get('/unblock-client/{ip}', [MikrotikController::class, 'unblockClient'])->name('unblock.client');

Route::get('/firewall', [MikrotikController::class, 'firewallClient']);




