<?php

use App\Http\Controllers\MyListController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::prefix('/profile')->controller(ProfileController::class)->as('profile.')->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

    Route::prefix('/my-list')->controller(MyListController::class)->as('my-list.')->group(function () {
        Route::get('/', 'show')->name('show');
        Route::get('/add', 'add')->name('add');
        Route::post('/add', 'store');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });
});

require __DIR__ . '/auth.php';
