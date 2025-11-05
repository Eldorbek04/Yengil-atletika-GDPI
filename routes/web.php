<?php

use App\Http\Controllers\Admin\BalandlikkasakrashController;
use App\Http\Controllers\Admin\BeshmingmController;
use App\Http\Controllers\Admin\BirmingbeshyuzmController;
use App\Http\Controllers\Admin\IkkiyuzmController;
use App\Http\Controllers\Admin\SakkizyuzmController;
use App\Http\Controllers\Admin\TortyuzmController;
use App\Http\Controllers\Admin\UchmingmController;
use App\Http\Controllers\Admin\UzunlikkasakrashController;
use App\Http\Controllers\Admin\YadroController;
use App\Http\Controllers\Admin\YuzmController;
use App\Http\Controllers\MainController;
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

// Kop tillik route
Route::get('/lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return back();
});

// front uchun
Route::get('/' ,[MainController::class, 'index'])->name('index');
Route::get('/yuzm' ,[MainController::class, 'yuzm'])->name('yuzm');
Route::get('/yadro_itqidish' ,[MainController::class, 'yadro_itqidish'])->name('yadro_itqidish');
Route::get('/uzunlikka_sakrash' ,[MainController::class, 'uzunlikka_sakrash'])->name('uzunlikka_sakrash');
Route::get('/uchmingm' ,[MainController::class, 'uchmingm'])->name('uchmingm');
Route::get('/tortyuzm' ,[MainController::class, 'tortyuzm'])->name('tortyuzm');
Route::get('/sakkizyuzm' ,[MainController::class, 'sakkizyuzm'])->name('sakkizyuzm');
Route::get('/ikkiyuzm' ,[MainController::class, 'ikkiyuzm'])->name('ikkiyuzm');
Route::get('/birmingbeshyuzm' ,[MainController::class, 'birmingbeshyuzm'])->name('birmingbeshyuzm');
Route::get('/beshmingm' ,[MainController::class, 'beshmingm'])->name('beshmingm');
Route::get('/balandikka_sakrash' ,[MainController::class, 'balandikka_sakrash'])->name('balandikka_sakrash');


// admin uchun
Route::prefix('admin/')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('yuzm', YuzmController::class);
    Route::resource('ikkiyuzm', IkkiyuzmController::class);
    Route::resource('tortyuzm', TortyuzmController::class);
    Route::resource('sakkizyuzm', SakkizyuzmController::class);
    Route::resource('birmingbeshyuzm', BirmingbeshyuzmController::class);
    Route::resource('uchmingm', UchmingmController::class);
    Route::resource('beshmingm', BeshmingmController::class);
    Route::resource('uzunlikkasakrash', UzunlikkasakrashController::class);
    Route::resource('balandlikkasakrash', BalandlikkasakrashController::class);
    Route::resource('yadro', YadroController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// <!--  26 Oktyabir 2025 Rayimjonov Eldorbek --> //
