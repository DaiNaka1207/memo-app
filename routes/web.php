<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('memo', MemoController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if(empty(session('message')) == true) {
            return redirect(route('memo.index'));
        } else {
            return redirect(route('memo.index'))->with('message', session('message'));
        }
    })->name('dashboard');
});
