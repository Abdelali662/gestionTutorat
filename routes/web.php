<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('layout.nav');
});

Route::get('/tuteur', function () {
    return view('tuteur.index'); // 'tuteur' est le dossier, 'index' est le fichier
});
Route::get('/tutore', function () {
    return view('tutore.index'); // 'tuteur' est le dossier, 'index' est le fichier
});


// Authentification routes
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
use App\Http\Controllers\Auth\RegisterController;

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [RegisterController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [RegisterController::class, 'updateProfile'])->name('profile.update');
});

