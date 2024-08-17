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

    Route::get('/time-record/modification/add/{id}', function ($id) {
        return view('time-record-modify', ['id' => $id]);
    })->name('time-record-mod-add');

    
    Route::get('/time-record/modification/view/{id}', function ($id) {
        return view('time-record-modify-view', ['id' => $id]);
    })->name('time-record-mod-view');

    Route::get('/time-record/edit/{id}', function ($id) {
        return view('edit-time-record', ['id' => $id]);
    })->name('time-record-mod-edit');

    Route::get('/time-record//{id}', function ($id) {
        return view('time-record-delete-confirmation', ['id' => $id]);
    })->name('time-record-mod-del');

    Route::get('/time-record/request/cancel/{id}', function ($id) {
        return view('time-record-mod-request-cancel', ['id' => $id]);
    })->name('time-record-mod-request-cancel');

});
