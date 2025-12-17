<?php

use App\Livewire\ShowThread;
use App\Livewire\ShowThreads;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', ShowThreads::class)
        ->name('dashboard');

    Route::get('/thread/{thread}', ShowThread::class)
        ->name('thread');
});
