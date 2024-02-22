<?php

use App\Http\Controllers\Logout;
use App\Http\Controllers\HomeController;
use App\Livewire\DashboardAdmin;
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

Route::view('/', 'welcome');

Route::middleware('auth')->group(function (){
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('dashboard_admin', DashboardAdmin::class)->name('dashboard_admin');
    Route::post('logout', [Logout::class, 'logout'])->name('logout');
});

require __DIR__.'/auth.php';