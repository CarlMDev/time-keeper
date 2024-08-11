<?php

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
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/history', function () {
        return view('history');
    })->name('history');

    Route::get('/time-record-modify/{id}', function ($id) {
        return view('time-record-modify', ['id' => $id]);
    })->name('time-record-modify');

    
    Route::get('/time-record-modify/view/{id}', function ($id) {
        return view('time-record-modify-view', ['id' => $id]);
    })->name('time-record-modify-view');

    Route::get('/edit-time-record/{id}', function ($id) {
        return view('edit-time-record', ['id' => $id]);
    })->name('edit-time-record');

    Route::get('/time-record-delete-confirmation/{id}', function ($id) {
        return view('time-record-delete-confirmation', ['id' => $id]);
    })->name('time-record-delete-confirmation');

    Route::get('/time-record-modification-request-cancel/{id}', function ($id) {
        return view('time-record-mod-request-cancel', ['id' => $id]);
    })->name('time-record-modification-request-cancel');

});
